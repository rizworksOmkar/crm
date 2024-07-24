@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer Data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableCustomer">
                            <thead>
                                <tr>
                                    @foreach ($customerHeader as $column)
                                        <th>{{ $column }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerData as $row)
                                    <tr>
                                        @foreach ($row as $cell)
                                            <td>{{ $cell }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lead Data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableLead">
                            <thead>
                                <tr>
                                    @foreach ($leadHeader as $column)
                                        <th>{{ $column }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leadData as $row)
                                    <tr>
                                        @foreach ($row as $cell)
                                            <td>{{ $cell }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Import Leads</h4>
                </div>
                <div class="card-body">
                    <form id="importLeadsForm">
                        @csrf
                        <button type="submit" class="btn btn-primary">Import Leads</button>
                    </form>
                    <div id="importResult" class="mt-3"></div>
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
            var customerTable = $('#tableCustomer').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": true,
                "info": true,
                dom: 'Bfrtip',
            });

            var leadTable = $('#tableLead').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": true,
                "info": true,
                dom: 'Bfrtip',
            });

            $('#importLeadsForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('lead-imports') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#importResult').html('<div class="alert alert-info">Importing leads, please wait...</div>');
                    },
                    success: function(response) {
                        if(response.success) {
                            $('#importResult').html('<div class="alert alert-success">' + response.message + '</div>');
                            // Optionally refresh the lead table here
                            leadTable.ajax.reload();
                        } else {
                            $('#importResult').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#importResult').html('<div class="alert alert-danger">An error occurred: ' + error + '</div>');
                    }
                });
            });
        });
    </script>

@endsection
