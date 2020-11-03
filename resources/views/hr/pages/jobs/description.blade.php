@extends('hr.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
          <a href="index.html" class="list-group-item active main-color-bg">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Manage Jobs
          </a>
          <a href="{{ route('hr.jobs') }}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Jobs </a>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card mb-3 shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">New Job Description</h3>
          </div>
          <div class="card-body border-custom">
            <form class="form-horizontal" action="{{ route('hr.jobs.description.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-8">
                      <input type="hidden" name="job_id" value="{{ $job->id }}"/>
                      <textarea name="description" placeholder="Job Description" class="form-control @error('description') is-invalid @enderror" id="description">{!!old('description')!!}</textarea>
                      @error('description')
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
          <h3 class="card-title text-custom">Job Descriptions for {{ $job->title }}</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Job Title</th>
                  <th>Action</th>
                </tr>
                @if(count($descriptions) > 0)
                @foreach ($descriptions as $key => $description)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $description->description }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            {{-- <a href="#"><button title="Manage Descriptions" class="btn btn-light"><span class="fa fa-tasks text-dark"></span></button></a> --}}
                            <a href="{{ route('hr.jobs.description.delete', $description->id) }}" title="Delete Job title" class="btn btn-light"><span class="fa fa-times-circle text-primary"></span></a>
                        </div>
                    </td>
                    </tr>
                @endforeach
                @else
                <tr> No data available</tr>
                @endif
              </table>
              {{ $descriptions->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
