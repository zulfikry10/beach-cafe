@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="image-container">
                    <img src="{{ asset('asset/default-image/no-image.jpg') }}" alt="Add Menu">
                </div>
                <div class="card-body">
                    <button type="button" class="add-menu-btn">
                        Add Menu
                    </button>
                </div>
            </div>

            <div id="add-menu-form" style="display: none;">
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Menu</button>
                    <button type="button" class="btn btn-secondary" id="cancelAddMenuItemBtn">Cancel</button>
                </form>
            </div>
        </div>

        @foreach ($menuItems as $item)
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="image-container">
                    <img src="{{ asset('asset/default-image/' . $item->image_path) }}" class="card-img-top img-fluid" alt="{{ $item->name }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">RM {{ $item->price }}</p>
                    <p class="card-text">Status: {{ $item->status }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('menu.show', $item->id) }}" class="btn btn-primary mr-2">View</a>
                        <form action="{{ route('menu.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection