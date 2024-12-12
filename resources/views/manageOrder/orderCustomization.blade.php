@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
<div class="container mt-5">
    <h2 class="text-center mb-4">Customize Your Order</h2>
    <div class="card p-4 shadow">
        <!-- Menu Item Details -->
        <div class="row">
            <div class="col-md-4">
                {{-- asset specificallly use to include javacript, css and file  but need to be store in ppublic directory. Other way can use URL--}}
                <img src="{{asset('storage/food1.jpg')}}" alt="" style="width: 300px;">
                {{-- <img src="/path-to-image/burger.jpg" alt="Menu Item" class="img-fluid rounded"> --}}
            </div>
            <div class="col-md-8">
                <h3>Cheeseburger</h3>
                <p>Delicious cheeseburger with a 100% beef patty, fresh lettuce, tomatoes, and melted cheese.</p>
                        <!-- Customization Options -->
        <form action="/customize-order" method="POST">
            @csrf

            <!-- Portion Size -->
            <div class="mb-3">
                <label for="portion-size" class="form-label"><strong>Portion Size</strong></label>
                <select id="portion-size" name="portion_size" class="form-select">
                    <option value="regular">Regular</option>
                    <option value="large">Large (+$2.00)</option>
                </select>
            </div>

            <!-- Add Toppings -->
            <div class="mb-3">
                <label for="toppings" class="form-label"><strong>Add Toppings</strong></label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="extra-cheese" name="toppings[]" value="extra_cheese">
                    <label for="extra-cheese" class="form-check-label">Extra Cheese (+$1.00)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="bacon" name="toppings[]" value="bacon">
                    <label for="bacon" class="form-check-label">Vagies (+$1.50)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="onion-rings" name="toppings[]" value="onion_rings">
                    <label for="onion-rings" class="form-check-label">Onion Rings (+$0.75)</label>
                </div>
            </div>


            <!-- Special Instructions -->
            <div class="mb-3">
                <label for="special-instructions" class="form-label"><strong>Special Instructions</strong></label>
                <textarea id="special-instructions" name="special_instructions" rows="3" class="form-control" placeholder="E.g., No pickles, extra sauce"></textarea>
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label for="quantity" class="form-label"><strong>Quantity</strong></label>
                <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
            </div>
        </form>
            </div>
            
        </div>
        <hr>
    </div>
</div>
@endsection

