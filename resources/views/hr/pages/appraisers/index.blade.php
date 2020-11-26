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
          <a href="{{ route('hr.appraiser.list') }}" class="list-group-item list-group-item-action active border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> List </a>
          <a href="{{ route('hr.appraiser.new') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Create New </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Appraisers' List</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>No. of Appraisees</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($appraisers) > 0)
                    @foreach($appraisers as $key => $staff)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->department }}</td>
                        <td>{{ $staff->appraisee }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('hr.appraiser.appraisees', $staff->staff_id) }}"><button title="Manage Appraisees" class="btn btn-light"><span class="fa fa-tasks"></span></button></a>
                                <a href="{{ route('hr.appraiser.delete', $staff->staff_id) }}" title="De-assign" class="btn btn-light""><span class="fa fa-times-circle"></span></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>No data available</tr>
                    @endif
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
