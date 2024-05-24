<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOrderEmail;
use App\Mail\SampleEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{






    // public function sendEmail(){
    //     $recipient = 'bakloutiwahbi@gmail.com';
    //     $orders=Order::latest()->first();

    //     $orderProducts = $orders->orderLignes()->get();
    //     $product = $orders->products();

    //     dd($orderProducts,$product);

    //     // dd($orders->address);
    //     $data = ['orders'=>$orders,
    //     // 'name'=>'baklouti wahbi',
    //     //     'message'=>'hello from laravel'
    //     ];


    //     Mail::to($recipient)->send(new SampleEmail($data['orders']));

    //     return response()->json(['message' => 'Email sent successfully to' . $recipient]);
    // }
}
