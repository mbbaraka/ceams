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
          <a href="{{ route('hr.staffs') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staffs List </a>
          <a href="{{ route('hr.staffs.pending') }}" class="list-group-item active list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Pending Staffs </a>
          <a href="{{ route('hr.staffs.create') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Staff </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Pending for Approval</h3>
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
                    <td style="text-transform: capitalize">{{ $staff->job_title }}</td>
                    <td style="text-transform: capitalize">{{ $staff->department }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            {!! Form::open(['route' => ['hr.staffs.pending.approve', $staff->staff_id], 'method' => 'post', 'style' => 'display:inline']) !!}
                              <button title="Approve" class="btn btn-light"><span class="">Approve</span></button>
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
