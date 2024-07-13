@extends('layouts.admin-front')
@section('styles')
    <style>
        /* Make all the conetnt of datatable in center of extra-charges */
        .extra-charges ul {
            display: flex;
            flex-direction: column;
            justify-content: left;
            align-items: left;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .extra-charges ul li {
            text-align: left;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hotel Rooms Details</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin-add-room-with-price') }}" class="btn btn-primary">Add Rooms</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover my-table" style="width:100%;" id="tableRoom">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Hotel Name</th>
                                    <th>Room Name</th>
                                    <th>Sq.Ft</th>
                                    <th>Bes Discount</th>
                                    {{-- <th>City Name</th>
                                    <th>Star</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($hotelRoomPrice as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ getHotelName($data->hotel_id) }}</td>
                                        <td>{{ $data->room_name }}</td>
                                        <td>{{ $data->room_size }}</td>
                                        <td>{{ $data->bace_discount }}</td>
                                        <td>
                                            <div class="buttons">

                                                {{-- <a href="{{ url('/season-edit/' . $data->id) }}"
                                                    class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                    title="view and Edit Your Season"><i class="far fa-eye"></i></a> --}}

                                                <a href="" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                    title="view and Edit Your Season"><i class="far fa-eye"></i></a>

                                                <a submitid="{{ $data->id }}" class="btn btn-icon btn-sm btn-danger"
                                                    data-toggle="tooltip" title="Delete your Room" href="javacript:void(0)"
                                                    id="deleteHotels_{{ $data->id }}"><i class="fas fa-times"></i></a>
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
            $('#tableRoom').DataTable({
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
    @if ($hotelRoomPrice)
        @foreach ($hotelRoomPrice as $data)
            <script>
                $('#deleteHotels_{{ $data->id }}').click(function() {
                    swal({
                            title: "Do you want to delete your selected HOTEL ROOM?",
                            text: "Once deleted, you will never get this HOTEL ROOM back. It will have to be rebuilt a new ",
                            icon: "warning",
                            buttons: true,
                            showCancelButton: true,
                            dangerMode: true,
                            confirmButtonColor: "#0D83DA",
                            confirmButtonText: "Confirm ",
                            cancelButtonColor: "#E21A4F ",
                            cancelButtonText: "Cancel",
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).attr('submitid');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ route('admin-hotelRoom-delete') }}",
                                    method: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: id
                                    },
                                    success: function(response) {
                                        swal({
                                            icon: "success",
                                            text: "HOTEL ROOM deleted successfully",
                                        }).then((willconfirm) => {
                                            if (willconfirm) {
                                                location.reload();
                                            }
                                        });
                                    }
                                });
                            } else {
                                swal("Your file is safe!");
                            }
                        });
                });
            </script>
        @endforeach
    @endif
@endsection
