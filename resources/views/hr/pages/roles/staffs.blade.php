@extends('hr.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom">Manage Staff Roles</h4>
            </div>
          <a href="{{ route('hr.roles.create') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Roles </a>
          <a href="{{ route('hr.roles.assign') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Assign Role </a>
          <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff with Roles </a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header border-custom pt-1 pb-1">
              <h3 class="card-title text-custom">Staff with Roles</h3>
            </div>
            <div class="card-body border-custom">
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Staff</th>
                          <th>Department</th>
                          <th>Faculty</th>
                          <th>Role</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                @if(count($staffs) > 0)
                @foreach ($staffs as $key => $staff)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td style="text-transform: capitalize">{{ $staff->name }}</td>
                        <td>{{ $staff->department }}</td>
                        <td>{{ $staff->faculty }}</td>
                        <td>{{ $staff->role }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('hr.role.deassign', $staff->staff_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" title="De-assign Role" onclick="confirm('Are you sure?')" class="btn btn-light"><span class="text-primary">De-assign</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>No Data available</tr>
                @endif
                  </tbody>

              </table>
              {{ $staffs->links() }}
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
