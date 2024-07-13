@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <form id="add_pacaage_image_form">
        {{ csrf_field() }}
        <div class="card">

            <div class="card-header">
                <h4>Add Pacakage Images</h4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="package_id">Select Package *</label>
                        <select name="package_id" id="package_id" class="form-control form-control-sm">
                            <option value="">Select</option>
                            @foreach ($packages as $item)
                                <option value="{{ $item->id }}">{{ $item->package_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width:100%;" id="tablePacakageGallery">
                        <thead>
                            <tr>
                                <th style="display:none">Id</th>
                                <th>Package Name</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="state_id" class="col-sm-12 col-form-label">Gallery Image Upload <p><small>(minimum picture
                                in less than 1 MB)</small></p></label>
                    <div class="col-sm-12">
                        {{-- <div class="cropme" style="width: 930px; height: 450px;"></div>
                        <input type="hidden" id="icon_photo" name="icon_photo" class="form-control"> --}}
                        <div class="image-preview-container">

                            <div class="preview">
                                <img id="preview-selected-image" />
                            </div>

                            <label for="file-upload">Upload Image </label>

                            <input type="file" id="file-upload" accept="image/*" onchange="previewImage(event);"
                                name="fpGalleryImages" />

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="addImages">Add +</button>


            </div>
        </div>


    </form>
    {{-- Delete Modal for category and subcategory starts --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodal">Delete Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_pacakgegallery_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_pacakgegallery_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal for category and subcategory ends --}}
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            //$('.cropme').simpleCropper();
            $('#tablePacakageGallery').DataTable({
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
        const previewImage = (event) => {

            const files = event.target.files;
            if (files.length > 0) {
                var targetefilesize = files[0].size;
                if (targetefilesize > 1000000) {
                    swal({
                        title: "Gallery Picture Uploading Fail",
                        text: "Upload Gallery picture in less than 1 MB!",
                        icon: "error",
                    });
                    return false;
                } else {
                    const imageFiles = event.target.files;

                    const imageFilesLength = imageFiles.length;

                    if (imageFilesLength > 0) {
                        /**
                         * Get the image path.
                         */
                        const imageSrc = URL.createObjectURL(imageFiles[0]);
                        /**
                         * Select the image preview element.
                         */
                        const imagePreviewElement = document.querySelector("#preview-selected-image");
                        /**
                         * Assign the path to the image preview element.
                         */
                        imagePreviewElement.src = imageSrc;
                        /**
                         * Show the element by changing the display value to "block".
                         */
                        imagePreviewElement.style.display = "block";
                    }
                }
            } else {

                const imagePreviewElement = document.querySelector("#preview-selected-image");
                imagePreviewElement.src = "";
                imagePreviewElement.style.display = "none";
            }
        };
        $('#addImages').click(function(event) {
            event.preventDefault();
            var packageId = $('#package_id').val()
            var myform = document.getElementById("add_pacaage_image_form");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.pacakage-gallery.store') }}",
                type: "POST",
                data: new FormData(myform),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.message == 'success') {
                        swal({
                            title: "Success",
                            text: "Data Updated Successfully.",
                            icon: "success",
                            button: "OK",
                        }).then((willconfirm) => {
                            if (willconfirm) {
                                //window.location.replace("/addpackage");;
                                // $('#icon_photo').val("");
                                const imagePreviewElement = document.querySelector(
                                    "#preview-selected-image");
                                imagePreviewElement.src = "";
                                imagePreviewElement.style.display = "none";
                                if (packageId > 0) {
                                    $.ajax({
                                        url: "{{ route('admin.pacakage-gallery.get') }}",
                                        type: "GET",
                                        data: {
                                            "_token": "{{ csrf_token() }}",
                                            "id": packageId,
                                        },
                                        dataType: "json",
                                        success: function(data) {
                                            $('#tablePacakageGallery tbody').html(
                                                "");
                                            $.each(data.result, function(key,
                                                item) {

                                                $('#tablePacakageGallery tbody')
                                                    .append(
                                                        '<tr>' +
                                                        '<td style="display: none">' +
                                                        item.id +
                                                        '</td>' +
                                                        '<td>' +
                                                        item.name +
                                                        '</td>' +
                                                        '<td>' +
                                                        '<img src="' + item
                                                        .image +
                                                        '" class="admin-img-gallery rounded"/>' +
                                                        '</td>' +
                                                        '<td>' +
                                                        '<button type="button" value="' +
                                                        item
                                                        .id +
                                                        '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
                                                        '</td>' +
                                                        '</tr>'
                                                    );
                                            });
                                        }
                                    });
                                }
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

                },
            });
        });
        $(document).on('change', '#package_id', function() {
            var packageId = $(this).val();
            // alert(packageId);
            if (packageId > 0) {
                $.ajax({
                    url: "{{ route('admin.pacakage-gallery.get') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": packageId,
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#tablePacakageGallery tbody').html("");
                        console.log(data);
                        if (data) {
                            $.each(data.result, function(key, item) {

                                $('#tablePacakageGallery tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    item.id +
                                    '</td>' +
                                    '<td>' +
                                    item.name +
                                    '</td>' +
                                    '<td>' +
                                    '<img src="' + item.image +
                                    '" class="admin-img-gallery rounded"/>' +
                                    '</td>' +
                                    '<td>' +
                                    '<button type="button" value="' +
                                    item
                                    .id +
                                    '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
                                    '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            $('#tablePacakageGallery tbody').html("");
                        }
                    }
                });
            } else {
                $('#tablePacakageGallery tbody').html("");
                $('#icon_photo').html("");
            }


        });


        $(document).on('click', '.deleteRow', function(e) {
            e.preventDefault();
            var pacakge_id = $(this).val();
            // alert(pacakge_id);
            $('#delete_pacakgegallery_id').val(pacakge_id);
        });

        $('.delete_pacakgegallery_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_pacakgegallery_id = $('#delete_pacakgegallery_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteGallery/" + delete_pacakgegallery_id,
                success: function(responce) {
                    console.log(responce);
                    $('#success_message').text(responce.message);
                    $('#deletemodal').modal('hide');
                    var packageId = $('#package_id').val();

                    $.ajax({
                        url: "{{ route('admin.pacakage-gallery.get') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": packageId,
                        },
                        dataType: "json",
                        success: function(data) {

                            $('#tablePacakageGallery tbody').html(
                                "");
                            $.each(data.result, function(key,
                                item) {

                                $('#tablePacakageGallery tbody')
                                    .append(
                                        '<tr>' +
                                        '<td style="display: none">' +
                                        item.id +
                                        '</td>' +
                                        '<td>' +
                                        item.name +
                                        '</td>' +
                                        '<td>' +
                                        '<img src="' + item
                                        .image +
                                        '" class="admin-img-gallery rounded"/>' +
                                        '</td>' +
                                        '<td>' +
                                        '<button type="button" value="' +
                                        item
                                        .id +
                                        '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
