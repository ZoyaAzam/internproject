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
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                         
                            <h6 class="mt-4">Enter Your Email.</h6>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required="" placeholder="test@example.com">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               <br>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Send Reset Password Link</button>
                                </div>
                            </form>
                            <p class="mt-4 mb-0">Already have an password?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

