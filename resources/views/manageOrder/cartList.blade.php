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

        
    </style>
</head>
@section('content')
    <div class="container">

        <body>
            <div class="cart-header shadow">My Cart</div>
            <div class="card p-4 shadow">

                <!-- Items -->
                <div class="cart-items">
                    <div class="cart-item">
                        <img src="{{ asset('storage/food3.jpg') }}" alt="" style="width: 200px;">
                        <div class="cart-item-details">
                            <p class="cart-item-name">Nasi Lemak McD Set A x1</p>
                            <div class="cart-item-quantity">
                                <button class="minus">-</button>
                                <input type="number" class="quantity-input" min="1" value="1">
                                <button class="plus">+</button><br><br>
                                <a href="">
                                    <i class="fas fa-edit" style="padding-right:15px;color:blue"></i>
                                </a>
                                <a href="#" onclick="showDeleteConfirmation();">
                                    <i class="fas fa-trash" style="padding-right:15px;color:rgb(255, 5, 5)"></i></a>

                            </div>
                        </div>
                        <div class="cart-item-price">RM15.23</div>
                    </div>
                    <div class="cart-item">
                        <img src="{{ asset('storage/food3.jpg') }}" alt="" style="width: 200px;">
                        <div class="cart-item-details">
                            <p class="cart-item-name">Bubur Ayam McD™ x1</p>
                            <div class="cart-item-quantity">
                                <button class="minus">-</button>
                                <input type="number" class="quantity-input" min="1" value="1">
                                <button class="plus">+</button>

                                <br><br>
                                <a href="">
                                    <i class="fas fa-edit" style="padding-right:15px;color:blue"></i>
                                </a>
                                <a href="#" onclick="showDeleteConfirmation();">
                                    <i class="fas fa-trash" style="padding-right:15px;color:rgb(255, 5, 5)"></i></a>
                            </div>

                        </div>
                        <p class="cart-item-price">RM25.49</p>
                    </div>

                    <hr>

                    <div class="total">Total: RM40.35</div>

                    <div class="cart-footer">
                        <button class="checkout-btn">Checkout</button>
                    </div>
                </div>

            </div>
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


    <!-- Padam Aduan Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Order Details ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this order details ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="deleteLink" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!--  End Padam Aduan Modal -->
    <script>
        function showDeleteConfirmation(deleteUrl) {
            // Set the href attribute of the delete link in the modal
            document.getElementById('deleteLink').href = deleteUrl;

            // Show the delete confirmation modal
            $('#deleteConfirmationModal').modal('show');
        }
    </script>
@endsection
