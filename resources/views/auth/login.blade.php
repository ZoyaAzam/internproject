@extends('layouts.userpanel.master')

@section('title', 'Used 2018 Audi S8')
@section('description', 'Description for Used 2018 Audi S8')
@section('keywords', 'Used, Audi, S8, 2018')

@section('addCss')
<link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}">
@endsection

@section('content')
<section class="login-register-page">
    <div class="container">
        <div class="row justify-content-between">
            <div class="row">
                <div class="col-md-12">
                    @if (!empty(session('status')))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="alert alert-danger">
                            {{$errors->first('g-recaptcha-response') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="login-register">
                    <h2 class="title">Log In</h2>
                    <p>Welcome back! Please enter your username <br> and password to login.</p>
                    <div class="login-register-form">
                        <form id="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="single-form">
                                <label class="col-form-label">Email Address</label>
                                <input id="useremail" required type="email" class="form-control @error('useremail') is-invalid @enderror" name="useremail" value="{{ old('useremail') }}" autocomplete="useremail" autofocus>
                                @error('useremail')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                           
                            <div class="single-form">
                                <label class="col-form-label">Password</label>
                                <input id="userpassword" required type="password" class="form-control @error('userpassword') is-invalid @enderror" name="userpassword" autocomplete="current-password">
                                @error('userpassword')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="checkbox-forgot d-flex align-items-center justify-content-between">
                                <div class="single-form">
                                    <input id="checkbox1" class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="checkbox1"><span></span> Remember me</label>
                                </div>
                                <div class="single-form">
                                    {{-- @if (Route::has('password.request.via.SMS'))
                                        <a class="link" href="{{ route('password.request.via.SMS') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                        <a class="btn btn-link" href="{{ route('choose.service') }}">
                                           {{ __('Forgot Your Password?') }}
                                        </a>
                                </div>
                            </div>
                            @if ($errors->has('g-recaptcha-response'))
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </div>
                            @endif
                            <br>
                            <div class="g-recaptcha" data-callback="recaptchaLoginCallback" data-sitekey="{{ config('recaptcha.site_key') }}" id="login-recaptcha"></div>
                            <br />
                            <div class="single-form form-btn">
                                <button type="submit" id="login-submit-btn" class="main-btn d-block">log in</button>
                            </div>
                        </form>
                    </div>
                    <div class="login-register-social">
                        <p>or log in with</p>
                        <ul class="social">
                            <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login-register">
                    <h2 class="title">Register</h2>
                    <p>Create new account today to reap the benefits of a personalized <br> shopping experience.</p>
                    <div class="login-register-form">
                        <form id="register-form" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="single-form">
                                <label for="Name">Your Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Your name" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-form">
                                <label for="Email">Email Address</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="test@gmail.com" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-form">
                                <label class="col-form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="*******">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-form">
                                <label for="password-confirm" class="col-form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="*******">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                            <div class="single-form">
                                <label class="col-form-label" for="region">Region:</label>
                                <select id="region" name="region" class="form-control" required>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="IN">India</option>
                                    <option value="PK">Pakistan</option>
                                    <!-- Add more regions as needed -->
                                </select>
                            </div>
                            <div class="single-form">
                                <label class="col-form-label" for="phone">Phone Number:</label>
                                <input type="text" id="phone" class="@error('phone') is-invalid @enderror form-control" name="phone" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="checkbox-forgot">
                                <div class="single-form">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2"><span></span> I accept <a href="#">Term of Use</a> & <a href="#">Privacy Policy</a></label>
                                </div>
                            </div>
                            @if ($errors->has('g-recaptcha-response'))
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </div>
                            @endif
                            <br>
                            <div class="g-recaptcha" data-callback="recaptchaRegisterCallback" data-sitekey="{{ config('recaptcha.site_key') }}" id="register-recaptcha"></div>
                            <br />
                            <div class="single-form form-btn">
                                <button type="submit" id="register-submit-btn" class="main-btn d-block">register now</button>
                            </div>
                        </form>
                    </div>
                    <div class="login-register-social">
                        <p>or register with</p>
                        <ul class="social">
                            <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="register-benefits">
                    <h4 class="title">Sign up today and you will be able to :</h4>
                    <p>TheLoke Buyer Protection has you covered from click to delivery. Sign up  or sign in and you will be able to:</p>
                    <ul class="benefits-list">
                        <li><i class="ion-android-checkmark-circle"></i> Speed your way through checkout</li>
                        <li><i class="ion-android-checkmark-circle"></i> Track your orders easily</li>
                        <li><i class="ion-android-checkmark-circle"></i> Keep a record of all your purchases</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('ScriptMineExtra')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
   function recaptchaLoginCallback() {
       document.getElementById('login-submit-btn').disabled = false;
   }

   function recaptchaRegisterCallback() {
       document.getElementById('register-submit-btn').disabled = false;
   }

   document.getElementById('login-form').addEventListener('submit', function(event) {
       if (grecaptcha.getResponse() === "") {
           event.preventDefault();
           alert("Please complete the reCAPTCHA.");
       }
   });
   registerWidgetId = grecaptcha.render('register-recaptcha', {
    alert('bbbbbbbbbb');
           'sitekey' : '{{ config('recaptcha.site_key') }}',
           'callback' : recaptchaRegisterCallback
       });

   document.getElementById('register-form').addEventListener('submit', function(event) {
       if (grecaptcha.getResponse() === "") {
           event.preventDefault();
           alert("Please complete the reCAPTCHA.");
       }
   });
   
</script>
@endsection
