@extends('backend.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Department</h2>
    <a href="{{ route('department') }}" class="btn btn-secondary">Back to List</a>
  </div>

  <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Department Name*</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
    </div>
    @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
    
    <div class="mb-3">
      <label for="image" class="form-label">Department Image*</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">            
    </div>
    @error('image')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="title" class="form-label">Title*</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
    </div>
    @error('title')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">Description*</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
    </div>
    @error('description')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection