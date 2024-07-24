@extends('layouts.admin-front')

@section('content')
<div class="container">
    <div class="row">
        <!-- Employee Selection for Reassignment -->
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4>Select Employee to Reassign Leads From</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select id="from-employee" class="form-control">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="show-assigned-leads-btn" class="btn btn-primary">Show Assigned Leads</button>
                </div>
            </div>
        </div>

        <!-- Assigned Leads Table -->
        <div class="col-12" id="assigned-leads-section" style="display: none;">
            <div class="card">
                <div class="card-header">
                    <h4>Assigned Leads</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="assigned-leads-table">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Lead Source</th>
                                <th>Lead Number</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Specific Location</th>
                                <th>Specific Area</th>
                                <th>Preferred Landmark</th>
                                <th>Max Budget</th>
                                <th>Due Date</th>
                                <th>Max Area</th>
                                <th>Property Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Assigned leads will be populated here via JavaScript -->
                        </tbody>
                    </table>
                    <button id="preview-selected-leads-btn" class="btn btn-info ml-2">Preview Selected Leads</button>
                </div>
            </div>
        </div>

        <!-- Selected Leads Table -->
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Selected Leads for Reassignment</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="selected-leads-table" style="display: none;">
                        <thead>
                            <tr>
                                <th>Remove</th>
                                <th>Lead Source</th>
                                <th>Lead Number</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Specific Location</th>
                                <th>Specific Area</th>
                                <th>Preferred Landmark</th>
                                <th>Max Budget</th>
                                <th>Due Date</th>
                                <th>Max Area</th>
                                <th>Property Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Selected leads will be appended here via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Reassignment Section -->
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="to-employee">Reassign To</label>
                        <select id="to-employee" class="form-control">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="reassign-leads-btn" class="btn btn-primary">Reassign Leads</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    var assignedLeadsTable = $('#assigned-leads-table').DataTable({
        "scrollX": true,
        stateSave: true,
        "paging": true,
        "ordering": true,
        "info": true,
    });

    $('#show-assigned-leads-btn').click(function() {
        var employeeId = $('#from-employee').val();
        if (employeeId) {
            $.ajax({
                url: '/get-assigned-leads/' + employeeId,
                type: 'GET',
                success: function(response) {
                    assignedLeadsTable.clear();
                    response.leads.forEach(function(lead) {
                        assignedLeadsTable.row.add([
                            '<input type="checkbox" class="select-lead-checkbox" data-lead-id="' + lead.id + '">',
                            lead.lead_source,
                            lead.lead_num,
                            lead.contact.name,
                            lead.status,
                            lead.specific_location,
                            lead.place,
                            lead.preferred_landmark,
                            lead.max_budget,
                            lead.expiry,
                            lead.max_area,
                            lead.property_type
                        ]).draw(false);
                    });
                    $('#assigned-leads-section').show();
                },
                error: function(error) {
                    console.error('Error fetching assigned leads:', error);
                    alert('Error: Unable to fetch assigned leads.');
                }
            });
        } else {
            alert('Please select an employee.');
        }
    });

    $('#preview-selected-leads-btn').click(function() {
        $('#selected-leads-table tbody').empty();
        $('.select-lead-checkbox:checked').each(function() {
            var leadRow = $(this).closest('tr');
            var leadId = $(this).data('lead-id');
            var row = '<tr data-lead-id="' + leadId + '">';
            row += '<td><button type="button" class="btn btn-danger btn-sm remove-lead-btn">Remove</button></td>';
            for (var i = 1; i < leadRow.children().length; i++) {
                row += '<td>' + leadRow.children().eq(i).text() + '</td>';
            }
            row += '</tr>';
            $('#selected-leads-table tbody').append(row);
        });

        if ($('#selected-leads-table tbody tr').length > 0) {
            $('#selected-leads-table').show();
        } else {
            $('#selected-leads-table').hide();
        }
    });

    $(document).on('click', '.remove-lead-btn', function() {
        var row = $(this).closest('tr');
        var leadId = row.data('lead-id');
        $('#assigned-leads-table').find('input[data-lead-id="' + leadId + '"]').prop('checked', false);
        row.remove();
        if ($('#selected-leads-table tbody tr').length == 0) {
            $('#selected-leads-table').hide();
        }
    });

    $('#reassign-leads-btn').click(function() {
        var selectedLeads = [];
        $('#selected-leads-table tbody tr').each(function() {
            selectedLeads.push($(this).data('lead-id'));
        });

        var fromEmployeeId = $('#from-employee').val();
        var toEmployeeId = $('#to-employee').val();

        if (selectedLeads.length > 0 && fromEmployeeId && toEmployeeId) {
            $.ajax({
                url: '/reassign-leads',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    leads: selectedLeads,
                    from_employee_id: fromEmployeeId,
                    to_employee_id: toEmployeeId
                },
                success: function(response) {
                    alert('Leads reassigned successfully.');
                    location.reload();
                },
                error: function(error) {
                    console.error('Error reassigning leads:', error);
                    alert('Error: Unable to reassign leads.');
                }
            });
        } else {
            alert('Please select leads and both employees.');
        }
    });
});
</script>
@endsection
