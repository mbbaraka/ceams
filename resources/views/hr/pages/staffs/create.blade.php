@extends('hr.layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom">Manage Staffs</h4>
            </div>
          <a href="{{ route('hr.staffs') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staffs List </a>
          <a href="{{ route('hr.staffs.pending') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Pending Staffs </a>
          <a href="{{ route('hr.staffs.create') }}" class="list-group-item active list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Staff </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
          <div class="card">
            <div class="card-header">Register New Staff</div>
            <div class="card-body">
                <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('staff-store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Avator</label>
                      <div class="col-sm-10">
                        <input type="file" name="avator" class="form-control @error('avator') is-invalid @enderror" id="avator">
                        @error('avator')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staff_id" class="col-sm-2 col-form-label">Staff ID</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{old('staff_id')}}" class="form-control @error('staff_id') is-invalid @enderror" id="staff_email" placeholder="Staff ID" name="staff_id">
                        @error('staff_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Names</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full Names" name="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{old('phone')}}" class="@error('phone') is-invalid @enderror form-control" id="phone"  placeholder="Phone" name="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                      <div class="col-sm-10">
                        <input type="date" value="{{old('date_of_birth')}}" class="@error('date_of_birth') is-invalid @enderror form-control" id="date_of_birth" placeholder="Date of Birth" name="date_of_birth">
                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="department" class="col-sm-2 col-form-label">Department</label>
                      <div class="col-sm-10">
                        {{-- <input type="text" value="{{old('department')}}"  class="@error('department') is-invalid @enderror form-control" id="department" name="department" placeholder="Department"> --}}
                        <select name="department" class="@error('department') is-invalid @enderror form-control" id="faculty">
                            <option value="Computer and Information Sciences">Computer and Information Sciences</option>
                            <option value="Nursing">Nursing</option>
                        </select>
                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="faculty" class="col-sm-2 col-form-label">Faculty</label>
                      <div class="col-sm-10">
                        {{-- <input type="text" value="{{old('faculty')}}" class="@error('faculty') is-invalid @enderror form-control"  name="faculty" id="faculty" placeholder="Faculty"> --}}
                        <select name="faculty" class="@error('faculty') is-invalid @enderror form-control" id="faculty">
                            <option value="Techno Science">Techno Science</option>
                            <option value="Health Science">Health Sciences</option>
                        </select>
                        @error('faculty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="job-title" class="col-sm-2 col-form-label">Job Title</label>
                      <div class="col-sm-10">
                        {{-- <input type="text" value="{{old('job_title')}}"    name="job_title" id="job-title" placeholder="Job Title"> --}}
                        <select class="@error('job_title') is-invalid @enderror form-control" name="job_title" id="job-title">
                            @foreach ($jobs as $job)
                            <option value="{{ $job->title }}">{{ $job->title }}</option>
                            @endforeach
                        </select>
                        @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="salary-scale" class="col-sm-2 col-form-label">Salary Scale</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{old('salary_scale')}}" class="@error('salary_scale') is-invalid @enderror form-control"   id="salary-scale" name="salary_scale" placeholder="Salary Scale">
                        @error('salary_scale')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="appointment" class="col-sm-2 col-form-label">Appointment Date</label>
                      <div class="col-sm-10">
                        <input type="date" value="{{old('appointment_date')}}" class="@error('appointment_date') is-invalid @enderror form-control"   id="appointment-date" name="appointment_date" placeholder="Appointment Date">
                        @error('appointment_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="terms-of-service" class="col-sm-2 col-form-label">Terms of Service</label>
                      <div class="col-sm-10">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                              <input type="radio" name="terms_of_service" id="full-time" autocomplete="off" checked value="Full Time"> Full Time
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="terms_of_service" id="contract" autocomplete="off" value="Contract"> Contract
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="terms_of_service" id="part-time" autocomplete="off" value="Part Time"> Part-Time
                            </label>
                        </div>
                        @error('terms_of_service')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Other Role</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"   name="other-role" id="other-role" placeholder="Other Role">
                      </div>
                    </div> --}}
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                          <div class="btn-group">
                              <button class="btn btn-secondary" type="reset">Cancel</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
