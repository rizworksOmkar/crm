@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('styles')
@endsection
@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Add Package Type</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="package_type">Input Package Type</label>
                    <input type="text" class="form-control" id="package_type" name="package_type">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Package Type Icon set</label><br />
                        <div class="cropme" style="width: 50px; height: 48px;"></div>
                        <input type="hidden" id="icon_photo" name="image" value="">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="submitPackage">Add +</button>
            </div>
        </div>
    </div>
    {{-- </form> --}}
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
            // let html =
            //     `<img src="{{ empty($user->image) ? asset('assets/user/blank.png') : asset('assets/user/propics/' . $user->image) }}" alt="">`;
            // $(".cropme").html(html);
        });
        $('#submitPackage').click(function(event) {
            event.preventDefault();
            //var formData = $(this).serialize();
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
                    url: "{{ route('admin.packagetype.store') }}",
                    type: "POST",
                    // data: new FormData(myform),
                    data: {
                        "_token": "{{ csrf_token() }}",
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
