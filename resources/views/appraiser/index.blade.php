@extends('appraiser.layouts.app')

@section('title')
Appraiser
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Website Overview -->
            <div class="card mb-3 shadow">
              <div class="card-header border-custom pt-1 pb-1">
                <h3 class="card-title text-custom">Overview</h3>
              </div>
              <div class="card-body border-custom">
                <div class="row">
                  <div class="col-md-3">
                    <div class="well dash-box">
                      <h2><span class="fa fa-bell" aria-hidden="true"></span> {{ $notifications->count() }}</h2>
                      <h4>Notifications</h4>
                    </div>
                  </div>
                    <div class="col-md-3">
                      <div class="well dash-box">
                        <h2><span class="fa fa-list-alt" aria-hidden="true"></span> 12</h2>
                        <h4>Pending</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="well dash-box">
                        <h2><span class="fa fa-tasks" aria-hidden="true"></span> 33</h2>
                        <h4>Tasks</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="well dash-box">
                        <h2><span class="fa fa-users" aria-hidden="true"></span> {{ $appraisees->count() }}</h2>
                        <h4>Appraisees</h4>
                      </div>
                    </div>
                </div>
              </div>
            </div>

              <!-- Latest Users -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow" style="min-height: 100%;">
                        <div class="card-header border-custom pt-1 pb-1">
                          <h3 class="card-title text-custom">Notifications</h3>
                        </div>
                        <div class="card-body border-custom">
                            <table class="table table-striped table-hover">
                                @if ($notifications->count() > 0)
                                <tr>
                                  <th>#</th>
                                  <th>Message</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                                @foreach ($notifications as $key => $notification)
                                <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ Str::limit($notification->message, 50, '...') }} <a href="#read{{ $notification->id }}" data-toggle="modal"><i>Read more</i></a>
                                    <!-- Button trigger modal -->
                                    <!-- Modal -->
                                    <div class="modal fade show" id="read{{ $notification->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Viewing Notification</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        {{ $notification->message }}
                                                    </p>
                                                    <hr>
                                                    <small><strong>Created : {{ $notification->created_at->toDayDateTimeString() }}<br> ({{ $notification->created_at->diffForHumans() }})</strong></small>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   </td>
                                  <td>
                                      @if ($notification->status == 0)
                                        <span class="badge badge-primary">Not read</span>
                                      @else
                                      <span class="badge badge-success">Read</span>
                                      @endif
                                  </td>
                                  <td>
                                      <div class="btn-group">
                                          <a href="{{ route('mark-as-read', $notification->id) }}" title="Mark as read" class="btn btn-light"><span class="fa fa-check text-dark"></span></button>
                                          <a href="{{ route('notification.delete', $notification->id) }}" onclick="confirm('Are you sure?')" title="delete" class="btn btn-light"><span class="fa fa-trash text-danger"></span></a>
                                      </div>
                                  </td>
                                </tr>
                                @endforeach
                                @else
                                    <span>No new notifications</span>
                                @endif
                            </table>
                        </div>
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow" style="min-height: 100%;">
                        <div class="card-header border-custom pt-1 pb-1">
                          <h3 class="card-title text-custom">Latest Users</h3>
                        </div>
                        <div class="card-body border-custom">
                          <table class="table table-striped table-hover">
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joined</th>
                              </tr>
                              <tr>
                                <td>Mike Johnson</td>
                                <td>mjohnson@gmail.com</td>
                                <td>Dec 15, 2016</td>
                              </tr>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
          </div>
      </div>
  </div>
@endsection
