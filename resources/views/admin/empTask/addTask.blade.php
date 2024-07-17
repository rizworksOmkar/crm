@extends('layouts.user-dashboard-layout')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        {{ $id }}
        <form id="add_lead_form" action="{{ route('leads.tasks.store', $id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Create Task</h4>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="expiry"> Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mode">Mode</label>
                            <select id="mode" class="form-control" name="mode">
                                <option value="Physical Meeting" selected>Physical Meeting</option>
                                <option value="Phone Call">Phone Call</option>
                                <option value="Online Meeting">Online Meeting</option>

                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="new" selected>New</option>
                            <option value="in_progress">In Progress</option>
                            <option value="closed">Closed & Positive</option>
                            <option value="closed">Closed & Failed</option>

                        </select>
                    </div>
                </div>
                {{-- lead type and Source --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/myLeads" class="btn btn-danger ml-5">Back To Leads</a>
                </div>
            </div>
        </form>
    </div>



@endsection

{{-- @extends('layouts.user-dashboard-layout') --}}
{{--
@section('content')
    <h1>Lead Details</h1>

    <div>
        <h2>Tasks</h2>


        <h3>Add New Task</h3>
        <form >
            @csrf
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div>
                <label for="date">Date</label>
                <input type="date" name="date" id="date" required>
            </div>
            <div>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" required>
            </div>
            <div>
                <label for="mode">Mode</label>
                <input type="text" name="mode" id="mode" required>
            </div>
            <button type="submit">Add Task</button>
        </form>
    </div>
@endsection --}}
