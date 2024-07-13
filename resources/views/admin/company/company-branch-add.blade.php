@extends('layouts.admin-front')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form id="add_companybranch_form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Add Company Details</h4>
            </div>


            <div class="card-body">

                <div class="form-group row">

                    <label  class="col-sm-3 col-form-label">Company Name</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="company_id" name="company_id">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="company_address" class="col-sm-3 col-form-label">Company Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_address" name="company_address"
                            placeholder="Company Address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country_code_1" class="col-sm-3 col-form-label">Country Code 1</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="country_code_1" name="country_code_1"
                            placeholder="Country Code 1" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number_1" class="col-sm-3 col-form-label">Phone Number 1</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="phone_number_1" name="phone_number_1"
                            placeholder="Phone Number 1" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country_code_2" class="col-sm-3 col-form-label">Country Code 2</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="country_code_2" name="country_code_2"
                            placeholder="Country Code 2" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number_2" class="col-sm-3 col-form-label">Phone Number 2</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="phone_number_2" name="phone_number_2"
                            placeholder="Phone Number 2" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_email_1" class="col-sm-3 col-form-label">Company Email 1</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="company_email_1" name="company_email_1"
                            placeholder="Company Email 1" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_email_2" class="col-sm-3 col-form-label">Company Email 2</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="company_email_2" name="company_email_2"
                            placeholder="Company Email 2" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_country" class="col-sm-3 col-form-label">Company Country</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_country" name="company_country"
                            placeholder="Company Country" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_state" class="col-sm-3 col-form-label">Company State</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_state" name="company_state"
                            placeholder="Company State" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_city" class="col-sm-3 col-form-label">Company City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_city" name="company_city"
                            placeholder="Company City" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact_person_name" class="col-sm-3 col-form-label">Contact Person Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="contact_person_name" name="contact_person_name"
                            placeholder="Contact Person Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact_person_email" class="col-sm-3 col-form-label">Contact Person Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="contact_person_email"
                            name="contact_person_email" placeholder="Contact Person Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact_person_phone" class="col-sm-3 col-form-label">Contact Person Phone</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="contact_person_phone"
                            name="contact_person_phone" placeholder="Contact Person Phone" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="submitCompany">Add +</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $('#submitCompany').click(function(event) {
            event.preventDefault();
            var myform = document.getElementById("add_companybranch_form");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.company.company-branch.store') }}",
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
                                window.location.replace("/admin-company-branch");
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
