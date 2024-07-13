@extends('layouts.admin-front')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <form id="add_hotelroom_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Create Room</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form id="frmhotel">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Select Hotel</label>
                                <select name="hotelid" id="hotelid" class="form-control select2">
                                    <option value="0">Select Hotel</option>
                                    @foreach ($listofHotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Room Name</label>
                                <input type="text" id="roomtype" name="roomtype" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Room Sq.Ft</label>
                                <input type="text" id="sqfit" name="sqfit" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Bed Type</label>
                                <input type="text" id="bedtype" name="bedtype" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Max Guests</label>
                                <input type="text" id="maxguest" name="maxguest" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Room View</label>
                                <input type="text" id="roomview" name="roomview" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="icon_photo" class="col-sm-3 col-form-label">Upload Room Image</label>
                                <div class="col-sm-9">
                                    <div class="cropme" style="width: 300px; height: 400px;"></div>
                                    <input type="hidden" id="icon_photo" name="icon_photo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="hotel_name">Rooms Description *</label>
                                <textarea class="summernote" id="room_description" name="room_description"></textarea>
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="hotel_name">Rack Rate</label>
                                <input type="text" id="rackrate" name="rackrate" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Cost</label>
                                <input type="text" id="txtcost" name="txtcost" class="form-control">
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label for="selecttax">Tax</label>
                                <select name="selecttax" id="selecttax" class="form-control">
                                    <option value="0">Choose</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Including Tax</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" id="includingtax" name="includingtax"
                                        class="form-control numberonly" disabled="true">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Base Discount</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" id="bacediscount" name="bacediscount"
                                        class="form-control numberonly">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_name">Specile Discount</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" id="sepecialdiscount" name="sepecialdiscount"
                                        class="form-control numberonly">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="hotel_name">Original Ammount</label>
                                <input type="text" id="originalamount" name="originalamount" class="form-control">
                            </div> --}}
                        </div>
                    </form>
                </div>
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
            $('.cropme').simpleCropper();
            $('.numberonly').keypress(function(e) {
                var charCode = (e.which) ? e.which : event.keyCode;
                if (String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;
            });

            $('select[name="selecttax"]').change(function() {
                var value = $(this).val();                
                if (value == 0 || value == 2){
                    $('input[name="includingtax"]').prop('disabled', true);
                    
                }else{                    
                    $('input[name="includingtax"]').prop('disabled', false);
                }
              
            });

            
        });
        $('#add_hotelroom_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-hotelRooms-store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Data Save Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    window.location.replace(
                                                    "/hotelRoomWithPrice");
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
    </script>
@endsection
