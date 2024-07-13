@extends('layouts.admin-front')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<form id="add_company_form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card">

        <div class="card-header">
            <h4>Add Company Profile</h4>
        </div>

        @if($count > 0)
            <div class="card-body">
                @foreach ($companies as $company)
                {{-- Hidden input --}}
                <input type="hidden" name="hiddenId" value="{{ $company->id }}">
                    <div class="form-group row">
                        <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{ $company->company_name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_logo_1" class="col-sm-3 col-form-label">Upload Company Logo 1</label>
                        <div class="col-sm-9">
                            @if ($company->company_logo_1)
                                <img id="company_logo_1_preview" src="{{ asset($company->company_logo_1) }}" alt="Current Company Logo 1" style="max-width: 100px; max-height: 100px;">
                            @else
                                <img id="company_logo_1_preview" style="display: none; max-width: 100px; max-height: 100px;">
                            @endif
                            <input type="file" id="company_logo_1" name="company_logo_1" onchange="previewCompanyLogo1(event)">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_logo_2" class="col-sm-3 col-form-label">Upload Company Logo 2</label>
                        <div class="col-sm-9">
                            @if ($company->company_logo_2)
                                <img id="company_logo_2_preview" src="{{ asset($company->company_logo_2) }}" alt="Current Company Logo 2" style="max-width: 100px; max-height: 100px;">
                            @else
                                <img id="company_logo_2_preview" style="display: none; max-width: 100px; max-height: 100px;">
                            @endif
                            <input type="file" id="company_logo_2" name="company_logo_2" onchange="previewCompanyLogo2(event)">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="company_email_id_1" class="col-sm-3 col-form-label">Company Email 1</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="company_email_id_1" name="company_email_id_1" placeholder="Company Email 1" value="{{ $company->company_email_id_1 }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_email_id_2" class="col-sm-3 col-form-label">Company Email 2</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="company_email_id_2" name="company_email_id_2" placeholder="Company Email 2" value="{{ $company->company_email_id_2 }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_country_code" class="col-sm-3 col-form-label">Company Country Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_country_code" name="company_country_code" placeholder="Company Country Code" value="{{ $company->company_country_code }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_phone_number_1" class="col-sm-3 col-form-label">Company Phone Number 1</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_phone_number_1" name="company_phone_number_1" placeholder="Company Phone Number 1" value="{{ $company->company_phone_number_1 }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_phone_number_2" class="col-sm-3 col-form-label">Company Phone Number 2</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_phone_number_2" name="company_phone_number_2" placeholder="Company Phone Number 2" value="{{ $company->company_phone_number_2 }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_landline_1" class="col-sm-3 col-form-label">Company Landline 1</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_landline_1" name="company_landline_1" placeholder="Company Landline 1" value="{{ $company->company_landline_1 }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_landline_2" class="col-sm-3 col-form-label">Company Landline 2</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_landline_2" name="company_landline_2" placeholder="Company Landline 2" value="{{ $company->company_landline_2 }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_registered_address" class="col-sm-3 col-form-label">Company Registered Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_registered_address" name="company_registered_address" placeholder="Company Registered Address" value="{{ $company->company_registered_address }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country_id" class="col-sm-3 col-form-label">Select Country</label>
                        <div class="col-sm-9">
                            <select name="country_id" id="country_id" class="form-control select">
                                <option value="">--Select--</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if ($company->country_id == $country->id) selected @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="state_id" class="col-sm-3 col-form-label">Select State</label>
                        <div class="col-sm-9">
                            <select name="state_id" id="state_id" class="form-control select">
                                <option value="">Select</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" @if ($company->state_id == $state->id) selected @endif>{{ $state->state_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city_id" class="col-sm-3 col-form-label">Select City</label>
                        <div class="col-sm-9">
                            <select name="city_id" id="city_id" class="form-control select">
                                <option value="">Select</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @if ($company->city_id == $city->id) selected @endif>{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pincode" class="col-sm-3 col-form-label">Pincode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="{{ $company->pincode }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="update" class="btn btn-primary" id="submitCompanyUpdate">Update +</button>
            </div>
        @else
            <div class="card-body">
                <div class="form-group row">
                    <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_logo_1" class="col-sm-3 col-form-label">Upload Company Logo 1</label>
                    <div class="col-sm-9">
                        <input type="file" id="company_logo_1" name="company_logo_1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_logo_2" class="col-sm-3 col-form-label">Upload Company Logo 2</label>
                    <div class="col-sm-9">
                        <input type="file" id="company_logo_2" name="company_logo_2">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_email_id_1" class="col-sm-3 col-form-label">Company Email 1</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="company_email_id_1" name="company_email_id_1" placeholder="Company Email 1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_email_id_2" class="col-sm-3 col-form-label">Company Email 2</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="company_email_id_2" name="company_email_id_2" placeholder="Company Email 2">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_country_code" class="col-sm-3 col-form-label">Company Country Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_country_code" name="company_country_code" placeholder="Company Country Code">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_phone_number_1" class="col-sm-3 col-form-label">Company Phone Number 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_phone_number_1" name="company_phone_number_1" placeholder="Company Phone Number 1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_phone_number_2" class="col-sm-3 col-form-label">Company Phone Number 2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_phone_number_2" name="company_phone_number_2" placeholder="Company Phone Number 2">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_landline_1" class="col-sm-3 col-form-label">Company Landline 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_landline_1" name="company_landline_1" placeholder="Company Landline 1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_landline_2" class="col-sm-3 col-form-label">Company Landline 2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_landline_2" name="company_landline_2" placeholder="Company Landline 2">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_registered_address" class="col-sm-3 col-form-label">Company Registered Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_registered_address" name="company_registered_address" placeholder="Company Registered Address">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="country_id" class="col-sm-3 col-form-label">Select Country</label>
                    <div class="col-sm-9">
                        <select name="country_id" id="country_id" class="form-control select" >
                            <option value="">--Select--</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state_id" class="col-sm-3 col-form-label">Select State</label>
                    <div class="col-sm-9">
                        <select name="state_id" id="state_id" class="form-control select" >
                            <option value="">Select</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="city_id" class="col-sm-3 col-form-label">Select City</label>
                    <div class="col-sm-9">
                        <select name="city_id" id="city_id" class="form-control select" >
                            <option value="">Select</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>



                <div class="form-group row">
                    <label for="pincode" class="col-sm-3 col-form-label">Pincode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="submitCompany">Add +</button>
            </div>
        @endif
    </div>
</form>
@endsection

@section('scripts')
<script>

    function previewCompanyLogo1(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('company_logo_1_preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewCompanyLogo2(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('company_logo_2_preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }


    $('#submitCompanyUpdate').click(function(event) {

            event.preventDefault();

            var myform = document.getElementById("add_company_form");
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.company.update') }}",
                    type: "POST",
                    data: new FormData(myform),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.message == 'success') {
                            console.log("Success");
                            swal({
                                title: "Success",
                                text: "Data Updated Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    window.location.replace("/admin-company");
                                }
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        swal({
                            title: "Error",
                            text: "An error occurred. Please try again later.",
                            icon: "error",
                            button: "OK",
                        });
                    }
                });
    });

    $('#submitCompany').click(function(event) {

        event.preventDefault();

        var myform = document.getElementById("add_company_form");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.company.store') }}",
            type: "POST",
            data: new FormData(myform),
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.message == 'success') {
                    console.log("Success");
                    swal({
                        title: "Success",
                        text: "Data Updated Successfully.",
                        icon: "success",
                        button: "OK",
                    }).then((willconfirm) => {
                        if (willconfirm) {
                            window.location.replace("/admin-company");
                        }
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: "Error",
                    text: "An error occurred. Please try again later.",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    });
</script>


@endsection
