<div class="card">
    <div class="card-body">
        {{-- <h6 class="mb-4 text-15">Basic</h6> --}}
        <table id="" class="table stripe group" style="width: 100%">
            <thead>
                <tr>
                    <th class="ltr:!text-left rtl:!text-right">Lead Number</th>
                    <th class="ltr:!text-left rtl:!text-right">Customer</th>
                    <th class="ltr:!text-left rtl:!text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->lead_num }}</td>
                        <td>{{ $lead->contact->name }}</td>
                       
                        <td>
                            
                            <button type="button" class="btn btn-success text-white btn bg-custom-500
                             border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600
                              focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring 
                              focus:ring-custom-100 active:text-white active:bg-custom-600 
                            active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20" 
                            data-toggle="modal"
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
    </div>
</div>
