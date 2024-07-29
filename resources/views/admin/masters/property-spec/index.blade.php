@extends('layouts.admin-front')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_property_spec_form" action="{{ route('property-specs.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Create Property Spec</h4>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">
                        <label for="property_spec">Add Property Spec</label>
                        <input type="text" class="form-control" id="property_spec" name="property_spec" placeholder="Enter Property Spec">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/source" class="btn btn-danger ml-5">Back To Main Menu</a>
                </div>
            </div>
        </form>

    </div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Property Specification</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                  <thead>
                    <tr>
                      <th>Sl no</th>
                      <th>Property Specifications</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($propertySpecs as $propSpec)
                      <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $propSpec->property_spec }}</th>
                        <td>

                          <form style="display: inline-block;" method="POST" action="{{ route('property-specs.destroy', $propSpec->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this property type?')">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
