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
              <h4 class="text-custom">Manage Jobs Titles</h4>
            </div>
          <a href="{{ route('hr.jobs') }}" class="list-group-item border-custom active list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Jobs </a>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card mb-3 shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Create New Job Title</h3>
          </div>
          <div class="card-body border-custom">
            <form class="form-horizontal" action="{{ route('hr.jobs.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-8">
                      <input type="text" name="title" placeholder="Job Title" class="form-control @error('title') is-invalid @enderror" id="role">
                      @error('title')
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

          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Job Titles Available</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Job Title</th>
                  <th>Action</th>
                </tr>
                @if(count($jobs) > 0)
                @foreach ($jobs as $key => $job)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $job->title }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('hr.jobs.description', $job->id) }}"><button title="Manage Descriptions" class="btn btn-light"><span class="fa fa-tasks text-dark"></span></button></a>
                            <button onclick="confirm('Are you sure of this?')" class="btn btn-light"><a href="{{ route('hr.jobs.delete', $job->id) }}" title="Delete Job title"><span class="fa fa-times-circle text-primary"></span></a></button>
                        </div>
                    </td>
                    </tr>
                @endforeach
                @else
                <tr> No data available</tr>
                @endif
              </table>
              {{ $jobs->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
