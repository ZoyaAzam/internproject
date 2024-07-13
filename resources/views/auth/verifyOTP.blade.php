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
                    @if (!empty(session('success')))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    @if (!empty(session('message')))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
           
            <div class="col-md-6">
                <div class="login-register">
                    <div class="mt-4 mb-4"><span class="reset-password-link">If don't receive OTP? <a class="btn-link text-danger" href="{{ route('resend.otp') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('resendotp-form').submit();">
                                        {{ __('Resend OTP') }}
                                     </a>

                                    <form id="resendotp-form" action="{{ route('resend.otp') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></span></div>
                        <form id="otp-form" method="POST" action="{{ route('verifyotp') }}">
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
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection
@section('ScriptMineExtra')
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
@endsection
