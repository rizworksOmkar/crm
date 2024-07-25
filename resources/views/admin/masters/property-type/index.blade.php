@extends('layouts.admin-front')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_property_type_form" action="{{ route('property-types.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Property Type</h4>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">
                        <label for="property_type">Add Property Type</label>
                        <input type="text" class="form-control" id="property_type" name="property_type" placeholder="Enter Property Type">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/source" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>
    </div>
@endsection
