<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TravelHostOnline-Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/travel-logo.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .pymnt_icon {
            text-align: center
        }

        .pymnt_icon i {
            font-size: 50px;
            margin-bottom: 15px;
            color: rgb(128, 0, 0);
        }
        
    </style>
</head>

<body>
    <div class="content">

        <div class="col d-flex justify-content-center m-5">

            <div class="card" style="width: 30rem; box-shadow: 0 0 10px #a7a7a7;">

                <div class="card-body text-center">
                    <div class="pymnt_icon">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                    <h5 class="card-title">Payment Failed</h5>
                    <p class="card-text">Your payment is failed </p>
                    {{-- <p class="card-text">A verification mail send to your registered email-id </p> --}}
                    <a href="/user/dashboard" class="btn btn-primary">Main Page</a>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $(".rolltype").click(function() {

                var rolltype = $(this).attr('rolltype');
                //alert(rolltype);
                if (rolltype == 'admin') {
                    window.location.replace("/landing-page");
                } else {
                    window.location.replace("/user/dashboard");
                }
            });
        });
    </script> --}}
</body>

</html>

{{-- @extends('layouts.user-dashboard-layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="dashboard_common_table">
    <div class="col d-flex justify-content-center m-5">

        <div class="card" style="width: 18rem;">
          
            <div class="card-body">
                <h5 class="card-title">Payment Success</h5>
                <p class="card-text">Your payment is successfull</p>
               
                <a href="/user/dashboard" class="btn btn-primary">Main Page</a>
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
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    
@endsection --}}
