@extends('hr.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom">Manage Appraisers</h4>
            </div>
          <a href="{{ route('hr.appraiser.list') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> List </a>
          <a href="{{ route('hr.appraiser.new') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Create New </a>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card mb-3">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Assign Appraisees</h3>
          </div>
          <div class="card-body border-custom">
            <h4>Assign Appraisees to <i style="text-transform: capitalize">{{ $currentStaff->name }}</i></h4>
            <div class="">
                <form method="POST" class="form-horizontal" action="{{ route('hr.appraiser.assign', $id) }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-8">
                          <select name="staff" class="form-control @error('staff') is-invalid @enderror" id="staff">
                            @foreach ($staff as $staffs)
                                <option value="{{ $staffs->staff_id }}">{{ $staffs->name }}</option>
                            @endforeach
                          </select>
                          @error('staff')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>

          <!-- Latest Users -->
        <div class="card">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Appraisees List</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Faculty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($appraisees) > 0)
                    @foreach($appraisees as $key => $staff)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->department }}</td>
                        <td>{{ $staff->faculty }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a onclick="confirm('Are you sure of this?')" href="{{ route('hr.appraisee.deassign', $staff->staff_id) }}" title="De-assign" class="btn btn-light"><span class="fa fa-times-circle"></span></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>No data available</tr>
                    @endif
                </tbody>
            </table>
            {{ $appraisees->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
