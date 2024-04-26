
@extends('layouts.template')

@section('title','About')
@section('breadcrumbTitle','About us')
@section('content')


{{-- <x-breadcrumb text="About us"/> --}}
<div class="welcome-area pt-100 pb-95">
    <div class="container">
        <div class="welcome-content text-center">
            <h5>Who Are We</h5>
            <h1>Welcome To Flone</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labor et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat irure </p>
        </div>
    </div>
</div>


<div class="banner-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30">
                    <a href="product-details.html"><img src="assets/img/banner/banner-1.jpg" alt=""></a>
                    <div class="banner-content">
                        <h3>Watches</h3>
                        <h4>Starting at <span>$99.00</span></h4>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30">
                    <a href="product-details.html"><img src="assets/img/banner/banner-2.jpg" alt=""></a>
                    <div class="banner-content">
                        <h3>Plo Bag</h3>
                        <h4>Starting at <span>$79.00</span></h4>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30">
                    <a href="product-details.html"><img src="assets/img/banner/banner-3.jpg" alt=""></a>
                    <div class="banner-content">
                        <h3>Sunglass</h3>
                        <h4>Starting at <span>$79.00</span></h4>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-mission-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single-mission mb-30">
                    <h3>Our vission</h3>
                    <p>Flone provide how all this mistaken idea of denounc pleasure and sing pain was born an will give you a ete account of the system, and expound the actual teangs the eat explorer of the truth.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-mission mb-30">
                    <h3>Our mission </h3>
                    <p>Flone provide how all this mistaken idea of denounc pleasure and sing pain was born an will give you a ete account of the system, and expound the actual teangs the eat explorer of the truth.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-mission mb-30">
                    <h3>Our goal</h3>
                    <p>Flone provide how all this mistaken idea of denounc pleasure and sing pain was born an will give you a ete account of the system, and expound the actual teangs the eat explorer of the truth.</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
