@extends('layouts.admin-front')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
                    <!--end col-->
                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                                <div class="xl:col-span-3">
                                    <h4 class="text-15">Lead Activity Report</h4>
                                </div>
                                <!--end col-->
                                <div class="xl:col-span-3 xl:col-start-11">
                                    <div class="flex gap-3">
                                        <div class="relative grow">
                                            <input type="search"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto ml-2"
                                                placeholder="search" aria-controls="basic_tables">
                                            {{-- <i data-lucide="search"
                                                class="inline-block size-4 absolute 
                                            ltr:left-2.5 rtl:right-2.5 top-2.5
                                             text-slate-500 dark:text-zink-200 
                                             fill-slate-100 dark:fill-zink-600"></i> --}}
                                        </div>

                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3 mb-4">
                                <div class="mb-4">
                                    <label for="filterType"
                                        class="inline-block mb-2 text-base
                                      font-medium">Filter
                                        By
                                        {{-- <span class="text-red-500">*</span> --}}
                                    </label>
                                    <select id="filterType"
                                        class="form-select border-slate-200 
                                       dark:border-zink-500 focus:outline-none 
                                       focus:border-custom-500 disabled:bg-slate-100 
                                       dark:disabled:bg-zink-600 disabled:border-slate-300 
                                       dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                       disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                       dark:focus:border-custom-800 placeholder:text-slate-400 
                                       dark:placeholder:text-zink-200">
                                        <option value="">Select Filter</option>
                                        <option value="customer">Customer Name</option>
                                        <option value="employee">Employee Name</option>
                                        <option value="leadSource">Lead Source</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-4">
                                    <label for="filterValue"
                                        class="inline-block mb-2 text-base
                                      font-medium">Select
                                        Value
                                    </label>
                                    <select id="filterValue"
                                        class="form-select border-slate-200 
                                       dark:border-zink-500 focus:outline-none 
                                       focus:border-custom-500 disabled:bg-slate-100 
                                       dark:disabled:bg-zink-600 disabled:border-slate-300 
                                       dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                       disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                       dark:focus:border-custom-800 placeholder:text-slate-400 
                                       dark:placeholder:text-zink-200">
                                        <option value="">Select Value</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 
                                   xl:grid-cols-3 mb-4"
                                id="dateRangeContainer" style="display:none;">
                                <div class="mb-4">
                                    <label for="startDate"
                                        class="inline-block mb-2 text-base
                                      font-medium">Start
                                        Date
                                        {{-- <span class="text-red-500">*</span> --}}
                                    </label>
                                    <input type="date"
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none 
                                        focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 
                                        disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                         disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                          placeholder:text-slate-400 dark:placeholder:text-zink-200 flatpickr-input 
                                          active"
                                        id="startDate" >
                                </div>
                                <div class="mb-4">
                                    <label for="endDate"
                                        class="inline-block mb-2 text-base
                                      font-medium">End
                                        Date
                                        {{-- <span class="text-red-500">*</span> --}}
                                    </label>
                                    <input type="date"
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none 
                                    focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 
                                    disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                     disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                      placeholder:text-slate-400 dark:placeholder:text-zink-200 flatpickr-input 
                                      active"
                                        id="endDate" >
                                </div>
                                <div class="mb-4">
                                   
                                    <button id="searchButton"
                                        class="srchButton btn btn-primary btn wht_sp_nwrp text-white btn bg-custom-500 
                                        border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600
                                         focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring 
                                         focus:ring-custom-100 active:text-white active:bg-custom-600 
                                         active:border-custom-600 active:ring 
                                        active:ring-custom-100 dark:ring-custom-400/20">Search</button>
                                </div>

                            </div>


                            <!--end grid-->
                            <div class="overflow-x-auto">
                                <table class="w-full whitespace-nowrap" id="">
                                    <thead
                                        class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                        <tr>
                                            {{-- <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">

                                            </th> --}}
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Number
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Customer Name
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Assigned To
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Source
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Date
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Actions
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Leads will be dynamically inserted here -->

                                    </tbody>
                                </table>
                            </div>
                            <div class="flex flex-col items-center mt-5 md:flex-row">
                                <div class="mb-4 grow md:mb-0">
                                    <p class="text-slate-500 dark:text-zink-200">
                                        Showing <b>01</b> of <b>10</b> Results
                                    </p>
                                </div>
                                <ul class="flex flex-wrap items-center gap-2 shrink-0">
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i
                                                class="mr-1 size-4 rtl:rotate-180" data-lucide="chevron-left"></i>
                                            Prev</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">1</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto active">2</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">3</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">Next
                                            <i class="ml-1 size-4 rtl:rotate-180" data-lucide="chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
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

            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });

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
                    if (filterType === 'employee' || filterType === 'leadSource' || filterType ===
                        'customer') {
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

            $('#searchButton').click(function() {
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
                        console.log(response);
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
                var data = {
                    filterType: filterType,
                    filterValue: filterValue,
                    startDate: startDate,
                    endDate: endDate
                };
                console.log(data);
                $.ajax({
                    url: '/get-leads',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        var rows = '';
                        $.each(response, function(index, lead) {

                            rows += '<tr>' +
                                '<td>' + lead.lead_num + '</td>' +
                                '<td>' + lead.contact.name + '</td>' +
                                '<td>' + (lead.assigned_to ? lead.assigned_to.first_name + ' ' +
                                    lead.assigned_to.last_name : 'N/A') + '</td>' +
                                '<td>' + lead.lead_source + '</td>' +
                                '<td>' + lead.created_at + '</td>' +
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
