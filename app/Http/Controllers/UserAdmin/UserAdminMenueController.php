<?php

namespace App\Http\Controllers\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\CompanyProfile;
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
use App\Models\User;
use App\Models\UserAdmin\BookingDetsails;
use App\Models\UserAdmin\BookingAdult;
use App\Models\UserAdmin\BookingChild;
use App\Models\UserAdmin\BookingInfant;
use App\Models\UserAdmin\PGTransaction;
use App\Helpers\customeIDgenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserAdminMenueController extends Controller
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

    //admin part
    public function userDashboard()
    {
        $fetchBookingDetailsCount = BookingDetsails::where('user_id', Auth::user()->id)->count();
        $fetchBookingDetails = BookingDetsails::where('user_id', Auth::user()->id)->get();
        $fetchPendingBookingDetails = BookingDetsails::where('user_id', Auth::user()->id)->where('booking_status', 0)->count();

        $data['detailsCount'] = $fetchBookingDetailsCount;
        $data['details'] = $fetchBookingDetails;
        $data['pendingDetails'] = $fetchPendingBookingDetails;

        return view('useradmin.userdashboard',$data);
    }

    public function writeReviews()
    {
        return view('useradmin.writeReviews');
    }

    public function addwriteReviews()
    {
        return view('useradmin.addReview');
    }
    public function reviews()
    {
        return view('useradmin.reviews');
    }
    public function allReviewPhotos()
    {
        return view('useradmin.allReviewPhotos');
    }

    public function transferDatatobook($userid, $startdate, $selectedcity, $pacakageID, $adults, $childs, $infants, $pricePeroerson)
    {
        $data['userid']=$userid;
        $data['startdate']=$startdate;
        $data['selectedcity']=$selectedcity;
        $data['pacakageID']=$pacakageID;
        $data['pricePeroerson']=$pricePeroerson;
        $data['adults']=$adults;
        $data['childs']=$childs;
        $data['infants']=$infants;


        $data['username']=User::where('id', $userid)->first();
        
        $data['cities'] =  City::orderByRaw('city_name ASC')->get();

        $data['pacakgeavail'] = DB::table('packages as pack')
        ->join('packages_availabilities as packav', 'packav.package_id', '=', 'pack.id')
        ->where('packav.package_id',  $pacakageID)
        ->where('pack.groupdepartureflag', 1)
        ->select('pack.id as id', 'packav.availability_date as availability_date',
        'pack.groupdepartureflag as flag')
        ->orderByRaw('packav.availability_date')->get();

        $date = Carbon::now();
        $data['todaysDate'] =  $date->toDateString();

        $data['pacakageName']= Package::where('id', $pacakageID)->first();

        return view('useradmin.userbooking', $data);
    }


    public function Journeymembaerget($bookingID, $adults, $childs , $infants)
    {
        return view('useradmin.userJourneyPersonDetails', compact('bookingID','adults', 'childs' , 'infants'));
    }

    public function viewBooking($bookingID)
    {
        $fetchBookingDetails = BookingDetsails::where('booking_code', $bookingID)->first();
        $pacakage = Package::where('id',$fetchBookingDetails['pacakge_id'])->get();
        $data['category'] = $pacakage[0]['category'];
        $data['groupdepartureflag'] = $pacakage[0]['groupdepartureflag'];
        // echo( $data['groupdepartureflag']);die();
        
        $data['details'] = $fetchBookingDetails;
        $data['bookingID'] = $bookingID;

        $data['adultdetails'] = BookingAdult::where('booking_code', $bookingID)
        ->where('user_id', Auth::user()->id)
        ->get();

        $data['childdetails'] = BookingChild::where('booking_code', $bookingID)
        ->where('user_id', Auth::user()->id)
        ->get();

        $data['infantdetails'] = BookingInfant::where('booking_code', $bookingID)
        ->where('user_id', Auth::user()->id)
        ->get();

        
        //echo($data['adultdetails']);die();


        return view('useradmin.viewuserbooking', $data);
    }



     public function GetDetailsForEdit($bookingID)
    {
        $fetchBookingDetails = BookingDetsails::where('booking_code', $bookingID)->first();
        $data['cities'] =  City::orderByRaw('city_name ASC')->get();
        $data['details'] = $fetchBookingDetails;
        $data['bookingID'] = $bookingID;

        //echo($data['adultdetails']);die();
        // $this->ShowDetailsAtTableAjax($bookingID, $userid);

        return view('useradmin.userbookingEdit', $data);
    }


    public function GetRiderDetailsForEdit($bookingID, $userid)
    {
        $fetchBookingDetails = BookingDetsails::where('booking_code', $bookingID)->where('user_id', $userid)->first();
        $data['details'] = $fetchBookingDetails;
        $data['bookingID'] = $bookingID;
        $data['userid'] = $userid;

        //echo($data['adultdetails']);die();
        // $this->ShowDetailsAtTableAjax($bookingID, $userid);

        return view('useradmin.userJourneyPersonDetailsEdit', $data);
    }

    // public Function ShowDetailsAtTableAjax($bookingID, $userid)
    // {

    //     $dataEdit['adultdetails'] = BookingAdult::where('booking_code', $bookingID)
    //     ->where('user_id', $userid)
    //     ->get();

    //     $dataEdit['childdetails'] = BookingChild::where('booking_code', $bookingID)
    //     ->where('user_id', $userid)
    //     ->get();

    //     $dataEdit['infantdetails'] = BookingInfant::where('booking_code', $bookingID)
    //     ->where('user_id', $userid)
    //     ->get();

    //     return response()->json([
    //         'result'=>$dataEdit,
    //       ]);
    // }

    public function downloadBooking($bookingID)
    {
        $fetchBookingDetails = BookingDetsails::where('booking_code', $bookingID)->where('booking_status', 1)->first();
        $data['details'] = $fetchBookingDetails;
        $data['bookingID'] = $bookingID;

        $data['Totalpac'] =  BookingDetsails::select(DB::raw('sum(no_of_adult + no_of_child + no_of_infant) as total'))->where('booking_code', $bookingID)->where('booking_status', 1)->first();
       
        $data['adultdetails'] = BookingAdult::where('booking_code', $bookingID)
        ->where('user_id', Auth::user()->id)
        ->get();

        $data['childdetails'] = BookingChild::where('booking_code', $bookingID)
        ->where('user_id', Auth::user()->id)
        ->get();

        $data['infantdetails'] = BookingInfant::where('booking_code', $bookingID)
        ->where('user_id', Auth::user()->id)
        ->get();

        $data['totalAmount'] = PGTransaction::where('booking_id', $bookingID)
        ->where('login_user_id', Auth::user()->id)
        ->first();
        // echo($data['adultdetails']);die();

        $data['companylogo'] = CompanyProfile::first();
        return view('useradmin.packageconfirmation', $data);
    }
}
