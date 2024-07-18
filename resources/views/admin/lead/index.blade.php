@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Leads</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin-create-lead') }}" class="btn btn-primary">Add Lead</a>
                    </div>
                    <div class="card-header-action">

                        <select id="status-filter" class="form-control">
                            <option value="">All Statuses</option>
                            <option value="new">New</option>
                            <option value="in_progress">In Progress</option>
                            <option value="closed_won">Closed & Won</option>
                            <option value="closed_failed">Closed & Failed</option>
                        </select>
                    </div>
                    <div class="card-header-action">

                        <button id="clear-filter-btn" class="btn btn-danger ml-2">Clear Filter</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableLead">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Entity Name</th>
                                    <th>Lead Number</th>
                                    <th>Desc</th>
                                    <th>Budget</th>
                                    <th>Due Date</th>
                                    <th>Area Req</th>
                                    <th>Property Type</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Created by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($leads as $lead)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        {{-- <th>{{ $lead->id }}</th> --}}
                                        <th>{{ $lead->contact->name }}</th>
                                        <th>{{ $lead->lead_num }}</th>
                                        <th>{{ $lead->description }}</th>
                                        <th>{{ $lead->budget }}</th>
                                        <th>{{ $lead->expiry }}</th>
                                        <th>{{ $lead->area_requirements }}</th>
                                        <th>{{ $lead->property_type }}</th>
                                        <th>{{ $lead->status }}</th>
                                        <th>{{ $lead->assignedTo->first_name }} {{ $lead->assignedTo->last_name }}</th>
                                        <th>{{ $lead->createdBy->role_type === 'user' ? 'Employee' : 'Admin' }}</th>
                                        <td>
                                            <div class="buttons">
                                                <a submitid="{{ $lead->id }}"
                                                    class="btn btn-icon btn-sm btn-danger delete-lead-btn"
                                                    data-toggle="tooltip" title="Delete Lead" href="javascript:void(0)"
                                                    id="deleteLead_{{ $lead->id }}"><i class="fas fa-times"></i></a>

                                                <a href="{{ route('leads.edit', $lead->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('view.showEmpTasks', $lead->id) }}"class="btn btn-icon btn-sm btn-info"
                                                    data-toggle="tooltip" title="View employee Task"><i
                                                        class="far fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tableLead').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": true,
                "info": true,
                dom: 'Bfrtip',
            });

            $('#status-filter').on('change', function() {
                var status = $(this).val();
                table.columns(8).search(status).draw();
            });

            $('#clear-filter-btn').click(function() {
                table.search('').columns().search('').draw(); 
            });
        });
    </script>

    @if ($leads)
        @foreach ($leads as $lead)
            <script>
                $(document).on('click', '.delete-lead-btn', function() {
                    var leadId = $(this).attr('submitid');
                    if (confirm('Are you sure you want to delete this lead?')) {
                        $.ajax({
                            url: '/leads/' + leadId,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                alert(response.message);
                                location.reload();
                            },
                            error: function(error) {
                                console.error('Error deleting lead:', error);
                                alert('Error: Unable to delete lead.');
                            }
                        });
                    }
                });
            </script>
        @endforeach
    @endif
@endsection
