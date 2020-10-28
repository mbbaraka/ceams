@extends('layouts.auth')

@section('title')
Login
@endsection
@section('content')
<!-- Page Content -->
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
                            <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-envelope text-light"></i></span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" aria-label="Email" required aria-describedby="basic-addon1">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-primary" id="basic-addon1"><i class="fas fa-key text-light"></i></span>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-label="Password" required aria-describedby="basic-addon1">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary container" value="Login">
                              </div>
                              <div class="justify-content-between">
                                    <span class="col-lg-6"><a href="{{ route('password.request') }}" class="float-left">Forgot Password?</a></span>
                                    <span class="col-lg-6"><a href="{{ route('register') }}" class="float-right">Register</a></span>
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

    <!-- /#page-content-wrapper -->
@endsection
