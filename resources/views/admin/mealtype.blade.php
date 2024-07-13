@extends('layouts.admin-front')
@section('content')
<form id="add_mealtype_form">
    {{ csrf_field() }}
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Add Meal Type</h4>
            </div>
            <div class="card-body">
                <form id="frmmealtype">
                    <div class="form-group">
                        <label for="meal_type">Input Meal Type</label>
                        <input type="text" class="form-control" id="meal_type" name="meal_type">
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
            $('#add_mealtype_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.mealtype.store') }}",
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
