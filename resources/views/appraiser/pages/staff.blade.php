@extends('appraiser.layouts.app')

@section('title')
Appraisee List
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom" style="text-transform: capitalize">{{ $staff->name }}</h4>
            </div>
            <a href="{{ route('hr.roles.create') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff Particulars </a>
            <a href="{{ route('staff-achievements', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Staff Achivement </a>
            <a href="{{ route('achievements-assessment', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Achievement Assessment </a>
            <a href="{{ route('core-competences', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Core Competence Assessment </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comments </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Roles</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                {{-- @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->department }}</td>
                    <td>{{ $role->role }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="#"><button title="View Profile" class="btn btn-light"><span class="fa fa-eye text-dark"></span></button></a>
                            <a href="#modal{{$role->staff_id}}" title="De-assign" class="btn btn-light" data-toggle="modal" data-target="#modal{{$role->staff_id}}"><span class="fa fa-edit text-primary"></span></a>

                            {!! Form::open(['route' => ['courses.destroy', $role->staff_id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                              <button title="Delete" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach --}}

              </table>
              {{-- {{ $roles->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
