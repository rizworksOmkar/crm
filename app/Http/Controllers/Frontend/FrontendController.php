<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Models\Admin\Sight;
use App\Models\Admin\Hotel;
use App\Models\Admin\Destination;
use App\Models\Admin\Transport;
use App\Models\Admin\Meal;
use App\Models\Admin\Package;
use Illuminate\Support\Facades\View;
use App\Models\Admin\PackageType;
use App\Models\Admin\PackageActivity;
use App\Models\Admin\ruleEngineINDT;
use App\Models\Admin\ruleEngineDOMDT;
use App\Models\Admin\Itinerary;
use App\Models\Admin\ItineraryTrans;
use App\Models\Admin\PackageGallery;
use App\Models\Admin\ruleEngineHompageBanner;
use App\Models\Admin\Ruleenginepackages;
use App\Models\Admin\AboutUsPages;
use App\Models\Admin\ServicesPages;
use App\Models\Admin\SubServicesPages;
use App\Models\Admin\CompanyProfile;
use App\Models\Admin\CompanyBranch;
use App\Models\Admin\PackagesAvailabilities;
use App\Models\Admin\PackageSeason;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\SiteMailSend;
use App\Mail\SiteAttachmentMailSend;
use Carbon\Carbon;
use App\Helpers\helper;



class FrontendController extends Controller
{
    //user part
    public function index()
    {
        $companyprofileCount = CompanyProfile::count();
        $title = "Home";
        if($companyprofileCount > 0)
        {

                //domestic destination home page carousel rule engine fetch data

                $useddomestic_destinations = ruleEngineDOMDT::pluck('destination_id', 'tile')->toArray();

                $tilesDomestic = [];

                for ($i = 1; $i <= 6; $i++) {
                    $selected_destination = null;

                    if (isset($useddomestic_destinations[$i])) {
                        $selected_destination = Destination::find($useddomestic_destinations[$i]);
                    }

                    $tilesDomestic[$i] = [
                        'tile' => $i,
                        'selected_destination' => $selected_destination
                    ];
                    // print_r($tiles);die();
                }


                //print_r($domestic_destinations);die();
                //end domestic destination home page carousel rule engine fetch data



                //international destination home page tile rule engine fetch data

                $used_destinations = RuleEngineINDT::pluck('destination_id', 'tile')->toArray();

                $tiles = [];

                for ($i = 1; $i <= 8; $i++) {
                    $selected_destination = null;
                    $selected_destination_country = null;

                    if (isset($used_destinations[$i])) {
                        $selected_destination = Destination::find($used_destinations[$i]);
                        $selected_destination_country = Destination::find($used_destinations[$i]);
                    }

                    $tiles[$i] = [
                        'tile' => $i,
                        'selected_destination' => $selected_destination,
                        'selected_destination_country' => $selected_destination_country
                    ];
                    //print_r($selected_destination_country);die();
                }
                //end international destination home page tile rule engine fetch data

                // //international package home page fetch data

                $ruleengine_interpacakge_result = DB::table('rule_engine_packages as rep')
                ->join('packages as pc', 'rep.package_id', '=', 'pc.id')
                ->select('pc.id as id', 'pc.package_name as name','pc.package_image as image', 'pc.rack_price as rack_price',
                'pc.for_number_of_days as days', 'pc.for_number_of_nights as nights','pc.off_season_price_pp as off_price',
                'rep.category as pacakagecategory', 'pc.state_id as state_id','pc.short_description as short_description',)
                -> where('rep.category', 1)
                ->get()
                ->shuffle();
                // end international package home page fetch data

                // domestic package home page fetch data
                $ruleengine_domespacakge_result = DB::table('rule_engine_packages as rep')
                ->join('packages as pc', 'rep.package_id', '=', 'pc.id')
                ->select('pc.id as id', 'pc.package_name as name','pc.package_image as image', 'pc.rack_price as rack_price',
                'pc.for_number_of_days as days', 'pc.for_number_of_nights as nights','pc.off_season_price_pp as off_price',
                'rep.category as pacakagecategory', 'pc.state_id as state_id','pc.short_description as short_description',)
                -> where('rep.category', 0)
                ->get()
                ->shuffle();
                // //end domestic package home page fetch data


                //hotel
                $hotelsCount = Hotel::count();
                $hotels = Hotel::all();
                //end hotel
                //Package type
                $package_type= PackageType::all();
                //End Package type

                $bannerimage = ruleEngineHompageBanner::orderByRaw('id DESC')->get();

                $activity = PackageActivity::orderByRaw('id DESC')->get();

                return view('userfrontend.home', compact('tiles','tilesDomestic', 'ruleengine_interpacakge_result','ruleengine_domespacakge_result','hotelsCount' ,'hotels','package_type','bannerimage','activity','title'));
        }
        else
        {
            //$user = Auth::user()->role_type;
            // echo( Auth::user()->role_type); die();
            // return view('admin.admin-login');
            $title = "Welcome Kit";
            return view('userfrontend.welcomeKit',compact('title'));
        }
    }
    public function contact()
    {
        $title = "Contact-Us";
        $CompanyBranchCount = CompanyBranch::count();
        $CompanyBranch = CompanyBranch::orderByRaw('id DESC')->get();
        return view('userfrontend.contact',compact('title','CompanyBranchCount','CompanyBranch'));
    }
    public function package()
    {
        $title = "Pacakages";
        return view('userfrontend.package',compact('title'));
    }
    // public function destination()
    // {
    //     return view('userfrontend.destination');
    // }
    public function about()
    {
        $title = "About-Us";
        $aboutCount=AboutUsPages::count();
        $aboutus = AboutUsPages::all();
        return view('userfrontend.about',compact('aboutCount','aboutus','title'));
    }
    public function services()
    {
        $title = "Services";
        $servicesCount=ServicesPages::count();
        $services = ServicesPages::all();
        return view('userfrontend.services',compact('servicesCount','services','title'));
    }
    public function subservices()
    {
        $title = "SUB-Services";
        $subservicesCount=SubServicesPages::count();
        $subservices = SubServicesPages::all();
        return view('userfrontend.subservices',compact('subservicesCount','subservices','title'));
    }

    public function viewsubservices($id)
    {
        $data['subservicesviewCount'] =  SubServicesPages::where('id', $id)->count();
        $data['subservicesview'] = SubServicesPages::where('id', $id)->get();

        return view('userfrontend.viewSubservicedetails', $data);

    }

    public function ulogin()
    {

        return view('userfrontend.userlogin');
    }
    public function uregister()
    {
        $title = "Registration";
        return view('userfrontend.userregister',compact('title'));
    }

     // Get User Part Package Part
    //
    public function getCitybyINTdestination($id)
    {
        $destination = Destination::findOrFail($id);
        $destinationCountryIds = explode(',', $destination->country_id);

        sort($destinationCountryIds);

        $packages = Package::where(function ($query) use ($destinationCountryIds) {
            $query->where(function ($innerQuery) use ($destinationCountryIds) {
                foreach ($destinationCountryIds as $countryId) {
                    $innerQuery->orWhereRaw('FIND_IN_SET(?, country_id)', [$countryId]);
                }
            });
            $query->whereRaw('LENGTH(country_id) - LENGTH(REPLACE(country_id, ",", "")) + 1 = ?', [count($destinationCountryIds)]);
        })->where('category', 1)->get();

        $matchingPackages = $packages->filter(function ($package) use ($destinationCountryIds) {
            $packageCountryIds = explode(',', $package->country_id);
            sort($packageCountryIds);

            return count($destinationCountryIds) === count($packageCountryIds) &&
                empty(array_diff($destinationCountryIds, $packageCountryIds));
        });

         //for package activities fetch
        //  $packageActivities = Package::select("packages.id",DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
        //  ->leftjoin("packageactivities",DB::raw("FIND_IN_SET(packageactivities.id,packages.activity_type_id)"),">",DB::raw("'0'"))
        //  ->groupBy("packages.id")
        //  ->pluck("package_activity","id")
        //  ->all();



        $data['destinationbanner'] = $destination->secondary_photo_1;
        $data['destinationName'] = $destination->destination_name;
        $data['pacakageCount'] = $matchingPackages->count();
        $data['pacakages'] = $matchingPackages;
        $data['destId'] = $id;

        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        return view('userfrontend.internationalpackage', $data);

    }

    //
    public function filterPackages(Request $request)
    {

        $destinationId = $request->destinationId;
        $noOfNights = $request->for_number_of_nights;
        $budget = $request->rdoBudget;

        $destination = Destination::findOrFail($destinationId);
        $destinationCountryIds = explode(',', $destination->country_id);

        $packages = Package::select("packages.*",DB::raw("GROUP_CONCAT(packagetypes.package_type) as package_type"))
            ->leftjoin("packagetypes",DB::raw("FIND_IN_SET(packagetypes.id,packages.package_type_id)"),">",DB::raw("'0'"));

        if ($noOfNights) {
            $noOfNightsRange = explode(',', $noOfNights);
            if($noOfNightsRange[1] != 0){
                $packages->where('packages.for_number_of_nights', '>=', $noOfNightsRange[0])
                ->where('packages.for_number_of_nights', '<=', $noOfNightsRange[1]);
            }else{
               $packages->where('packages.for_number_of_nights', '>=', $noOfNightsRange[0]);
            }

        }

        if ($budget) {
            $budgetRange = explode(',', $budget);
            if($budgetRange[1] != 0){
                $packages->where('packages.off_season_price_pp', '>=', $budgetRange[0])
                ->where('packages.off_season_price_pp', '<=', $budgetRange[1]);
            }else{
                $packages->where('packages.off_season_price_pp', '>=', $budgetRange[0]);
            }

        }

        if ($request->has('activity_type_id')) {
            $activities = $request->input('activity_type_id');
            $packages->where(function ($query) use ($activities) {
                foreach ($activities as $activity) {
                    $query->whereRaw("FIND_IN_SET(?, packages.activity_type_id)", [$activity]);
                }
            });
        }


        $packages->where(function ($query) use ($destinationCountryIds) {
            $query->where(function ($innerQuery) use ($destinationCountryIds) {
            foreach ($destinationCountryIds as $countryId) {
                $innerQuery->orWhereRaw('FIND_IN_SET(?, packages.country_id)', [$countryId]);
            }
            });
            $query->whereRaw('LENGTH(packages.country_id) - LENGTH(REPLACE(packages.country_id, ",", "")) + 1 = ?', [count($destinationCountryIds)]);
        });

        $packages->where('packages.category', 1);

        $packages = $packages->groupBy("packages.id")->get();

        //for package activities fetch
        $packageActivities = Package::select("packages.id",DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
            ->leftjoin("packageactivities",DB::raw("FIND_IN_SET(packageactivities.id,packages.activity_type_id)"),">",DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("package_activity","id")
            ->all();

        //for country names
        $packageCountries = Package::select("packages.id",DB::raw("GROUP_CONCAT(countries.country_name) as country_name"))
            ->leftjoin("countries",DB::raw("FIND_IN_SET(countries.id,packages.country_id)"),">",DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("country_name","id")
            ->all();


        $data = [
            'destinationbanner' => $destination->secondary_photo_1,
            'destinationName' => $destination->destination_name,
            'pacakageCount' => $packages->count(),
            'pacakages' => $packages,
            'packageCountries' => $packageCountries,
            'destId' => $destinationId,
            'packageActivities' => $packageActivities
        ];


        return response()->json($data);
    }




    public function getCitybyDOMdestination($id)
    {
        $destination = Destination::findOrFail($id);

        $destinationCountryIds = explode(',', $destination->country_id);
        $destinationStateIds = explode(',', $destination->state_id);

        sort($destinationCountryIds);
        sort($destinationStateIds);

        $packages = Package::where(function ($query) use ($destinationCountryIds, $destinationStateIds) {
            $query->where(function ($innerQuery) use ($destinationCountryIds) {
                foreach ($destinationCountryIds as $countryId) {
                    $innerQuery->orWhereRaw('FIND_IN_SET(?, country_id)', [$countryId]);
                }
            });
            $query->where(function ($innerQuery) use ($destinationStateIds) {
                foreach ($destinationStateIds as $stateId) {
                    $innerQuery->orWhereRaw('FIND_IN_SET(?, state_id)', [$stateId]);
                }
            });
            $query->whereRaw('LENGTH(country_id) - LENGTH(REPLACE(country_id, ",", "")) + 1 = ?', [count($destinationCountryIds)]);
            $query->whereRaw('LENGTH(state_id) - LENGTH(REPLACE(state_id, ",", "")) + 1 = ?', [count($destinationStateIds)]);
        })->where('category', 0)->get();

        

        $matchingPackages = $packages->filter(function ($package) use ($destinationCountryIds, $destinationStateIds) {
            $packageCountryIds = explode(',', $package->country_id);
            $packageStateIds = explode(',', $package->state_id);
            sort($packageCountryIds);
            sort($packageStateIds);

            return count($destinationCountryIds) === count($packageCountryIds) &&
                count($destinationStateIds) === count($packageStateIds) &&
                empty(array_diff($destinationCountryIds, $packageCountryIds)) &&
                empty(array_diff($destinationStateIds, $packageStateIds));
        });

        $data['destinationbanner'] = $destination->secondary_photo_1;
        $data['destinationName'] = $destination->destination_name;
        $data['pacakageCount'] = $matchingPackages->count();
        $data['pacakages'] = $matchingPackages;
        $data['destId'] = $id;

        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();

        return view('userfrontend.domesticpackage', $data);
    }




    public function filterPackagesDOM(Request $request)
    {

        $destinationId = $request->destinationId;
        $noOfNights = $request->for_number_of_nights;
        $budget = $request->rdoBudget;

        $destination = Destination::findOrFail($destinationId);
        $destinationCountryIds = explode(',', $destination->country_id);

        $packages = Package::select("packages.*",DB::raw("GROUP_CONCAT(packagetypes.package_type) as package_type"))
            ->leftjoin("packagetypes",DB::raw("FIND_IN_SET(packagetypes.id,packages.package_type_id)"),">",DB::raw("'0'"));

        if ($noOfNights) {
            $noOfNightsRange = explode(',', $noOfNights);
            // print_r($noOfNightsRange);die();
            if($noOfNightsRange[1] != 0){
                $packages->where('packages.for_number_of_nights', '>=', $noOfNightsRange[0])
                ->where('packages.for_number_of_nights', '<=', $noOfNightsRange[1]);
            }else{
               $packages->where('packages.for_number_of_nights', '>=', $noOfNightsRange[0]);
            }

        }

        if ($budget) {
            $budgetRange = explode(',', $budget);
            if($budgetRange[1] != 0){
                $packages->where('packages.off_season_price_pp', '>=', $budgetRange[0])
                ->where('packages.off_season_price_pp', '<=', $budgetRange[1]);
            }else{
                $packages->where('packages.off_season_price_pp', '>=', $budgetRange[0]);
            }

        }

        if ($request->has('activity_type_id')) {
            $activities = $request->input('activity_type_id');
            $packages->where(function ($query) use ($activities) {
                foreach ($activities as $activity) {
                    $query->whereRaw("FIND_IN_SET(?, packages.activity_type_id)", [$activity]);
                }
            });
        }

        $packages->where(function ($query) use ($destinationCountryIds) {
            $query->where(function ($innerQuery) use ($destinationCountryIds) {
            foreach ($destinationCountryIds as $countryId) {
                $innerQuery->orWhereRaw('FIND_IN_SET(?, packages.country_id)', [$countryId]);
            }
            });
            $query->whereRaw('LENGTH(packages.country_id) - LENGTH(REPLACE(packages.country_id, ",", "")) + 1 = ?', [count($destinationCountryIds)]);
        });
        $packages->where('packages.category', 0);

        $packages = $packages->groupBy("packages.id")->get();


        $packageActivities = Package::select("packages.id",DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
            ->leftjoin("packageactivities",DB::raw("FIND_IN_SET(packageactivities.id,packages.activity_type_id)"),">",DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("package_activity","id")
            ->all();




        $packageCountries = Package::select("packages.id",DB::raw("GROUP_CONCAT(countries.country_name) as country_name"))
            ->leftjoin("countries",DB::raw("FIND_IN_SET(countries.id,packages.country_id)"),">",DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("country_name","id")
            ->all();


        $data = [
            'destinationbanner' => $destination->secondary_photo_1,
            'destinationName' => $destination->destination_name,
            'pacakageCount' => $packages->count(),
            'pacakages' => $packages,
            'packageCountries' => $packageCountries,
            'destId' => $destinationId,
            'packageActivities' => $packageActivities
        ];

        // echo($packages);die();
        return response()->json($data);
    }

    public function getHotel()
    {
        return view('userfrontend.hotel');
    }
    public function getHotelDetails()
    {
        return view('userfrontend.hotelDetails');
    }

    public function getFlight()
    {
        return view('userfrontend.flight.flight');
    }

    public function getFlightBooking()
    {
        return view('userfrontend.flight.flightBooking');
    }
    public function getFlightSeat()
    {
        return view('userfrontend.flight.flightSeat');
    }

    public function getfightTicket()
    {
        return view('userfrontend.flight.flightTicket');
    }

    public function getflightConfirmTicket()
    {
        return view('userfrontend.flight.flightConfirmTicket');
    }

    public function getPackagedetails($packid)
    {
        $pacakgeID = $packid;
        $fetchAllPackDetailsArray =  Package::where('id', $pacakgeID)->get()->toArray();

        $packageCategory = $fetchAllPackDetailsArray[0]['category'];
        $groupdepartureflag = $fetchAllPackDetailsArray[0]['groupdepartureflag'];

        $dataPackage['nameofthePackage'] = $fetchAllPackDetailsArray[0]['package_name'];
        $dataPackage['bannerPackage'] = $fetchAllPackDetailsArray[0]['pacakage_banner_images'];

        $itenary = ItineraryTrans::where('package_id', $pacakgeID)->orderBy('day', 'ASC')->get();
        //$itenary = ItineraryTrans::where('package_id', $pacakgeID)->orderBy('id', 'ASC')->get();
        
        $groupedItenary = [];
        foreach ($itenary as $item) {
            $groupedItenary[$item['day']][] = [
                'time' => $item['time'],                
                'city' => $item['city'],
                'mode' => $item['mode'],
                'sight_name' => $item['sight_name'],
                'remarks' => $item['remarks'],
            ];
        }
        //dd($groupedItenary);
        $dataPackage['itenary'] = $groupedItenary;
        //dd($dataPackage['itenary']);
        $dataPackage['gallery'] =  PackageGallery::where('package_id', $pacakgeID)->orderBy('id', 'DESC')->get();
        $dataPackage['cities'] =  City::orderByRaw('city_name ASC')->get();
        $dataPackage['pacakgeID'] =  $pacakgeID;


        $dataPackage['chckpacakgeavail'] =  Package::where('id', $pacakgeID)->where('groupdepartureflag', 1)->count();

        // if($dataPackage['chckpacakgeavail'] > 0){

        // }
        $dataPackage['pacakgeavail'] = DB::table('packages as pack')
        ->join('packages_availabilities as pacakav', 'pacakav.package_id', '=', 'pack.id')
        ->where('pacakav.package_id',  $pacakgeID)
        ->where('pack.groupdepartureflag', 1)        
        ->select('pack.id as id', 'pacakav.availability_date as availability_date', 'pack.groupdepartureflag as flag')
        ->orderByRaw('pacakav.availability_date') 
        // ->orderBy('pacakav.id', 'DESC')           
        ->get();

        
        $date = Carbon::now();
        $dataPackage['todaysDate'] =  $date->toDateString(); 
        $queryPackDetails ="";
        if($groupdepartureflag == 0){
            $queryPackDetails = DB::table('packages as pack')
                    ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
                    ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
                    ->where('pack.id',  $pacakgeID)
                    ->where('pack.category',  $packageCategory)
                    ->where('pack.groupdepartureflag', $groupdepartureflag)
                    ->whereRaw('DATE("'.$date.'") between packSE.season_start and packSE.season_end')        
                    ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
                        'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
                        'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
                        'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
                        'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
                        'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
                        'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
                        'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
                        'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id', 
                        'pack.long_description as long_description','pack.pacakage_inclusion as pacakage_inclusion','pack.pacakage_exclusions as pacakage_exclusions',
                        'pack.payment_policy as payment_policy','pack.cancelation_policy as cancelation_policy','pack.terms_conditions as terms_conditions') 
                    ->get();
                    
            
        }else{
            
            $queryPackDetails =  Package::where('id', $pacakgeID)->get();
        }
        $dataPackage['packDetails'] = $queryPackDetails;
        // echo($dataPackage['packDetails']);die();
        
        return view('userfrontend.packagedetails', $dataPackage);
    }

    public function getConversation($packid)
    {
        $pacakgeID = $packid;

        $itenary = ItineraryTrans::where('package_id', $pacakgeID)->orderBy('day', 'ASC')->get();

        $groupedItenary = [];
        foreach ($itenary as $item) {
            $groupedItenary[$item['day']][] = [
                'time' => $item['time'],
                'city' => $item['city'],
                'mode' => $item['mode'],
                'sight_name' => $item['sight_name'],
                'remarks' => $item['remarks'],
            ];
        }

        $dataConversation['itenary'] = $groupedItenary;
        return view('userfrontend.conversation', $dataConversation);
    }



    public function adminlogin()
    {
        return view('admin.admin-login');
    }

    public function adminEmailPasswordCheck(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', '=', $email)->first();
        // echo($user);die();
        if (!$user) {

            return response()->json(['success' => false, 'message' => 'email-error']);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'password-error']);
        }
        if($user->email_verified_flag == 0){
            return response()->json(['success' => false, 'message' => 'verifid-error']);
        }
        // $user->session()->put('email', $email);
        // echo(session('email') );die();
        return response()->json(['success' => true, 'message' => 'success']);
    }

    public function allpacakagesShow($id, $category )
    {
        // $data['id']=$id;
        $data['category']=$category;
        $data['pacakageCount'] =  DB::table('packages')
            ->having('activity_type_id', 'LIKE', '%'.$id)
            ->orhaving('activity_type_id', 'LIKE', '%'.$id.'%')
            ->orhaving('activity_type_id', 'LIKE', $id.'%')
            ->Where('category', $category)
            ->count();

        $data['pacakages'] = DB::table('packages')
        ->having('activity_type_id', 'LIKE', '%'.$id)
        ->orhaving('activity_type_id', 'LIKE', '%'.$id.'%')
        ->orhaving('activity_type_id', 'LIKE', $id.'%')
        ->Where('category', $category)
        ->get();
        // ->toSql();
        // Activity fetch
    $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        //echo($data['pacakages']);die();
        return view('userfrontend.allpacakgesshow',$data);
    }

    public function allpacakagesShowbyType($packageTypeid, $packageTypecategory )
    {
        // $data['id']=$id;
        $data['category']=$packageTypecategory;
        $data['pacakageCount'] =  DB::table('packages')
            ->having('package_type_id', 'LIKE', '%'.$packageTypeid)
            ->orhaving('package_type_id', 'LIKE', '%'.$packageTypeid.'%')
            ->orhaving('package_type_id', 'LIKE', $packageTypeid.'%')
            ->Where('category', $packageTypecategory)
            ->count();

        $data['pacakages'] = DB::table('packages')
            ->having('package_type_id', 'LIKE', '%'.$packageTypeid)
            ->orhaving('package_type_id', 'LIKE', '%'.$packageTypeid.'%')
            ->orhaving('package_type_id', 'LIKE', $packageTypeid.'%')
            ->Where('category', $packageTypecategory)
            ->get();
        // ->toSql();
        //echo($data['pacakages']);die();


        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        return view('userfrontend.allpacakgesshow',$data);
    }
    public function getAllpackages(Request $request)
    {
        // $data['id']=$id;
        $data['category']= 3;
        $data['pacakageCount'] = Package::all()->count();

        $data['pacakages'] = Package::all();

        return view('userfrontend.allpacakgesshow',$data);
    }

    public function checkemail(Request $request)
    {
        $emailID = $request->email;
        $mobNumber = $request->mobNumber;
        $check = User::where('email', $emailID)->orWhere('phonenumber', $mobNumber)->count();
        if ($check > 0) {
            return response()->json(['success' => true, 'message' => 'error']);
        } else {
            return response()->json(['success' => true, 'message' => 'success']);
        }

    }
    public function createnewuser(Request $request)
    {

        // $userCode = '';
        // if ($request->role_type == 'partner') {
        //     $userCode = helper::IDGenerator(new User, 'usercode', 5, 'PRT');
        // } else if ($request->role_type == 'user') {
        //     $userCode = helper::IDGenerator(new User, 'usercode', 5, 'USR');
        // }
        // echo $userCode ; die();
        

        $user = User::create(
            [
                'role_type' => 'user',
                'first_name' => $request->f_name,
                'middle_name' => $request->m_name,
                'last_name' => $request->l_name,
                'phonenumber' => $request->phonenumber,
                'email' => $request->email,
                'email_verified_flag' => 1,
                'password' => Hash::make($request->password),
            ]
        );

        //$this->sendemailForRegisterUser($user);
        // $this->sendemailForRegisterUseratadmin($user);
        //return $user;
        if ($user) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(["errors" => "Category not updated successfully"], 401);
        }
    }

    public function sendemailForRegisterUser($user)
    {
        $data = [];
        $data['to'] = $user->email;
        $data['greetings'] = 'Hey! ' . $user->first_name . '. You are taking a step towards the success. We are excited to help you.';
        $data['line'] = 'Your Registration is successfully';
        $data['line1'] = 'Click on the button below to confirm your email address and secure your TravelHostOnline account.';
        $data['line2'] = 'Team TeravelhostOnline';
        // $data['link2'] = url('/');
        $data['button'] = 'Verify';
        $data['link'] = url('/') . '/email-verification-status/' . $user->email;
        $data['from'] = 'enquiry@travelhostonline.com';
        $data['subject'] = 'Welcome to TravelhostOnline';
        Mail::to($data['to'])->send(new SiteMailSend($data));
    }

    public function AllinternationapacakageslGet(Request $request )
    {

        $data['title'] =  'International-Pacakages-LIST';
        // $data['pacakageCount'] =  Package::where('category', 1)->where('groupdepartureflag', 0)->count();
        // $data['pacakages'] = Package::where('category', 1)->where('groupdepartureflag', 0)->get();
        $todayDate = Carbon::now();
        $data['pacakageCount'] = DB::table('packages as pack')
                                        ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
                                        ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
                                        ->where('pack.category',  1)
                                        ->where('pack.groupdepartureflag', 0)
                                        ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
                                        ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
                                            'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
                                            'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
                                            'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
                                            'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
                                            'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
                                            'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
                                            'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
                                            'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
                                        ->count();

        $data['pacakages'] = DB::table('packages as pack')
                                    ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
                                    ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
                                    ->where('pack.category',  1)
                                    ->where('pack.groupdepartureflag', 0)
                                    ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
                                    ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
                                        'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
                                        'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
                                        'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
                                        'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
                                        'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
                                        'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
                                        'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
                                        'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
                                    ->get();

        // echo( $data['pacakages']);die();

        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        return view('userfrontend.AllInternationalpackage',$data);
    }


    public function AllinternationapacakageslFDGet(Request $request )
    {

        $data['title'] =  'Fixed-Departure-International-Pacakages';
        $data['pacakageCount'] =  Package::where('category', 1)->where('groupdepartureflag', 1)->count();
        $data['pacakages'] = Package::where('category', 1)->where('groupdepartureflag', 1)->get();

        // $todayDate = Carbon::now();
        // $data['pacakageCount'] = DB::table('packages as pack')
        //                                 ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
        //                                 ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
        //                                 ->where('pack.category',  1)
        //                                 ->where('pack.groupdepartureflag', 1)
        //                                 ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
        //                                 ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
        //                                     'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
        //                                     'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
        //                                     'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
        //                                     'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
        //                                     'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
        //                                     'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
        //                                     'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
        //                                     'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
        //                                 ->count();

        // $data['pacakages'] = DB::table('packages as pack')
        //                             ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
        //                             ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
        //                             ->where('pack.category',  1)
        //                             ->where('pack.groupdepartureflag', 1)
        //                             ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
        //                             ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
        //                                 'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
        //                                 'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
        //                                 'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
        //                                 'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
        //                                 'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
        //                                 'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
        //                                 'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
        //                                 'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
        //                             ->get();

        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        //City fetch
        $data['cityfetch'] =  DB::table('cities as cty')
        ->join('packages as pack', 'pack.country_id', '=', 'cty.country_id')
        ->join('countries as count', 'count.id', '=', 'cty.country_id')
        ->where('pack.category',  1)
        ->where('pack.groupdepartureflag', 1) 
        ->whereNull('cty.state_id')
        ->groupBy("cty.id")
        ->select('cty.id as CitymasterID', 'cty.city_name as CityName','count.country_name as CountryName')
        // ->orderByRaw('packAV.availability_date', 'DESC')
        ->get();
        
        return view('userfrontend.AllInternationalpackage-FD',$data);
    }

    //fw
    public function AllInternationalPackageFilter(Request $request)
    {
        $packages = Package::query();

        $packages->select("packages.*", DB::raw("GROUP_CONCAT(packagetypes.package_type) as package_type"))
            ->leftJoin("packagetypes", DB::raw("FIND_IN_SET(packagetypes.id, packages.package_type_id)"), ">", DB::raw("'0'"));

        // Apply filters based on request parameters
        if ($request->has('for_number_of_nights')) {
            $nights = explode(',', $request->input('for_number_of_nights'));
            $packages->whereBetween('for_number_of_nights', $nights);
        }

        if ($request->has('rdoBudget')) {
            $budget = explode(',', $request->input('rdoBudget'));
            $packages->whereBetween('off_season_price_pp', $budget);
        }



        if ($request->has('activity_type_id')) {
            $activities = $request->input('activity_type_id');
            $packages->where(function ($query) use ($activities) {
                foreach ($activities as $activity) {
                    $query->whereRaw("FIND_IN_SET(?, packages.activity_type_id)", [$activity]);
                }
            });
        }



        $packages->where('packages.category', 1)->where('packages.groupdepartureflag', 0)
            ->groupBy("packages.id");

        $filteredPackages = $packages->get();

        $packageActivities = Package::select("packages.id", DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
            ->leftJoin("packageactivities", DB::raw("FIND_IN_SET(packageactivities.id, packages.activity_type_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("package_activity", "id")
            ->all();

        $packageCountries = Package::select("packages.id", DB::raw("GROUP_CONCAT(countries.country_name) as country_name"))
            ->leftJoin("countries", DB::raw("FIND_IN_SET(countries.id, packages.country_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("country_name", "id")
            ->all();

        $data = [
            'packageCount' => $filteredPackages->count(),
            'packages' => $filteredPackages,
            'packageActivities' => $packageActivities,
            'packageCountries' => $packageCountries,
        ];

        return response()->json($data);

    }

    public function AllInternationalPackageFDFilter(Request $request)
    {
        $packages = Package::query();

        $packages->select("packages.*", DB::raw("GROUP_CONCAT(packagetypes.package_type) as package_type"))
            ->leftJoin("packagetypes", DB::raw("FIND_IN_SET(packagetypes.id, packages.package_type_id)"), ">", DB::raw("'0'"));

        // Apply filters based on request parameters
        if ($request->has('for_number_of_nights')) {
            $nights = explode(',', $request->input('for_number_of_nights'));
            $packages->whereBetween('for_number_of_nights', $nights);
        }

        if ($request->has('rdoBudget')) {
            $budget = explode(',', $request->input('rdoBudget'));
            $packages->whereBetween('off_season_price_pp', $budget);
        }
         //dd($budget);


        if ($request->has('activity_type_id')) {
            $activities = $request->input('activity_type_id');
            $packages->where(function ($query) use ($activities) {
                foreach ($activities as $activity) {
                    $query->whereRaw("FIND_IN_SET(?, packages.activity_type_id)", [$activity]);
                }
            });
        }



        $packages->where('packages.category', 1)
                 ->where('packages.groupdepartureflag', 1)
                 ->groupBy("packages.id");

        $filteredPackages = $packages->get();

        $packageActivities = Package::select("packages.id", DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
            ->leftJoin("packageactivities", DB::raw("FIND_IN_SET(packageactivities.id, packages.activity_type_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("package_activity", "id")
            ->all();

        $packageCountries = Package::select("packages.id", DB::raw("GROUP_CONCAT(countries.country_name) as country_name"))
            ->leftJoin("countries", DB::raw("FIND_IN_SET(countries.id, packages.country_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("country_name", "id")
            ->all();

        $data = [
            'packageCount' => $filteredPackages->count(),
            'packages' => $filteredPackages,
            'packageActivities' => $packageActivities,
            'packageCountries' => $packageCountries,
        ];

        return response()->json($data);

    }


    public function AlldomesticpacakagesGet(Request $request )
    {
        // $data['id']=$id;
        $data['title'] =  'Domestic-Pacakages-Show';
        // $data['pacakageCount'] =  Package::where('category', 0)->count();
        // $data['pacakages'] = Package::where('category', 0)->get();

        $todayDate = Carbon::now();
        $data['pacakageCount'] = DB::table('packages as pack')
                                        ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
                                        ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
                                        ->where('pack.category',  0)
                                        ->where('pack.groupdepartureflag', 0)
                                        ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
                                        ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
                                            'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
                                            'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
                                            'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
                                            'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
                                            'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
                                            'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
                                            'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
                                            'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
                                        ->count();

        $data['pacakages'] = DB::table('packages as pack')
                                    ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
                                    ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
                                    ->where('pack.category',  0)
                                    ->where('pack.groupdepartureflag', 0)
                                    ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
                                    ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
                                        'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
                                        'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
                                        'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
                                        'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
                                        'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
                                        'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
                                        'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
                                        'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
                                    ->get();

        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        return view('userfrontend.AllDomesticpackage',$data);
    }

    public function AlldomesticpacakagesFDGet(Request $request )
    {
        // $data['id']=$id;
        $data['title'] =  'Domestic-Pacakages-Show';
        $data['pacakageCount'] =  Package::where('category', 0)->where('groupdepartureflag', 1)->count();
        $data['pacakages'] = Package::where('category', 0)->where('groupdepartureflag', 1)->get();
        // $todayDate = Carbon::now();
        // $data['pacakageCount'] = DB::table('packages as pack')
        //                                 ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
        //                                 ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
        //                                 ->where('pack.category',  0)
        //                                 ->where('pack.groupdepartureflag', 1)
        //                                 ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
        //                                 ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
        //                                     'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
        //                                     'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
        //                                     'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
        //                                     'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
        //                                     'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
        //                                     'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
        //                                     'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
        //                                     'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
        //                                 ->count();

        // $data['pacakages'] = DB::table('packages as pack')
        //                             ->join('package_seasons as packSE', 'packSE.package_id', '=', 'pack.id')
        //                             ->join('seasones as sea', 'sea.id', '=', 'packSE.season_type')
        //                             ->where('pack.category',  0)
        //                             ->where('pack.groupdepartureflag', 1)
        //                             ->whereRaw('DATE("'.$todayDate.'") between packSE.season_start and packSE.season_end')        
        //                             ->select('pack.id as id', 'pack.package_name as package_name', 'pack.package_image as package_image',
        //                                 'pack.pacakage_banner_images as pacakage_banner_images', 'pack.for_number_of_days as for_number_of_days', 
        //                                 'pack.for_number_of_nights as for_number_of_nights','pack.noofdaysbycity as noofdaysbycity',
        //                                 'pack.country_id as country_id', 'pack.state_id as state_id', 'pack.city_id as city_id', 'pack.arrival_at as arrival_at',
        //                                 'pack.departure_at as departure_at', 'pack.pcakage_flight as pcakage_flight', 'pack.pcakage_transfer as pcakage_transfer', 
        //                                 'pack.pcakage_hotel as pcakage_hotel', 'pack.pcakage_sightseeing as pcakage_sightseeing', 'pack.pcakage_meals as pcakage_meals',
        //                                 'pack.pcakage_train as pcakage_train', 'pack.pcakage_visa as pcakage_visa', 'pack.rack_price as rack_price',
        //                                 'packSE.season_price as season_price', 'sea.season_name as season_name', 'pack.activity_type_id as activity_type_id',
        //                                 'pack.groupdepartureflag as groupdepartureflag', 'pack.groupdeparture as groupdeparture', 'pack.package_type_id as package_type_id') 
        //                             ->get();

        // Activity fetch
        $data['activity'] = PackageActivity::orderByRaw('id DESC')->get();
        // city fetch
        $data['cityfetch'] =  DB::table('cities as cty')
        ->join('packages as pack', 'pack.country_id', '=', 'cty.country_id')               
        ->join('countries as count', 'count.id', '=', 'cty.country_id')
        ->join('states as states', 'states.country_id', '=', 'count.id')
        ->where('pack.category',  0)
        ->where('pack.groupdepartureflag', 1) 
        ->whereNotNull('cty.state_id')
        ->groupBy("cty.id")
        ->select('cty.id as CitymasterID', 'cty.city_name as CityName','count.country_name as CountryName', 'states.state_name as state_name')
        // ->orderByRaw('packAV.availability_date', 'DESC')
        ->get();
        // echo($data['cityfetch']);die();

        return view('userfrontend.AllDomesticpackage-FD',$data);
    }

    public function AllInternationaldestinationGet()
    {
        $data['title'] =  'International-Destination-Show';
        $data['destinationCount'] =  Destination::where('category', 1)->count();
        $data['destination'] = Destination::where('category', 1)->orderByRaw('destination_name ASC')->get();
        return view('userfrontend.AllInternationaldestination',$data);
    }
    public function AllDomesticdestinationGet()
    {
        $data['title'] =  'Domestic-Destination-Show';
        $data['destinationCount'] =  Destination::where('category', 0)->count();
        $data['destination'] = Destination::where('category', 0)->orderByRaw('destination_name ASC')->get();
        return view('userfrontend.AllDomesticdestination',$data);
    }


    public function AllDomesticPackageFilter(Request $request)
    {

        //dd($request->all());
        $packages = Package::query();

        $packages->select("packages.*", DB::raw("GROUP_CONCAT(packagetypes.package_type) as package_type"))
            ->leftJoin("packagetypes", DB::raw("FIND_IN_SET(packagetypes.id, packages.package_type_id)"), ">", DB::raw("'0'"));

        // Apply filters based on request parameters
        if ($request->has('for_number_of_nights')) {
            $nights = explode(',', $request->input('for_number_of_nights'));
            $packages->whereBetween('for_number_of_nights', $nights);
        }

        if ($request->has('rdoBudget')) {
            $budget = explode(',', $request->input('rdoBudget'));
            $packages->whereBetween('off_season_price_pp', $budget);
        }

        if ($request->has('activity_type_id')) {
            $activities = $request->input('activity_type_id');
            $packages->where(function ($query) use ($activities) {
                foreach ($activities as $activity) {
                    $query->whereRaw("FIND_IN_SET(?, packages.activity_type_id)", [$activity]);
                }
            });

        }

        $packages->where('packages.category', 0)
            ->groupBy("packages.id");

        $filteredPackages = $packages->get();

        $packageActivities = Package::select("packages.id", DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
            ->leftJoin("packageactivities", DB::raw("FIND_IN_SET(packageactivities.id, packages.activity_type_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("package_activity", "id")
            ->all();

        $packageCountries = Package::select("packages.id", DB::raw("GROUP_CONCAT(countries.country_name) as country_name"))
            ->leftJoin("countries", DB::raw("FIND_IN_SET(countries.id, packages.country_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("country_name", "id")
            ->all();

        $data = [
            'packageCount' => $filteredPackages->count(),
            'packages' => $filteredPackages,
            'packageActivities' => $packageActivities,
            'packageCountries' => $packageCountries,
        ];

        return response()->json($data);

    }

    public function AllDomesticPackageFDFilter(Request $request)
    {

        //dd($request->all());
        $packages = Package::query();

        $packages->select("packages.*", DB::raw("GROUP_CONCAT(packagetypes.package_type) as package_type"))
            ->leftJoin("packagetypes", DB::raw("FIND_IN_SET(packagetypes.id, packages.package_type_id)"), ">", DB::raw("'0'"));

        // Apply filters based on request parameters
        if ($request->has('for_number_of_nights')) {
            $nights = explode(',', $request->input('for_number_of_nights'));
            $packages->whereBetween('for_number_of_nights', $nights);
        }

        if ($request->has('rdoBudget')) {
            $budget = explode(',', $request->input('rdoBudget'));
            $packages->whereBetween('off_season_price_pp', $budget);
        }

        if ($request->has('activity_type_id')) {
            $activities = $request->input('activity_type_id');
            $packages->where(function ($query) use ($activities) {
                foreach ($activities as $activity) {
                    $query->whereRaw("FIND_IN_SET(?, packages.activity_type_id)", [$activity]);
                }
            });

        }

        $packages->where('packages.category', 0)
        ->where('packages.groupdepartureflag', 1)
            ->groupBy("packages.id");

        $filteredPackages = $packages->get();

        $packageActivities = Package::select("packages.id", DB::raw("GROUP_CONCAT(packageactivities.package_activity) as package_activity"))
            ->leftJoin("packageactivities", DB::raw("FIND_IN_SET(packageactivities.id, packages.activity_type_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("package_activity", "id")
            ->all();

        $packageCountries = Package::select("packages.id", DB::raw("GROUP_CONCAT(countries.country_name) as country_name"))
            ->leftJoin("countries", DB::raw("FIND_IN_SET(countries.id, packages.country_id)"), ">", DB::raw("'0'"))
            ->groupBy("packages.id")
            ->pluck("country_name", "id")
            ->all();

        $data = [
            'packageCount' => $filteredPackages->count(),
            'packages' => $filteredPackages,
            'packageActivities' => $packageActivities,
            'packageCountries' => $packageCountries,
        ];

        return response()->json($data);

    }
// hotel Api
    public function getHotelApi()
    {
        return view('userfrontend.hotelApi');
    }

    public function PrivacyPolicy()
    {
        $title = "Privacy&Policy";
       
        return view('userfrontend.privacy&policy',compact('title'));
    }

    public function TermsConditions()
    {
        $title = "Terms&Conditions";
       
        return view('userfrontend.terms&conditions',compact('title'));
    }

    public function RefundPolicy()
    {
        $title = "RefundPolicy";
       
        return view('userfrontend.refundPolicy',compact('title'));
    }


}
