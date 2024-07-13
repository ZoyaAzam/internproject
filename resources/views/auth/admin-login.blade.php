@extends('layouts.authentication.master')
@section('title', 'Login-bs-validation')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="{{asset('assets/images/login/1.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
               <div class="login-main">
                @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if(!empty(session('adminpresent')))
               <form method="POST" class ="theme-form needs-validation" action="{{ route('verifyToken') }}">
                  @csrf
                  <h4>Token Verification</h4>
                  <p>Enter your token below</p>
                  <div class="form-group">
                     <label class="col-form-label">Your Token</label>
                     <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" value="{{ old('token') }}" required autocomplete="token" autofocus>
                     @error('token')
                     <div class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </div>
                      @enderror 
                  </div>
                  <div class="form-group mb-0">
                     <button class="btn btn-primary btn-block" type="submit">Verify</button>
                  </div>
               </form>
                   @else
                  {{-- <form class="theme-form needs-validation" novalidate=""> --}}
                    <form method="POST" class ="theme-form needs-validation" action="{{ route('admin.login') }}">
                        @csrf
                     <h4>Sign in to account</h4>
                     <p>Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                         @enderror 
                    </div>
                     <div class="form-group">
                       
                        <label class="col-form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                         @enderror
                        <div class="show-hide">
                            <span class="show"></span>
                        </div>
                                
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                            <input id="checkbox1" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label class="text-muted" for="checkbox1">Remember me</label>
                            </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                    
                  </form>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script>
   (function() {
   'use strict';
   window.addEventListener('load', function() {
   // Fetch all the forms we want to apply custom Bootstrap validation styles to
   var forms = document.getElementsByClassName('needs-validation');
   // Loop over them and prevent submission
   var validation = Array.prototype.filter.call(forms, function(form) {
   form.addEventListener('submit', function(event) {
   if (form.checkValidity() === false) {
   event.preventDefault();
   event.stopPropagation();
   }
   form.classList.add('was-validated');
   }, false);
   });
   }, false);
   })();
   
</script>
@endsection
