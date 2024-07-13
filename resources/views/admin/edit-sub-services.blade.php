@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <form id="formServices">
        {{ csrf_field() }}


        <div class="card">
            <div class="card-header">
                <h4>Create Sub Services</h4>
            </div>
            @if ($editsubservicescount > 0)
                <div class="card-body">
                    @foreach ($editsubservices as $item)
                        <input type="hidden" name="hdnid" id="hdnid" value="{{ $item->id }}">

                        <div class="form-group row">
                            <label for="state_id" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="txtTitle" name="txtTitle"
                                    placeholder="Write Title" value="{{ $item->title }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secondary_photo_1" class="col-sm-3 col-form-label">Upload Service Images 
                            </label>

                            <div class="col-sm-9">
                                <div class="image-preview-container @if ($item->service_images) has-image @endif">
                                    {{-- <div class="preview">
                                        <img id="preview-selected-image" />
                                    </div> --}}
                                    @if ($item->service_images)
                                    
                                        <img id="preview-selected-image" src="{{ $item->service_images }}" class="img" />
                                    @else
                                        <div class="preview">
                                            <img id="preview-selected-image" />
                                        </div>
                                    @endif

                                    <label for="file-upload">Upload Image </label>
                                    {{-- <label for="file-upload">
                                            @if ($user->infoStatus == 1)
                                                Change Image
                                            @else
                                                Upload Image
                                            @endif
            
                                        </label> --}}
                                    <input type="file" id="file-upload" accept="image/*" onchange="previewImage(event);"
                                        name="fpBannerphoto" />

                                </div>
                                <input type="hidden" id="hdnImagepath" name="hdnImagepath" class="form-control"
                                    value="{{ $item->service_images }}" />
                                    <p>
                                        <code>image should be .png (width:109px height: 101)</code>
                                    <p>
                                {{-- <div class="cropme" style="width: 210px; height: 280px;"></div>
                                    <input type="hidden" id="secondary_photo_1" name="secondary_photo_1" class="form-control"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coutnry" class="col-sm-3 col-form-label">Small Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="smcontent" name="smcontent">{!! $item->short_content !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="coutnry" class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <textarea class="summernote" id="content" name="content">{!! $item->main_content !!}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="saveabout">Update +</button>
                <a href="/sub-services-page-index" class="btn btn-danger ml-5">Back To Main Menu</a>
            </div>
        </div>



    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var options2 = {
                'maxCharacterSize': 100,
                'originalStyle': 'originalTextareaInfo',
                'warningStyle': 'warningTextareaInfo',
                'warningNumber': 86,
                'displayFormat': '#input/#max | #words words'
            };
            $('#smcontent').textareaCount(options2);
        });
        const previewImage = (event) => {

            const files = event.target.files;
            if (files.length > 0) {
                var targetefilesize = files[0].size;
                if (targetefilesize > 1000000) {
                    swal({
                        title: "Picture Uploading Fail",
                        text: "Picture in less than 1 MB!",
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
        $('#saveabout').click(function(event) {
            event.preventDefault();
            var Title = $('#txtTitle').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            if (Title == '') {
                swal({
                    title: "Error",
                    text: "Give Title",
                    icon: "error",
                    button: "Ok",
                }).then((willconfirm) => {
                    $('#txtTitle').focus();
                });
                return false
            } else {
                var myform = document.getElementById("formServices");
                $.ajax({
                    url: "{{ route('admin-Sub-Services-update') }}",
                    type: "POST",
                    data: new FormData(myform),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Services Updated Successfully",
                                icon: "success",
                                button: "Ok",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    location.reload();
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
            }

        });
    </script>
@endsection
