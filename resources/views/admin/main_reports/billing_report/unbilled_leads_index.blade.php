@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Unpaid Billed Lead Report</h4>
                    <div class="card-header-action">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                            <thead>
                                <tr>
                                    <th>Lead Number</th>
                                    <th>Customer</th>
                                    <th>To Pay</th>
                                    <th>Assigned to</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leadsWithoutBills as $lead)
                                    <tr>
                                        <td>{{ $lead->lead_num }}</td>
                                        <td>{{ $lead->contact->name }}</td>
                                        <td>{{ $lead->max_budegt }}</td>
                                        <td>{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
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
@endsection
