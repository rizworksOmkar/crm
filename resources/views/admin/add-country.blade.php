@extends('layouts.admin-front')
@section('content')
    <form id="add_country_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Add Countries</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="coutnry" class="col-sm-3 col-form-label">Country Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="country_name" name="country_name"
                            placeholder="Country Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="coutnry" class="col-sm-3 col-form-label">Country Alias</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="country_alias" name="country_alias"
                            placeholder="Country Alias">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="coutnry_code" class="col-sm-3 col-form-label">Country Code</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="country_code" name="country_code"
                            placeholder="Country Code">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">Domestic</div>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="d_i_f"
                                    value="1">
                                <label class="custom-control-label" for="customCheck2">Domestic</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add +</button>

                <a href="/country-index" class="btn btn-danger ml-5">Back To Main Menu</a>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#add_country_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.country.store') }}",
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
                                            title: "Are you want add more country?",
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
                                                $('#country_name').val('');
                                                $('#country_alias').val('');
                                                $('#country_code').val('');
                                                $( '#customCheck2' ).prop( "checked", false );
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/country-index")
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
