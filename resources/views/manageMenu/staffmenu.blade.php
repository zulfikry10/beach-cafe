@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="image-container">
                    <img src="{{ asset('asset/default-image/no-image.jpg') }}" class="card-img-top img-fluid" alt="Add Menu">
                    <h5 class="card-title">Menu Name</h5>
                        <p class="card-text">Menu Price</p>
                        <p class="card-text">Menu Status</p>
                </div>
                <div class="card-body">
                    <a href="{{ route('add-menu') }}" class="btn btn-primary">Add Menu</a>
                </div>
            </div>
        </div>

        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        @foreach ($menuItems as $item)
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="image-container">
                    <img src="{{ asset('asset/default-image/' . $item->image_path) }}" class="card-img-top img-fluid" alt="{{ $item->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">RM {{ $item->price }}</p>
                        <p class="card-text">Status: {{ $item->status ? 'Available' : 'Unavailable' }}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('menu.show', $item->id) }}" class="btn btn-primary mr-2">View</a>
                            <form action="{{ route('menu.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection