@extends('layouts.admin-front')
@section('content')
<form id="add_state_form">
    {{ csrf_field()  }}
<div class="card">
    <div class="card-header">
      <h4>Add State</h4>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="coutnry_id" class="col-sm-3 col-form-label">Select Domestic Country</label>
            <div class="col-sm-9">
              <select name="country_id" id="country_id" class="form-control form-control-sm">
                <option value="">Select</option>
                @foreach ($countries as $country )

                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach

              </select>

            </div>
          </div>
      <div class="form-group row">
        <label for="coutnry" class="col-sm-3 col-form-label">State Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="state_name" name="state_name" placeholder="State Name">
        </div>
      </div>
      <div class="form-group row">
        <label for="coutnry" class="col-sm-3 col-form-label">State Alias</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="state_alias" name="state_alias" placeholder="State Alias">
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Add +</button>

      <a href="/state-index" class="btn btn-danger ml-5">Back To Main Menu</a>
    </div>
  </div>
</form>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#add_state_form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('admin.state.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Data Updated Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                  swal({
                                            title: "Are you want add more state at this country?",
                                            //text: "Once deleted, you will never get this CITY back. It will have to be rebuilt a new ",
                                            icon: "warning",
                                            // buttons: true,
                                            buttons: ["No ! Go to Main menu",
                                                "Yes ! I want"
                                            ],
                                            showCancelButton: true,
                                            dangerMode: true,
                                            // confirmButtonColor: "#0D83DA",
                                            // confirmButtonText: "Yes ! I want ",
                                            // cancelButtonColor: "#E21A4F ",
                                            // cancelButtonText: "No ! Go to Main menu",
                                            closeOnConfirm: false,
                                            closeOnCancel: false
                                        })
                                        .then((willok) => {
                                            if (willok) {
                                               window.location.reload();
                                            } else {
                                                // swal("Your file is safe!");
                                                window.location.replace(
                                                    "/state-index")
                                            }
                                        });
                                    
                                }
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Error Occured. Please try again later.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    }
            });
        });
    });
</script>

@endsection
