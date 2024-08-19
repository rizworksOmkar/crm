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
                                    <h4 class="text-15">Available Leads</h4>
                                </div>
                                <!--end col-->
                                {{-- <div class="xl:col-span-3 xl:col-start-11">
                                    <div class="flex gap-3">
                                        <div class="relative grow">
                                            <input type="search"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto ml-2"
                                                placeholder="search" aria-controls="basic_tables">
                                            <i data-lucide="search"
                                                class="inline-block size-4 absolute 
                                                ltr:left-2.5 rtl:right-2.5 top-2.5
                                                 text-slate-500 dark:text-zink-200 
                                                 fill-slate-100 dark:fill-zink-600"></i>
                                        </div>
                                        <button type="button"
                                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                            <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-download-2-line"></i>
                                            Export
                                        </button>
                                        <a href="{{ route('admin-create-lead') }}"
                                            class="btn wht_sp_nwrp text-white btn bg-custom-500 border-custom-500
                                             hover:text-white hover:bg-custom-600 hover:border-custom-600 
                                             focus:text-white focus:bg-custom-600 focus:border-custom-600 
                                             focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                              active:border-custom-600 active:ring active:ring-custom-100
                                               dark:ring-custom-400/20">Add
                                            Lead</a>
                                    </div>
                                </div> --}}
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


                            <!--end grid-->
                            {{-- <div class="overflow-x-auto"> --}}
                                <table class="w-full whitespace-nowrap" id="available-leads-table">
                                    <thead
                                        class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                <button id="select-all-btn"
                                                    class="text-white btn bg-custom-500 border-custom-500 
                                                        hover:text-white 
                                                    hover:bg-custom-600 hover:border-custom-600 focus:text-white 
                                                    focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                                                     active:text-white active:bg-custom-600 active:border-custom-600 active:ring
                                                      active:ring-custom-100 dark:ring-custom-400/20">Select
                                                    All</button>
                                                <button id="clear-search-btn"
                                                    class="text-white btn bg-custom-800 border-custom-500 
                                                hover:text-white 
                                            hover:bg-custom-600 hover:border-custom-600 focus:text-white 
                                            focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                                             active:text-white active:bg-custom-600 active:border-custom-600 active:ring
                                              active:ring-custom-100 dark:ring-custom-400/20"
                                                    style="display: none;">Clear</button>
                                            </th>
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
                                        @foreach ($leads as $lead)
                                            <tr data-lead-id="{{ $lead->id }}">
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    <input type="checkbox" class="select-lead-checkbox">
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->lead_source }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->lead_num }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->contact->name }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->status }}
                                                </td>
                                                {{-- <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->property_type }}
                                                </td> --}}
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->specific_location }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->place }}
                                                </td>

                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->preferred_landmark }}
                                                </td>

                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->max_budget }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->expiry }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->max_area }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $lead->property_type }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            {{-- </div> --}}
                            
                            <div class="prvw_slct mt-3">
                                <button id="preview-selected-leads-btn"
                                    class="text-white btn bg-custom-800 border-custom-500 
                                                        hover:text-white 
                                                    hover:bg-custom-600 hover:border-custom-600 focus:text-white 
                                                    focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                                                     active:text-white active:bg-custom-600 active:border-custom-600 active:ring
                                                      active:ring-custom-100 dark:ring-custom-400/20">
                                    Preview Selected Leads
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                                <div class="xl:col-span-3">
                                    <h4 class="text-15">Selected Leads</h4>
                                </div>
                                <!--end col-->
                                {{-- <div class="xl:col-span-3 xl:col-start-10">
                                    <div class="flex gap-3">
                                        <div class="relative grow">
                                            <input type="text"
                                                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="Search for ..." autocomplete="off" />
                                            <i data-lucide="search"
                                                class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                        </div>
                                        <button type="button"
                                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-download-2-line"></i>
                                    Export
                                </button>
                                        <a href="{{ route('admin-create-lead') }}"
                                            class="btn wht_sp_nwrp text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add
                                            Lead</a>
                                    </div>
                                </div> --}}
                                <!--end col-->

                            </div>

                            <!--end grid-->
                            <div class="overflow-x-auto">
                                <table class="w-full whitespace-nowrap" id="selected-leads-table" style="display: none;">
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
                                <label for="employee"
                                    class="inline-block mb-2 text-base
                                          font-medium">Assign
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
                                    id="employee">
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                            {{ $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button id="assign-leads-btn"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-800
                                     border-custom-500 hover:text-white hover:bg-custom-600 
                                     hover:border-custom-600 focus:text-white focus:bg-custom-600
                                      focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white 
                                      active:bg-custom-600
                                 active:border-custom-600 active:ring active:ring-custom-100">Assign
                                Leads</button>
                        </div>
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
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
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
                    row +=
                        '<td><button type="button" class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 my-1 remove-lead-btn">Remove</button></td>';
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
                $('#available-leads-table').find('tr[data-lead-id="' + leadId + '"] .select-lead-checkbox')
                    .prop('checked', false);

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
