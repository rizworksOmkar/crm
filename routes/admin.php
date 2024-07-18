<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\CRM\LinkController;
use App\Http\Controllers\CRM\LeadController;
use App\Http\Controllers\CRM\EmployeeController;
use App\Models\Lead;

Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['Admin']], function () {

        Route::get('/landing-page', [LinkController::class, 'adminDashboard'])->name('Admin-dashboard');
        Route::get('/employee', [LinkController::class, 'employeeindex'])->name('admin-employee-index');
        Route::get('/createEmployee', [LinkController::class, 'createEmployee'])->name('admin-create-employee');
        Route::post('/storeEmployee', [EmployeeController::class, 'storeEmployee'])->name('admin-employee-store');
        Route::post('/deletEmployee', [EmployeeController::class, 'deleteEmployee'])->name('admin-employee-delete');
        Route::get('/check-username/{username}', [EmployeeController::class, 'checkUsernameAvailability']);

        //lead
        Route::get('/leads', [LeadController::class, 'leadIndex'])->name('admin-lead-index');
        Route::get('/createLead', [LeadController::class, 'createLead'])->name('admin-create-lead');
        Route::post('/storeLead', [LeadController::class, 'storeLead'])->name('admin-lead-store');
        Route::delete('/leads/{id}', [LeadController::class, 'deleteLead'])->name('leads.delete');
        Route::get('/leads/{id}/edit', [LeadController::class, 'editLead'])->name('leads.edit');
        Route::put('/leads/{id}', [LeadController::class, 'updateLead'])->name('leads.update');

        Route::get('/myEmpTasks/{id}', [LeadController::class, 'showEmpTask'])->name('view.showEmpTasks');

        // admin-contact-store
        Route::post('/contactStore', [LeadController::class, 'storeContact'])->name('admin-contact-store');
        //Store, Update, Delete Country Data and retrive
        // Route::post('/deleteCountry', [MasterDataController::class, 'countryDelete'])->name('admin.country.delete');

        // //Store, Update, Delete State Data and retrive
        // Route::get('/state-index', [AdminlinkcreateController::class, 'indexState'])->name('admin.state-index');
        // Route::get('/addstate', [AdminlinkcreateController::class, 'addState'])->name('admin.state');
        // Route::post('/storeState', [DataStoreController::class, 'stateStore'])->name('admin.state.store');

        // //Store, Update, Delete City Data and retrive
        // Route::get('/city-index', [AdminlinkcreateController::class, 'indexCity'])->name('admin.city-index');
        // Route::get('/addcity', [AdminlinkcreateController::class, 'addCity'])->name('admin.city');

        // Route::post('/storeCity', [DataStoreController::class, 'cityStore'])->name('admin.city.store');
        //

        // Route::get('/check-country-DOMorINT', [MasterDataController::class, 'chkcountryDI'])->name('admin.chkcountryDI');
        // Route::get('/fetch-state', [MasterDataController::class, 'stateFetch'])->name('admin.state-fetch');


        // Route::get('/get-states/{country_id}', function ($country_id) {
        //     $states = State::where('country_id', $country_id)->get();
        //     return response()->json($states);
        // });


        // Route::get('/get-cities/{country_id}', function ($country_id) {
        //     $cities = City::where('country_id', $country_id)->get();
        //     return response()->json($cities);
        // });


        // //pacakge index
        // Route::get('/package-index', [AdminlinkcreateController::class, 'indexPackage'])->name('admin.package-index');
        // Route::get('/addpackage', [MasterDataController::class, 'addPackage'])->name('admin.package');
        // Route::post('/storePacakge', [MasterDataController::class, 'packageStore'])->name('admin.package.store');
        // Route::post('/updatePackage/{id}', [MasterDataController::class, 'updatePackage'])->name('admin.package.update');
        // Route::get('/package-edit/{id}', [AdminlinkcreateController::class, 'editPackage'])->name('admin.package-edit');
        // //delete with id
        // Route::delete('/delete-packages/{id}', [MasterDataController::class, 'deletePackages'])->name('admin.package.delete');



        // //package itenary
        // Route::get('/addpackageitinerary', [MasterDataController::class, 'addPackageItinerary'])->name('admin.package.itinerary');
        // Route::get('/get-package-details', [MasterDataController::class, 'getPackageDetails'])->name('getPackageDetails');
        // Route::post('/get-mode-details', [MasterDataController::class, 'getModeDetails'])->name('get.mode.details');
        // Route::post('/storePacakgeItinerary', [MasterDataController::class, 'packageItineraryStore'])->name('admin.package.itinerary.store');
        // Route::get('/getItenaryDetails', [MasterDataController::class, 'packageItineraryDetails'])->name('getItenarydetails');
        // Route::delete('/deleteItenaryDetails/{id}', [MasterDataController::class, 'deleteItenaryDetails'])->name('user-ItenaryDetails-delete');

        // Route::get('/get-city-details/{id}', [MasterDataController::class, 'getCityDetails'])->name('getCityDetails');
        // Route::get('/get-days-city-itenary', [MasterDataController::class, 'getDaysCityonItenarytrans'])->name('getdaysCityonitenarytrans');

        // //season add
        // Route::get('/package-seasonadd', [PackageSeasonController::class, 'index'])->name('admin.package.seasonadd');
        // //season details
        // Route::get('/package-seasondetails', [PackageSeasonController::class, 'seasonDetails'])->name('admin.package.seasondetails');
        // //admin.package.seasonadd.store
        // Route::post('/package-seasonadd.store', [PackageSeasonController::class, 'seasonStore'])->name('admin.package.seasonadd.store');
        // //                url: "/deleteSeasonDetails/" + delete_season_id,
        // Route::delete('/deleteSeasonDetails/{id}', [PackageSeasonController::class, 'deleteSeasonDetails'])->name('admin.package.seasondetails.delete');

        // //Sights
        // Route::post('/storeSights', [MasterDataController::class, 'sightStore'])->name('admin.sight.store');
        // Route::get('/addSightmaster', [MasterDataController::class, 'addSightMaster'])->name('admin.sightmaster');
        // Route::get('/getSightDetails', [AdminlinkcreateController::class, 'indexSight'])->name('admin.sight.index');



        // //Transport
        // Route::get('/transport-index', [AdminlinkcreateController::class, 'indexTransport'])->name('admin.transport.index');
        // Route::get('/addTransportmaster', [MasterDataController::class, 'addTransportmaster'])->name('admin.transportmaster');
        // Route::post('/storeTransport', [MasterDataController::class, 'transportStore'])->name('admin.transport.store');

        // //Meal
        // Route::get('/meal-index', [AdminlinkcreateController::class, 'indexMeal'])->name('admin.meal.index');
        // Route::get('/addMealtypemaster', [MasterDataController::class, 'addMealtypemaster'])->name('admin.mealtypemaster');
        // Route::post('/storeMeal', [MasterDataController::class, 'mealTypeStore'])->name('admin.mealtype.store');

        // //Package Activity
        // Route::get('/package-activity-index', [AdminlinkcreateController::class, 'indexPackageActivity'])->name('admin.packageactivity.index');
        // Route::get('/addPackageActivity', [MasterDataController::class, 'addPackageActivity'])->name('admin.packageactivitymaster');
        // Route::post('/storePackageActivity', [MasterDataController::class, 'packageActivityStore'])->name('admin.packageactivity.store');
        // Route::get('/packageactivity-edit/{id}', [AdminlinkcreateController::class, 'editPackageActivity'])->name('admin.packageactivity-edit');
        // Route::post('/updatePackageActivity', [MasterDataController::class, 'packageActivityUpdate'])->name('admin.packageactivity.update');
        // //delete with id
        // Route::delete('/delete-packagesActivity/{id}', [MasterDataController::class, 'deletePackageActivity'])->name('admin.packageActivity.delete');

        // //Package Type
        // Route::get('/package-type-index', [AdminlinkcreateController::class, 'indexPackageType'])->name('admin.packagetype.index');
        // Route::get('/addPackagetypemaster', [MasterDataController::class, 'addPackagetypemaster'])->name('admin.packagetypemaster');
        // Route::post('/storePackagetype', [MasterDataController::class, 'packageTypeStore'])->name('admin.packagetype.store');
        // Route::post('/deletePackageType', [MasterDataController::class, 'deletepackageType'])->name('admin-delete-for-package');
        // Route::get('/editPackagetypemaster/{id}', [MasterDataController::class, 'editPackagetypemaster'])->name('admin-edit-packagetypemaster');
        // Route::post('/updatePackagetype', [MasterDataController::class, 'packageTypeUpdate'])->name('admin.packagetype.update');



        // //Hotel
        // // Route::get('/hotel-index', [AdminlinkcreateController::class, 'indexHotel'])->name('admin.hotel.index');
        // // Route::get('/addHotelmaster', [MasterDataController::class, 'addHotelMaster'])->name('admin.hotelmaster');
        // // Route::post('/storeHotel', [MasterDataController::class, 'hotelStore'])->name('admin.hotel.store');


        // //Store, Update, Delete Destination Data and retrive
        // Route::get('/destination-index', [AdminlinkcreateController::class, 'indexDestination'])->name('admin.destination.index');
        // Route::get('/adddestination', [MasterDataController::class, 'addDestination'])->name('admin.destinationmaster');
        // Route::post('/storeDestination', [MasterDataController::class, 'destinationStore'])->name('admin.destination.store');
        // Route::get('/destionation-edit/{id}', [MasterDataController::class, 'editDestination'])->name('admin.destination-edit');
        // Route::post('/updateDestination/{id}', [MasterDataController::class, 'destinationUpdate'])->name('admin.destination.update');
        // Route::get('/destination-delete/{id}', [MasterDataController::class, 'deleteDestination'])->name('admin.destination-delete');

        // Route::get('/addPackagetypemaster', [MasterDataController::class, 'addPackagetypemaster'])->name('admin.packagetypemaster');

        // //rule engine
        // Route::get('/rule-engine-int-dest-tile', [RuleEngineController::class, 'ruleEngineIntDestTile'])->name('admin.ruleengine.int.dest.tile');
        // Route::get('/package-type-icon-set-index', [AdminlinkcreateController::class, 'packagetypeiconindex'])->name('admin.package-type-icon-set-index');
        // // *** Domestic***
        // Route::get('/rule-engine-domestic-dest-tile', [RuleEngineController::class, 'ruleEngineDomesticTile'])->name('admin.ruleengine.domestic.dest.tile');

        // //post data of rule emgine
        // Route::post('/storeRuleEngine', [RuleEngineController::class, 'ruleEngineStore'])->name('admin.ruleengine.store');
        // Route::post('/storeRuleEngineDomestic', [RuleEngineController::class, 'ruleEngineDomStore'])->name('admin.ruleengine.dom.store');

        // // Delete Data From rull engine

        // Route::get('/checkRecordExist', [RuleEngineController::class, 'recordExist'])->name('admin.ruleengine.dom.exist');
        // Route::post('/deleteDomRulles', [RuleEngineController::class, 'deleteDomesticRulles'])->name('admin.ruleengine.dom.Delete');

        // Route::get('/checkRecordInterExist', [RuleEngineController::class, 'recordintExist'])->name('admin.ruleengine.INT.exist');
        // Route::post('/deleteInterRulles', [RuleEngineController::class, 'deleteInternationalRulles'])->name('admin.ruleengine.INT.Delete');

        // // Package Gallery store
        // Route::get('/pacakge-gallery', [AdminlinkcreateController::class, 'pacakgeGallery'])->name('admin.pacakage-gallery');
        // Route::post('/storeGallery', [MasterDataController::class, 'packageGalleryStore'])->name('admin.pacakage-gallery.store');
        // Route::get('/pacakge-gallery-fetch', [MasterDataController::class, 'pacakgeGalleryGet'])->name('admin.pacakage-gallery.get');
        // Route::delete('/deleteGallery/{id}', [MasterDataController::class, 'deleteGalleryDetails'])->name('admin-pacakage-gallery-delete');


        // // Home Page Banner Set

        // Route::get('/homepage-banner-set', [AdminlinkcreateController::class, 'homePageBannerSet'])->name('admin.homepage-banner-set.get');
        // Route::post('/storehomepagebanner', [RuleEngineController::class, 'storeHomepagebanner'])->name('homepage-banner-store');
        // Route::post('/homepage-banner-delete', [RuleEngineController::class, 'deletebannerRulles'])->name('admin.ruleengine-banner.Delete');

        // Route::get('/homepage-int-pacakges-set', [AdminlinkcreateController::class, 'homePageINTPacakagesSet'])->name('admin.homepage-INT-pacakages-set.get');
        // Route::get('/homepage-pacakges-category', [RuleEngineController::class, 'homePagePacakagescategory'])->name('admin.homepage-pacakages-category.get');
        // Route::post('/storehomepagePacakages', [RuleEngineController::class, 'storeHomepagepacakges'])->name('homepage-packages-store');
        // Route::post('/deletehomepagePacakages', [RuleEngineController::class, 'deletePackagesRulles'])->name('admin.PackagesRulles-delete');


        // Route::get('/homepage-int-pacakges-city-get', [RuleEngineController::class, 'homePageINTPacakagesCityget'])->name('admin-homepage-INT-pacakages-City-get');
        // Route::get('/homepage-int-pacakges-night-get', [RuleEngineController::class, 'homePageINTPacakagesNightget'])->name('admin-homepage-INT-pacakages-Night-get');


        // Route::get('/homepage-dom-pacakges-set', [AdminlinkcreateController::class, 'homePageDOMPacakagesSet'])->name('admin.homepage-DOM-pacakages-set.get');
        // Route::get('/homepage-dom-pacakges-city-get', [RuleEngineController::class, 'homePageDOMPacakagesCityget'])->name('admin-homepage-DOM-pacakages-City-get');
        // Route::get('/homepage-dom-pacakges-night-get', [RuleEngineController::class, 'homePageDOMPacakagesNightget'])->name('admin-homepage-DOM-pacakages-Night-get');

        // Route::get('/aboutus-page-create', [AdminlinkcreateController::class, 'createAboutusPage'])->name('admin.aboutUs-page-create');
        // Route::post('/aboutusstore', [RuleEngineController::class, 'storeaboutus'])->name('admin.aboutus.store');
        // Route::post('/aboutusupdate', [RuleEngineController::class, 'updateaboutus'])->name('admin.aboutus.update');

        // Route::get('/services-page-create', [AdminlinkcreateController::class, 'createServicesPage'])->name('admin.Services-create');
        // Route::post('/Servicesstore', [RuleEngineController::class, 'storeServices'])->name('admin.Services.store');
        // Route::post('/Servicesupdate', [RuleEngineController::class, 'updateServices'])->name('admin.Services.update');

        // Route::get('/sub-services-page-index', [AdminlinkcreateController::class, 'indexsubServicesPage'])->name('admin.Sub-Services-index');
        // Route::get('/sub-services-page-create', [AdminlinkcreateController::class, 'createsubServicesPage'])->name('admin.Sub-Services-create');
        // Route::post('/SubServicesstore', [RuleEngineController::class, 'storeSubServices'])->name('admin-Sub-Services-store');
        // Route::get('/EditSubServices/{id}', [AdminlinkcreateController::class, 'editSubServices'])->name('admin-Sub-Services-edit');
        // Route::post('/SubServicesUpdate', [RuleEngineController::class, 'updateSubServices'])->name('admin-Sub-Services-update');
        // Route::post('/SubServicesUpdateDelete', [RuleEngineController::class, 'deleteSubServices'])->name('admin-Sub-Services-Delete');


        // ///company profile
        // Route::get('/admin-company', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('admin.company.index');
        // Route::post('/admin-company-store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('admin.company.store');
        // //update
        // Route::get('/admin-company-edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('admin.company.edit');
    });
});
