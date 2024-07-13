@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="row">

        <div class="col-md-12">


            <div class="card">
                <div class="card-header">
                    <h4>Rule Engine For Home Page Banner</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tblHomepagebanner">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Images</th>
                                    <th>Banner Heading 1</th>
                                    <th>Banner Heading 2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($banner as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td><img src="{{ $data->slider_image }}" class="admin-img-gallery rounded" />
                                        </td>
                                        <td>{{ $data->slider_title_1 }}</td>
                                        <td>{{ $data->slider_title_2 }}</td>
                                        <td>
                                            <div class="buttons">

                                                {{-- <a href="{{ url('/admin/user/edit/' . $data->id) }}"
                                                class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                title="view and Edit Your User"><i class="far fa-eye"></i></a> --}}

                                                <a submitid="{{ $data->id }}" class="btn btn-icon btn-sm btn-danger"
                                                    data-toggle="tooltip" title="Delete your Banner"
                                                    href="javacript:void(0)" id="deleteBanner_{{ $data->id }}"><i
                                                        class="fas fa-times"></i></a>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form id="homepagebannerform">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ddMode">Select Mode *</label>
                                <select class="custom-select" id="ddMode" name="ddMode"
                                    class="form-control form-control-sm">
                                    <option value="0">Choose Mode</option>
                                    <option value="destination">Specific Destination</option>
                                    <option value="package">Specific Package</option>
                                    <option value="hotel">Specific Hotel</option>
                                    <option value="sight">Specific Sight</option>
                                    <option value="offbeatpackages">Off Beat Packages</option>
                                    <option value="infopage">Info Page</option>
                                    <option value="services1">Services-1</option>
                                    <option value="services2">Services-2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="title1">Home Page Banner Title 1 *</label>
                                <input type="text" class="form-control" name="title1" id="title1">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="title2">Home Page Banner Title 2 *</label>
                                <input type="text" class="form-control" name="title2" id="title2">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="paragraph">Home Page Banner paragraph 1 *</label>
                                <input type="text" class="form-control" name="paragraph1" id="paragraph1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="paragraph">Home Page Banner paragraph 2 *</label>
                                <input type="text" class="form-control" name="paragraph2" id="paragraph2">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="secondary_photo_1" class="col-sm-12 col-form-label">Upload Slider Photo <p>
                                    <small>(width
                                        1920px
                                        & height 920px)</small></p> </label>
                            <div class="col-sm-12">
                                <div class="image-preview-container">
                                    <div class="preview">
                                        <img id="preview-selected-image" />
                                    </div>                                    
                                    <label for="file-upload">Upload</label>                                    
                                    <input type="file" id="file-upload" accept="image/*" onchange="previewImage(event);"
                                        name="fpBannerphoto" />

                                </div>
                                {{-- <div class="cropme" style="width: 1145px; height: 620px;"></div>
                                <input type="hidden" id="icon_photo" name="icon_photo" class="form-control"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="addbannerImages">Add +</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
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
            // $('.cropme').simpleCropper();
            $('#tblHomepagebanner').DataTable({
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
                        title: "Slider Image Uploading Fail",
                        text: "Upload Slider Image in less than 1 MB!",
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
        $('#addbannerImages').click(function(event) {
            event.preventDefault();
            var myform = document.getElementById("homepagebannerform");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('homepage-banner-store') }}",
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
                                //window.location.replace("/storehomepagebanner");;
                                location.reload();
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
    </script>
    @if ($banner)
        @foreach ($banner as $data)
            <script>
                $('#deleteBanner_{{ $data->id }}').click(function() {
                    swal({
                            title: "Do you want to delete your selected Banner?",
                            text: "Once deleted, you will never get this Banner back. It will have to be rebuilt a new ",
                            icon: "warning",
                            buttons: true,
                            showCancelButton: true,
                            dangerMode: true,
                            confirmButtonColor: "#0D83DA",
                            confirmButtonText: "Confirm ",
                            cancelButtonColor: "#E21A4F ",
                            cancelButtonText: "Cancel",
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).attr('submitid');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ route('admin.ruleengine-banner.Delete') }}",
                                    method: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: id
                                    },
                                    success: function(response) {
                                        swal({
                                            icon: "success",
                                            text: "Banner deleted successfully",
                                        }).then((willconfirm) => {
                                            if (willconfirm) {
                                                location.reload();
                                            }
                                        });
                                    }
                                });
                            } else {
                                swal("Your file is safe!");
                            }
                        });
                });
            </script>
        @endforeach
    @endif
@endsection
