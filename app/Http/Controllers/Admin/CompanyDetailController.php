<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CompanyDetail;
use App\Models\Admin\CompanyProfile;
use Illuminate\Http\Request;


class CompanyDetailController extends Controller
{
    //
    public function index(){
        $companies = CompanyProfile::all();
        $details = CompanyDetail::all();
        $count = CompanyDetail::count();
        return view('admin.company.company-details', compact('companies', 'details', 'count'));
    }
    public function store(Request $request){
        //'company_id', 'company_GSTIN_no', 'bank_name', 'bank_ifsc_code', 'branch_code'
        $company = new CompanyDetail();
        $company->company_id = $request->company_id;
        $company->company_GSTIN_no = $request->company_GSTIN_no;
        $company->bank_name = $request->bank_name;
        $company->bank_ifsc_code = $request->bank_ifsc_code;
        $company->branch_code = $request->branch_code;
        $company->save();

        if($company){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }


    }

    //update
    public function update(Request $request){
        $company = CompanyDetail::find($request->hid);
        $company->company_id = $request->company_id;
        $company->company_GSTIN_no = $request->company_GSTIN_no;
        $company->bank_name = $request->bank_name;
        $company->bank_ifsc_code = $request->bank_ifsc_code;
        $company->branch_code = $request->branch_code;
        $company->save();

        if($company){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }
}
