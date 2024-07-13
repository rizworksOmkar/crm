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
use App\Models\Admin\ruleEngineDOMDT;
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
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RuleEngineController extends Controller
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
    
    public function ruleEngineIntDestTile()
    {
        $used_destinations = RuleEngineINDT::pluck('destination_id', 'tile')->toArray();
        $destinations = Destination::whereNotIn('id', array_values($used_destinations))
                        ->where('category', 1)
                        ->get();

        $tiles = [];

        for ($i = 1; $i <= 8; $i++) {
            $selected_destination = null;

            if (isset($used_destinations[$i])) {
                $selected_destination = Destination::find($used_destinations[$i]);
            }

            $tiles[$i] = [
                'tile' => $i,
                'selected_destination' => $selected_destination
            ];
        }

        return view('admin.rule-international-destination', compact('destinations', 'tiles'));
    }


    public function ruleEngineStore(Request $request)
    {
        $request->validate([
            'destination_id' => 'integer|exists:destinations,id', // validate the destination id
            'tile' => 'integer' // validate the tile number
        ]);

        $existingRule = ruleEngineINDT::where('tile', $request->input('tile'))->first(); //

        if($existingRule) {
            $existingRule->destination_id = $request->input('destination_id');
            $saved = $existingRule->save();
        } else {
            $newRule = ruleEngineINDT::create([
                'tile' => $request->input('tile'),
                'destination_id' => $request->input('destination_id')
            ]);
            $saved = $newRule ? true : false;
        }

        if ($saved) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }
    
    
    public function ruleEngineDomesticTile()
    {
        $used_destinations = ruleEngineDOMDT::pluck('destination_id', 'tile')->toArray();
        $destinations = Destination::whereNotIn('id', array_values($used_destinations))
                        ->where('category', 0)
                        ->get();

        $tiles = [];

        for ($i = 1; $i <= 8; $i++) {
            $selected_destination = null;

            if (isset($used_destinations[$i])) {
                $selected_destination = Destination::find($used_destinations[$i]);
            }

            $tiles[$i] = [
                'tile' => $i,
                'selected_destination' => $selected_destination
            ];
        }

        return view('admin.rule-domestic-destination', compact('destinations', 'tiles'));
    }

    public function ruleEngineDomStore(Request $request)
    {
        $request->validate([
            'destination_id' => 'integer|exists:destinations,id', // validate the destination id
            'tile' => 'integer' // validate the tile number
        ]);

        $existingRule = ruleEngineDOMDT::where('tile', $request->input('tile'))->first(); //

        if($existingRule) {
            $existingRule->destination_id = $request->input('destination_id');
            $saved = $existingRule->save();
        } else {
            $newRule = ruleEngineDOMDT::create([
                'tile' => $request->input('tile'),
                'destination_id' => $request->input('destination_id')
            ]);
            $saved = $newRule ? true : false;
        }

        if ($saved) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    // Delete Domestic Rule engine

    public function recordExist(Request $request)
    {
        // *** Check record Exist or not
        $tiles = ruleEngineDOMDT::where('tile', $request->tile)->count();
        if($tiles > 0)
        {
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }
    public function deleteDomesticRulles(Request $request)
    {
        $deletedRull = ruleEngineDOMDT::where('tile', $request->tile)->delete();

    }
    // End Delete Domestic Rule engine

    // Delete International Rule engine

    public function recordintExist(Request $request)
    {
        // *** Check record Exist or not
        $tiles = ruleEngineINDT::where('tile', $request->tile)->count();
        if($tiles > 0)
        {
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }
    public function deleteInternationalRulles(Request $request)
    {
        $deletedRull = ruleEngineINDT::where('tile', $request->tile)->delete();

    }
    // End Delete International Rule engine

    public function storeHomepagebanner(Request $request)
    {
       
        // $image = $request->icon_photo;
        // list($type, $image) = explode(';', $image);
        // list(, $image)      = explode(',', $image);
        // $image = base64_decode($image);
        // $image_name_thumbnil = 'banner_'.time().'.png';

        // $image_path_thnumbnil = 'storage/banner-images/'.$image_name_thumbnil;
        // file_put_contents($image_path_thnumbnil, $image);

        $bannerphoto = null;
        if ($request->hasFile('fpBannerphoto')) {
            $file = $request->file('fpBannerphoto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Bannerphoto_'.time() . '.' . $extension;
            // $image_resize = Image::make($file->getRealPath());              
            // $image_resize->resize(180, 200);
            // $image_resize->save(public_path('storage/profilePic/mentee/' .$filename));
            $file->move('storage/banner-images/', $filename); 
            $image_path = '/storage/banner-images/' . $filename;            
        }
       
        $banner = new ruleEngineHompageBanner();
        $banner->mode = $request->ddMode;
        $banner->slider_image = $image_path;
        // $banner->slider_image = $image_path_thnumbnil;
        $banner->slider_title_1 = $request->title1;
        $banner->slider_title_2 = $request->title2;
        $banner->slider_paragraph_1 = $request->paragraph1;
        $banner->slider_paragraph_2 = $request->paragraph2;

        $banner->save();

        if ($banner) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function deletebannerRulles(Request $request)
    {
        $deletedRull = ruleEngineHompageBanner::where('id', $request->id)->delete();
    }

    public function homePagePacakagescategory(Request $request)
    {
        $result = Package::where('id', $request->pacakageid)->get();       
        return $result;
    }
    public function storeHomepagepacakges(Request $request)
    {
       
        $rlPacakages = new Ruleenginepackages();
        $rlPacakages->category = $request->hdnCategory;  
        $rlPacakages->city_id = $request->hdnCity;
        $rlPacakages->package_id = $request->slectpacakages;
        $rlPacakages->save();

        if ($rlPacakages) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function deletePackagesRulles(Request $request)
    {
        $deletedPackagesRull = Ruleenginepackages::where('id', $request->id)->delete();
    }

    public function homePageINTPacakagesCityget(Request $request)
    {
       
        // $result= Package::where('city_id', 'LIKE', '%'.$request->cityid)
        //     ->orWhere('city_id', 'LIKE', '%'.$request->cityid.'%')
        //     ->orWhere('city_id', 'LIKE', $request->cityid.'%')
        //     ->Where('category', 1)
        //     ->toSql();
       
        $result= Package::whereIn('city_id', [$request->cityid])->where('category', 1)->get();           
        return $result;
    }

    public function homePageINTPacakagesNightget(Request $request)
    {
        $night = $request->night;
        //  echo($request->night); die();
        $result= Package::whereRaw('for_number_of_nights <='.$night)->where('category', 1)->get(); 
        // echo($result); die();
        return $result;
    }

    public function homePageDOMPacakagesCityget(Request $request)
    {
       
        // $result= Package::where('city_id', 'LIKE', '%'.$request->cityid)
        //     ->orWhere('city_id', 'LIKE', '%'.$request->cityid.'%')
        //     ->orWhere('city_id', 'LIKE', $request->cityid.'%')
        //     ->Where('category', 1)
        //     ->toSql();
       
        $result= Package::whereIn('city_id', [$request->cityid])->where('category', 0)->get();           
        return $result;
    }

    public function homePageDOMPacakagesNightget(Request $request)
    {
        $night = $request->night;
        //  echo($request->night); die();
        $result= Package::whereRaw('for_number_of_nights <='.$night)->where('category', 0)->get(); 
        // echo($result); die();
        return $result;
    }

    public function storeaboutus(Request $request)
    {
        $rlAboutStore = new AboutUsPages();
        $rlAboutStore->about_heading = $request->txtHeading;  
        $rlAboutStore->aboutus_title = $request->txtTitle;
        $rlAboutStore->aboutus_content = $request->content;
        $rlAboutStore->save();

        if ($rlAboutStore) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function updateaboutus(Request $request)
    {       
        $rlAbouteUpdate = AboutUsPages::find($request->hdnid);
        $rlAbouteUpdate->about_heading = $request->txtHeading;  
        $rlAbouteUpdate->aboutus_title = $request->txtTitle;
        $rlAbouteUpdate->aboutus_content = $request->content;
        $rlAbouteUpdate->save();
        if ($rlAbouteUpdate) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function storeServices(Request $request)
    {
        $rlServicesStore = new ServicesPages();
        $rlServicesStore->services_title = $request->txtTitle;
        $rlServicesStore->services_content = $request->content;
        $rlServicesStore->save();

        if ($rlServicesStore) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function updateServices(Request $request)
    {       
        $rlServicesUpdate = ServicesPages::find($request->hdnid);
        $rlServicesUpdate->services_title = $request->txtTitle;
        $rlServicesUpdate->services_content = $request->content;
        $rlServicesUpdate->save();
        if ($rlServicesUpdate) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function storeSubServices(Request $request)
    {
        $image_path = null;
        if ($request->hasFile('fpBannerphoto')) {
            $file = $request->file('fpBannerphoto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'subservicephoto_'.time() . '.' . $extension;
            // $image_resize = Image::make($file->getRealPath());              
            // $image_resize->resize(180, 200);
            // $image_resize->save(public_path('storage/profilePic/mentee/' .$filename));
            $file->move('storage/admin/img/subservice/', $filename); 
            $image_path = '/storage/admin/img/subservice/' . $filename;            
        }
        
        $rlSubServicesStore = new SubServicesPages();
        $rlSubServicesStore->title = $request->txtTitle;
        $rlSubServicesStore->service_images	 = $image_path;
        $rlSubServicesStore->short_content = $request->smcontent;
        $rlSubServicesStore->main_content = $request->content;
        $rlSubServicesStore->save();

        if ($rlSubServicesStore) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function updateSubServices(Request $request)
    {       
        $image_path = null;
        if ($request->hasFile('fpBannerphoto')) {
            $file = $request->file('fpBannerphoto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'subservicephoto_'.time() . '.' . $extension;
            // $image_resize = Image::make($file->getRealPath());              
            // $image_resize->resize(180, 200);
            // $image_resize->save(public_path('storage/profilePic/mentee/' .$filename));
            $file->move('storage/admin/img/subservice/', $filename); 
            $image_path = '/storage/admin/img/subservice/' . $filename;            
        }else{
            $image_path = $request->hdnImagepath;
        }
        
        $rlSubServicesSUpdate = SubServicesPages::find($request->hdnid);
        $rlSubServicesSUpdate->title = $request->txtTitle;
        $rlSubServicesSUpdate->service_images	 = $image_path;
        $rlSubServicesSUpdate->short_content = $request->smcontent;
        $rlSubServicesSUpdate->main_content = $request->content;
        $rlSubServicesSUpdate->save();
        if ($rlSubServicesSUpdate) {
            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function deleteSubServices(Request $request)
    {
        $deletedSubServices = SubServicesPages::where('id', $request->id)->delete();
    }
}
