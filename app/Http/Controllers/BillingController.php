<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadBilling;
use App\Models\User;

class BillingController extends Controller
{
    public function index()
    {
        $leads = Lead::with(['contact', 'billing'])->where('status', 'Closed Successfully')->get();
        return view('admin.billing.index', compact('leads'));
    }

    public function raiseBill($leadId)
    {
        $lead = Lead::with('assignedTo')->findOrFail($leadId);

        $existingBill = LeadBilling::where('lead_id', $leadId)->where('dispute_flag', false)->first();

        if ($existingBill) {
            return redirect()->back()->with('error', 'Bill has already been raised for this lead.');
        }

        return view('admin.billing.raiseBill', compact('lead'));
    }

    public function storeBill(Request $request, $leadId)
    {
        $request->validate([
            'expected_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
        ]);

        $lead = Lead::findOrFail($leadId);

        LeadBilling::create([
            'lead_id' => $lead->id,
            'lead_num' => $lead->lead_num,
            'expected_amount' => $lead->max_budget,
            'paid_amount' => $request->input('paid_amount'),
            'payment_date' => now(),
            'customer_settled' => $request->input('customer_settled'),
            'agent_recieved_payment' => false,
            'agent_id' => $lead->assignedTo->id,
            'agent_paid' => false,
            'dispute_flag' => false,
        ]);


        return redirect()->route('billing.index')->with('success', 'Bill raised successfully');
    }

    public function paymentReceipt($leadId)
    {
        $lead = Lead::findOrFail($leadId);
        $billing = LeadBilling::where('lead_id', $leadId)->first();
        return view('admin.billing.paymentReceipt', compact('lead', 'billing'));
    }

    public function recordPayment(Request $request, $leadId)
    {
        $request->validate([
            'paid_amount_to_agent' => 'required|numeric',
            'payment_date_to_agent' => 'required|date',
        ]);

        $billing = LeadBilling::where('lead_id', $leadId)->first();
        $billing->update([
            'paid_amount_to_agent' => $request->paid_amount_to_agent,
            'payment_date_to_agent' => $request->payment_date_to_agent,
            'agent_recieved_payment' => $request->agent_received_payment,
        ]);

        return redirect()->route('billing.index')->with('success', 'Payment recorded successfully');
    }

    public function raiseDispute($leadId)
    {
        $billing = LeadBilling::where('lead_id', $leadId)->first();
        $billing->update(['dispute_flag' => true]);

        return redirect()->route('billing.index')->with('success', 'Dispute raised successfully');
    }

    public function fixDispute(Request $request, $id)
    {
        $request->validate([
            'expected_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'customer_settled' => 'required|boolean',
            'agent_recieved_payment' => 'required|boolean',
            'payment_date_to_agent' => 'required|date',
            'paid_amount_to_agent' => 'required|numeric',
        ]);

        $billing = LeadBilling::findOrFail($id);
        $billing->update([
            'expected_amount' => $request->expected_amount,
            'paid_amount' => $request->paid_amount,
            'payment_date' => $request->payment_date,
            'customer_settled' => $request->customer_settled,
            'agent_recieved_payment' => $request->agent_recieved_payment,
            'payment_date_to_agent' => $request->payment_date_to_agent,
            'paid_amount_to_agent' => $request->paid_amount_to_agent,
            'dispute_flag' => 0,
        ]);

        return redirect()->route('billing.index')->with('success', 'Dispute fixed and billing details updated.');
    }
}
