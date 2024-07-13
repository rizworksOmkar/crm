<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin\BookingDetsails;
use App\Models\Admin\Package;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Mail;
use App\Mail\SiteMailSend;
use App\Mail\SiteAttachmentMailSend;
use App\Mail\pacakageConfirmationMail;

class PaymentController extends Controller
{

    public function pay($bookingID)
    {


        // return view('payment', compact('bookingID'));
        $fetchBookingDetails = BookingDetsails::where('booking_code', $bookingID)->first();

        $pacakage = Package::where('id', $fetchBookingDetails->pacakge_id)->first();
        // echo($pacakage->category);die();
        //get no of adults, children and infants
        $bookingDetails = [
            'adults' => $fetchBookingDetails->no_of_adult,
            'childs' => $fetchBookingDetails->no_of_child,
            'infants' => $fetchBookingDetails->no_of_infant,
            'packageCost' => $fetchBookingDetails->pacakge_cost,
            'childDiscount' => $fetchBookingDetails->child_discount,
            'category'  => $pacakage->category,
        ];

        //dd($bookingDetails);
        //get total cost for all members check if child discount is >0 if then apply discount to child and infant prices
        $grandtotal = 0;
        $totalCost = 0;
        $childDiscount = 0;
        $PacakagecostperHead = 0;
        $gstTolal = 0;
        $tcsTotal =0;
        //if($bookingDetails['category'] == 0){
            $totalCost = $bookingDetails['packageCost'] * $bookingDetails['adults'];

            // $gstTotal = ($totalCost * 5 / 100) + $totalCost;
            
            // $grandtotal = $totalCost +
        //}
        if ($bookingDetails['childDiscount'] > 0) {
            $childDiscount = ($bookingDetails['childDiscount'] / 100);
            $PacakagecostperHead = ($bookingDetails['packageCost'] * ($bookingDetails['adults'] + $bookingDetails['childs'] +  $bookingDetails['infants']));
            $PacakagecostAfterDiscount = $PacakagecostperHead * $childDiscount;
            $totalCost = $PacakagecostperHead - $PacakagecostAfterDiscount;
        } else {
            $totalCost = ($bookingDetails['packageCost'] * ($bookingDetails['childs'] + $bookingDetails['adults'] + $bookingDetails['infants']));
        }

        if($bookingDetails['category'] == 0){

            $gstTolal = ($totalCost * 5 / 100);
            $grandtotal = $totalCost + $gstTolal;
        }else{
             if($totalCost > 700000){
                $gstTolal = ($totalCost * 5 / 100);                
                $tcsTotal = ($totalCost * 20 / 100); 
                $grandtotal = (($totalCost + $gstTolal) + $tcsTotal);
             }
             else if($totalCost < 700000){
                $gstTolal = ($totalCost * 5 / 100);
                $tcsTotal= ($totalCost * 5 / 100);               
                $grandtotal = (($totalCost + $gstTolal) + $tcsTotal);
             }
             else{
                $gstTolal = ($totalCost * 5 / 100);
                $tcsTotal= ($totalCost * 5 / 100);               
                $grandtotal = (($totalCost + $gstTolal) + $tcsTotal);
             }

        }
        //echo($grandtotal);die();

        $user_id = Auth::user()->id;
        $data = array (
            'merchantId' => 'PGTESTPAYUAT69',
            'merchantTransactionId' => uniqid(),
            'merchantUserId' => 'THOB'.$user_id,
            'amount' => $grandtotal * 100,
            'redirectUrl' => route('responsetPayment'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('responsetPayment'),
            'mobileNumber' => '9999999999',
            'paymentInstrument' =>
            array (
              'type' => 'PAY_PAGE',
            ),
          );

          $encode = base64_encode(json_encode($data));

          $saltKey = 'f23f3fc9-f7ca-455f-9fb3-8bd124642fdf';
          $saltIndex = 1;

          $string = $encode.'/pg/v1/pay'.$saltKey;
          $sha256 = hash('sha256',$string);

          $finalXHeader = $sha256.'###'.$saltIndex;

          $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay')
                  ->withHeader('Content-Type:application/json')
                  ->withHeader('X-VERIFY:'.$finalXHeader)
                  ->withData(json_encode(['request' => $encode]))
                  ->post();

          $responseData = json_decode($response, true);

          // Extract and assign each piece of data to a variable
          $success = $responseData['success'];
          $code = $responseData['code'];
          $message = $responseData['message'];
          $merchantId = $responseData['data']['merchantId'];
          $merchantTransactionId = $responseData['data']['merchantTransactionId'];
          $instrumentResponseType = $responseData['data']['instrumentResponse']['type'];
          $redirectUrl = $responseData['data']['instrumentResponse']['redirectInfo']['url'];
          $redirectMethod = $responseData['data']['instrumentResponse']['redirectInfo']['method'];

          if($success == false)
          {
              echo($message);
              die();
          }
          else
          {
             $booking = BookingDetsails::where('booking_code', $bookingID)->first();
             $booking->booking_status = 1;
             //merchantTransactionId
             $booking->merchantTransactionId = $merchantTransactionId;
             $booking->save();
          }

         // echo($redirectUrl); die();
          return redirect()->to($redirectUrl);


    }

    public function responsetPayment(Request $request)
    {

        $input = $request->all();
        //dd($input);
        $saltKey = 'f23f3fc9-f7ca-455f-9fb3-8bd124642fdf';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();

                // dd($response);
        $responseData = json_decode($response, true);



        // Extract and assign each piece of data to a variable
        $success = $responseData['success'];
        $code = $responseData['code'];
        $message = $responseData['message'];
        $merchantId = $responseData['data']['merchantId'];
        $merchantTransactionId = $responseData['data']['merchantTransactionId'];
        $transactionId = $responseData['data']['transactionId'];
        $amount = $responseData['data']['amount'];
        $state = $responseData['data']['state'];
        $responseCode = $responseData['data']['responseCode'];
        $paymentInstrumentType = $responseData['data']['paymentInstrument']['type'];
        $paymentInstrumentCardType = $responseData['data']['paymentInstrument']['cardType'];
        $pgTransactionId = $responseData['data']['paymentInstrument']['pgTransactionId'];
        $bankTransactionId = $responseData['data']['paymentInstrument']['bankTransactionId'];
        $pgAuthorizationCode = $responseData['data']['paymentInstrument']['pgAuthorizationCode'];
        $arn = $responseData['data']['paymentInstrument']['arn'];
        $bankId = $responseData['data']['paymentInstrument']['bankId'];
        $brn = $responseData['data']['paymentInstrument']['brn'];

        $fetchBookingandUserID = BookingDetsails::where('merchantTransactionId', $merchantTransactionId)->get();
        $user_id = $fetchBookingandUserID[0]['user_id'];
        $booking_id= $fetchBookingandUserID[0]['booking_code'];
        $pacakge_id= $fetchBookingandUserID[0]['pacakge_id'];
        $pacakge_cost =  $fetchBookingandUserID[0]['pacakge_cost'];


        $fetchEmail = User::where('id', $user_id)->get();
        $email = $fetchEmail[0]['email'];
        $FirstName = $fetchEmail[0]['first_name'];
        $MiddleName = $fetchEmail[0]['middle_name'];
        $LastName = $fetchEmail[0]['last_name'];

        $name="";
        if($MiddleName == '')
        {
            $name = $FirstName.' '.$LastName;
        }else
        {
            $name = $FirstName.' '.$MiddleName.' '.$LastName ;
        }

        $fetchPacakges = Package::where('id', $pacakge_id)->get();
        $pacakageName =  $fetchPacakges[0]['package_name'];
        $pacakageimage =  $fetchPacakges[0]['package_image'];
        $pacakage_days=  $fetchPacakges[0]['for_number_of_days'];
        $pacakage_night=  $fetchPacakges[0]['for_number_of_nights'];
        $days = $pacakage_night. 'N - '.$pacakage_days.'D';

        $totalPacfetch =  BookingDetsails::select(DB::raw('sum(no_of_adult + no_of_child + no_of_infant) as total'))->where('booking_code', $booking_id)->where('booking_status', 1)->first();
        $totalPac = $totalPacfetch['total'];

        //put all this data in using DB facade for pg_transaction table

       $pg_transactioninsert = DB::table('pg_transactions')->insert([
            'booking_id' => $booking_id,
            'pacakge_id' => $pacakge_id,
            'login_user_id' => $user_id,
            'success' => $success,
            'code' => $code,
            'message' => $message,
            'merchantId' => $merchantId,
            'merchantTransactionId' => $merchantTransactionId,
            'transactionId' => $transactionId,
            'amount' => $amount /100,
            'state' => $state,
            'responseCode' => $responseCode,
            'paymentInstrumentType' => $paymentInstrumentType,
            'paymentInstrumentCardType' => $paymentInstrumentCardType,
            'pgTransactionId' => $pgTransactionId,
            'bankTransactionId' => $bankTransactionId,
            'pgAuthorizationCode' => $pgAuthorizationCode,
            'arn' => $arn,
            'bankId' => $bankId,
            'brn' => $brn,
        ]);

        $tot_amountget = $amount /100;

        if( $pg_transactioninsert){
        // // Email To User//
            // $data = [];
            // // $data['to'] = 'riyaanishblogger2021@gmail.com';
            // // $data['to'] = ['machfinbusiness@gmail.com', 'info@machfinance.com'];
            // $data['to'] = $email;
            // // $data['greetings'] = 'Hi! My name is, ' . $user->name . '. we are ineterested to take your service so we registered at your website as ' . $user->role_type;
            // $data['greetings'] = 'Hi '.$name  ;
            // $data['confirmation'] = 'Your Package Name '.$pacakageName.' is Confirmed';
            // $data['days'] = $days;
            // $data['bookingid'] = $booking_id;
            // $data['pacakageimg'] = $pacakageimage;
            // $data['pacakagenametable'] = $pacakageName;
            // $data['noofpeople'] = $totalPac;
            // $data['pacakgeCost'] = $pacakge_cost;
            // $data['total'] = $tot_amountget;
            // $data['maintotal'] = $tot_amountget;
            // $data['grandtotal'] = $tot_amountget;

            // $data['from'] = 'enquiry@travelhostonline.com';
            // $data['subject'] = 'Your Booking ' . $pacakageName. ' ('. $booking_id .' ) Confirmation' ;
            // Mail::to($data['to'])->send(new pacakageConfirmationMail($data));

            // End Email To User//

            return view('useradmin.paymentconfirmation');  //put the suitable view file here now to show the response data
        }else{

            return view('useradmin.paymentfailure');
        }


    }



}
