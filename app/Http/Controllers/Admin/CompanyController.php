<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\CompanyProfile;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $count = CompanyProfile::count();
        $companies = CompanyProfile::all();

        return view('admin.company.index', compact('countries', 'states', 'cities', 'companies', 'count'));
    }

    public function store(Request $request)
    {
        $company = new CompanyProfile();
        $company->company_name = $request->company_name;
        $company->company_email_id_1 = $request->company_email_id_1;
        $company->company_email_id_2 = $request->company_email_id_2;
        $company->company_country_code = $request->company_country_code;
        $company->company_phone_number_1 = $request->company_phone_number_1;
        $company->company_phone_number_2 = $request->company_phone_number_2;
        $company->company_landline_1 = $request->company_landline_1;
        $company->company_landline_2 = $request->company_landline_2;
        $company->company_registered_address = $request->company_registered_address;
        $company->city_id = $request->city_id;
        $company->state_id = $request->state_id;
        $company->country_id = $request->country_id;
        $company->pincode = $request->pincode;

        if ($request->hasFile('company_logo_1')) {
            $file = $request->file('company_logo_1');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Logo1_' . time() . '.' . $extension;
            $file->move('storage/admin/img/company-logos/', $filename);
            $image_path = 'storage/admin/img/company-logos/' . $filename;
            $company->company_logo_1 = $image_path;
        }

        // Handle logo 2 image upload
        if ($request->hasFile('company_logo_2')) {
            $file = $request->file('company_logo_2');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Logo2_' . time() . '.' . $extension;
            $file->move('storage/admin/img/company-logos/', $filename);
            $image_path = 'storage/admin/img/company-logos/' . $filename;
            $company->company_logo_2 = $image_path;
        }

        $result = $company->save();
        if ($result) {
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    //update
    public function update(Request $request){

        $company = CompanyProfile::find($request->hiddenId);
        $company->company_name = $request->company_name;
        $company->company_email_id_1 = $request->company_email_id_1;
        $company->company_email_id_2 = $request->company_email_id_2;
        $company->company_country_code = $request->company_country_code;
        $company->company_phone_number_1 = $request->company_phone_number_1;
        $company->company_phone_number_2 = $request->company_phone_number_2;
        $company->company_landline_1 = $request->company_landline_1;
        $company->company_landline_2 = $request->company_landline_2;
        $company->company_registered_address = $request->company_registered_address;
        $company->city_id = $request->city_id;
        $company->state_id = $request->state_id;
        $company->country_id = $request->country_id;
        $company->pincode = $request->pincode;

        if ($request->hasFile('company_logo_1')) {
            $file = $request->file('company_logo_1');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Logo1_' . time() . '.' . $extension;
            $file->move('storage/admin/img/company-logos/', $filename);
            $image_path = 'storage/admin/img/company-logos/' . $filename;
            $company->company_logo_1 = $image_path;
        }

        // Handle logo 2 image upload
        if ($request->hasFile('company_logo_2')) {
            $file = $request->file('company_logo_2');
            $extension = $file->getClientOriginalExtension();
            $filename = 'Logo2_' . time() . '.' . $extension;
            $file->move('storage/admin/img/company-logos/', $filename);
            $image_path = 'storage/admin/img/company-logos/' . $filename;
            $company->company_logo_2 = $image_path;
        }

        $result = $company->save();

        if ($result) {
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }


}
