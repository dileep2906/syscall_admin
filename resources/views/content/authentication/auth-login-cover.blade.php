@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection
<!-- @if (Session::has('user'))
  <script>window.location = "/home";</script>
 @endif-->
@section('content')
<div class="auth-wrapper auth-cover">
  <div class="auth-inner row m-0">
    <!-- Brand logo-->
    <a class="brand-logo" href="#">
      <h2 class="brand-text text-primary ms-1">SYSCall</h2>
    </a>
    <!-- /Brand logo-->

    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
      <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
        @if($configData['theme'] === 'dark')
        <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
        @else
        <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
        @endif
      </div>
    </div>
    <!-- /Left Text-->

    <!-- Login-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">Welcome to SYSCall 👋</h2>
        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
        <div id="err"></div>
        @if (Session::has('message'))

        <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
          <div class="toast toast-autohide-success show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto">Success</strong>
              <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-white">
                           {{ Session::get('message') }}

            </div>
          </div>

        </div>


        @endif
        <!-- <form class="auth-login-form mt-2" action="{{route('auth-login-form')}}" method="post"> -->
          <form class="auth-login-form mt-2">
            @csrf
            <div class="mb-1">
              <label class="form-label" for="login-email">Email</label>
              <input class="form-control" id="login-email" type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="login-password">Password</label>
                <a href="{{url("forget-password")}}">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            <div class="mb-1">
              <div class="form-check">
               <input class="form-check-input" name="remember" id="remember-me" type="checkbox" tabindex="3" />
                <label class="form-check-label" for="remember-me"> Remember Me</label>
              </div>
            </div>
            <button type="button" onclick="submitForm()"   class="btn btn-primary w-100" tabindex="4">Sign in</button>
          </form>
          <!-- <p class="text-center mt-2">
            <span>New on our platform?</span>
            <a href="{{url('auth/register-cover')}}"><span>&nbsp;Create an account</span></a>
          </p>
          <div class="divider my-2">
            <div class="divider-text">or</div>
          </div>
          <div class="auth-footer-btn d-flex justify-content-center">
            <a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a>
            <a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a>
            <a class="btn btn-google" href="#"><i data-feather="mail"></i></a>
            <a class="btn btn-github" href="#"><i data-feather="github"></i></a>
          </div> -->
        </div>
      </div>
      <!-- /Login-->
    </div>
  </div>

  <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
    <div class="toast toast-autohide-success hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
      <div class="toast-header bg-success text-white">
        <strong class="me-auto">Success</strong>
        <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-success text-white">
        You have successfully Logged in
      </div>
    </div>

  </div>

  <div class="toast-container  position-fixed top-0 end-0 p-2" style="z-index: 15">
    <div class="toast toast-autohide-error hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto">Error</strong>
        <button type="button" class="ms-1 btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-danger text-white">
        Username or Password  Incorrect. Please Check
      </div>
    </div>

  </div>
  @endsection

  @section('vendor-script')
  <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
  @endsection

  @section('page-script')
  <script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>

  @endsection
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script>


    function submitForm() {




      var data = $(".auth-login-form").serialize();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type : 'POST',
        url: '{{route('auth-login-form')}}',
        data : data,
        success : function(response)
        {
          console.log(response);
          if(response.status == 200)
          {

            // Auto Hide Toast

            var autoHideToastSuccess = document.querySelector('.toast-autohide-success');

            var showAutoHideToastSuccess = new bootstrap.Toast(autoHideToastSuccess, {
              autohide: true
            });

            showAutoHideToastSuccess.show();
            window.location = '{{route('home')}}';

        }
        else if(response.status == 401)
        {
         var autoHideToastError = document.querySelector('.toast-autohide-error');

         var showAutoHideToastError = new bootstrap.Toast(autoHideToastError, {
          autohide: true
        });

         showAutoHideToastError.show();
       }
     }
   });
    };

  </script>
