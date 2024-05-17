





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order - [Your Shop Name]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .order-details p {
            margin-bottom: 5px;
        }
        .order-details .list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .order-details .list li {
            margin-bottom: 10px;
        }
        .order-items {
            margin-bottom: 20px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-items table th,
        .order-items table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>
<body>
    {{-- @dd($orderProducts) --}}
    <div class="container">
        <div class="header">
            <h1>ESPS Store</h1>
        </div>
        <div class="order-details">
            <h2>Order Details</h2>
            <p>Order ID: {{ $order->id }} </p>
            <p>Customer Name: {{ $order->full_name }} </p>
            <p>Email: {{ $order->email }} </p>
            <p>Phone Number: {{ $order->phone }} </p>
            <p>Billing Address: {{ $order->address }} </p>
            <p>Shipping Address: {{ $order->address }} </p>
            <p>Order Date: {{ $order->created_at }} </p>
        </div>
        <div class="order-items">
            <h2>Order Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderProducts as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }} TND</td>
                            <td>{{ $item->price * $item->quantity }} TND</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Subtotal</th>
                        <td>{{ $order->total_price }} TND</td>
                    </tr>
                    {{-- @if ($order->discount > 0)
                        <tr>
                            <th colspan="3">Discount</th>
                            <td>fff</td>
                        </tr>
                    @endif --}}
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
        </div>
    </div>
</body>
</html>
