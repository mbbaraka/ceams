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
              <h4 class="text-custom">Manage Staffs</h4>
            </div>
          <a href="{{ route('hr.staffs') }}" class="list-group-item list-group-item-action active border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staffs List </a>
          <a href="{{ route('hr.staffs.pending') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Pending Staffs </a>
          <a href="{{ route('hr.staffs.create') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Staff </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staffs List</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
                @foreach ($staffs as $key => $staff)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="text-transform: capitalize">{{ $staff->name }}</td>
                    <td>{{ $staff->job_title }}</td>
                    <td>{{ $staff->department }}</td>
                    <td>
                        <div class="btn-group" role="group">
                        <a href="#viewModal{{ $staff->staff_id }}" data-toggle="modal"><button title="View Profile" class="btn btn-light"><span class="fa fa-eye text-dark"></span></button></a>
                            <div class="modal fade show" id="viewModal{{ $staff->staff_id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Viewing {{ $staff->name }}'s Profile</h3>
                                            <button class="close" type="button" data-dismiss="modal">&times;</button>
                                        </div>
                                        @include('hr.pages.staffs.view')
                                    </div>
                                </div>
                            </div>
                            <a href="#editModal{{$staff->staff_id}}" title="Edit" class="btn btn-light" data-toggle="modal"><span class="fa fa-edit text-primary"></span></a>
                            <div class="modal fade show" id="editModal{{ $staff->staff_id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 style="text-transform: capitalize">Editing {{ $staff->name }}'s Profile</h3>
                                            <button class="close" type="button" data-dismiss="modal">&times;</button>
                                        </div>
                                        @include('hr.pages.staffs.edit')
                                    </div>
                                </div>
                            </div>
                            {!! Form::open(['route' => ['hr.staffs.delete', $staff->staff_id], 'method' => 'post', 'style' => 'display:inline']) !!}
                              <button title="Delete" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach

              </table>
              {{ $staffs->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
