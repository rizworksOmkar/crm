@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Domestic Destination Tile</h4>
                </div>
                <div class="card-body">

                    {{-- <div class="form-group row">
                    <label for="id" class="col-sm-3 col-form-label">Select Tile 1</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="tile1" value="1">
                        <select name="id" id="id1" class="form-control form-control-sm">
                            <option value="">Select Destination</option>
                            @foreach ($destinations as $data)
                                <option value="{{ $data->id }}">{{ $data->destination_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-3 col-form-label">Select Tile 2</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="tile2" value="2">
                        <select name="id" id="id2" class="form-control form-control-sm">
                            <option value="">Select Destination</option>
                            @foreach ($destinations as $data)
                                <option value="{{ $data->id }}">{{ $data->destination_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="id" class="col-sm-3 col-form-label">Select Tile 3</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="tile3" value="3">
                        <select name="id" id="id4" class="form-control form-control-sm">
                            <option value="">Select Destination</option>
                            @foreach ($destinations as $data)
                                <option value="{{ $data->id }}">{{ $data->destination_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div> --}}
                    {{-- V2 --}}
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">Select Tile 1</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tile1" value="1">
                            <select name="id" id="id1" class="form-control form-control-sm">
                                <option value="">
                                    @if (isset($tiles[1]['selected_destination']))
                                        <p>Selected Destination: {{ $tiles[1]['selected_destination']->destination_name }}
                                        </p>
                                    @else
                                        Select Destination
                                    @endif
                                </option>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <div class="buttons">
                                <a href="#" class="btn btn-icon btn-danger" id="del1"><i
                                        class="fas fa-times"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">Select Tile 2</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tile2" value="2">
                            <select name="id" id="id2" class="form-control form-control-sm">
                                <option value="">
                                    @if (isset($tiles[2]['selected_destination']))
                                        <p>Selected Destination: {{ $tiles[2]['selected_destination']->destination_name }}
                                        </p>
                                    @else
                                        Select Destination
                                    @endif
                                </option>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <div class="buttons">

                                <a href="#" class="btn btn-icon btn-danger" id="del2"><i
                                        class="fas fa-times"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">Select Tile 3</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tile3" value="3">
                            <select name="id" id="id3" class="form-control form-control-sm">
                                <option value="">
                                    @if (isset($tiles[3]['selected_destination']))
                                        <p>Selected Destination: {{ $tiles[3]['selected_destination']->destination_name }}
                                        </p>
                                    @else
                                        Select Destination
                                    @endif
                                </option>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <div class="buttons">
                                <a href="#" class="btn btn-icon btn-danger" id="del3"><i
                                        class="fas fa-times"></i></a>
                            </div>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">Select Tile 4</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tile4" value="4">
                            <select name="id" id="id4" class="form-control form-control-sm">
                                <option value="">
                                    @if (isset($tiles[4]['selected_destination']))
                                        <p>Selected Destination: {{ $tiles[4]['selected_destination']->destination_name }}
                                        </p>
                                    @else
                                        Select Destination
                                    @endif
                                </option>
                                @foreach ($destinations as $data)
                                    <option value="{{ $data->id }}">{{ $data->destination_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <div class="buttons">
                                <a href="#" class="btn btn-icon btn-danger" id="del4"><i
                                        class="fas fa-times"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">Select Tile 5</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tile5" value="5">
                            <select name="id" id="id5" class="form-control form-control-sm">
                                <option value="">
                                    @if (isset($tiles[5]['selected_destination']))
                                        <p>Selected Destination: {{ $tiles[5]['selected_destination']->destination_name }}
                                        </p>
                                    @else
                                        Select Destination
                                    @endif
                                </option>
                                @foreach ($destinations as $data)
                                    <option value="{{ $data->id }}">{{ $data->destination_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <div class="buttons">
                                <a href="#" class="btn btn-icon btn-danger" id="del5"><i
                                        class="fas fa-times"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">Select Tile 6</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tile6" value="6">
                            <select name="id" id="id6" class="form-control form-control-sm">
                                <option value="">
                                    @if (isset($tiles[6]['selected_destination']))
                                        <p>Selected Destination: {{ $tiles[6]['selected_destination']->destination_name }}
                                        </p>
                                    @else
                                        Select Destination
                                    @endif
                                </option>
                                @foreach ($destinations as $data)
                                    <option value="{{ $data->id }}">{{ $data->destination_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <div class="buttons">
                                <a href="#" class="btn btn-icon btn-danger" id="del6"><i
                                        class="fas fa-times"></i></a>
                            </div>

                        </div>
                    </div>

                    {{-- @for ($i = 1; $i <= 8; $i++)
                        <div class="form-group row">
                            <label for="id" class="col-sm-3 col-form-label">Select Tile {{ $i }}</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="tile" value="{{ $i }}">
                                <select name="id" id="id{{ $i }}" class="form-control form-control-sm">
                                    <option value="">Select Destination</option>
                                    @foreach ($destinations as $data)
                                        <option value="{{ $data->id }}" @if ($data->id == $ruleEngineINDT['tile' . $i]) selected="selected" @endif>
                                            {{ $data->destination_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endfor --}}


                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#id1').on('change', function() {
                var destinationId = $(this).val(); // get the selected destination id
                var tile = $('input[name=tile1]').val(); // get the tile number                
                $.ajax({
                    url: "{{ route('admin.ruleengine.dom.store') }}", // the url where you want to POST
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // add csrf token to the data
                        destination_id: destinationId, // pass the destination id to the data
                        tile: tile // pass the tile number to the data
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
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
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
            //for id2
            $('#id2').on('change', function() {
                var destinationId = $(this).val(); // get the selected destination id
                var tile = $('input[name=tile2]').val(); // get the tile number
                $.ajax({
                    url: "{{ route('admin.ruleengine.dom.store') }}", // the url where you want to POST
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // add csrf token to the data
                        destination_id: destinationId, // pass the destination id to the data
                        tile: tile // pass the tile number to the data
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
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
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
            //for id3
            $('#id3').on('change', function() {
                var destinationId = $(this).val(); // get the selected destination id
                var tile = $('input[name=tile3]').val(); // get the tile number
                $.ajax({
                    url: "{{ route('admin.ruleengine.dom.store') }}", // the url where you want to POST
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // add csrf token to the data
                        destination_id: destinationId, // pass the destination id to the data
                        tile: tile // pass the tile number to the data
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
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
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
            //for id4
            $('#id4').on('change', function() {
                var destinationId = $(this).val(); // get the selected destination id
                var tile = $('input[name=tile4]').val(); // get the tile number
                $.ajax({
                    url: "{{ route('admin.ruleengine.dom.store') }}", // the url where you want to POST
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // add csrf token to the data
                        destination_id: destinationId, // pass the destination id to the data
                        tile: tile // pass the tile number to the data
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
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
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
            //for id5
            $('#id5').on('change', function() {
                var destinationId = $(this).val(); // get the selected destination id
                var tile = $('input[name=tile5]').val(); // get the tile number
                $.ajax({
                    url: "{{ route('admin.ruleengine.dom.store') }}", // the url where you want to POST
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // add csrf token to the data
                        destination_id: destinationId, // pass the destination id to the data
                        tile: tile // pass the tile number to the data
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
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
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
            //for id6
            $('#id6').on('change', function() {
                var destinationId = $(this).val(); // get the selected destination id
                var tile = $('input[name=tile6]').val(); // get the tile number
                $.ajax({
                    url: "{{ route('admin.ruleengine.dom.store') }}", // the url where you want to POST
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // add csrf token to the data
                        destination_id: destinationId, // pass the destination id to the data
                        tile: tile // pass the tile number to the data
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "City Added Successfully",
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
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });

            // Tile 1 Delete
            $("#del1").click(function() {
                var tile = $('input[name=tile1]').val();
                swal({
                        title: "Do you want to delete your selected Tile 1?",
                        text: "Once deleted, you will never get this Tile 1 back. It will have to be rebuilt a new ",
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
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            // Check Exist Or Not
                            $.ajax({
                                url: "{{ route('admin.ruleengine.dom.exist') }}", // the url where you want to POST
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}', // add csrf token to the data                       
                                    tile: tile // pass the tile number to the data
                                },
                                success: function(response) {
                                    if (response.message == 'success') {
                                        // Delete Rule
                                        $.ajax({
                                            url: "{{ route('admin.ruleengine.dom.Delete') }}",
                                            method: 'post',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                tile: tile 
                                            },
                                            success: function(response) {
                                                swal({
                                                    icon: "success",
                                                    text: "Tile 1 deleted successfully",
                                                }).then((willconfirm) => {
                                                    if (willconfirm) {
                                                        location
                                                        .reload();
                                                    }
                                                });
                                            }
                                        });

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "No Record Found at tile 1",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });

                        } else {
                            swal("Your file is safe!");
                        }
                    });

            });

            // Tile 2 Delete
            $("#del2").click(function() {
                var tile = $('input[name=tile2]').val();
                swal({
                        title: "Do you want to delete your selected Tile 2?",
                        text: "Once deleted, you will never get this Tile 2 back. It will have to be rebuilt a new ",
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
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            // Check Exist Or Not
                            $.ajax({
                                url: "{{ route('admin.ruleengine.dom.exist') }}", // the url where you want to POST
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}', // add csrf token to the data                       
                                    tile: tile // pass the tile number to the data
                                },
                                success: function(response) {
                                    if (response.message == 'success') {
                                        // Delete Rule
                                        $.ajax({
                                            url: "{{ route('admin.ruleengine.dom.Delete') }}",
                                            method: 'post',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                tile: tile 
                                            },
                                            success: function(response) {
                                                swal({
                                                    icon: "success",
                                                    text: "Tile 2 deleted successfully",
                                                }).then((willconfirm) => {
                                                    if (willconfirm) {
                                                        location
                                                        .reload();
                                                    }
                                                });
                                            }
                                        });

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "No Record Found at tile 2",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });

                        } else {
                            swal("Your file is safe!");
                        }
                    });

            });

            // Tile 3 Delete
            $("#del3").click(function() {
                var tile = $('input[name=tile3]').val();
                swal({
                        title: "Do you want to delete your selected Tile 3?",
                        text: "Once deleted, you will never get this Tile 3 back. It will have to be rebuilt a new ",
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
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            // Check Exist Or Not
                            $.ajax({
                                url: "{{ route('admin.ruleengine.dom.exist') }}", // the url where you want to POST
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}', // add csrf token to the data                       
                                    tile: tile // pass the tile number to the data
                                },
                                success: function(response) {
                                    if (response.message == 'success') {
                                        // Delete Rule
                                        $.ajax({
                                            url: "{{ route('admin.ruleengine.dom.Delete') }}",
                                            method: 'post',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                tile: tile 
                                            },
                                            success: function(response) {
                                                swal({
                                                    icon: "success",
                                                    text: "Tile 3 deleted successfully",
                                                }).then((willconfirm) => {
                                                    if (willconfirm) {
                                                        location
                                                        .reload();
                                                    }
                                                });
                                            }
                                        });

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "No Record Found at tile 3",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });

                        } else {
                            swal("Your file is safe!");
                        }
                    });

            });

            // Tile 4 Delete
            $("#del4").click(function() {
                var tile = $('input[name=tile4]').val();
                swal({
                        title: "Do you want to delete your selected Tile 4?",
                        text: "Once deleted, you will never get this Tile 4 back. It will have to be rebuilt a new ",
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
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            // Check Exist Or Not
                            $.ajax({
                                url: "{{ route('admin.ruleengine.dom.exist') }}", // the url where you want to POST
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}', // add csrf token to the data                       
                                    tile: tile // pass the tile number to the data
                                },
                                success: function(response) {
                                    if (response.message == 'success') {
                                        // Delete Rule
                                        $.ajax({
                                            url: "{{ route('admin.ruleengine.dom.Delete') }}",
                                            method: 'post',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                tile: tile 
                                            },
                                            success: function(response) {
                                                swal({
                                                    icon: "success",
                                                    text: "Tile 4 deleted successfully",
                                                }).then((willconfirm) => {
                                                    if (willconfirm) {
                                                        location
                                                        .reload();
                                                    }
                                                });
                                            }
                                        });

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "No Record Found at tile 4",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });

                        } else {
                            swal("Your file is safe!");
                        }
                    });

            });

            // Tile 5 Delete
            $("#del5").click(function() {
                var tile = $('input[name=tile5]').val();
                swal({
                        title: "Do you want to delete your selected Tile 5?",
                        text: "Once deleted, you will never get this Tile 5 back. It will have to be rebuilt a new ",
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
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            // Check Exist Or Not
                            $.ajax({
                                url: "{{ route('admin.ruleengine.dom.exist') }}", // the url where you want to POST
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}', // add csrf token to the data                       
                                    tile: tile // pass the tile number to the data
                                },
                                success: function(response) {
                                    if (response.message == 'success') {
                                        // Delete Rule
                                        $.ajax({
                                            url: "{{ route('admin.ruleengine.dom.Delete') }}",
                                            method: 'post',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                tile: tile 
                                            },
                                            success: function(response) {
                                                swal({
                                                    icon: "success",
                                                    text: "Tile 5 deleted successfully",
                                                }).then((willconfirm) => {
                                                    if (willconfirm) {
                                                        location
                                                        .reload();
                                                    }
                                                });
                                            }
                                        });

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "No Record Found at tile 5",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });

                        } else {
                            swal("Your file is safe!");
                        }
                    });

            });

            // Tile 6 Delete
            $("#del6").click(function() {
                var tile = $('input[name=tile6]').val();
                swal({
                        title: "Do you want to delete your selected Tile 6?",
                        text: "Once deleted, you will never get this Tile 6 back. It will have to be rebuilt a new ",
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
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            // Check Exist Or Not
                            $.ajax({
                                url: "{{ route('admin.ruleengine.dom.exist') }}", // the url where you want to POST
                                type: 'GET',
                                data: {
                                    _token: '{{ csrf_token() }}', // add csrf token to the data                       
                                    tile: tile // pass the tile number to the data
                                },
                                success: function(response) {
                                    if (response.message == 'success') {
                                        // Delete Rule
                                        $.ajax({
                                            url: "{{ route('admin.ruleengine.dom.Delete') }}",
                                            method: 'post',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                tile: tile 
                                            },
                                            success: function(response) {
                                                swal({
                                                    icon: "success",
                                                    text: "Tile 6 deleted successfully",
                                                }).then((willconfirm) => {
                                                    if (willconfirm) {
                                                        location
                                                        .reload();
                                                    }
                                                });
                                            }
                                        });

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "No Record Found at tile 6",
                                            icon: "error",
                                            button: "Ok",
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });

                        } else {
                            swal("Your file is safe!");
                        }
                    });

            });

        });
    </script>
@endsection
