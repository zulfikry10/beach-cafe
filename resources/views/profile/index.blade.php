@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">User Profiles</h1>
    
    <!-- Table -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ ucwords($user->name) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    {{-- <td>
                        <!-- Edit Button -->
                        <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                    </td> --}}
                    <td>
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('profile.delete', ['id'=> $user->id])}}" method="post" 
                              onsubmit="return confirm('Are you sure you want to delete this profile?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

