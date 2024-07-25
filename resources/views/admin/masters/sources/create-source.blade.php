@extends('layouts.admin-front')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_lead_source_form" action="{{ route('lead-sources.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Lead Source</h4>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">
                        <label for="lead_source">Add Lead Source</label>
                        <input type="text" class="form-control" id="lead_source" name="lead_source" placeholder="Enter Lead Source">
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
