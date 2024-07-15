<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    //leadIndex
    public function leadIndex()
    {
        $leads = Lead::all();
        $contacts = Contact::all();
        return view('admin.lead.index', compact('leads', 'contacts'));
    }

    public function createLead()
    {

        $contacts = Contact::all();
        $employees = User::where('role_type', 'User')->get();

        return view('admin.lead.createLead', compact('contacts', 'employees'));
    }

    public function storeContact(Request $request)
    {
        // Validate request
        $request->validate([
            'new_contact_name' => 'required|string|max:255',
            'new_contact_email' => 'required|email|unique:contacts,email',
            'new_contact_phone' => 'nullable|string|max:20',
            'new_contact_whatsapp_ph' => 'nullable|string|max:20',
            'new_contact_address' => 'nullable|string|max:1000',
        ]);

        // Create new contact
        $contact = new Contact();
        $contact->name = $request->input('new_contact_name');
        $contact->email = $request->input('new_contact_email');
        $contact->phone = $request->input('new_contact_phone');
        $contact->whatsapp_ph = $request->input('new_contact_whatsapp_ph');
        $contact->address = $request->input('new_contact_address');
        $contact->save();

        // Return response
        return response()->json([
            'message' => 'success',
            'contact_id' => $contact->id,
            'contact_name' => $contact->name,
        ]);
    }

    public function storeLead(Request $request)
    {
        // Validate request data
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'expiry' => 'required|date',
            'area_requirements' => 'required|string',
            'property_type' => 'required|string',
            'assigned_to' => 'required|exists:users,id',
        ]);

        $leadNumber = $this->generateUniqueLeadNumber();

        $lead = new Lead();
        $lead->contact_id = $request->input('contact_id');
        $lead->lead_num = $leadNumber;
        $lead->description = $request->input('description');
        $lead->budget = $request->input('budget');
        $lead->expiry = $request->input('expiry');
        $lead->area_requirements = $request->input('area_requirements');
        $lead->property_type = $request->input('property_type');
        $lead->status = 'new';
        $lead->assigned_to = $request->input('assigned_to');
        $lead->created_by = auth()->user()->id;
        $lead->save();

        if ($lead) {

            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    // Method to generate a unique lead number
    private function generateUniqueLeadNumber()
    {
        // Example of generating a unique lead number using a timestamp
        $leadNumber = 'LEAD-' . date('Y') . '-' . uniqid();

        // Ensure the lead number is unique in the database
        while (Lead::where('lead_num', $leadNumber)->exists()) {
            $leadNumber = 'LEAD-' . date('Y') . '-' . uniqid();
        }

        return $leadNumber;
    }

    public function deleteLead($id)
    {
        $lead = Lead::findOrFail($id);

        $lead->delete();

        if ($lead) {

            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    public function editLead($id)
    {
        $lead = Lead::findOrFail($id);
        $contacts = Contact::all();
        $employees = User::where('role_type', 'User')->get();

        return view('admin.lead.edit', compact('lead', 'contacts', 'employees'));
    }

    public function updateLead(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->update([
            'contact_id' => $request->input('contact_id'),
            'assigned_to' => $request->input('assigned_to'),
            'description' => $request->input('description'),
            'budget' => $request->input('budget'),
            'expiry' => $request->input('expiry'),
            'area_requirements' => $request->input('area_requirements'),
            'property_type' => $request->input('property_type'),
            'status' => $request->input('status'),
        ]);

        if ($lead) {

            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }

    }



    //Empoloyee Side

    public function empLeadIndex()
    {
        $myId = auth()->user()->id;

        $leads = Lead::where('assigned_to', $myId)->get();
        $contacts = Contact::all();
        return view('admin.empLead.index', compact('leads', 'contacts'));
    }
    // chnageStatus

    public function changeStatus($id)
    {
        $lead = Lead::findOrFail($id);
        $contacts = Contact::all();
        $employees = User::where('role_type', 'User')->get();

        return view('admin.empLead.editLead', compact('lead', 'contacts', 'employees'));
    }

    public function updateStatus(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->update([
            'contact_id' => $request->input('contact_id'),
            'assigned_to' => $request->input('assigned_to'),
            'description' => $request->input('description'),
            'budget' => $request->input('budget'),
            'expiry' => $request->input('expiry'),
            'area_requirements' => $request->input('area_requirements'),
            'property_type' => $request->input('property_type'),
            'status' => $request->input('status'),
        ]);

        if ($lead) {

            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }

    }
}
