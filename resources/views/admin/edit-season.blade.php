@extends('layouts.admin-front')
@section('content')
    @if ($seasoncount > 0)
        @foreach ($season as $item)
            <form id="add_season_form">
                {{ csrf_field() }}
                <div class="card">

                    <div class="card-header">
                        <h4>Add Season</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="coutnry" class="col-sm-3 col-form-label">Season</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="hdnId" name="hdnid" value="{{$item->id}}">
                                <input type="text" class="form-control" id="txtseason" name="txtseason"
                                    placeholder="input season name" value="{{$item->season_name}}">
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add +</button>

                        <a href="/city-index" class="btn btn-danger ml-5">Back To Main Menu</a>
                    </div>
                </div>
            </form>
        @endforeach
    @endif
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#add_season_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-season-update') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Season Updated Successfully",
                                icon: "success",
                                button: "Ok",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    window.location.replace(
                                                    "/season-index");
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
            });
        });

   
    </script>
@endsection
