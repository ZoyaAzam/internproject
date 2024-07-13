
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
                            <h4>Reset Your Password Via:</h4>
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                                <div class="form-group">
                                   <a class = "btn btn-outline-dark" href="{{ route('password.request') }}">Email</a>
                                </div><br>
                                <div class="form-group">
                                   <a href="{{route('password.request.via.whatsapp')}}" class = "btn btn-outline-warning" >Whatsapp</a>
                                </div>
                            <p class="mt-4 mb-0">Already have an password?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
