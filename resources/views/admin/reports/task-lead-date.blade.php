@extends('layouts.admin-front')
@section('content')
    {{-- <div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm"> --}}
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card">
                <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-2">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Date Range Filter</h6>
                        <label for="singleDate" class="inline-block mb-2 text-base font-medium">
                            Single Date
                            {{-- <span class="text-red-500">*</span> --}}
                        </label>
                        <input type="date" id="singleDate"
                            class="mb-3 form-input border-slate-200 
                                dark:border-zink-500 focus:outline-none focus:border-custom-500
                                 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 
                                 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                        <input type="checkbox" id="singleDateCheckbox"> Filter by single date
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-2">
                    <div class="card-body">
                        <label for="startDate" class="inline-block mb-2 text-base font-medium">
                            Start Date
                            {{-- <span class="text-red-500">*</span> --}}
                        </label>
                        <input type="date" id="startDate"
                            class="form-input border-slate-200 
                                dark:border-zink-500 focus:outline-none focus:border-custom-500
                                 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 
                                 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                    </div>

                    <div class="card-body">
                        <label for="endDate" class="inline-block mb-2 text-base font-medium">
                            End Date
                            {{-- <span class="text-red-500">*</span> --}}
                        </label>
                        <input type="date" id="endDate"
                            class="form-input border-slate-200 
                                dark:border-zink-500 focus:outline-none focus:border-custom-500
                                 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 
                                 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 
                               xl:grid-cols-3 mb-4"
                    id="dateRangeContainer">
                    <div class="card-body">
                        <label for=""
                            class="inline-block mb-2 
                                    text-base font-medium">
                            Filter Type
                        </label>
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <input type="radio" name="filterType" value="tasks" id="tasksRadio"
                                    class="border rounded-full appearance-none 
                                                cursor-pointer size-4 bg-slate-100
                                                border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-orange-500 
                                                checked:border-orange-500 dark:checked:bg-orange-500
                                                dark:checked:border-orange-500">
                                <label for="radioDisabled1" class="align-middle">
                                    Tasks
                                </label>
                            </div>

                            <div class="flex items-center gap-2">
                                <input type="radio" name="filterType" value="leads" id="leadsRadio"
                                    class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100
                                           border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-orange-500 
                                           checked:border-orange-500 dark:checked:bg-orange-500
                                           dark:checked:border-orange-500">
                                <label for="" class="align-middle">
                                    Leads
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <button type="button" id="filterButton"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white 
                      hover:bg-custom-600 hover:border-custom-600 focus:text-white 
                     focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                      active:text-white active:bg-custom-600 active:border-custom-600 active:ring
                       active:ring-custom-100 dark:ring-custom-400/20">Filter</button>
                </div>
            </div><!--end card-->
            <div class="card" id="resultsTableContainer" style="display:none;">
                <div class="card-body">
                    {{-- <h6 class="mb-4 text-15">Basic</h6> --}}
                    <table id="resultsTable" class="display stripe group" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="ltr:!text-left rtl:!text-right" id="tableHeader1"></th>
                                <th id="tableHeader2"></th>
                                <th id="tableHeader3"></th>
                                <th id="tableHeader4"></th>
                                <th id="tableHeader5"></th>
                                <th id="tableHeader6"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Results will be dynamically inserted here -->
                        </tbody>

                    </table>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    {{-- </div>
    </div> --}}
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/OldAssets/bundles/datatables/datatables.min.js') }}"></script>
    <script
        src="{{ asset('assets/admin/OldAssets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/OldAssets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/OldAssets/js/page/datatables.js') }}"></script>
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
                            headers = ['My Update', 'Customer Update', 'Date', 'Status', 'Lead ID',
                                'Employee'
                            ];
                            $.each(response, function(index, task) {
                                rows += '<tr>' +
                                    '<td>' + task.user_description + '</td>' +
                                    '<td>' + task.customer_description + '</td>' +
                                    '<td>' + task.date + '</td>' +
                                    '<td>' + task.status + '</td>' +
                                    '<td>' + task.lead_id + '</td>' +
                                    '<td>' + (task.created_by ? task.created_by.first_name +
                                        ' ' + task.created_by.last_name : 'N/A') + '</td>' +
                                    '</tr>';
                            });
                        } else if (filterType === 'leads') {
                            headers = ['Lead Number', 'Customer Name', 'Description', 'Assigned To',
                                'Source', 'Status'
                            ];
                            $.each(response, function(index, lead) {

                                rows += '<tr>' +
                                    '<td>' + lead.lead_num + '</td>' +
                                    '<td>' + lead.contact.name + '</td>' +
                                    '<td>' + lead.description + '</td>' +
                                    '<td>' + (lead.assigned_to ? lead.assigned_to.first_name +
                                        ' ' + lead.assigned_to.last_name : 'N/A') + '</td>' +
                                    '<td>' + lead.lead_source + '</td>' +
                                    '<td>' + lead.status + '</td>' +
                                    '</tr>';
                            });
                        }
                        $('#resultsTable thead tr').html(
                            '<th>' + headers[0] + '</th>' +
                            '<th>' + headers[1] + '</th>' +
                            '<th>' + headers[2] + '</th>' +
                            '<th>' + headers[3] + '</th>' +
                            '<th>' + headers[4] + '</th>' +
                            '<th>' + headers[5] + '</th>'
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
