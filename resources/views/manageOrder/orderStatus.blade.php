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
            width: 100%;
            padding-left: 100px;
            background: #fff;
            color: #000;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .back-btn {
            margin-top: 70px;
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
        <div class="cart-header shadow">Invoice Order</div>
        <div class="card p-4 shadow">

            <div class="row shadow">
                <!-- Left: Order Details Section -->
                <div class="col-12">

                    <!-- Order ID Section -->
                    <h5><strong>Order ID:</strong> #12345678</h5>
                    <p><strong>Order Date:</strong> December 8, 2024</p>
                    <hr>

                    <!-- Order List Section -->
                    <h5><strong>Order List:</strong></h5>
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
                            <tr>
                                <td>Cheeseburger</td>
                                <td>2</td>
                                <td>$5.00</td>
                                <td>$10.00</td>
                            </tr>
                            <tr>
                                <td>French Fries</td>
                                <td>1</td>
                                <td>$2.50</td>
                                <td>$2.50</td>
                            </tr>
                            <tr>
                                <td>Soda</td>
                                <td>2</td>
                                <td>$1.50</td>
                                <td>$3.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><strong>$15.50</strong></td>
                        </tr>
                    </tfoot>
                </div>
            </div>

        </div>
        <div class="cart-footer">
            <button class="back-btn">Back</button>
        </div>
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
@endsection
