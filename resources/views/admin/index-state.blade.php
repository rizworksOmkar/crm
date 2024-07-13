@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>State Master</h4>
                    <div class="card-header-action">

                        <a href="{{ route('admin.state') }}" class="btn btn-primary">Add State</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Country Name</th>
                                    <th>State Name</th>

                                    <th>State Alias</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($states as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ getCountryName($data->country_id) }}</td>
                                        <td>{{ $data->state_name }}</td>

                                        <td>
                                           {{$data->state_alias}}
                                        </td>
                                        <td>
                                            <div class="buttons">

                                                {{-- <a href="{{ url('/admin/user/edit/' . $data->id) }}"
                                                class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                title="view and Edit Your User"><i class="far fa-eye"></i></a> --}}

                                                <a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                    title="view and Edit Your Country"><i class="far fa-eye"></i></a>

                                                <a submitid="{{ $data->id }}" class="btn btn-icon btn-sm btn-danger"
                                                    data-toggle="tooltip" title="Delete your City"
                                                    href="javacript:void(0)" id="deleteCountry_{{ $data->id }}"><i
                                                        class="fas fa-times"></i></a>
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
