@extends('layouts.admin-front')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<form id="add_companydetails_form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card">

        <div class="card-header">
            <h4>Add Company Details</h4>
        </div>

        @if($count > 0)
        <div class="card-body">
            @foreach ($details as $detail)
                <input type="hidden" name="hid" id="hid" value="{{ $detail->id }}">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Company Name</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="company_id" name="company_id">
                            <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ $detail->company_id == $company->id ? 'selected' : '' }}>
                                        {{ $company->company_name }}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                </div>




                <div class="form-group row">
                    <label for="company_phone_number_1" class="col-sm-3 col-form-label">Company GSTIN</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_GSTIN_no" name="company_GSTIN_no" placeholder="Company GSTIN no." value="{{ $detail->company_GSTIN_no }}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="company_country_code" class="col-sm-3 col-form-label">Bank Details</label>

                </div>

                <div class="form-group row">
                    <label for="company_phone_number_1" class="col-sm-3 col-form-label">Bank Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="{{ $detail->bank_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_phone_number_2" class="col-sm-3 col-form-label">IFSC Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="IFSC Code" name="bank_ifsc_code" placeholder="Bank IFSC Code" value="{{ $detail->bank_ifsc_code }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company_landline_1" class="col-sm-3 col-form-label">Branch Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="branch_code" name="branch_code" placeholder="Branch Code" value="{{ $detail->branch_code }}">
                    </div>
                </div>



            @endforeach




            <div class="card-footer">
                <button type="update" class="btn btn-primary" id="submitCompanyUpdate">Update +</button>
            </div>
        </div>
        @else
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
                        <label for="company_phone_number_1" class="col-sm-3 col-form-label">Company GSTIN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_GSTIN_no" name="company_GSTIN_no" placeholder="Company GSTIN no.">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="company_country_code" class="col-sm-3 col-form-label">Bank Details</label>

                    </div>

                    <div class="form-group row">
                        <label for="company_phone_number_1" class="col-sm-3 col-form-label">Bank Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_phone_number_2" class="col-sm-3 col-form-label">IFSC Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="IFSC Code" name="bank_ifsc_code" placeholder="Bank IFSC Code">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_landline_1" class="col-sm-3 col-form-label">Branch Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch_code" name="branch_code" placeholder="Branch Code">
                        </div>
                    </div>








                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="submitCompany">Add +</button>
                </div>
            </div>

        @endif
    </div>
</form>
@endsection

@section('scripts')
<script>
    $('#submitCompanyUpdate').click(function(event) {

        event.preventDefault();

        var myform = document.getElementById("add_companydetails_form");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.company.company-details.update') }}",
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
                                window.location.replace("/admin-company-details");
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

        var myform = document.getElementById("add_companydetails_form");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.company.company-details.store') }}",
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
                            window.location.replace("/admin-company-details");
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
