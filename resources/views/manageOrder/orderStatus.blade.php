
@extends('layouts.app')

<head>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .cart-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 0 0 10px 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cart-header {
            background: #fff;
            color: #000;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .row {
            padding: 15px;
            background: #fff;
            color: #000;
            font-size: 18px;
            font-weight: bold;
        }

        .back-btn {
            margin-top: 20px;
            background: darkgray;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-btn:hover {
            background: grey;
        }
    </style>
</head>

@section('content')
@include('manageOrder.progress', ['step' => 3])
    <div class="container">
        <div class="cart-header shadow">Invoice Order</div>
        <div class="card p-4 shadow">

            <!-- Order Details Section -->
                <div class="col-12">
                    @if ($items->isNotEmpty())
                        <h5><strong>Order ID:</strong> #{{ $items->first()->order->id }}</h5>
                        <p><strong>Order Date:</strong> {{ $items->first()->order->created_at->format('F d, Y') }}</p>
                        <hr>
                    @endif

                    <!-- Order List Section -->
                    <h5><strong>Order List</strong></h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->menu->name }}</td>
                                    <td>{{ $item->order_quantity }}</td>
                                    <td>RM{{ number_format($item->menu->price, 2) }}</td>
                                    <td>RM{{ number_format($item->menu->price * $item->order_quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td><strong>RM{{ number_format($item->order->order_total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
        </div>

        <!-- Back Button -->
        <div class="cart-footer">
            <button class="back-btn" onclick="history.back()">Back</button>
        </div>
    </div>
@endsection
