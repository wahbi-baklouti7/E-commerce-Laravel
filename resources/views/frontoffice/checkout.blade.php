
@extends('layouts.template')

@section('title','Checkout')

@section('breadcrumbTitle','Checkout')
@section('content')


{{-- <x-breadcrumb text="Checkout"/> --}}
<div class="checkout-area pt-95 pb-100">
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
@if (session('success'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i>  {{ session('success') }}</h5>

</div>



@endif
    <div class="container">
        <form action="{{ route('order.create') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>

                    <div class="row">

                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>First Name</label>
                                <input type="text" name="first_name" value="{{Auth::user()->first_name ?? ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Last Name</label>
                                <input  type="text" name="last_name" value="{{Auth::user()->last_name ?? ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Email Address</label>
                                <input type="text" name="email" value="{{Auth::user()->email ?? ''}}">
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Company Name</label>
                                <input type="text">
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-12">
                            <div class="billing-select mb-20">
                                <label>Country</label>
                                <input type="text" name="country">
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Address</label>
                                <input class="billing-address" value="{{Auth::user()->address ?? ''}}" name="address" placeholder="Street address" type="text">
                                {{-- <input placeholder="Apartment, suite, unit etc." type="text"> --}}
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Town / City</label>
                                <input type="text" name="city">
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>State</label>
                                <select name="city" required="required" id="ville-id">
                                    <option selected value="Sfax">Sfax</option>
                                    <option value="Ariana">Ariana</option
                                        ><option value="Ben arous"> Ben arous</option>
                                        <option value="Bizerte"> Bizerte</option><option value="Béja"> Béja</option>
                                        <option value="Gabés"> Gabès</option><option value="Gafsa"> Gafsa</option>
                                        <option value="Jendouba"> Jendouba</option>
                                        <option value="Kairouan"> Kairouan</option>
                                        <option value="Kasserine"> Kasserine</option>
                                        <option value="Kebili"> Kébili</option>
                                        <option value="La manouba"> La manouba</option>
                                        <option value="Le kef"> Le kef</option>
                                        <option value="Mahdia"> Mahdia</option>
                                        <option value="Monastir"> Monastir</option>
                                        <option value="Medenine"> Médenine</option>
                                        <option value="Nabeul"> Nabeul</option>
                                        <option value="Sidi bouzid"> Sidi bouzid</option>
                                        <option value="Siliana"> Siliana</option>
                                        <option value="Sousse"> Sousse</option>
                                        <option value="Tataouine"> Tataouine</option>
                                        <option value="Tozeur"> Tozeur</option>
                                        <option value="Tunis"> Tunis</option>
                                        <option value="zaghouan"> Zaghouan</option></select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Postcode</label>
                                <input type="text" name="postal_code">
                            </div>
                        </div>

                    </div>
                {{-- </form> --}}
                    {{-- <div class="checkout-account mb-50">
                        <input class="checkout-toggle2" type="checkbox">
                        <span>Create an account?</span>
                    </div>
                    <div class="checkout-account-toggle open-toggle2 mb-30">
                        <input placeholder="Email address" type="email">
                        <input placeholder="Password" type="password">
                        <button class="btn-hover checkout-btn" type="submit">register</button>
                    </div>
                    <div class="additional-info-wrap">
                        <h4>Additional information</h4>
                        <div class="additional-info">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                        </div>
                    </div>
                    <div class="checkout-account mt-25">
                        <input class="checkout-toggle" type="checkbox">
                        <span>Ship to a different address?</span>
                    </div>
                    <div class="different-address open-toggle mt-30">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>First Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Last Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Company Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-select mb-20">
                                    <label>Country</label>
                                    <select>
                                        <option>Select a country</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name" type="text">
                                    <input placeholder="Apartment, suite, unit etc." type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Town / City</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>State / County</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Postcode / ZIP</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Phone</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Email Address</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    @foreach ($cartItems as $item)
                                    <li><span class="order-middle-left">{{$item['name']}} X  {{$item['quantity']}}</span> <span class="order-price">$ {{$item['price'] * $item['quantity']}} </span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>$ {{$cartTotal}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion element-mrg">
                                <div class="panel-group" id="accordion">
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-one">
                                            <h4 class="panel-title">
                                                <a data-bs-toggle="collapse" href="#method1">
                                                    Direct bank transfer
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method1" class="panel-collapse collapse show" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-two">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method2">
                                                    Check payments
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method2" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-three">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method3">
                                                    Cash on delivery
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method3" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <form action="{{route('order.create')}}" method="POST">
                    @csrf --}}
                    <div class="Place-order mt-25">
                            <button class="btn-hover" type="submit" >Place Order</button>
                    </div>
                {{-- </form> --}}

                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
