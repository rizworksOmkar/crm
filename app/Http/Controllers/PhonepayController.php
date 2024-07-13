<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Exception;
class PhonepayController extends Controller
{

    public function index()
    {
        return view('welcome')->with('res_data', 'Please Pay & Repond From The Payment Gateway Will Come In This Section');
    }

    public function refund()
    {
        return view('refund')->with('res_data', 'Please Refund & Repond From The Payment Gateway Will Come In This Section')->with('res_data_status', 'After Refund Refund Status Will Come');
    }

    public function payment_init()
    {
        try {

            $normalPayLoad = [
                "merchantId"            => "PGTESTPAYUAT69",
                "merchantTransactionId" => uniqid(),
                "merchantUserId"        => "MUID123",
                "amount"                => 100000,
                "redirectUrl"           => route('pay-return-url'),
                "redirectMode"          => "POST",
                "callbackUrl"           => route('pay-return-url'),
                "mobileNumber"          => "9999999999",
                "paymentInstrument"     => [
                    "type" => "PAY_PAGE",
                ],
            ];

            $encode = base64_encode(json_encode($normalPayLoad));

            $finalXvaify = self::get_checksum_value_request($encode);

            $response = self::payment_with_curl_lib($finalXvaify, $encode);

            return $response;
        } catch (\Exception $e) {
            return view('welcome')->with('res_data', $e->getMessage());
        }

    }

    private function get_checksum_value_request($payload)
    {
        $saltKey   = env('SALT_MAIN_KEY_PHONEPAY');
        $saltIndex = env('SALT_MAIN_INDEX_PHONEPAY');

        $string = $payload . '/pg/v1/pay' . $saltKey;

        $sha256        = hash('sha256', $string);
        $final_x_vaify = $sha256 . '###' . $saltIndex;
        return $final_x_vaify;
    }

    private function get_checksum_value_refund($payload)
    {
        $saltKey   = env('SALT_MAIN_KEY_PHONEPAY');
        $saltIndex = env('SALT_MAIN_INDEX_PHONEPAY');

        $string = $payload . '/pg/v1/refund' . $saltKey;

        $sha256        = hash('sha256', $string);
        $final_x_vaify = $sha256 . '###' . $saltIndex;
        return $final_x_vaify;
    }

    private function payment_with_curl_lib($finalXvaify, $encode)
    {
        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay')
            ->withHeader('Content-Type:application/json')
            ->withHeader('X-VERIFY:' . $finalXvaify)
            ->withData(json_encode(['request' => $encode]))
            ->enableDebug(public_path('test.txt'))
            ->post();
        $return_data = json_decode($response);
        // dd($return_data);

        return redirect()->to($return_data->data->instrumentResponse->redirectInfo->url);

    }

    private function payment_with_curl($finalXvaify, $encode)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'accept:: application/json',
            'X-VERIFY: ' . $finalXvaify,
        ));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array('request' => $encode)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $return_data = json_decode($response);

        return redirect()->to($return_data->data->instrumentResponse->redirectInfo->url);
    }

    public function payment_return(Request $request)
    {
        try {

            $saltKey   = env('SALT_MAIN_KEY_PHONEPAY');
            $saltIndex = env('SALT_MAIN_INDEX_PHONEPAY');

            if ($request->code == 'PAYMENT_SUCCESS' && !empty($request->merchantId) && !empty($request->transactionId) && !empty($request->providerReferenceId)) {

                $statusURL      = 'https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/' . $request->merchantId . '/' . $request->transactionId;
                $final_checksum = self::get_checksum_value_respond($request->merchantId, $request->transactionId);

                $response = Curl::to($statusURL)
                    ->withHeader('Content-Type:application/json')
                    ->withHeader('accept:application/json')
                    ->withHeader('X-VERIFY:' . $final_checksum)
                    ->withHeader('X-MERCHANT-ID:' . $request->transactionId)
                    ->enableDebug(public_path('test.txt'))
                    ->get();

                //DB OPERATION

                // add  code.

                return view('welcome')->with('res_data', $response);
            } else {
                return view('welcome')->with('res_data', 'Error!!. Respond Not Send');
            }
        } catch (\Exception $e) {
            return view('welcome')->with('res_data', $e->getMessage());
        }
    }

    public function payment_callback(Request $request)
    {

    }

    private function get_checksum_value_respond($merchantId, $transactionId)
    {
        $saltKey   = env('SALT_MAIN_KEY_PHONEPAY');
        $saltIndex = env('SALT_MAIN_INDEX_PHONEPAY');

        $string = hash('sha256', '/pg/v1/status/' . $merchantId . '/' . $transactionId . $saltKey) . '###' . $saltIndex;

        return $string;
    }

    public function payment_refund(Request $request)
    {
        try {

            $saltKey   = env('SALT_MAIN_KEY_PHONEPAY');
            $saltIndex = env('SALT_MAIN_INDEX_PHONEPAY');

            $tid = $request->refund_tnx_id;

            $payload = [
                'merchantId'            => 'PGTESTPAYUAT',
                'merchantUserId'        => 'MUID123',
                'merchantTransactionId' => $tid,
                'originalTransactionId' => strrev($tid),
                'amount'                => 100000,
                'callbackUrl'           => route('pay-refund-callback'),
            ];

            $encode = base64_encode(json_encode($payload));

            $finalXvaify = self::get_checksum_value_refund($encode);

            $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/refund')
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:' . $finalXvaify)
                ->withData(json_encode(['request' => $encode]))
                ->post();

            $rData = json_decode($response);

            $finalXvaifyStatus = hash('sha256', '/pg/v1/status/' . 'MERCHANTUAT' . '/' . $tid . $saltKey) . '###' . $saltIndex;

            $responsestatus = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/' . 'MERCHANTUAT' . '/' . $tid)
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:' . $finalXvaifyStatus)
                ->withHeader('X-MERCHANT-ID:' . $tid)
                ->get();

            return view('refund')->with('res_data', $response)->with('res_data_status', $responsestatus);
        } catch (Exception $e) {
            return view('refund')->with('res_data', $e->getMessage());
        }
    }
   
    public function payment_refund_callback(Request $request)
    {
        try {
            dd($request->all());
        } catch (Exception $e) {
            return view('refund')->with('res_data', $e->getMessage());
        }
    }
}
