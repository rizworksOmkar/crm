@extends('layouts.admin-front')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <h4 class="mb-4 text-18">Select Employee to Reassign Leads From</h4>
                            {{-- <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                                <div class="xl:col-span-3">
                                    <h4 class="text-15">Selected Leads</h4>
                                </div>
                            </div> --}}

                            <!--end grid-->
                            <div class="overflow-x-auto">
                                <div class="mb-4">
                                    {{-- <label for="employee"
                                    class="inline-block mb-2 text-base
                                          font-medium">Assign
                                    To
                                    <span class="text-red-500">*</span></label> --}}
                                    <select
                                        class="form-select border-slate-200 
                                        dark:border-zink-500 focus:outline-none 
                                        focus:border-custom-500 disabled:bg-slate-100 
                                        dark:disabled:bg-zink-600 disabled:border-slate-300 
                                        dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                        dark:focus:border-custom-800 placeholder:text-slate-400 
                                        dark:placeholder:text-zink-200"
                                        id="from-employee">
                                        <option value="">Select Employee</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                                {{ $employee->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button id="show-assigned-leads-btn"
                                    class="text-white transition-all duration-200 ease-linear btn bg-custom-800
                                     border-custom-500 hover:text-white hover:bg-custom-600 
                                     hover:border-custom-600 focus:text-white focus:bg-custom-600
                                      focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white 
                                      active:bg-custom-600
                                 active:border-custom-600 active:ring active:ring-custom-100">Show
                                    Assigned Leads</button>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-span-12 card 2xl:col-span-12" id="assigned-leads-section" style="display: none;">
                        <div class="card-body">
                            <div class="grid items-center grid-cols-1 gap-3 
                        mb-5 2xl:grid-cols-1">
                                <h4 class="mb-4 text-18">Assigned Leads</h4>
                                <!--end col-->
                                {{-- <div class="xl:col-span-3 xl:col-start-10">
                                <div class="flex gap-3">
                                    <div class="relative grow">
                                        <input type="text"
                                            class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Search for ..." autocomplete="off" />
                                        <i data-lucide="search"
                                            class="inline-block size-4 absolute 
                                            ltr:left-2.5 rtl:right-2.5 top-2.5
                                             text-slate-500 dark:text-zink-200 
                                             fill-slate-100 dark:fill-zink-600"></i>
                                    </div>
                                    
                                </div>
                            </div> --}}
                                <!--end col-->
                            </div>

                            <!--end grid-->
                            <div class="">
                                <table class="w-full whitespace-nowrap table table-striped" 
                                id="assigned-leads-table">
                                    <thead
                                        class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Select</th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Source
                                            </th>
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
                                                Status
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Specific Location
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Specific Area
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Preferred Landmark
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Max Budget
                                            </th>
                                            <th
                                                class="text-center px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Due Date
                                            </th>
                                            <th
                                                class="text-center px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Max Area
                                            </th>
                                            <th
                                                class="text-center px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Property Type
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Selected leads will be appended here via JavaScript --><!-- Selected leads will be appended here via JavaScript -->

                                    </tbody>
                                </table>
                                <button id="preview-selected-leads-btn" class="text-white transition-all duration-200 ease-linear btn bg-custom-800
                                 border-custom-500 hover:text-white hover:bg-custom-600 
                                 hover:border-custom-600 focus:text-white focus:bg-custom-600
                                  focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white 
                                  active:bg-custom-600
                             active:border-custom-600 active:ring 
                             active:ring-custom-100">
                                    Preview Selected Leads</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <div class="grid items-center grid-cols-1 gap-3 
                        mb-5 2xl:grid-cols-1">
                                <h4 class="mb-4 text-18">Selected Leads for Reassignment</h4>
                                <!--end col-->
                                {{-- <div class="xl:col-span-3 xl:col-start-10">
                                <div class="flex gap-3">
                                    <div class="relative grow">
                                        <input type="text"
                                            class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Search for ..." autocomplete="off" />
                                        <i data-lucide="search"
                                            class="inline-block size-4 absolute 
                                            ltr:left-2.5 rtl:right-2.5 top-2.5
                                             text-slate-500 dark:text-zink-200 
                                             fill-slate-100 dark:fill-zink-600"></i>
                                    </div>
                                    
                                </div>
                            </div> --}}
                                <!--end col-->
                            </div>

                            <!--end grid-->
                            <div class="overflow-x-auto">
                                <table class="w-full whitespace-nowrap table table-striped"
                                    id="selected-leads-table" style="display: none;">
                                    <thead
                                        class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Remove</th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Source
                                            </th>
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
                                                Status
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Specific Location
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Specific Area
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Preferred Landmark
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Max Budget
                                            </th>
                                            <th
                                                class="text-center px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Due Date
                                            </th>
                                            <th
                                                class="text-center px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Max Area
                                            </th>
                                            <th
                                                class="text-center px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Property Type
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Selected leads will be appended here via JavaScript --><!-- Selected leads will be appended here via JavaScript -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-span-12 card 2xl:col-span-12">
                    <div class="card-body">
                        {{-- <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                            <div class="xl:col-span-3">
                                <h4 class="text-15">Selected Leads</h4>
                            </div>
                        </div> --}}

                        <!--end grid-->
                        <div class="overflow-x-auto">
                            <div class="mb-4">
                                <label for="to-employee"
                                    class="inline-block mb-2 text-base
                                      font-medium">Reassign
                                    To
                                    <span class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 
                                    dark:border-zink-500 focus:outline-none 
                                    focus:border-custom-500 disabled:bg-slate-100 
                                    dark:disabled:bg-zink-600 disabled:border-slate-300 
                                    dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                    disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                    dark:focus:border-custom-800 placeholder:text-slate-400 
                                    dark:placeholder:text-zink-200"
                                    id="to-employee">
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                            {{ $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button id="reassign-leads-btn"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-800
                                 border-custom-500 hover:text-white hover:bg-custom-600 
                                 hover:border-custom-600 focus:text-white focus:bg-custom-600
                                  focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white 
                                  active:bg-custom-600
                             active:border-custom-600 active:ring 
                             active:ring-custom-100">Reassign Leads</button>
                        </div>
                    </div>
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
                                    '<input type="checkbox" class="select-lead-checkbox" data-lead-id="' +
                                    lead.id + '">',
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
                    row +=
                        '<td><button type="button" class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 my-1 remove-lead-btn remove-lead-btn">Remove</button></td>';
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
                $('#assigned-leads-table').find('input[data-lead-id="' + leadId + '"]').prop('checked',
                    false);
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
