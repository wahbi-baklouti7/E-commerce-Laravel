<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOrderEmail;
use App\Mail\SampleEmail;
use App\Models\Order;
use App\Models\OrderLigne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function sendEmail(){
        $recipient = 'bakloutiwahbi@gmail.com';
        $order=Order::latest()->first();

        $orderProducts = $order->orderLignes;
        // $product = $orders->product;

        // dd($orderProducts,$product);

        // dd($orders->address);
        $data = ['order'=>$order,
        'orderProducts'=>$orderProducts,
        // 'name'=>'baklouti wahbi',
        //     'message'=>'hello from laravel'
        ];


        Mail::to($recipient)->send(new SampleEmail($data['order'],$data['orderProducts'],'emails.customer'));

        return response()->json(['message' => 'Email sent successfully to' . $recipient]);
    }

    public function sendCustomerEmail(){


        // $recipient = 'bakloutiwahbi@gmail.com';
        $order=Order::latest()->first();
        $recipient = $order->email;
        $orderProducts = $order->orderLignes;
        // $product = $orders->product;

        // dd($orderProducts,$product);

        // dd($orders->address);
        $data = [
        'order'=>$order,
        'orderProducts'=>$orderProducts,
        ];


        Mail::to($recipient)->send(new CustomerOrderEmail($data['order'],$data['orderProducts']));

        return response()->json(['message' => 'Email sent successfully to' . $recipient]);
    }

    public function index(){

        $orders= Order::all();

        return view('backoffice.order.index',compact('orders'));
    }

    public function create(Request $request){


      $fields=   $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "postal_code" => "required",
            // "payment_method" => "required",

        ]);
        $cartItems= session()->get('cart') ?? [];

        $sum= array_sum(array_column($cartItems, 'price'));
        $num_items= count($cartItems);
        // $sum= array_sum($cartItems['price']);
        // dd($sum);
        // dd($cartItems,$sum);
        $fields['total_price']= $sum;
        $fields['quantity']= $num_items;
        $fields['user_id']= 2;
        $fields['status']= 'pending';




        if(count($cartItems) > 0){
        $order= Order::create($fields);
          foreach($cartItems as $item){
            $total_price= $item['price'] * $item['quantity'];
            OrderLigne::create([
                "order_id" => $order->id,
                "product_id" => $item['id'],
                "quantity" => $item['quantity'],
                "price" => $item['price'],
                "total_price" => $total_price
            ]);


        }
    }

        // dd($request->all());


        // $fullName= $fields['first_name'].' '.$fields['last_name'];

        // return redirect()->route('frontoffice.orderStatus',
        //     [
        //         'orderId' => $order->id,
        //         'fullName'=>$fields['first_name'].' '.$fields['last_name'],
        //         'address'=>$fields['address'],
        //     ]
        // );

        session()->forget('cart');

       $this-> sendEmail();
       $this->sendCustomerEmail();
        return  redirect()->route('frontoffice.orderStatus')
        ->with([
            // 'orderId' => $orderId,
            'fullName' => $fields['first_name'].' '.$fields['last_name'],
            // 'address' => $address,
        ]);


        // return back()->with('success', 'Order created successfully');
        // dd($request->input("first_name"));

    }


}
