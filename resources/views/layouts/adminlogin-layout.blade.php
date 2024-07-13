<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tour & Travel Admin</title>
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
    @yield('scripts')
</body>

</html>
