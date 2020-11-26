@extends('layouts.app')

@section('title', 'Constraint Analysis')

@section('content')

<div class="container">
    <div class="row">
      @include('partials.side')
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card">
          <div class="card-header">
              <h5>Constraint Analysis<button data-toggle="modal" data-target="#modal" class="float-right btn btn-sm btn-primary">Add</button></h5>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-responsive-sm">
                  <tr>
                    <th>#</th>
                    <th>Nature of Constraint</th>
                    <th>Strategies of Improvement</th>
                    <th class="text-right">Action</th>
                  </tr>
                  @foreach($analysises as $key => $analysis)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $analysis->constraint }}</td>
                      <td>{{ $analysis->strategy }}</td>
                      <td class="text-right">
                        <div class="btn-group" role="group">
                          <a href="#modal{{$analysis->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$analysis->id}}"><span class="fa fa-edit text-primary"></span></a>

                          {!! Form::open(['route' => ['analysis.destroy', $analysis->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                            <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                          {!! Form::close() !!}
                        </div>
                      </td>
                      <!-- EDIT MODAL -->
                    <div class="modal fade" id="modal{{$analysis->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          {!! Form::open(['route' =>  ['analysis.update', $analysis->id], 'method' => 'put']) !!}
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit {{ $analysis->research_applied_for}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          @include('appraisee.achievements.analysis.edit')
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
                {{ $analysises->links() }}
          </div>
          </div>

      </div>
    </div>
  </div>
  <!-- Add Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('analysis.store') }}" method="post">
            @csrf
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Constraint Analysist</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @include('appraisee.achievements.analysis.create')
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
  </div>
@endsection
