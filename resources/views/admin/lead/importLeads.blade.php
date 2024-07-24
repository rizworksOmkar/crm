@extends('layouts.admin-front')
@section('content')
<div class="container">
    <h2>Upload Lead File</h2>
    <form action="{{ route('lead.preview') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="lead_file" accept=".csv,.xlsx" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Preview Data</button>
    </form>
</div>
@endsection
