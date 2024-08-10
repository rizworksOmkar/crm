@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Unassigned Leads</h4>
                </div>
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <div class="form-inline">
                            <select id="column-select" class="form-control mr-2">
                                <option value="">Select Column</option>
                                <option value="1">Lead Source</option>
                            </select>
                            <input type="text" id="column-search" class="form-control mr-2" placeholder="Search term">
                            <button id="search-btn" class="btn btn-primary">Search</button>
                            <button id="clear-search-btn" class="btn btn-secondary ml-2">Clear</button>
                        </div>
                        <div class="form-inline mt-3">
                            <label for="min-date" class="mr-2">Start Date:</label>
                            <input type="date" id="min-date" class="form-control mr-2" placeholder="YYYY-MM-DD">
                            <label for="max-date" class="mr-2">End Date:</label>
                            <input type="date" id="max-date" class="form-control mr-2" placeholder="YYYY-MM-DD">
                            <button id="date-filter-btn" class="btn btn-primary">Filter</button>
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
                                    <th>Budget</th>
                                    <th>Area (Sq ft)</th>

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
                                        <th>{{ \Carbon\Carbon::parse($lead->created_at)->format('Y-m-d') }}</th>
                                        <th>{{ $lead->property_type }}</th>
                                        <th>{{ $lead->specific_location }}</th>
                                        <th>{{ $lead->min_budget }}-{{ $lead->max_budget }}</th>
                                        <th>{{ $lead->min_area }}-{{ $lead->max_area }}</th>

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
                $('#min-date').val('');
                $('#max-date').val('');
                table.search('').columns().search('').draw();
            });

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min-date').val();
                    var max = $('#max-date').val();
                    var date = data[4];

                    if ((min === '' && max === '') ||
                        (min === '' && date <= max) ||
                        (min <= date && max === '') ||
                        (min <= date && date <= max)) {
                        return true;
                    }
                    return false;
                }
            );

            $('#date-filter-btn').click(function() {
                table.draw();
            });
        });
    </script>
@endsection
