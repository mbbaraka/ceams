@extends('layouts.auth')
@section('title')
Register
@endsection
@section('content')

<div id="page-content-wrapper">
    <div class="row justify-content-center d-block d-flex align-items-center" style="padding-top: 6%;">
      <div class="col-md-10 col-lg-10">
        <div style="border-radius: 40px 40px 0px 0px; box-shadow: 0 20px 20px 0 rgba(0, 0, 0, 0.2), 0 20px 40px 0 rgba(0, 0, 0, 0.19);" class="pt-2 pr-2 pl-2 bg-custom pb-1">
          <div class="card-group">
              <div class="card border-custom"  style="border-top-left-radius: 40px;">
                <div class="card-body">
                  <h1 class="text-center pt-5 login-title">Computerised Employee Appraisal Management System</h1>
                  <div class="pt-5 text-center">
                   <span><b>For more information: </b></span><br>
                   <span><label class="font-weight-bold">Call :</label> +256773034311 or +256758029195</span><br>
                   <span><label class="font-weight-bold">Contact :</label> <a href="mailto:admin@admin.com">admin@admin.com</a></span>
                   <hr class="bg-custom">
                  <small class="text-primary">&copy Muni University Human Resource Department</small>
                  </div>

                </div>
              </div>
              <div class="card border-custom pt-5 pb-5" style="border-top-right-radius: 40px;">
                <div class="row justify-content-center d-flex align-items-center">
                  <div class="col-md-9 col-lg-9">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="{{config('aoo.url')}}/logo.png" class="img-fluid">
                      </div>
                      <div class="container-fluid">
                                                   </div>
                       <form method="POST" action="{{ route('register') }}">
                         @csrf
                         <div class="input-group mb-3">
                           <div class="input-group-prepend">
                             <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-user text-light"></i></span>
                           </div>
                           <input type="email" placeholder="Staff ID" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id" value="{{ old('email') }}" placeholder="Email Address" aria-label="Email" required aria-describedby="basic-addon1">
                           @error('staff_id')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                         </div>
                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Staff ID') }}</label>

                            <div class="col-md-6">
                                <input id="staff_id" type="text" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id" value="{{ old('staff_id') }}" required autocomplete="staff_id" autofocus>

                                @error('staff_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-outline-primary container">
                                {{ __('Register') }}
                            </button>
                        </div>
                         <div class="justify-content-between">
                               <span class="col-lg-6"><a href="{{ route('login') }}" class="float-right">Login</a></span>
                             </div>
                       </form>
                    </div>
                  </div>
                </div>
              </div>
           </div>
        </div>
      </div>
    </div>
</div>
@endsection
