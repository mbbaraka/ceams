
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('hr.staffs.edit', $staff->staff_id) }}" method="POST">
                                                        @csrf
                                                        <div class="form-group row">
                                                          <label for="inputName" class="col-sm-2 col-form-label">Avator</label>
                                                          <img style="width: 80px;" src="{{ asset('app/public/images/avator/'.$staff->avator) }}" alt="avator">
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
                                                            <input type="text" value="{{ $staff->staff_id}}" class="form-control @error('staff_id') is-invalid @enderror" id="staff_email" placeholder="Staff ID" name="staff_id">
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
                                                              <input type="text" value="{{ $staff->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full Names" name="name">
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
                                                            <input type="email" value="{{ $staff->email}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email">
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
                                                            <input type="text" value="{{ $staff->phone}}" class="@error('phone') is-invalid @enderror form-control" id="phone"  placeholder="Phone" name="phone">
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
                                                            <input type="date" value="{{ $staff->dob }}" class="@error('date_of_birth') is-invalid @enderror form-control" id="date_of_birth" placeholder="Date of Birth" name="date_of_birth">
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
                                                                <option @if ($staff->department == "Computer and Information Sciences") selected @endif value="Computer and Information Sciences">Computer and Information Sciences</option>
                                                                <option @if ($staff->department == "NUrsing") selected @endif value="Nursing">Nursing</option>
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
                                                                <option @if ($staff->job_title == $job->title ) selected @endif value="{{ $job->title }}">{{ $job->title }}</option>
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
                                                            <label for="salary_scale" class="col-sm-2 col-form-label">Salary Scale</label>
                                                            <div class="col-sm-10">
                                                              <select name="salary_scale" class="@error('salary_scale') is-invalid @enderror form-control" id="salary_scale">
                                                                  <option @if ($staff->salary_scale == "M1") selected @endif value="M1">M 1</option>
                                                                  <option @if ($staff->salary_scale == "M2") selected @endif value="M2">M 2</option>
                                                                  <option @if ($staff->salary_scale == "M3") selected @endif value="M3">M 3</option>
                                                                  <option @if ($staff->salary_scale == "M4") selected @endif value="M4">M 4</option>
                                                                  <option @if ($staff->salary_scale == "M5") selected @endif value="M5">M 5</option>
                                                                  <option @if ($staff->salary_scale == "M6.1") selected @endif value="M6.1">M 6.1</option>
                                                                  <option @if ($staff->salary_scale == "M6.2") selected @endif value="M6.2">M 6.2</option>
                                                                  <option @if ($staff->salary_scale == "M7") selected @endif value="M7">M 7</option>
                                                                  <option @if ($staff->salary_scale == "M10") selected @endif value="M10">M 10</option>
                                                                  <option @if ($staff->salary_scale == "M12") selected @endif value="M12">M 12</option>
                                                                  <option @if ($staff->salary_scale == "M13") selected @endif value="M13">M 13</option>
                                                                  <option @if ($staff->salary_scale == "M15") selected @endif value="M15">M 15</option>
                                                                  <option @if ($staff->salary_scale == "M20") selected @endif value="M20">M 20</option>
                                                              </select>
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
                                                            <input type="date" value="{{ $staff->appointment_date}}" class="@error('appointment_date') is-invalid @enderror form-control"   id="appointment-date" name="appointment_date" placeholder="Appointment Date">
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
