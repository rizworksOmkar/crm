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
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-1 xl:grid-cols-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-16">Edit Lead</h6>
                    <form id="edit_lead_form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                            <input type="hidden" id="lead_id" name="lead_id" value="{{ $lead->id }}">
                            <div class="mb-4">
                                <label for="contact_id"
                                    class="inline-block mb-2 text-base
                                          font-medium">Contact</label>
                                <select id="contact_id"
                                    class="form-select border-slate-200 dark:border-zink-500 
                                         focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600
                                         disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                         disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                         placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    name="contact_id">
                                    <option value="">Select Contact</option>
                                    @foreach ($contacts as $contact)
                                        <option value="{{ $contact->id }}"
                                            {{ $contact->id == $lead->contact_id ? 'selected' : '' }}>
                                            {{ $contact->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="assigned_to" class="inline-block mb-2 text-base font-medium">
                                    Assigned To</label>
                                <select id="assigned_to"
                                    class="form-select border-slate-200 dark:border-zink-500 
                                     focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600
                                     disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                     disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                     placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    name="assigned_to">
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $employee->id == $lead->assigned_to ? 'selected' : '' }}>
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-1 xl:grid-cols-1">
                            <div class="mb-4">
                                <label for="description" class="inline-block mb-2 text-base font-medium">
                                    Description</label>
                                <textarea
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none 
                                        focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 
                                        disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 
                                        dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="description" name="description">{{ $lead->description }}</textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                            <div class="mb-4">
                                <label for="budget" class="inline-block mb-2 text-base font-medium">
                                    Budget
                                </label>
                                <input type="number" id="budget" name="budget" value="{{ $lead->budget }}"
                                    class="form-input border-slate-200 dark:border-zink-500
                                focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                dark:disabled:bg-zink-600 disabled:border-slate-300
                                dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                dark:focus:border-custom-800
                                 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                            <div class="mb-4">
                                <label for="expiry" class="inline-block mb-2 text-base font-medium">
                                    Expiry Date
                                </label>
                                <input type="date"
                                    class="form-input border-slate-200 dark:border-zink-500
                                       focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                       dark:disabled:bg-zink-600 disabled:border-slate-300
                                       dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                       disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                       dark:focus:border-custom-800
                                        placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="expiry" name="expiry" value="{{ $lead->expiry }}">
                            </div>
                            <div class="mb-4">
                                <label for="area_requirements"
                                    class="inline-block mb-2 text-base
                                           font-medium">Area
                                    Requirements</label>
                                <input type="text"
                                    class="form-input border-slate-200
                                   dark:border-zink-500 focus:outline-none
                                   focus:border-custom-500 disabled:bg-slate-100
                                   dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                    placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="area_requirements" name="area_requirements" value="{{ $lead->area_requirements }}">
                            </div>
                            <div class="mb-4">
                                <label for="property_type"
                                    class="inline-block mb-2 text-base
                                           font-medium">Property
                                    Type</label>
                                <input type="text"
                                    class="form-input border-slate-200
                                   dark:border-zink-500 focus:outline-none
                                   focus:border-custom-500 disabled:bg-slate-100
                                   dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                    placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="property_type" name="property_type" value="{{ $lead->property_type }}">
                            </div>
                            <div class="mb-4">
                                <label for="status" class="inline-block mb-2 text-base font-medium">
                                    Status</label>
                                @if (!isset($lead) || is_null($lead->status))
                                    <input type="text" class="form-control" id="status" name="status"
                                        value="{{ old('status') }}">
                                @else
                                    <select id="status" name="status"
                                        class="form-select border-slate-200 dark:border-zink-500 
                                    focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600
                                     disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 
                                     disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                      placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                        <option value="new" @if ($lead->status === 'new') selected @endif>New
                                        </option>
                                        <option value="in_progress" @if ($lead->status === 'in_progress') selected @endif>In
                                            Progress</option>
                                        <option value="closed_won" @if ($lead->status === 'closed_won') selected @endif>Closed
                                            & Won</option>
                                        <option value="closed_failed" @if ($lead->status === 'closed_failed') selected @endif>
                                            Closed & Failed</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-800 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                        active:border-custom-600 active:ring active:ring-custom-100">
                                Update Lead</button>
                            <a href="/leads"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                        active:border-custom-600 active:ring active:ring-custom-100">
                                Back To Leads</a>
                        </div>
                    </form>
                </div>
            </div>
        </div></div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#edit_lead_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                var leadId = $('#lead_id').val();

                $.ajax({
                    url: '/leads/' + leadId,
                    type: 'PUT',
                    data: formData,
                    success: function(response) {
                        alert('Lead updated successfully.');
                        window.location.href = "/leads";
                    },
                    error: function(error) {
                        console.error('Error updating lead:', error);
                        alert('Error: Unable to update lead.');
                    }
                });
            });
        });
    </script>
@endsection
