@extends('layouts.app')

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
    <div class="container mt-5">
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        <h2 class="text-center mb-4">Edit Your Order</h2>

        @if ($menus->isNotEmpty())
            <form action="{{ route('order.update', $menus->first()->order_id) }}" method="POST">
                @csrf
                @method('PUT')

                @foreach ($menus as $menu)
                    <div class="card p-4 shadow mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/images/' . $menu->menu->image_path) }}" 
                                     alt="{{ $menu->menu->name }}" style="width: 300px;">
                            </div>
                            <div class="col-md-8" style="margin-left: 50px;">
                                <h3>{{ $menu->menu->name }}</h3>

                                <!-- Portion Size -->
                                <div class="mb-3">
                                    <label for="order_portion_{{ $menu->id }}" class="form-label"><strong>Portion Size</strong></label>
                                    <select id="order_portion_{{ $menu->id }}" name="order_portion[{{ $menu->id }}]" class="form-select">
                                        <option value="regular" {{ $menu->order_portion === 'regular' ? 'selected' : '' }}>Regular</option>
                                        <option value="large" {{ $menu->order_portion === 'large' ? 'selected' : '' }}>Large</option>
                                    </select>
                                </div>

                                <!-- Special Instructions -->
                                <div class="mb-3">
                                    <label for="order_remark_{{ $menu->id }}" class="form-label"><strong>Remark</strong></label>
                                    <textarea id="order_remark_{{ $menu->id }}" name="order_remark[{{ $menu->id }}]" rows="3" class="form-control">{{ $menu->order_remark }}</textarea>
                                </div>

                                <!-- Quantity -->
                                <div class="mb-3">
                                    <label for="order_quantity_{{ $menu->id }}" class="form-label"><strong>Quantity</strong></label>
                                    <input type="number" id="order_quantity_{{ $menu->id }}" name="order_quantity[{{ $menu->id }}]" 
                                           class="form-control" value="{{ $menu->order_quantity }}" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Update Order</button>
                </div>
            </form>
        @else
            <p class="text-center text-danger">No items found for this order.</p>
        @endif

        <div class="text-center mt-4">
            <button class="back-btn" onclick="history.back()">Back</button>
        </div>
    </div>
@endsection
