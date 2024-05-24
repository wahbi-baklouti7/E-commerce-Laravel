<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f4f4f4;
            color: #333333;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        .order-details {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details th, .order-details td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        .order-details th {
            background-color: #007bff;
            color: #ffffff;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Your Order!</h1>
        </div>
        <div class="content">
            <p>Hi {{$orders->first_name . ' ' . $orders->last_name}},</p>
            <p>Thank you for your purchase. We are processing your order and will notify you once it has shipped.</p>
            <h2>Order Details</h2>
            <table class="order-details ">
                <tr class="text-center">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>

                @foreach ($orderProducts as $item)
                <tr class="text-center">
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td> {{$item->price}} TND</td>
                    <td>{{$item->price * $item->quantity}} TND</td>
                </tr>
                @endforeach


                <tfoot>
                    <tr>
                        <th colspan="3">Subtotal</th>
                        <td>{{ $order->total_price }} TND</td>
                    </tr>

                    <tr>
                        <th colspan="3">Shipping Cost</th>
                        <td>8 TND</td>
                    </tr>
                    <tr>
                        <th colspan="3">Total</th>
                        <td>{{ $order->total_price + 8 }} TND</td>
                    </tr>
                </tfoot>
            </table>
            {{-- <a href="#" class="button">View Your Order</a> --}}
            <p>If you have any questions, reply to this email or contact our support team at espspStore@example.com.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 {{config('app.name')}}. All rights reserved.</p>
            <p> {{env('APP_NAME')}} </p>
        </div>
    </div>
</body>
</html>
