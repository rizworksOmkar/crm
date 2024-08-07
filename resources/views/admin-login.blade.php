@extends('layouts.adminlogin-layout')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
@section('styles')
@endsection
@section('content')
    <div
        class="flex items-center justify-center min-h-screen py-16 lg:py-10 bg-slate-50 dark:bg-zink-800 dark:text-zink-100 font-public">
        <div class="relative">
            <div class="mb-0 w-screen lg:mx-auto lg:w-[500px] card shadow-lg border-none shadow-slate-100 relative">
                <div class="!px-10 !py-12 card-body">
                    {{-- <a href="#!">
                        <img src="./assets/images/logo-light.png" alt="" class="hidden h-6 mx-auto dark:block">
                        <img src="./assets/images/logo-dark.png" alt="" class="block h-6 mx-auto dark:hidden">
                    </a> --}}

                    <div class="mt-8 text-center">
                        <h4 class="mb-1 text-custom-500 dark:text-custom-500">CRM Login</h4>
                        {{-- <p class="text-slate-500 dark:text-zink-200">Sign in to continue to CRM.</p> --}}
                    </div>

                    <form class="mt-10" id="login_form" autocomplete="off" action="/login" method="post">
                        @csrf
                        {{-- <div class="hidden px-4 py-3 mb-3 text-sm text-green-500 border border-green-200 rounded-md bg-green-50 dark:bg-green-400/20 dark:border-green-500/50"
                            id="successAlert">
                            You have <b>successfully</b> signed in.
                        </div> --}}
                        <div class="mb-3">
                            <label for="email" class="inline-block mb-2 
                            text-base font-medium">User Name</label>
                            <input id="email" type="text" name="email" tabindex="1"
                                class="form-input border-slate-200 dark:border-zink-500
                                 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter username or email">
                            <div id="invalid-feedback-email" class="hidden mt-1 text-sm text-red-500">Please fill in your
                                User Name</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="inline-block mb-2 text-base
                             font-medium">Password</label>
                            <input type="password" id="password"
                                class="form-input border-slate-200
                                 dark:border-zink-500 focus:outline-none 
                                 focus:border-custom-500 disabled:bg-slate-100 
                                 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                 dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                 dark:focus:border-custom-800 placeholder:text-slate-400 
                                 dark:placeholder:text-zink-200"
                                placeholder="Enter password" name="password" tabindex="2">
                            <div id="invalid-feedback-pass" class="hidden mt-1 text-sm text-red-500">Password must be at least 8
                                please fill in your password</div>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <input id="remember-me"
                                 name="remember" tabindex="3"
                                    class="border rounded-sm appearance-none size-4 
                                    bg-slate-100 border-slate-200 dark:bg-zink-600 
                                    dark:border-zink-500 checked:bg-custom-500 
                                    checked:border-custom-500 dark:checked:bg-custom-500
                                     dark:checked:border-custom-500 checked:disabled:bg-custom-400 
                                     checked:disabled:border-custom-400"
                                    type="checkbox" value="">
                                <label for="remember-me"
                                    class="inline-block text-base font-medium 
                                    align-middle cursor-pointer">Remember
                                    me</label>
                            </div>
                            {{-- <div id="remember-error" class="hidden mt-1 text-sm text-red-500">Please check the "Remember me"
                                before submitting the form.</div> --}}
                        </div>
                        <div class="mt-10">
                            <button type="submit" id="loginbutton" tabindex="4"
                                class="w-full text-white btn bg-custom-500 
                                border-custom-500 hover:text-white 
                                hover:bg-custom-600 hover:border-custom-600 
                                focus:text-white focus:bg-custom-600 
                                focus:border-custom-600 focus:ring 
                                focus:ring-custom-100 active:text-white 
                                active:bg-custom-600 active:border-custom-600 
                                active:ring active:ring-custom-100 
                                dark:ring-custom-400/20">Login</button>
                        </div>

                        <div
                            class="relative text-center my-9 before:absolute before:top-3 before:left-0 before:right-0 before:border-t before:border-t-slate-200 dark:before:border-t-zink-500">
                            <h5
                                class="inline-block px-2 py-0.5 text-sm bg-white text-slate-500 dark:bg-zink-600 dark:text-zink-200 rounded relative">
                                Sign In with</h5>
                        </div>

                        <div class="flex flex-wrap justify-center gap-2">
                            <button type="button"
                                class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 active:text-white active:bg-custom-600 active:border-custom-600"><i
                                    data-lucide="facebook" class="size-4"></i></button>
                            <button type="button"
                                class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-orange-500 border-orange-500 hover:text-white hover:bg-orange-600 hover:border-orange-600 focus:text-white focus:bg-orange-600 focus:border-orange-600 active:text-white active:bg-orange-600 active:border-orange-600"><i
                                    data-lucide="mail" class="size-4"></i></button>
                            <button type="button"
                                class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-sky-500 border-sky-500 hover:text-white hover:bg-sky-600 hover:border-sky-600 focus:text-white focus:bg-sky-600 focus:border-sky-600 active:text-white active:bg-sky-600 active:border-sky-600"><i
                                    data-lucide="twitter" class="size-4"></i></button>
                            <button type="button"
                                class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 active:text-white active:bg-slate-600 active:border-slate-600"><i
                                    data-lucide="github" class="size-4"></i></button>
                        </div>

                        <div class="mt-10 text-center">
                            <p class="mb-0 text-slate-500 dark:text-zink-200">Don't have an account ? <a
                                    href="auth-register-basic.html"
                                    class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">
                                    SignUp</a> </p>
                        </div>
                    </form>
                </div>
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
