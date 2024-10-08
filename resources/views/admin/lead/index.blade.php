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

                </div>
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <div class="form-inline">
                            <select id="column-select" class="form-control mr-2">
                                <option value="">Select Column</option>
                                <option value="1">Lead Source</option>
                                <option value="2">Lead Number</option>
                                <option value="3">Customer Name</option>
                                <option value="4">Lead Date</option>
                                <option value="5">Property Type</option>
                                <option value="6">Specific Location</option>
                                <option value="7">Max Budget</option>
                                <option value="8">Max Area (Sq ft)</option>
                            </select>
                            <input type="text" id="column-search" class="form-control mr-2" placeholder="Search term">
                            <button id="search-btn" class="btn btn-primary">Search</button>
                            <button id="clear-search-btn" class="btn btn-secondary ml-2">Clear</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableLead">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Lead Source</th>
                                    <th>Lead No.</th>
                                    <th>Customer Name</th>
                                    <th>Lead Date</th>
                                    <th>Property Type</th>
                                    <th>Specific Location</th>
                                    <th>Max Budget</th>
                                    <th>Max Area (Sq ft)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($leads as $lead)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <th>{{ $lead->lead_source }}</th>
                                        <th>{{ $lead->lead_num }}</th>
                                        <th>{{ $lead->contact->name }}</th>
                                        <th> {{ \Carbon\Carbon::parse($lead->created_at)->format('Y-m-d') }}</th>
                                        <th>{{ $lead->property_type }}</th>
                                        <th>{{ $lead->specific_location }}</th>
                                        <th>{{ $lead->max_budget }}</th>

                                        <th>{{ $lead->max_area }}</th>

                                        <td>
                                            <div class="buttons">
                                                <a submitid="{{ $lead->id }}"
                                                    class="btn btn-icon btn-sm btn-danger delete-lead-btn"
                                                    data-toggle="tooltip" title="Delete Lead" href="javascript:void(0)"
                                                    id="deleteLead_{{ $lead->id }}"><i class="fas fa-times"></i></a>

                                                <a href="{{ route('leads.edit', $lead->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('view.showEmpTasks', $lead->id) }}"class="btn btn-icon btn-sm btn-info"
                                                    data-toggle="tooltip" title="View employee activity"><i
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
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
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
                // dom: 'Bfrtip',
            });


                    // Column search functionality
        $('#search-btn').click(function() {
            var column = $('#column-select').val();
            var searchTerm = $('#column-search').val();

            if (column !== '') {
                table.column(column).search(searchTerm).draw();
            } else {
                table.search(searchTerm).draw();
            }
        });

        // Clear search filters
        $('#clear-search-btn').click(function() {
            $('#column-select').val('');
            $('#column-search').val('');
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
