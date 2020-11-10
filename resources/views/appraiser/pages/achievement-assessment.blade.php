@extends('appraiser.layouts.app')

@section('title')
Achivement Assessment
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom" style="text-transform: capitalize">{{ $staff->name }}</h4>
            </div>
          <a href="{{ route('hr.roles.create') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff Particulars </a>
          <a href="{{ route('staff-achievements', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Staff Achivement </a>
          <a href="{{ route('achievements-assessment', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Achievement Assessment </a>
          <a href="{{ route('core-competences', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Core Competence Assessment </a>
          <a href="{{ route('recommendations', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
          <a href="{{ route('action-plan', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
          <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comments </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Achievement Assessment</h3>
          </div>
          <div class="card-body border-custom">
            <strong>Average Performance (%) : <span>{{ number_format($average_achievement, 1) }}</span></strong><br>
            <strong>Comment :
                @if ($average_achievement < 20)
                    <span>UNSATISFACTORY</span>
                @elseif($average_achievement < 40)
                    <span>FAIR</span>
                @elseif($average_achievement < 60)
                    <span>GOOD</span>
                @elseif($average_achievement < 80)
                    <span>VERY GOOD</span>
                @elseif($average_achievement < 100)
                    <span>OUTSTANDING</span>
                @endif
            </strong>
            <table class="table table-striped table-hover table-responsive table-responsive-sm">
                <thead class="bg-light">
                  <th colspan="5">
                    <div class="text-center pb-1">
                      <h5>Agreed Key Outputs, Performance Indicators and Targets</h5>
                    </div>
                  </th>
                </thead>
                <thead>
                  <th>S/n</th>
                  <th>Key Outputs</th>
                  <th>Performance Indicators</th>
                  <th>Performance Targets</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($achievements as $key => $achievement)
                    <tr>
                      <td>{{ $key +1 }}</td>
                      <td>{!! $achievement->description->description !!}</td>
                      <td>How will results be achieved</td>
                      <td>
                        @if ($achievement->min_performance_level != NULL)
                            <span>{{ $achievement->min_performance_level }}</span>
                            @if($achievement->status == 'pending')
                                <span class="badge badge-primary">pending</span>
                            @elseif($achievement->status == 'approved')
                                <span class="badge badge-success">approved</span>
                            @elseif($achievement->status == 'rejected')
                                <span class="badge badge-danger">rejected</span>
                            @endif
                        @else
                            <span>Not added yet</span>
                        @endif
                      </td>
                      <td>
                        <div class="btn-group">
                            <button data-toggle="modal" data-target="#viewModal{{ $achievement->id }}" class="btn btn-light" title="View and Take Action"><span class="fa fa-eye text-dark"></span></button>
                            <a href="{{ route('achievements-assessment.approve', [$achievement->id, $staff->staff_id]) }}" class="btn btn-light" title="Approve Performance Indicator "><span class="fa fa-check text-primary"></span></a>
                            <a href="{{ route('achievements-assessment.reject', [$achievement->id, $staff->staff_id]) }}" onclick="confirm('Are you sure?')" class="btn btn-light" title="Reject Performance Indicator"><span class="fa fa-times-circle text-danger"></span></a>

                            {{-- Modals --}}
                            {{-- View modal --}}

                                <div class="modal fade" id="viewModal{{ $achievement->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Viewing the Achivement Assessment</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="description">Job Description/Key Output</label>
                                                  <p class="text-muted">
                                                      {!! $achievement->description->description !!}
                                                  </p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="description">Job Description</label>
                                                  <p class="text-muted">
                                                      {!! $achievement->description->description !!}
                                                  </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Performance Target</label>
                                                    <p class="text-muted">
                                                        @if ($achievement->min_performance_level != NULL)
                                                            <span>{{ $achievement->min_performance_level }}</span>
                                                        @else
                                                            <span>Not added yet</span>
                                                        @endif
                                                    </p>
                                                  </div>
                                                  <p>
                                                      <a type="button" data-toggle="collapse" href="#take{{ $achievement->id }}" aria-expanded="false"
                                                              aria-controls="contentId">
                                                          Take Action
                                                  </a>
                                                  </p>
                                                  <div class="collapse" id="take{{ $achievement->id }}">
                                                      <form action="{{ route('achievements-assessment.update', $staff->staff_id) }}" method="post">
                                                          @csrf
                                                          <input type="hidden" name="id" value="{{ $achievement->id }}">
                                                        <div class="form-group">
                                                            <label for="level">Performance Level</label><br>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                              <label class=" btn btn-light" data-toggle="tooltip" title="1">
                                                                <input type="radio" value="1" name="score" id="1" @if($achievement->score == 1) checked @endif autocomplete="off">
                                                                Unsatifactory
                                                              </label>
                                                              <label class=" btn btn-light" data-toggle="tooltip" title="2">
                                                                <input type="radio" value="2" name="score" id="2" @if($achievement->score == 2) checked @endif autocomplete="off">
                                                                Fair
                                                              </label>
                                                              <label class=" btn btn-light" data-toggle="tooltip" title="3">
                                                                <input type="radio" value="3" name="score" id="3" @if($achievement->score == 3) checked @endif autocomplete="off">
                                                                Good
                                                              </label>
                                                              <label class=" btn btn-light" data-toggle="tooltip" title="4">
                                                                <input type="radio" value="4" name="score" id="4" @if($achievement->score == 4) checked @endif autocomplete="off">
                                                                Very Good
                                                              </label>
                                                              <label class=" btn btn-light" data-toggle="tooltip" title="5">
                                                                <input type="radio" value="5" name="score" id="5" @if($achievement->score == 5) checked @endif autocomplete="off">
                                                                Outstanding
                                                              </label>
                                                            </div>
                                                            <small id="helpId" class="text-muted">1:Lowest 5:Highest</small>
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="">Comment on Performance</label><br>
                                                            <textarea name="comment" id="" cols="30" class="form-control @error('comment') @enderror" rows="3">{{ $achievement->comment }}</textarea>
                                                            @error('comment')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                          </div>
                                                          <button type="submit" class="btn btn-primary">Submit</button>
                                                      </form>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Edit modal --}}

                                <div class="modal fade" id="editModal{{ $achievement->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <form action="{{ route('achievement-assessment.store', $achievement->id) }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Editing Achievement Assessment</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="target">Performance Targets</label>
                                                  <textarea name="target" id="target" cols="30" rows="5" class="form-control">{{ $achievement->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                     </td>
                      {{-- <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class=" btn btn-light" data-toggle="tooltip" title="Unsatifactory">
                              <input type="radio" name="" id="1" checked="" autocomplete="off">
                              1
                            </label>
                            <label class=" btn btn-info" data-toggle="tooltip" title="Fair">
                              <input type="radio" name="" id="2" checked="" autocomplete="off">
                              2
                            </label>
                            <label class=" btn btn-outline-info" data-toggle="tooltip" title="Good">
                              <input type="radio" name="" id="3" checked="" autocomplete="off">
                              3
                            </label>
                            <label class=" btn btn-outline-info" data-toggle="tooltip" title="Very Good">
                              <input type="radio" name="" id="4" checked="" autocomplete="off">
                              4
                            </label>
                            <label class=" btn btn-outline-info" data-toggle="tooltip" title="Outstanding">
                              <input type="radio" name="" id="5" checked="" autocomplete="off">
                              5
                            </label>
                        </div>
                      </td>
                      <td></td>
                      <td></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
