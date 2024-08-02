@extends('layouts.admin-front')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Property Specification</h4>
        <div class="card-header-action">
            <a href="#" class="btn btn-primary" id="addPropertySpecBtn">Add Property Specs</a>
        </div>
      </div>
      <div class="card-body">
        <div id="addPropertySpecForm" style="display: none">
            <div class="col-12 col-md-6 col-lg-6">
                <form id="add_property_spec_form" action="{{ route('property-specs.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="card">
                    <div class="card-header">
                      <h4>Create Property Spec</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group col-md-6">
                        <label for="property_spec">Add Property Spec</label>
                        <input type="text" class="form-control" id="property_spec" name="property_spec"
                          placeholder="Enter Property Spec">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Create</button>
                      <a href="/source" class="btn btn-danger ml-5">Back To Main Menu</a>
                    </div>
                  </div>
                </form>

              </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover" style="width:100%;" id="tableState">
            <thead>
              <tr>
                <th>Sl no</th>
                <th>Property Specifications</th>
                <th>State</th>
                <th>Change State</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($propertySpecs as $propSpec)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <th>{{ $propSpec->property_spec }}</th>
                <th>
                  @if ($propSpec->state_property_spec	 == 1)
                  <span class="badge badge-success">Active</span>
                  @else
                  <span class="badge badge-danger">InActive</span>
                  @endif
                </th>
                <th>

                  <button id="toggle-status" data-status-id="{{ $propSpec->id }}"
                    class="btn btn-primary toggle-status">Changes
                    Status</button>

                </th>
                <td>

                  <form style="display: inline-block;" method="POST"
                    action="{{ route('property-specs.destroy', $propSpec->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                      onclick="return confirm('Are you sure you want to delete this property type?')">Delete</button>
                  </form>
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

        $('#addPropertySpecBtn').click(function() {
            $('#addPropertySpecForm').toggle();
        });


        $('.toggle-status').click(function() {
            var propid = $(this).data('status-id');
            $.ajax({
                url: '/propspecstatuschange/' + propid + '/toggle-status',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {

                    alert(response.message);
                    location.reload();
                }
            });
        });
    </script>

@endsection
