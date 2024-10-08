<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\LeadSource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\LeadStatus;
use App\Models\PropertySpec;
use App\Models\PropertyType;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;

class LeadController extends Controller
{
    //leadIndex
    public function leadIndex()
    {
        $leads = Lead::all();
        $contacts = Contact::all();
        return view('admin.lead.index', compact('leads', 'contacts'));
    }

    public function getContactDetails($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json([
            'phone' => $contact->phone,
            'whatsapp_ph' => $contact->whatsapp_ph
        ]);
    }

    public function getContactPhone($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json(['phone' => $contact->phone]);
    }

    public function createLead()
    {

        $contacts = Contact::all();
        $employees = User::where('role_type', 'User')->get();
        $statuses = LeadStatus::all();
        $sources = LeadSource::all();
        $propertySpecs = PropertySpec::all();
        $propertyTypes = PropertyType::all();




        return view('admin.lead.createLead', compact('contacts', 'employees', 'statuses', 'sources', 'propertySpecs', 'propertyTypes'));
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
            'expiry' => 'required|date',
            'property_type' => 'required|string',

        ]);

        $leadNumber = $this->generateUniqueLeadNumber();

        $lead = new Lead();
        $lead->contact_id = $request->input('contact_id');
        $lead->lead_num = $leadNumber;
        $lead->requirement_type = $request->input('requirement_type');
        $lead->property_specs = $request->input('property_specs');
        $lead->cust_business_type = $request->input('cust_business_type');
        $lead->description = $request->input('description');
        $lead->min_budget = $request->input('min_budget');
        $lead->max_budget = $request->input('max_budget');
        $lead->expiry = $request->input('expiry');
        $lead->min_area = $request->input('max_area');
        $lead->max_area = $request->input('max_area');
        $lead->specific_location = $request->input('specific_location');
        $lead->place = $request->input('place');
        $lead->preferred_landmark = $request->input('preferred_landmark');
        $lead->lead_source = $request->input('lead_source');
        $lead->property_type = $request->input('property_type');
        $lead->reference_description = $request->input('reference_description');
        $lead->status = $request->input('status');
        $lead->assigned_to = $request->input('assigned_to');
        $lead->created_by = auth()->user()->id;
        $lead->save();

        if ($lead) {

            return response()->json(['success' => true, 'message' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'error']);
        }
    }

    private function generateUniqueLeadNumber()
    {
        $year = date('Y');
        $month = date('m');

        do {
            $uniqueNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

            $leadNumber = 'LD-' . $year . '-' . $month . '-' . $uniqueNumber;
        } while (Lead::where('lead_num', $leadNumber)->exists());

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

        $leads = Lead::where('assigned_to', $myId)
            ->where('status', '!=', 'Closed Successfully', '&&', 'status', '!=', 'Closed with Failure')
            ->get();
        $contacts = Contact::all();
        $status = LeadStatus::all();
        return view('admin.empLead.index', compact('leads', 'contacts', 'status'));
    }

    public function empClosedLeadIndex()
    {
        $myId = auth()->user()->id;

        $leads = Lead::where('assigned_to', $myId)
            ->where('status', 'Closed Successfully')
            ->orWhere('status', 'Closed with Failure')
            ->get();
        $contacts = Contact::all();
        $status = LeadStatus::all();
        return view('admin.empLead.closedLeads', compact('leads', 'contacts', 'status'));
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

    //task

    public function showEmpTask($id)
    {
        $lead = Lead::with('tasks')->findOrFail($id);
        return view('admin.lead.tasks', compact('lead', 'id'));
    }

    public function showTask($id)
    {
        $lead = Lead::with(['tasks', 'contact'])->findOrFail($id);
        return view('admin.empTask.showTask', compact('lead', 'id'));
    }


    public function storeLeadTask(Request $request, $leadId)
    {
        $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|string',
            'mode' => 'required|string',
        ]);

        $task = new Task();
        $task->lead_id = $leadId;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->status = $request->status;
        $task->mode = $request->mode;
        $task->created_by = Auth::id();
        $task->save();

        return redirect()->route('view.showTasks', $leadId)->with('success', 'Task created successfully.');
    }

    public function updateLeadTask(Request $request, $leadId, $taskId)
    {
        $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|string',
            'mode' => 'required|string',
        ]);

        $task = Task::where('lead_id', $leadId)->findOrFail($taskId);
        $task->update($request->all());

        return redirect()->route('view.showTasks', $leadId)->with('success', 'Task updated successfully.');
    }

    public function addTask($id)
    {

        $lead = Lead::with(['tasks', 'contact'])->findOrFail($id);
        $user = auth()->user();
        $userLeads = Lead::where('assigned_to', $user->id)->get();
        $contacts = Contact::all();

        return view('admin.empTask.addTask', compact('lead', 'id', 'userLeads', 'contacts'));
    }
    public function getLeadInfo($id)
    {
        $lead = Lead::with('contact')->findOrFail($id);
        return response()->json([
            'contact_id' => $lead->contact_id,
            'phone' => $lead->contact->phone
        ]);
    }


    public function showUploadForm()
    {
        return view('admin.lead.importLeads');
    }


    public function preview(Request $request)
    {
        $request->validate([
            'lead_file' => 'required|file|mimes:csv,xlsx',
        ]);

        $data = Excel::toArray([], $request->file('lead_file'))[0];
        $header = array_shift($data);

        $customerData = [];
        $leadData = [];

        foreach ($data as $row) {
            $rowData = array_combine($header, $row);
            $customerData[] = $this->formatCustomerData($rowData);
            $leadData[] = $this->formatLeadData($rowData);
        }

        session(['import_data' => $data, 'import_header' => $header]);

        return view('admin.lead.lead-preview', [
            'customerHeader' => array_keys($customerData[0]),
            'customerData' => $customerData,
            'leadHeader' => array_keys($leadData[0]),
            'leadData' => $leadData,
        ]);
    }

    private function formatCustomerData($rowData): array
    {
        return [
            'Customer Name' => $rowData['Customer Name'] ?? '',
            'Customer Phone' => $rowData['Customer Phone'] ?? '',
            'Customer Whatsapp Number' => $rowData['Customer Whatsapp Number'] ?? $rowData['Customer Phone'] ?? '',
            'Customer Address' => $rowData['Customer Address'] ?? '',
            'Customer Email' => $rowData['Customer Email'] ?? '',
        ];
    }

    private function formatLeadData($rowData): array
    {
        return [
            'Customer Phone' => $rowData['Customer Phone'] ?? '', // Linking field
            'Lead Number' => $rowData['Lead Number'] ?? ('LEAD-' . date('Y') . '-' . uniqid()),
            'Specific Location' => $rowData['Specific Location'] ?? '',
            'Specific Area' => $rowData['Specific Area'] ?? '',
            'Preffered Landmark' => $rowData['Preffered Landmark'] ?? '',
            'Desc' => $rowData['Desc'] ?? '',
            'Min Budget' => $rowData['Min Budget'] ?? '',
            'Max Budget' => $rowData['Max Budget'] ?? '',
            'Due Date' => $rowData['Due Date'] ?? '',
            'Min Area' => $rowData['Min Area'] ?? '',
            'Max Area' => $rowData['Max Area'] ?? '',
            'Property Type' => $rowData['Property Type'] ?? '',
            'Status' => $rowData['Status'] ?? 'new',
            'Assigned to' => $rowData['Assigned to'] ?? '',
            'Created by' => $rowData['Created by'] ?? 'System Import',
        ];
    }

    public function imports()
    {
        $data = session('import_data');
        // dd($data);
        $header = session('import_header');
        // dd($header);
        if (!$data || !$header) {
            return redirect()->back()->with('error', 'No import data found. Please upload a file first.');
        }

        DB::beginTransaction();

        try {
            foreach ($data as $row) {
                $rowData = array_combine($header, $row);

                // Create or update contact
                $contact = Contact::updateOrCreate(
                    ['phone' => $rowData['Customer Phone']],
                    [
                        'name' => $rowData['Customer Name'],
                        'email' => $rowData['Customer Email'] ?? null,
                        'whatsapp_ph' => $rowData['Customer Whatsapp Number'] ?? $rowData['Customer Phone'],
                        'address' => $rowData['Customer Address'] ?? null,
                    ]
                );

                // Create lead
                Lead::create([
                    'contact_id' => $contact->id,
                    'lead_num' => $rowData['Lead Number'] ?? ('LEAD-' . date('Y') . '-' . uniqid()),
                    'specific_location' => $rowData['Specific Location'] ?? null,
                    'specific_area' => $rowData['Specific Area'] ?? null,
                    'preferred_landmark' => $rowData['Preffered Landmark'] ?? null,
                    'description' => $rowData['Desc'] ?? null,
                    'min_budget' => $rowData['Min Budget'] ?? null,
                    'max_budget' => $rowData['Max Budget'] ?? null,
                    'due_date' => $rowData['Due Date'] ?? null,
                    'min_area' => $rowData['Min Area'] ?? null,
                    'max_area' => $rowData['Max Area'] ?? null,
                    'property_type' => $rowData['Property Type'] ?? null,
                    'status' => $rowData['Status'] ?? 'new',
                    'created_by' => auth()->id(),
                ]);
            }

            DB::commit();
            session()->forget(['import_data', 'import_header']);
            return response()->json(['success' => true, 'message' => 'Leads imported successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error importing leads: ' . $e->getMessage()]);
        }
    }




    //reports
    public function employeeReportIndex()
    {
        $users = User::where('role_type', '!=', 'superadmin')
            ->where('id', '!=', Auth::user()->id)
            ->where('email', '!=', 'riz')
            ->orderByRaw('id DESC')->get();
        return view('admin.reports.employee-monitoring', compact('users'));
    }



    //roles
    public function getRoles()
    {
        return view('admin.masters.role-type.role-master-index');
    }
    public function createRoles()
    {
        return view('admin.masters.role-type.create-role');
    }

    //status
    public function getStatus()
    {
        return view('admin.masters.leadStatus.status-index');
    }
    public function createStatus()
    {
        return view('admin.masters.leadStatus.add-status');
    }

    //source
    public function getSource()
    {
        return view('admin.masters.sources.source');
    }
    public function createSources()
    {
        return view('admin.masters.sources.create-source');
    }


    //report part starts
    public function monitorReport()
    {
        return view('admin.reports.lead-activity-report');
    }

    public function getFilterValues($filterType)
    {
        switch ($filterType) {
            case 'customer':
                $values = Contact::select('id', 'name')->get();
                break;
            case 'employee':
                $values = User::select('id', 'first_name', 'last_name')
                    ->where('role_type', '!=', 'superadmin')
                    ->where('role_type', '!=', 'admin')
                    ->get()->map(function ($user) {
                        return [
                            'id' => $user->id,
                            'name' => $user->first_name . ' ' . $user->last_name
                        ];
                    });
                break;
            case 'leadSource':
                $values = LeadSource::select('id', 'lead_source')->get()->map(function ($source) {
                    return [
                        'id' => $source->id,
                        'name' => $source->lead_source
                    ];
                });

                break;
            default:
                $values = [];
        }
        return response()->json($values);
    }


    public function getLeads(Request $request)
    {
        $filterType = $request->input('filterType');
        $filterValue = $request->input('filterValue');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        Log::debug('getLeads parameters', [
            'filterType' => $filterType,
            'filterValue' => $filterValue,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);

        switch ($filterType) {
            case 'customer':
                $leads = Lead::orderBy('created_at', 'desc')
                    ->with(['contact', 'assignedTo'])
                    ->get();
                if ($leads->isNotEmpty()) {
                    $leads = $leads->where('contact_id', $filterValue);
                }
                break;
            case 'employee':
                $leads = Lead::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
                    ->orderBy('created_at', 'desc')
                    ->with(['contact', 'assignedTo'])
                    ->get();
                if ($leads->isNotEmpty()) {
                    $leads = $leads->where('assigned_to', $filterValue);
                }
                break;
            case 'leadSource':
                $leads = Lead::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
                    ->orderBy('created_at', 'desc')
                    ->with(['contact', 'assignedTo'])
                    ->get();
                if ($leads->isNotEmpty()) {
                    $leads = $leads->where('lead_source', $filterValue);
                }
                break;
            default:
                $leads = [];
        }

        return response()->json($leads);
    }





    public function getTasks($leadId)
    {
        $tasks = Task::where('lead_id', $leadId)->orderBy('created_at', 'desc')->get();
        return response()->json($tasks);
    }

    public function getDetails($id)
    {
        $lead = Lead::with('contact')->findOrFail($id);
        return response()->json([
            'phone' => $lead->contact->phone,
            'whatsapp' => $lead->contact->whatsapp_ph,
        ]);
    }

    public function timeline($id)
    {
        $lead = Lead::findOrFail($id);
        $tasks = $lead->tasks()->latest()->get();

        return response()->json(['tasks' => $tasks]);
    }



    // EmployeeController.php

    public function indexEmployeeMonitor()
    {
        $employees = User::where('role_type', 'User')->get();
        return view('admin.reports.employee-lead-by-monitor', compact('employees'));
    }

    public function fetchLeadsByEmp($employeeId)
    {
        $employee = User::findOrFail($employeeId);
        $leads = $employee->leads()->with('contact')->get();

        return response()->json($leads);
    }

    public function fetchLeadDetailsPerEmp($leadId)
    {
        $lead = Lead::with(['contact', 'tasks'])->findOrFail($leadId);
        return response()->json($lead);
    }

    public function dateRangeReport()
    {
        return view('admin.reports.task-lead-date');
    }

    public function getTasksByDateRange($startDate, $endDate)
    {
        $tasks = Task::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->orderBy('created_at', 'desc')
            ->with('createdBy')
            ->get();
        return response()->json($tasks);
    }

    public function getLeadsByDateRange($startDate, $endDate)
    {
        $leads = Lead::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->orderBy('created_at', 'desc')
            ->with(['contact', 'assignedTo'])
            ->get();
        return response()->json($leads);
    }


    public function storeTaskByEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'client_activity' => 'required|string',
            'user_activity' => 'required|string',
            'mode' => 'required|string',

            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        $task = Task::create([
            'lead_id' => $validatedData['lead_id'],
            'customer_description' => $validatedData['client_activity'],
            'user_description' => $validatedData['user_activity'],
            'date' => $validatedData['date'],
            'status' => $validatedData['status'],
            'mode' => $validatedData['mode'],
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'follow_up_type' => $request->input('follow_up_type'),
            'created_by' => Auth::id(),
        ]);

        $lead = Lead::findOrFail($validatedData['lead_id']);

        $lead->status = $validatedData['status'];
        $lead->save();

        return response()->json(['message' => 'Task created successfully', 'task' => $task]);
    }

    // addActivityAdmin

    public function addActivityAdmin()
    {
        $leads = Lead::where('status', '!=', 'Closed Successfully')
            ->where('status', '!=', 'Closed with Failure')
            ->whereNotNull('assigned_to')
            ->get();

        $contacts = Contact::all();
        $status = LeadStatus::all();

        return view('admin.adminActivityAssign.index', compact('leads', 'contacts', 'status'));
    }

    public function storeTaskByAdminForEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'client_activity' => 'required|string',
            'user_activity' => 'required|string',
            'mode' => 'required|string',

            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        $task = Task::create([
            'lead_id' => $validatedData['lead_id'],
            'customer_description' => $validatedData['client_activity'],
            'user_description' => $validatedData['user_activity'],
            'date' => $validatedData['date'],
            'status' => $validatedData['status'],
            'mode' => $validatedData['mode'],
            'next_follow_up_date' => $request->input('next_follow_up_date'),
            'follow_up_type' => $request->input('follow_up_type'),
            'created_by' => Auth::id(),
        ]);

        $lead = Lead::findOrFail($validatedData['lead_id']);

        $lead->status = $validatedData['status'];
        $lead->save();

        return response()->json(['message' => 'Task created successfully', 'task' => $task]);
    }
}
