@extends('layouts.app')
@section('title')
Research Activities
@endsection
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
                        <th>Topic</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                      </tr>
                      @foreach($research as $researchs)
                        <tr>
                          <td>{{ $researchs->topic }}</td>
                          <td>
                            @if($researchs->status == 'ongoing')
                                <span class="badge badge-warning">Ongoing</span>
                            @else
                                <span class="badge badge-success">Completed</span>
                            @endif
                          </td>
                          <td class="text-right">
                            <div class="btn-group" role="group">
                              <a href="#modal{{$researchs->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$researchs->id}}"><span class="fa fa-edit text-primary"></span></a>

                              {!! Form::open(['route' => ['researchactivities.destroy', $researchs->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                              {!! Form::close() !!}
                            </div>
                          </td>
                          <!-- EDIT MODAL -->
                        <div class="modal fade" id="modal{{$researchs->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              {!! Form::open(['route' =>  ['researchactivities.update', $researchs->id], 'method' => 'put']) !!}
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit {{$researchs->topic}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              @include('appraisee.achievements.research-activities.edit')
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
          <form action="{{ route('researchactivities.store') }}" method="post">
            @csrf
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Research Activity</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          @include('appraisee.achievements.research-activities.create')
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    
@endsection