@extends('backend.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Doctor</h2>
    <a href="{{ route('doctor') }}" class="btn btn-secondary">Back to List</a>
  </div>

  <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Doctor Name*</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
    </div> 
    @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="department_id" class="form-label">Department*</label>
      <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
        <option value="">Select Department</option> 
      @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
      </select>
    </div>
    @error('department_id')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
    
    <div class="mb-3">
      <label for="image" class="form-label">Doctor Image*</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">            
    </div>
    @error('image')
        <div class="text-danger mt-1">{{ $message }}</div>  
    @enderror
      
    <div class="mb-3">
      <label for="specialized_in" class="form-label">Specialized In*</label>
      <input type="text" class="form-control @error('specialized_in') is-invalid @enderror" id="specialized_in" name="specialized_in">
    </div>
    @error('specialized_in')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">Description*</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4"></textarea>
    </div>
    @error('description')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection