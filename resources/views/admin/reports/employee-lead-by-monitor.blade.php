@extends('layouts.admin-front')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    .active {
        color: red;
    }
</style>
<div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            {{-- <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">

                <div class="col-span-12 card 2xl:col-span-12">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 
                                        mb-5 2xl:grid-cols-1">
                            <h4 class="mb-4 text-18">Employees Report</h4>
                            <div class="xl:col-span-3 xl:col-start-10">
                                <div class="flex gap-3">
                                    <div class="relative grow">
                                        <input type="text"
                                            class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Search for ..." autocomplete="off" />
                                        <i data-lucide="search" class="inline-block size-4 absolute 
                                        ltr:left-2.5 rtl:right-2.5 top-2.5
                                         text-slate-500 dark:text-zink-200 
                                         fill-slate-100 dark:fill-zink-600"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto relative">

                <div class="flex gap-5 mt-5">
                    <div class="fixed inset-x-0 bottom-12 w-52 shrink-0 xl:relative z-[20] text-center xl:bottom-auto">
                        <div
                            class="w_100 xl:min-h-[calc(40vh_-_theme('height.header')_*_2.4)] inline-block card xl:h-[calc(40%_-_theme('spacing.5'))] shadow-lg xl:shadow-md">
                            <div class="flex h-full p-2 2xl:p-4 xl:flex-col" id="employee-list">
                                <h4 class="text-left">Employees</h4>
                                <ul class="w_100 flex gap-2  xl:pt-4 xl:flex-col nav-tabs">
                                    @foreach ($employees as $employee)
                                    <li class="group/item tabs chatTab">
                                        <a href="#!" data-tab-toggle data-target="mainChatList"
                                            data-id="{{ $employee->id }}"
                                            class="w_100 employee inline-flex items-center w-12 h-12 transition-all duration-200 ease-linear rounded-md mainChatList">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </a>
                                    </li>
                                    @endforeach
                                    {{-- <li class="group/item tabs">
                                        <a href="#!" data-tab-toggle data-target="contactList"
                                            class="w_100 inline-flex items-center w-12 h-12 transition-all duration-200 ease-linear rounded-md">Ayush
                                            Verma</a>
                                    </li> --}}

                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--end -->
                    <div class="block w-full xl:block xl:w-70 shrink-0 menu-content">
                        <div
                            class="h-[calc(100vh_-_theme('spacing.10')_*_6)] xl:min-h-[calc(100vh_-_theme('height.header')_*_2.4)] card xl:h-[calc(100%_-_theme('spacing.5'))]">
                            <div class="flex flex-col h-full">
                                <div class="tab-content">
                                    <div class="block tab-pane" id="mainChatList">
                                        <div class="card-body">
                                            <div class="flex items-center gap-3">
                                                {{-- <button
                                                    class="inline-flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 shrink-0 bg-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"><i
                                                        data-lucide="chevrons-left" class="mx-auto size-4"></i></button>
                                                --}}
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
                                            class="max-h-[calc(100vh_-_380px)] xl:max-h-[calc(100vh_-_300px)]" id="leads-container" style="display:none;">
                                            <ul class="flex flex-col gap-1" id="leadreportlist">

                                                <li style="display: none">
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

                                                            {{-- <ul
                                                                class="absolute z-50 py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600 hidden"
                                                                aria-labelledby="contactListDropdown1"
                                                                data-popper-placement="bottom-start"
                                                                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(656px, 289px);">
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
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end -->

                    <div class=" card w-full hidden [&.show]:block [&.active]:xl:block active chat-content" >
                        <div class="relative flex  h-full">
                            <div class="max-h-[calc(100vh_-_250px)] xl:max-h-full xl:w-80 card-body"  id="lead-details-container" style="display:none;">
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
                                        <h6 class="mt-4 mb-2 text-16" id="contact-name"></h6>
                                        <p class="text-slate-500 dark:text-zink-200 mb-2" id="lead-no"></p>
                                        <p class="text-slate-500 dark:text-zink-200" id="lead-creation-date"></p>
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
                                            <span class="align-middle" id="contact-phone"></span>
                                        </h6>
                                        <h6 class="mb-3 font-medium"><i aria-hidden="true"
                                                class="fa fa-whatsapp inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                            <span class="align-middle" id="contact-phone-whatsapp"></span>
                                        </h6>
                                        <h6 class="font-medium"><i data-lucide="mail"
                                                class="inline-block mr-1 size-4 text-slate-500 dark:text-zink-200"></i>
                                            <span class="align-middle" id="contact-email"></span>
                                        </h6>
                                    </div>

                                </div>
                                <div class=" lead_dtls">
                                    <div class="card">
                                        <h2>Lead Details</h2>
                                        <div class="timeline">
                                            <div class="timeline-item">
                                                <div class="timeline-content lead_dscrp">
                                                    <h3>
                                                        <div class="timeline-icon" style="background-color: #2196f3;">
                                                        </div>
                                                        Lead Descriptio
                                                        {{-- <span class="status status-done">Done</span> --}}
                                                    </h3>
                                                    <div data-simplebar data-simplebar-track="custom"
                                                        style="max-height: 220px;"
                                                        class="pr-2 text-slate-500 dark:text-zink-200">
                                                        <p class="mb-2" id="lead-description">If several languages coalesce, the grammar of
                                                            the resulting language is more simple and regular than that
                                                            of the individual languages. The new common language will be
                                                            more simple and regular than the existing
                                                            If several languages coalesce, the grammar of
                                                            the resulting language is more simple and regular than that
                                                            of the individual languages. The new common language will be
                                                            more simple and regular than the existing</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-content">
                                                    <h3>
                                                        <div class="timeline-icon" style="background-color: #2196f3;">
                                                        </div>
                                                        Property Type
                                                        {{-- <span class="status status-running">Running</span> --}}
                                                    </h3>
                                                    <p id="property-type">Free courses for all our customers at A1 Conference Room -9:00 am
                                                        tomorrow!</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-content">
                                                    <h3>
                                                        <div class="timeline-icon" style="background-color: #2196f3;">
                                                        </div>
                                                        Budget
                                                        {{-- <span class="status status-pending">Pending</span> --}}
                                                    </h3>
                                                    <p id="budget">Free courses for all our customers at A1 Conference Room -9:00 am
                                                        tomorrow!</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-content">
                                                    <h3>
                                                        <div class="timeline-icon" style="background-color: #2196f3;">
                                                        </div>
                                                        Location
                                                        {{-- <span class="status status-not-start">Not Start</span> --}}
                                                    </h3>
                                                    <p id="location">Shaila Towers</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lead_activity" id="tasks-container" style="display:none;">
                                <div class="card">
                                    <h2>Lead Activity</h2>
                                    <div class="timeline" id="tasks-timeline">
                                        {{-- <div class="timeline-item">
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
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-->
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
                                    <pre
                                        class="!mb-0"><code class="!mb-0 language-js">npm install tailwindcss</code></pre>
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
            $('#employee-list .employee').on('click', function() {
                var employeeId = $(this).data('id');
                //alert(employeeId);
                //return false;
                $('#employee-list .employee').removeClass('active');
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
                var leadreportlist = $('#leadreportlist');
                leadreportlist.empty();
                leads.forEach(function(lead) {
                    // var row = '<tr>' +
                    //     '<td>' + lead.lead_num + '</td>' +
                    //     '<td>' + lead.property_type + '</td>' +
                    //     '<td>' + lead.contact.name + '</td>' +
                    //     '<td>' + lead.contact.phone + '</td>' +
                    //     '<td><button class="btn btn-info btn-sm view-lead-details" data-id="' + lead.id +
                    //     '">View Details</button></td>' +
                    //     '</tr>';
                    var row = '<li class="view-lead-details" data-id="' + lead.id +'">'+                    
                                    '<div class="flex items-center gap-3 px-5 py-2 [&amp;.active]:bg-slate-50 group/item dark:[&amp;.active]:bg-zink-600 offline">'+
                                        '<div class="relative flex items-center justify-center font-semibold rounded-full text-slate-500 dark:text-zink-200 size-9 bg-slate-100 dark:bg-zink-600">'+
                                            '<img src="./assets/admin/images/avatar-7.png" alt="" class="rounded-full h-9">'+
                                            '<span class="absolute bottom-0 ltr:right-0 rtl:left-0 w-2.5 h-2.5 border-2 border-white dark:border-zink-700 rounded-full group-[.online]/item:bg-green-400 group-[.offline]/item:bg-slate-400 dark:group-[.offline]/item:bg-zink-500 bg-red-500">'+
                                                '</span>'+
                                        '</div>'+
                                        '<a href="#!" class="overflow-hidden grow">'+
                                            '<h6 class="mb-1">'+
                                                lead.contact.name +
                                            '</h6>'+
                                            '<p class="text-sm truncate text-slate-700 dark:text-zink-200">'+
                                                lead.lead_num +
                                            '</p>'+
                                            '<p class="text-sm truncate text-slate-700 dark:text-zink-200">'+
                                                lead.property_type+
                                            '</p>'
                                        '</a>'+
                                        '<div class="relative dropdown shrink-0">'+
                                            '<button type="button" class="dropdown-toggle" id="contactListDropdown1" data-bs-toggle="dropdown">'+
                                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-vertical" class="lucide lucide-more-vertical inline-block ml-1 size-4">'+
                                                    '<circle cx="12" cy="12" r="1">'+
                                                    '</circle>'+
                                                    '<circle cx="12" cy="5" r="1">'+
                                                    '</circle>'+
                                                    '<circle cx="12" cy="19" r="1">'+
                                                    '</circle>'+
                                                '</svg>'+
                                            '</button>'+                                           
                                        '</div>'+
                                    '</div>'+
                               '</li>' 
                    leadreportlist.append(row);
                });

                $('.view-lead-details').on('click', function() {
                    var leadId = $(this).data('id');
                    
                    $('#tasks-container').hide();
                    fetchLeadDetails(leadId);
                });
            }

            function fetchLeadDetails(leadId) {
                //alert(leadId);
                
                $.ajax({
                    url: '/leads/' + leadId + '/detail',
                    method: 'GET',
                    success: function(data) {
                        populateLeadDetails(data);
                    }
                });
            }

            function populateLeadDetails(lead) {
                console.log(lead.phone);
                $('#lead-details-container').show();
                $('#contact-name').text(lead.name);
                $('#lead-no').text(lead.lead_num);
                $('#lead-creation-date').text(lead.deleted_at);
                $('#contact-email').text(lead.email);
                $('#contact-phone').text(lead.phone);
                $('#contact-phone-whatsapp').text(lead.whatsapp);
                $('#lead-description').text(lead.description);
                $('#property-type').text(lead.property_type);
                $('#budget').text(lead.max_budget);
                $('#location').text(lead.specific_location);

                // $('#show-tasks-btn').off('click').on('click', function() {
                    populateTasksTable(lead.tasks);
                    $('#tasks-container').show();
                // });
            }

            function populateTasksTable(tasks) {
                var tasksTimeline = $('#tasks-timeline');
                tasksTimeline.empty();

                tasks.forEach(function(task) {
                    var statusClass = 'status-' + task.status.toLowerCase().replace(/ /g, '_');
                    var modeIcon = getModeIcon(task.mode);

        //             var taskItem = `
        //     <div class="timeline-item">
        //         <div class="timeline-icon" style="background-color: ${getStatusColor(task.status)};">
        //             ${modeIcon}
        //         </div>
        //         <div class="timeline-content">
        //             <h3>
        //                 ${task.description}
        //                 <span class="status ${statusClass}">${task.status}</span>
        //             </h3>
        //             <p>${task.date}</p>
        //             <p>Mode: ${task.mode}</p>
        //         </div>
        //     </div>
        // `;

                    var taskItem= `
                                 <div class="timeline-item">
                                            <div class="timeline-icon" style="background-color:  ${getStatusColor(task.status)};"> ${modeIcon}</div>
                                            <div class="timeline-content">
                                                <h3>
                                                    ${task.mode}
                                                    <span class="status ${statusClass}">${task.status}</span>
                                                </h3>
                                                <p> ${task.description}</p>
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