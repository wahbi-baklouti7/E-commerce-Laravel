
@extends('layouts.template')

@section("title","Login Register")

@section('content')


<x-breadcrumb text="Login/Register"/>
<div class="login-register-area pt-100 pb-100">
    <div class="container">
        @if (count($errors)>0)
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Errors!</h5>
    <ul
        class=""
    >
        @foreach ($errors->all() as $error)
        <li class="nav-item">
            <p>{{ $error }}</p>
        </li>
        @endforeach
    </ul>

</div>
@endif
        <div class="row">
            <div class="col-lg-7 col-md-12 ms-auto me-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{route('login')}}" method="POST">
                                        @csrf
                                        <input type="text" name="email" placeholder="Username">
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form px-sm-4 px-md-0 ">
                                    <form action="{{route('register')}}" class="row d-flex justify-content-around" method="POST">
                                        @csrf
                                        <input required class="col-md-5 col-sm-5" name="first_name" placeholder="First Name" type="text">
                                        <input required class="col-md-5 col-sm-5" name="last_name" placeholder="Last Name" type="text">
                                        <input required class="col-md-5 col-sm-5" name="email" placeholder="Email" type="email">
                                        {{-- <input required class="col-5" type="text" name="name" placeholder="Username"> --}}
                                        <input required class="col-md-5 col-sm-5" type="number" name="phone" placeholder="Phone Number">
                                        <input required class="col-11" type="text" name="address" placeholder="Address">
                                        <input required class="col-md-5" type="password" name="password" placeholder="Password">
                                        <input required class="col-md-5" type="password" name="password_confirmation" placeholder="Confirm Password">
                                        <div class="button-box">
                                            <button class="w-100" type="submit"><span>Register</span></button>
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
