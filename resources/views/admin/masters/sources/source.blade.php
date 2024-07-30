@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        <form id="add_lead_source_form" action="{{ route('lead-sources.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Lead Source</h4>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">
                        <label for="lead_source">Add Lead Source</label>
                        <input type="text" class="form-control" id="lead_source" name="lead_source" placeholder="Enter Lead Source">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/source" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>
    </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sources</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin-create-source') }}" class="btn btn-primary">Add Source</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Lead Sources</th>
                                    <th>State</th>
                                    <th>Change State</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sources as $source)
                                <tr>
                                  <th>{{ $loop->iteration }}</th>
                                  <th>{{ $source->lead_source }}</th>
                                  <th>
                                    @if ($source->state_lead_source == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">InActive</span>
                                    @endif
                                </th>
                                <th>

                                    <button id="toggle-status" data-status-id="{{ $source->id }}"
                                        class="btn btn-primary toggle-status">Changes
                                        Status</button>

                                </th>
                                  <td>

                                    <form style="display: inline-block;" method="POST" action="{{ route('lead-sources.destroy', $source->id) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this property type?')">Delete</button>
                                    </form>
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
            $('#tableCity').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": false,
                "info": false,
                // dom: 'Bfrtip',
                // buttons: [
                //     'excel', 'pdf'
                // ]
            });
        });

        $('.toggle-status').click(function() {
            var statusid = $(this).data('status-id');
            $.ajax({
                url: '/leadsourcechange/' + statusid + '/toggle-status',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {

                    alert(response.message);
                    location.reload();
                }
            });
        });
    </script>
    {{-- @if ($leads)
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
    @endif --}}
@endsection
