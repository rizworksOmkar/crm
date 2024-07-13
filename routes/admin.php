<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\Admin\AdminlinkcreateController;
use App\Http\Controllers\Admin\DataStoreController;
use App\Http\Controllers\Admin\MasterDataController;
use App\Http\Controllers\Admin\PackageSeasonController;
use App\Http\Controllers\Admin\RuleEngineController;
use App\Http\Controllers\Admin\HotelController;
//pay controller
use App\Http\Controllers\PhonepayController;



Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['Admin']], function () {

        // Route::get('/admin/dashboard', function () {
        //     return view('/adminlogin/admin-dashboard');
        // });
        Route::get('/landing-page', [AdminlinkcreateController::class, 'adminDashboard'])->name('Admin-dashboard');
        //Store, Update, Delete Country Data and retrive
        Route::get('/country-index', [AdminlinkcreateController::class, 'indexCountry'])->name('admin.country-index');
        Route::get('/addcountry', [AdminlinkcreateController::class, 'addCountry'])->name('admin.country');
        Route::post('/storeCountry', [DataStoreController::class, 'countryStore'])->name('admin.country.store');
        Route::post('/deleteCountry', [MasterDataController::class, 'countryDelete'])->name('admin.country.delete');

        //Store, Update, Delete State Data and retrive
        Route::get('/state-index', [AdminlinkcreateController::class, 'indexState'])->name('admin.state-index');
        Route::get('/addstate', [AdminlinkcreateController::class, 'addState'])->name('admin.state');
        Route::post('/storeState', [DataStoreController::class, 'stateStore'])->name('admin.state.store');

        //Store, Update, Delete City Data and retrive
        Route::get('/city-index', [AdminlinkcreateController::class, 'indexCity'])->name('admin.city-index');
        Route::get('/addcity', [AdminlinkcreateController::class, 'addCity'])->name('admin.city');

        Route::post('/storeCity', [DataStoreController::class, 'cityStore'])->name('admin.city.store');
        Route::post('/deleteCity', [MasterDataController::class, 'cityDelete'])->name('admin.city.delete');

        Route::get('/check-country-DOMorINT', [MasterDataController::class, 'chkcountryDI'])->name('admin.chkcountryDI');
        Route::get('/fetch-state', [MasterDataController::class, 'stateFetch'])->name('admin.state-fetch');


        Route::get('/get-states/{country_id}', function ($country_id) {
            $states = State::where('country_id', $country_id)->get();
            return response()->json($states);
        });


        Route::get('/get-cities/{country_id}', function ($country_id) {
            $cities = City::where('country_id', $country_id)->get();
            return response()->json($cities);
        });


        //pacakge index
        Route::get('/package-index', [AdminlinkcreateController::class, 'indexPackage'])->name('admin.package-index');
        Route::get('/addpackage', [MasterDataController::class, 'addPackage'])->name('admin.package');
        Route::post('/storePacakge', [MasterDataController::class, 'packageStore'])->name('admin.package.store');
        Route::post('/updatePackage/{id}', [MasterDataController::class, 'updatePackage'])->name('admin.package.update');
        Route::get('/package-edit/{id}', [AdminlinkcreateController::class, 'editPackage'])->name('admin.package-edit');
        //delete with id
        Route::delete('/delete-packages/{id}', [MasterDataController::class, 'deletePackages'])->name('admin.package.delete');



        //package itenary
        Route::get('/addpackageitinerary', [MasterDataController::class, 'addPackageItinerary'])->name('admin.package.itinerary');
        Route::get('/get-package-details', [MasterDataController::class, 'getPackageDetails'])->name('getPackageDetails');
        Route::post('/get-mode-details', [MasterDataController::class, 'getModeDetails'])->name('get.mode.details');
        Route::post('/storePacakgeItinerary', [MasterDataController::class, 'packageItineraryStore'])->name('admin.package.itinerary.store');
        Route::get('/getItenaryDetails', [MasterDataController::class, 'packageItineraryDetails'])->name('getItenarydetails');
        Route::delete('/deleteItenaryDetails/{id}', [MasterDataController::class, 'deleteItenaryDetails'])->name('user-ItenaryDetails-delete');

        Route::get('/get-city-details/{id}', [MasterDataController::class, 'getCityDetails'])->name('getCityDetails');
        Route::get('/get-days-city-itenary', [MasterDataController::class, 'getDaysCityonItenarytrans'])->name('getdaysCityonitenarytrans');

        //season add
        Route::get('/package-seasonadd', [PackageSeasonController::class, 'index'])->name('admin.package.seasonadd');
        //season details
        Route::get('/package-seasondetails', [PackageSeasonController::class, 'seasonDetails'])->name('admin.package.seasondetails');
        //admin.package.seasonadd.store
        Route::post('/package-seasonadd.store', [PackageSeasonController::class, 'seasonStore'])->name('admin.package.seasonadd.store');
        //                url: "/deleteSeasonDetails/" + delete_season_id,
        Route::delete('/deleteSeasonDetails/{id}', [PackageSeasonController::class, 'deleteSeasonDetails'])->name('admin.package.seasondetails.delete');

        //Sights
        Route::post('/storeSights', [MasterDataController::class, 'sightStore'])->name('admin.sight.store');
        Route::get('/addSightmaster', [MasterDataController::class, 'addSightMaster'])->name('admin.sightmaster');
        Route::get('/getSightDetails', [AdminlinkcreateController::class, 'indexSight'])->name('admin.sight.index');



        //Transport
        Route::get('/transport-index', [AdminlinkcreateController::class, 'indexTransport'])->name('admin.transport.index');
        Route::get('/addTransportmaster', [MasterDataController::class, 'addTransportmaster'])->name('admin.transportmaster');
        Route::post('/storeTransport', [MasterDataController::class, 'transportStore'])->name('admin.transport.store');

        //Meal
        Route::get('/meal-index', [AdminlinkcreateController::class, 'indexMeal'])->name('admin.meal.index');
        Route::get('/addMealtypemaster', [MasterDataController::class, 'addMealtypemaster'])->name('admin.mealtypemaster');
        Route::post('/storeMeal', [MasterDataController::class, 'mealTypeStore'])->name('admin.mealtype.store');

        //Package Activity
        Route::get('/package-activity-index', [AdminlinkcreateController::class, 'indexPackageActivity'])->name('admin.packageactivity.index');
        Route::get('/addPackageActivity', [MasterDataController::class, 'addPackageActivity'])->name('admin.packageactivitymaster');
        Route::post('/storePackageActivity', [MasterDataController::class, 'packageActivityStore'])->name('admin.packageactivity.store');
        Route::get('/packageactivity-edit/{id}', [AdminlinkcreateController::class, 'editPackageActivity'])->name('admin.packageactivity-edit');
        Route::post('/updatePackageActivity', [MasterDataController::class, 'packageActivityUpdate'])->name('admin.packageactivity.update');
        //delete with id
        Route::delete('/delete-packagesActivity/{id}', [MasterDataController::class, 'deletePackageActivity'])->name('admin.packageActivity.delete');

        //Package Type
        Route::get('/package-type-index', [AdminlinkcreateController::class, 'indexPackageType'])->name('admin.packagetype.index');
        Route::get('/addPackagetypemaster', [MasterDataController::class, 'addPackagetypemaster'])->name('admin.packagetypemaster');
        Route::post('/storePackagetype', [MasterDataController::class, 'packageTypeStore'])->name('admin.packagetype.store');
        Route::post('/deletePackageType', [MasterDataController::class, 'deletepackageType'])->name('admin-delete-for-package');
        Route::get('/editPackagetypemaster/{id}', [MasterDataController::class, 'editPackagetypemaster'])->name('admin-edit-packagetypemaster');
        Route::post('/updatePackagetype', [MasterDataController::class, 'packageTypeUpdate'])->name('admin.packagetype.update');



        //Hotel
        // Route::get('/hotel-index', [AdminlinkcreateController::class, 'indexHotel'])->name('admin.hotel.index');
        // Route::get('/addHotelmaster', [MasterDataController::class, 'addHotelMaster'])->name('admin.hotelmaster');
        // Route::post('/storeHotel', [MasterDataController::class, 'hotelStore'])->name('admin.hotel.store');


        //Store, Update, Delete Destination Data and retrive
        Route::get('/destination-index', [AdminlinkcreateController::class, 'indexDestination'])->name('admin.destination.index');
        Route::get('/adddestination', [MasterDataController::class, 'addDestination'])->name('admin.destinationmaster');
        Route::post('/storeDestination', [MasterDataController::class, 'destinationStore'])->name('admin.destination.store');
        Route::get('/destionation-edit/{id}', [MasterDataController::class, 'editDestination'])->name('admin.destination-edit');
        Route::post('/updateDestination/{id}', [MasterDataController::class, 'destinationUpdate'])->name('admin.destination.update');
        Route::get('/destination-delete/{id}', [MasterDataController::class, 'deleteDestination'])->name('admin.destination-delete');

        Route::get('/addPackagetypemaster', [MasterDataController::class, 'addPackagetypemaster'])->name('admin.packagetypemaster');

        //rule engine
        Route::get('/rule-engine-int-dest-tile', [RuleEngineController::class, 'ruleEngineIntDestTile'])->name('admin.ruleengine.int.dest.tile');
        Route::get('/package-type-icon-set-index', [AdminlinkcreateController::class, 'packagetypeiconindex'])->name('admin.package-type-icon-set-index');
        // *** Domestic***
        Route::get('/rule-engine-domestic-dest-tile', [RuleEngineController::class, 'ruleEngineDomesticTile'])->name('admin.ruleengine.domestic.dest.tile');

        //post data of rule emgine
        Route::post('/storeRuleEngine', [RuleEngineController::class, 'ruleEngineStore'])->name('admin.ruleengine.store');
        Route::post('/storeRuleEngineDomestic', [RuleEngineController::class, 'ruleEngineDomStore'])->name('admin.ruleengine.dom.store');

        // Delete Data From rull engine

        Route::get('/checkRecordExist', [RuleEngineController::class, 'recordExist'])->name('admin.ruleengine.dom.exist');
        Route::post('/deleteDomRulles', [RuleEngineController::class, 'deleteDomesticRulles'])->name('admin.ruleengine.dom.Delete');

        Route::get('/checkRecordInterExist', [RuleEngineController::class, 'recordintExist'])->name('admin.ruleengine.INT.exist');
        Route::post('/deleteInterRulles', [RuleEngineController::class, 'deleteInternationalRulles'])->name('admin.ruleengine.INT.Delete');

        // Package Gallery store
        Route::get('/pacakge-gallery', [AdminlinkcreateController::class, 'pacakgeGallery'])->name('admin.pacakage-gallery');
        Route::post('/storeGallery', [MasterDataController::class, 'packageGalleryStore'])->name('admin.pacakage-gallery.store');
        Route::get('/pacakge-gallery-fetch', [MasterDataController::class, 'pacakgeGalleryGet'])->name('admin.pacakage-gallery.get');
        Route::delete('/deleteGallery/{id}', [MasterDataController::class, 'deleteGalleryDetails'])->name('admin-pacakage-gallery-delete');


        // Home Page Banner Set

        Route::get('/homepage-banner-set', [AdminlinkcreateController::class, 'homePageBannerSet'])->name('admin.homepage-banner-set.get');
        Route::post('/storehomepagebanner', [RuleEngineController::class, 'storeHomepagebanner'])->name('homepage-banner-store');
        Route::post('/homepage-banner-delete', [RuleEngineController::class, 'deletebannerRulles'])->name('admin.ruleengine-banner.Delete');

        Route::get('/homepage-int-pacakges-set', [AdminlinkcreateController::class, 'homePageINTPacakagesSet'])->name('admin.homepage-INT-pacakages-set.get');
        Route::get('/homepage-pacakges-category', [RuleEngineController::class, 'homePagePacakagescategory'])->name('admin.homepage-pacakages-category.get');
        Route::post('/storehomepagePacakages', [RuleEngineController::class, 'storeHomepagepacakges'])->name('homepage-packages-store');
        Route::post('/deletehomepagePacakages', [RuleEngineController::class, 'deletePackagesRulles'])->name('admin.PackagesRulles-delete');


        Route::get('/homepage-int-pacakges-city-get', [RuleEngineController::class, 'homePageINTPacakagesCityget'])->name('admin-homepage-INT-pacakages-City-get');
        Route::get('/homepage-int-pacakges-night-get', [RuleEngineController::class, 'homePageINTPacakagesNightget'])->name('admin-homepage-INT-pacakages-Night-get');


        Route::get('/homepage-dom-pacakges-set', [AdminlinkcreateController::class, 'homePageDOMPacakagesSet'])->name('admin.homepage-DOM-pacakages-set.get');
        Route::get('/homepage-dom-pacakges-city-get', [RuleEngineController::class, 'homePageDOMPacakagesCityget'])->name('admin-homepage-DOM-pacakages-City-get');
        Route::get('/homepage-dom-pacakges-night-get', [RuleEngineController::class, 'homePageDOMPacakagesNightget'])->name('admin-homepage-DOM-pacakages-Night-get');

        Route::get('/aboutus-page-create', [AdminlinkcreateController::class, 'createAboutusPage'])->name('admin.aboutUs-page-create');
        Route::post('/aboutusstore', [RuleEngineController::class, 'storeaboutus'])->name('admin.aboutus.store');
        Route::post('/aboutusupdate', [RuleEngineController::class, 'updateaboutus'])->name('admin.aboutus.update');

        Route::get('/services-page-create', [AdminlinkcreateController::class, 'createServicesPage'])->name('admin.Services-create');
        Route::post('/Servicesstore', [RuleEngineController::class, 'storeServices'])->name('admin.Services.store');
        Route::post('/Servicesupdate', [RuleEngineController::class, 'updateServices'])->name('admin.Services.update');

        Route::get('/sub-services-page-index', [AdminlinkcreateController::class, 'indexsubServicesPage'])->name('admin.Sub-Services-index');
        Route::get('/sub-services-page-create', [AdminlinkcreateController::class, 'createsubServicesPage'])->name('admin.Sub-Services-create');
        Route::post('/SubServicesstore', [RuleEngineController::class, 'storeSubServices'])->name('admin-Sub-Services-store');
        Route::get('/EditSubServices/{id}', [AdminlinkcreateController::class, 'editSubServices'])->name('admin-Sub-Services-edit');
        Route::post('/SubServicesUpdate', [RuleEngineController::class, 'updateSubServices'])->name('admin-Sub-Services-update');
        Route::post('/SubServicesUpdateDelete', [RuleEngineController::class, 'deleteSubServices'])->name('admin-Sub-Services-Delete');


        ///company profile
        Route::get('/admin-company', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('admin.company.index');
        Route::post('/admin-company-store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('admin.company.store');
        //update
        Route::get('/admin-company-edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('admin.company.edit');
    });


    Route::get('/get-cities/{country_id}', function ($country_id) {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities);
    });


    //pacakge index
    Route::get('/package-index', [AdminlinkcreateController::class, 'indexPackage'])->name('admin.package-index');
    Route::get('/addpackage', [MasterDataController::class, 'addPackage'])->name('admin.package');
    Route::post('/storePacakge', [MasterDataController::class, 'packageStore'])->name('admin.package.store');
    Route::post('/updatePackage/{id}', [MasterDataController::class, 'updatePackage'])->name('admin.package.update');
    Route::get('/package-edit/{id}', [AdminlinkcreateController::class, 'editPackage'])->name('admin.package-edit-package');
    //delete with id
    Route::delete('/delete-packages/{id}', [MasterDataController::class, 'deletePackages'])->name('admin.package.delete');



    //package itenary
    Route::get('/addpackageitinerary', [MasterDataController::class, 'addPackageItinerary'])->name('admin.package.itinerary');
    Route::get('/get-package-details', [MasterDataController::class, 'getPackageDetails'])->name('getPackageDetails');
    Route::post('/get-mode-details', [MasterDataController::class, 'getModeDetails'])->name('get.mode.details');
    Route::post('/storePacakgeItinerary', [MasterDataController::class, 'packageItineraryStore'])->name('admin.package.itinerary.store');
    Route::get('/getItenaryDetails', [MasterDataController::class, 'packageItineraryDetails'])->name('getItenarydetails');
    Route::delete('/deleteItenaryDetails/{id}', [MasterDataController::class, 'deleteItenaryDetails'])->name('user-ItenaryDetails-delete');

    Route::get('/get-city-details/{id}', [MasterDataController::class, 'getCityDetails'])->name('getCityDetails');
    Route::get('/get-days-city-itenary', [MasterDataController::class, 'getDaysCityonItenarytrans'])->name('getdaysCityonitenarytrans');

    //Sights
    Route::post('/storeSights', [MasterDataController::class, 'sightStore'])->name('admin.sight.store');
    Route::get('/addSightmaster', [MasterDataController::class, 'addSightMaster'])->name('admin.sightmaster');
    Route::get('/getSightDetails', [AdminlinkcreateController::class, 'indexSight'])->name('admin.sight.index');



    //Transport
    Route::get('/transport-index', [AdminlinkcreateController::class, 'indexTransport'])->name('admin.transport.index');
    Route::get('/addTransportmaster', [MasterDataController::class, 'addTransportmaster'])->name('admin.transportmaster');
    Route::post('/storeTransport', [MasterDataController::class, 'transportStore'])->name('admin.transport.store');

    //Meal
    Route::get('/meal-index', [AdminlinkcreateController::class, 'indexMeal'])->name('admin.meal.index');
    Route::get('/addMealtypemaster', [MasterDataController::class, 'addMealtypemaster'])->name('admin.mealtypemaster');
    Route::post('/storeMeal', [MasterDataController::class, 'mealTypeStore'])->name('admin.mealtype.store');

    //Package Activity
    Route::get('/package-activity-index', [AdminlinkcreateController::class, 'indexPackageActivity'])->name('admin.packageactivity.index');
    Route::get('/addPackageActivity', [MasterDataController::class, 'addPackageActivity'])->name('admin.packageactivitymaster');
    Route::post('/storePackageActivity', [MasterDataController::class, 'packageActivityStore'])->name('admin.packageactivity.store');

    //Package Type
    Route::get('/package-type-index', [AdminlinkcreateController::class, 'indexPackageType'])->name('admin.packagetype.index');
    Route::get('/addPackagetypemaster', [MasterDataController::class, 'addPackagetypemaster'])->name('admin.packagetypemaster');
    Route::post('/storePackagetype', [MasterDataController::class, 'packageTypeStore'])->name('admin.packagetype.store');
    Route::post('/deletePackageType', [MasterDataController::class, 'deletepackageType'])->name('admin-delete-for-package');
    Route::get('/editPackagetypemaster/{id}', [MasterDataController::class, 'editPackagetypemaster'])->name('admin-edit-packagetypemaster');
    Route::post('/updatePackagetype', [MasterDataController::class, 'packageTypeUpdate'])->name('admin.packagetype.update');



    //Hotel
    Route::get('/hotel-index', [AdminlinkcreateController::class, 'indexHotel'])->name('admin.hotel.index');
    Route::get('/addHotelmaster', [MasterDataController::class, 'addHotelMaster'])->name('admin.hotelmaster');
    Route::post('/storeHotel', [MasterDataController::class, 'hotelStore'])->name('admin.hotel.store');
    Route::get('/hotel-edit/{id}', [AdminlinkcreateController::class, 'editHotel'])->name('admin.package-edit');
    Route::post('/deleteHotel', [MasterDataController::class, 'hotelDelete'])->name('admin-hotel-delete');
    Route::post('/updatehotel', [MasterDataController::class, 'updateHotel'])->name('admin-hotel-update');
    //Store, Update, Delete Destination Data and retrive
    Route::get('/destination-index', [AdminlinkcreateController::class, 'indexDestination'])->name('admin.destination.index');
    Route::get('/adddestination', [MasterDataController::class, 'addDestination'])->name('admin.destinationmaster');
    Route::post('/storeDestination', [MasterDataController::class, 'destinationStore'])->name('admin.destination.store');
    Route::get('/destionation-edit/{id}', [MasterDataController::class, 'editDestination'])->name('admin.destination-edit');
    Route::post('/updateDestination/{id}', [MasterDataController::class, 'destinationUpdate'])->name('admin.destination.update');
    Route::get('/destination-delete/{id}', [MasterDataController::class, 'deleteDestination'])->name('admin.destination-delete');

    Route::get('/addPackagetypemaster', [MasterDataController::class, 'addPackagetypemaster'])->name('admin.packagetypemaster');

    //rule engine
    Route::get('/rule-engine-int-dest-tile', [RuleEngineController::class, 'ruleEngineIntDestTile'])->name('admin.ruleengine.int.dest.tile');
    Route::get('/package-type-icon-set-index', [AdminlinkcreateController::class, 'packagetypeiconindex'])->name('admin.package-type-icon-set-index');
    // *** Domestic***
    Route::get('/rule-engine-domestic-dest-tile', [RuleEngineController::class, 'ruleEngineDomesticTile'])->name('admin.ruleengine.domestic.dest.tile');

    //post data of rule emgine
    Route::post('/storeRuleEngine', [RuleEngineController::class, 'ruleEngineStore'])->name('admin.ruleengine.store');
    Route::post('/storeRuleEngineDomestic', [RuleEngineController::class, 'ruleEngineDomStore'])->name('admin.ruleengine.dom.store');

    // Delete Data From rull engine

    Route::get('/checkRecordExist', [RuleEngineController::class, 'recordExist'])->name('admin.ruleengine.dom.exist');
    Route::post('/deleteDomRulles', [RuleEngineController::class, 'deleteDomesticRulles'])->name('admin.ruleengine.dom.Delete');

    Route::get('/checkRecordInterExist', [RuleEngineController::class, 'recordintExist'])->name('admin.ruleengine.INT.exist');
    Route::post('/deleteInterRulles', [RuleEngineController::class, 'deleteInternationalRulles'])->name('admin.ruleengine.INT.Delete');

    // Package Gallery store
    Route::get('/pacakge-gallery', [AdminlinkcreateController::class, 'pacakgeGallery'])->name('admin.pacakage-gallery');
    Route::post('/storeGallery', [MasterDataController::class, 'packageGalleryStore'])->name('admin.pacakage-gallery.store');
    Route::get('/pacakge-gallery-fetch', [MasterDataController::class, 'pacakgeGalleryGet'])->name('admin.pacakage-gallery.get');
    Route::delete('/deleteGallery/{id}', [MasterDataController::class, 'deleteGalleryDetails'])->name('admin-pacakage-gallery-delete');


    // Home Page Banner Set

    Route::get('/homepage-banner-set', [AdminlinkcreateController::class, 'homePageBannerSet'])->name('admin.homepage-banner-set.get');
    Route::post('/storehomepagebanner', [RuleEngineController::class, 'storeHomepagebanner'])->name('homepage-banner-store');
    Route::post('/homepage-banner-delete', [RuleEngineController::class, 'deletebannerRulles'])->name('admin.ruleengine-banner.Delete');

    Route::get('/homepage-int-pacakges-set', [AdminlinkcreateController::class, 'homePageINTPacakagesSet'])->name('admin.homepage-INT-pacakages-set.get');
    Route::get('/homepage-pacakges-category', [RuleEngineController::class, 'homePagePacakagescategory'])->name('admin.homepage-pacakages-category.get');
    Route::post('/storehomepagePacakages', [RuleEngineController::class, 'storeHomepagepacakges'])->name('homepage-packages-store');
    Route::post('/deletehomepagePacakages', [RuleEngineController::class, 'deletePackagesRulles'])->name('admin.PackagesRulles-delete');


    Route::get('/homepage-int-pacakges-city-get', [RuleEngineController::class, 'homePageINTPacakagesCityget'])->name('admin-homepage-INT-pacakages-City-get');
    Route::get('/homepage-int-pacakges-night-get', [RuleEngineController::class, 'homePageINTPacakagesNightget'])->name('admin-homepage-INT-pacakages-Night-get');


    Route::get('/homepage-dom-pacakges-set', [AdminlinkcreateController::class, 'homePageDOMPacakagesSet'])->name('admin.homepage-DOM-pacakages-set.get');
    Route::get('/homepage-dom-pacakges-city-get', [RuleEngineController::class, 'homePageDOMPacakagesCityget'])->name('admin-homepage-DOM-pacakages-City-get');
    Route::get('/homepage-dom-pacakges-night-get', [RuleEngineController::class, 'homePageDOMPacakagesNightget'])->name('admin-homepage-DOM-pacakages-Night-get');

    Route::get('/aboutus-page-create', [AdminlinkcreateController::class, 'createAboutusPage'])->name('admin.aboutUs-page-create');
    Route::post('/aboutusstore', [RuleEngineController::class, 'storeaboutus'])->name('admin.aboutus.store');
    Route::post('/aboutusupdate', [RuleEngineController::class, 'updateaboutus'])->name('admin.aboutus.update');

    Route::get('/services-page-create', [AdminlinkcreateController::class, 'createServicesPage'])->name('admin.Services-create');
    Route::post('/Servicesstore', [RuleEngineController::class, 'storeServices'])->name('admin.Services.store');
    Route::post('/Servicesupdate', [RuleEngineController::class, 'updateServices'])->name('admin.Services.update');

    Route::get('/sub-services-page-index', [AdminlinkcreateController::class, 'indexsubServicesPage'])->name('admin.Sub-Services-index');
    Route::get('/sub-services-page-create', [AdminlinkcreateController::class, 'createsubServicesPage'])->name('admin.Sub-Services-create');
    Route::post('/SubServicesstore', [RuleEngineController::class, 'storeSubServices'])->name('admin-Sub-Services-store');
    Route::get('/EditSubServices/{id}', [AdminlinkcreateController::class, 'editSubServices'])->name('admin-Sub-Services-edit');
    Route::post('/SubServicesUpdate', [RuleEngineController::class, 'updateSubServices'])->name('admin-Sub-Services-update');
    Route::post('/SubServicesUpdateDelete', [RuleEngineController::class, 'deleteSubServices'])->name('admin-Sub-Services-Delete');


    ///company profile
    Route::get('/admin-company', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('admin.company.index');
    Route::post('/admin-company-store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('admin.company.store');
    //edit company
    Route::post('/admin-company-update', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('admin.company.update');

    //company details
    Route::get('/admin-company-details', [App\Http\Controllers\Admin\CompanyDetailController::class, 'index'])->name('admin.company.company-details');
    Route::post('/admin-company-details-store', [App\Http\Controllers\Admin\CompanyDetailController::class, 'store'])->name('admin.company.company-details.store');
    //details update
    Route::post('/admin-company-details-update', [App\Http\Controllers\Admin\CompanyDetailController::class, 'update'])->name('admin.company.company-details.update');

    //company branch
    Route::get('/admin-company-branch', [App\Http\Controllers\Admin\CompanyBranchController::class, 'index'])->name('admin.company.company-branch');
    //add comoany branch
    Route::get('/admin-company-branch-add', [App\Http\Controllers\Admin\CompanyBranchController::class, 'branchAdd'])->name('admin.company.company-branch-add');
    //store comoany branch
    Route::post('/admin-company-branch-store', [App\Http\Controllers\Admin\CompanyBranchController::class, 'store'])->name('admin.company.company-branch.store');

    //edit comoany branch
    Route::get('/admin-company-branch-edit/{id}', [App\Http\Controllers\Admin\CompanyBranchController::class, 'branchEdit'])->name('admin.company.company-branch-edit');

    //update comoany branch
    Route::post('/admin-company-branch-update/{id}', [App\Http\Controllers\Admin\CompanyBranchController::class, 'update'])->name('admin.company.company-branch.update');

    //delete
    Route::post('/admin-company-branch-delete/{id}', [App\Http\Controllers\Admin\CompanyBranchController::class, 'delete'])->name('admin.company.company-branch.delete');

    // Season Master
    Route::get('/season-index', [AdminlinkcreateController::class, 'seasonindex'])->name('admin-season-index');
    Route::get('/season-add', [AdminlinkcreateController::class, 'seasonadd'])->name('admin-season-add');
    Route::post('/season-store', [MasterDataController::class, 'seasonstore'])->name('admin-season-store');
    Route::get('/season-edit/{id}', [AdminlinkcreateController::class, 'seasonedit'])->name('admin-season-edit');
    Route::post('/season-update', [MasterDataController::class, 'seasonupdate'])->name('admin-season-update');
    Route::post('/season-delete', [MasterDataController::class, 'seasondelete'])->name('admin-season-delete');
    // Hotel Property
    Route::get('/hotelproperty-index', [AdminlinkcreateController::class, 'hotelpropertyindex'])->name('admin-hotelproperty-index');
    Route::get('/hotelproperty-add', [AdminlinkcreateController::class, 'hotelpropertyadd'])->name('admin-hotelproperty-add');
    Route::post('/hotelproperty-store', [MasterDataController::class, 'hotelpropertystore'])->name('admin-hotelproperty-store');
    Route::get('/hotelproperty-edit/{id}', [AdminlinkcreateController::class, 'hotelpropertyedit'])->name('admin-hotelproperty-edit');
    Route::post('/hotelproperty-update', [MasterDataController::class, 'hotelpropertyupdate'])->name('admin-hotelproperty-update');
    Route::post('/hotelproperty-delete', [MasterDataController::class, 'hotelpropertydelete'])->name('admin-hotelproperty-delete');

    // Hotel Amenities
    Route::get('/Amenities-index', [AdminlinkcreateController::class, 'amenitiesindex'])->name('admin-amenities-index');
    Route::get('/Amenities-add', [AdminlinkcreateController::class, 'Amenitiesadd'])->name('admin-Amenities-add');
    Route::post('/Amenities-store', [MasterDataController::class, 'Amenitiesstore'])->name('admin-Amenities-store');
    Route::get('/Amenities-edit/{id}', [AdminlinkcreateController::class, 'Amenitiesedit'])->name('admin-Amenities-edit');
    Route::post('/Amenities-update', [MasterDataController::class, 'Amenitiesupdate'])->name('admin-Amenities-update');
    Route::post('/Amenities-delete', [MasterDataController::class, 'Amenitiesdelete'])->name('admin-Amenities-delete');

    // Hotel Details
    Route::get('/getHotelPrices', [AdminlinkcreateController::class, 'createHotelCost'])->name('admin-HotelPrices');
    Route::get('/hotelPriceDetails', [HotelController::class, 'priceDetails'])->name('admin-hotel-prices');
    Route::post('/hotelPriceStore', [HotelController::class, 'priceStore'])->name('admin-hotel-prices-store');
    Route::delete('/deleteHotelPrice/{id}', [HotelController::class, 'deleteHotelPrice'])->name('admin-hotel-prices-delete');
    Route::get('/getHotelGalaries', [AdminlinkcreateController::class, 'createHotelgallery'])->name('admin-HotelGallery');
    Route::post('/hotelIndoorImgStore', [HotelController::class, 'indoorImageStore'])->name('admin-hotel-indoor-image-store');

    Route::get('/getHotelFacilities', [AdminlinkcreateController::class, 'createHotelfacilities'])->name('admin-Facilities');




    Route::get('/hotelAmenitiesDetails', [HotelController::class, 'hotelAmenitiesDetails'])->name('admin-hotel-Amenities-details');
    Route::post('/hotelAmenitiesDetailsStore', [HotelController::class, 'hotelAmenitiesDetailsStore'])->name('admin-hotel-Amenities-details-store');
    Route::delete('/hotelAmenitiesDetails/{id}', [HotelController::class, 'deletehotelAmenitiesDetails'])->name('admin--hotel-Amenities-details-delete');


    Route::get('/hotelPrpertRulesDetails', [HotelController::class, 'hotelPrpertRulesDetails'])->name('admin-hotel-Rules-details');
    Route::post('/hotelPrpertRulesDetailsStore', [HotelController::class, 'hotelPrpertRulesDetailsStore'])->name('admin-hotel-Property-details-store');
    Route::delete('/hotelPrpertRulesDetails/{id}', [HotelController::class, 'deletehotelPrpertRulesDetails'])->name('admin--hotel-Property-details-delete');


    // Hotel Property Rules Master
    Route::get('/hotelpropertyrules-index', [AdminlinkcreateController::class, 'hotelpropertyrulesindex'])->name('admin-hotelpropertyrules-index');
    Route::get('/hotelpropertyrules-add', [AdminlinkcreateController::class, 'hotelpropertyrulesaddd'])->name('admin-hotelpropertyrules-add');
    Route::post('/hotelpropertyrules-store', [MasterDataController::class, 'hotelpropertyrulesstore'])->name('admin-hotelpropertyrules-store');
    Route::get('/hotelpropertyrules-edit/{id}', [AdminlinkcreateController::class, 'hotelpropertyrulesedit'])->name('admin-hotelpropertyrules-edit');
    Route::post('/hotelpropertyrules-update', [MasterDataController::class, 'hotelpropertyrulesupdate'])->name('admin-hotelpropertyrules-update');
    Route::post('/hotelpropertyrules-delete', [MasterDataController::class, 'hotelpropertyrulesdelete'])->name('admin-hotelpropertyrules-delete');

    // hotel rooms details
    Route::get('/hotelRoomWithPrice', [AdminlinkcreateController::class, 'roomWithPrice'])->name('admin-hotel-rooms');
    Route::get('/addRoom', [AdminlinkcreateController::class, 'addRoomWithPrice'])->name('admin-add-room-with-price');
    Route::post('/hotelRoomStore', [HotelController::class, 'hotelRoomsStore'])->name('admin-hotelRooms-store');
    Route::post('/deleteHotelrooms', [HotelController::class, 'hotelRoomDelete'])->name('admin-hotelRoom-delete');
    Route::get('/getRoomDetails', [HotelController::class, 'getRoomDetailsbyHotelID'])->name('admin-get-rooms');

    // HotelRooms Options
    Route::get('/hotelRoomOption', [AdminlinkcreateController::class, 'roomOption'])->name('admin-rooms-option');
    Route::get('/hotelRoomOptionGet', [HotelController::class, 'getHotelRoomOption'])->name('admin-rooms-option-get');
    Route::post('/hotelRoomOptionStore', [HotelController::class, 'roomOptionStore'])->name('admin-hotel-RoomOption-store');
    Route::delete('/deleteRoomOption/{id}', [HotelController::class, 'deleteroomOption'])->name('admin-hotel-RoomOption-delete');




    // 28-05-2024 Package Availability (Group Departure Or Fixed Departure)


     Route::get('/package-availability', [AdminlinkcreateController::class, 'indexPackageavailability'])->name('admin.package-availability');
     Route::get('/package-availability-get', [MasterDataController::class, 'getPackageAvailability'])->name('admin-package-availability-fetch');
     Route::post('/package-availability-store', [MasterDataController::class, 'PackageAvailabilityStore'])->name('admin-package-availability-store');
     Route::delete('/delete-package-availability/{id}', [MasterDataController::class, 'deletePackageAvailability'])->name('admin.package.availability.delete');

    Route::get('pg', [PhonepayController::class, 'index']);

    Route::post('pay', [PhonepayController::class, 'payment_init']);
    Route::get('pay-refund-view', [PhonepayController::class, 'refund']);
    Route::get('pay-refund', [PhonepayController::class, 'payment_refund']);
    Route::any('pay-return-url', [PhonepayController::class, 'payment_return'])->name('pay-return-url');
    Route::post('pay-callback-url', [PhonepayController::class, 'payment_callback'])->name('pay-callback-url');
    Route::any('pay-refund-callback', [PhonepayController::class, 'payment_refund_callback'])->name('pay-refund-callback');
});
