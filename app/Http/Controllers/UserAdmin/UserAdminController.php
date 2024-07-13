<?php

namespace App\Http\Controllers\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Models\Admin\Sight;
use App\Models\Admin\Package;
use App\Models\Admin\Hotel;
use App\Models\Admin\Destination;
use App\Models\Admin\Transport;
use App\Models\Admin\Meal;
use App\Models\Admin\PackageType;
use App\Models\Admin\PackageActivity;
use App\Models\Admin\ruleEngineINDT;
use App\Models\Admin\ruleEngineDOMDT;
use App\Models\Admin\Itinerary;
use App\Models\Admin\ItineraryTrans;
use App\Models\Admin\PackageGallery;
use App\Models\Admin\ruleEngineHompageBanner;
use App\Models\Admin\Ruleenginepackages;
use App\Models\UserAdmin\BookingDetsails;
use App\Models\UserAdmin\BookingAdult;
use App\Models\UserAdmin\BookingChild;
use App\Models\UserAdmin\BookingInfant;
use App\Helpers\customeIDgenerator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserAdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function JourneyDetailsSave(Request $request)
     { 
        //  echo($request->journeyDate);die();
 
         $bookId = customeIDgenerator::IDGenerator(new BookingDetsails, 'booking_code', 3, 'TRV');
         // echo($bookId);die();
         $bookingDetsials = new BookingDetsails();
 
         $bookingDetsials->booking_code = $bookId;  
         $bookingDetsials->user_id =  Auth::user()->id;
         if($request->hdndepartureFlag > 0){
            $bookingDetsials->journey_date = $request->ddljourneyDate;
         }else{
             $bookingDetsials->journey_date = $request->journeyDate;
         }
         $bookingDetsials->city_id = $request->selectcity;
         $bookingDetsials->pacakge_id = $request->hdnPacakgeID;
         $bookingDetsials->pacakge_cost = $request->pacakagePrice;
         $bookingDetsials->child_discount = $request->hiddenchild_discount;
         $bookingDetsials->user_address = $request->bookAddress;
         $bookingDetsials->user_state = $request->bookState;
         $bookingDetsials->user_city = $request->bookCity;
         $bookingDetsials->user_country = $request->bookCountry;
         $bookingDetsials->user_pincode = $request->bookPincode;
         $bookingDetsials->user_phone = Auth::user()->phonenumber;
         $bookingDetsials->user_email = Auth::user()->email;
         $bookingDetsials->save();
 
         if ($bookingDetsials) {
             return response()->json(['success' => true, 'message' => 'success', 'bookingID'=> $bookId]);
         } else {
             return response()->json(['success' => false, 'message' => 'error']);
         }
        
         // return view('useradmin.userJourneyPersonDetails');
     }
    //  ****** ADULT PORTION ****
     public function noofadultCount(Request $request)
     {   
         $fetchAdultCount = BookingAdult::where('booking_code', $request->bookingID)
         ->where('user_id',$request->userID)
         ->count(); 
         if ($fetchAdultCount > 0) {
             return response()->json(['success' => true,  'count'=>$fetchAdultCount]);            
         } else {            
             return response()->json(['success' => true,  'count'=>$fetchAdultCount]);
         }
     }
     public function AdultStore(Request $request)
     {
           
         $bookingID = $request->bookingID;
         $noOfadult = $request->noOfadult;
         $fullname = $request->fullname;
         $age = $request->age;
         $sex = $request->sex;
         $mode = $request->mode;
        
         $result = BookingAdult::insert([
             "booking_code" => $bookingID,
             "user_id" => Auth::user()->id,
             "full_name" => $fullname,
             "age" => $age,
             "sex" => $sex,
         ]);
         
         if ($result) {    
            $updatebookingdetails= DB::table('bookingdetails')
            ->where('booking_code', $bookingID)
            ->where('user_id', Auth::user()->id)
            ->update(array('no_of_adult' => $noOfadult));       
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(["errors" => "Data not saved successfully"], 401);
        }
     }

     public function GetnoofadultBybookingId(Request $request)
     {   
        $result = BookingAdult::where('booking_code', $request->bookingID)
        ->where('user_id',$request->userID)
        ->get(); 
       
        return response()->json([
            'result'=>$result,
          ]);
     }
     public function DeleteAdultRiderDetails($id)
     {
       $del_AdultRider_id=BookingAdult::find($id);
       $del_AdultRider_id->delete();
       return response()->json([
         'status'=>200,
         'message'=>'Deleted successfully',
       ]);
     }

     //  ****** CHILD ADULT PORTION ****

     public function noofChildadultCount(Request $request)
     {   
         $fetchAdultCount = BookingChild::where('booking_code', $request->bookingID)
         ->where('user_id',$request->userID)
         ->count(); 
         if ($fetchAdultCount > 0) {
             return response()->json(['success' => true,  'count'=>$fetchAdultCount]);            
         } else {            
             return response()->json(['success' => true,  'count'=>$fetchAdultCount]);
         }
     }
     public function ChildAdultStore(Request $request)
     {
 
         $bookingID = $request->bookingID;
         $fullname = $request->fullname;
         $noofchild = $request->noofchild;
         $age = $request->age;
         $sex = $request->sex;
         $mode = $request->mode;
         $result = BookingChild::insert([
             "booking_code" => $bookingID,
             "user_id" => Auth::user()->id,
             "full_name" => $fullname,
             "age" => $age,
             "sex" => $sex,
         ]);
         if ($result) {
            $updatebookingdetails= DB::table('bookingdetails')
            ->where('booking_code', $bookingID)
            ->where('user_id', Auth::user()->id)
            ->update(array('no_of_child' => $noofchild));  
             return response()->json(['success' => true, 'message' => 'success']);
           } else {
               return response()->json(["errors" => "Data not saved successfully"], 401);
           }
     }
     public function GetnoofChildadultBybookingId(Request $request)
     {   
        $result = BookingChild::where('booking_code', $request->bookingID)
        ->where('user_id',$request->userID)
        ->get(); 
       
        return response()->json([
            'result'=>$result,
          ]);
     }

     public function DeleteChildRiderDetails($id)
     {
       $del_ChildRider_id=BookingChild::find($id);
       $del_ChildRider_id->delete();
       return response()->json([
         'status'=>200,
         'message'=>'Deleted successfully',
       ]);
     }
    //  ******* INFANT PORTION *****
    public function noofInfantCount(Request $request)
     {   
         $fetchAdultCount = BookingInfant::where('booking_code', $request->bookingID)
         ->where('user_id',$request->userID)
         ->count(); 
         if ($fetchAdultCount > 0) {
             return response()->json(['success' => true,  'count'=>$fetchAdultCount]);            
         } else {            
             return response()->json(['success' => true,  'count'=>$fetchAdultCount]);
         }
     }
     public function InfantStore(Request $request)
     {
 
         $bookingID = $request->bookingID;
         $fullname = $request->fullname;
         $noofinfant= $request->noofinfant;
         $age = $request->age;
         $sex = $request->sex;
         $mode = $request->mode;
         $result = BookingInfant::insert([
             "booking_code" => $bookingID,
             "user_id" => Auth::user()->id,
             "full_name" => $fullname,
             "age" => $age,
             "sex" => $sex,
         ]);
         if ($result) {
            $updatebookingdetails= DB::table('bookingdetails')
            ->where('booking_code', $bookingID)
            ->where('user_id', Auth::user()->id)
            ->update(array('no_of_infant' => $noofinfant)); 
             return response()->json(['success' => true, 'message' => 'success']);
           } else {
               return response()->json(["errors" => "Data not saved successfully"], 401);
           }
     }
     public function GetnoofInfantBybookingId(Request $request)
     {   
        $result = BookingInfant::where('booking_code', $request->bookingID)
        ->where('user_id',$request->userID)
        ->get(); 
       
        return response()->json([
            'result'=>$result,
          ]);
     }

     public function DeleteInfantRiderDetails($id)
     {
       $del_InfantRider_id=BookingInfant::find($id);
       $del_InfantRider_id->delete();
       return response()->json([
         'status'=>200,
         'message'=>'Deleted successfully',
       ]);
     }


     public function FamilyDetailsUpdate(Request $request)
     {
           
         $bookingID = $request->bookingID;
         $noOfadult = $request->noOfadult;
         $noOfchild = $request->noofchild;
         $noOfinfant = $request->noofinfant;
         
         $updatebookingdetails= DB::table('bookingdetails')
            ->where('booking_code', $bookingID)
            ->where('user_id', Auth::user()->id)
            ->update(array('no_of_adult' => $noOfadult , 'no_of_child' => $noOfchild, 'no_of_infant' => $noOfinfant));    
                 
            return response()->json(['success' => true, 'message' => 'success']);
        
     }

     public function JourneyDetailsUpdate(Request $request)
     {
        $bookingID= $request->hdbBookingID;
        $bookingCode= $request->hdbBookingcode;
        $resultBookingDetsails = BookingDetsails::find($bookingID);
       
        $resultBookingDetsails->city_id = $request->selectcity;
        $resultBookingDetsails->journey_date =  $request->journeyDate;        
        $resultBookingDetsails->user_address =  $request->bookAddress;
        $resultBookingDetsails->user_state = $request->bookState;
        $resultBookingDetsails->user_city =  $request->bookCity;
        $resultBookingDetsails->user_country =  $request->bookCountry;
        $resultBookingDetsails->user_pincode =  $request->bookPincode;
        $resultBookingDetsails->save();       

        if ($resultBookingDetsails) {           
             return response()->json(['success' => true, 'message' => 'success','bookingID'=> $bookingCode]);
           } else {
               return response()->json(["errors" => "Data not saved successfully"], 401);
           }

     }
    
}
