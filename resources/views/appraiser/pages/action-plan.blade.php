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
            <a href="{{ route('action-plan', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comments </a>
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
                {{-- @foreach ($studies as $key => $study)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $study->course }}</td>
                    <td>{{ $study->institution }}</td>
                    <td>{{ $study->award }}</td>
                    <td>{{ date('d M, Y', strtotime($study->date_of_completion)) }}</td>
                </tr>
                @endforeach --}}

            </table>
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
              <div class="modal-body">
                  <div class="container-fluid">
                      <form action="" method="post">
                          <div class="form-group">
                            <label for="">Performance Gaps</label>
                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Specific to period under assessment</small>
                          </div>
                          <div class="form-group">
                            <label for="">Agreed Action Plan</label>
                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">To address the gaps identified</small>
                          </div>
                          <div class="form-group">
                            <label for="">Time Frame</label>
                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Specific to period under assessment</small>
                            {!! Form::datetimeLocal('$name', '$value', ['class' => 'form-control']) !!}
                          </div>
                      </form>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
              </div>
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
