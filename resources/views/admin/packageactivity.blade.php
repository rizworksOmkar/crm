@extends('layouts.admin-front')
@section('content')
<form id="add_package_activity_form">
    {{ csrf_field() }}
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Add Package Activity</h4>
            </div>
            <div class="card-body">
                <form id="frmmealtype">
                    <div class="form-group">
                        <label for="package_activity">Input Package Activity *</label>
                        <input type="text" class="form-control" id="package_activity" name="package_activity">
                    </div>
                    <div class="form-group">
                        <label for="state_id" class="col-sm-12 col-form-label">Image Upload</label>
                        <div class="cropme" style="width: 330px; height: 220px;"></div>
                        <input type="hidden" id="icon_photo" name="icon_photo" class="form-control">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add +</button>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.cropme').simpleCropper();
            $('#add_package_activity_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.packageactivity.store') }}",
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
