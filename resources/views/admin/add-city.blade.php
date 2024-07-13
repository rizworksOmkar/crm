@extends('layouts.admin-front')
@section('content')
    <form id="add_city_form">
        {{ csrf_field() }}
        <div class="card">

            <div class="card-header">
                <h4>Add City</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="coutnry_id" class="col-sm-3 col-form-label">Select Country</label>
                    <div class="col-sm-9">
                        <select name="country_id" id="country_id" class="form-control form-control-sm">
                            <option value="">Select</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="state_id" class="col-sm-3 col-form-label">Select State</label>
                    <div class="col-sm-9">
                        <select name="state_id" id="state_id" class="form-control form-control-sm">
                            <option value="">Select State</option>
                            {{-- @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                @endforeach --}}

                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="coutnry" class="col-sm-3 col-form-label">City Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="city_name" name="city_name" placeholder="City Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="coutnry" class="col-sm-3 col-form-label">City Alias</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="city_alias" name="city_alias"
                            placeholder="City Alias">
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
            $('#add_city_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.city.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
                                icon: "success",
                                button: "Ok",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    swal({
                                            title: "Are you want add more city at this country?",
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
                                                $('#city_name').val('');
                                                $('#city_alias').val('');
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/city-index");
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

        $(document).on('change', '#country_id', function() {
            var country_id = $(this).val();

            $.ajax({
                url: "{{ route('admin.chkcountryDI') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "countryid": country_id,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data.countryINTorDOM);
                    if (data.countryINTorDOM == 0) {
                        $('#state_id').empty();
                        $('#state_id').prop("disabled", true);
                    } else {
                        $('#state_id').prop("disabled", false);
                        $.ajax({
                            url: "{{ route('admin.state-fetch') }}",
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "countryid": country_id,
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response) {
                                    $('#state_id').empty();
                                    $('select[name="state_id"]').append(
                                        '<option value="0">Select State</option>');
                                    $.each(response, function(key, response) {
                                        $('select[name="state_id"]').append(
                                            '<option value="' + response.id +
                                            '">' + response
                                            .state_name + '</option>');
                                    });

                                } else {
                                    $('#state_id').empty();
                                }
                            }
                        });
                    }

                }
            });
        });
    </script>
@endsection
