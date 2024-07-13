@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('styles')
@endsection
@section('content')
    @if ($editPackagetypemastercount > 0)
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Package Type</h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="package_type_id" name="package_type_id" value="{{$editPackagetypemasterbyId->id}}">
                    <div class="form-group">
                        <label for="package_type">Input Package Type</label>
                        <input type="text" class="form-control" id="package_type" name="package_type" value="{{$editPackagetypemasterbyId->package_type	}}">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Package Type Icon set</label><br />
                            {{-- <input type="file" class="form-control" name='fpicon_image1' accept="image/*"> --}}
                            <div class="cropme" style="width: 50px; height: 48px;"></div>
                            <input type="hidden" id="icon_photo" name="image" value="{{$editPackagetypemasterbyId->icone_image	}}">
                            {{-- <input type='file' id='fileInput' name='fpicon_image' accept='image/*'
                                class="fileInput"><canvas id='myCanvas' style='display:none;'></canvas>                             --}}

                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="submitPackage">Add +</button>
                </div>
            </div>
        </div>
    @else
    @endif

    <div id='modal'></div>
    <div id='preview'>
        <div class='buttons'>
            <div class='cancel'></div>
            <div class='ok'></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).ready(function() {
            $('.cropme').simpleCropper();
            let html =
                `<img src="{{ empty($editPackagetypemasterbyId->icone_image) ? asset('assets/user/blank.png') : '/'.$editPackagetypemasterbyId->icone_image }}" alt="">`;
            $(".cropme").html(html);
        });
        $('#submitPackage').click(function(event) {
            event.preventDefault();
            //var formData = $(this).serialize();
            var id = $('#package_type_id').val();
            var img = $('#icon_photo').val();
            var packagetype = $('#package_type').val();
            if (packagetype == "") {
                swal({
                    title: "Error",
                    text: "Please Input Package type.",
                    icon: "error",
                    button: "OK",
                }).then((willconfirm) => {
                    if (willconfirm) {
                        $('#package_type').focus();
                        return false;
                    }
                });
            } else if (img == "") {
                swal({
                    title: "Error",
                    text: "Please Select Package type Icon.",
                    icon: "error",
                    button: "OK",
                }).then((willconfirm) => {
                    if (willconfirm) {

                        return false;
                    }
                });
            } else {
                //var myform = document.getElementById("add_packagetype_form");
                $.ajax({
                    url: "{{ route('admin.packagetype.update') }}",
                    type: "POST",
                    // data: new FormData(myform),
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "image": img,
                        "packagetype": packagetype
                    },
                    // contentType: false,
                    // processData: false,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Data Updated Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    window.location.replace("/package-type-index");;
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
            }
        });
    </script>
@endsection
