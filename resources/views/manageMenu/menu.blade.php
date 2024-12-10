@extends('layouts.app')
<head>
    <link rel="stylesheet" href="styles.css">
</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($menuItems as $item)
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="image-container">
                        <img src="{{ asset('asset/default-image/' . $item->image_path) }}" class="card-img-top img-fluid" alt="{{ $item->name }}" >
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">RM {{ $item->price }}</p>
                        <p class="card-text">Status: {{ $item->status }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection