@extends('layouts.app')

@section('content')
    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            
            @foreach ($feedbacks as $feedback)
                <tr>
                <th scope="row">1</th>
                <td>Menu</td>
                <td>Date</td>
                <td>
                    <a href="" class="btn btn-warning">View</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
@endsection