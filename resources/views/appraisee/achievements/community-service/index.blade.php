@extends('layouts.app')

@section('title', 'Research Grants')

@section('content')

<div class="container">
    <div class="row">
      @include('partials.side')
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card">
          <div class="card-header">
              <h5>Research Activities<button data-toggle="modal" data-target="#modal" class="float-right btn btn-sm btn-primary">Add</button></h5>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-responsive-sm">
                  <tr>
                    <th>#</th>
                    <th>Activity</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th class="text-right">Action</th>
                  </tr>
                  @foreach($service as $key => $services)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $services->activity }}</td>
                      <td>{{ $services->date }}</td>
                      <td>{{ $services->venue }}</td>
                      <td class="text-right">
                        <div class="btn-group" role="group">
                          <a href="#modal{{$services->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$services->id}}"><span class="fa fa-edit text-primary"></span></a>

                          {!! Form::open(['route' => ['community-service.destroy', $services->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                            <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                          {!! Form::close() !!}
                        </div>
                      </td>
                      <!-- EDIT MODAL -->
                    <div class="modal fade" id="modal{{$services->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          {!! Form::open(['route' =>  ['community-service.update', $services->id], 'method' => 'put']) !!}
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit {{$services->research_applied_for}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          @include('appraisee.achievements.community-service.edit')
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                    </tr>

                  @endforeach
                </table>
                {{ $service->links() }}
          </div>
          </div>

      </div>
    </div>
  </div>
  <!-- Add Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('community-service.store') }}" method="post">
            @csrf
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Research Grant</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @include('appraisee.achievements.community-service.create')
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
  </div>
@endsection
