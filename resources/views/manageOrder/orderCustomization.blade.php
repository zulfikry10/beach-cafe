@extends('layouts.app')

<head>
    <link rel="stylesheet" href="styles.css">
</head>

@section('content')
    <style>

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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="container mt-5">
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        <h2 class="text-center mb-4">Customize Your Order</h2>
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
        @foreach ($menus as $menu)
        
        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
            <div class="card p-4 shadow">
                <!-- Menu Item Details -->
                <div class="row">
                    <div class="col-md-4">
                        {{-- asset specificallly use to include javacript, css and file  but need to be store in ppublic directory. Other way can use URL --}}
                        <img src="{{ asset('storage/images/' . $menu->image_path) }}" alt="{{ $menu->name }}"
                            style="width: 300px;">
                    </div>
                    <div class="col-md-8">

                        <h3>{{ $menu->name }}</h3>

                        <!-- Customization Options -->
                        <form role="form" method="POST" action="{{ route('order.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                            <!-- Portion Size -->
                            <div class="mb-3">
                                <label for="portion-size" class="form-label"><strong>Portion Size</strong></label>
                                <select id="order_portion" name="order_portion" class="form-select">
                                    <option value="regular">Regular</option>
                                    <option value="large">Large</option>
                                </select>
                            </div>

                            <!-- Special Instructions -->
                            <div class="mb-3">
                                <label for="special-instructions" class="form-label"><strong>Remark</strong></label>
                                <textarea id="order_remark" name="order_remark" rows="3" class="form-control"
                                    placeholder="E.g., No pickles, extra sauce"></textarea>
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label"><strong>Quantity</strong></label>
                                <input type="number" id="order_quantity" name="order_quantity" class="form-control"
                                    value="1" min="1">
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="cart-footer">
            <button class="back-btn" onclick="history.back()">Back</button>
        </div>
    </div>
@endsection
