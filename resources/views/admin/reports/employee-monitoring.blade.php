{{-- @extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Data</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">

                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Total Leads</th>
                                        <th>Closed Successfully</th>
                                        <th>Closed with Failure</th>
                                        <th>Latest Task Status</th>
                                        <th>Lead Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeeReports as $report)
                                        <tr>
                                            <td>{{ $report['employee']->first_name }} {{ $report['employee']->last_name }}</td>
                                            <td>{{ $report['totalLeads'] }}</td>
                                            <td>{{ $report['totalClosedSuccessfully'] }}</td>
                                            <td>{{ $report['totalClosedWithFailure'] }}</td>
                                            <td>{{ $report['latestTaskStatus'] }}</td>
                                            <td><a href="" class="btn btn-sm btn-warning">View Lead Details</a></td>
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

    </script>

@endsection --}}
@extends('layouts.admin-front')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Employee Data</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Total Leads</th>
                                <th>Closed Successfully</th>
                                <th>Closed with Failure</th>
                                <th>Latest Task Status</th>
                                <th>Lead Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employeeReports as $report)
                            <tr>
                                <td>{{ $report['employee']->first_name }} {{ $report['employee']->last_name }}</td>
                                <td>{{ $report['totalLeads'] }}</td>
                                <td>{{ $report['totalClosedSuccessfully'] }}</td>
                                <td>{{ $report['totalClosedWithFailure'] }}</td>
                                <td>{{ $report['latestTaskStatus'] }}</td>
                                <td><a href="#" class="btn btn-sm btn-warning view-lead-details" data-employee-id="{{ $report['employee']->id }}">View Lead Details</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New section for lead details -->
<div id="leadDetailsSection" class="row mt-4" style="display: none;">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Lead Details</h4>
            </div>
            <div class="card-body">
                <div id="leadDetailsContent">
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
    $('#tableState').DataTable({
        "scrollX": true,
        stateSave: true,
        "paging": true,
        "ordering": false,
        "info": false,
    });

    $('.view-lead-details').on('click', function(e) {
        e.preventDefault();
        var employeeId = $(this).data('employee-id');

        $('#leadDetailsSection').show();



        $('html, body').animate({
            scrollTop: $("#leadDetailsSection").offset().top
        }, 1000);
    });
});
</script>
@endsection
