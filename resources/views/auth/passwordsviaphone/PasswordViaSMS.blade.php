
@extends('layouts.authentication.master')
@section('title', 'Forget-password')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<div class="page-wrapper">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">

                    <div>
                        <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="loginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="loginpage"></a></div>
                        <div class="login-main">
                            <h4>Reset Your Password</h4>
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                            @if (!session('phone_verify'))
                            <form class="theme-form" action="{{ route('verify.phone') }}" method="POST">
                                @csrf
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label class="col-form-label" for="phone">Phone Number:</label>
                                    <input type="text" id="phone" class="@error('phone') is-invalid @enderror form-control" name="phone" required>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block m-t-10" type="submit">Send</button>
                                </div>
                            </form>
                            @elseif (!session('otp_verified'))
                            <div class="mt-4 mb-4"><span class="reset-password-link">If don't receive OTP? <a class="btn-link text-danger" href="{{ route('resend.otp') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('resendotp-form').submit();">
                                        {{ __('Resend OTP') }}
                                     </a>

                                    <form id="resendotp-form" action="{{ route('resend.otp') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></span></div>
                            <form id="otp-form" method="POST" action="{{ route('verify.otp') }}">
                                @csrf
                                <label class="col-form-label pt-0">Enter OTP</label>
                                <div class="row @error('otp') is-invalid @enderror ">
                                    <div class="col">
                                        <input class="form-control text-center otp-text" name="otp[]" type="text" maxlength="2">
                                    </div>
                                    <div class="col">
                                        <input class="form-control text-center otp-text" name="otp[]" type="text" maxlength="2">
                                    </div>
                                    <div class="col">
                                        <input class="form-control text-center otp-text" name="otp[]" type="text" maxlength="2">
                                    </div>
                                    
                                </div>
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button id="submit-otp" class="btn btn-primary" type="submit" style="display: none;">Submit OTP</button>
                            </form>
                            @else
                            <h6 class="mt-4">Create Your Password</h6>
                            <form action="{{ route('passwordreset') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">New Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Retype Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Done</button>
                                </div>
                            </form>
                            @endif
                            <p class="mt-4 mb-0">Already have an password?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
    const otpInputs = document.querySelectorAll('.otp-text');
    const otpForm = document.getElementById('otp-form');
    const submitButton = document.getElementById('submit-otp');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/\D/g, '');

            if (input.value.length === 2 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }

            if (Array.from(otpInputs).every(input => input.value.length === 2)) {
                submitButton.click();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });
});
</script>
@section('script')
<script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>
@endsection
