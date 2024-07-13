@extends('layouts.admin-front')
@section('content')
<form id="add_transport_form">
    {{ csrf_field() }}
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Add Transport</h4>
            </div>
            <div class="card-body">
                <form id="add_country_form">
                    <div class="form-group">
                        <label for="transport_name">Input Transport</label>
                        <input type="text" class="form-control" id="transport_name" name="transport_name">
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
            $('#add_transport_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.transport.store') }}",
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
