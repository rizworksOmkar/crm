<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadStatus;
use App\Models\Lead;

class LeadStatusController extends Controller
{
    public function view(){
        $statuses = LeadStatus::all();
        return view('admin.masters.leadStatus.status-index', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_type' => 'required|string|max:255',
        ]);

        LeadStatus::create([
            'status_type' => $request->status_type,
            'state_status' => 1,
        ]);

        return redirect()->back()->with('success', 'Lead Status created successfully!');
    }
    public function destroy(LeadStatus $status)
    {
        $status->delete();
        return redirect()->route('property-types.view')->with('success', 'Property Type deleted successfully!');
    }


    public function completionView(){
        return view('admin.reports.completion.completion-report');
    }

    public function fetchClosedSuccessfullyLeads()
    {
        $leads = Lead::where('status', 'Closed Successfully')->with(['contact', 'assignedTo'])->get();
        return response()->json($leads);
    }

    public function fetchClosedWithFailureLeads()
    {
        $leads = Lead::where('status', 'Closed with Failure')->with(['contact', 'assignedTo'])->get();
        return response()->json($leads);
    }
}

