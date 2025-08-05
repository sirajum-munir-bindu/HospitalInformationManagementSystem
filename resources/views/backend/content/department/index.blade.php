
@extends('backend.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Department List</h2>
    <a href="{{ route('department.create') }}" class="btn btn-success">Add Department</a>
  </div>

  <table class="table table-bordered align-middle text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th> 
        <th>Actions</th>
      </tr>
    </thead>
    <tbody> 
     @foreach($departments as $key=>$department)
      <tr>
         <td>{{ $key + 1 }}</td>
        <td>{{$department->name}}</td>
        <td><img src="{{ asset('storage/' . $department->image) }}" alt="Dept Image" width="60"></td> 

        <td>
          <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm btn-primary">Edit</a>

          <form action="{{ route('department.delete', $department->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          </form>
        </td>
        
      </tr>
      @endforeach
      <!-- Repeat rows dynamically -->
    </tbody>
  </table>
</div>
@endsection


