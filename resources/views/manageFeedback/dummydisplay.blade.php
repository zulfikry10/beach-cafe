@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('view_all_feedback', ['id' => $user->id ?? 5]) }}" class="btn btn-primary me-3">List of Feedback</a>
        <a href="{{ route('view_add_Feedback', ['menu_id' => $menu->id ?? 6]) }}" class="btn btn-primary me-3">Add Feedback</a>

    </div>
@endsection
