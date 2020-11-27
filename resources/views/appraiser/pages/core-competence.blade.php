@extends('appraiser.layouts.app')

@section('title')
Core Competences
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
            <a href="{{ route('core-competences', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Core Competence Assessment </a>
            <a href="{{ route('recommendations', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
            <a href="{{ route('action-plan', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a target="_blank" href="{{ route('appraisal.view', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Form </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Core Competences</h3>
          </div>
          <div class="card-body border-custom">
            <strong>Average Performance (%) : <span>{{ number_format($average_competence, 1) }}</span></strong><br>
            <strong>Comment :
                @if ($average_competence < 20)
                    <span>UNSATISFACTORY</span>
                @elseif($average_competence < 40)
                    <span>FAIR</span>
                @elseif($average_competence < 60)
                    <span>GOOD</span>
                @elseif($average_competence < 80)
                    <span>VERY GOOD</span>
                @elseif($average_competence < 100)
                    <span>OUTSTANDING</span>
                @endif
            </strong>
          <!-- Competencies and work related behaviors start-->
            <table class="table table-responsive-sm table-hover">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Competences and work related behaviour</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($competences as $key => $competence)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $competence->competence }}
                        <span type="button" tabindex="0" class="fa fa-question-circle" data-trigger="focus" data-container="body" title="Description" data-toggle="popover" data-placement="top" data-content="{{ $competence->description }}">
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button data-toggle="modal" data-target="#edit{{ $competence->id }}" class="btn btn-light"><span class="fa fa-tasks text-dark"></span></button>
                        </div>
                        {{-- Update modal --}}
                        <div class="modal fade" id="edit{{ $competence->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title">Evaluating {{ $staff->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                <form action="{{ route('store.core-competences') }}" method="post">
                                    <div class="modal-body">
                                            @csrf
                                            {!! Form::hidden('id', $competence->id) !!}
                                            {!! Form::hidden('staff', $staff->staff_id) !!}
                                            <div class="form-group">
                                              <label for="">Score</label><br>
                                              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class=" btn btn-light" data-toggle="tooltip" title="1">
                                                  <input type="radio" value="1" name="score" id="1" @if($competence->competent == 1) checked @endif autocomplete="off">
                                                  Unsatifactory
                                                </label>
                                                <label class=" btn btn-light" data-toggle="tooltip" title="2">
                                                  <input type="radio" value="2" name="score" id="2" @if($competence->competent == 2) checked @endif autocomplete="off">
                                                  Fair
                                                </label>
                                                <label class=" btn btn-light" data-toggle="tooltip" title="3">
                                                  <input type="radio" value="3" name="score" id="3" @if($competence->competent == 3) checked @endif autocomplete="off">
                                                  Good
                                                </label>
                                                <label class=" btn btn-light" data-toggle="tooltip" title="4">
                                                  <input type="radio" value="4" name="score" id="4" @if($competence->competent == 4) checked @endif autocomplete="off">
                                                  Very Good
                                                </label>
                                                <label class=" btn btn-light" data-toggle="tooltip" title="5">
                                                  <input type="radio" value="5" name="score" id="5" @if($competence->competent == 5) checked @endif autocomplete="off">
                                                  Outstanding
                                                </label>
                                              </div>
                                              <br>
                                              <small id="helpId" class="text-muted">1:Lowest 5:Highest</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Comment</label><br>
                                                <textarea name="comment" id="" cols="30" class="form-control @error('comment') @enderror" rows="3">{{ $competence->d }}</textarea>
                                                @error('comment')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            {{ $competences->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
