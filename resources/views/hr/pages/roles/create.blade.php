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
          <a href="{{ route('hr.roles.create') }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Roles </a>
          <a href="{{ route('hr.roles.assign') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Assign Role </a>
          <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff with Roles </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow mb-3">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Roles</h3>
          </div>
          <div class="card-body border-custom">
            <form class="form-horizontal" action="{{ route('hr.roles.new') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-8">
                      <input type="text" name="role" placeholder="Role" class="form-control @error('role') is-invalid @enderror" id="role">
                      <small class="text-danger" style="font-size: 10px;">Use Abbreviations and in uppercase. E.g DEAN for Dean of Students, HR for Human resource</small>
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
        </div>
        <div class="card shadow">
            <div class="card-header border-custom pt-1 pb-1">
              <h3 class="card-title text-custom">Staff Roles</h3>
            </div>
            <div class="card-body border-custom">
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Role</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->role }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                {!! Form::open(['route' => ['hr.roles.delete', $role->id], 'method' => 'post', 'style' => 'display:inline']) !!}
                                <button title="Delete" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach

              </table>
              {{ $roles->links() }}
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
