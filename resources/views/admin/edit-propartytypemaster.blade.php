@extends('layouts.admin-front')
@section('content')
    @if ($hotelPropertytypecount > 0)
        @foreach ($hotelPropertytype as $item)
            <form id="add_property_form">
                {{ csrf_field() }}
                <div class="card">

                    <div class="card-header">
                        <h4>Add property type</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="coutnry" class="col-sm-3 col-form-label">Property Type</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="hdnId" name="hdnid" value="{{$item->id}}">
                                <input type="text" class="form-control" id="txtproperty" name="txtproperty"
                                    placeholder="Input Season Name" value="{{$item->propertytype}}">
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add +</button>

                        <a href="/city-index" class="btn btn-danger ml-5">Back To Main Menu</a>
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
                    url: "{{ route('admin-hotelproperty-update') }}",
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
                                                    "/hotelproperty-index");
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
