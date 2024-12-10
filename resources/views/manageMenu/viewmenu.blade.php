@extends('layouts.app')

@section('content')
<div class="container">
    @if ($menu)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $menu->name }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                <img src="{{ asset('asset/default-image/' . $menu->image_path) }}" class="card-img-top img-fluid" alt="{{ $menu->name }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $menu->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" name="price" id="price" class="form-control" value="{{ $menu->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $menu->status ? 'selected' : '' }}>Available</option>
                                            <option value="0" {{ !$menu->status ? 'selected' : '' }}>Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('staff-menu') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Menu Items</h1>
                <ul>
                    @foreach ($menuItems as $item)
                        <li>
                            {{ $item->name }} (RM {{ $item->price }})
                            <a href="{{ route('menu.show', $item->id) }}" class="btn btn-primary">View</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                return confirm('Are you sure you want to save the changes?');
            });
        });
    </script>
</div>
@endsection