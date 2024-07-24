{{-- @extends('layouts.admin-front')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Available Leads Table -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Available Leads</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-header-action">
                            <button id="select-all-btn" class="btn btn-primary ml-2">Select All</button>
                            <button id="clear-all-btn" class="btn btn-warning ml-2" style="display: none;">Clear All</button>

                        </div>
                        <table class="table table-striped" id="available-leads-table">
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
                                @foreach ($leads as $lead)
                                    <tr data-lead-id="{{ $lead->id }}">
                                        <td><input type="checkbox" class="select-lead-checkbox"></td>
                                        <td>{{ $lead->lead_source }}</td>
                                        <td>{{ $lead->lead_num }}</td>
                                        <td>{{ $lead->contact->name }}</td>
                                        <td>{{ $lead->status }}</td>
                                        <td>{{ $lead->specific_location }}</td>
                                        <td>{{ $lead->place }}</td>
                                        <td>{{ $lead->preferred_landmark }}</td>
                                        <td>{{ $lead->max_budget }}</td>
                                        <td>{{ $lead->expiry }}</td>
                                        <td>{{ $lead->max_area }}</td>
                                        <td>{{ $lead->property_type }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button id="preview-selected-leads-btn" class="btn btn-info ml-2">Preview Selected
                            Leads</button>
                    </div>
                </div>
            </div>

            <!-- Selected Leads Table -->
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Selected Leads</h4>
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

            <!-- Assignment Section -->
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="employee">Assign To</label>
                            <select id="employee" class="form-control">
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                        {{ $employee->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button id="assign-leads-btn" class="btn btn-primary">Assign Leads</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.admin-front')

@section('content')
<div class="container">
    <div class="row">


        <!-- Available Leads Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Available Leads</h4>
                </div>
                <div class="card-body"> <!-- Search Filters -->
                    <div class="col-12 mb-3">
                        <div class="form-inline">
                            <select id="column-select" class="form-control mr-2">
                                <option value="">Select Column</option>
                                <option value="1">Lead Source</option>
                                <option value="2">Lead Number</option>
                                <option value="3">Customer Name</option>
                                <option value="4">Status</option>
                                <option value="5">Specific Location</option>
                                <option value="6">Specific Area</option>
                                <option value="7">Preferred Landmark</option>
                                <option value="8">Max Budget</option>
                                <option value="9">Due Date</option>
                                <option value="10">Max Area</option>
                                <option value="11">Property Type</option>
                            </select>
                            <input type="text" id="column-search" class="form-control mr-2" placeholder="Search term">
                            <button id="search-btn" class="btn btn-primary">Search</button>
                            <button id="clear-search-btn" class="btn btn-secondary ml-2">Clear</button>
                        </div>
                    </div>


                    <table class="table table-striped" id="available-leads-table">
                        <thead>
                            <tr>
                                <th><div >
                                    <button id="select-all-btn" class="btn btn-primary ml-2">Select All</button>
                                    <button id="clear-all-btn" class="btn btn-warning ml-2" style="display: none;">Clear All</button>
                                </div></th>
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
                            @foreach ($leads as $lead)
                                <tr data-lead-id="{{ $lead->id }}">
                                    <td><input type="checkbox" class="select-lead-checkbox"></td>
                                    <td>{{ $lead->lead_source }}</td>
                                    <td>{{ $lead->lead_num }}</td>
                                    <td>{{ $lead->contact->name }}</td>
                                    <td>{{ $lead->status }}</td>
                                    <td>{{ $lead->specific_location }}</td>
                                    <td>{{ $lead->place }}</td>
                                    <td>{{ $lead->preferred_landmark }}</td>
                                    <td>{{ $lead->max_budget }}</td>
                                    <td>{{ $lead->expiry }}</td>
                                    <td>{{ $lead->max_area }}</td>
                                    <td>{{ $lead->property_type }}</td>
                                </tr>
                            @endforeach
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
                    <h4>Selected Leads</h4>
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

        <!-- Assignment Section -->
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="employee">Assign To</label>
                        <select id="employee" class="form-control">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="assign-leads-btn" class="btn btn-primary">Assign Leads</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize DataTables
            var table = $('#available-leads-table').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": true,
                "info": true,
            });

            // Filter functionality
            $('#status-filter').on('change', function() {
                var status = $(this).val();
                table.columns(4).search(status).draw();
            });

            $('#assignment-filter').on('change', function() {
                var status = $(this).val();
                table.columns(14).search(status).draw();
            });

            $('#clear-filter-btn').click(function() {
                table.search('').columns().search('').draw();
            });

            // Handle select all button click
            $('#select-all-btn').click(function() {
                $('.select-lead-checkbox').prop('checked', true);
            });

            // Handle clear all button click
            $('#clear-all-btn').click(function() {
                $('.select-lead-checkbox').prop('checked', false);
                $('#selected-leads-table tbody').empty();
                $('#selected-leads-table').hide();
                $('#clear-all-btn').hide();
                $('#select-all-btn').show();
                $('.select-lead-checkbox').prop('disabled', false);
            });

            // Handle preview button click
            $('#preview-selected-leads-btn').click(function() {
                $('#selected-leads-table tbody').empty();
                $('.select-lead-checkbox:checked').each(function() {
                    var leadRow = $(this).closest('tr');
                    var leadId = leadRow.data('lead-id');
                    var leadSource = leadRow.find('td:eq(1)').text();
                    var leadNum = leadRow.find('td:eq(2)').text();
                    var customerName = leadRow.find('td:eq(3)').text();
                    var status = leadRow.find('td:eq(4)').text();
                    var specificLocation = leadRow.find('td:eq(5)').text();
                    var specificArea = leadRow.find('td:eq(6)').text();
                    var preferredLandmark = leadRow.find('td:eq(7)').text();
                    var maxBudget = leadRow.find('td:eq(8)').text();
                    var dueDate = leadRow.find('td:eq(9)').text();
                    var maxArea = leadRow.find('td:eq(10)').text();
                    var propertyType = leadRow.find('td:eq(11)').text();

                    var row = '<tr data-lead-id="' + leadId + '">';
                    row += '<td><button type="button" class="btn btn-danger btn-sm remove-lead-btn">Remove</button></td>';
                    row += '<td>' + leadSource + '</td>';
                    row += '<td>' + leadNum + '</td>';
                    row += '<td>' + customerName + '</td>';
                    row += '<td>' + status + '</td>';
                    row += '<td>' + specificLocation + '</td>';
                    row += '<td>' + specificArea + '</td>';
                    row += '<td>' + preferredLandmark + '</td>';
                    row += '<td>' + maxBudget + '</td>';
                    row += '<td>' + dueDate + '</td>';
                    row += '<td>' + maxArea + '</td>';
                    row += '<td>' + propertyType + '</td>';
                    row += '</tr>';

                    $('#selected-leads-table tbody').append(row);
                });

                if ($('#selected-leads-table tbody tr').length > 0) {
                    $('#selected-leads-table').show();
                    $('#clear-all-btn').show();
                    $('#select-all-btn').hide();
                    $('.select-lead-checkbox').prop('disabled', true);
                } else {
                    $('#selected-leads-table').hide();
                }
            });

            // Handle removing leads from the selected leads table
            $(document).on('click', '.remove-lead-btn', function() {
                var row = $(this).closest('tr');
                var leadId = row.data('lead-id');

                // Uncheck the corresponding checkbox in the main table
                $('#available-leads-table').find('tr[data-lead-id="' + leadId + '"] .select-lead-checkbox').prop('checked', false);

                // Remove the row from the preview table
                row.remove();

                if ($('#selected-leads-table tbody tr').length == 0) {
                    $('#selected-leads-table').hide();
                    $('#clear-all-btn').hide();
                    $('#select-all-btn').show();
                    $('.select-lead-checkbox').prop('disabled', false);
                }
            });

            // Handle assignment of selected leads
            $('#assign-leads-btn').click(function() {
                var selectedLeads = [];
                $('#selected-leads-table tbody tr').each(function() {
                    selectedLeads.push($(this).data('lead-id'));
                });

                var employeeId = $('#employee').val();

                if (selectedLeads.length > 0 && employeeId) {
                    $.ajax({
                        url: '/assign-leads',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            leads: selectedLeads,
                            employee_id: employeeId
                        },
                        success: function(response) {
                            alert('Leads assigned successfully.');
                            location.reload();
                        },
                        error: function(error) {
                            console.error('Error assigning leads:', error);
                            alert('Error: Unable to assign leads.');
                        }
                    });
                } else {
                    alert('Please select leads and an employee.');
                }
            });
        });
    </script>
@endsection --}}
@section('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Initialize DataTables
        var table = $('#available-leads-table').DataTable({
            "scrollX": true,
            stateSave: true,
            "paging": true,
            "ordering": true,
            "info": true,
        });

        // Column search functionality
        $('#search-btn').click(function() {
            var column = $('#column-select').val();
            var searchTerm = $('#column-search').val();

            if (column !== '') {
                table.column(column).search(searchTerm).draw();
            } else {
                table.search(searchTerm).draw();
            }
        });

        // Clear search filters
        $('#clear-search-btn').click(function() {
            $('#column-select').val('');
            $('#column-search').val('');
            table.search('').columns().search('').draw();
        });

        // Handle select all button click
        $('#select-all-btn').click(function() {
            $('.select-lead-checkbox').prop('checked', true);
        });

        // Handle clear all button click
        $('#clear-all-btn').click(function() {
            $('.select-lead-checkbox').prop('checked', false);
            $('#selected-leads-table tbody').empty();
            $('#selected-leads-table').hide();
            $('#clear-all-btn').hide();
            $('#select-all-btn').show();
            $('.select-lead-checkbox').prop('disabled', false);
        });

        // Handle preview button click
        $('#preview-selected-leads-btn').click(function() {
            $('#selected-leads-table tbody').empty();
            $('.select-lead-checkbox:checked').each(function() {
                var leadRow = $(this).closest('tr');
                var leadId = leadRow.data('lead-id');
                var leadSource = leadRow.find('td:eq(1)').text();
                var leadNum = leadRow.find('td:eq(2)').text();
                var customerName = leadRow.find('td:eq(3)').text();
                var status = leadRow.find('td:eq(4)').text();
                var specificLocation = leadRow.find('td:eq(5)').text();
                var specificArea = leadRow.find('td:eq(6)').text();
                var preferredLandmark = leadRow.find('td:eq(7)').text();
                var maxBudget = leadRow.find('td:eq(8)').text();
                var dueDate = leadRow.find('td:eq(9)').text();
                var maxArea = leadRow.find('td:eq(10)').text();
                var propertyType = leadRow.find('td:eq(11)').text();

                var row = '<tr data-lead-id="' + leadId + '">';
                row += '<td><button type="button" class="btn btn-danger btn-sm remove-lead-btn">Remove</button></td>';
                row += '<td>' + leadSource + '</td>';
                row += '<td>' + leadNum + '</td>';
                row += '<td>' + customerName + '</td>';
                row += '<td>' + status + '</td>';
                row += '<td>' + specificLocation + '</td>';
                row += '<td>' + specificArea + '</td>';
                row += '<td>' + preferredLandmark + '</td>';
                row += '<td>' + maxBudget + '</td>';
                row += '<td>' + dueDate + '</td>';
                row += '<td>' + maxArea + '</td>';
                row += '<td>' + propertyType + '</td>';
                row += '</tr>';

                $('#selected-leads-table tbody').append(row);
            });

            if ($('#selected-leads-table tbody tr').length > 0) {
                $('#selected-leads-table').show();
                $('#clear-all-btn').show();
                $('#select-all-btn').hide();
                $('.select-lead-checkbox').prop('disabled', true);
            } else {
                $('#selected-leads-table').hide();
            }
        });

        // Handle removing leads from the selected leads table
        $(document).on('click', '.remove-lead-btn', function() {
            var row = $(this).closest('tr');
            var leadId = row.data('lead-id');

            // Uncheck the corresponding checkbox in the main table
            $('#available-leads-table').find('tr[data-lead-id="' + leadId + '"] .select-lead-checkbox').prop('checked', false);

            // Remove the row from the preview table
            row.remove();

            if ($('#selected-leads-table tbody tr').length == 0) {
                $('#selected-leads-table').hide();
                $('#clear-all-btn').hide();
                $('#select-all-btn').show();
                $('.select-lead-checkbox').prop('disabled', false);
            }
        });

        // Handle assignment of selected leads
        $('#assign-leads-btn').click(function() {
            var selectedLeads = [];
            $('#selected-leads-table tbody tr').each(function() {
                selectedLeads.push($(this).data('lead-id'));
            });

            var employeeId = $('#employee').val();

            if (selectedLeads.length > 0 && employeeId) {
                $.ajax({
                    url: '/assign-leads',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        leads: selectedLeads,
                        employee_id: employeeId
                    },
                    success: function(response) {
                        alert('Leads assigned successfully.');
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Error assigning leads:', error);
                        alert('Error: Unable to assign leads.');
                    }
                });
            } else {
                alert('Please select leads and an employee.');
            }
        });
    });
</script>
@endsection



