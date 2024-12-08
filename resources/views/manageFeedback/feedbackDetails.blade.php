@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-primary text-white rounded-top">
                <h5 class="mb-0">Feedback Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label for="menuName" class="form-label fw-semibold">Menu</label>
                    <input type="text" class="form-control border-0 bg-light" id="menuName" 
                           value="{{ $feedback->menu->name }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="comment" class="form-label fw-semibold">Comment</label>
                    <textarea class="form-control border-0 bg-light" id="comment" rows="4" readonly>{{ $feedback->comment }}</textarea>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <label for="rating" class="form-label fw-semibold me-3">Rating</label>
                    <div id="rating" class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="star-disp {{ $i <= $feedback->rating ? 'filled' : 'empty' }}">&#9733;</span>
                        @endfor
                    </div>
                </div>
                <div class="mb-4">
                    <label for="feedbackDate" class="form-label fw-semibold">Date</label>
                    <input type="text" class="form-control border-0 bg-light" id="feedbackDate" 
                           name="date" value="{{ $feedback->date }}" readonly>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4 rounded-pill">Add Feedback</button>
                </div>
            </div>
        </div>
    </div>
@endsection
