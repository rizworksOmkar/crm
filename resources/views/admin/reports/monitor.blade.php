@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lead Filters</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="filterType">Filter By</label>
                        <select class="form-control" id="filterType">
                            <option value="">Select Filter</option>
                            <option value="customer">Customer Name</option>
                            <option value="employee">Employee Name</option>
                            <option value="leadSource">Lead Source</option>
                        </select>
                    </div>
                    <div class="form-group" id="filterValueContainer" style="display:none;">
                        <label for="filterValue">Select Value</label>
                        <select class="form-control" id="filterValue">
                            <option value="">Select Value</option>
                        </select>
                    </div>
                    <div class="form-group" id="dateRangeContainer" style="display:none;">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="startDate">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-hover" style="width:100%;" id="leadsTable">
                            <thead>
                                <tr>
                                    <th>Lead Number</th>
                                    <th>Customer Name</th>
                                    <th>Description</th>
                                    <th>Assigned To</th>
                                    <th>Lead Source</th>
                                    <th>
                                        Lead Date
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Leads will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Task Details -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Task Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Task details will be dynamically inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#leadsTable').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": false,
                "info": false,
            });

            $('#filterType').change(function() {
                var filterType = $(this).val();
                if (filterType) {
                    fetchFilterValues(filterType);
                    if (filterType === 'employee' || filterType === 'leadSource') {
                        $('#dateRangeContainer').show();
                    } else {
                        $('#dateRangeContainer').hide();
                    }
                } else {
                    $('#filterValueContainer').hide();
                    $('#dateRangeContainer').hide();
                    $('#filterValue').html('<option value="">Select Value</option>');
                }
            });

            $('#filterValue, #startDate, #endDate').change(function() {
                var filterType = $('#filterType').val();
                var filterValue = $('#filterValue').val();
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();
                if (filterValue && (filterType !== 'employee' && filterType !== 'leadSource' || (
                        startDate && endDate))) {
                    fetchLeads(filterType, filterValue, startDate, endDate);
                }
            });

            function fetchFilterValues(filterType) {
                $.ajax({
                    url: '/get-filter-values/' + filterType,
                    method: 'GET',
                    success: function(response) {
                        var options = '<option value="">Select Value</option>';
                        $.each(response, function(index, value) {
                            options += '<option value="' + value.id + '">' + value.name +
                                '</option>';
                        });
                        $('#filterValue').html(options);
                        $('#filterValueContainer').show();
                    },
                    error: function() {
                        alert('Error fetching filter values.');
                    }
                });
            }

            function fetchLeads(filterType, filterValue, startDate, endDate) {
                var url = '/get-leads/' + filterType + '/' + filterValue;
                if (startDate && endDate) {
                    url += '/' + startDate + '/' + endDate;
                }
                console.log(url);
                $.ajax({
                    url: '/get-leads/' + filterType + '/' + filterValue,

                    method: 'GET',
                    success: function(response) {
                        var rows = '';
                        $.each(response, function(index, lead) {
                            rows += '<tr>' +
                                '<td>' + lead.lead_num + '</td>' +
                                '<td>' + lead.contact.name + '</td>' +
                                '<td>' + lead.description + '</td>' +
                                '<td>' + (lead.assigned_to ? lead.assigned_to.first_name + ' ' +
                                    lead.assigned_to.last_name : 'N/A') + '</td>' +
                                '<td>' + lead.lead_source + '</td>' +
                                '<td><button class="btn btn-sm btn-primary view-tasks-btn" data-lead-id="' +
                                lead.id + '">View Tasks</button></td>' +
                                '</tr>';
                        });
                        $('#leadsTable tbody').html(rows);
                    },
                    error: function() {
                        alert('Error fetching leads.');
                    }
                });
            }

            $(document).on('click', '.view-tasks-btn', function() {
                var leadId = $(this).data('lead-id');
                fetchTasks(leadId);
            });

            function fetchTasks(leadId) {
                $.ajax({
                    url: '/get-tasks/' + leadId,
                    method: 'GET',
                    success: function(response) {
                        var taskDetails = '';
                        $.each(response, function(index, task) {
                            taskDetails += '<p>' + task.description + ' - ' + task.date +
                                ' - ' + task.status + '</p>';
                        });
                        $('#taskModal .modal-body').html(taskDetails);
                        $('#taskModal').modal('show');
                    },
                    error: function() {
                        alert('Error fetching tasks.');
                    }
                });
            }
        });
    </script>
@endsection
