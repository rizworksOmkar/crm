<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use App\Models\Contact;
use App\Models\LeadStatus;
use App\Models\Task;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function unassignedLeads()
    {
        $leads = Lead::whereNull('assigned_to')->get();
        // dd($leads);
        return view('admin.main_reports.unassigned_leads.index', compact('leads'));
    }
    public function assignedLeads()
    {
        $leads = Lead::whereNotNull('assigned_to')->get();
        // dd($leads);
        return view('admin.main_reports.assigned_leads.index', compact('leads'));
    }

    public function leadReport()
    {
        $leads = Lead::all();
        $status = LeadStatus::all();
        return view('admin.main_reports.lead_report.index', compact('leads', 'status'));
    }

    public function getDetailsOfLeads($id)
    {
        $lead = Lead::with('contact')->findOrFail($id);

        return response()->json([
            'name' => $lead->contact->name,

            'phone' => $lead->contact->phone,
            'whatsapp' => $lead->contact->whatsapp_ph,
        ]);
    }

    public function timelineOfActivity($id)
    {
        $lead = Lead::findOrFail($id);
        $tasks = $lead->tasks()->latest()->get();

        return response()->json(['tasks' => $tasks]);
    }

    public function getUnbilledLeads()
    {
        $leadsWithoutBills = Lead::with(['contact', 'assignedTo'])
            ->where('status', 'Closed Successfully')
            ->doesntHave('billing')
            ->get();
        return view('admin.main_reports.billing_report.unbilled_leads_index', compact('leadsWithoutBills'));
    }

    public function getBilledLeads()
    {
        $leadsWithBills = Lead::with(['contact', 'assignedTo', 'billing'])
            ->where('status', 'Closed Successfully')
            ->whereHas('billing', function ($query) {
                $query->where('to_pay', '>', 0);
            })
            ->get();

        return view('admin.main_reports.billing_report.billed_leads_index', compact('leadsWithBills'));
    }

    public function getPaidLeads()
    {
        $leadsWithBills = Lead::with(['contact', 'assignedTo', 'billing'])
            ->where('status', 'Closed Successfully')
            ->whereHas('billing', function ($query) {
                $query->where('to_pay', 0);
            })
            ->get();

        return view('admin.main_reports.billing_report.paid_bills_index', compact('leadsWithBills'));
    }

    public function notificationTasks()
    {
        return view('admin.main_reports.activity-notifications.index');
    }

    // public function filterNotificationTasks(Request $request)
    // {
    //     $date = $request->input('date');

    //     $tasks = Task::whereHas('lead', function ($query) use ($date) {
    //         $query->whereDate('date', $date);
    //     })
    //     ->with('lead.contact', 'createdBy')
    //     ->get();

    //     return response()->json(['tasks' => $tasks]);
    // }
    public function filterNotificationTasks(Request $request)
    {
        $date = $request->input('date');

        $tasks = Task::whereDate('date', $date)
            ->with(['lead.contact', 'createdBy'])
            ->get();

        return response()->json(['tasks' => $tasks]);
    }
}
