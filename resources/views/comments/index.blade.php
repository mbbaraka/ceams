@extends('layouts.app')

@section('title')
Comment on Appraisals
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom">Comment Section</h4>
            </div>
          <a href="{{ route('hr.jobs') }}" class="list-group-item border-custom active list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Appraisals </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Job Titles Available</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Staff Name</th>
                  <th>Department</th>
                  <th>Faculty</th>
                  <th>Action</th>
                </tr>
                @if(count($staffs) > 0)
                @foreach ($staffs as $key => $staff)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->department }}</td>
                    <td>{{ $staff->faculty }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a target="_blank" href="{{ route('appraisal.view', $staff->staff_id) }}" title="Vew" class="btn btn-light"><span class="fa fa-eye text-dark"></span></a>
                            <a href="#comment{{$staff->staff_id}}" data-toggle="modal"  title="Comment" class="btn btn-light"><span class="fa fa-comment text-dark"></span></a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="comment{{ $staff->staff_id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Commenting on {{ $staff->name }}'s Form</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{{ $staff->staff_id }}">
                                            <div class="form-group">
                                              <label for="">Comment</label>
                                                <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="" rows="3"></textarea>
                                                @error('comment')
                                                    <span>{{ $message }}</span>
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
                @else
                <tr> No data available</tr>
                @endif
              </table>
              {{ $staffs->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
