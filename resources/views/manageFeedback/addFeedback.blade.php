@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Add Feedback</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('create_feedback') }}" method="POST">
                    @csrf
                
                    <input type="hidden" name="user_id" value="{{ $user->id ?? 5 }}">
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                
                    <div class="mb-3">
                        <label for="menuName" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="menuName" value="{{ $menu->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="4" placeholder="Write your feedback here..."></textarea>
                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <div id="rating" class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="d-none">
                                <label for="star{{ $i }}" class="star">&#9733;</label>
                            @endfor
                        </div>
                        @error('rating')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="feedbackDate" class="form-label">Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="feedbackDate" name="date" max="{{ now()->toDateString() }}">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add Feedback</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection
