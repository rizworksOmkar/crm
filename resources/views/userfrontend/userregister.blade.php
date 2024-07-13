@extends('layouts.layout_registration')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Register</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Common Author Area -->
    <section id="common_author_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="common_author_boxed">
                        <div class="common_author_heading">
                            <h3>Register account</h3>
                            <h2>Register your account</h2>
                        </div>
                        <div class="common_author_form">
                            <form id="userRegister">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter first name*"
                                        name="f_name" id="f_name" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Middle name (Optional)"
                                        name="m_name" id="m_name" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter last name*" name="l_name"
                                        id="l_name" />
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mobile number"
                                        id="phonenumber" name="phonenumber" />
                                </div>
                                {{-- <div class="form-group">
                                    <input type="text" class="form-control" placeholder="User name*" />
                                </div> --}}
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Your email address *" />
                                </div>
                                <div class="form-group pass-icon">
                                    <input type="password" class="form-control" placeholder="Password *" name="password"
                                        id="password" />
                                        <i class="fa fa-eye" aria-hidden="true" id="toggle-password" toggle="#password"></i>
                                </div>
                                <div class="form-group pass-icon">
                                    <input type="password" class="form-control" placeholder="Confirm Password *"
                                        name="txtconPass" id="txtconPass" />
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                </div>
                                <div class="common_form_submit">
                                    <button class="btn btn_theme btn_md" id="create-user">Register</button>
                                </div>
                                <div class="have_acount_area other_author_option">
                                    <div class="line_or">
                                        <span>or</span>
                                    </div>
                                    <ul>
                                        <li><a href="#!"><img src="assets/user/img/icon/google.png" alt="icon"></a>
                                        </li>
                                        <li><a href="#!"><img src="assets/user/img/icon/facebook.png"
                                                    alt="icon"></a></li>
                                        {{-- <li><a href="#!"><img src="assets/user/img/icon/twitter.png" alt="icon"></a></li> --}}
                                    </ul>
                                    <p>Already have an account? Go to Home Page &amp; Log in now</p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--End Main Content -->
<script src="{{ asset('assets/admin/bundles/sweetalert/sweetalert.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/admin/js/page/sweetalert.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script>
        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }
        $("#create-user").click(function(e) {
            e.preventDefault();
            var firstname = $("#f_name").val();
            var lastname = $("#l_name").val();
            var mobNumber = $("#phonenumber").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var conPass = $("#txtconPass").val();
            if (firstname == "") {

                alert("Please input First name", "");
                return false;
            } else if (lastname == "") {

                alert("Please input Last name", "");
                return false;
            } else if (mobNumber == "") {

                alert("Kindly input your phone number", "");
                return false;
            } else if (email == "") {

                alert("Kindly imput your email", "");
                return false;
            } else if (IsEmail(email) == false) {

                alert("Kindly imput valied your email", "");
                return false;
            } else if (password == "") {

                alert("Kindly imput password", "");
                return false;
            } else if (conPass == "") {

                alert("Kindly imput confirm password", "");
                return false;
            } else if (password != conPass) {

                alert("Password and confirm password is not match", "");
                return false;
            } else {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/user-registration-check",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "mobNumber": mobNumber,
                        "email": email
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.message == 'success') {
                            var myform = document.getElementById("userRegister");
                            var fd = new FormData(myform);
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: "/user-registration-save",
                                data: fd,
                                cache: false,
                                processData: false,
                                contentType: false,
                                type: "POST",
                                success: function(response) {
                                    //console.log(response);
                                    //alert(response);
                                    // toastrsucc();
                                    // toastr.success("Book created Successfully", "");
                                    if (response.message = 'success') {
                                        //window.location.replace("/verification-user");
                                        swal({
                                            icon: "success",
                                            text: "Register Successfully",
                                        }).then((willconfirm) => {
                                            if (willconfirm) {
                                                return false;
                                            }
                                        });
                                    } else {
                                        swal({
                                            icon: "error",
                                            text: "Not Register",
                                        }).then((willconfirm) => {
                                            if (willconfirm) {
                                                return false;
                                            }
                                        });
                                    }

                                },
                            });
                        } else {
                            swal({
                                icon: "error",
                                text: " Email-id and Phone number are already exist",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    return false;
                                }
                            });
                        }
                    },
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
    </script>
@endsection
