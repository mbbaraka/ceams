@extends('appraiser.layouts.app')

@section('title')
Performance Improvement Action Plan
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom" style="text-transform: capitalize">{{ $staff->name }}</h4>
            </div>
            <a href="{{ route('staff-particulars', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff Particulars </a>
            <a href="{{ route('staff-achievements', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Staff Achievement </a>
            <a href="{{ route('achievements-assessment', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Achievement Assessment </a>
            <a href="{{ route('core-competences', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Core Competence Assessment </a>
            <a href="{{ route('recommendations', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
            <a href="{{ route('action-plan', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom action active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a target="_blank" href="{{ route('appraisal.view', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Form </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">
                Performance Improvement Action Plan
                <button data-toggle="modal" data-target="#addNew" class="float-right btn btn-primary" title="Add new"><span class="fa fa-plus"></span></button>
            </h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Performance Gaps Identified</th>
                  <th>Agreed Action Plan</th>
                  <th>Time Frame</th>
                  <th>Action</th>
                </tr>
                @if($actions->count() > 0)
                @foreach ($actions as $key => $action)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $action->performance_gap }}</td>
                    <td>{{ $action->action_plan }}</td>
                    <td>{{ $action->time_frame }}</td>
                    <td>
                        <div class="btn-group">
                            <button title="edit" data-toggle="modal" data-target="#edit{{ $action->id }}" class="btn btn-light"><span class="fa fa-edit text-dark"></span></button>

                            <form action="{{ route('action-plan.destroy', $action->id) }}"  class="form-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button title="delete" type="submit" onclick="confirm('Are you sure?')" class="btn btn-light"><span class="fa fa-times text-danger"></span></button>
                            </form>
                        </div>
                    </td>
                    <!-- edit Modal -->
                    <div class="modal fade" id="edit{{ $action->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <form action="{{ route('action-plan.update', $action->id) }}" method="post">
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{ $staff->staff_id }}">
                                                        <div class="form-group">
                                                            <label for="">Performance Gaps</label>
                                                            <textarea name="performance_gap" id="" class="@error('performance_gap') is-invalid @enderror form-control" placeholder="">{{ $action->performance_gap }}</textarea>
                                                            <small id="helpId" class="text-muted">Specific to period under assessment</small>
                                                            @error('performance_gap')
                                                            <small class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Agreed Action Plan</label>
                                                            <textarea name="action_plan" id="" class="@error('action_plan') is-invalid @enderror form-control" placeholder="">{{ $action->action_plan }}</textarea>
                                                            <small id="helpId" class="text-muted">To address the gaps identified</small>
                                                            @error('action_plan')
                                                            <small class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Time Frame</label>
                                                            <input type="text" name="time_frame" value="{{ $action->time_frame }}" id="" class="@error('time_frame') is-invalid @enderror form-control" placeholder="" aria-describedby="helpId">
                                                            <small id="helpId" class="text-muted">Specific to period under assessment</small>
                                                            @error('time_frame')
                                                            <small class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </small>
                                                            @enderror
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
                @else
                <tr><td colspan='5' class="text-center">No values yet :(</td></tr>
                @endif
            </table>
            {{ $actions->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal --}}
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Adding Action Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <form action="{{ route('action-plan.store') }}" method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                            @csrf
                            <input type="hidden" name="id" value="{{ $staff->staff_id }}">
                            <div class="form-group">
                                <label for="">Performance Gaps</label>
                                <textarea name="performance_gap" id="" class="@error('performance_gap') is-invalid @enderror form-control" placeholder=""></textarea>
                                <small id="helpId" class="text-muted">Specific to period under assessment</small>
                                @error('performance_gap')
                                <small class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Agreed Action Plan</label>
                                <textarea name="action_plan" id="" class="@error('action_plan') is-invalid @enderror form-control" placeholder=""></textarea>
                                <small id="helpId" class="text-muted">To address the gaps identified</small>
                                @error('action_plan')
                                <small class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Time Frame</label>
                                <input type="text" name="time_frame" id="" class="@error('time_frame') is-invalid @enderror form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Specific to period under assessment</small>
                                @error('time_frame')
                                <small class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
      </div>
  </div>

  <script>
      $('#exampleModal').on('show.bs.modal', event => {
          var button = $(event.relatedTarget);
          var modal = $(this);
          // Use above variables to manipulate the DOM

      });
  </script>
@endsection
