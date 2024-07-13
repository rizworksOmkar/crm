@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sight Master</h4>
                    <div class="card-header-action">
                        {{-- <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                          <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                            Delete</a>
                        </div>
                      </div> --}}
                        <a href="{{ route('admin.sightmaster') }}" class="btn btn-primary">Add Sight</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tablePackage">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Sight Name</th>
                                    <th>Country Name</th>
                                    <th>State Name</th>
                                    <th>City Name</th>
                                    <th>Ticket Price</th>
                                    <th>Visting Time</th>
                                    <th>Restrictions</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($sights as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ $data->sight_name }}</td>
                                        <td>{{ getCountryName($data->country_id) }}</td>
                                        <td>{{ getStateName($data->state_id) }}</td>
                                        <td>{{ getCityName($data->city_id) }}</td>
                                        <td>{{ $data->ticket_price }}</td>
                                        <td>{{ $data->visting_time }}</td>
                                        <td>{{ $data->restrictions }}</td>
                                        <td>{{ $data->notes }}</td>


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
            $('#tablePackage').DataTable({
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
