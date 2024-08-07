@extends('layouts.admin-front')

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md
         group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm
           pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)]
           group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0
            group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto
             group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 
             group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)] pt-20">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Create Lead</h6>
                    <form id="add_lead_form">
                        {{ csrf_field() }}
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            <div class="mb-4">
                                <label for="contact_id"
                                    class="inline-block mb-2 text-base
                                      font-medium">Customer
                                    <span class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 
                                    dark:border-zink-500 focus:outline-none 
                                    focus:border-custom-500 disabled:bg-slate-100 
                                    dark:disabled:bg-zink-600 disabled:border-slate-300 
                                    dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                    disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                    dark:focus:border-custom-800 placeholder:text-slate-400 
                                    dark:placeholder:text-zink-200"
                                    id="contact_id" name="contact_id" required>
                                    <option value="">Select Customer</option>
                                    @foreach ($contacts as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4 cstrm_add">
                                <label for="firstNameInput2" class="inline-block mb-2 text-base
                                 font-medium">Or <span
                                        class="text-red-500">*</span></label>
                                <button type="button" data-modal-target="showModal"
                                    class="text-white  bg-custom-500 btn border-custom-500 
                                    hover:text-white hover:bg-custom-600 hover:border-custom-600
                                     focus:text-white focus:bg-custom-600 focus:border-custom-600
                                      focus:ring focus:ring-custom-100 active:text-white 
                                      active:bg-custom-600 active:border-custom-600 active:ring 
                                      active:ring-custom-100 dark:ring-custom-400/20 add-btn"
                                    data-toggle="modal" id="add_new_contact_btn"
                                     data-target="#createContactModal"><i
                                        class="align-bottom ri-add-line me-1"></i> Add New Customer</button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Phone Number
                                    <span class="text-red-500">*</span></label>
                                <input type="text" id="lastNameInput2"
                                    class="form-input border-slate-200
                                     dark:border-zink-500 focus:outline-none 
                                     focus:border-custom-500 disabled:bg-slate-100 
                                     dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                      placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="phone" name="phone" placeholder="" value="" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Whatsapp
                                    Number<span class="text-red-500">*</span></label>
                                <input type="text" id="lastNameInput2"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" id="whatsapp_ph" name="whatsapp_ph" value="" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="stateInput" class="inline-block mb-2 text-base font-medium">Requirement Type
                                    <span class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="requirement_type" name="requirement_type" required>
                                    <option value="Buy" selected="">Buy</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Sell">Sell</option>
                                    <option value="Lease">Lease</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="UsernameInput" class="inline-block mb-2 text-base font-medium">Customer Business
                                    Type <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" id="cust_business_type" name="cust_business_type" required>
                            </div>
                            <div class="mb-4">
                                <label for="stateInput"
                                    class="inline-block
                                 mb-2 text-base font-medium">Property
                                    Type<span class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="property_type" name="property_type" required>
                                    @foreach ($propertyTypes as $propertyType)
                                        <option value="{{ $propertyType->property_type }}">
                                            {{ $propertyType->property_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="stateInput" class="inline-block mb-2 text-base font-medium">Property Specs<span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="property_specs" name="property_specs" required>
                                    <@foreach ($propertySpecs as $propertySpec)
                                        <option value="{{ $propertySpec->property_spec }}">
                                            {{ $propertySpec->property_spec }}
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                            <div class="mb-4">
                                <label for="description" class="inline-block mb-2 text-base font-medium">Lead Description
                                    (Requirement of client/customer) <span class="text-red-500">*</span></label>
                                <textarea id="description" name="description" rows="3" rows="2"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                     placeholder:text-slate-400 dark:placeholder:text-zink-200"></textarea>

                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-4">
                            <div class="mb-4">
                                <label for="min_budget"
                                    class="inline-block mb-2
                                 text-base font-medium">Min
                                    Budget <span class="text-red-500">*</span></label>
                                <input type="text" id="min_budget" name="min_budget"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Enter zip code" required>
                            </div>
                            <div class="mb-4">
                                <label for="max_budget"
                                    class="inline-block mb-2 
                                text-base font-medium">Max
                                    Budget<span class="text-red-500">*</span></label>
                                <input type="text" id="max_budget" name="max_budget"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                            <div class="mb-4">
                                <label for="min_area"
                                    class="inline-block mb-2
                                 text-base font-medium">Min
                                    Area
                                    (Sq.ft)<span class="text-red-500">*</span></label>
                                <input type="text" id="min_area" name="min_area"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                            <div class="mb-4">
                                <label for="max_area"
                                    class="inline-block mb-2 
                                text-base font-medium">Max
                                    Area
                                    (Sq.ft)<span class="text-red-500">*</span></label>
                                <input type="text" id="max_area" name="max_area"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                            <div class="mb-4">
                                <label for="specific_location"
                                    class="inline-block mb-2 
                                text-base font-medium">Specific
                                    Location<span class="text-red-500">*</span></label>
                                <input type="text" id="specific_location" name="specific_location"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                            <div class="mb-4">
                                <label for="place"
                                    class="inline-block mb-2 text-base
                                 font-medium">Area
                                    (Broad
                                    Level)<span class="text-red-500">*</span></label>
                                <input type="text" id="place" name="place"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                            <div class="mb-4">
                                <label for="preferred_landmark"
                                    class="inline-block mb-2 text-base
                                 font-medium">Preferred
                                    Landmark<span class="text-red-500">*</span></label>
                                <input type="text" id="preferred_landmark" name="preferred_landmark"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                            <div class="mb-4">
                                <label for="expiry"
                                    class="inline-block mb-2 text-base
                                 font-medium">Possession
                                    Due
                                    Date<span class="text-red-500">*</span></label>
                                <input type="date" id="expiry" name="expiry"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                            <div class="mb-4">
                                <label for="lead_source"
                                    class="inline-block mb-2 text-base
                                 font-medium">Lead
                                    Source<span class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="stateInput" required>
                                    <option value="" selected="">Select Lead Source</option>
                                    @foreach ($sources as $source)
                                        <option value="{{ $source->lead_source }}">
                                            {{ $source->lead_source }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="refrence_description"
                                    class="inline-block mb-2 text-base 
                                font-medium">Refrence
                                    Description<span class="text-red-500">*</span></label>
                                <input type="text" id="refrence_description" name="refrence_description"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="" required>
                            </div>
                            <div class="mb-4">
                                <label for="status"
                                    class="inline-block mb-2 text-base 
                                font-medium">Status<span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="status" name="status" required>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->status_type }}">
                                            {{ $status->status_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-800 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                 active:border-custom-600 active:ring active:ring-custom-100">Create</button>
                            <a href="/leads"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                 active:border-custom-600 active:ring active:ring-custom-100">Back
                                To Main Menu</a>
                        </div>
                    </form>
                </div>
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
                                    <input type="text" class="form-control" id="new_contact_name"
                                        name="new_contact_name" placeholder="Enter Contact Name">
                                </div>
                                <div class="form-group">
                                    <label for="new_contact_email">Email</label>
                                    <input type="email" class="form-control" id="new_contact_email"
                                        name="new_contact_email" placeholder="Enter Contact Email">
                                </div>
                                <div class="form-group">
                                    <label for="new_contact_phone">Phone</label>
                                    <input type="text" class="form-control" id="new_contact_phone"
                                        name="new_contact_phone" placeholder="Enter Phone Number">
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
                                <button type="button" class="btn btn-primary" id="save_contact_btn">Save
                                    Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('#contact_id').change(function() {
                var contactId = $(this).val();
                if (contactId) {
                    $.ajax({
                        url: '/get-contact-details/' + contactId,
                        type: 'GET',
                        success: function(response) {
                            $('#phone').val(response.phone);
                            $('#whatsapp_ph').val(response.whatsapp_ph);
                        },
                        error: function(error) {
                            console.error('Error fetching contact details:', error);
                        }
                    });
                } else {
                    $('#phone_number').val('');
                    $('#whatsapp_number').val('');
                }
            });

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
                            $('#phone').val(response.new_contact_phone);
                            $('#whatsapp_ph').val(response.new_contact_whatsapp_ph);
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
