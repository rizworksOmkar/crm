@extends('layouts.user-dashboard-layout')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_lead_form" action="{{ route('leads.tasks.store', $id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Create Activity</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="contact_id">Customer</label>
                            <select id="contact_id" class="form-control" name="contact_id">
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}"
                                        {{ $contact->id == $lead->contact_id ? 'selected' : '' }}>
                                        {{ $contact->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lead_id">Lead</label>
                            <select id="lead_id" class="form-control" name="lead_id">
                                @foreach ($userLeads as $userLead)
                                    <option value="{{ $userLead->id }}" {{ $userLead->id == $lead->id ? 'selected' : '' }}>
                                        {{ $userLead->lead_num }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="activity_date">Lead Activity Date</label>
                        <input type="activity_date" class="form-control" id="activity_date" name="activity_date">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $lead->contact->phone }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="description">Update Activity by Client</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Update Activity by Client"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="activity_by_user">Update Activity by User</label>
                        <textarea class="form-control" id="activity_by_user" name="activity_by_user" rows="3" placeholder="Enter Update Activity by User"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mode">Mode</label>
                            <select id="mode" class="form-control" name="mode">
                                <option value="Site Visit" selected>Site Visit</option>
                                <option value="Phone Call">Phone Call</option>
                                <option value="Discussion">Discussion</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Lead Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="" selected>Select</option>
                            <option value="no_response">No response</option>
                            <option value="contact_and_response">Contact & Response</option>
                            <option value="site_visit_done">Site Visit Done</option>
                            <option value="site_visit_requested">Site Visit Requested</option>
                            <option value="visit_postponed">Visit Postponed</option>
                            <option value="follow_up_needed">Follow up needed</option>
                            <option value="follow_up_done">Follow up done</option>
                            <option value="not_interested">Not Interested</option>
                            <option value="closed_successfully">Closed Successfully</option>
                            <option value="closed_with_failure">Closed with Failure</option>
                            <option value="invalid_contact_details">Invalid Contact Details</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/myLeads" class="btn btn-danger ml-5">Back To Leads</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#contact_id').change(function() {
                var contactId = $(this).val();
                $.ajax({
                    url: '/get-contact-phone/' + contactId,
                    type: 'GET',
                    success: function(response) {
                        $('#phone').val(response.phone);
                    }
                });
            });

            $('#lead_id').change(function() {
                var leadId = $(this).val();
                $.ajax({
                    url: '/get-lead-info/' + leadId,
                    type: 'GET',
                    success: function(response) {
                        $('#contact_id').val(response.contact_id);
                        $('#phone').val(response.phone);
                    },
                    error: function() {
                        alert('Error fetching lead information');
                    }
                });
            });
        });
    </script>
@endsection
