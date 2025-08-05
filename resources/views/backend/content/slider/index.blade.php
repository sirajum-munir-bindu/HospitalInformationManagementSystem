@extends('backend.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Slider List</h2>
    <a href="{{ route('slider.create') }}" class="btn btn-success">Add Slider</a>
  </div>

  <table class="table table-bordered align-middle text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Image</th> 
        <th>Actions</th>
      </tr>
    </thead>
    <tbody> 
     @foreach($sliders as $key=>$slider)
      <tr>
         <td>{{ $key + 1 }}</td>
        <td><img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" width="60"></td> 

        <td>
          <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-primary">Edit</a>

          <form action="{{ route('slider.delete', $slider->id) }}" method="POST" style="display:inline-block;">
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