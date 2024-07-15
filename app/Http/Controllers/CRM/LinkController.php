<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
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

    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function superadminDashboard()
    {
        return view('superadmin.index');
    }

    public function employeeindex()
    {
        $users = User::where('role_type', '!=', 'superadmin')
        ->where('id', '!=', Auth::user()->id)
        ->where('email', '!=','riz')
        ->orderByRaw('id DESC')->get();
        return view('admin.employee.index', compact('users'));
    }

    public function createEmployee()
    {
        return view('admin.employee.create-employee');
    }

}
