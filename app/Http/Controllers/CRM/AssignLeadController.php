<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AssignLeadController extends Controller
{
    public function assignLeadsIndex()
    {
        $leads = Lead::whereNull('assigned_to')->get();
        $contacts = Contact::all();
        $employees = User::where('role_type', 'User')->get();
        return view('admin.assignLeads.index', compact('leads', 'contacts', 'employees'));
    }

    public function assignLeadsToEmployee(Request $request)
    {
        $validated = $request->validate([
            'leads' => 'required|array',
            'employee_id' => 'required|exists:users,id',
        ]);

        foreach ($validated['leads'] as $leadId) {
            $lead = Lead::find($leadId);
            if ($lead) {
                $lead->assigned_to = $validated['employee_id'];
                $lead->save();
            }
        }

        return response()->json(['message' => 'Leads assigned successfully.']);
    }


    public function reassignLeadsIndex()
    {
        $employees = User::where('role_type', 'User')->get();
        return view('admin.assignLeads.reassign', compact('employees'));
    }
    public function getAssignedLeads($employeeId)
    {
        $leads = Lead::where('assigned_to', $employeeId)->with('contact')->get();
        return response()->json(['leads' => $leads]);
    }
    public function reassignLeads(Request $request)
    {
        DB::beginTransaction();
        try {
            $leads = $request->input('leads');
            $fromEmployeeId = $request->input('from_employee_id');
            $toEmployeeId = $request->input('to_employee_id');

            $affectedRows = Lead::whereIn('id', $leads)
                ->where('assigned_to', $fromEmployeeId)
                ->update(['assigned_to' => $toEmployeeId]);

            DB::commit();
            return response()->json(['message' => "{$affectedRows} leads reassigned successfully"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Lead reassignment failed'], 500);
        }
    }
}
