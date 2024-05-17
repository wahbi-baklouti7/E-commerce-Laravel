@extends('layouts.template')

@section('styles')

@include('frontoffice.library.orderSatusCss')
@endsection

@section('title','Order Status')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 mt-3">
       <div class="first d-flex justify-content-around align-items-center mb-3">
         <div class="info">
             <span class="d-block name">Thank you, {{$fullName}}</span>
             <span class="order">Order - {{$orderId}} </span>

         </div>

          <img src="{{asset('assets/icons/truck.png')}}" width="40"/>


       </div>
           <div class="detail">
       <span class="d-block summery">Your order has been dispatched. we are delivering you order.</span>
           </div>
       <hr>
       <div class="text">
     <span class="d-block new mb-1" > {{$fullName}} </span>
      </div>
     <span class="d-block address mb-3">{{$address}}</span>
       <div class="  money d-flex flex-row mt-2 align-items-center">
         <img src="{{asset('assets/icons/cash.png')}}" width="20" />

         <span class="ml-2">Cash on Delivery</span>

            </div>
            <div class="last d-flex align-items-center mt-3">
             <span class="address-line">CHANGE MY DELIVERY ADDRESS</span>

            </div>
     </div>
 </div>
@endsection



