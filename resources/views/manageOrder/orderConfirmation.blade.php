{{-- @extends('layouts.app')

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

        .cart-body {
            padding: 20px;
        }

        .order-summary {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .order-summary p {
            margin: 0;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            margin: 10 0 10 0;
            display: left;
            text-align: right;
        }

        .cart-items {
            margin-left: 100px;
            width: 80%;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .cart-item {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;

        }

        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .cart-item-details {
            flex: 1;
            margin-left: 20px;
            width: 50%;
        }

        .cart-item-name {
            font-size: 20px;
            margin: 0;
        }

        .cart-item-price {
            color: #28a745;
            font-weight: bold;
            margin-right: 0;
        }

        .cart-footer {
            text-align: center;
            padding: 20px;
            text-align: right;
        }

        .quantity-input {
            width: 20%;
            text-align: center;
        }

        .checkout-btn {
            background: #dc3545;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background: #c82333;
        }

        .back-btn {
            background:darkgray;
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
    <div class="container">

        <body>
            <div class="cart-header shadow">Order Confirmation</div>
            <div class="card p-4 shadow">

                <!-- Items -->
                <div class="cart-items">
                    <div class="cart-item">
                        <img src="{{ asset('storage/images/' . $data->menu->image_path) }}">
                        <div class="cart-item-details">
                            <p class="cart-item-name">Nasi Lemak McD Set A x1</p>
                        </div>
                        <div class="cart-item-price">RM15.23</div>
                    </div>
                    <div class="cart-item">
                        <img src="{{ asset('storage/food3.jpg') }}" alt="" style="width: 200px;">
                        <div class="cart-item-details">
                            <p class="cart-item-name">Bubur Ayam McD™ x1</p>

                        </div>
                        <p class="cart-item-price">RM25.49</p>
                    </div>

                    <hr>

                    <div class="total">Total: RM40.35</div>

                    <div class="cart-footer">
                        <button class="back-btn">Back</button>
                        <button class="checkout-btn">Place Order</button>
                    </div>
                </div>

            </div>
    </div>
    </div>
@endsection --}}


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

        .cart-body {
            padding: 20px;
        }

        .order-summary {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .order-summary p {
            margin: 0;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            margin: 10 0 10 0;
            text-align: right;
        }

        .cart-items {
            margin-left: 100px;
            width: 80%;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .cart-item {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .cart-item-details {
            flex: 1;
            margin-left: 20px;
            width: 50%;
        }

        .cart-item-name {
            font-size: 20px;
            margin: 0;
        }

        .cart-item-price {
            color: #28a745;
            font-weight: bold;
            margin-right: 0;
        }

        .cart-footer {
            text-align: center;
            padding: 20px;
            text-align: right;
        }

        .checkout-btn {
            background: #dc3545;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background: #c82333;
        }

        .back-btn {
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
    <div class="container">

        <body>
            <div class="cart-header shadow">Order Confirmation</div>
            <div class="card p-4 shadow">

                <!-- Items -->
                <div class="cart-items">
                    @foreach ($cartItems as $item)
                        <div class="cart-item">
                            <img src="{{ asset('storage/images/' . $item->menu->image_path) }}" alt="{{ $item->menu->name }}">
                            <div class="cart-item-details">
                                <p class="cart-item-name"><b>{{ $item->menu->name }} x{{ $item->order_quantity }}</b></p>
                                <p class="cart-item-remark">{{ $item->order_portion }}</b></p>
                                <p class="cart-item-remark"><i><b>*{{ $item->order_remark }}</b><i></p>
                            </div>
                            <div class="cart-item-price">
                                RM{{ number_format($item->menu->price * $item->order_quantity, 2) }}
                            </div>
                        </div>
                    

                    <hr>

                    @endforeach
                    <div class="total">Total: RM{{ number_format($item->order->order_total, 2) }}</div>
                   
                    <div class="cart-footer">
                        <button class="back-btn" onclick="history.back()">Back</button>
                        <button class="checkout-btn" onclick="confirmOrder({{ $item->order->id }})">Place Order</button>

                    </div>
                </div>

            </div>
    </div>
    </div>

    {{-- <script>
        function confirmOrder(orderId) {
    if (confirm("Are you sure you want to place this order?")) {
        // Send the request to change the order status
        fetch(`/confirm-order/${orderId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                // If the response status is not OK, throw an error
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            if (data.success) {
                alert("Order placed successfully!");
                location.reload(); // Reload the page to reflect changes
            } else {
                alert(data.message || "Failed to place the order. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    }
}

    </script> --}}

    <script>
        function confirmOrder(orderId) {
            if (confirm("Are you sure you want to place this order?")) {
                // Send the request to change the order status
                fetch(`/confirm-order/${orderId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        // If the response status is not OK, throw an error
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json(); // Parse the JSON response
                })
                .then(data => {
                    if (data.success) {
                        alert("Order placed successfully!");
                        // Redirect to the order status page
                        window.location.href = `/order-status/${orderId}`;
                    } else {
                        alert(data.message || "Failed to place the order. Please try again.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred. Please try again.");
                });
            }
        }
    </script>
    
    
@endsection
