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
                    {{-- Contact Selection with Modal Creation Option --}}
                    <div class="form-group">
                        <label for="contact_id">Customer</label>
                        <div class="input-group">
                            <select id="contact_id" class="form-control" name="contact_id">
                                <option value="">Select Customer</option>
                                {{-- Loop through contacts to populate options --}}
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
                            <label for="property_type">Requirement Type</label>

                            <select class="form-control" id="requirement_type" name="reuirement_type">
                                <option value="new" selected>Buy</option>
                                <option value="in_progress">Rent</option>
                                <option value="closed">Sell</option>
                                <option value="closed">Lease</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="budget">Customer Business Tyoe</label>
                            <input type="text" class="form-control" id="custBusinessType" name="custBusinessType"
                                placeholder="Enter Customer Business Type">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="property_type">Property Type</label>

                            <select class="form-control" id="property_type" name="property_type">
                                <option value="new" selected>Commercial Office Space</option>
                                <option value="in_progress">Commercial Shop</option>
                                <option value="closed">Showrooms</option>
                                <option value="closed">Flat</option>
                                <option value="closed">House/Villa</option>
                                <option value="closed">Plot/Land</option>
                                <option value="closed">Pg Accomodation</option>
                                <option value="closed">Others</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="property_type">Property Specs</label>

                            <select class="form-control" id="requirement_type" name="reuirement_type">
                                <option value="new" selected>Co Working</option>
                                <option value="in_progress">Exclusive Spcae</option>

                            </select>

                        </div>

                    </div>

                    <div class="form-row">

                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="budget">Budget</label>
                            <input type="text" class="form-control" id="budget" name="budget"
                                placeholder="Enter budget">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="expiry">Possesion Due Date</label>
                            <input type="date" class="form-control" id="expiry" name="expiry">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="area_requirements">Area Requirements</label>
                            <input type="text" class="form-control" id="area_requirements" name="area_requirements"
                                placeholder="Enter area requirements">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="property_type">Property Type</label>

                            <select class="form-control" id="property_type" name="property_type">
                                <option value="new" selected>Commercial Office Space</option>
                                <option value="in_progress">Commercial Shop</option>
                                <option value="closed">Showrooms</option>
                                <option value="closed">Flat</option>
                                <option value="closed">House/Villa</option>
                                <option value="closed">Plot/Land</option>
                                <option value="closed">Pg Accomodation</option>
                                <option value="closed">Others</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="assigned_to">Assign To</label>
                            <select id="assigned_to" class="form-control" name="assigned_to">
                                <option value="">Select Employee</option>
                                {{-- Loop through employees to populate options --}}
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                        {{ $employee->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="new" selected>New</option>
                            <option value="in_progress">In Progress</option>
                            <option value="closed">Closed & Won</option>
                            <option value="closed">Closed & Failed</option>

                        </select>
                    </div>
                </div>
                {{-- lead type and Source --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/leads" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="createContactModal" tabindex="-1" role="dialog" aria-labelledby="createContactModalLabel"
        aria-hidden="true">
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


            // Submit form handling
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
                                    $('#description').val('');
                                    $('#budget').val('');
                                    $('#expiry').val('');
                                    $('#area_requirements').val('');
                                    $('#property_type').val('');
                                    $('#assigned_to').val('');
                                    $('#status').val('new');
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
