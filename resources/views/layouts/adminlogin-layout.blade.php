<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>CRM</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/izitoast/css/iziToast.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/admin/img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tailwind2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            @yield('content')
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/admin/bundles/izitoast/js/iziToast.min.js') }}"></script>

    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>

    {{-- tailwick --}}

    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/lucide/umd/lucide.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tailwick.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
    <script src="{{ asset('assets/admin/js/pages/dashboards-ecommerce.init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/auth-login.init.js') }}"></script>

    {{-- tailwick end --}}
    @yield('scripts')
</body>

</html>
