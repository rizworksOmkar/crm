@extends('layouts.admin-front')
@section('content')
    <form id="add_sight_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Add Sight</h4>
            </div>
            <div class="card-body">
                <form id="frmsight">
                    <div class="form-group">
                        <label for="sight_name">Input Sight Name *</label>
                        <input type="text" class="form-control" id="sight_name" name="sight_name"
                            placeholder="Input Sight Name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="city_id">Select City *</label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="0">Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country_id">Select Country *</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="0">Select Country</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state_id">Select State</label>
                            <select name="state_id" id="state_id" class="form-control">
                                <option value="0">Select State</option>
                            </select>
                        </div>


                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="ticket_price">Ticket Price</label>
                            <input type="text" class="form-control" id="ticket_price" name="ticket_price"
                                placeholder="Input Price">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="visiting_time">Visiting Time *</label>
                            <input type="text" class="form-control" id="visiting_time" name="visiting_time"
                                placeholder="Input Time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="restrictions">Restriction if any</label>
                        <textarea class="form-control" id="restrictions" name="restrictions" placeholder="1234 Main St"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notes">Note</label>
                        <textarea class="form-control" id="notes" name="notes" placeholder="1234 Main St"></textarea>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add +</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
        $('#city_id').on('change', function() {
            var cityId = $(this).val();

            if (cityId) {
                $.ajax({
                    url: '{{ route('getCityDetails', '') }}/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#country_id').empty().append('<option value="'+parseInt(data.country_id)+'">'+data.country_name+'</option>');
                        if (data.state_id) {
                            $('#state_id').empty().append('<option value="'+parseInt(data.state_id)+'">'+data.state_name+'</option>');
                        } else {
                            $('#state_id').empty();
                        }
                    }


                });
            } else {
                $('#country_id').val(0);
                $('#state_id').val(0);
            }
        });

            $('#add_sight_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.sight.store') }}",
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
                                    window.location.reload();
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
