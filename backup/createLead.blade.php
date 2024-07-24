@extends('layouts.admin-front')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_lead_form">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Lead</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="contact_id">Customer</label>
                        <div class="input-group">
                            <select id="contact_id" class="form-control" name="contact_id">
                                <option value="">Select Customer</option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                @endforeach
                            </select>

                            <div>
                                <b style="padding: 6px">Or</b>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" id="add_new_contact_btn" data-toggle="modal"
                                    data-target="#createContactModal">Add New Customer</button>
                            </div>
                        </div>
                    </div>


                    {{-- Lead Details --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="requirement_type">Requirement Type</label>
                            <select class="form-control" id="requirement_type" name="requirement_type">
                                <option value="Buy" selected>Buy</option>
                                <option value="Rent">Rent</option>
                                <option value="Sell">Sell</option>
                                <option value="Lease">Lease</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cust_business_type">Customer Business Type</label>
                            <input type="text" class="form-control" id="cust_business_type" name="cust_business_type"
                                placeholder="Enter Customer Business Type">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="property_type">Property Type</label>
                            <select class="form-control" id="property_type" name="property_type">
                                <option value="Commercial Office Space" selected>Commercial Office Space</option>
                                <option value="Commercial Shop">Commercial Shop</option>
                                <option value="Showrooms">Showrooms</option>
                                <option value="Flat">Flat</option>
                                <option value="House/Villa">House/Villa</option>
                                <option value="Plot/Land">Plot/Land</option>
                                <option value="Pg Accomodation">Pg Accomodation</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="property_specs">Property Specs</label>
                            <select class="form-control" id="property_specs" name="property_specs">
                                <option value="Co-Working" selected>Co-Working</option>
                                <option value="Exclusive Space">Exclusive Space</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="min_budget">Min Budget</label>
                            <input type="text" class="form-control" id="min_budget" name="min_budget"
                                placeholder="Enter min budget">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="max_budget">Max Budget</label>
                            <input type="text" class="form-control" id="max_budget" name="max_budget"
                                placeholder="Enter max budget">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="min_area">Min Area</label>
                            <input type="text" class="form-control" id="min_area" name="min_area"
                                placeholder="Enter min area">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="max_area">Max Area</label>
                            <input type="text" class="form-control" id="max_area" name="max_area"
                                placeholder="Enter max area">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="specific_location">Specific Location</label>
                        <input type="text" class="form-control" id="specific_location" name="specific_location"
                            placeholder="Enter specific location">
                    </div>
                    <div class="form-group">
                        <label for="place">Place</label>
                        <input type="text" class="form-control" id="place" name="place"
                            placeholder="Enter place">
                    </div>
                    <div class="form-group">
                        <label for="preferred_landmark">Preferred Landmark</label>
                        <input type="text" class="form-control" id="preferred_landmark" name="preferred_landmark"
                            placeholder="Enter preferred landmark">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expiry">Possession Due Date</label>
                            <input type="date" class="form-control" id="expiry" name="expiry">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="assigned_to">Assign To</label>
                            <select id="assigned_to" class="form-control" name="assigned_to">
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                        {{ $employee->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option value="New" selected>New</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Closed & Won">Closed & Won</option>
                                <option value="Closed & Failed">Closed & Failed</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="lead_source">Lead Source</label>
                            <select class="form-control" id="lead_source" name="lead_source">
                                <option value="" selected>Select Lead Source</option>
                                <option value="Website">Website</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Referral">Referral</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Cold Call">Cold Call</option>
                                <option value="Email Campaign">Email Campaign</option>
                                <option value="Event">Event</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/leads" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="createContactModal" tabindex="-1" role="dialog"
        aria-labelledby="createContactModalLabel" aria-hidden="true">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createContactModalLabel">Create New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="create_contact_form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new_contact_name">Name</label>
                            <input type="text" class="form-control" id="new_contact_name" name="new_contact_name"
                                placeholder="Enter Contact Name">
                        </div>
                        <div class="form-group">
                            <label for="new_contact_email">Email</label>
                            <input type="email" class="form-control" id="new_contact_email" name="new_contact_email"
                                placeholder="Enter Contact Email">
                        </div>
                        <div class="form-group">
                            <label for="new_contact_phone">Phone</label>
                            <input type="text" class="form-control" id="new_contact_phone" name="new_contact_phone"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="new_contact_whatsapp_ph">WhatsApp Phone</label>
                            <input type="text" class="form-control" id="new_contact_whatsapp_ph"
                                name="new_contact_whatsapp_ph" placeholder="Enter WhatsApp Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="new_contact_address">Address</label>
                            <textarea class="form-control" id="new_contact_address" name="new_contact_address" placeholder="Enter Address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_contact_btn">Save Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#add_new_contact_btn').click(function() {
                $('#new_contact_name').val('');
                $('#new_contact_email').val('');
                $('#new_contact_phone').val('');
                $('#new_contact_whatsapp_ph').val('');
                $('#new_contact_address').val('');
                $('#createContactModal').modal('show');
            });

            $('#save_contact_btn').click(function() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var formData = $('#create_contact_form').serializeArray();
                formData.push({
                    name: '_token',
                    value: csrfToken
                });

                $.ajax({
                    url: "{{ route('admin-contact-store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            $('#createContactModal').modal('hide');
                            $('#contact_id').append('<option value="' + response.contact_id +
                                '">' + response.contact_name + '</option>');
                            $('#contact_id').val(response.contact_id);
                        } else {
                            alert('Error: Unable to create contact.');
                        }
                    },
                    error: function(error) {
                        console.error('Error creating contact:', error);
                        alert('Error: Unable to create contact.');
                    }
                });
            });

            $('#add_lead_form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-lead-store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Lead Created Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    $('#contact_id').val('');
                                    $('#requirement_type').val('');
                                    $('#cust_business_type').val('');
                                    $('#property_specs').val('');
                                    $('#description').val('');
                                    $('#min_budget').val('');
                                    $('#max_budget').val('');
                                    $('#expiry').val('');
                                    $('#min_area').val('');
                                    $('#max_area').val('');
                                    $('#specific_location').val('');
                                    $('#place').val('');
                                    $('#preferred_landmark').val('');
                                    $('#property_type').val('');
                                    $('#assigned_to').val('');
                                    $('#status').val('New');
                                }
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Error Occurred. Please try again later.",
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
