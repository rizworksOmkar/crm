@extends('layouts.front')

@section('content')
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Login</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="common_author_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="common_author_boxed">
                        <div class="common_author_heading">
                            <h3>Login your account</h3>
                            <h2>Logged in to stay in touch</h2>
                        </div>
                        <div class="common_author_form">
                            <form autocomplete="off" action="/login" method="post" id="userRegister">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Enter Email Id" />
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" />
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="common_form_submit">
                                    <button class="btn btn_theme btn_md" id="loginbutton">Log in</button>
                                </div>
                                <div class="have_acount_area">
                                    <p>Dont have an account? <a href="{{route('user.register')}}">Register now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
         @if (session('status'))
            toastrerr();
            toastr.success("{{ session('status') }}");
        @endif
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
                    toastrerr();
                    toastr.error("Please enter email and password", "");
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter email and password',
                    //     position: 'topRight'
                    // });
                    $('#email').addClass('error_input');
                    $('#password').addClass('error_input');
                    return false;
                }
                if (!email.trim()) {
                    toastrerr();
                    toastr.error('Please enter your email', '');
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter your email',
                    //     position: 'topRight'
                    // });
                    $('#email').addClass('error_input');
                    return false;
                }
                if (!emailValid) {
                    toastrerr();
                    toastr.error("Please enter proper email");
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter proper email',
                    //     position: 'topRight'
                    // });
                    $('#email').addClass('error_input');
                    return false;
                }
                if (!password.trim()) {
                    toastrerr();
                    toastr.error("Please enter password");
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter password',
                    //     position: 'topRight'
                    // });
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
                                $('#userRegister').submit();
                            } else {
                                toastrerr();
                                toastr.error(
                                    'These credentials aren\'t in our system. Please try again',
                                    '');
                                // iziToast.error({
                                //     title: 'Error!',
                                //     message: 'These credentials aren\'t in our system. Please try again',
                                //     position: 'topRight'
                                // });
                                if (response.message == 'email-error') {
                                    $('#email').addClass('error_input');
                                    toastrerr();
                                    toastr.error(
                                        'Your Email-id Not Matched',
                                        '');
                                } else {
                                    $('#password').addClass('error_input');
                                    toastrerr();
                                    toastr.error(
                                        'Your Password Not Matched',
                                        '');
                                }
                            }
                        }
                    });
                }

            });
        });
    </script>
@endsection
