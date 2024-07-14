<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
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
    
     public function storeEmployee(Request $request)
     {
        //  $request->validate([
        //      'country_name' => 'required',
        //      'country_alias' => 'nullable',
        //      'country_code' => 'nullable',
 
        //  ]);
        $flag = 0;

        if($request->chkWhatsaappcheck == 1){
            $flag = 1;
        }else{
            $flag = 0;
        }
         $createEmployee = new User();
         $createEmployee->role_type =$request->emptype;
         $createEmployee->first_name = $request->empFirstname;
         $createEmployee->middle_name = $request->empMidName;
         $createEmployee->last_name = $request->empLastName;
         $createEmployee->email  = $request->empUserName;
         $createEmployee->usersemail   = $request->empEmailid;
         $createEmployee->phonenumber   = $request->empPhoneno;
         $createEmployee->whatsapp_no_flag = $flag;
         $createEmployee->whatsappno = $request->empWhatsAppno;
         $createEmployee->createdbyadmin= Auth::user()->id;
         $createEmployee->password= Hash::make($request->empPassword);
         $createEmployee->email_verified_flag= 1;
         $createEmployee->save();
         if($createEmployee){
 
             return response()->json(['success' => true, 'message' => 'success']);
           }
           else{
             return response()->json(['success' => false, 'message' => 'error']);
           }
     }

     public function deleteEmployee(Request $request)
     {
         $deletedid = User::where('id', $request->id)->delete();
 
     }

}
