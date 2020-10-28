@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')

	  <div class="container">
        <div class="row">
          @include('partials.side')
          <div class="col-md-8">
            <!-- Website Overview -->
            <div class="card mb-3">
              <div class="card-header main-color-bg">
                <h3 class="card-title">Website Overview</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="well dash-box">
                      <h2><span class="fa fa-users" aria-hidden="true"></span> 203</h2>
                      <h4>Users</h4>
                    </div>
                    </div>
                    <div class="col-md-3">
                      <div class="well dash-box">
                        <h2><span class="fa fa-list-alt" aria-hidden="true"></span> 12</h2>
                        <h4>Pages</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="well dash-box">
                        <h2><span class="far fa-pencil" aria-hidden="true"></span> 33</h2>
                        <h4>Posts</h4>
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
            <div class="card ">
              <div class="card-header main-color-bg">
                <h3 class="card-title">Latest Users</h3>
              </div>
              <div class="card-body">
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