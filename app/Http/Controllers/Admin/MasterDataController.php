<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Models\Admin\Destination;
use App\Models\Admin\Package;
use App\Models\Admin\Sight;
use App\Models\Admin\Itinerary;
use App\Models\Admin\ItineraryTrans;
use App\Models\Admin\Hotel;
use App\Models\Admin\Transport;
use App\Models\Admin\Meal;
use App\Models\Admin\PackageActivity;
use App\Models\Admin\PackageType;
use App\Models\Admin\ruleEngineINDT;
use App\Models\Admin\PackageGallery;
use App\Models\Admin\PackageActivityTrans;
use App\Models\Admin\PackageCityTrans;
use App\Models\Admin\PackageCountryTrans;
use App\Models\Admin\PackageStateTrans;
use App\Models\Admin\PackageTypesTrans;
use App\Models\Admin\SubServicesPages;
use App\Models\Admin\Season;
use App\Models\Admin\HotelAmenities;
use App\Models\Admin\HotelCategory;
use App\Models\Admin\HotelPropertytype;
use App\Models\Admin\HotelPropertRules;
use App\Models\Admin\PackagesAvailabilities;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class MasterDataController extends Controller
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

     public function Dashboard(Request $request)
    {
        return view('admin.index');
        // $websiteTotalCount =  Track::sum('website_views');
        // $bookVisitTotalCount =  Audit::sum('book_views');
        // $TotalUser =  user::where('role_type', 'Author')->count();
        // $TotalUserALL =  user::where('role_type', 'Author')->get();
        // $TotaActivelUser =  user::where('role_type', 'Author')->where('status', 'Active')->count();
        // $publish_book_count = book::all()->count();
        // $publichBook = book::all();

        // //echo $Eventcount;
        // // echo($websiteTotalCount);die();
        // return view('adminDashboard/landingpage')
        //     ->with('websiteTotalCount', $websiteTotalCount)
        //     ->with('bookVisitTotalCount', $bookVisitTotalCount)
        //     ->with('TotalUser', $TotalUser)
        //     ->with('TotaActivelUser', $TotaActivelUser)
        //     ->with('publish_book_count', $publish_book_count)
        //     ->with('publichBook', $publichBook)
        //     ->with('TotalUserALL', $TotalUserALL);
    }
    public function addDestination()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('admin.add-destination', compact('countries', 'states', 'cities'));
    }

    //editdestination
    public function editDestination($id)
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $destination = Destination::find($id);
        //echo($destination->secondary_photo_1);die();
        return view('admin.edit-destination', compact('countries', 'states', 'cities', 'destination'));
    }

    public function destinationStore(Request $request)
    {



        $validatedData = $request->validate([
            'category' => 'required',
            'destination_name' => 'required',
            'country_id.*' => 'required',
            'state_id.*' => 'nullable',
            'city_id.*' => 'nullable',
            'short_description' => 'nullable',
            'price_range_1' => 'nullable',
            'price_range_2' => 'nullable',
            'main_photo' => 'nullable|image|max:9048',
            'secondary_photo_1' => 'nullable|image|max:9048',

        ]);

        $image = $request->icon_photo;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name_thumbnil = 'thumbnilphoto_'.time().'.png';

        $image_path_thnumbnil = 'storage/admin/img/destination-photos/thumbnil/'.$image_name_thumbnil;
        file_put_contents($image_path_thnumbnil, $image);


        $bannerphoto = null;
        $image_path = '';
        if ($request->hasFile('fpBannerphoto')) {
            $file = $request->file('fpBannerphoto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Bannerphoto_'.time() . '.' . $extension;
            $file->move('storage/admin/img/destination-photos/banner/', $filename);
            $image_path = '/storage/admin/img/destination-photos/banner/' . $filename;
        }

        $destination = new Destination();
        $destination->category = $validatedData['category'];
        $destination->destination_name = $validatedData['destination_name'];

        $destination->short_description = $validatedData['short_description'];
        $destination->price_range_1 = $validatedData['price_range_1'];
        $destination->price_range_2 = $validatedData['price_range_2'];

        $destination->main_photo = $image_path_thnumbnil;
        $destination->secondary_photo_1 = $image_path;

        $countries = $validatedData['country_id'] ?? null;
        if ($countries) {
            $destination->country_id = implode(',', $countries);
        }

        $states = $validatedData['state_id'] ?? null;
        if ($states) {
            $destination->state_id = implode(',', $states);
        }


        $cities = $validatedData['city_id'] ?? null;
        if ($cities) {
            $destination->city_id = implode(',', $cities);
        }

        $destination->save();

        if($destination){

            return response()->json(['success' => true, 'message' => 'success']);
          }
          else{
            return response()->json(['success' => false, 'message' => 'error']);
          }



    }


    public function destinationUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'destination_name' => 'required',
            'country_id.*' => 'required',
            'state_id.*' => 'nullable',
            'city_id.*' => 'nullable',
            'short_description' => 'nullable',
            'price_range_1' => 'nullable',
            'price_range_2' => 'nullable',
            'main_photo' => 'nullable|image|max:9048',
            'secondary_photo_1' => 'nullable|image|max:9048',
        ]);

        $destination = Destination::findOrFail($id);

        $destination->category = $validatedData['category'];
        $destination->destination_name = $validatedData['destination_name'];
        $destination->short_description = $validatedData['short_description'];
        $destination->price_range_1 = $validatedData['price_range_1'];
        $destination->price_range_2 = $validatedData['price_range_2'];

        $countries = $validatedData['country_id'] ?? null;
        if ($countries) {
            $destination->country_id = implode(',', $countries);
        }

        $states = $validatedData['state_id'] ?? null;
        if ($states) {
            $destination->state_id = implode(',', $states);
        }

        $cities = $validatedData['city_id'] ?? null;
        if ($cities) {
            $destination->city_id = implode(',', $cities);
        }

        if ($request->hasFile('icon_photo')) {
            $image = $request->icon_photo;
            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);
            $image = base64_decode($image);
            $image_name_thumbnil = 'thumbnilphoto_' . time() . '.png';
            $image_path_thumbnil = 'storage/admin/img/destination-photos/thumbnil/' . $image_name_thumbnil;
            file_put_contents($image_path_thumbnil, $image);
            $destination->main_photo = $image_path_thumbnil;
        }

        if ($request->hasFile('fpBannerphoto')) {
            $file = $request->file('fpBannerphoto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Bannerphoto_' . time() . '.' . $extension;
            $file->move('storage/admin/img/destination-photos/banner/', $filename);
            $image_path = '/storage/admin/img/destination-photos/banner/' . $filename;
            $destination->secondary_photo_1 = $image_path;
        }

        $destination->save();

        if ($destination) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }
    public function deleteDestination($id)
    {
        $destination = Destination::find($id);
        if (!$destination) {
            return response()->json(['success' => false, 'message' => 'Destination not found']);
        }

        $destination->delete();

        if($destination){
            return response()->json(['success' => true, 'message' => 'Destination deleted successfully']);
          }
          else{
            return response()->json(['success' => false, 'message' => 'error']);
          }

    }



    public function addPackage()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $destinations = Destination::all();
        $packageType = PackageType::all();
        $packageActivity = PackageActivity::all();
        return view('admin.add-package', compact('countries', 'states', 'cities', 'destinations','packageType', 'packageActivity'));
    }



    public function packageStore(Request $request)
    {

        $groupdepartureflag = $request->chkGDFD;
        
        $image = $request->icon_photo;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name_thumbnil = 'packagephoto_'.time().'.png';

        $image_path_thnumbnil = 'storage/admin/img/package-images/'.$image_name_thumbnil;
        file_put_contents($image_path_thnumbnil, $image);



        $img_banner_pacakges = '';
        if ($request->hasFile('fpackagesBannerImages')) {
            $file = $request->file('fpackagesBannerImages');
            $extension = $file->getClientOriginalExtension();
            $filename = 'packagebanner_'.time() . '.' . $extension;
            $file->move('storage/admin/img/package-images/banner/', $filename);
            $img_banner_pacakges = '/storage/admin/img/package-images/banner/'. $filename;
        }        

        $package = new Package();
         $package->category = $request->category;
         $package->package_name = $request->package_name;
         $package->package_image = $image_path_thnumbnil;
         $package->pacakage_banner_images = $img_banner_pacakges;
         $package->for_number_of_days = $request->for_number_of_days;
         $package->for_number_of_nights =$request->for_number_of_nights;

         if($groupdepartureflag){
            $package->groupdepartureflag = $groupdepartureflag;
            $package->groupdeparture =  $request->txtGDFDdate;
        }else{
            $package->groupdepartureflag =0;
        }

         $package->short_description =  Str::limit($request->short_description, 20000, ' (...)');
         $package->long_description = $request->long_description;
         $countries =$request->country_id ?? null;
        if ($countries) {
            $package->country_id = implode(',', $countries);
        }

        $states = $request->state_id ?? null;
        if ($states) {
            $package->state_id = implode(',', $states);
        }
        $cities = $request->city_id ?? null;
        if ($cities) {
            $package->city_id = implode(',', $cities);
        }
        $package->arrival_at = $request->arrival_at;
        $package->departure_at = $request->departure_at;
        if($request->chkFlight){
            $package->pcakage_flight = $request->chkFlight;
        }
        else{
            $package->pcakage_flight = 0;
        }
        if($request->chkTransfer){
            $package->pcakage_transfer = $request->chkTransfer;
        }else{
            $package->pcakage_transfer =0;
        }

        if($request->chkHotel){
            $package->pcakage_hotel = $request->chkHotel;
        }else{
            $package->pcakage_hotel =0;
        }

        if($request->chkSightseeing){
            $package->pcakage_sightseeing = $request->chkSightseeing;
        }else{
            $package->pcakage_sightseeing =0;
        }

        if($request->chkMeals){
            $package->pcakage_meals = $request->chkMeals;
        }else{
            $package->pcakage_meals =0;
        }

        if($request->chkTrain){
            $package->pcakage_train = $request->chkTrain;
        }else{
            $package->pcakage_train =0;
        }

        if($request->chkVisa){
            $package->pcakage_visa = $request->chkVisa;
        }else{
            $package->pcakage_visa =0;
        }



        $package->price_pp =  $request->price_pp;
        $package->discounted_price_pp = $request->discounted_price_pp;
        $package->rack_price = $request->rack_rate;
        $package->on_season_price_pp = $request->on_season_rate;
        $package->mid_season_price_pp = $request->mid_season_rate;
        $package->off_season_price_pp = $request->off_season_rate;
        $package->festive_season_price_pp = $request->festive_season_rate;
        $package->agent_price_pp = $request->agent_price_pp;
        $package->agent_price_type = $request->agentdescounttype;
        $package->normal_price_pp = $request->normal_price_pp;
        $package->normal_price_type = $request->normaldescounttype;
        $package->child_discount = $request->number_child_persentage;
        $package_type_id = $request->package_type_id ?? null;
        if ($package_type_id) {
            $package->package_type_id = implode(',', $package_type_id);
        }
        $activity_type_id = $request->activity_type_id ?? null;
        if ($activity_type_id) {
            $package->activity_type_id = implode(',', $activity_type_id);
        }

        $package->pacakage_inclusion = $request->pacakage_inclusion;
        $package->pacakage_exclusions = $request->pacakage_exclusions;
        $package->payment_policy = $request->payment_policy;
        $package->cancelation_policy = $request->cancelation_policy;
        $package->terms_conditions = $request->terms_conditions;
        $package->save();
        if($package){
            // insert Into package_country_trans
            foreach ($countries as $packCountryID) {
                $package_countries_trans = new PackageCountryTrans();
                $package_countries_trans->package_id = $package->id;
                $package_countries_trans->country_id = $packCountryID;
                $package_countries_trans->save();
            }

            // insert Into package_State_trans
            if ($states) {
                foreach ($states as $packStatesID) {
                    $package_sateid_trans = new PackageStateTrans();
                    $package_sateid_trans->package_id = $package->id;
                    $package_sateid_trans->state_id = $packStatesID;
                    $package_sateid_trans->save();
                }
            }
            // // insert Into package_city_trans
            if ($cities) {
                foreach ($cities as $packCitiesID) {
                    $package_city_trans = new PackageCityTrans();
                    $package_city_trans->package_id = $package->id;
                    $package_city_trans->city_id = $packCitiesID;
                    $package_city_trans->save();
                }
            }

            if ($package_type_id) {

                foreach ($package_type_id as $packTypeID) {
                    $package_Type_trans = new PackageTypesTrans();
                    $package_Type_trans->package_id = $package->id;
                    $package_Type_trans->package_types_id = $packTypeID;
                    $package_Type_trans->save();
                }

            }

            if ($activity_type_id) {
                foreach ($activity_type_id as $packActivityID) {
                    $package_Activity_trans = new PackageActivityTrans();
                    $package_Activity_trans->package_id = $package->id;
                    $package_Activity_trans->activity_id = $packActivityID;
                    $package_Activity_trans->save();
                }
            }

            return response()->json(['success' => true, 'message' => 'success']);
          }
          else{
            return response()->json(['success' => false, 'message' => 'error']);
          }

        // return redirect()->back()->with('success', 'Package added successfully');


    }

    public function updatePackage(Request $request, $id)
    {
        $groupdepartureflag = $request->chkGDFD;
        $image_path_thnumbnil ="";
        $img_banner_pacakges ="";

        if($request->icon_photo){
            $image = $request->icon_photo;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name_thumbnil = 'packagephoto_'.time().'.png';

            $image_path_thnumbnil = 'storage/admin/img/package-images/'.$image_name_thumbnil;
            file_put_contents($image_path_thnumbnil, $image);
        }else{
            $image_path_thnumbnil = $request->exiting_icon_photo;
        }


        if($request->fpackagesBannerImages){
            $file = $request->file('fpackagesBannerImages');
            $extension = $file->getClientOriginalExtension();
            $filename = 'packagebanner_'.time() . '.' . $extension;
            $file->move('storage/admin/img/package-images/banner/', $filename);
            $img_banner_pacakges = '/storage/admin/img/package-images/banner/'. $filename;
        }else{
            $img_banner_pacakges = $request->exiting_banner_photo;
        }

        $package = Package::find($id);

        $package->category = $request->category;
        $package->package_name = $request->package_name;
        $package->package_image = $image_path_thnumbnil;
        $package->pacakage_banner_images = $img_banner_pacakges;
        $package->for_number_of_days = $request->for_number_of_days;
        $package->for_number_of_nights = $request->for_number_of_nights;
        $package->arrival_at = $request->arrival_at;
        $package->departure_at = $request->departure_at;
        $package->short_description = Str::limit($request->short_description, 20000, ' (...)');
        $package->long_description = $request->long_description;

        if($groupdepartureflag){
            $package->groupdepartureflag = $groupdepartureflag;
            $package->groupdeparture =  $request->txtGDFDdate;
        }else{
            $package->groupdepartureflag =0;
        }
        // Update checkbox values
        $package->pcakage_flight = $request->has('chkFlight') ? $request->chkFlight : 0;
        $package->pcakage_transfer = $request->has('chkTransfer') ? $request->chkTransfer : 0;
        $package->pcakage_hotel = $request->has('chkHotel') ? $request->chkHotel : 0;
        $package->pcakage_sightseeing = $request->has('chkSightseeing') ? $request->chkSightseeing : 0;
        $package->pcakage_meals = $request->has('chkMeals') ? $request->chkMeals : 0;
        $package->pcakage_train = $request->has('chkTrain') ? $request->chkTrain : 0;
        $package->pcakage_visa = $request->has('chkVisa') ? $request->chkVisa : 0;
        // Update image if provided
        // if ($request->hasFile('icon_photo')) {
        //     $image = $request->file('icon_photo');
        //     $image_name = 'packagephoto_' . time() . '.' . $image->getClientOriginalExtension();
        //     $image_path = 'storage/admin/img/package-images/' . $image_name;
        //     $image->storeAs('admin/img/package-images', $image_name);
        //     $package->package_image = $image_path;
        // }



        // Update package rate fields
        $package->price_pp = $request->price_pp;
        $package->discounted_price_pp = $request->discounted_price_pp;
        $package->rack_price = $request->rack_rate;
        $package->on_season_price_pp = $request->on_season_rate;
        $package->mid_season_price_pp = $request->mid_season_rate;
        $package->off_season_price_pp = $request->off_season_rate;
        $package->festive_season_price_pp = $request->festive_season_rate;
        $package->agent_price_pp = $request->agent_price_pp;
        $package->agent_price_type = $request->agentdescounttype;
        $package->normal_price_pp = $request->normal_price_pp;
        $package->normal_price_type = $request->normaldescounttype;
        $package->child_discount = $request->number_child_persentage;
        // Update package type and activity
        $package_type_id = $request->package_type_id ?? [];
        $activity_type_id = $request->activity_type_id ?? [];
        $package->package_type_id = implode(',', $package_type_id);
        $package->activity_type_id = implode(',', $activity_type_id);

        // Update package inclusion, exclusions, and terms & conditions
        $package->pacakage_inclusion = $request->pacakage_inclusion;
        $package->pacakage_exclusions = $request->pacakage_exclusions;
        $package->payment_policy = $request->payment_policy;
        $package->cancelation_policy = $request->cancelation_policy;
        $package->terms_conditions = $request->terms_conditions;

        $package->save();

        return response()->json(['success' => true, 'message' => 'Package updated successfully']);
    }

    //delete package
    public function deletePackages($id)
    {
        $package = Package::find($id);
        $package->delete();

        if($package){
            return response()->json(['success' => true, 'message' => 'Package deleted successfully']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function sightStore(Request $request){

        $validatedData = $request->validate([
            'city_id' => 'required|numeric',
            'country_id' => 'required',
            'sight_name' => 'required',
            'ticket_price' => 'nullable',
            'visiting_time' => 'nullable',
            'restrictions' => 'nullable',
            'notes' => 'nullable'
        ]);

        // Create new Sight object
        $sight = new Sight;
        $sight->city_id = $request->input('city_id');
        $sight->country_id = $request->input('country_id');
        $sight->state_id = $request->input('state_id');
        $sight->sight_name = $request->input('sight_name');
        $sight->ticket_price = $request->input('ticket_price');
        $sight->visiting_time = $request->input('visiting_time');
        $sight->restrictions = $request->input('restrictions');
        $sight->notes = $request->input('notes');

        // Save Sight object to database
        $sight->save();

        if($sight){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
          return response()->json(['success' => false, 'message' => 'error']);
        }
    }










    // Add Sight Master
    public function addSightMaster()
    {
        // $countries = Country::all();
        // $states = State::all();
        $cities = City::all();
        //return view('admin.add-sight', compact('countries', 'states', 'cities'));
        return view('admin.add-sight', compact('cities'));
    }
    // Add Hotel
     public function addHotelMaster()
    {
        // $countries = Country::all();
        // $states = State::all();
         $cities = City::all();
         $HotelProperty = HotelPropertytype::all();
        //return view('admin.add-sight', compact('countries', 'states', 'cities'));
        return view('admin.hotel', compact('cities','HotelProperty'));
    }
    public function hotelStore(Request $request){
        // $validatedData = $request->validate([
        //     'hotel_name' => 'required',
        //     'city_id' => 'required',
        //     'country_id' => 'required',
        //     'state_id' => 'required',
        //     'hotel_star' => 'required',
        //     'hotel_type' => 'required',
        //     'child_policy' => 'nullable',
        //     'child_age_relaxation' => 'nullable',
        //     'extra_breakfast_charge' => 'nullable',
        //     'extra_person_charge' => 'nullable',
        //     'extra_bed_charge' => 'nullable',
        //     'base_discount' => 'nullable',
        //     'special_discount' => 'nullable',
        //     'agent_discount' => 'nullable',
        // ]);
        $image = $request->icon_photo;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name_thumbnil = 'hotelmain_'.time().'.png';

        $image_path_thnumbnil = 'storage/admin/img/hotel-main/'.$image_name_thumbnil;
        file_put_contents($image_path_thnumbnil, $image);

        $hotel = new Hotel();
        $hotel->hotel_name = $request->input('hotel_name');
        $hotel->hotel_description = $request->input('hotel_description');
        $hotel->hotel_imege = $image_path_thnumbnil;
        $hotel->location_name = $request->input('location_name');
        $hotel->city_id = $request->input('city_id');
        $hotel->country_id = $request->input('country_id');
        $hotel->state_id = $request->input('state_id');
        $hotel->hotel_star = $request->input('hotel_star');
        $hotel->hotel_type = $request->input('hotel_type');

        $hotel->breakfast_included = $request->input('ddlbreakfast');
        $hotel->breakfast_cost = $request->input('breakfast_cost');
        $hotel->breakfast_discount = $request->input('discount_breakfast');
        $hotel->breakfast_discount_cost = $request->input('after_discounted_amount');

        $hotel->extrabed_included = $request->input('ddlExtrabed');
        $hotel->extrabed_cost = $request->input('extrabed_cost');
        $hotel->extrabed_discount = $request->input('discount_extrabed');
        $hotel->extrabed_discount_cost = $request->input('after_discounted_extrabedamount');

        $hotel->extraperson_included = $request->input('ddlExtraPerson');
        $hotel->extraperson_cost = $request->input('extra_person_charge');
        $hotel->extraperson_discount = $request->input('discount_extraPerson');
        $hotel->extraperson_discount_cost = $request->input('after_discounted_extraPersonamount');
        $hotel->cancel_date = $request->input('dtpfreecancelation');

        $hotel->child_policy = $request->input('child_policy');
        $hotel->child_age_relaxation = $request->input('child_age_relaxation');
      
        $hotel->minimum_rack_rate = $request->input('rack_rate');
        $hotel->base_discount = $request->input('base_discount');
        $hotel->special_discount = $request->input('special_discount');
        $hotel->agent_discount = $request->input('agent_discount');

        $hotel->wifi = $request->input('chkWifi');
        $hotel->roomservice = $request->input('chkRoomService');
        $hotel->parking = $request->input('chkParking');
        $hotel->restaurants = $request->input('chkRestaurants');
        $hotel->cctv = $request->input('chkCCTV');

        $hotel->check_in_time = $request->input('timecheckin');
        $hotel->check_out_time = $request->input('timeCheckOut');
        $hotel->exclusive_offer = $request->input('txtExclusiveOffer');
        $hotel->save();

        if($hotel){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
          return response()->json(['success' => false, 'message' => 'error']);
        }
    }


    public function updateHotel(Request $request)
    {
        $image_path_thnumbnil ="";

        if($request->icon_photo){
            $image = $request->icon_photo;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name_thumbnil = 'hotelmain_'.time().'.png';

            $image_path_thnumbnil = 'storage/admin/img/hotel-main/'.$image_name_thumbnil;
            file_put_contents($image_path_thnumbnil, $image);
        }else{
            $image_path_thnumbnil = $request->exiting_icon_photo;
        }


        // $package = Package::find($id);

        $hotelMasterUpdate = Hotel::find($request->hdnhotelID);
        $hotelMasterUpdate->hotel_name = $request->input('hotel_name');
        $hotelMasterUpdate->hotel_description = $request->input('hotel_description');
        $hotelMasterUpdate->hotel_imege = $image_path_thnumbnil;
        $hotelMasterUpdate->location_name = $request->input('location_name');
        $hotelMasterUpdate->city_id = $request->input('city_id');
        $hotelMasterUpdate->country_id = $request->input('country_id');
        $hotelMasterUpdate->state_id = $request->input('state_id');
        $hotelMasterUpdate->hotel_star = $request->input('hotel_star');
        $hotelMasterUpdate->hotel_type = $request->input('hotel_type');

        $hotelMasterUpdate->breakfast_included = $request->input('ddlbreakfast');
        $hotelMasterUpdate->breakfast_cost = $request->input('breakfast_cost');
        $hotelMasterUpdate->breakfast_discount = $request->input('discount_breakfast');
        $hotelMasterUpdate->breakfast_discount_cost = $request->input('after_discounted_amount');

        $hotelMasterUpdate->extrabed_included = $request->input('ddlExtrabed');
        $hotelMasterUpdate->extrabed_cost = $request->input('extrabed_cost');
        $hotelMasterUpdate->extrabed_discount = $request->input('discount_extrabed');
        $hotelMasterUpdate->extrabed_discount_cost = $request->input('after_discounted_extrabedamount');

        $hotelMasterUpdate->extraperson_included = $request->input('ddlExtraPerson');
        $hotelMasterUpdate->extraperson_cost = $request->input('extra_person_charge');
        $hotelMasterUpdate->extraperson_discount = $request->input('discount_extraPerson');
        $hotelMasterUpdate->extraperson_discount_cost = $request->input('after_discounted_extraPersonamount');
        $hotelMasterUpdate->cancel_date = $request->input('dtpfreecancelation');

        $hotelMasterUpdate->child_policy = $request->input('child_policy');
        $hotelMasterUpdate->child_age_relaxation = $request->input('child_age_relaxation');
      
        $hotelMasterUpdate->minimum_rack_rate = $request->input('rack_rate');
        $hotelMasterUpdate->base_discount = $request->input('base_discount');
        $hotelMasterUpdate->special_discount = $request->input('special_discount');
        $hotelMasterUpdate->agent_discount = $request->input('agent_discount');

        $hotelMasterUpdate->wifi = $request->input('chkWifi');
        $hotelMasterUpdate->roomservice = $request->input('chkRoomService');
        $hotelMasterUpdate->parking = $request->input('chkParking');
        $hotelMasterUpdate->restaurants = $request->input('chkRestaurants');
        $hotelMasterUpdate->cctv = $request->input('chkCCTV');

        $hotelMasterUpdate->check_in_time = $request->input('timecheckin');
        $hotelMasterUpdate->check_out_time = $request->input('timeCheckOut');
        $hotelMasterUpdate->exclusive_offer = $request->input('txtExclusiveOffer');
        $hotelMasterUpdate->save();

        if($hotelMasterUpdate){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
          return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function hotelDelete(Request $request)
    {
        $deletedid = Hotel::where('id', $request->id)->delete();

    }

    public function addTransportmaster()
    {
        // $countries = Country::all();
        // $states = State::all();
        // $cities = City::all();
        //return view('admin.add-sight', compact('countries', 'states', 'cities'));
        return view('admin.transport');
    }
    public function addMealtypemaster()
    {
        // $countries = Country::all();
        // $states = State::all();
        // $cities = City::all();
        //return view('admin.add-sight', compact('countries', 'states', 'cities'));
        return view('admin.mealtype');
    }
    public function addPackagetypemaster()
    {
        // $countries = Country::all();
        // $states = State::all();
        // $cities = City::all();
        //return view('admin.add-sight', compact('countries', 'states', 'cities'));
        return view('admin.packagetype');
    }
    public function addPackageActivity()
    {
        // $countries = Country::all();
        // $states = State::all();
        // $cities = City::all();
        //return view('admin.add-sight', compact('countries', 'states', 'cities'));
        return view('admin.packageactivity');
    }
    public function getCityDetails($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        $country = $city->country;
        $state = $city->state;

        if ($state) {
            $stateName = $state->state_name;
        } else {
            $stateName = null;
        }

        return response()->json([
            'id' => $id,
            'country_id' => $country->id,
            'country_name' => $country->country_name,
            'state_id' => $state ? $state->id : null,
            'state_name' => $stateName
        ]);
    }

    public function countryDelete(Request $request)
    {
        $deletedid = Country::where('id', $request->id)->delete();

    }
    public function cityDelete(Request $request)
    {
        $deletedid = City::where('id', $request->id)->delete();

    }

    //Package Itenary
    public function addPackageItinerary()
    {
        $packages = Package::all();
       // echo($packages);die();

        return view('admin.add-package-itenary', compact('packages'));
    }
    public function getPackageDetails(Request $request)
    {
        $package = Package::findOrFail($request->id);

        $city_ids = explode(',', $package->city_id);

        $cities = City::whereIn('id', $city_ids)->get();

        $for_number_of_days = $package->for_number_of_days;

        return response()->json([
            'cities' => $cities,
            'for_number_of_days' => $for_number_of_days
        ]);
    }

    public function getModeDetails(Request $request){
        $mode = $request->input('mode');
        $cityId = $request->input('city_id');

        switch ($mode) {
            case 'Travel':
                $data = Transport::all();
                break;
            case 'Hotel':
                $data = Hotel::where('city_id', $cityId)->get();
                break;
            case 'Sight':
                $data = Sight::where('city_id', $cityId)->get();
                break;
            case 'Meal':
                $data = Meal::all();
                break;
            default:
                $data = [];
                break;
        }

        return response()->json($data);
    }



    public function packageItineraryStore(Request $request)
    {

       

        $packageid = $request->packageid;
        $days = $request->days;
        $time = $request->time;
        $city = $request->city;
        $mode = $request->mode;
        $modedetails = $request->modedetails;
        $a_d = $request->a_d;
        $remarks = $request->remarks;
        $result = ItineraryTrans::insert([
            "package_id" => $packageid,
            "day" => $days,
            "time" => $time,
            "city" => $city,
            "a_d" => $a_d,
            "mode" => $mode,
            "sight_name" => $modedetails,
            "remarks" => $remarks,
        ]);
        if ($result) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }



    public function packageItineraryDetails(Request $request)
    {
        $packageid = $request->packageid;
        $result = DB::table('itinerary_trans as itr')
        ->join('cities as ct', 'itr.city', '=', 'ct.id')
        ->where('itr.package_id', $packageid)
        ->select('itr.id as id', 'itr.package_id as package_id', 'itr.day as day','itr.time as time',
        'ct.city_name as city', 'itr.a_d as a_d' , 'itr.mode as mode', 'itr.sight_name as sight_name',
        'itr.remarks as remarks')->get();
        // $result = ItineraryTrans::where('package_id', $packageid)->get();
        return response()->json([
          'result'=>$result,
        ]);
    }

    public function deleteItenaryDetails($id)
    {
      $del_itenary_id=ItineraryTrans::find($id);
      $del_itenary_id->delete();
      return response()->json([
        'status'=>200,
        'message'=>'Deleted successfully',
      ]);
    }

    //Transport
    public function transportStore(Request $request)
    {
        $validatedData = $request->validate([
            'transport_name' => 'required',

        ]);

        // Create new Transport object
        $transport = new Transport;
        $transport->transport_name = $request->input('transport_name');


        // Save Transport object to database
        $transport->save();

        if ($transport) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    //Meal Type
    public function mealTypeStore(Request $request)
    {
        $validatedData = $request->validate([
            'meal_type' => 'required',

        ]);

        // Create new MealType object
        $mealType = new Meal;
        $mealType->meal_type = $request->input('meal_type');
        $mealType->save();

        if ($mealType) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    //Package Activity Type
    public function packageActivityStore(Request $request)
    {
        // $validatedData = $request->validate([
        //     'package_activity' => 'required',

        // ]);
        $image = $request->icon_photo;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        $image_path = 'storage/package-activity/'.$image_name;
        file_put_contents($image_path, $image);

        // Create new PackageActivity object
        $packageActivity = new PackageActivity;
        $packageActivity->package_activity = $request->input('package_activity');
        $packageActivity->activity_images = $image_path;
        $packageActivity->save();

        if ($packageActivity) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }


    public function packageActivityUpdate(Request $request)
    {
        // $validatedData = $request->validate([
        //     'package_activity' => 'required',

        // ]);
        $image_path = "";
        $image = $request->icon_photo;
        if($request->icon_photo){
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name = time().'.png';
    
            $image_path = 'storage/package-activity/'.$image_name;
            file_put_contents($image_path, $image);
        }else{
            $image_path = $request->hdnImagepath;
        }
        
        // Create new PackageActivity object
        $packageActivity = PackageActivity::find($request->hdnId);
        $packageActivity->package_activity = $request->input('package_activity');
        $packageActivity->activity_images = $image_path;
        $packageActivity->save();

        if ($packageActivity) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function deletePackageActivity($id)
        {
            $package = PackageActivity::find($id);
            $package->delete();
    
            if($package){
                return response()->json(['success' => true, 'message' => 'Package deleted successfully']);
            }
            else{
                return response()->json(['success' => false, 'message' => 'error']);
            }
        }

    //Package Type
    public function packageTypeStore(Request $request)
    {

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        $image_path = 'storage/icon/'.$image_name;
        file_put_contents($image_path, $image);

        //@unlink('storage/icon/'.$user->image);

        // Create new PackageType object
        $packageType = new PackageType;
        $packageType->package_type = $request->packagetype;
        $packageType->icone_image = $image_path;
        $packageType->save();
        if ($packageType) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    //fucntion for package type

    public function deletepackageType(Request $request)
    {
        $deletedid = PackageType::where('id', $request->id)->delete();

    }
    public function editPackagetypemaster($id){
        $editPackagetypemastercount = PackageType::where('id', $id)->count();
        $editPackagetypemasterbyId = PackageType::find($id);
        //echo($editbyId);die();
        return view('admin.packagetype_edit')->with('editPackagetypemastercount',  $editPackagetypemastercount)->with('editPackagetypemasterbyId', $editPackagetypemasterbyId);
    }

    public function packageTypeUpdate(Request $request)
    {
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        $image_path = 'storage/icon/'.$image_name;
        file_put_contents($image_path, $image);

        @unlink('storage/icon/'.$request->image);

        // Create new PackageType object
        $packageType = PackageType::find($request->id);
        $packageType->package_type = $request->packagetype;
        $packageType->icone_image = $image_path;
        $packageType->save();
        if ($packageType) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }


    //rule engine
    //The function is used to store 8 tiles, where it first checks if the tile number already exists, if it does, it updates the destination id, if it doesn't, it creates a new rule
    // public function ruleEngineStore(Request $request)
    // {
    //     $request->validate([
    //         'destination_id' => 'integer|exists:destinations,id', // validate the destination id
    //         'tile' => 'integer' // validate the tile number
    //     ]);

    //     $existingRule = ruleEngineINDT::where('tile', $request->input('tile'))->first(); //

    //     if($existingRule) {

    //         $existingRule->destination_id = $request->input('destination_id');
    //         $existingRule->save();


    //         $newRule = ruleEngineINDT::create([
    //             'tile' => $request->input('tile'),
    //             'destination_id' => $request->input('destination_id')
    //         ]);

    //         if ($newRule) {
    //             return response()->json(['success' => true, 'message' => 'success']);
    //         } else {
    //             return response()->json(['success' => false, 'message' => 'error']);
    //         }
    //     } else {

    //         $newRule = ruleEngineINDT::create([
    //             'tile' => $request->input('tile'),
    //             'destination_id' => $request->input('destination_id')
    //         ]);

    //         if ($newRule) {
    //             return response()->json(['success' => true, 'message' => 'success']);
    //         } else {
    //             return response()->json(['success' => false, 'message' => 'error']);
    //         }
    //     }
    // }


    public function chkcountryDI(Request $request){
       $countryID = $request->countryid;
       $fetchRecord= Country::where('id', $countryID)->get();

       $countryIorD = $fetchRecord[0]['d_i_f'];
    //    echo($countryIorD);die();
       return response()->json(['success' => true, 'countryINTorDOM' => $countryIorD]);
    }

    public function stateFetch(Request $request){
        $countryID = $request->countryid;
        $result = State::where("country_id", $countryID)->get();
        return $result;


     }

    public function packageGalleryStore(Request $request)
    {
        // $image = $request->icon_photo;
        // list($type, $image) = explode(';', $image);
        // list(, $image)      = explode(',', $image);
        // $image = base64_decode($image);
        // $image_name_thumbnil = 'packagegallery_'.time().'.png';

        // $image_path_thnumbnil = 'storage/packages-gallery/'.$image_name_thumbnil;
        // file_put_contents($image_path_thnumbnil, $image);



        $image_path_gal = '';
        if ($request->hasFile('fpGalleryImages')) {
            $file = $request->file('fpGalleryImages');
            $extension = $file->getClientOriginalExtension();
            $filename = 'packagegallery_'.time() . '.' . $extension;
            $file->move('storage/packages-gallery/', $filename);
            $image_path_gal = 'storage/packages-gallery/'. $filename;
        }

        // Create new PackageType object
        $packagegallery = new PackageGallery();
        $packagegallery->package_id = $request->input('package_id');
        $packagegallery->gallery_image =  $image_path_gal;
        $packagegallery->save();

        if($packagegallery){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
          return response()->json(['success' => false, 'message' => 'error']);
        }

    }

    public function pacakgeGalleryGet(Request $request)
    {
        $pacakgeID = $request->id;
        $result = DB::table('package_gallery_images as pgi')
        ->join('packages as pc', 'pgi.package_id', '=', 'pc.id')
        ->select('pgi.id as id', 'pc.package_name as name','pgi.gallery_image as image')
        ->where('pgi.package_id', $pacakgeID)
        ->get();
        //echo($result);die();
         return response()->json([
            'result'=>$result,
          ]);
     }

     public function deleteGalleryDetails($id)
     {

       $del_gallery_id=PackageGallery::find($id);
       $del_gallery_id->delete();
       return response()->json([
         'status'=>200,
         'message'=>'Deleted successfully',
       ]);
     }

     public function getDaysCityonItenarytrans(Request $request)
     {
         $packageid = $request->packageid;
         $itenaryDaysbySave ="";

         $noOfDaysbycity = DB::table('itinerary_trans')
        ->join('cities', 'itinerary_trans.city', '=', 'cities.id')
        ->select(DB::raw('COUNT(DISTINCT(`day`)) AS Days'), 'cities.city_name AS City')
        ->where('itinerary_trans.package_id', $packageid)
        ->groupBy('itinerary_trans.city')
        ->get();

        //echo($noOfDaysbycity);die();
        foreach ($noOfDaysbycity as $days) {
            $itenaryDaysbySave .= $days->City.' ('.$days->Days.'D)'.' - ';
        }

        // echo($itenaryDaysbySave);die();
        $updatepacakgedetails= DB::table('packages')
            ->where('id', $packageid)
            ->update(array('noofdaysbycity' => $itenaryDaysbySave));

         return response()->json(['success' => true, 'message' => 'success']);

     }
     public function seasonstore(Request $request)
     {
         $Seasonsave = new Season();
         $Seasonsave->season_name = $request->txtseason;        
         $Seasonsave->save();
         if($Seasonsave){ 
             return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'error']);
        }
 
     }
     public function seasonupdate(Request $request)
     {
         
         // Create new PackageType object
         $seasonupdate = Season::find($request->hdnId);
         $seasonupdate->season_name = $request->txtseason;           
         $seasonupdate->save();
         if ($seasonupdate) {
             return response()->json(['success' => true, 'message' => 'success']);
         } else {
             return response()->json(['success' => false, 'message' => 'error']);
         }
     }
     public function seasondelete(Request $request)
     {
         $deletedid = Season::where('id', $request->id)->delete();
 
     }

     public function hotelpropertystore(Request $request)
     {
         $HotelPropertytypesave = new HotelPropertytype();
         $HotelPropertytypesave->propertytype = $request->txtproperty;        
         $HotelPropertytypesave->save();
         if($HotelPropertytypesave){ 
             return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'error']);
        }
 
     }

     public function hotelpropertydelete(Request $request)
     {
         $deletedid = HotelPropertytype::where('id', $request->id)->delete();
 
     }
     public function hotelpropertyupdate(Request $request)
     {
         
         // Create new PackageType object
         $HotelPropertytypeupdate = HotelPropertytype::find($request->hdnId);
         $HotelPropertytypeupdate->propertytype = $request->txtproperty;           
         $HotelPropertytypeupdate->save();
         if ($HotelPropertytypeupdate) {
             return response()->json(['success' => true, 'message' => 'success']);
         } else {
             return response()->json(['success' => false, 'message' => 'error']);
         }
     }
     public function Amenitiesstore(Request $request)
     {
         $Amenitiessave = new HotelAmenities();
         $Amenitiessave->amenities = $request->txtamenities;        
         $Amenitiessave->save();
         if($Amenitiessave){ 
             return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'error']);
        }
 
     }

     public function Amenitiesdelete(Request $request)
     {
         $deletedid = HotelAmenities::where('id', $request->id)->delete();
 
     }

     public function Amenitiesupdate(Request $request)
     {
         
         // Create new PackageType object
         $HotelAmenitiesupdate = HotelAmenities::find($request->hdnId);
         $HotelAmenitiesupdate->amenities = $request->txtamenities;           
         $HotelAmenitiesupdate->save();
         if ($HotelAmenitiesupdate) {
             return response()->json(['success' => true, 'message' => 'success']);
         } else {
             return response()->json(['success' => false, 'message' => 'error']);
         }
     }

     public function hotelpropertyrulesstore(Request $request)
     {
         $HotelPropertyRulessave = new HotelPropertRules();
         $HotelPropertyRulessave->property_rules = $request->txtpropertyrules;        
         $HotelPropertyRulessave->save();
         if($HotelPropertyRulessave){ 
             return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'error']);
        }
 
     }


     public function hotelpropertyrulesupdate(Request $request)
     {
         
         // Create new PackageType object
         $HotelPropertytypeupdate = HotelPropertRules::find($request->hdnId);
         $HotelPropertytypeupdate->property_rules = $request->txtpropertyrules;           
         $HotelPropertytypeupdate->save();
         if ($HotelPropertytypeupdate) {
             return response()->json(['success' => true, 'message' => 'success']);
         } else {
             return response()->json(['success' => false, 'message' => 'error']);
         }
     }


     public function  hotelpropertyrulesdelete(Request $request)
     {
         $deletedid = HotelPropertRules::where('id', $request->id)->delete();
 
     }

     public function getPackageAvailability(Request $request)
     {
         $PackageAvailability = PackagesAvailabilities::where('package_id', $request->packageid)->get();
 
        //  $seasons = DB::table('package_seasons as ps')
        //  ->join('seasones as se', 'ps.season_type', '=', 'se.id')
        //  ->select('ps.id as id','se.season_name as season_name',
        //  'ps.season_start as season_start', 'ps.season_end as season_end')
        //  ->where('ps.package_id', $request->packageid)
        //  ->get();
 
         return response()->json([
             'packagesavailabilities' => $PackageAvailability,
         ]);
     }

     public function PackageAvailabilityStore(Request $request)
     {
         $PAstore = new PackagesAvailabilities();
         $PAstore->package_id = $request->packageid;
        //  $PAstore->display_price = $request->display_price; 
        //  $PAstore->available_price = $request->available_price; 
         $PAstore->availability_date = $request->availability_date;         
         $PAstore->save();
 
 
         if ($PAstore) {
             return response()->json(['success' => true, 'message' => 'success']);
           } else {
               return response()->json(["errors" => "Data not saved successfully"], 401);
           }
     }

      //seasondelete
    public function deletePackageAvailability($id)
    {

        $del_season_id = PackagesAvailabilities::find($id);
        $del_season_id->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }


}
