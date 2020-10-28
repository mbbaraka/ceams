@extends('layouts.app')
@section('title')
Public Lectures
@endsection
@section('content')

    <div class="container">
        <div class="row">
          @include('partials.side')
          <div class="col-md-8">
            <!-- Website Overview -->
            <div class="card">
              <div class="card-header">
                  <h5>Public Lectures Held<button data-toggle="modal" data-target="#modal" class="float-right btn btn-sm btn-primary">Add</button></h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover table-responsive-sm">
                      <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Venue</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      @foreach($lecture as $lectures)
                        <tr>
                          <td>{{ $lectures->category }}</td>
                          <td>{{ $lectures->topic }}</td>
                          <td>{{ $lectures->venue }}</td>
                          <td>{{ date('d/M/Y', strtotime($lectures->date)) }}</td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="#modal{{$lectures->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$lectures->id}}"><span class="fa fa-edit text-primary"></span></a>

                              {!! Form::open(['route' => ['lectures.destroy', $lectures->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                              {!! Form::close() !!}
                            </div>
                          </td>
                          <!-- EDIT MODAL -->
                        <div class="modal fade" id="modal{{$lectures->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              {!! Form::open(['route' =>  ['lectures.update', $lectures->id], 'method' => 'put']) !!}
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit {{$lectures->lectures}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              @include('appraisee.achievements.lectures.edit')
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
          <form action="{{ route('lectures.store') }}" method="post">
            @csrf
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Public Lecture</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          @include('appraisee.achievements.lectures.create')
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    
@endsection