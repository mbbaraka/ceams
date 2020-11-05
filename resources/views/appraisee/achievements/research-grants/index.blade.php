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
                    <th>Grant Applied</th>
                    <th>Status</th>
                    <th>Application Date</th>
                    <th>Award Date</th>
                    <th class="text-right">Action</th>
                  </tr>
                  @foreach($research as $key => $researchs)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $researchs->research_applied_for }}</td>
                      <td>{{ date('d,M,Y', strtotime($researchs->application_date)) }}</td>
                      <td>
                        @if($researchs->is_awarded == '1')
                            <span class="badge badge-success">Awarded</span>
                        @else
                            <span class="badge badge-primary">Not Awarded</span>
                        @endif
                      </td>
                      <td>
                          @if ($researchs->is_awarded ==  '1')
                            <span>{{ date('d,M,Y', strtotime($researchs->date_of_award)) }}</span>
                          @else
                            <span>N.A</span>
                          @endif
                      </td>
                      <td class="text-right">
                        <div class="btn-group" role="group">
                          <a href="#modal{{$researchs->id}}" class="btn btn-light" data-toggle="modal" data-target="#modal{{$researchs->id}}"><span class="fa fa-edit text-primary"></span></a>

                          {!! Form::open(['route' => ['researchgrants.destroy', $researchs->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                            <button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-light"><span class="fa fa-trash text-danger"></span></button>
                          {!! Form::close() !!}
                        </div>
                      </td>
                      <!-- EDIT MODAL -->
                    <div class="modal fade" id="modal{{$researchs->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          {!! Form::open(['route' =>  ['researchgrants.update', $researchs->id], 'method' => 'put']) !!}
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit {{$researchs->research_applied_for}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          @include('appraisee.achievements.research-grants.edit')
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
                {{ $research->links() }}
          </div>
          </div>

      </div>
    </div>
  </div>
  <!-- Add Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('researchgrants.store') }}" method="post">
            @csrf
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Research Grant</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @include('appraisee.achievements.research-grants.create')
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
  </div>
@endsection
