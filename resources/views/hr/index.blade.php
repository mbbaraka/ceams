@extends('hr.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{-- <div class="col-md-4">
        <div class="list-group">
          <a href="index.html" class="list-group-item active main-color-bg">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Staff Achievements
          </a>
          <a href="pages.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Studies <span class="badge">12</span></a>
          <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Courses Taught <span class="badge">33</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Publications <span class="badge">203</span></a>
          <a href="pages.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Meetings/Workshops <span class="badge">12</span></a>
          <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Public Lectures/Papers Presented <span class="badge">33</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Research Activities <span class="badge">203</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Research Grants <span class="badge">203</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Community Service <span class="badge">203</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Administrative Responsibilities <span class="badge">203</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Const. Analysis and Performance Improvement <span class="badge">203</span></a>
          <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Additional Skills <span class="badge">203</span></a>
        </div>
      </div> --}}
        <div class="col-md-10">
            <!-- Website Overview -->
            <div class="card mb-3 shadow">
              <div class="card-header border-custom pt-1 pb-1">
                <h3 class="card-title text-custom">Overview</h3>
              </div>
              <div class="card-body border-custom">
                <div class="row">
                  <div class="col-md-3">
                    <div class="well dash-box">
                      <h2><span class="fa fa-bell" aria-hidden="true"></span> 12</h2>
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
                        <h2><span class="far fa-envelope" aria-hidden="true"></span> 33</h2>
                        <h4>Messages</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="well dash-box">
                        <h2><span class="fa fa-ambulance" aria-hidden="true"></span> 124</h2>
                        <h4>Visitors</h4>
                      </div>
                    </div>
                </div>
              </div>
            </div>

              <!-- Latest Users -->
            <div class="card shadow">
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
                      <td>Jill Smith</td>
                      <td>jillsmith@gmail.com</td>
                      <td>Dec 12, 2016</td>
                    </tr>
                    <tr>
                      <td>Eve Jackson</td>
                      <td>ejackson@yahoo.com</td>
                      <td>Dec 13, 2016</td>
                    </tr>
                    <tr>
                      <td>John Doe</td>
                      <td>jdoe@gmail.com</td>
                      <td>Dec 13, 2016</td>
                    </tr>
                    <tr>
                      <td>Stephanie Landon</td>
                      <td>landon@yahoo.com</td>
                      <td>Dec 14, 2016</td>
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
@endsection
