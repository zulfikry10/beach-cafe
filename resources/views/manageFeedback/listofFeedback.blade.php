@extends('layouts.app')

@section('content')
    {{-- @php
        if ($user->role == 'Customer') {
            $color = 'bg-primary';
        } elseif ($user->role == 'Staff') {
            $color = 'bg-success';  
        }
    @endphp --}}

    <div class="container mt-4">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white rounded-top">
                <h5 class="mb-0">Feedback List</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Date</th>
                            <th scope="col">Rating</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $index => $feedback)
                            <tr class="{{ $index % 2 === 0 ? 'table-light' : 'table-secondary' }}">
                                <th scope="row" class="text-center fw-bold">{{ $index + 1 }}</th>
                                <td>{{ $feedback->menu->name }}</td>
                                <td>{{ $feedback->date }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ $feedback->rating }} 
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <a href="" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
