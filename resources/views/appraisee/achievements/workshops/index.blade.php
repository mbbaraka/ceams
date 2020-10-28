@extends('layouts.app')
@section('title')
Workshops/Meetings
@endsection
@section('content')

    <div class="container">
        <div class="row">
          @include('partials.side')
          <div class="col-md-8">
            <!-- Website Overview -->
            <div class="card">
              <div class="card-header">
                  <h5>Workshops/Meetings Held<button data-toggle="modal" data-target="#modal" class="float-right btn btn-sm btn-primary">Add</button></h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover table-responsive-sm">
                      <tr>
                        <th>Title</th>
                        <th>Venue</th>
                        <th>Duration</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      @foreach($meeting as $meetings)
                        <tr>
                          <td>{{ $meetings->title }}</td>
                          <td>{{ $meetings->venue }}</td>
                          <td>{{ $meetings->duration }}</td>
                          <td>{{ date('d/M/Y', strtotime($meetings->date)) }}</td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="#modal{{$meetings->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$meetings->id}}"><span class="fa fa-edit text-primary"></span></a>

                              {!! Form::open(['route' => ['meetings.destroy', $meetings->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                              {!! Form::close() !!}
                            </div>
                          </td>
                          <!-- EDIT MODAL -->
                        <div class="modal fade" id="modal{{$meetings->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              {!! Form::open(['route' =>  ['meetings.update', $meetings->id], 'method' => 'put']) !!}
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit {{$meetings->meetings}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              @include('appraisee.achievements.workshops.edit')
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
              </div>
              </div>

          </div>
        </div>
      </div>
      <!-- Add Modal -->
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="{{ route('meetings.store') }}" method="post">
            @csrf
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Study Undertaken</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          @include('appraisee.achievements.workshops.create')
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    
@endsection