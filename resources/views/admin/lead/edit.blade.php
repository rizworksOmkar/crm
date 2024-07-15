@extends('layouts.admin-front')
@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="edit_lead_form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">
                    <h4>Edit Lead</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" id="lead_id" name="lead_id" value="{{ $lead->id }}">

                    <div class="form-group">
                        <label for="contact_id">Contact</label>
                        <select id="contact_id" class="form-control" name="contact_id">
                            <option value="">Select Contact</option>
                            @foreach ($contacts as $contact)
                                <option value="{{ $contact->id }}" {{ $contact->id == $lead->contact_id ? 'selected' : '' }}>
                                    {{ $contact->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="assigned_to">Assigned To</label>
                        <select id="assigned_to" class="form-control" name="assigned_to">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $employee->id == $lead->assigned_to ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $lead->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget</label>
                        <input type="number" class="form-control" id="budget" name="budget" value="{{ $lead->budget }}">
                    </div>
                    <div class="form-group">
                        <label for="expiry">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry" name="expiry" value="{{ $lead->expiry }}">
                    </div>
                    <div class="form-group">
                        <label for="area_requirements">Area Requirements</label>
                        <input type="text" class="form-control" id="area_requirements" name="area_requirements" value="{{ $lead->area_requirements }}">
                    </div>
                    <div class="form-group">
                        <label for="property_type">Property Type</label>
                        <input type="text" class="form-control" id="property_type" name="property_type" value="{{ $lead->property_type }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $lead->status }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Lead</button>
                    <a href="/leads" class="btn btn-danger ml-5">Back To Leads</a>
                </div>
            </div>
        </form>
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
