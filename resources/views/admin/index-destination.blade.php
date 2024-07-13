
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
                    <h4>Destination Master</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.destinationmaster') }}" class="btn btn-primary">Add Destination</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableDestination">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Destination Name</th>
                                    <th>Country Name</th>
                                    <th>State Name</th>
                                    <th>City Name</th>
                                    <th>Short Description</th>
                                    <th>Price & Discounts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($destinations as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ $data->destination_name }}</td>
                                        <td>{{ getCountryName($data->country_id) }}</td>
                                        <td>{{ getStateName($data->state_id) }}</td>
                                        <td>{{ getCityName($data->city_id) }}</td>
                                        <td>{{ $data->short_description }}</td>
                                        <td class="extra-charges">
                                            <ul>
                                                <li>Price range 1 : {{ $data->price_range_1 }}</li>
                                                <li>Price range 2 : {{ $data->price_range_2 }}</li>
                                                <li>On-season price : {{ $data->on_season_price }}</li>
                                                <li>Off-season price : {{ $data->off_season_price }}</li>
                                                <li>Agent discount : {{ $data->agent_discount }}</li>
                                                <li>Normal discount : {{ $data->normal_discount }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.destination-edit', ['id' => $data->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-destination" data-destination-id="{{ $data->id }}">Delete</a>
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
            $('#tableDestination').DataTable({
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


            $('.delete-destination').click(function(event) {
                event.preventDefault();

                var destinationId = $(this).data('destination-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, the destination will be permanently removed.",
                    icon: "warning",
                    buttons: ["Cancel", "Delete"],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Send delete request
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "/destination-delete/" + destinationId,
                            type: "GET",
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    swal({
                                        title: "Success",
                                        text: "Destination deleted successfully.",
                                        icon: "success",
                                    }).then((willConfirm) => {
                                        if (willConfirm) {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    swal({
                                        title: "Error",
                                        text: response.message,
                                        icon: "error",
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                swal({
                                    title: "Error",
                                    text: "An error occurred. Please try again later.",
                                    icon: "error",
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>


@endsection
