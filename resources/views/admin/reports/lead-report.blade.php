<!-- resources/views/lead-report.blade.php -->
@extends('layouts.admin-front')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Lead Report</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width:100%;" id="tableLeadReport">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Lead Date</th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Total Tasks</th>
                                <th>Latest Task Date</th>
                                <th>Latest Task Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employeeReports as $report)
                                @foreach ($report['leadReports'] as $leadReport)
                                    <tr>

                                        <td>{{ $report['employee']->first_name }} {{ $report['employee']->last_name }}</td>
                                        <td>{{ $leadReport['lead_date'] }}</td>
                                        <td>{{ $leadReport['customer_name'] }}</td>
                                        <td>{{ $leadReport['phone'] }}</td>
                                        <td>{{ $leadReport['total_tasks'] }}</td>
                                        <td>{{ $leadReport['latest_task_date'] }}</td>
                                        <td>{{ $leadReport['latest_task_status'] }}</td>
                                        <td><a href="" class="btn btn-sm btn-warning">View Activity</a></td>

                                    </tr>
                                @endforeach
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
        $('#tableLeadReport').DataTable({
            "scrollX": true,
            stateSave: true,
            "paging": true,
            "ordering": true,
            "info": true,
        });
    });
</script>
@endsection
