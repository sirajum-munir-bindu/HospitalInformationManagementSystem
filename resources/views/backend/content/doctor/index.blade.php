@extends('backend.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Doctor List</h2>
    <a href="{{ route('doctor.create') }}" class="btn btn-success">Add Doctor</a>
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
     @foreach($doctors as $key=>$doctor)
      <tr>
         <td>{{ $key + 1 }}</td>
        <td>{{$doctor->name}}</td>
        <td><img src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image" width="60"></td> 

        <td>
          <a href="{{ route('doctor.appointments', $doctor->id) }}" class="btn btn-sm btn-success">Appointments</a>
          <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-sm btn-primary">Edit</a>
          <form action="{{ route('doctor.delete', $doctor->id) }}" method="POST" style="display:inline-block;">
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