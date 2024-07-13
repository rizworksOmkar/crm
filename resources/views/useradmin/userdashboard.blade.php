@extends('layouts.user-dashboard-layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="dashboard_main_top">
        <div class="row">
            <div class="col-lg-6">
                <div class="dashboard_top_boxed">
                    <div class="dashboard_top_icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="dashboard_top_text">
                        <h3>Total bookings</h3>
                        <h1>{{ $detailsCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dashboard_top_boxed">
                    <div class="dashboard_top_icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="dashboard_top_text">
                        <h3>Pending bookings</h3>
                        <h1>{{ $pendingDetails }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard_common_table">
        <h3>My bookings</h3>
        <div class="table-responsive-lg table_common_area">
            <table class="table table-striped table-hover" style="width:100%; font-size:13px" id="tableBooking">
                <thead>
                    <tr>
                        <th>Sl no.</th>
                        <th>Booking ID</th>
                        <th>Journey Date</th>
                        <th>Package Name</th>
                        <th>Package amount</th>
                        <th>No Of Riders</th>
                        <th>Status</th>
                        <th>Merchant Transaction ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($detailsCount > 0)
                        @php $i=0; @endphp
                        @foreach ($details as $item)
                            @php $i++; @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->booking_code }} </td>
                                <td>{{ date('d-m-Y', strtotime($item->journey_date)) }}</td>
                                <td>{{ getpackageName($item->pacakge_id) }}</td>
                                <td>
                                    @if ($item->pacakge_cost)
                                        <i class="fas fa-rupee-sign fa-xs"></i> {{ $item->pacakge_cost }} / <br />
                                        <small>Per Person</small>
                                    @else
                                    @endif

                                </td>
                                <td>
                                    <ul>
                                        <li> Adult : {{ $item->no_of_adult }}</li>
                                        <li> Child : {{ $item->no_of_child }}</li>
                                        <li> Infant : {{ $item->no_of_infant }}</li>
                                    </ul>
                                </td>
                                <th>
                                    {{-- $data['paymentStatus'] = ['Pending', 'Success', 'Failed']; --}}
                                    @if ($item->booking_status == 0)
                                        <span class="text-primary">Pending</span>
                                    @elseif ($item->booking_status == 1)
                                        <span class="text-success">Success</span>
                                    @elseif ($item->booking_status == 2)
                                        <span class="text-danger">Failed</span>
                                    @endif
                                </th>
                                <td>{{ $item->merchantTransactionId }}</td>
                                <td>
                                    @if ($item->booking_status == 0)
                                        <a href="{{ url('/user/viewBooking/' . $item->booking_code) }}"
                                            class="btn btn-icon btn-sm btn-dark" data-toggle="tooltip"
                                            title="View Details"><i class="far fa-eye"></i></a>
                                    @elseif ($item->booking_status == 1)                                            
                                        <a href="{{ url('/user/downloadBooking/' . $item->booking_code) }}"
                                            class="btn btn-icon btn-sm btn-dark" data-toggle="tooltip"
                                            title="View Details"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    @elseif ($item->booking_status == 2)
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="pagination_area">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">«</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">»</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</div> --}}
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableBooking').DataTable({
                "scrollX": true,
                "scrollY": true,
                stateSave: true,
                "paging": false,
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
