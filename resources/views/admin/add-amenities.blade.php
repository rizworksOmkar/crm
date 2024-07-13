@extends('layouts.admin-front')
@section('content')
    <form id="add_amenities_form">
        {{ csrf_field() }}
        <div class="card">

            <div class="card-header">
                <h4>Add Amenities</h4>
            </div>
            <div class="card-body">
              
                <div class="form-group row">
                    <label for="coutnry" class="col-sm-3 col-form-label">Amenities Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtamenities" name="txtamenities" placeholder="Input Amenities Name">
                    </div>
                </div>
              

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add +</button>

                <a href="/Amenities-index" class="btn btn-danger ml-5">Back To Main Menu</a>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#add_amenities_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-Amenities-store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Ameneties Added Successfully",
                                icon: "success",
                                button: "Ok",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    swal({
                                            title: "Are you want add more Ameneties?",
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
                                                $('#txtamenities').val('');
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/Amenities-index");
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
