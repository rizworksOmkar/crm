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

                            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 
                               xl:grid-cols-3 mb-4"
                                id="dateRangeContainer">
                                <div class="mb-4">
                                    <label for=""
                                        class="inline-block mb-2 text-base
                                  font-medium">Filter
                                        Type
                                        {{-- <span class="text-red-500">*</span> --}}
                                    </label>
                                    <div class="flex flex-wrap gap-2">
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="filterType" id="closedSuccessfullyRadio"
                                                value=""
                                                class="border rounded-full appearance-none 
                                                cursor-pointer size-4 bg-slate-100
                                                border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-orange-500 
                                                checked:border-orange-500 dark:checked:bg-orange-500
                                                dark:checked:border-orange-500">
                                            <label for="radioDisabled1" class="align-middle">
                                                Closed Successfully
                                            </label>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="filterType"
                                                value="" id="closedWithFailureRadio"
                                                class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100
                                                border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-orange-500 
                                                checked:border-orange-500 dark:checked:bg-orange-500
                                                dark:checked:border-orange-500">
                                            <label for="" class="align-middle">
                                                Closed with Failure
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--end grid-->
                            <div class="overflow-x-auto" d="resultsTableContainer" style="display:none;">
                                <table  id="resultsTable" class="w-full whitespace-nowrap" id="leadsTable">
                                    <thead
                                        class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                        <tr>
                                            
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Number
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Description
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Budget
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Expiry
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Contact Name
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Contact Phone
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Assigned to
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Status
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Leads will be dynamically inserted here -->

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

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closedSuccessfullyRadio = document.getElementById('closedSuccessfullyRadio');
            const closedWithFailureRadio = document.getElementById('closedWithFailureRadio');
            const resultsTableContainer = document.getElementById('resultsTableContainer');
            const resultsTableBody = document.querySelector('#resultsTable tbody');

            closedSuccessfullyRadio.addEventListener('change', fetchClosedSuccessfullyLeads);
            closedWithFailureRadio.addEventListener('change', fetchClosedWithFailureLeads);

            function fetchClosedSuccessfullyLeads() {
                fetch(`/leads/closed-successfully`)
                    .then(response => response.json())
                    .then(leads => {
                        resultsTableBody.innerHTML = '';
                        leads.forEach(lead => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${lead.lead_num}</td>
                                <td>${lead.description}</td>
                                <td>${lead.min_budget} - ${lead.max_budget}</td>
                                <td>${lead.expiry}</td>
                                <td>${lead.contact.name}</td>
                                <td>${lead.contact.phone}</td>
                                <td>${(lead.assigned_to ? lead.assigned_to.first_name + ' ' +
                                    lead.assigned_to.last_name : 'N/A')} </td>
                                <td>${lead.status}</td>
                            `;
                            resultsTableBody.appendChild(row);
                        });
                        resultsTableContainer.style.display = 'block';
                    })
                    .catch(error => console.error('Error fetching leads:', error));
            }

            function fetchClosedWithFailureLeads() {
                fetch(`/leads/closed-with-failure`)
                    .then(response => response.json())
                    .then(leads => {
                        resultsTableBody.innerHTML = '';
                        leads.forEach(lead => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${lead.lead_num}</td>
                                <td>${lead.description}</td>
                                <td>${lead.min_budget} - ${lead.max_budget}</td>
                                <td>${lead.expiry}</td>
                                <td>${lead.contact.name}</td>
                                <td>${lead.contact.phone}</td>
                                <td>${lead.assigned_to ? lead.assigned_to.first_name + ' ' +
                                    lead.assigned_to.last_name : 'N/A'} </td>
                                <td>${lead.status}</td>
                            `;
                            resultsTableBody.appendChild(row);
                        });
                        resultsTableContainer.style.display = 'block';
                    })
                    .catch(error => console.error('Error fetching leads:', error));
            }
        });
    </script>
@endsection
