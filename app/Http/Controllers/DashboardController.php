<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){

        $numOfOrders= Order::count();
        $numOfProducts = Product::count();
        $numOfCategories= Category::count();
        // $numOfCustomers = User::where('role','customer')->count();
        $numOfCustomers = UserType::where('name', 'customer')
        ->first()
        ->users 
        ->count(); 
        
        $totalOfEarnings = Order::sum('total_price');
        
        
        return view('backoffice.dashboard.index',compact('numOfOrders','numOfProducts','numOfCategories','numOfCustomers','totalOfEarnings'));
    }
}
