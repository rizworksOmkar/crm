<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta content="Minimal Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <title>CRM</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href={{ asset('assets/admin/images/crm_4.png') }}>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tailwind2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/OldAssets/css/app.min.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/summernote/summernote-bs4.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
    --}}
    {{--
    <link rel="stylesheet"
        href="{{ asset('assets/admin/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/jquery-selectric/selectric.css') }}"> --}}
    {{--
    <link rel="stylesheet"
        href="{{ asset('assets/admin/OldAssets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"> --}}
    {{--
    <link rel="stylesheet"
        href="{{ asset('assets/admin/OldAssets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/jquery-selectric/selectric.css') }}"> --}}
    {{--
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('assets/admin/OldAssets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Template CSS -->
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}"> --}}

    <!-- Custom style CSS -->
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" /> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/OldAssets/css/custom.css') }}"> --}}
    {{--
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" /> --}}

    {{--
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/admin/img/favicon.ico') }}" /> --}}

    <!-- Croping Images -->
    {{--
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/croperimgages/css/style.css') }}"> --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/croperimgages/css/style-example.css') }}" />
    --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/croperimgages/css/jquery.Jcrop.min.css') }}" />
    --}}
    {{--
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/bundles/pretty-checkbox/pretty-checkbox.min.css') }}"> --}}
    {{--
    <link href="https://www.jqueryscript.net/css/jque rysctipttop.css" rel="stylesheet" type="text/css"> --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/croperimgages/css/style.css') }}"> --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/croperimgages/css/style-example.css') }}" />
    --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/croperimgages/css/jquery.Jcrop.min.css') }}" />
    --}}
    {{--
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/bundles/pretty-checkbox/pretty-checkbox.min.css') }}"> --}}
    <!-- End Croping Images -->
    @yield('styles')
</head>

<body style="position: relative;"
    class="text-base bg-body-bg text-body font-public dark:text-zink-100 dark:bg-zink-800 group-data-[skin=bordered]:bg-body-bordered group-data-[skin=bordered]:dark:bg-zink-700">
    <div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
        <div
            class="app-menu w-vertical-menu bg-vertical-menu ltr:border-r rtl:border-l border-vertical-menu-border fixed bottom-0 top-0 z-[1003] transition-all duration-75 ease-linear group-data-[sidebar-size=md]:w-vertical-menu-md group-data-[sidebar-size=sm]:w-vertical-menu-sm group-data-[sidebar-size=sm]:pt-header group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:border-vertical-menu-dark group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=brand]:border-vertical-menu-brand group-data-[sidebar=modern]:bg-gradient-to-tr group-data-[sidebar=modern]:to-vertical-menu-to-modern group-data-[sidebar=modern]:from-vertical-menu-form-modern group-data-[layout=horizontal]:w-full group-data-[layout=horizontal]:bottom-auto group-data-[layout=horizontal]:top-header hidden md:block print:hidden group-data-[sidebar-size=sm]:absolute group-data-[sidebar=modern]:border-vertical-menu-border-modern group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:border-t group-data-[layout=horizontal]:dark:border-zink-500 group-data-[layout=horizontal]:border-r-0 group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=dark]:dark:border-zink-600 group-data-[layout=horizontal]:group-data-[navbar=scroll]:absolute group-data-[layout=horizontal]:group-data-[navbar=bordered]:top-[calc(theme('spacing.header')_+_theme('spacing.4'))] group-data-[layout=horizontal]:group-data-[navbar=bordered]:inset-x-4 group-data-[layout=horizontal]:group-data-[navbar=hidden]:top-0 group-data-[layout=horizontal]:group-data-[navbar=hidden]:h-16 group-data-[layout=horizontal]:group-data-[navbar=bordered]:w-[calc(100%_-_2rem)] group-data-[layout=horizontal]:group-data-[navbar=bordered]:[&.sticky]:top-header group-data-[layout=horizontal]:group-data-[navbar=bordered]:rounded-b-md group-data-[layout=horizontal]:shadow-md group-data-[layout=horizontal]:shadow-slate-500/10 group-data-[layout=horizontal]:dark:shadow-zink-500/10 group-data-[layout=horizontal]:opacity-0">
            <div
                class="flex items-center justify-center px-5 text-center h-header group-data-[layout=horizontal]:hidden group-data-[sidebar-size=sm]:fixed group-data-[sidebar-size=sm]:top-0 group-data-[sidebar-size=sm]:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:bg-gradient-to-br group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:from-vertical-menu-form-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:bg-vertical-menu-modern group-data-[sidebar-size=sm]:z-10 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_-_1px)] group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:dark:bg-zink-700">
                <a href="index.html"
                    class="d-flex logo_top group-data-[sidebar=dark]:hidden group-data-[sidebar=brand]:hidden group-data-[sidebar=modern]:hidden">
                    <span class="hidden group-data-[sidebar-size=sm]:block">
                        <img src="{{ asset('assets/admin/images/crm_1.png') }}" alt="" class="h-9 mx-auto" />
                    </span>
                    <span class="group-data-[sidebar-size=sm]:hidden">
                        <img src="{{ asset('assets/admin/images/crm_1.png') }}" alt="" class="h-9 mx-auto" />
                    </span>
                    @if (Auth::user()->role_type == 'admin')
                    <span class="logo-name">CRM Admin</span>
                    @else
                    <span class="logo-name">CRM User</span>
                    @endif

                </a>
                <a href="index.html"
                    class="hidden group-data-[sidebar=dark]:block group-data-[sidebar=brand]:block group-data-[sidebar=modern]:block">
                    <span class="hidden group-data-[sidebar-size=sm]:block">
                        <img src="{{ asset('assets/admin/images/crm_1.png') }}" alt="" class="h-9 mx-auto" />
                    </span>
                    <span class="group-data-[sidebar-size=sm]:hidden">
                        <img src="{{ asset('assets/admin/images/crm_1.png') }}" alt="" class="h-9 mx-auto" />
                    </span>
                </a>
                <button type="button" class="hidden p-0 float-end" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar"
                class="group-data-[sidebar-size=md]:max-h-[calc(100vh_-_theme('spacing.header')_*_1.2)] group-data-[sidebar-size=lg]:max-h-[calc(100vh_-_theme('spacing.header')_*_1.2)] group-data-[layout=horizontal]:h-56 group-data-[layout=horizontal]:md:h-auto group-data-[layout=horizontal]:overflow-auto group-data-[layout=horizontal]:md:overflow-visible group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:mx-auto">
                <div>
                    <ul class="group-data-[layout=horizontal]:flex group-data-[layout=horizontal]:flex-col group-data-[layout=horizontal]:md:flex-row"
                        id="navbar-nav">
                        <li
                            class="px-4 py-1 text-vertical-menu-item group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern uppercase font-medium text-[11px] cursor-default tracking-wider group-data-[sidebar-size=sm]:hidden group-data-[layout=horizontal]:hidden inline-block group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:underline group-data-[sidebar-size=md]:text-center group-data-[sidebar=dark]:dark:text-zink-200">
                            <span data-key="t-menu">Menu</span>
                        </li>
                        {{-- <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="#!">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="monitor-dot"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-dashboards">Dashboards</span>
                            </a>
                            <div
                                class="dropdown-content group-data-[sidebar-size=sm]:ltr:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:right-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:ltr:rounded-br-md group-data-[sidebar-size=sm]:rtl:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:from-vertical-menu-from-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-gradient-to-tr">
                                <ul
                                    class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">
                                    <li>
                                        <a href="dashboards-analytics.html"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-analytics">
                                            Analytics
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-ecommerce">
                                            Ecommerce
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-email.html"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-email">
                                            Email
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-hr.html"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-hr">
                                            HR
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-social-media.html"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-social">
                                            Social
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="{{ route('Admin-dashboard') }}">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="monitor-dot"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-chat">Home</span>
                            </a>
                        </li>

                        @if (Auth::user()->role_type == 'admin')


                        <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="#!">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="picture-in-picture-2"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-landing-page">Master Management</span>
                            </a>
                            <div
                                class="dropdown-content group-data-[sidebar-size=sm]:ltr:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:right-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:ltr:rounded-br-md group-data-[sidebar-size=sm]:rtl:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:from-vertical-menu-from-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-gradient-to-tr">
                                <ul
                                    class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">
                                    <li>
                                        <a href="{{ route('admin-employee-index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-one-page">
                                            Employee / User
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.customer.index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size
                                            transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover
                                            [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5
                                            before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear
                                            before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active
                                            group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200
                                             group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark
                                              group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark
                                              group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500
                                              group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-one-page">
                                            Customer / Client
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('get-all-roles') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-product">
                                            Role Master
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('property-types.view') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-product">
                                            Property Type
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('property-specs.view') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-product">
                                            Property Specs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lead-sources.view') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-default">
                                            Lead Source
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lead-status.view') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-month-grid">
                                            Lead Status Creation
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li
                            class="px-4 py-1 text-vertical-menu-item group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern uppercase font-medium text-[11px] cursor-default tracking-wider group-data-[sidebar-size=sm]:hidden group-data-[layout=horizontal]:hidden inline-block group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:underline group-data-[sidebar-size=md]:text-center">
                            <span data-key="t-apps">Apps</span>
                        </li> --}}

                        <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="#!">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="calendar-days"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-calendar">Lead & Management</span>
                            </a>
                            <div
                                class="dropdown-content group-data-[sidebar-size=sm]:ltr:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:right-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:ltr:rounded-br-md group-data-[sidebar-size=sm]:rtl:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:from-vertical-menu-from-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-gradient-to-tr">
                                <ul
                                    class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">

                                    <li>
                                        <a href="{{ route('admin-lead-index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-multi-month-stack">
                                            Leads Creation (One)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lead.upload') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-multi-month-stack">
                                            Lead Mass Import
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin-assignlead-index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-multi-month-stack">
                                            Lead Assignment
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin-reassignlead-index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-multi-month-stack">
                                            Lead Re-Assignment
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('monitor-report') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-multi-month-stack">
                                            Lead Activity
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lead-completion-filter.view') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-multi-month-stack">
                                            Lead Completion
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="#!">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="shopping-bag"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-ecommerce">Accounts</span>
                            </a>
                            <div
                                class="dropdown-content group-data-[sidebar-size=sm]:ltr:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:right-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:ltr:rounded-br-md group-data-[sidebar-size=sm]:rtl:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:from-vertical-menu-from-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-gradient-to-tr">
                                <ul
                                    class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">

                                    <li>
                                        <a href="{{ route('billing.index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-shopping-cart">
                                            Bill Raise
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('billed.index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-shopping-cart">
                                            Bill Payment
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-checkout">
                                            Payment Reciept
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-orders">
                                            Payment Dispute
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>

                        @else
                        <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="#!">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="picture-in-picture-2"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-landing-page">Lead Management</span>
                            </a>
                            <div
                                class="dropdown-content group-data-[sidebar-size=sm]:ltr:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:right-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:ltr:rounded-br-md group-data-[sidebar-size=sm]:rtl:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:from-vertical-menu-from-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-gradient-to-tr">
                                <ul
                                    class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">

                                    <li>
                                        <a href="{{ route('my-lead-index') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-product">
                                            My Leads
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        @endif

                        <li class="relative group-data-[layout=horizontal]:shrink-0 group/sm">
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-75 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-border-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0"
                                href="#!">
                                <span
                                    class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:flex group-data-[sidebar-size=sm]:items-center"><i
                                        data-lucide="circuit-board"
                                        class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span>
                                <span
                                    class="group-data-[sidebar-size=sm]:ltr:pl-10 group-data-[sidebar-size=sm]:rtl:pr-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden"
                                    data-key="t-hr-management">Reports</span>
                            </a>
                            <div
                                class="dropdown-content group-data-[sidebar-size=sm]:ltr:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:right-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:ltr:rounded-br-md group-data-[sidebar-size=sm]:rtl:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:from-vertical-menu-from-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-gradient-to-tr">
                                <ul
                                    class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">

                                    @if (Auth::user()->role_type == 'admin')



                                    <li>
                                        <a href="{{ route('lead-report-main') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Lead Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('unassigned-leads') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Unassigned Lead
                                            Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('assigned-leads') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Assigned Lead Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('unbilled-leads') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Unbilled Leads
                                            Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('billed-leads') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Unpaid Bill Leads Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('paid-leads') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Paid Bill Leads
                                            Report
                                        </a>
                                    </li>
                                    <a>--------------------------------------</a>
                                    {{-- <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            My Assigned Lead Monitoring
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('monitor-report') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-holidays">
                                            Lead Monitoring
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('employees-monitor') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Employee Monitoring
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('date-range-report') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Dated Monitoring Reports
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tasks.notification') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-holidays">
                                            Task Notifcation
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-holidays">
                                            Client Monitoring
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Specific Client Monitoring
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Unbilled Lead Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-holidays">
                                            All Bill Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Unpaid Bill Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Customer Lead
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Customer Bill Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Customer Payment Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-department">
                                            Unpaid Bills
                                        </a>
                                    </li> --}}
                                    @else
                                    <li>
                                        <a href="{{ route('lead-report-main-user') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Lead Report
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('unbilled-leadsuser') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Unbilled Leads
                                            Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('billed-leadsuser') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Unpaid Bill Leads Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('paid-leadsuser') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Paid Bill Leads
                                            Report
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('date-range-reportuser') }}"
                                            class="relative flex items-center px-6 py-2 text-vertical-menu-item-font-size transition-all duration-75 ease-linear text-vertical-menu-sub-item hover:text-vertical-menu-sub-item-hover [&.active]:text-vertical-menu-sub-item-active before:absolute ltr:before:left-1.5 rtl:before:right-1.5 before:top-4 before:w-1 before:h-1 before:rounded before:transition-all before:duration-75 before:ease-linear before:bg-vertical-menu-sub-item hover:before:bg-vertical-menu-sub-item-hover [&.active]:before:bg-vertical-menu-sub-item-active group-data-[sidebar=dark]:text-vertical-menu-sub-item-dark group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:text-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:text-custom-500 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 group-data-[sidebar=dark]:before:bg-vertical-menu-sub-item-dark/50 group-data-[sidebar=dark]:hover:before:bg-vertical-menu-sub-item-hover-dark group-data-[sidebar=dark]:dark:hover:before:bg-custom-500 group-data-[sidebar=dark]:[&.active]:before:bg-vertical-menu-sub-item-active-dark group-data-[sidebar=dark]:dark:[&.active]:before:bg-custom-500 group-data-[sidebar=brand]:text-vertical-menu-sub-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-sub-item-hover-brand group-data-[sidebar=brand]:before:bg-vertical-menu-sub-item-brand/80 group-data-[sidebar=brand]:hover:before:bg-vertical-menu-sub-item-hover-brand/80 group-data-[sidebar=brand]:[&.active]:before:bg-vertical-menu-sub-item-active-brand/80 group-data-[sidebar=brand]:[&.active]:text-vertical-menu-sub-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-sub-item-modern group-data-[sidebar=modern]:before:bg-vertical-menu-sub-item-modern/70 group-data-[sidebar=modern]:hover:text-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:before:hover:bg-vertical-menu-sub-item-hover-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar=modern]:before:[&.active]:text-vertical-menu-sub-item-active-modern group-data-[sidebar-size=md]:before:hidden group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=md]:block group-data-[sidebar-size=sm]:before:hidden group-data-[layout=horizontal]:before:left-[1.4rem] group-data-[layout=horizontal]:md:before:hidden group-data-[layout=horizontal]:ltr:pl-10 group-data-[layout=horizontal]:rtl:pr-10 group-data-[layout=horizontal]:ltr:pr-5 group-data-[layout=horizontal]:rtl:pl-5 group-data-[layout=horizontal]:md:!px-5"
                                            data-key="t-employees-list">
                                            Dated Monitoring Reports
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <div id="sidebar-overlay" class="absolute inset-0 z-[1002] bg-slate-500/30 hidden"></div>
        <header id="page-topbar"
            class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm group-data-[layout=horizontal]:ltr:left-0 group-data-[layout=horizontal]:rtl:right-0 fixed right-0 z-[1000] left-0 print:hidden group-data-[navbar=bordered]:m-4 group-data-[navbar=bordered]:[&.is-sticky]:mt-0 transition-all ease-linear duration-300 group-data-[navbar=hidden]:hidden group-data-[navbar=scroll]:absolute group/topbar group-data-[layout=horizontal]:z-[1004]">
            <div class="layout-width ">
                <div
                    class="bg_top_hed flex items-center px-4 mx-auto bg-topbar border-b-2 border-topbar group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:border-topbar-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:border-topbar-brand shadow-md h-header shadow-slate-200/50 group-data-[navbar=bordered]:rounded-md group-data-[navbar=bordered]:group-[.is-sticky]/topbar:rounded-t-none group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:border-zink-700 dark:shadow-none group-data-[topbar=dark]:group-[.is-sticky]/topbar:dark:shadow-zink-500 group-data-[topbar=dark]:group-[.is-sticky]/topbar:dark:shadow-md group-data-[navbar=bordered]:shadow-none group-data-[layout=horizontal]:group-data-[navbar=bordered]:rounded-b-none group-data-[layout=horizontal]:shadow-none group-data-[layout=horizontal]:dark:group-[.is-sticky]/topbar:shadow-none">
                    <div
                        class="flex items-center w-full group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl navbar-header group-data-[layout=horizontal]:ltr:xl:pr-3 group-data-[layout=horizontal]:rtl:xl:pl-3">
                        <!-- LOGO -->
                        {{-- <div
                            class="items-center justify-center hidden px-5 text-center h-header group-data-[layout=horizontal]:md:flex group-data-[layout=horizontal]:ltr::pl-0 group-data-[layout=horizontal]:rtl:pr-0">
                            <a href="index.html">
                                <span class="hidden">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEwAAABMCAYAAADHl1ErAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMS1jMDAwIDc5LmRhYmFjYmIsIDIwMjEvMDQvMTQtMDA6Mzk6NDQgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyMi41IChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpGMDk0N0MyMDY4QjcxMUVFOTYxN0Q1OTIxQkQxNzgwRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpGMDk0N0MyMTY4QjcxMUVFOTYxN0Q1OTIxQkQxNzgwRCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkYwOTQ3QzFFNjhCNzExRUU5NjE3RDU5MjFCRDE3ODBEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkYwOTQ3QzFGNjhCNzExRUU5NjE3RDU5MjFCRDE3ODBEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+iIlVCAAACB1JREFUeNrsXGtsFFUUPvfObl/bUoSQUEz0jzERBEQKWNTgIyoqgV8mhEQTTSRGkYdgRCHGmKCComCojwpKYpDEBENijAlRAXkKpSAWRawhmqjlLaXdst3duX53Zlra0t2Z2b13Ztt6mjN3dnrn9d1zz/nua5gQgrzI7I0rrZSRiQ0UKcuYip6/u84RV+ex/if6OE/ui6+weQg6h4hvFoJhl1tPIQS39ruO4Teu7hzrmcf+n0yZk3bmtWXToyvIq0SocOU7vOzdzv5neMsYQFgf9kMVJmCC7QU4NT0Pso+wSUE3/g/YFaTk5ntUm5oMGT5BnqgDXijCCwswth2PdCdZ/iWT8jps5g92C5PPsQcOfDJ1c8ZZLHEtNkno+4MRMIkQfBaf5O8Ueg/ApbFfN8gAg4MXbFKOJ38ILYG+OwgAE/Lee4Uvy8pUPSUZkykbsIAh2LAD0AlqajStcShH7QAFjO2Hg5+g+KLroFEHvAEF2D7KuxpmrJ7vOFX9rYECWD3adxP1Blx6E6C1Yv+Dfg4Y2wGdGNDNJD+7rKMZFRBg7BsEsmkBWzOaUVRm87X+A5iMhjsFsTtCisa1TvSs6x+ACdoDwG4LmRlLcosWgdiggqdFdCEF2Q1SGjZYnbLeaRHUFiJgEfgraVmTC6snxOJp8n3XFhJgBoA6CJ91CxWm5N0iUAkYkwyeHLCiRoTOt12k060XrP3AWqjyTwgaVTmCyqIllDLTfVka5Qqawjdh+9Dcqe78da6tlcZW3UhTrruZWhPx4BqpjJPBOW1vOkTNl85RabQ4U/X8B/pFGIAVOQ3p8d0P/tsep9Ejb6CZY6eFUvcam09S09m/AFhppiwfwxh3yrL1yZPy7aKRDWk+Xg5p9Var1yUkMeWQmjCor+dytBJR/GXhE4I8AJOIsH12F02m/vcQRWQbF+jSJ/Aa1wQAmORZbBdKqdouxb40QiLEMRZhDegablqOiP5AAICx3Th1qsUiiGfR8KyMWfd3ez4rz71anT5sawcJ43bXfGa4Pkz6KbPTl2aX0boAexA6DyXiKewNLx9K9X/+TvFEgtqTHVnztiUuU1XlMHq85r6MedqTCdqwZxvFkRZHolloBSMG/bvlAlWWlHupRMO1AIb6PgPJdKed6CpDimP025lm2nvyBIirkTXv2bYWGld1fVbAOlIp2nJ0P52Lt1FFcYkLcSWqGjIUlKKE0qbpgRbpsDDBVkl6Be/wkpfsyZSg8qIyKh9W5po3Fi2jkRXDXQgpo2uHjKBYUQxa7OmR02lPbrpFV5X8A7oM0SeGdIHyiOYaIJiTj6uOvqd0M/2F4C7yvGfUIca9BWzBr6g62RVA04jNg0UkLfCUWRj3nE+xhW0LADDp+Pki+DXpUZ9TYmFerMYa4FZqYeCTdCCgxrcF2mJYmrzG/PwszPBEcm3rMlRa2GsaeytEJtAWoORl9Vys1cKEch/2KS70tTbA7Im6veCzmLw8bixBqTdRjvO1zOB9GIASj+XSdPMMWCIxyu5Tpa4Zzs5v4YBGjXp9GFNpYR0ixxM9A5ZOV1jTw5kcsWKmnfI0ylr+ZtNzMW9/PEyphc0ie6xyrsYqmXQsqhMw07EsMQtVc2tePROeo6RSH/YkdDN0e0BR0pIZKO2t+fMwIywetjxIwB5GSX+pjOl76QpSz/Tvgd4KbdAN2GyU8ma1bUnuzirU8zAp9/sBjPt9NcgjKOHNPUpblfqJkur0Lp1VciZK93NSLCH6MCkjNQHGVsPPPE06xPTY/6+nt6JCC2Ao1bNIzkNHqbewUHsrUnosTLDXsd0CSziEtFwtYj54mKncws7r9GEnwMinALR67JcGaWHMysd0WNgvunnYzyjhqUgPq7MwIyweJuXbAIirOIJSnmhPQhFG/hbmPrVA9OjTVzbe2U7B9Lha0gCrqAGVO6DGwrzgzn3k9XTjjdicCbIteVAuNRbWpJRgoqSpzofFYbOvauutyCL7YWnjANwPeKXcAoHVV++hmpnMe173EDIXl2kOAzApP8lJwMKmHEW5WRjzVCUVRcmluNumXIBXOfm0EdFril1NfV7X8kvcE2AKouQLxMxVuQYO1RO4juCSAI0n3acZ9aVu1Yjnq8uwWZXPC2qY3iwahODSp4GniRJPTUn4JuZS4gZn1pwveyomy8Fn2ZaVr/fTNR/8OB6yGiXa4MWnGTxCHWlGF+MdVBQx6HKy51TxytIonW5JWHkMaxjUN614FsWyTsWL6ZxAf8z5rEK9230qS4vp9KUUzalrIM6uHgFlOJYyBaVhiWXRKAl/Qz6LGFMDlm7ApPyI172J7B7NjN0oEhBhEl1MpO3Zs70ruZBWSFRW5NuynsfZSpc0B7FEowkRaRJCuKQcsT69nmMxsSKXbmrhdTqfXQ0ZE+t8nVEggEn51f5EjPe+8zxlse2zhPILBzgvXByGpVVDE3ZDWpu+gpu9restgl4kfwikU66hlA32qIbrL0fBrLA/4KZHwlh5cMSe489NBUS0uy7FZoWOahimhXVWT/k5hhp76Y2SQlsOUroyiFUBYX4/TK6AGwNt97AmKJsusy0rGAn5607iuCADlIM8tQgykNI1QT5xAXyhThyz14fzlHersnzWEtL8nZ0CBcxuEYAOjBHEW7uPPWZW9iLOWR3GgxbSNxBPkGx7Ct7eNZvnKrX6whYCsTfCesgC+2ikHCO0GuyJDMsJ51Gen1EYaIBJaQTlmAyN91pyLBdR1OrmWf0RMBkIjtqL7tkpx9E/FbZldcp/AgwA9oU96lMDwgIAAAAASUVORK5CYII="
                                        alt="" class="h-6 mx-auto" />
                                </span>
                                <span class="group-data-[topbar=dark]:hidden group-data-[topbar=brand]:hidden">
                                    <img src="./assets/images/logo-dark.png" alt="" class="h-6 mx-auto" />
                                </span>
                            </a>
                            <a href="index.html"
                                class="hidden group-data-[topbar=dark]:block group-data-[topbar=brand]:block">
                                <span class="group-data-[topbar=dark]:hidden group-data-[topbar=brand]:hidden">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEwAAABMCAYAAADHl1ErAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMS1jMDAwIDc5LmRhYmFjYmIsIDIwMjEvMDQvMTQtMDA6Mzk6NDQgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyMi41IChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpGMDk0N0MyMDY4QjcxMUVFOTYxN0Q1OTIxQkQxNzgwRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpGMDk0N0MyMTY4QjcxMUVFOTYxN0Q1OTIxQkQxNzgwRCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkYwOTQ3QzFFNjhCNzExRUU5NjE3RDU5MjFCRDE3ODBEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkYwOTQ3QzFGNjhCNzExRUU5NjE3RDU5MjFCRDE3ODBEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+iIlVCAAACB1JREFUeNrsXGtsFFUUPvfObl/bUoSQUEz0jzERBEQKWNTgIyoqgV8mhEQTTSRGkYdgRCHGmKCComCojwpKYpDEBENijAlRAXkKpSAWRawhmqjlLaXdst3duX53Zlra0t2Z2b13Ztt6mjN3dnrn9d1zz/nua5gQgrzI7I0rrZSRiQ0UKcuYip6/u84RV+ex/if6OE/ui6+weQg6h4hvFoJhl1tPIQS39ruO4Teu7hzrmcf+n0yZk3bmtWXToyvIq0SocOU7vOzdzv5neMsYQFgf9kMVJmCC7QU4NT0Pso+wSUE3/g/YFaTk5ntUm5oMGT5BnqgDXijCCwswth2PdCdZ/iWT8jps5g92C5PPsQcOfDJ1c8ZZLHEtNkno+4MRMIkQfBaf5O8Ueg/ApbFfN8gAg4MXbFKOJ38ILYG+OwgAE/Lee4Uvy8pUPSUZkykbsIAh2LAD0AlqajStcShH7QAFjO2Hg5+g+KLroFEHvAEF2D7KuxpmrJ7vOFX9rYECWD3adxP1Blx6E6C1Yv+Dfg4Y2wGdGNDNJD+7rKMZFRBg7BsEsmkBWzOaUVRm87X+A5iMhjsFsTtCisa1TvSs6x+ACdoDwG4LmRlLcosWgdiggqdFdCEF2Q1SGjZYnbLeaRHUFiJgEfgraVmTC6snxOJp8n3XFhJgBoA6CJ91CxWm5N0iUAkYkwyeHLCiRoTOt12k060XrP3AWqjyTwgaVTmCyqIllDLTfVka5Qqawjdh+9Dcqe78da6tlcZW3UhTrruZWhPx4BqpjJPBOW1vOkTNl85RabQ4U/X8B/pFGIAVOQ3p8d0P/tsep9Ejb6CZY6eFUvcam09S09m/AFhppiwfwxh3yrL1yZPy7aKRDWk+Xg5p9Var1yUkMeWQmjCor+dytBJR/GXhE4I8AJOIsH12F02m/vcQRWQbF+jSJ/Aa1wQAmORZbBdKqdouxb40QiLEMRZhDegablqOiP5AAICx3Th1qsUiiGfR8KyMWfd3ez4rz71anT5sawcJ43bXfGa4Pkz6KbPTl2aX0boAexA6DyXiKewNLx9K9X/+TvFEgtqTHVnztiUuU1XlMHq85r6MedqTCdqwZxvFkRZHolloBSMG/bvlAlWWlHupRMO1AIb6PgPJdKed6CpDimP025lm2nvyBIirkTXv2bYWGld1fVbAOlIp2nJ0P52Lt1FFcYkLcSWqGjIUlKKE0qbpgRbpsDDBVkl6Be/wkpfsyZSg8qIyKh9W5po3Fi2jkRXDXQgpo2uHjKBYUQxa7OmR02lPbrpFV5X8A7oM0SeGdIHyiOYaIJiTj6uOvqd0M/2F4C7yvGfUIca9BWzBr6g62RVA04jNg0UkLfCUWRj3nE+xhW0LADDp+Pki+DXpUZ9TYmFerMYa4FZqYeCTdCCgxrcF2mJYmrzG/PwszPBEcm3rMlRa2GsaeytEJtAWoORl9Vys1cKEch/2KS70tTbA7Im6veCzmLw8bixBqTdRjvO1zOB9GIASj+XSdPMMWCIxyu5Tpa4Zzs5v4YBGjXp9GFNpYR0ixxM9A5ZOV1jTw5kcsWKmnfI0ylr+ZtNzMW9/PEyphc0ie6xyrsYqmXQsqhMw07EsMQtVc2tePROeo6RSH/YkdDN0e0BR0pIZKO2t+fMwIywetjxIwB5GSX+pjOl76QpSz/Tvgd4KbdAN2GyU8ma1bUnuzirU8zAp9/sBjPt9NcgjKOHNPUpblfqJkur0Lp1VciZK93NSLCH6MCkjNQHGVsPPPE06xPTY/6+nt6JCC2Ao1bNIzkNHqbewUHsrUnosTLDXsd0CSziEtFwtYj54mKncws7r9GEnwMinALR67JcGaWHMysd0WNgvunnYzyjhqUgPq7MwIyweJuXbAIirOIJSnmhPQhFG/hbmPrVA9OjTVzbe2U7B9Lha0gCrqAGVO6DGwrzgzn3k9XTjjdicCbIteVAuNRbWpJRgoqSpzofFYbOvauutyCL7YWnjANwPeKXcAoHVV++hmpnMe173EDIXl2kOAzApP8lJwMKmHEW5WRjzVCUVRcmluNumXIBXOfm0EdFril1NfV7X8kvcE2AKouQLxMxVuQYO1RO4juCSAI0n3acZ9aVu1Yjnq8uwWZXPC2qY3iwahODSp4GniRJPTUn4JuZS4gZn1pwveyomy8Fn2ZaVr/fTNR/8OB6yGiXa4MWnGTxCHWlGF+MdVBQx6HKy51TxytIonW5JWHkMaxjUN614FsWyTsWL6ZxAf8z5rEK9230qS4vp9KUUzalrIM6uHgFlOJYyBaVhiWXRKAl/Qz6LGFMDlm7ApPyI172J7B7NjN0oEhBhEl1MpO3Zs70ruZBWSFRW5NuynsfZSpc0B7FEowkRaRJCuKQcsT69nmMxsSKXbmrhdTqfXQ0ZE+t8nVEggEn51f5EjPe+8zxlse2zhPILBzgvXByGpVVDE3ZDWpu+gpu9restgl4kfwikU66hlA32qIbrL0fBrLA/4KZHwlh5cMSe489NBUS0uy7FZoWOahimhXVWT/k5hhp76Y2SQlsOUroyiFUBYX4/TK6AGwNt97AmKJsusy0rGAn5607iuCADlIM8tQgykNI1QT5xAXyhThyz14fzlHersnzWEtL8nZ0CBcxuEYAOjBHEW7uPPWZW9iLOWR3GgxbSNxBPkGx7Ct7eNZvnKrX6whYCsTfCesgC+2ikHCO0GuyJDMsJ51Gen1EYaIBJaQTlmAyN91pyLBdR1OrmWf0RMBkIjtqL7tkpx9E/FbZldcp/AgwA9oU96lMDwgIAAAAASUVORK5CYII="
                                        alt="" class="h-6 mx-auto" />
                                </span>
                                <span class="group-data-[topbar=dark]:block group-data-[topbar=brand]:block">
                                    <img src="./assets/images/logo-light.png" alt="" class="h-6 mx-auto" />
                                </span>
                            </a>
                        </div> --}}

                        {{-- <button type="button"
                            class="inline-flex relative justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-75 ease-linear bg-topbar rounded-md btn hover:bg-slate-100 group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:border-topbar-dark group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:border-topbar-brand group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:dark:border-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[layout=horizontal]:flex group-data-[layout=horizontal]:md:hidden hamburger-icon"
                            id="topnav-hamburger-icon">
                            <i data-lucide="chevrons-left" class="w-5 h-5 group-data-[sidebar-size=sm]:hidden"></i>
                            <i data-lucide="chevrons-right"
                                class="hidden w-5 h-5 group-data-[sidebar-size=sm]:block"></i>
                        </button>

                        <div
                            class="relative hidden ltr:ml-3 rtl:mr-3 lg:block group-data-[layout=horizontal]:hidden group-data-[layout=horizontal]:lg:block">
                            <input type="text"
                                class="py-2 pr-4 text-sm text-topbar-item bg-topbar border border-topbar-border rounded pl-8 placeholder:text-slate-400 form-control focus-visible:outline-0 min-w-[300px] focus:border-blue-400 group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:border-topbar-border-dark group-data-[topbar=dark]:placeholder:text-slate-500 group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:border-topbar-border-brand group-data-[topbar=brand]:placeholder:text-blue-300 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:border-zink-500 group-data-[topbar=dark]:dark:text-zink-100"
                                placeholder="Search for ..." autocomplete="off" />
                            <i data-lucide="search"
                                class="inline-block size-4 absolute left-2.5 top-2.5 text-topbar-item fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:dark:fill-zink-600"></i>
                        </div> --}}

                        <div class="top_head_left">
                            <h4>CRM</h4>
                        </div>

                        <div class="flex gap-3 ms-auto">
                            {{-- <div class="relative flex items-center dropdown h-header">
                                <button type="button"
                                    class="inline-flex justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=dark]:dark:text-zink-500 group-data-[topbar=dark]:dark:hover:text-zink-50"
                                    id="flagsDropdown" data-bs-toggle="dropdown">
                                    <img src="./assets/images/us.svg" alt="" id="header-lang-img"
                                        class="h-5 rounded-sm" />
                                </button>
                                <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[10rem] flex flex-col gap-4 dark:bg-zink-600"
                                    aria-labelledby="flagsDropdown">
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="en"
                                        title="English">
                                        <img src="./assets/images/us.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            English
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="sp"
                                        title="Spanish">
                                        <img src="./assets/images/es.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            Spanish
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="gr"
                                        title="German">
                                        <img src="./assets/images/de.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            German
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="fr"
                                        title="French">
                                        <img src="./assets/images/fr.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            French
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="jp"
                                        title="Japanese">
                                        <img src="./assets/images/jp.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            Japanese
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="ch"
                                        title="Chinese">
                                        <img src="./assets/images/china.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            Chinese
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="it"
                                        title="Italian">
                                        <img src="./assets/images/it2.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            Italian
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="ru"
                                        title="Russian">
                                        <img src="./assets/images/ru2.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            Russian
                                        </h6>
                                    </a>
                                    <a href="#!" class="flex items-center gap-3 group/items language" data-lang="ar"
                                        title="Arabic">
                                        <img src="./assets/images/ae2.svg" alt=""
                                            class="object-cover h-4 rounded-full" />
                                        <h6
                                            class="transition-all duration-200 ease-linear font-15medium text- text-slate-600 dark:text-zink-200 group-hover/items:text-custom-500">
                                            Arabic
                                        </h6>
                                    </a>
                                </div>
                            </div> --}}

                            {{-- <div class="relative flex items-center h-header">
                                <button type="button"
                                    class="inline-flex relative justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark"
                                    id="light-dark-mode">
                                    <i data-lucide="sun"
                                        class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                                </button>
                            </div>

                            <div class="relative flex items-center h-header">
                                <button type="button" data-drawer-target="cartSidePenal"
                                    class="inline-flex relative justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark">
                                    <i data-lucide="shopping-cart"
                                        class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                                    <span
                                        class="absolute flex items-center justify-center w-[16px] h-[16px] text-xs text-white bg-red-400 border-white rounded-full -top-1 -right-1">3</span>
                                </button>
                            </div> --}}

                            <div class="relative flex items-center dropdown h-header">
                                <button type="button"
                                    class="inline-flex justify-center relative items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark"
                                    id="notificationDropdown" data-bs-toggle="dropdown">
                                    <i data-lucide="bell-ring"
                                        class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                                    <span class="absolute top-0 right-0 flex w-1.5 h-1.5">
                                        <span
                                            class="absolute inline-flex w-full h-full rounded-full opacity-75 animate-ping bg-sky-400"></span>
                                        <span class="relative inline-flex w-1.5 h-1.5 rounded-full bg-sky-500"></span>
                                    </span>
                                </button>
                                <div class="absolute z-50 hidden ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[20rem] lg:min-w-[26rem] dark:bg-zink-600"
                                    aria-labelledby="notificationDropdown">
                                    <div class="p-4">
                                        <h6 class="mb-4 text-16">
                                            Notifications
                                            <span
                                                class="inline-flex items-center justify-center w-5 h-5 ml-1 text-[11px] font-medium border rounded-full text-white bg-orange-500 border-orange-500">15</span>
                                        </h6>
                                        <ul class="flex flex-wrap w-full p-1 mb-2 text-sm font-medium text-center rounded-md filter-btns text-slate-500 bg-slate-100 nav-tabs dark:bg-zink-500 dark:text-zink-200"
                                            data-filter-target="notification-list">
                                            <li class="grow">
                                                <a href="javascript:void(0);" data-filter="all"
                                                    class="inline-block nav-link px-1.5 w-full py-1 text-xs transition-all duration-300 ease-linear rounded-md text-slate-500 border border-transparent [&.active]:bg-white [&.active]:text-custom-500 hover:text-custom-500 active:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:[&.active]:bg-zink-600 -mb-[1px] active">View
                                                    All</a>
                                            </li>
                                            <li class="grow">
                                                <a href="javascript:void(0);" data-filter="mention"
                                                    class="inline-block nav-link px-1.5 w-full py-1 text-xs transition-all duration-300 ease-linear rounded-md text-slate-500 border border-transparent [&.active]:bg-white [&.active]:text-custom-500 hover:text-custom-500 active:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:[&.active]:bg-zink-600 -mb-[1px]">Mentions</a>
                                            </li>
                                            <li class="grow">
                                                <a href="javascript:void(0);" data-filter="follower"
                                                    class="inline-block nav-link px-1.5 w-full py-1 text-xs transition-all duration-300 ease-linear rounded-md text-slate-500 border border-transparent [&.active]:bg-white [&.active]:text-custom-500 hover:text-custom-500 active:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:[&.active]:bg-zink-600 -mb-[1px]">Followers</a>
                                            </li>
                                            <li class="grow">
                                                <a href="javascript:void(0);" data-filter="invite"
                                                    class="inline-block nav-link px-1.5 w-full py-1 text-xs transition-all duration-300 ease-linear rounded-md text-slate-500 border border-transparent [&.active]:bg-white [&.active]:text-custom-500 hover:text-custom-500 active:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:[&.active]:bg-zink-600 -mb-[1px]">Invites</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div data-simplebar class="max-h-[350px]">
                                        <div class="flex flex-col gap-1" id="notification-list">
                                            <a href="#!"
                                                class="flex gap-3 p-4 product-item hover:bg-slate-50 dark:hover:bg-zink-500 follower">
                                                <div class="w-10 h-10 rounded-md shrink-0 bg-slate-100">
                                                    <img src="./assets/images/avatar-3.png" alt="" class="rounded-md" />
                                                </div>
                                                <div class="grow">
                                                    <h6 class="mb-1 font-medium">
                                                        <b>@willie_passem</b> followed you
                                                    </h6>
                                                    <p class="mb-0 text-sm text-slate-500 dark:text-zink-300">
                                                        <i data-lucide="clock"
                                                            class="inline-block w-3.5 h-3.5 mr-1"></i>
                                                        <span class="align-middle">Wednesday 03:42 PM</span>
                                                    </p>
                                                </div>
                                                <div
                                                    class="flex items-center self-start gap-2 text-xs text-slate-500 shrink-0 dark:text-zink-300">
                                                    <div class="w-1.5 h-1.5 bg-custom-500 rounded-full"></div>
                                                    4 sec
                                                </div>
                                            </a>
                                            <a href="#!"
                                                class="flex gap-3 p-4 product-item hover:bg-slate-50 dark:hover:bg-zink-500 mention">
                                                <div class="w-10 h-10 bg-yellow-100 rounded-md shrink-0">
                                                    <img src="./assets/images/avatar-5.png" alt="" class="rounded-md" />
                                                </div>
                                                <div class="grow">
                                                    <h6 class="mb-1 font-medium">
                                                        <b>@caroline_jessica</b> commented on your post
                                                    </h6>
                                                    <p class="mb-3 text-sm text-slate-500 dark:text-zink-300">
                                                        <i data-lucide="clock"
                                                            class="inline-block w-3.5 h-3.5 mr-1"></i>
                                                        <span class="align-middle">Wednesday 03:42 PM</span>
                                                    </p>
                                                    <div
                                                        class="p-2 rounded bg-slate-100 text-slate-500 dark:bg-zink-500 dark:text-zink-300">
                                                        Amazing! Fast, to the point, professional and
                                                        really amazing to work with them!!!
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex items-center self-start gap-2 text-xs text-slate-500 shrink-0 dark:text-zink-300">
                                                    <div class="w-1.5 h-1.5 bg-custom-500 rounded-full"></div>
                                                    15 min
                                                </div>
                                            </a>
                                            <a href="#!"
                                                class="flex gap-3 p-4 product-item hover:bg-slate-50 dark:hover:bg-zink-500 invite">
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-md shrink-0">
                                                    <i data-lucide="shopping-bag"
                                                        class="w-5 h-5 text-red-500 fill-red-200"></i>
                                                </div>
                                                <div class="grow">
                                                    <h6 class="mb-1 font-medium">
                                                        Successfully purchased a business plan for
                                                        <span class="text-red-500">$199.99</span>
                                                    </h6>
                                                    <p class="mb-0 text-sm text-slate-500 dark:text-zink-300">
                                                        <i data-lucide="clock"
                                                            class="inline-block w-3.5 h-3.5 mr-1"></i>
                                                        <span class="align-middle">Monday 11:26 AM</span>
                                                    </p>
                                                </div>
                                                <div
                                                    class="flex items-center self-start gap-2 text-xs text-slate-500 shrink-0 dark:text-zink-300">
                                                    <div class="w-1.5 h-1.5 bg-custom-500 rounded-full"></div>
                                                    Yesterday
                                                </div>
                                            </a>
                                            <a href="#!"
                                                class="flex gap-3 p-4 product-item hover:bg-slate-50 dark:hover:bg-zink-500 mention">
                                                <div class="relative shrink-0">
                                                    <div class="w-10 h-10 bg-pink-100 rounded-md">
                                                        <img src="./assets/images/avatar-7.png" alt=""
                                                            class="rounded-md" />
                                                    </div>
                                                    <div
                                                        class="absolute text-orange-500 -bottom-0.5 -right-0.5 text-16">
                                                        <i class="ri-heart-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <h6 class="mb-1 font-medium">
                                                        <b>@scott</b> liked your post
                                                    </h6>
                                                    <p class="mb-0 text-sm text-slate-500 dark:text-zink-300">
                                                        <i data-lucide="clock"
                                                            class="inline-block w-3.5 h-3.5 mr-1"></i>
                                                        <span class="align-middle">Thursday 06:59 AM</span>
                                                    </p>
                                                </div>
                                                <div
                                                    class="flex items-center self-start gap-2 text-xs text-slate-500 shrink-0 dark:text-zink-300">
                                                    <div class="w-1.5 h-1.5 bg-custom-500 rounded-full"></div>
                                                    1 Week
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 p-4 border-t border-slate-200 dark:border-zink-500">
                                        <div class="grow">
                                            <a href="#!">Manage Notification</a>
                                        </div>
                                        <div class="shrink-0">
                                            <button type="button"
                                                class="px-2 py-1.5 text-xs text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
                                                View All Notification
                                                <i data-lucide="move-right" class="inline-block w-3.5 h-3.5 ml-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="relative items-center hidden h-header md:flex">
                                <button data-drawer-target="customizerButton" type="button"
                                    class="inline-flex justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar group-data-[topbar=dark]:text-topbar-item-dark rounded-md btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200">
                                    <i data-lucide="settings"
                                        class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                                </button>
                            </div> --}}

                            <div class="relative flex items-center dropdown h-header">
                                <button type="button"
                                    class="inline-block p-0 transition-all duration-200 ease-linear bg-topbar rounded-full text-topbar-item dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown">
                                    <div class="bg-pink-100 rounded-full">
                                        <img src="/assets/admin/images/admin.jpg" alt=""
                                            class="w-[37.5px] h-[37.5px] rounded-full" />
                                    </div>
                                </button>
                                <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[14rem] dark:bg-zink-600"
                                    aria-labelledby="dropdownMenuButton">
                                    <h6 class="mb-2 text-sm font-normal text-slate-500 dark:text-zink-300">
                                        Hello {{ Auth::user()->first_name }}
                                        {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}
                                    </h6>
                                    <a href="#!" class="flex gap-3 mb-3">
                                        <div class="relative inline-block shrink-0">
                                            <div class="rounded bg-slate-100 dark:bg-zink-500">
                                                <img src="/assets/admin/images/admin.jpg" alt=""
                                                    class="w-12 h-12 rounded" />
                                            </div>
                                            <span
                                                class="-top-1 ltr:-right-1 rtl:-left-1 absolute w-2.5 h-2.5 bg-green-400 border-2 border-white rounded-full dark:border-zink-600"></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 text-15">{{ Auth::user()->first_name }}
                                                {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}</h6>
                                            <p class="text-slate-500 dark:text-zink-300">
                                                @if (Auth::user()->role_type == 'superadmin')
                                                Super Administrator
                                                @elseif(Auth::user()->role_type == 'admin')
                                                Administrator
                                                @else
                                                User
                                                @endif
                                            </p>
                                        </div>
                                    </a>
                                    <ul>
                                        <li>
                                            <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500"
                                                href="#"><i data-lucide="user-2"
                                                    class="inline-block size-4 ltr:mr-2 rtl:ml-2">
                                                </i>
                                                Profile</a>
                                        </li>
                                        <li>
                                            <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500"
                                                href="apps-mailbox.html">
                                                <i class="fa fa-bolt inline-block size-4 ltr:mr-2 rtl:ml-2"></i>
                                                Activities
                                                {{-- <span class="inline-flex items-center justify-center
                                                     w-5 h-5 ltr:ml-2 rtl:mr-2 text-[11px] font-medium
                                                     border rounded-full text-white bg-red-500
                                                      border-red-500">15</span> --}}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500"
                                                href="apps-chat.html">
                                                <i class="fa fa-cog inline-block size-4 ltr:mr-2 rtl:ml-2">
                                                </i>
                                                Settings</a>
                                        </li>

                                        <li class="pt-2 mt-2 border-t border-slate-200 dark:border-zink-500">
                                            <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500"
                                                href="{{ route('logout') }}"><i data-lucide="log-out"
                                                    class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i>
                                                Sign Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
            {{-- main containt --}}
            @yield('content')
            {{-- main containt end --}}
            <footer style="position: absolute; bottom: 0;"
                class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0 group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
                <div
                    class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
                    <div
                        class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                        <div>
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            © CRM.
                        </div>
                        <div class="hidden lg:block">
                            <div class="ltr:text-right rtl:text-left">
                                Design & Develop by <a href="">Riz Software Consultancy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- end main content -->

    <div class="fixed items-center hidden bottom-6 right-12 h-header group-data-[navbar=hidden]:flex">
        <button data-drawer-target="customizerButton" type="button"
            class="inline-flex items-center justify-center w-12 h-12 p-0 transition-all duration-200 ease-linear rounded-md shadow-lg text-sky-50 bg-sky-500">
            <i data-lucide="settings" class="inline-block w-5 h-5"></i>
        </button>
    </div>
    {{-- setting-panel-header --}}
    <div id="customizerButton" drawer-end
        class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow ltr:right-0 rtl:left-0 md:w-96 z-drawer show dark:bg-zink-600">
        <div class="flex justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <div class="grow">
                <h5 class="mb-1 text-16">Tailwick Theme Customizer</h5>
                <p class="font-normal text-slate-500 dark:text-zink-200">
                    Choose your themes & layouts etc.
                </p>
            </div>
            <div class="shrink-0">
                <button data-drawer-close="customizerButton"
                    class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800 dark:text-zink-200 dark:hover:text-zink-50">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
        <div class="h-full p-6 overflow-y-auto">
            <div>
                <h5 class="mb-3 underline capitalize text-15">Choose Layouts</h5>
                <div class="grid grid-cols-1 mb-5 gap-7 sm:grid-cols-2">
                    <div class="relative">
                        <input id="layout-one" name="dataLayout"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="vertical" checked />
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                            for="layout-one">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span
                                        class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                        <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex flex-col h-full">
                                        <span class="block h-3 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block h-3 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Vertical</h5>
                    </div>

                    <div class="relative">
                        <input id="layout-two" name="dataLayout"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="horizontal" />
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                            for="layout-two">
                            <span class="flex flex-col h-full gap-1">
                                <span class="flex items-center gap-1 p-1 bg-slate-100 dark:bg-zink-500">
                                    <span class="block p-1 ml-1 bg-white rounded dark:bg-zink-500"></span>
                                    <span class="block p-1 px-2 pb-0 bg-white dark:bg-zink-500 ms-auto"></span>
                                    <span class="block p-1 px-2 pb-0 bg-white dark:bg-zink-500"></span>
                                </span>
                                <span class="block p-1 bg-slate-100 dark:bg-zink-500"></span>
                                <span class="block p-1 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Horizontal</h5>
                    </div>
                </div>

                <div id="semi-dark">
                    <div class="flex items-center">
                        <div class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in">
                            <input type="checkbox" name="customDefaultSwitch" value="dark" id="customDefaultSwitch"
                                class="absolute block w-5 h-5 transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer border-slate-200 bg-white/80 peer/published checked:bg-white checked:right-0 checked:border-custom-500 arrow-none dark:border-zink-500 dark:bg-zink-500 dark:checked:bg-zink-400 checked:bg-none" />
                            <label for="customDefaultSwitch"
                                class="block h-5 overflow-hidden transition duration-300 ease-linear border rounded-full cursor-pointer border-slate-200 bg-slate-200 peer-checked/published:bg-custom-500 peer-checked/published:border-custom-500 dark:border-zink-500 dark:bg-zink-600"></label>
                        </div>
                        <label for="customDefaultSwitch" class="inline-block text-base font-medium">Semi Dark
                            (Sidebar & Header)</label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-skin="" -->
                <h5 class="mb-3 underline capitalize text-15">Skin Layouts</h5>
                <div class="grid grid-cols-1 mb-5 gap-7 sm:grid-cols-2">
                    <div class="relative">
                        <input id="layoutSkitOne" name="dataLayoutSkin"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="default" />
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500 bg-slate-50 dark:bg-zink-600"
                            for="layoutSkitOne">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span
                                        class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                        <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex flex-col h-full">
                                        <span class="block h-3 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block h-3 mt-auto bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Default</h5>
                    </div>


                    <div class="relative">
                        <input id="layoutSkitTwo" name="dataLayoutSkin"
                            class="absolute w-4 h-4 border rounded-full appearance-none cursor-pointer ltr:right-2 rtl:left-2 top-2 vertical-menu-btn bg-slate-100 border-slate-300 checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500"
                            type="radio" value="bordered" checked />
                        <label
                            class="block w-full h-24 p-0 overflow-hidden border rounded-lg cursor-pointer border-slate-200 dark:border-zink-500"
                            for="layoutSkitTwo">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span
                                        class="flex flex-col h-full gap-1 p-1 ltr:border-r rtl:border-l border-slate-200 dark:border-zink-500">
                                        <span class="block p-1 px-2 mb-2 rounded bg-slate-100 dark:bg-zink-400"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                        <span class="block p-1 px-2 pb-0 bg-slate-100 dark:bg-zink-500"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex flex-col h-full">
                                        <span class="block h-3 border-b border-slate-200 dark:border-zink-500"></span>
                                        <span
                                            class="block h-3 mt-auto border-t border-slate-200 dark:border-zink-500"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="mt-2 text-center text-15">Bordered</h5>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-mode="" -->
                <h5 class="mb-3 underline capitalize text-15">Light & Dark</h5>
                <div class="flex gap-3">
                    <button type="button" id="dataModeOne" name="dataMode" value="light"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">
                        Light Mode
                    </button>
                    <button type="button" id="dataModeTwo" name="dataMode" value="dark"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Dark Mode
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <!-- dir="ltr" -->
                <h5 class="mb-3 underline capitalize text-15">LTR & RTL</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="diractionOne" name="dir" value="ltr"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">
                        LTR Mode
                    </button>
                    <button type="button" id="diractionTwo" name="dir" value="rtl"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        RTL Mode
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-content -->
                <h5 class="mb-3 underline capitalize text-15">Content Width</h5>
                <div class="flex gap-3">
                    <button type="button" id="datawidthOne" name="datawidth" value="fluid"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">
                        Fluid
                    </button>
                    <button type="button" id="datawidthTwo" name="datawidth" value="boxed"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Boxed
                    </button>
                </div>
            </div>

            <div class="mt-6" id="sidebar-size">
                <!-- data-sidebar-size="" -->
                <h5 class="mb-3 underline capitalize text-15">Sidebar Size</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="sidebarSizeOne" name="sidebarSize" value="lg"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">
                        Default
                    </button>
                    <button type="button" id="sidebarSizeTwo" name="sidebarSize" value="md"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Compact
                    </button>
                    <button type="button" id="sidebarSizeThree" name="sidebarSize" value="sm"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Small (Icon)
                    </button>
                </div>
            </div>

            <div class="mt-6" id="navigation-type">
                <!-- data-navbar="" -->
                <h5 class="mb-3 underline capitalize text-15">Navigation Type</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="navbarTwo" name="navbar" value="sticky"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active">
                        Sticky
                    </button>
                    <button type="button" id="navbarOne" name="navbar" value="scroll"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Scroll
                    </button>
                    <button type="button" id="navbarThree" name="navbar" value="bordered"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Bordered
                    </button>
                    <button type="button" id="navbarFour" name="navbar" value="hidden"
                        class="transition-all duration-200 ease-linear bg-white border-dashed text-slate-500 btn border-slate-200 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-200 [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500">
                        Hidden
                    </button>
                </div>
            </div>

            <div class="mt-6" id="sidebar-color">
                <!-- data-sidebar="" light, dark, brand, modern-->
                <h5 class="mb-3 underline capitalize text-15">Sizebar Colors</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="sidebarColorOne" name="sidebarColor" value="light"
                        class="flex items-center justify-center w-10 h-10 bg-white border rounded-md border-slate-200 group active">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-slate-600"></i>
                    </button>
                    <button type="button" id="sidebarColorTwo" name="sidebarColor" value="dark"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-zink-900 bg-zink-900 group">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i>
                    </button>
                    <button type="button" id="sidebarColorThree" name="sidebarColor" value="brand"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-custom-800 bg-custom-800 group">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i>
                    </button>
                    <button type="button" id="sidebarColorFour" name="sidebarColor" value="modern"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-purple-950 bg-gradient-to-t from-red-400 to-purple-500 group">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i>
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-topbar="" light, dark, brand, modern-->
                <h5 class="mb-3 underline capitalize text-15">Topbar Colors</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="topbarColorOne" name="topbarColor" value="light"
                        class="flex items-center justify-center w-10 h-10 bg-white border rounded-md border-slate-200 group active">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-slate-600"></i>
                    </button>
                    <button type="button" id="topbarColorTwo" name="topbarColor" value="dark"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-zink-900 bg-zink-900 group">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i>
                    </button>
                    <button type="button" id="topbarColorThree" name="topbarColor" value="brand"
                        class="flex items-center justify-center w-10 h-10 border rounded-md border-custom-800 bg-custom-800 group">
                        <i data-lucide="check" class="w-5 h-5 hidden group-[.active]:inline-block text-white"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between gap-3 p-4 border-t border-slate-200 dark:border-zink-500">
            <button type="button" id="reset-layout"
                class="w-full transition-all duration-200 ease-linear text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100">
                Reset
            </button>
            <a href="#!"
                class="w-full text-white transition-all duration-200 ease-linear bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100">Buy
                Now</a>
        </div>
    </div>

    {{-- tailwick --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/lucide/umd/lucide.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tailwick.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
    <script src="{{ asset('assets/admin/js/pages/dashboards-ecommerce.init.js') }}"></script>
    <script src={{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}></script>

    <script src="{{ asset('assets/admin/js/datatables/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/data-tables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/data-tables.tailwindcss.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/read-smore/index.umd.js') }}"></script>
    <script src="{{ asset('assets/admin/pages/apps-notes.init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/common.js') }}"></script>

    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    {{-- tailwick end --}}

    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> --}}
    <!-- General JS Scripts -->
    {{-- <script src="{{ asset('assets/admin/OldAssets/bundles/datatables/datatables.min.js') }}"></script> --}}

    {{-- <script
        src="{{ asset('assets/admin/OldAssets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script> --}}
    {{-- <script src="{{ asset('assets/admin/OldAssets/bundles/jquery-ui/jquery-ui.min.js') }}"></script> --}}
    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/admin/OldAssets/js/page/d    atatables.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/OldAssets/js/app.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/OldAssets/bundles/summernote/summernote-bs4.js') }}"></script> --}}
    <!-- JS Libraies -->
    {{-- <script src="{{ asset('assets/admin/OldAssets/bundles/apexcharts/apexcharts.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/OldAssets/bundles/select2/dist/js/select2.full.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/OldAssets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    --}}
    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/admin/OldAssets/js/page/index.js') }}"></script> --}}
    <!-- Template JS File -->
    {{-- <script src="{{ asset('assets/admin/OldAssets/js/scripts.js') }}"></script> --}}
    <!-- Custom JS File -->
    {{-- <script src="{{ asset('assets/admin/OldAssets/OldAssets/js/custom.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/OldAssets/js/jquery.textareaCounter.plugin.js') }}"></script> --}}
    <!-- Cropring Iamges -->
    {{-- <script type="text/javascript"
        src="{{ asset('assets/admin/OldAssets/croperimgages/scripts/jquery.Jcrop.js') }}"></script> --}}
    {{-- <script type="text/javascript"
        src="{{ asset('assets/admin/OldAssets/croperimgages/scripts/jquery.SimpleCropper.js') }} ">
    </script> --}}
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
                method: 'HEAD',
                mode: 'no-cors'
            })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!-- End Cropring Iamges -->

    @yield('scripts')
</body>

</html>
