@extends('backend.app')
@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Slider</h2>
    <a href="{{ route('slider') }}" class="btn btn-secondary">Back to List</a>
  </div>

  <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="image" class="form-label">Slider Image*</label>

      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
      @if($slider->image)
        <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Image" width="60" class="mt-2">
      @endif
    
    </div> 
      @error('image')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-primary">Update</button>
  </form>

</div>
@endsection

 
