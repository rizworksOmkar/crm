@extends('layouts.adminlogin-layout')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
@section('styles')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="#" class="needs-validation" novalidate=""> --}}
                        <form id="login_form" autocomplete="off" action="/login" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="email">User Name</label>
                                <input id="email" type="text" class="form-control" name="email" tabindex="1">
                                <div class="invalid-feedback" id="invalid-feedback-email">
                                    Please fill in your User Name
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    {{-- <div class="float-right">
                                        <a href="auth-forgot-password.html" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="pass-icon">
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2">
                                    <i class="fa fa-eye" aria-hidden="true" id="toggle-password" toggle="#password"></i>
                                </div>
                                <div class="invalid-feedback" id="invalid-feedback-pass">
                                    please fill in your password
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"
                                    id="loginbutton">
                                    Login
                                </button>
                            </div>
                        </form>
                        {{-- <div class="text-center mt-4 mb-3">
                            <div class="text-job text-muted">Login With Social</div>
                        </div>
                        <div class="row sm-gutters">
                            <div class="col-6">
                                <a class="btn btn-block btn-social btn-facebook">
                                    <span class="fab fa-facebook"></span> Facebook
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block btn-social btn-twitter">
                                    <span class="fab fa-twitter"></span> Twitter
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="auth-register.html">Create One</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // $('#invalid-feedback-email').hide();
            var email = $("#email").val();
            var password = $("#password").val();
            $('#email').keyup(function() {

                if ($('#email').val() != "") {
                    $('#email').removeClass('error_input');
                    $('#invalid-feedback-email').hide();
                } else {
                    $('#email').addClass('error_input');
                    $('#invalid-feedback-email').show();
                }
            });
            $('#password').keyup(function() {
                if ($('#password').val() != "") {
                    $('#password').removeClass('error_input');
                    $('#invalid-feedback-pass').hide();
                } else {
                    $('#password').addClass('error_input');
                    $('#invalid-feedback-pass').show();
                }
            });
            $("#loginbutton").click(function(e) {
                e.preventDefault();

                var email = $("#email").val();
                var password = $("#password").val();
                const re = /^[a-zA-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
                var emailValid = re.test(String(email).toLowerCase());
                if (!email && !password) {
                    // toastrerr();
                    // toastr.error("Please enter email and password", "");
                    iziToast.error({
                        title: 'Error!',
                        message: 'Please enter username and password',
                        position: 'topRight'
                    });
                    $('#email').addClass('error_input');
                    $('#password').addClass('error_input');
                    return false;
                }
                // if (!email.trim()) {
                //     // toastrerr();
                //     // toastr.error('Please enter your email', '');
                //     iziToast.error({
                //         title: 'Error!',
                //         message: 'Please enter your email',
                //         position: 'topRight'
                //     });
                //     $('#email').addClass('error_input');
                //     return false;
                // }
                // if (!emailValid) {
                //     // toastrerr();
                //     // toastr.error("Please enter proper email");
                //     iziToast.error({
                //         title: 'Error!',
                //         message: 'Please enter proper email',
                //         position: 'topRight'
                //     });
                //     $('#email').addClass('error_input');
                //     return false;
                // }
                if (!password.trim()) {
                    // toastrerr();
                    // toastr.error("Please enter password");
                    iziToast.error({
                        title: 'Error!',
                        message: 'Please enter password',
                        position: 'topRight'
                    });
                    $('#password').addClass('error_input');
                    return false;
                } else {
                    // var loginform = $("#login_form").val();
                    $.ajax({
                        type: "POST",
                        url: '/admin-check-email-password',
                        data: {
                            email: email,
                            password: password,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success == true) {
                                $('#login_form').submit();
                            } else {
                                // toastrerr();
                                // toastr.error(
                                //     'These credentials aren\'t in our system. Please try again',
                                //     '');
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'These credentials aren\'t in our system. Please try again',
                                    position: 'topRight'
                                });
                                if (response.message == 'email-error') {
                                    $('#email').addClass('error_input');
                                } else {
                                    $('#password').addClass('error_input');
                                }
                            }
                        }
                    });
                }

            });

            $("#toggle-password").click(function() {
                
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
               
                if (input.attr("type") == "password") {
                    
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
@endsection
