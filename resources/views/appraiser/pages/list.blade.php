@extends('appraiser.layouts.app')

@section('title')
Appraisee List
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Appraisee List</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover table-responsive-sm">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Faculty</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                @foreach ($staffs as $key => $staff)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->department }}</td>
                    <td>{{ $staff->faculty }}</td>
                    <td>{{ $staff->role }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('appraiser-staff', $staff->staff_id) }}" title="Take Action" class="btn btn-light"><span class="fa fa-tasks text-dark"></span></a>
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
