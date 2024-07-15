@extends('layouts.admin-front')
@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_employee_form">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Employee</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="empFirstname">First Name</label>
                            <input type="text" class="form-control" id="empFirstname" name="empFirstname"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empMidName">Middle Name</label>
                            <input type="text" class="form-control" id="empMidName" name="empMidName"
                                placeholder="Enter Middle Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empLastName">Last Name</label>
                            <input type="text" class="form-control" id="empLastName" name="empLastName"
                                placeholder="Enter Last Name">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="empEmailid">Email Id</label>
                        <input type="email" class="form-control" id="empEmailid" name="empEmailid"
                            placeholder="Enter Email Id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="empPhoneno">Phone Number</label>
                            <input type="text" class="form-control" id="empPhoneno" name="empPhoneno"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group mt-4 col-md-4">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="chkWhatsaappcheck" name="chkWhatsaappcheck" value="1">
                                <label class="form-check-label" for="chkWhatsaappcheck">
                                    Check if same phone number is whatsapp number.
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empWhatsAppno">WhatsAPP Number</label>
                            <input type="text" class="form-control" id="empWhatsAppno" name="empWhatsAppno"
                                placeholder="Enter WhatsAPP Number">
                        </div>
                    </div>
                    <div class="card-header p-0 mb-4">
                        <h6>Create Credetial</h6>
                    </div>
                    <div class="form-group">
                        <label for="empUserName">User Name</label>
                        <input type="text" class="form-control" id="empUserName" name="empUserName"
                            placeholder="Enter User Name">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="empPassword">Password</label>
                            <input type="password" class="form-control" id="empPassword" name="empPassword" placeholder="Type Password">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empConPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="empConPassword" name="empConPassword"
                                placeholder="Enter Middle Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emptype">Employee Type</label>
                            <select id="emptype" class="form-control" name="emptype">
                                <option value="0">Choose...</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>

                    <a href="/emplyee" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#chkWhatsaappcheck').change(function() {
                var phonenumber=$("#empPhoneno").val();
                if ($(this).is(":checked")) {
                    $("#empWhatsAppno").val(phonenumber);
                }else{
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
                                            title: "Are you want Create more Employee?",
                                            //text: "Once deleted, you will never get this CITY back. It will have to be rebuilt a new ",
                                            icon: "warning",
                                            // buttons: true,
                                            buttons: ["No ! Go to Main menu",
                                                "Yes ! I want"
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
                                                $( '#chkWhatsaappcheck' ).prop( "checked", false );
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/emplyee")
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
