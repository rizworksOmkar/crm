@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Date Range Filter</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="singleDate">Single Date</label>
                        <input type="date" class="form-control" id="singleDate">
                        <input type="checkbox" id="singleDateCheckbox"> Filter by single date
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="startDate">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                    <div class="form-group">
                        <label>Filter Type</label><br>
                        <input type="radio" name="filterType" value="tasks" id="tasksRadio"> Tasks<br>
                        <input type="radio" name="filterType" value="leads" id="leadsRadio"> Leads
                    </div>
                    <button type="button" class="btn btn-primary" id="filterButton">Filter</button>

                    <div class="table-responsive mt-4" id="resultsTableContainer" style="display:none;">
                        <table class="table table-striped table-hover" style="width:100%;" id="resultsTable">
                            <thead>
                                <tr>
                                    <th id="tableHeader1"></th>
                                    <th id="tableHeader2"></th>
                                    <th id="tableHeader3"></th>
                                    <th id="tableHeader4"></th>
                                    <th id="tableHeader5"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Results will be dynamically inserted here -->
                            </tbody>
                        </table>
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
            $('#singleDateCheckbox').change(function() {
                if (this.checked) {
                    $('#startDate').prop('disabled', true);
                    $('#endDate').prop('disabled', true);
                } else {
                    $('#startDate').prop('disabled', false);
                    $('#endDate').prop('disabled', false);
                }
            });

            $('#filterButton').click(function() {
                var singleDate = $('#singleDate').val();
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();
                var filterType = $('input[name="filterType"]:checked').val();
                var singleDateChecked = $('#singleDateCheckbox').is(':checked');

                if (singleDateChecked && singleDate) {
                    fetchResults(filterType, singleDate, singleDate);
                } else if (startDate && endDate && filterType) {
                    fetchResults(filterType, startDate, endDate);
                } else {
                    alert('Please select a date range or a single date and filter type.');
                }
            });

            function fetchResults(filterType, startDate, endDate) {
                var url = '/get-' + filterType + '-by-date-range/' + startDate + '/' + endDate;
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $('#resultsTableContainer').show();
                        var rows = '';
                        var headers = [];
                        if (filterType === 'tasks') {
                            headers = ['Task Description', 'Date', 'Status', 'Lead ID', 'Employee'];
                            $.each(response, function(index, task) {
                                rows += '<tr>' +
                                    '<td>' + task.description + '</td>' +
                                    '<td>' + task.date + '</td>' +
                                    '<td>' + task.status + '</td>' +
                                    '<td>' + task.lead_id + '</td>' +
                                    '<td>' + (task.created_by ? task.created_by.first_name + ' ' + task.created_by.last_name : 'N/A') + '</td>' +
                                    '</tr>';
                            });
                        } else if (filterType === 'leads') {
                            headers = ['Lead Number', 'Customer Name', 'Description', 'Assigned To', 'Lead Source'];
                            $.each(response, function(index, lead) {
                                rows += '<tr>' +
                                    '<td>' + lead.lead_num + '</td>' +
                                    '<td>' + lead.contact.name + '</td>' +
                                    '<td>' + lead.description + '</td>' +
                                    '<td>' + (lead.assigned_to ? lead.assigned_to.first_name + ' ' + lead.assigned_to.last_name : 'N/A') + '</td>' +
                                    '<td>' + lead.lead_source + '</td>' +
                                    '</tr>';
                            });
                        }
                        $('#resultsTable thead tr').html(
                            '<th>' + headers[0] + '</th>' +
                            '<th>' + headers[1] + '</th>' +
                            '<th>' + headers[2] + '</th>' +
                            '<th>' + headers[3] + '</th>' +
                            '<th>' + headers[4] + '</th>'
                        );
                        $('#resultsTable tbody').html(rows);
                    },
                    error: function() {
                        alert('Error fetching results.');
                    }
                });
            }
        });
    </script>
@endsection
