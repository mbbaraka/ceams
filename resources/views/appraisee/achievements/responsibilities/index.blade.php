@extends('layouts.app')
@section('title')
Administrative Responsibilities
@endsection
@section('content')

    <div class="container">
        <div class="row">
          @include('partials.side')
          <div class="col-md-8">
            <!-- Website Overview -->
            <div class="card">
              <div class="card-header">
                  <h5>Administrative Responsibilities<button data-toggle="modal" data-target="#modal" class="float-right btn btn-sm btn-primary">Add</button></h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover table-responsive-sm">
                      <tr>
                        <th>#</th>
                        <th>Responsibility</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Action</th>
                      </tr>
                      @foreach($responsibilities as $key => $responsibilty)
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $responsibilty->responsibility }}</td>
                          <td>{{ $responsibilty->date }}</td>
                          <td>{{ $responsibilty->duration }}</td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="#modal{{$responsibilty->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$responsibilty->id}}"><span class="fa fa-edit text-primary"></span></a>

                              {!! Form::open(['route' => ['responsibilities.destroy', $responsibilty->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                              {!! Form::close() !!}
                            </div>
                          </td>
                          <!-- EDIT MODAL -->
                        <div class="modal fade" id="modal{{$responsibilty->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              {!! Form::open(['route' =>  ['responsibilities.update', $responsibilty->id], 'method' => 'put']) !!}
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit {{$responsibilty->skill}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              @include('appraisee.achievements.responsibilities.edit')
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
          <form action="{{ route('responsibilities.store') }}" method="post">
            @csrf
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Extra Skill</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          @include('appraisee.achievements.responsibilities.create')
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>


@endsection
