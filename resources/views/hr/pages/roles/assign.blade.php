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
          <a href="{{ route('hr.roles.assign') }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Assign Role </a>
          <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff with Roles </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        {{-- <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Roles</h3>
          </div>
          <div class="card-body border-custom">
            <form class="form-horizontal" action="{{ route('hr.roles.new') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-8">
                      <input type="text" name="role" placeholder="Role" class="form-control @error('role') is-invalid @enderror" id="role">
                      @error('role')
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
        </div> --}}
        <div class="card shadow">
            <div class="card-header border-custom pt-1 pb-1">
              <h3 class="card-title text-custom">Assign Roles to Staff</h3>
            </div>
            <div class="card-body border-custom">
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Staff</th>
                          <th>Department</th>
                          <th>Faculty</th>
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
                        <td>
                            <div class="btn-group" role="group">
                                <button data-toggle="modal" data-target="#roleModal" title="Assign Role" class="btn btn-light"><span class="fa fa-cogs text-primary"></span></button>
                            </div>
                            {{-- role modal --}}
                            <div class="modal fade show" id="roleModal">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Select Role</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('hr.store.assign', $staff->staff_id) }}">
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <select class="form-control col-md-7" name="role">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->role }}">
                                                                {{ $role->role }} 
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="submit" class="col-md-4 btn btn-primary" value="Submit">

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
