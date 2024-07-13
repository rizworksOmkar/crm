<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Admin\PackageActivityTrans;
use App\Models\Admin\PackageCityTrans;
use App\Models\Admin\PackageCountryTrans;
use App\Models\Admin\PackageStateTrans;
use App\Models\Admin\PackageTypesTrans;
use App\Models\Admin\AboutUsPages;
use App\Models\Admin\ServicesPages;
use App\Models\Admin\SubServicesPages;
use App\Models\Admin\Season;
use App\Models\Admin\HotelAmenities;
use App\Models\Admin\HotelCategory;
use App\Models\Admin\HotelPropertytype;
use App\Models\Admin\HotelPropertRules;
use App\Models\Admin\HotelTrans;
use App\Models\Admin\HotelCostByRoomTypes;
use App\Models\Admin\HotelRoomDetailsPrices;
use App\Models\Admin\HotelRoomOptions;
use Illuminate\Support\Facades\DB;

class AdminlinkcreateController extends Controller
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
    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function indexCountry()
    {
        $countries = Country::orderByRaw('id DESC')->get();
        return view('admin.index-country', compact('countries'));
    }
    public function addCountry()
    {
        return view('admin.add-country');
    }
    public function indexState()
    {
        $states = State::orderByRaw('id DESC')->get();
        return view('admin.index-state', compact('states'));
    }
    public function addState()
    {
        $countries = Country::where('d_i_f', 1)->get();
        return view('admin.add-state', compact('countries'));
    }
    public function addCity()
    {
        $countries = Country::all();
        $states = State::all();
        return view('admin.add-city', compact('countries', 'states'));
    }
    public function indexCity()
    {
        $cities = City::orderByRaw('id DESC')->get();
        return view('admin.index-city', compact('cities'));
    }
    public function indexSight(){
     $sights = Sight::orderByRaw('id DESC')->get();
     return view('admin.index-sight', compact('sights'));
    }
    //destination
    public function indexDestination(){
     $destinations = Destination::orderByRaw('id DESC')->get();
     return view('admin.index-destination', compact('destinations'));
    }
    //hotel
    public function indexHotel(){
     $hotels = Hotel::orderByRaw('id DESC')->get();
     return view('admin.index-hotel', compact('hotels'));
    }

    //package
    public function indexPackage(){
     $packages = Package::orderByRaw('id DESC')->get();
     return view('admin.index-package', compact('packages'));
    }
    public function editPackage($id) {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $destinations = Destination::all();
        $packageType = PackageType::all();
        $packageActivity = PackageActivity::all();
        $package = Package::find($id);
       // echo($package->package_image);die();
        return view('admin.edit-package', compact('countries', 'states', 'cities', 'destinations', 'package', 'packageType', 'packageActivity'));
    }

    //transport
    public function indexTransport(){
     $transports = Transport::orderByRaw('id DESC')->get();
     return view('admin.index-transport', compact('transports'));
    }
    //meal
    public function indexMeal(){
     $meals = Meal::orderByRaw('id DESC')->get();
     return view('admin.index-meal', compact('meals'));
    }
    //indexPackageType
    public function indexPackageType(){
     $packagetypes = PackageType::orderByRaw('id DESC')->get();
     return view('admin.index-packagetype', compact('packagetypes'));
    }
    //indexPackageActivity
    public function indexPackageActivity(){
     $packageactivities = PackageActivity::orderByRaw('id DESC')->get();
     return view('admin.index-packageactivity', compact('packageactivities'));
    }

    public function editPackageActivity($id) {
        
        $packageActivity = PackageActivity::find($id);       
       // echo($package->package_image);die();
        return view('admin.packageactivity_edit', compact('packageActivity'));
    }






    //rule engine
    // public function ruleEngineIntDestTile()
    // {
    //     $used_destinations = ruleEngineINDT::pluck('destination_id')->toArray();
    //     $destinations = Destination::whereNotIn('id', $used_destinations)->get();
    //     $tiles = ruleEngineINDT::pluck('destination_id', 'tile')->toArray();

    //     return view('admin.rule-international-destination' , compact('destinations', 'tiles'));
    // }


    public function packagetypeiconindex()
    {
        return view('admin.index-packagetype-icon');
    }



    public function pacakgeGallery()
    {
        $packages = Package::all();
        return view('admin.add-packageGallery',compact('packages'));
    }

    public function homePageBannerSet()
    {
        $banner = ruleEngineHompageBanner::orderByRaw('id DESC')->get();
        return view('admin.rule-banner',compact('banner'));
    }

    public function homePageINTPacakagesSet()
    {
        $cities = City::orderByRaw('city_name ASC')->get();
        $packages = Package::where('category', 1)->orderByRaw('id DESC')->get();
        $rulpackages = Ruleenginepackages::where('category', 1)->orderByRaw('id DESC')->get();
        return view('admin.rule-packages-international',compact('packages','rulpackages','cities'));
    }

    public function homePageDOMPacakagesSet()
    {
        $cities = City::orderByRaw('city_name ASC')->get();
        $packages = Package::where('category', 0)->orderByRaw('id DESC')->get();
        $rulpackages = Ruleenginepackages::where('category', 0)->orderByRaw('id DESC')->get();
        return view('admin.rule-packages-domestic',compact('packages','rulpackages','cities'));
    }
    public function createAboutusPage(Request $rewuest)
    {
        // $cities = City::orderByRaw('city_name ASC')->get();
        // $packages = Package::where('category', 0)->orderByRaw('id DESC')->get();
        // $rulpackages = Ruleenginepackages::where('category', 0)->orderByRaw('id DESC')->get();
        $aboutCount=AboutUsPages::count();
        $aboutus = AboutUsPages::all();
        return view('admin.add-aboutus',compact('aboutCount','aboutus'));
    }
    public function createServicesPage(Request $rewuest)
    {
        // $cities = City::orderByRaw('city_name ASC')->get();
        // $packages = Package::where('category', 0)->orderByRaw('id DESC')->get();
        // $rulpackages = Ruleenginepackages::where('category', 0)->orderByRaw('id DESC')->get();
        $servicescount=ServicesPages::count();
        $services = ServicesPages::all();
        return view('admin.add-services',compact('servicescount','services'));
    }


    public function indexsubServicesPage()
    {
        $subServiceCount=SubServicesPages::count();
        $Subservices = SubServicesPages::all();

        return view('admin.index-add-sub-services',compact('subServiceCount','Subservices'));
    }

    public function createsubServicesPage()
    {
        return view('admin.add-sub-services');
    }

    public function editSubServices($id)
    {

        $editsubservicescount = SubServicesPages::where('id',$id)->count();
        $editsubservices  = SubServicesPages::where('id',$id)->get();
        return view('admin.edit-sub-services',compact('editsubservicescount','editsubservices'));
    }
    public function createHotelCost(Request $request)
    {

        $listofHotels = Hotel::orderByRaw('hotel_name ASC')->get();  
        $seasonHotels = Season::orderByRaw('id ASC')->get();  
             
        return view('admin.hotel-pricesetup-index',compact('listofHotels', 'seasonHotels'));
    }
    public function roomWithPrice(Request $request)
    {   
        $hotelRoomPrice = HotelRoomDetailsPrices::orderByRaw('id DESC')->get();
        return view('admin.index-Hotel-create-roomprice',compact('hotelRoomPrice'));
    }
    public function addRoomWithPrice()
    {   
        $listofHotels = Hotel::orderByRaw('hotel_name ASC')->get();  
        return view('admin.add-hotel-room-with-price',compact('listofHotels'));
    }
   
    public function createHotelgallery(Request $request)
    {

        $listofHotels = Hotel::orderByRaw('hotel_name ASC')->get();        
        return view('admin.hotel-gallery-index',compact('listofHotels'));
    }
    public function seasonindex(Request $request)
    {
        $season = Season::all();
        return view('admin.index-season',compact('season'));
    }
    public function seasonadd(Request $request)
    {       
        return view('admin.add-season');
    }
    public function seasonedit($id)
    {

        $seasoncount = Season::where('id',$id)->count();
        $season  = Season::where('id',$id)->get();
        return view('admin.edit-season',compact('seasoncount','season'));
    }

    public function hotelpropertyindex(Request $request)
    {
        $hotelPropertytype = HotelPropertytype::all();
        return view('admin.index-propartytypemaster',compact('hotelPropertytype'));
    }

    public function hotelpropertyadd(Request $request)
    {       
        return view('admin.add-propartytypemaster');
    }
    public function hotelpropertyedit($id)
    {

        $hotelPropertytypecount = HotelPropertytype::where('id',$id)->count();
        $hotelPropertytype  = HotelPropertytype::where('id',$id)->get();
        return view('admin.edit-propartytypemaster',compact('hotelPropertytypecount','hotelPropertytype'));
    }

    public function amenitiesindex(Request $request)
    {
        $hotelAmenities = HotelAmenities::all();
        return view('admin.index-amenities',compact('hotelAmenities'));
    }

    public function Amenitiesadd(Request $request)
    {       
        return view('admin.add-amenities');
    }

    public function Amenitiesedit($id)
    {

        $HotelAmenitiescount = HotelAmenities::where('id',$id)->count();
        $HotelAmenities  = HotelAmenities::where('id',$id)->get();
        return view('admin.edit-amenities',compact('HotelAmenitiescount','HotelAmenities'));
    }

    public function editHotel($id) {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $HotelProperty = HotelPropertytype::all();
        $hotel = Hotel::find($id);
       // echo($package->package_image);die();
        return view('admin.edit-hotel', compact('countries', 'states', 'cities', 'hotel','HotelProperty'));
    }

    public function createHotelfacilities(Request $request)
    {

        $listofHotels = Hotel::orderByRaw('hotel_name ASC')->get();   
        $listofAmenities = HotelAmenities::orderByRaw('amenities ASC')->get();   
        $listofPropRules = HotelPropertRules::orderByRaw('property_rules ASC')->get();   
        return view('admin.hotel-facilities-index',compact('listofHotels','listofAmenities','listofPropRules'));
    }


    public function hotelpropertyrulesindex(Request $request)
    {
        $hotelPropertRules = HotelPropertRules::all();
        return view('admin.index-propartyRulesmaster',compact('hotelPropertRules'));
    }

    public function hotelpropertyrulesaddd(Request $request)
    {       
        return view('admin.add-propartyRulesMaster');
    }

    public function hotelpropertyrulesedit($id)
    {

        $HotelPropertRulescount = HotelPropertRules::where('id',$id)->count();
        $HotelPropertRules  = HotelPropertRules::where('id',$id)->get();
        return view('admin.edit-propartyRulesMaster',compact('HotelPropertRulescount','HotelPropertRules'));
    }

    public function roomOption()
    {   
        $listofHotels = Hotel::orderByRaw('hotel_name ASC')->get();
        return view('admin.hotel-rooms-option-index',compact('listofHotels'));
    }

    public function indexPackageavailability()
    {
        $packages = Package::where('groupdepartureflag',1)->get();
        //$seasonpackages = Season::orderByRaw('id ASC')->get(); 
        return view('admin.add-packageAvailability', compact('packages'));
    }
}
