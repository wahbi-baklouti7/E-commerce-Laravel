<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{



    public function home(){

        return view('frontoffice.home');
    }

    public function about(){

        return view ('frontoffice.about');
    }
    public function products(){

        return view ('frontoffice.products');
    }
    public function contact(){

        return  view ('frontoffice.contact');
    }

    public function cart(){
        return view('frontoffice.cart_page');
    }

    public function checkout(){
        return view('frontoffice.checkout');
    }

    public function loginRegister(){

        return view('frontoffice.login_register');
    }

    public function myAccount(){

        return view('frontoffice.my_account');
    }

    public function productDetails(){
        return view('frontoffice.product_details');
    }
}
