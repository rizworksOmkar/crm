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
use App\Models\Lead;


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

        if ($request->chkWhatsaappcheck == 1) {
            $flag = 1;
        } else {
            $flag = 0;
        }
        $createEmployee = new User();
        $createEmployee->role_type = $request->emptype;
        $createEmployee->first_name = $request->empFirstname;
        $createEmployee->middle_name = $request->empMidName;
        $createEmployee->last_name = $request->empLastName;
        $createEmployee->email  = $request->empUserName;
        $createEmployee->usersemail   = $request->empEmailid;
        $createEmployee->phonenumber   = $request->empPhoneno;
        $createEmployee->whatsapp_no_flag = $flag;
        $createEmployee->whatsappno = $request->empWhatsAppno;
        $createEmployee->createdbyadmin = Auth::user()->id;
        $createEmployee->password = Hash::make($request->empPassword);
        $createEmployee->email_verified_flag = 1;
        $createEmployee->save();
        if ($createEmployee) {

            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function deleteEmployee(Request $request)
    {
        $deletedid = User::where('id', $request->id)->delete();
    }

    public function checkUsernameAvailability(Request $request, $username)
    {

        $user = User::where('email', $username)->first();

        return response()->json([
            'available' => !$user,
        ]);
    }

    public function getLeadReport()
    {
        $employees = User::with(['leads', 'tasks'])->where('role_type', '!=', 'superadmin')->where('role_type', '!=', 'admin')->get();

        $employeeReports = $employees->map(function ($employee) {
            $totalLeads = $employee->leads->count();
            $totalClosedSuccessfully = $employee->leads->where('status', 'closed_successfully')->count();
            $totalClosedWithFailure = $employee->leads->where('status', 'closed_with_failure')->count();
            $latestTaskStatus = $employee->tasks->sortByDesc('date')->first();

            return [
                'employee' => $employee,
                'totalLeads' => $totalLeads,
                'totalClosedSuccessfully' => $totalClosedSuccessfully,
                'totalClosedWithFailure' => $totalClosedWithFailure,
                'latestTaskStatus' => $latestTaskStatus ? $latestTaskStatus->status : 'No tasks',
            ];
        });

        return view('admin.reports.employee-monitoring', compact('employeeReports'));
    }

    public function getEmpReport()
    {
        $employees = User::with(['leads.contact', 'leads.tasks'])->get();

        $employeeReports = $employees->map(function ($employee) {
            $leadReports = $employee->leads->map(function ($lead) {
                $totalTasks = $lead->tasks->count();
                $latestTask = $lead->tasks->sortByDesc('date')->first();
                $latestTaskStatus = $latestTask ? $latestTask->status : 'No tasks';
                $latestTaskDate = $latestTask ? $latestTask->date : 'N/A';

                return [
                    'lead_date' => $lead->created_at->format('Y-m-d'),
                    'customer_name' => $lead->contact->name,
                    'phone' => $lead->contact->phone,
                    'total_tasks' => $totalTasks,
                    'latest_task_date' => $latestTaskDate,
                    'latest_task_status' => $latestTaskStatus,
                ];
            });

            return [
                'employee' => $employee,
                'leadReports' => $leadReports,
            ];
        });

        return view('admin.reports.lead-report', compact('employeeReports'));
    }
    public function getEmployeeLeadDetails($employeeId)
    {
        $leads = Lead::where('assigned_to', $employeeId)->with('contact', 'tasks')->get();
        return view('partials.lead-details', compact('leads'));
    }


}
