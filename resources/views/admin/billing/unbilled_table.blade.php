<table class="table table-striped">
    <thead>
        <tr>
            <th>Lead Number</th>
            <th>Customer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leads as $lead)
    <tr>
        <td>{{ $lead->lead_num }}</td>
        <td>{{ $lead->contact->name }}</td>
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#raiseBillModal"
                data-lead-id="{{ $lead->id }}"
                data-lead-num="{{ $lead->lead_num }}"
                data-max-budget="{{ $lead->max_budget }}"
                data-agent-name="{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}"
                data-agent-id="{{ $lead->assignedTo->id }}">
                Raise Bill
            </button>
        </td>
    </tr>
@endforeach

    </tbody>
</table>

