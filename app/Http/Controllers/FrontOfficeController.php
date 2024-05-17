<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{



    public function home(){

        $products = Product::latest('created_at')->get();
        $lastTwoWeeks= Carbon::now()->subDays(4);
        // dd($lastTwoWeeks);
        // $newArrivals = Product::latest('created_at')->get();
        $newArrivals = Product::wherebetween('created_at',[$lastTwoWeeks,Carbon::now()])->get();
        return view('frontoffice.home',compact('products', 'newArrivals'));
    }

    public function about(){

        return view ('frontoffice.about');
    }
    public function products(string $category=null){

        // dd($category);
        if($category){

            $categoryId = Category::where('name',$category)->first()->id;
            $products= Product::where('category_id',$categoryId)->get();
        }
        else{

            $products = Product::all();
        }

        return view ('frontoffice.products',compact('products'));
    }
    public function contact(){

        return  view ('frontoffice.contact');
    }

    public function cart(){
        // session()->forget('cart');
        $cartItems= session()->get('cart') ?? [];
        $cartTotal =0;
        if($cartItems){
        foreach($cartItems as $item){

            $cartTotal = $cartTotal + $item['price'] * $item['quantity'];
        }
    }
        return view('frontoffice.cart_page',compact('cartItems','cartTotal'));
    }

    public function checkout(){

        $cartItems = session()->get('cart') ?? [];
        $cartTotal=0;
        if($cartItems){
            foreach($cartItems as $item){
                $cartTotal = $cartTotal + $item['price'] * $item['quantity'];
            }
        }
        return view('frontoffice.checkout',compact('cartItems','cartTotal'));
    }

    public function loginRegister(){

        return view('frontoffice.login_register');
    }

    public function myAccount(){

        return view('frontoffice.my_account');
    }

    public function productDetails(Product $product){
        return view('frontoffice.product_details',compact('product'));
    }

    public function orderStatus(Request $request){

        $test= Order::latest()->first();
        $address = $test->address;
        $fullName = $test->first_name.' '.$test->last_name;
        $orderId = $test->id;


        return view('frontoffice.order_status',compact('orderId','fullName','address'));
    }
}
