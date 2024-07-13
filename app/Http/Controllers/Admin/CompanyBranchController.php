<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CompanyBranch;
use App\Models\Admin\CompanyProfile;
use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    //index method
    public function index()
    {
        $branches = CompanyBranch::all();

        return view('admin.company.company-branch-index', compact('branches'));
    }

    public function branchAdd(){

        $companies = CompanyProfile::all();
        return view('admin.company.company-branch-add', compact('companies'));
    }

    //store method


    public function store(Request $request){

        $branch = new CompanyBranch();
        $branch->company_id = $request->company_id;
        $branch->company_address = $request->company_address;
        $branch->country_code_1 = $request->country_code_1;
        $branch->phone_number_1 = $request->phone_number_1;
        $branch->country_code_2 = $request->country_code_2;
        $branch->phone_number_2 = $request->phone_number_2;
        $branch->company_email_1 = $request->company_email_1;
        $branch->company_email_2 = $request->company_email_2;
        $branch->company_country = $request->company_country;
        $branch->company_state = $request->company_state;
        $branch->company_city = $request->company_city;
        $branch->contact_person_name = $request->contact_person_name;
        $branch->contact_person_email = $request->contact_person_email;
        $branch->contact_person_phone = $request->contact_person_phone;
        $branch->save();

        if($branch){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    //show method
    public function branchEdit($id)
    {
        $branch = CompanyBranch::find($id);
        $companies = CompanyProfile::all();
        return view('admin.company.company-branch-edit', compact('branch', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $branch = CompanyBranch::find($id);
        if (!$branch) {
            return response()->json(['success' => false, 'message' => 'error']);
        }

        $branch->company_id = $request->input('company_id');
        $branch->company_address = $request->input('company_address');
        $branch->country_code_1 = $request->input('country_code_1');
        $branch->phone_number_1 = $request->input('phone_number_1');
        $branch->country_code_2 = $request->input('country_code_2');
        $branch->phone_number_2 = $request->input('phone_number_2');
        $branch->company_email_1 = $request->input('company_email_1');
        $branch->company_email_2 = $request->input('company_email_2');
        $branch->company_country = $request->input('company_country');
        $branch->company_state = $request->input('company_state');
        $branch->company_city = $request->input('company_city');
        $branch->contact_person_name = $request->input('contact_person_name');
        $branch->contact_person_email = $request->input('contact_person_email');
        $branch->contact_person_phone = $request->input('contact_person_phone');
        $branch->save();

        if($branch){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }

    }
    public function delete($id)
    {

        $branch = CompanyBranch::find($id);


        if (!$branch) {
            return response()->json(['success' => false, 'message' => 'error']);
        }


        $branch->delete();

        if($branch){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }




}
