@extends('layouts.admin-front')
@section('content')
    @if ($HotelAmenitiescount > 0)
        @foreach ($HotelAmenities as $item)
            <form id="add_property_form">
                {{ csrf_field() }}
                <div class="card">

                    <div class="card-header">
                        <h4>Add Amenities</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="coutnry" class="col-sm-3 col-form-label">Amenities Type</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="hdnId" name="hdnid" value="{{$item->id}}">
                                <input type="text" class="form-control" id="txtamenities" name="txtamenities" placeholder="Input Amenities Name" value="{{$item->amenities}}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add +</button>
                        <a href="/Amenities-index" class="btn btn-danger ml-5">Back To Main Menu</a>
                    </div>
                </div>
            </form>
        @endforeach
    @endif
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#add_property_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-Amenities-update') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Property Updated Successfully",
                                icon: "success",
                                button: "Ok",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    window.location.replace(
                                                    "/Amenities-index");
                                }
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Something went wrong",
                                icon: "error",
                                button: "Ok",
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
