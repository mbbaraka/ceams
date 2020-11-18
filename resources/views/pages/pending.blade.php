@extends('layouts.auth')

@section('title')
Registration Successful
@endsection
@section('content')
<!-- Page Content -->
    <div id="page-content-wrapper">
         <div class="row justify-content-center d-block d-flex align-items-center" style="padding-top: 6%;">
           <div class="col-md-10 col-lg-10">
                <h3>Wait for Approval!</h3>
                <p>Your registration is still pending. Wait for approval from the Administrator</p>
                <br>
                <a href={{url('/')}}>Go back to homepage</a>
           </div>
         </div>
    </div>

@endsection
