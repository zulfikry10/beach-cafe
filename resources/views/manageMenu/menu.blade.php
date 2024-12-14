{{-- @extends('layouts.app')

<head>
    <link rel="stylesheet" href="styles.css">
</head>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($menuItems as $item)
                <a href="{{ route('customize.order', ['menu' => $item['id']]) }}" style="text-decoration: none;">
                    <i class="fas fa-edit" style="padding-right:15px;color:blue"></i>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="image-container">
                                <img src="{{ asset('storage/images/' . $item->image_path) }}" class="card-img-top img-fluid"
                                    alt="{{ $item->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">RM {{ $item->price }}</p>
                                <p class="card-text">Status: {{ $item->status}} </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection --}}

@extends('layouts.app')

<head>
    <style>
        .category-title {
            margin-top: 20px;
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
            background-color: #f8f9fa;
            padding: 10px 0;
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
        }

        .card {
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            height: 200px;
            /* Ensure cards are of equal height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: green;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .image-container img {
            height: 150px;
            /* Fixed height for all images */
            width: 100%;
            /* Ensures it stretches horizontally */
            object-fit: cover;
            /* Crop image to fit */
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            flex: 1;
            /* Make card body take remaining space */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 5px;
        }
    </style>
</head>

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Our Menu</h2>

        <!-- Drinks Section -->
        <div class="category-title">Drinks</div><br><br>
        <div class="row">
            @foreach ($menuItems as $item)
            <a href="{{ route('customize.order', ['menu' => $item['id']]) }}" style="text-decoration: none;">
                @if ($item->category === 'Drink')
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="image-container">
                                <img src="{{ asset('storage/images/' . $item->image_path) }}" class="card-img-top img-fluid"
                                    alt="{{ $item->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">RM {{ number_format($item->price, 2) }}</p>
                                <p class="card-text">Status: {{ $item->status }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                </a>
            @endforeach
        </div>

        <!-- Food Section -->
        <div class="category-title">Food</div><br><br>
        <div class="row">
            @foreach ($menuItems as $item)
            <a href="{{ route('customize.order', ['menu' => $item['id']]) }}" style="text-decoration: none;">
                @if ($item->category === 'Food')
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="image-container">
                                <img src="{{ asset('storage/images/' . $item->image_path) }}" class="card-img-top img-fluid"
                                    alt="{{ $item->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">RM {{ number_format($item->price, 2) }}</p>
                                <p class="card-text">Status: {{ $item->status }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                </a>
            @endforeach
        </div>

        <!-- Side Dish Section -->
        <div class="category-title">Side Dish</div><br><br>
        <div class="row">
            @foreach ($menuItems as $item)
            <a href="{{ route('customize.order', ['menu' => $item['id']]) }}" style="text-decoration: none;">
                @if ($item->category === 'Side Dish')
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="image-container">
                                <img src="{{ asset('storage/images/' . $item->image_path) }}"
                                    class="card-img-top img-fluid" alt="{{ $item->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">RM {{ number_format($item->price, 2) }}</p>
                                <p class="card-text">Status: {{ $item->status }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                </a>
            @endforeach
        </div>
    </div>
@endsection
