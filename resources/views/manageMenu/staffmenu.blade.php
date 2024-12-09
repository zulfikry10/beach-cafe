@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Manage Menu</h1>

  <div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-success" id="addMenuItemBtn">
      <i class="fas fa-plus"></i> Add Menu Item
    </button>
  </div>

  <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" id="addMenuItemForm" style="display: none;">
    @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" name="image" id="image" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="status">Status:</label>
      <select name="status" id="status" class="form-control">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Save Menu Item</button>
    <button type="button" class="btn btn-secondary" id="cancelAddMenuItemBtn">Cancel</button>
  </form>

  <h2>Existing Menu Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($menuItems as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>RM {{ $item->price }}</td>
          <td>{{ $item->status }}</td>
          <td>
            <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('menu.destroy', $item->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  $('#addMenuItemBtn').click(function() {
    $('#addMenuItemForm').show();
  });

  $('#cancelAddMenuItemBtn').click(function() {
    $('#addMenuItemForm').hide();
  });
});
</script>
@endsection