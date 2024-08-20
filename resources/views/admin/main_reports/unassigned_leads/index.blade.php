@extends('layouts.admin-front')
@section('content')
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
                                    <h4 class="text-15">Unassigned Leads</h4>
                                </div>
                                <!--end col-->
                                <div class="xl:col-span-3 xl:col-start-11">
                                    <div class="flex gap-3">
                                        <div class="relative grow">
                                            {{-- <input type="search"
                                            class="form-input border-slate-200 dark:border-zink-500 
                                            focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                             dark:disabled:bg-zink-600 disabled:border-slate-300 
                                             dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                             disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                             dark:focus:border-custom-800 placeholder:text-slate-400 
                                             dark:placeholder:text-zink-200 inline-block w-auto ml-2"
                                            placeholder="search" aria-controls="basic_tables"> --}}
                                            {{-- <i data-lucide="search"
                                            class="inline-block size-4 absolute 
                                            ltr:left-2.5 rtl:right-2.5 top-2.5
                                             text-slate-500 dark:text-zink-200 
                                             fill-slate-100 dark:fill-zink-600"></i> --}}
                                        </div>
                                        {{-- <button type="button"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-download-2-line"></i>
                                Export
                            </button> --}}
                                        {{-- <a href="{{ route('admin-create-lead') }}"
                                        class="btn wht_sp_nwrp text-white btn bg-custom-500 border-custom-500
                                         hover:text-white hover:bg-custom-600 hover:border-custom-600 
                                         focus:text-white focus:bg-custom-600 focus:border-custom-600 
                                         focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                          active:border-custom-600 active:ring active:ring-custom-100
                                           dark:ring-custom-400/20">Add
                                        Lead</a> --}}
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3 mb-4">
                                <div class="mb-4">
                                    <select id="column-select"
                                        class="form-select border-slate-200 
                                       dark:border-zink-500 focus:outline-none 
                                       focus:border-custom-500 disabled:bg-slate-100 
                                       dark:disabled:bg-zink-600 disabled:border-slate-300 
                                       dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                       disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                       dark:focus:border-custom-800 placeholder:text-slate-400 
                                       dark:placeholder:text-zink-200">
                                        <option value="">Select Column</option>
                                        <option value="1">Lead Source</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <input type="text" id="column-search"
                                        class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 
                                        dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        placeholder="Search term">
                                </div>
                                <div class="mb-4">
                                    <button id="search-btn"
                                        class="btn btn-primary text-white  bg-custom-500 btn border-custom-500 
                                hover:text-white hover:bg-custom-600 hover:border-custom-600
                                 focus:text-white focus:bg-custom-600 focus:border-custom-600
                                  focus:ring focus:ring-custom-100 active:text-white 
                                  active:bg-custom-600 active:border-custom-600 active:ring 
                                  active:ring-custom-100 dark:ring-custom-400/20 add-btn">Search</button>
                                    <button id="clear-search-btn"
                                        class="btn btn-secondary ml-2 text-white  bg-custom-800 btn border-custom-500 
                                hover:text-white hover:bg-custom-600 hover:border-custom-600
                                 focus:text-white focus:bg-custom-600 focus:border-custom-600
                                  focus:ring focus:ring-custom-100 active:text-white 
                                  active:bg-custom-600 active:border-custom-600 active:ring 
                                  active:ring-custom-100 dark:ring-custom-400/20 add-btn">Clear</button>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3 mb-4">
                                <div class="mb-4">
                                    <label for="min-date" class="inline-block mb-2 text-base font-medium">
                                        Start Date</label>
                                    <input type="date" id="min-date"
                                        class="form-input border-slate-200 
                                dark:border-zink-500 focus:outline-none focus:border-custom-500
                                 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 
                                 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        placeholder="YYYY-MM-DD">
                                </div>
                                <div class="mb-4">
                                    <label for="max-date" class="inline-block mb-2 text-base font-medium">
                                        End Date</label>
                                    <input type="date" id="max-date"
                                        class="form-input border-slate-200 
                                dark:border-zink-500 focus:outline-none focus:border-custom-500
                                 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 
                                 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        placeholder="YYYY-MM-DD">
                                </div>
                                <div class="mb-4 mt-8">

                                    <button id="date-filter-btn"
                                        class="btn btn-secondary ml-2 text-white  bg-custom-800 btn border-custom-500 
                                hover:text-white hover:bg-custom-600 hover:border-custom-600
                                 focus:text-white focus:bg-custom-600 focus:border-custom-600
                                  focus:ring focus:ring-custom-100 active:text-white 
                                  active:bg-custom-600 active:border-custom-600 active:ring 
                                  active:ring-custom-100 dark:ring-custom-400/20 add-btn">Filter</button>
                                </div>
                            </div>

                            
                            <!--end grid-->
                            <div class="">
                                <table class="whitespace-nowrap display stripe group" id="basic_tables">
                                    <thead>
                                        <tr>
                                            <th class="ltr:!text-left rtl:!text-right">
                                                Sl no
                                            </th>
                                            <th class="">
                                                Lead Source
                                            </th>
                                            <th class="">
                                                Lead Number
                                            </th>
                                            <th class="">
                                                Customer Name
                                            </th>
                                            <th class="">
                                                Lead Date
                                            </th>
                                            <th class="">
                                                Property Type
                                            </th>
                                            <th class="">
                                                Specific Location
                                            </th>
                                            <th class="">
                                                Budget
                                            </th>
                                            <th class="">
                                                Area (Sq ft)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=0; @endphp
                                        @foreach ($leads as $lead)
                                            @php $i++; @endphp
                                            <tr>
                                                <td>
                                                    {{ $i }}
                                                </td>
                                                <td>
                                                    {{ $lead->lead_source }}
                                                </td>
                                                <td>
                                                    {{ $lead->lead_num }}
                                                </td>
                                                <td>
                                                    {{ $lead->contact->name }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($lead->created_at)->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    {{ $lead->property_type }}
                                                </td>
                                                <td>
                                                    {{ $lead->specific_location }}
                                                </td>
                                                <td>
                                                    {{ $lead->min_budget }}-{{ $lead->max_budget }}
                                                </td>

                                                <td>
                                                    {{ $lead->min_area }}-{{ $lead->max_area }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        {{-- <div class="flex flex-col items-center mt-5 md:flex-row">
                            <div class="mb-4 grow md:mb-0">
                                <p class="text-slate-500 dark:text-zink-200">
                                    Showing <b>07</b> of <b>19</b> Results
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
                       </div> --}}
                        </div>
                    </div>
                </div>
                <!--end col-->
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
            var table = $('#tableLead').DataTable({
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
                $('#min-date').val('');
                $('#max-date').val('');
                table.search('').columns().search('').draw();
            });

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min-date').val();
                    var max = $('#max-date').val();
                    var date = data[4];

                    if ((min === '' && max === '') ||
                        (min === '' && date <= max) ||
                        (min <= date && max === '') ||
                        (min <= date && date <= max)) {
                        return true;
                    }
                    return false;
                }
            );

            $('#date-filter-btn').click(function() {
                table.draw();
            });
        });
    </script>
@endsection
