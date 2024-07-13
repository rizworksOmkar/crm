@extends('layouts.admin-front')
@section('content')
    <form id="add_property_form">
        {{ csrf_field() }}
        <div class="card">

            <div class="card-header">
                <h4>Add property type</h4>
            </div>
            <div class="card-body">
              
                <div class="form-group row">
                    <label for="coutnry" class="col-sm-3 col-form-label">Property Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtproperty" name="txtproperty" placeholder="Input Season Name">
                    </div>
                </div>
              

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add +</button>

                <a href="/city-index" class="btn btn-danger ml-5">Back To Main Menu</a>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#add_property_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-hotelproperty-store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Property Added Successfully",
                                icon: "success",
                                button: "Ok",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    swal({
                                            title: "Are you want add more Property?",
                                            //text: "Once deleted, you will never get this CITY back. It will have to be rebuilt a new ",
                                            icon: "warning",
                                            // buttons: true,
                                            buttons: ["No ! Go to Main menu", "Yes ! I want"],
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
                                                $('#txtproperty').val('');
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/hotelproperty-index");
                                            }
                                        });

                                }
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Something went wrong",
                                icon: "error",
                                button: "Ok",
                            });
                        }
                    }
                });
            });
        });

   
    </script>
@endsection
