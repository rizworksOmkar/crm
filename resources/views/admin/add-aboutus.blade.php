@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <form id="formAboutUS">
        {{ csrf_field() }}


        <div class="card">
            <div class="card-header">
                <h4>Create About Us</h4>
            </div>
            @if ($aboutCount > 0)
                <div class="card-body">
                    @foreach ($aboutus as $item)
                        <input type="hidden" name="hdnid" id="hdnid" value="{{ $item->id }}">
                        <div class="form-group row">
                            <label for="coutnry_id" class="col-sm-3 col-form-label">Heading</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="txtHeading" name="txtHeading"
                                    placeholder="Write Heading" value="{{ $item->about_heading }}">


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state_id" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="txtTitle" name="txtTitle"
                                    placeholder="Write Title" value="{{ $item->aboutus_title }}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coutnry" class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <textarea class="summernote" id="content" name="content">{!! $item->aboutus_content !!}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card-body">
                    <div class="form-group row">
                        <input type="hidden" name="hdnid" id="hdnid" value="0">
                        <label for="coutnry_id" class="col-sm-3 col-form-label">Heading</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtHeading" name="txtHeading"
                                placeholder="Write Heading">


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="state_id" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtTitle" name="txtTitle"
                                placeholder="Write Title">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="coutnry" class="col-sm-3 col-form-label">Content</label>
                        <div class="col-sm-9">
                            <textarea class="summernote" id="content" name="content"></textarea>
                        </div>
                    </div>


                </div>
            @endif

            <div class="card-footer">
                @if ($aboutCount > 0)
                    <button type="submit" class="btn btn-primary" id="saveabout">Update +</button>
                @else
                    <button type="submit" class="btn btn-primary" id="saveabout">ADD +</button>
                @endif

            </div>
        </div>



    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#saveabout').click(function(event) {
                event.preventDefault();


                var id = $('#hdnid').val();

                var heading = $('#txtHeading').val();
                var title = $('#txtTitle').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });

                if (heading == '') {
                    swal({
                        title: "Error",
                        text: "Give Heading",
                        icon: "error",
                        button: "Ok",
                    }).then((willconfirm) => {
                        $('#txtHeading').focus();
                    });
                    return false
                } else if (title == '') {
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
                    var myform = document.getElementById("formAboutUS");
                    if (id > 0) {

                        $.ajax({
                            url: "{{ route('admin.aboutus.update') }}",
                            type: "POST",
                            data: new FormData(myform),
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.message == 'success') {
                                    swal({
                                        title: "Success",
                                        text: "About Us Updated Successfully",
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

                    } else {
                        $.ajax({
                            url: "{{ route('admin.aboutus.store') }}",
                            type: "POST",
                            data: new FormData(myform),
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.message == 'success') {
                                    swal({
                                        title: "Success",
                                        text: "About Us Saved Successfully",
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
                }

            });
        });
    </script>
@endsection
