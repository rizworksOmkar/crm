@extends('layouts.admin-front')
@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md
 group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm
   pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)]
   group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0
    group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto
     group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 
     group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)] pt-20">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Create Employee</h6>
                    <form id="add_employee_form">
                        {{ csrf_field() }}
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-4">
                            <div class="mb-4">
                                <label for="empFirstname"
                                    class="inline-block mb-2 text-base
                              font-medium">First Name
                                    <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="form-input border-slate-200
                                           dark:border-zink-500 focus:outline-none 
                                           focus:border-custom-500 disabled:bg-slate-100 
                                           dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                            placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="empFirstname" name="empFirstname" placeholder="Enter First Name" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="empMidName" class="inline-block mb-2 text-base font-medium">
                                    Middle Name
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="form-input border-slate-200
                                         dark:border-zink-500 focus:outline-none 
                                         focus:border-custom-500 disabled:bg-slate-100 
                                         dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                          placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="empMidName" name="empMidName" placeholder="Enter Middle Name" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="empLastName" class="inline-block mb-2 text-base font-medium">
                                    Last Name
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500
                                     focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                      dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                                     dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 
                                     dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 
                                     dark:placeholder:text-zink-200"
                                    id="empLastName" name="empLastName" placeholder="Enter Last Name" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="empEmailid" class="inline-block mb-2 text-base font-medium">
                                    Email Id
                                    <span class="text-red-500">*</span></label>
                                <input type="email"
                                    class="form-input border-slate-200 dark:border-zink-500
                                     focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                      dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                                     dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 
                                     dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 
                                     dark:placeholder:text-zink-200"
                                    id="empEmailid" name="empEmailid" placeholder="Enter Email Id">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            <div class="mb-4">
                                <label for="empPhoneno" class="inline-block mb-2 text-base font-medium">Customer
                                    Phone Number
                                    <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none
                                     focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 
                                     disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                      disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                      placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="empPhoneno" name="empPhoneno" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="mb-4 mt_40">
                                <input type="checkbox" id="chkWhatsaappcheck" name="chkWhatsaappcheck" value="1">
                                <label for="description" class="inline-block mb-2 text-base font-medium">
                                    Check if same phone number is whatsapp number.
                                </label>
                            </div>
                            <div class="mb-4">
                                <label for="empWhatsAppno" class="inline-block mb-2 text-base font-medium">
                                    WhatsAPP Number
                                </label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 
                                    focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
                                    dark:disabled:bg-zink-600 disabled:border-slate-300 
                                    dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                    disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                    dark:focus:border-custom-800
                                     placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="empWhatsAppno" name="empWhatsAppno" placeholder="Enter WhatsAPP Number" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                            <div class="card-header p-0 mb-4">
                                <h6>Create Credetial</h6>
                            </div>
                            {{-- <div class="mb-4">
                                <label for="stateInput"
                                    class="inline-block mb-2 text-base font-medium">Property
                                    Type<span class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="property_type" name="property_type" required>
                                        <option value="aaaa">
                                            rrrrrr
                                        </option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-4">
                            <div class="mb-4">
                                <label for="empUserName"
                                    class="inline-block mb-2
                         text-base font-medium">User
                                    Name</label>
                                <input type="text" id="min_budget" name="min_budget"
                                    class="form-input border-slate-200 dark:border-zink-500 
                                    focus:outline-none focus:border-custom-500 
                                    disabled:bg-slate-100 dark:disabled:bg-zink-600 
                                    disabled:border-slate-300 dark:disabled:border-zink-500
                                     dark:disabled:text-zink-200 disabled:text-slate-500 
                                     dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                      placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="empUserName" name="empUserName" placeholder="Enter User Name" required>
                                <span class="mt-1 text-xs text-slate-500 dark:text-zink-200"
                                    id="username-availability"></span>
                            </div>
                            <div class="mb-4">
                                <label for="empPassword" class="inline-block mb-2 text-base font-medium">
                                    Password</label>
                                <input type="password" id="max_budget" name="max_budget"
                                    class="form-input border-slate-200 dark:border-zink-500 
                                    focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                     dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 
                                     dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 
                                     dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 
                                     dark:placeholder:text-zink-200"
                                    id="empPassword" name="empPassword" placeholder="Type Password">
                            </div>
                            <div class="mb-4">
                                <label for="empConPassword" class="inline-block mb-2 text-base font-medium">
                                    Confirm Password
                                </label>
                                <input type="password" id="empConPassword" name="empConPassword"
                                    placeholder="Enter Middle Name"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="emptype" class="inline-block mb-2 text-base font-medium">
                                    Employee Type
                                </label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="emptype" name="emptype" required>
                                    <option value="0">Choose...</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-800 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                         active:border-custom-600 active:ring active:ring-custom-100">Create</button>
                            <a href="/employee"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                         active:border-custom-600 active:ring active:ring-custom-100">Back
                                To Main Menu</a>
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
            const usernameInput = $('#empUserName');
            const usernameAvailability = $('#username-availability');

            usernameInput.blur(function() {
                const username = usernameInput.val().trim();

                if (username.length >= 3) {
                    $.ajax({
                        url: `/check-username/${username}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            usernameAvailability.text(data.available ? 'Username Available' :
                                'Username Unavailable');
                            usernameAvailability.addClass(data.available ? 'text-success' :
                                'text-danger');
                        },
                        error: function(error) {
                            console.error('Error checking username:', error);
                            usernameAvailability.text('Error checking availability.');
                            usernameAvailability.addClass('text-danger');
                        }
                    });
                } else {
                    usernameAvailability.text('');
                    usernameAvailability.removeClass('text-success', 'text-danger');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#chkWhatsaappcheck').change(function() {
                var phonenumber = $("#empPhoneno").val();
                if ($(this).is(":checked")) {
                    $("#empWhatsAppno").val(phonenumber);
                } else {
                    $("#empWhatsAppno").val(" ");
                }

            });
            $('#add_employee_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-employee-store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Data Updated Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    swal({
                                            title: "Do you want Create more Employee?",
                                            //text: "Once deleted, you will never get this CITY back. It will have to be rebuilt a new ",
                                            icon: "warning",
                                            // buttons: true,
                                            buttons: ["No ! Go to Main menu",
                                                "Yes ! I want to"
                                            ],
                                            showCancelButton: true,
                                            dangerMode: true,
                                            // confirmButtonColor: "#0D83DA",
                                            // confirmButtonText: "Yes ! I want ",
                                            // cancelButtonColor: "#E21A4F ",
                                            // cancelButtonText: "No ! Go to Main menu",
                                            closeOnConfirm: false,
                                            closeOnCancel: false
                                        })
                                        .then((willok) => {
                                            if (willok) {
                                                $('#empFirstname').val('');
                                                $('#empMidName').val('');
                                                $('#empLastName').val('');

                                                $('#empEmailid').val('');
                                                $('#empPhoneno').val('');
                                                $('#empWhatsAppno').val('');

                                                $('#empUserName').val('');
                                                $('#empPassword').val('');
                                                $('#empConPassword').val('');
                                                $('#emptype').val(0);
                                                $('#chkWhatsaappcheck').prop(
                                                    "checked", false);
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/employee")
                                            }
                                        });

                                }
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Error Occured. Please try again later.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
