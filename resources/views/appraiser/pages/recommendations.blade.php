@extends('appraiser.layouts.app')

@section('title')
Recommendations
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
            <a href="{{ route('recommendations', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
            <a href="{{ route('action-plan', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a target="_blank" href="{{ route('appraisal.view', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Form </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Recommendations</h3>
          </div>
          <div class="card-body border-custom">
            <h4>Summary of Staff Performance Assessment</h4><hr class="bg-dark">
            <strong>Key Result Area (%) : <span>{{ number_format($average_score, 1) }}</span></strong><br>
            <strong>Competencies (%) : <span>{{ number_format($average_competence, 1) }}</span></strong><br>
            <strong>Overall Performance (%) : <span>{{ number_format($average, 1) }}</span></strong><br>
            <strong>Comment :
                @if ($average < 20)
                    <span>UNSATISFACTORY</span>
                @elseif($average < 40)
                    <span>FAIR</span>
                @elseif($average < 60)
                    <span>GOOD</span>
                @elseif($average < 80)
                    <span>VERY GOOD</span>
                @elseif($average < 100)
                    <span>OUTSTANDING</span>
                @endif
            </strong>
          <!-- Recommendations-->
            <br>
            <table class="table table-responsive-sm table-hover">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Recommendation</th>
                    <th>Select</th>
                </tr>
              </thead>
              <tbody>
                  @if ($average > 30)
                    <tr>
                        <td colspan="1">Rewards</td>
                    </tr>
                    <form action="{{ route('store.recommendation', $staff->staff_id) }}" method="post">
                        @csrf
                      <tr>
                          <td>1</td>
                          <td>Confirmation in service/renewal of contract</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id=""
                                      value="Confirmation in service/renewal of contract">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Salary Increment</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Salary Increment">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>3</td>
                          <td>Cash Award</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Cash Award">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>4</td>
                          <td>Promotion to the next Rank</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Promotion to the next Rank">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>5</td>
                          <td>Special Recognitions (Paid up trips)</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Special Recognitions (Paid up trips)">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>6</td>
                          <td>Letter of Recommendations</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Letter of Recommendations">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>7</td>
                          <td>Scholarship</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Scholarship">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>8</td>
                          <td>Others</td>
                          <td>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" data-toggle="collapse" data-target="#specify" type="checkbox">
                                  </label>
                                  <textarea name="others" id="specify" class="collapse form-control" cols="30" rows="1"></textarea>
                              </div>
                          </td>
                      </tr>
                      <tr><td colspan="3"><button type="submit" class="float-right btn btn-primary">Submit</button></td></tr>
                    </form>
                    <hr class="bg-dark">
                  @else

                  <tr>
                    <td colspan="1">Sanctions</td>
                  </tr>
                  <form action="{{ route('store.recommendation', $staff->staff_id) }}" method="post">
                    @csrf
                    <tr>
                        <td>1</td>
                        <td>Extended Probation</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Extended Probation">
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Stopping salary increment</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Stopping salary increment">
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Non-renewal of Contract</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Non-renewal of Contract">
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Disciplinary Action</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="reward[]" multiple="multiple" id="" value="Disciplinary Action">
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr><td colspan="3"><button type="submit" class="float-right btn btn-primary">Submit</button></td></tr>
                  </form>
                  <hr class="bg-dark">
                  @endif
              </tbody>
            </table>
            <div>
                @if (count($recommendations) > 0)
                <strong> Recommendations for {{ $staff->name }} </strong><br>
                    @foreach ($recommendations as $item)
                        <span class="badge badge-info">
                            {{ $item->recommendation }} &nbsp;
                            <a type="button" href="{{ route('recommendations.remove', $item->id ) }}"><i class="text-dark fa fa-times-circle"></i></a>
                        </span>
                    @endforeach
                @else
                    <span><strong>No recommendations added yet</strong></span>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
