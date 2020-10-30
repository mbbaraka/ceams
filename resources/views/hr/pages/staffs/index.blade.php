@extends('hr.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
          <a href="index.html" class="list-group-item active main-color-bg">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Manage Staffs
          </a>
          <a href="{{ route('hr.staffs') }}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staffs List <span class="badge">12</span></a>
          <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Pending Staffs <span class="badge">33</span></a>
          <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Departments <span class="badge">33</span></a>
          <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Something else <span class="badge">33</span></a>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card mb-3">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Overview</h3>
          </div>
          <div class="card-body border-custom">
            <div class="row">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="fa fa-bell" aria-hidden="true"></span> 12</h2>
                  <h4>Notifications</h4>
                </div>
              </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="fa fa-list-alt" aria-hidden="true"></span> 12</h2>
                    <h4>Pending</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="far fa-pencil" aria-hidden="true"></span> 33</h2>
                    <h4>Posts</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="fa fa-ambulance" aria-hidden="true"></span> 124</h2>
                    <h4>Visitors</h4>
                  </div>
                </div>
            </div>
          </div>
        </div>

          <!-- Latest Users -->
        <div class="card">
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
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->job_title }}</td>
                    <td>{{ $staff->department }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="#"><button title="View Profile" class="btn btn-light"><span class="fa fa-eye text-dark"></span></button></a>
                            <a href="#modal{{$staff->staff_id}}" title="Edit" class="btn btn-light" data-toggle="modal" data-target="#modal{{$staff->zstaff_id}}"><span class="fa fa-edit text-primary"></span></a>

                            {!! Form::open(['route' => ['courses.destroy', $staff->staff_id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                              <button title="Delete" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach

              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
