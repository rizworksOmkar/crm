<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadBilling;
use App\Models\User;
use App\Models\Billing;
use App\Models\PaymentReceipt;
use App\Models\Transaction;


class BillingController extends Controller
{
    public function index()
    {
        $leadsWithoutBills = Lead::with(['contact', 'assignedTo'])
            ->where('status', 'Closed Successfully')
            ->doesntHave('billing')
            ->get();
            // dd($leadsWithoutBills);

        $leadsWithBills = Lead::with(['contact', 'assignedTo', 'billing'])
            ->where('status', 'Closed Successfully')
            ->has('billing')
            ->get();

        return view('admin.billing.index', compact('leadsWithoutBills', ));
    }
    public function billed()
    {
        $leadsWithBills = Lead::with(['contact', 'assignedTo', 'billing'])
            ->where('status', 'Closed Successfully')
            ->has('billing')
            ->get();

        return view('admin.billing.billed_table', compact('leadsWithBills'));
    }

    public function getReceipts(Billing $billing)
    {
        $receipts = $billing->receipts()->orderBy('date', 'desc')->get();
        return response()->json(['receipts' => $receipts]);
    }

    public function getTransactions(Billing $billing)
    {
        $transactions = $billing->transactions()->orderBy('created_at', 'desc')->get();
        return response()->json(['transactions' => $transactions]);
    }

// leadId: 2a11e22f-a398-4151-b879-26b3922c559a
// custName: Sheikh Shaimul Rana
// custAddress: Kjhgdsjk
// custPhone: 7410852972
// custWhatsApp: 7410852972
// leadNumber: LD-2024-07-403599
// leadDate: 2024-07-24 09:30:16
// propertyType: House/Villa
// finalizedProperty: acsasd
// billDate: 2024-08-25
// billAmount: 34567
// narration: sdadsf
    public function store(Request $request, $leadId)
    {
        $lead = Lead::findOrFail($leadId);
        $validatedData = $request->validate([

            'billAmount' => 'required|numeric',
            'billDate' => 'required|date',
            'agent_id' => 'required|exists:users,id',
        ]);

        $currYear = substr((now()->year), -2);
        $nextYear = substr((now()->year + 1), -2);

        $currentMonth = now()->format('m');

        $randomNumber = mt_rand(1000, 9999);

        $billNum = "BILL{$currYear}{$nextYear}{$currentMonth}{$randomNumber}";

        $billing = new Billing($validatedData);
        $billing->to_pay = $validatedData['billAmount'];
        $billing->customerWillPay = $validatedData['billAmount'];
        $billing->date = $validatedData['billDate'];
        $billing->lead_num = $lead->lead_num;
        $billing->bill_num = $billNum;
        $billing->save();

        return response()->json(['success' => true, 'message' => 'Bill created successfully']);
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



    public function makePayment(Request $request, $billId)
    {
        $billing = Billing::findOrFail($billId);

        $validatedData = $request->validate([
            'paymentAmount' => 'required|numeric|max:' . $billing->to_pay,
            'paymentMode' => 'required|in:cash,card,bank_transfer',
        ]);

        $currYear = substr((now()->year), -2);
        $nextYear = substr((now()->year + 1), -2);

        $currentMonth = now()->format('m');

        $randomNumber = mt_rand(1000, 9999);

        $receipt = "RCPT{$currYear}{$nextYear}{$currentMonth}{$randomNumber}";

        $receipt = new PaymentReceipt([
            'bill_num' => $billing->bill_num,
            'lead_num' => $billing->lead_num,
            'amount_paid' => $validatedData['paymentAmount'],
            'date' => now(),
            'payment_receipt_num' => $receipt,
        ]);
        $receipt->save();

        $receiptNo = "TXN{$currYear}{$nextYear}{$currentMonth}{$randomNumber}";

        $transaction = new Transaction([
            'bill_num' => $billing->bill_num,
            'receipt_num' => $receipt->payment_receipt_num,
            'transaction_num' => $receiptNo,
            'mode' => $validatedData['paymentMode'],
            'payment_amount' => $validatedData['paymentAmount'],
            'status' => 'completed',
        ]);
        $transaction->save();

        $billing->to_pay -= $validatedData['paymentAmount'];
        $billing->save();

        return response()->json(['success' => true, 'message' => 'Payment processed successfully']);
    }

}
