@extends('layouts.app')
@section('title')
Publications
@endsection
@section('content')

    <div class="container">
        <div class="row">
          @include('partials.side')
          <div class="col-md-8">
            <!-- Website Overview -->
            <div class="card">
              <div class="card-header">
                  <h5>Publications Taught<button data-toggle="modal" data-target="#modal" class="float-right btn btn-sm btn-primary">Add</button></h5>
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover table-responsive-sm">
                      <tr>
                        <th>Title</th>
                        <th>PUbllisher</th>
                        <th>PUblish Date</th>
                        <th>Action</th>
                      </tr>
                      @foreach($publication as $publications)
                        <tr>
                          <td>{{ $publications->title }}</td>
                          <td>{{ $publications->publisher }}</td>
                          <td>{{ $publications->publish_date }}</td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="#modal{{$publications->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$publications->id}}"><span class="fa fa-edit text-primary"></span></a>

                              {!! Form::open(['route' => ['publications.destroy', $publications->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                              {!! Form::close() !!}
                            </div>
                          </td>
                          <!-- EDIT MODAL -->
                        <div class="modal fade" id="modal{{$publications->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              {!! Form::open(['route' =>  ['publications.update', $publications->id], 'method' => 'put']) !!}
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit {{$publications->publications}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              @include('appraisee.achievements.publications.edit')
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
          <form action="{{ route('publications.store') }}" method="post">
            @csrf
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Study Undertaken</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          @include('appraisee.achievements.publications.create')
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    
@endsection