@extends('layouts.app')
<head>
    <link rel="stylesheet" href="styles.css">
</head>
@section('content')
<div class="container" style="background-color: red">
    <div class="row justify-content-center" style="background-color:aqua">
        hiiiii


<style>
        .container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            margin-right: 15px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item-details h5 {
            margin: 0;
        }

        .cart-item-details p {
            margin: 5px 0;
            font-size: 14px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
        }

        .subtotal {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .quantity-buttons {
            display: flex;
        }

        .quantity-buttons button {
            border: 1px solid #ccc;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Your Cart</h1>

        <div class="cart-items">
            <div class="cart-item">
                <img src="images/product1.jpg" alt="Product 1"> 
                <div class="cart-item-details">
                    <h5>Product 1</h5>
                    <p>Price: $19.99</p>
                    <div class="quantity-buttons">
                        <button class="minus">-</button>
                        <input type="number" class="quantity-input" min="1" value="1">
                        <button class="plus">+</button>
                    </div>
                </div>
            </div>

            <div class="cart-item"> 
                <img src="images/product2.jpg" alt="Product 2"> 
                <div class="cart-item-details">
                    <h5>Product 2</h5>
                    <p>Price: $14.50</p>
                    <div class="quantity-buttons">
                        <button class="minus">-</button>
                        <input type="number" class="quantity-input" min="1" value="2">
                        <button class="plus">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="subtotal">
            Subtotal: $34.49 
        </div>

        <div class="total">
            Total: $34.49
        </div>

        <button class="btn-primary">Checkout</button> 
    </div>

    <script>
        const plusButtons = document.querySelectorAll('.plus');
        const minusButtons = document.querySelectorAll('.minus');
        const quantityInputs = document.querySelectorAll('.quantity-input');

        plusButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const input = quantityInputs[index];
                input.value = parseInt(input.value) + 1;
            });
        });

        minusButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const input = quantityInputs[index];
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
        });
    </script>
</div>
</div>

@endsection