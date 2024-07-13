<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title : 'TRAVORIZ' }}</title>

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}" />
</head>

<body>
    <section id="welcome_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h1 class="wlcm_kit">WELCOME TO TRAVORIZ</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="wlcm_text">
        <div class="container">
            <div class="row">
                <h4>You have not create any Company Profile.</h4>
                <h5> Please create your Company Profile by using User Id and
                    Password, which is given by travoriz support team.</h5>
                <p>Thank You</p>
                <div class="wlcm_glin">
                    @if (Auth::check())
                        <a class="btn  btn_theme rolltype3" href="javascript:void(0)" rolltype3={{ Auth::User()->role_type }} >Go to Admin DashBoard</a>
                    @else
                        <a class="btn  btn_theme " href="{{ route('admin.home') }}">Click To Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="footer_box">
        <p>Design And Developed by riz software consultancy.</p>
    </div>

    <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".rolltype3").click(function() {

                var rolltype = $(this).attr('rolltype3');
                
                if (rolltype == 'admin') {
                    window.location.replace("/admin-company");
                } else {
                    alert("You are not Administrator");
                }
            });
        });
    </script>
</body>

</html>
