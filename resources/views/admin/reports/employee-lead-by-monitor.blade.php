@extends('layouts.admin-front')

@section('content')
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */
        .lead_activity .card {
            font-family: Arial, sans-serif;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 95%;
            margin: 20px;
            margin-left: 0;
        }

        .lead_activity .card h2 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .lead_activity .timeline {
            position: relative;
            padding-left: 30px;
        }

        .lead_activity .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e0e0e0;
        }

        .lead_activity .timeline-item {
            margin-bottom: 20px;
            position: relative;
        }

        .lead_activity .timeline-icon {
            position: absolute;
            left: -30px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            color: white;
            font-size: 14px;
        }

        .lead_activity .timeline-content {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }

        .lead_activity .timeline-content h3 {
            margin: 0;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lead_activity .timeline-content p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }

        .lead_activity .status {
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 12px;
            color: white;
        }

        .lead_activity .status-done {
            background-color: #00c853;
        }

        .lead_activity .status-running {
            background-color: #2196f3;
        }

        .lead_activity .status-pending {
            background-color: #ffc107;
        }

        .lead_activity .status-not-start {
            background-color: #f44336;
        }
    </style>
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">

                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <div class="grid items-center grid-cols-1 gap-3 
                    mb-5 2xl:grid-cols-1">
                                <h4 class="mb-4 text-18">Employees Report</h4>
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
                                <table class="w-full whitespace-nowrap table 
                            table-striped"
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
                <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto relative">

                    <div class="flex gap-5 mt-5">
                        <div
                            class="fixed inset-x-0 bottom-12 2xl:w-30 shrink-0 xl:relative z-[20] text-center xl:bottom-auto">
                            <div
                                class="w_100 xl:min-h-[calc(40vh_-_theme('height.header')_*_2.4)] inline-block card xl:h-[calc(40%_-_theme('spacing.5'))] shadow-lg xl:shadow-md">
                                <div class="flex h-full p-2 2xl:p-4 xl:flex-col">
                                    <h4 class="text-left">Employees</h4>
                                    <ul class="w_100 flex gap-2  xl:pt-4 xl:flex-col nav-tabs">
                                        <li class="group/item tabs active chatTab">
                                            <a href="#!" data-tab-toggle data-target="mainChatList"
                                                class="w_100 inline-flex items-center w-12 h-12 transition-all duration-200 ease-linear rounded-md mainChatList">
                                                SUBHASHIS DE
                                            </a>
                                        </li>
                                        <li class="group/item tabs">
                                            <a href="#!" data-tab-toggle data-target="contactList"
                                                class="w_100 inline-flex items-center w-12 h-12 transition-all duration-200 ease-linear rounded-md">Ayush
                                                Verma</a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div><!--end -->
                        <div class="block w-full xl:block xl:w-80 shrink-0 menu-content">
                            <div
                                class="h-[calc(100vh_-_theme('spacing.10')_*_6)] xl:min-h-[calc(100vh_-_theme('height.header')_*_2.4)] card xl:h-[calc(100%_-_theme('spacing.5'))]">
                                <div class="flex flex-col h-full">
                                    <div class="tab-content">
                                        <div class="block tab-pane" id="mainChatList">
                                            <div class="card-body">
                                                <div class="flex items-center gap-3">
                                                    {{-- <button
                                                        class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"><i
                                                            data-lucide="chevrons-left" class="mx-auto size-4"></i></button> --}}
                                                    <h6 class="text-15 grow">Lead Report</h6>
                                                    {{-- <button data-modal-target="addContactModal"
                                                        class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"><i
                                                            data-lucide="plus" class="mx-auto size-4"></i></button> --}}
                                                </div>
                                                {{-- <div class="relative mt-5">
                                                    <input type="text"
                                                        class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                        placeholder="Search for ..." autocomplete="off">
                                                    <i data-lucide="search"
                                                        class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                                </div> --}}
                                            </div>
                                            <div data-simplebar
                                                class="max-h-[calc(100vh_-_380px)] xl:max-h-[calc(100vh_-_300px)]">
                                                <ul class="flex flex-col gap-1" id="chatList">

                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&amp;.active]:bg-slate-50 group/item dark:[&amp;.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/admin/images/avatar-7.png" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Ayush Verma</h6>
                                                                <p
                                                                    class="text-sm truncate text-slate-700 dark:text-zink-200">
                                                                    LD-2024-07-403592</p>
                                                                <p
                                                                    class="text-sm truncate text-slate-700 dark:text-zink-200">
                                                                    House/Villa</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        data-lucide="more-vertical"
                                                                        class="lucide lucide-more-vertical inline-block ml-1 size-4">
                                                                        <circle cx="12" cy="12" r="1">
                                                                        </circle>
                                                                        <circle cx="12" cy="5" r="1">
                                                                        </circle>
                                                                        <circle cx="12" cy="19" r="1">
                                                                        </circle>
                                                                    </svg></button>

                                                                {{-- <ul class="absolute z-50 py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600 hidden" aria-labelledby="contactListDropdown1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(656px, 289px);">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Delete</a>
                                                                    </li>
                                                                </ul> --}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="hidden tab-pane" id="contactList">
                                            <div class="card-body">
                                                <div class="flex items-center gap-3">
                                                    <button
                                                        class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"><i
                                                            data-lucide="chevrons-left" class="mx-auto size-4"></i></button>
                                                    <h6 class="text-15 grow">Contacts</h6>
                                                    <button data-modal-target="addContactModal"
                                                        class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"><i
                                                            data-lucide="plus" class="mx-auto size-4"></i></button>
                                                </div>
                                                <div class="relative mt-5">
                                                    <input type="text"
                                                        class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                        placeholder="Search for ..." autocomplete="off">
                                                    <i data-lucide="search"
                                                        class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                                </div>
                                            </div>
                                            <div data-simplebar
                                                class="max-h-[calc(100vh_-_390px)] xl:max-h-[calc(100vh_-_300px)]">
                                                <ul class="flex flex-col gap-1">
                                                    <li class="px-5">
                                                        <p class="mb-1 text-slate-500 dark:text-zink-200">Contact List
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/user-2.jpg" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Aurore Maggio</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    React Developer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                LP
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Mark Walton</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    UI / UX Designer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/avatar-5.png" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Daniel Miller</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    ASP.Net Developer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/user-3.jpg" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Jaqueline Hammes</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Angular Developer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/avatar-8.png" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Andrea Pesina</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Laravel Developer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/avatar-10.png" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Bernard Pereira</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Web Designer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/user-4.jpg" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">William Jones</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Project Manager</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/avatar-8.png" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Andrea Pesina</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Laravel Developer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/avatar-10.png" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Bernard Pereira</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Web Designer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                <img src="./assets/images/user-4.jpg" alt=""
                                                                    class="rounded-full h-9">
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Mary Segura</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    NodeJS Developer</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex items-center gap-3 px-5 py-2 [&.active]:bg-slate-50 group/item dark:[&.active]:bg-zink-600 offline">
                                                            <div
                                                                class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">
                                                                PJ
                                                                <span
                                                                    class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500"></span>
                                                            </div>
                                                            <a href="#!" class="overflow-hidden grow">
                                                                <h6 class="mb-1">Pearl Johnson</h6>
                                                                <p
                                                                    class="text-xs truncate text-slate-500 dark:text-zink-200">
                                                                    Team Leader</p>
                                                            </a>
                                                            <div class="relative dropdown shrink-0">
                                                                <button type="button" class="dropdown-toggle"
                                                                    id="contactListDropdown1" data-bs-toggle="dropdown"><i
                                                                        data-lucide="more-vertical"
                                                                        class="inline-block ml-1 size-4"></i></button>

                                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                                    aria-labelledby="contactListDropdown1">
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Send Message</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                            href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- profile  --}}
                                        {{-- <div class="hidden tab-pane" id="profile">
                                            <div data-simplebar
                                                class="max-h-[calc(100vh_-_250px)] xl:max-h-full card-body">
                                                <div class="flex items-center gap-3">
                                                    <h6 class="text-15 grow">Profile</h6>
                                                    <button
                                                        class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 hover:text-red-500 dark:bg-zink-600 dark:text-zink-200 dark:hover:text-red-500"><i
                                                            data-lucide="x" class="mx-auto size-4 "></i></button>
                                                </div>
                                                <div class="text-center">
                                                    <div
                                                        class="mx-auto mt-8 bg-pink-100 rounded-full size-20 dark:bg-pink-500/20">
                                                        <img src="./assets/images/avatar-1.png" alt=""
                                                            class="h-20 rounded-full">
                                                    </div>
                                                    <h5 class="mt-4 text-16">William Heineman</h5>
                                                    <p class="text-slate-500 dark:text-zink-200">NextJs Developer</p>
                                                </div>
                                                <div class="mt-5">
                                                    <p class="mb-3 text-slate-500 dark:text-zink-200">Object</p>
                                                    <p>If several languages coalesce, the grammar of the resulting
                                                        language is more simple and regular than that of the individual.
                                                    </p>
                                                </div>
                                                <div class="mt-5">
                                                    <p class="mb-4 text-slate-500 dark:text-zink-200">Personal
                                                        Information</p>
                                                    <h6 class="mb-3 font-medium"><i data-lucide="phone"
                                                            class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                        <span class="align-middle">+(103) 1234 567 8954</span>
                                                    </h6>
                                                    <h6 class="mb-3 font-medium"><i data-lucide="map-pin"
                                                            class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                        <span class="align-middle">California, USA</span>
                                                    </h6>
                                                    <h6 class="font-medium"><i data-lucide="mail"
                                                            class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                        <span class="align-middle">william@tailwick.com</span>
                                                    </h6>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="flex items-center gap-2 mb-4">
                                                        <p class="text-slate-500 dark:text-zink-200 grow">Settings</p>
                                                        <a href="#!"
                                                            class="text-sm underline text-slate-500 dark:text-zink-200 shrink-0">View
                                                            More</a>
                                                    </div>
                                                    <div class="flex items-center mb-3">
                                                        <div
                                                            class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                                            <input type="checkbox" name="muteNotification"
                                                                id="muteNotification"
                                                                class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none">
                                                            <label for="muteNotification"
                                                                class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                                        </div>
                                                        <label for="muteNotification"
                                                            class="inline-block text-base font-medium cursor-pointer">Mute
                                                            Notifications</label>
                                                    </div>
                                                    <div class="flex items-center mb-3">
                                                        <div
                                                            class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                                            <input type="checkbox" name="blockAccount" id="blockAccount"
                                                                class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none">
                                                            <label for="blockAccount"
                                                                class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                                        </div>
                                                        <label for="blockAccount"
                                                            class="inline-block text-base font-medium cursor-pointer">Block
                                                            Account</label>
                                                    </div>
                                                    <a href="#!">
                                                        <p class="mb-3"><i data-lucide="bell-ring"
                                                                class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                            <span class="align-middle">Custom Notification</span>
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div><!--end -->

                        <div class=" card w-full hidden [&.show]:block [&.active]:xl:block active chat-content">
                            <div class="relative flex  h-full">
                                <div class="max-h-[calc(100vh_-_250px)] xl:max-h-full xl:w-80 card-body">
                                    <div class="lead_prsnl_dtls">
                                        {{-- <div class="flex items-center gap-3">
                                            <h6 class="text-15 grow">Profile</h6>
                                            <button
                                                class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 hover:text-red-500 dark:bg-zink-600 dark:text-zink-200 dark:hover:text-red-500"><i
                                                    data-lucide="x" class="mx-auto size-4 "></i></button>
                                        </div> --}}
                                        <div class="text-center">
                                            <div class="mx-auto mt-0 rounded-full size-10 bg-slate-100 dark:bg-zink-600">
                                                <img src="./assets/admin/images/avatar-7.png" alt=""
                                                    class="h-10 rounded-full">
                                            </div>
                                            <h6 class="mt-4 text-16">Ayush Verma</h6>
                                            <p class="text-slate-500 dark:text-zink-200">LD-2024-07-403590</p>
                                        </div>
                                        {{-- <div class="mt-5">
                                            <p class="mb-3 text-slate-500 dark:text-zink-200">Object</p>
                                            <p>If several languages coalesce, the grammar of the resulting
                                                language is more simple and regular than that of the individual.
                                            </p>
                                        </div> --}}
                                        <div class="mt-5 text-center">
                                            {{-- <p class="mb-4 text-slate-500 dark:text-zink-200">Personal
                                                Information</p> --}}
                                            <h6 class="mb-3 font-medium"><i data-lucide="phone"
                                                    class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                <span class="align-middle">7410852963</span>
                                            </h6>
                                            {{-- <h6 class="mb-3 font-medium"><i data-lucide="map-pin"
                                                    class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                <span class="align-middle">California, USA</span>
                                            </h6> --}}
                                            <h6 class="font-medium"><i data-lucide="mail"
                                                    class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                                <span class="align-middle">a@gmail.com</span>
                                            </h6>
                                        </div>

                                    </div>
                                    <div class="lead_activity lead_dtls">
                                        <div class="card">
                                            <h2>Lead Details</h2>
                                            <div class="timeline">
                                                <div class="timeline-item">
                                                    <div class="timeline-icon" style="background-color: #2196f3;"></div>
                                                    <div class="timeline-content">
                                                        <h3>
                                                            Lead Descriptio
                                                            {{-- <span class="status status-done">Done</span> --}}
                                                        </h3>
                                                        <p>The trip was an amazing and a life changing experience!!</p>
                                                    </div>
                                                </div>
                                                <div class="timeline-item">
                                                    <div class="timeline-icon" style="background-color: #2196f3;">
                                                        <i class="fas fa-rocket"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h3>
                                                            Property Type
                                                            {{-- <span class="status status-running">Running</span> --}}
                                                        </h3>
                                                        <p>Free courses for all our customers at A1 Conference Room -9:00 am tomorrow!</p>
                                                    </div>
                                                </div>
                                                <div class="timeline-item">
                                                    <div class="timeline-icon" style="background-color: #2196f3;">
                                                        <i class="fas fa-hand-paper"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h3>
                                                            Budget
                                                            {{-- <span class="status status-pending">Pending</span> --}}
                                                        </h3>
                                                        <p>Free courses for all our customers at A1 Conference Room -9:00 am tomorrow!</p>
                                                    </div>
                                                </div>
                                                <div class="timeline-item">
                                                    <div class="timeline-icon" style="background-color: #2196f3;"></div>
                                                    <div class="timeline-content">
                                                        <h3>
                                                            Location
                                                            {{-- <span class="status status-not-start">Not Start</span> --}}
                                                        </h3>
                                                        <p>Shaila Towers</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lead_activity">
                                    <div class="card">
                                        <h2>Lead Activity</h2>
                                        <div class="timeline">
                                            <div class="timeline-item">
                                                <div class="timeline-icon" style="background-color: #00c853;">20</div>
                                                <div class="timeline-content">
                                                    <h3>
                                                        Create report
                                                        <span class="status status-done">Done</span>
                                                    </h3>
                                                    <p>The trip was an amazing and a life changing experience!!</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-icon" style="background-color: #2196f3;">
                                                    <i class="fas fa-rocket"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h3>
                                                        Create report
                                                        <span class="status status-running">Running</span>
                                                    </h3>
                                                    <p>Free courses for all our customers at A1 Conference Room -9:00 am
                                                        tomorrow!</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-icon" style="background-color: #ffc107;">
                                                    <i class="fas fa-hand-paper"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h3>
                                                        Create report
                                                        <span class="status status-pending">Pending</span>
                                                    </h3>
                                                    <p>Free courses for all our customers at A1 Conference Room -9:00 am
                                                        tomorrow!</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-icon" style="background-color: #f44336;">N</div>
                                                <div class="timeline-content">
                                                    <h3>
                                                        Create report
                                                        <span class="status status-not-start">Not Start</span>
                                                    </h3>
                                                    <p>Happy Hour! Free drinks at Cafe-Bar all day long!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end-->
                    {{-- <div
                        class="h-[calc(100vh_-_theme('spacing.10')_*_6)] xl:min-h-[calc(100vh_-_theme('height.header')_*_2.4)] card w-full hidden [&.show]:block [&.active]:xl:block bot-content">
                        <div class="relative">
                            <div data-simplebar class="h-[calc(100vh_-_320px)] xl:h-[calc(100vh_-_250px)]">
                                <div
                                    class="sticky top-0 flex items-center gap-3 shadow-sm bg-white/60 dark:bg-zink-700/30 backdrop-blur-sm card-body">
                                    <div
                                        class="relative flex items-center justify-center font-semibold rounded-full size-8 text-slate-500 bg-slate-100 dark:text-zink-200 dark:bg-zink-600">
                                        <img src="./assets/images/user-2.jpg" alt="" class="h-8 rounded-full">
                                    </div>
                                    <h6>What is Tailwind CSS, and what is Utility-First CSS?</h6>
                                </div>
                                <div class="flex gap-3 card-body bg-slate-50 dark:bg-zink-600">
                                    <div
                                        class="flex items-center justify-center font-semibold rounded-full size-8 text-slate-500 bg-slate-100 shrink-0 dark:text-zink-200 dark:bg-zink-600">
                                        <i data-lucide="bot" class="size-5"></i>
                                    </div>
                                    <div class="grow">
                                        <p class="mb-2">Tailwind CSS is a <b>utility-first</b> CSS framework
                                            designed for rapid UI development. Instead of providing pre-built
                                            components, it offers low-level utility classes that let you build
                                            custom designs without ever leaving your HTML.</p>
                                        <p class="mb-0">Utility-first CSS is an approach where you use small,
                                            single-purpose classes to build your user interface. These utility
                                            classes are composed to create complex designs directly in the HTML,
                                            rather than relying on custom CSS. This approach favors composition over
                                            inheritance, making it easier to maintain and scale your codebase.</p>
                                    </div>
                                </div>
                                <div
                                    class="sticky top-0 flex items-center gap-3 shadow-sm bg-white/60 backdrop-blur-sm card-body dark:bg-zink-700/30">
                                    <div
                                        class="relative flex items-center justify-center font-semibold rounded-full size-8 text-slate-500 bg-slate-100">
                                        <img src="./assets/images/user-2.jpg" alt="" class="h-8 rounded-full">
                                    </div>
                                    <h6>How to install and set up Tailwind CSS in a project?</h6>
                                </div>
                                <div class="flex gap-3 card-body bg-slate-50 dark:bg-zink-600">
                                    <div
                                        class="flex items-center justify-center font-semibold rounded-full size-8 text-slate-500 bg-slate-100 shrink-0 dark:text-zink-200 dark:bg-zink-600">
                                        <i data-lucide="bot" class="size-5"></i>
                                    </div>
                                    <div class="grow">
                                        <p class="mb-2">To install Tailwind CSS, you can use npm or yarn by
                                            running the following commands:</p>
                                        <p class="mb-2">Using npm:</p>
                                        <pre class="!mb-0"><code class="!mb-0 language-js">npm install tailwindcss</code></pre>
                                        <p class="mt-4 mb-2">Using yarn:</p>
                                        <pre class="!mb-0"><code class="!mb-0 language-js">yarn add tailwindcss</code></pre>
                                        <p class="mt-4 mb-2">After installing, create a configuration file called
                                            <code class="text-xs text-pink-500 select-all">tailwind.config.js</code>
                                            in your project's root directory using the following command:
                                        </p>
                                        <pre class="!mb-0"><code class="!mb-0 language-js">npx tailwindcss init</code></pre>
                                        <p class="mt-4 mb-2">In your project's CSS file, import Tailwind's base
                                            styles, components, and utilities using the <code
                                                class="text-xs text-pink-500 select-all">@import</code> directive:
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex items-center gap-2">
                                    <div class="grow">
                                        <input type="text" id="inputText"
                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Type your message here ..." required autocomplete="off">
                                    </div>
                                    <div class="flex gap-2 shrink-0">
                                        <button type="button"
                                            class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-slate-500 btn bg-transparent border-transparent hover:text-slate-700 focus:text-slate-700 active:text-slate-700 dark:text-zink-200 dark:hover:text-zink-50 dark:focus:text-zink-50 dark:active:text-zink-50"><i
                                                data-lucide="mic" class="size-4"></i></button>
                                        <button type="button"
                                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                                data-lucide="send" class="inline-block mr-1 align-middle size-4"></i>
                                            <span class="align-middle">Send</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#employee-list .list-group-item').on('click', function() {
                var employeeId = $(this).data('id');
                $('#employee-list .list-group-item').removeClass('active');
                $(this).addClass('active');
                $('#lead-details-container').hide();
                $('#tasks-container').hide();
                fetchLeads(employeeId);
            });

            function fetchLeads(employeeId) {
                $.ajax({
                    url: '/employees/' + employeeId + '/leads',
                    method: 'GET',
                    success: function(data) {
                        populateLeadsTable(data);
                    }
                });
            }

            function populateLeadsTable(leads) {
                $('#leads-container').show();
                var tbody = $('#leads-table tbody');
                tbody.empty();

                leads.forEach(function(lead) {
                    var row = '<tr>' +
                        '<td>' + lead.lead_num + '</td>' +
                        '<td>' + lead.property_type + '</td>' +
                        '<td>' + lead.contact.name + '</td>' +
                        '<td>' + lead.contact.phone + '</td>' +
                        '<td><button class="btn btn-info btn-sm view-lead-details" data-id="' + lead.id +
                        '">View Details</button></td>' +
                        '</tr>';
                    tbody.append(row);
                });

                $('.view-lead-details').on('click', function() {
                    var leadId = $(this).data('id');
                    $('#tasks-container').hide();
                    fetchLeadDetails(leadId);
                });
            }

            function fetchLeadDetails(leadId) {
                $.ajax({
                    url: '/leads/' + leadId + '/details',
                    method: 'GET',
                    success: function(data) {
                        populateLeadDetails(data);
                    }
                });
            }

            function populateLeadDetails(lead) {
                $('#lead-details-container').show();
                $('#contact-name').text(lead.contact.name);
                $('#contact-email').text(lead.contact.email);
                $('#contact-phone').text(lead.contact.phone);
                $('#lead-description').text(lead.description);
                $('#property-type').text(lead.property_type);
                $('#budget').text(lead.max_budget);
                $('#location').text(lead.specific_location);

                $('#show-tasks-btn').off('click').on('click', function() {
                    populateTasksTable(lead.tasks);
                    $('#tasks-container').toggle();
                });
            }

            function populateTasksTable(tasks) {
                var tasksTimeline = $('#tasks-timeline');
                tasksTimeline.empty();

                tasks.forEach(function(task) {
                    var statusClass = 'status-' + task.status.toLowerCase().replace(/ /g, '_');
                    var modeIcon = getModeIcon(task.mode);

                    var taskItem = `
            <div class="timeline-item">
                <div class="timeline-icon" style="background-color: ${getStatusColor(task.status)};">
                    ${modeIcon}
                </div>
                <div class="timeline-content">
                    <h3>
                        ${task.description}
                        <span class="status ${statusClass}">${task.status}</span>
                    </h3>
                    <p>${task.date}</p>
                    <p>Mode: ${task.mode}</p>
                </div>
            </div>
        `;
                    tasksTimeline.append(taskItem);
                });
            }

            function getModeIcon(mode) {
                switch (mode) {
                    case 'Site Visit':
                        return '<i class="fas fa-home"></i>';
                    case 'Phone Call':
                        return '<i class="fas fa-phone"></i>';
                    case 'Discussion':
                        return '<i class="fas fa-comments"></i>';
                    default:
                        return '<i class="fas fa-tasks"></i>';
                }
            }

            function getStatusColor(status) {
                switch (status) {
                    case 'no_response':
                        return '#f44336';
                    case 'contact_and_response':
                        return '#2196f3';
                    case 'site_visit_done':
                        return '#4caf50';
                    case 'site_visit_requested':
                        return '#ff9800';
                    case 'visit_postponed':
                        return '#ff5722';
                    case 'follow_up_needed':
                        return '#9c27b0';
                    case 'follow_up_done':
                        return '#00bcd4';
                    case 'not_interested':
                        return '#795548';
                    case 'closed_successfully':
                        return '#009688';
                    case 'closed_with_failure':
                        return '#e91e63';
                    case 'invalid_contact_details':
                        return '#607d8b';
                    default:
                        return '#6c757d';
                }
            }

        });
    </script>
@endsection
