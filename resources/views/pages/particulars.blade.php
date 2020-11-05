@extends('layouts.app')

@section('title')
Particulars
@endsection

@section('content')

	  <div class="container">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="width: 100px; height:100px"
                       src="{{ asset(config('app.url').'/app/public/images/avator/'.$particulars->avator) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$particulars->name}}</h3>

                <p class="text-muted text-center">{{$particulars->job_title}}</p>

                <ul class="list-group list-group-flush mb-3 p-0">
                  <li class="list-group-item">
                    <b>Joined</b> <a class="float-right">{{ date('d/M/Y h:sa', strtotime($particulars->created_at))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Last Update</b> <a class="float-right">{{ date('d/M/Y h:sa', strtotime($particulars->created_at))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Appointment Date</b> <a class="float-right">{{ date('d/M/Y h:sa', strtotime($particulars->created_at))}}</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary mt-3">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  @foreach($skills as $skill)
                  <span class="tag tag-danger">{{ $skill->skill }}</span>
                  @endforeach
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Account Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="overview">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Avator</label>
                        <div class="col-sm-10">
                          <input type="file" name="avator" class="form-control" id="avator">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Staff ID</label>
                        <div class="col-sm-10">
                          <input type="text" disabled class="form-control" id="email" value="{{$particulars->staff_id}}" placeholder="Staff ID" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" value="{{$particulars->email}}" placeholder="Email" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="phone" value="{{$particulars->phone}}" placeholder="Phone" name="phone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="dob" value="{{$particulars->dob}}" placeholder="Date of Birth" name="dob">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                          <input type="text" disabled class="form-control" value="{{$particulars->department}}" id="department" name="department" placeholder="Department">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Faculty</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$particulars->faculty}}" disabled name="faculty" id="faculty" placeholder="Faculty">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Job Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$particulars->job_title}}" disabled name="job-title" id="job-title" placeholder="Job Title">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Salary Scale</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$particulars->salary_scale}}" disabled id="salary-scale" name="salary-scale" placeholder="Salary Scale" name="phone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Appointment Date</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$particulars->appointment_date}}" disabled id="appointment-date" name="appointment-date" placeholder="Appointment Date">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Terms of Service</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="{{$particulars->terms_of_service}}" name="terms-of-service" id="terms-of-service" placeholder="Terms of Service">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Other Role</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="{{$particulars->role}}" name="other-role" id="other-role" placeholder="Other Role">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        	<div class="btn-group">
                        		<button class="btn btn-secondary">Back</button>
                          		<button type="submit" class="btn btn-primary">Update</button>
                        	</div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endsection
