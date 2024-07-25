@extends('layouts.admin-front')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_lead_form">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Status</h4>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">
                        <label for="max_budget">Add Status Type</label>
                        <input type="text" class="form-control" id="role" name="role"
                            placeholder="Enter Status type">
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/roles" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>
    </div>


@endsection

{{-- @section('scripts')
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
@endsection --}}
