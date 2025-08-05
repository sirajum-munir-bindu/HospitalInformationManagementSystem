@extends('backend.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Doctor</h2>
    <a href="{{ route('doctor') }}" class="btn btn-secondary">Back to List</a>
  </div>

  <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Doctor Name --}}
    <div class="mb-3">
      <label for="name" class="form-label">Doctor Name*</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
             value="{{ old('name', $doctor->name) }}" required>
      @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
    </div>

    {{-- Department --}}
    <div class="mb-3">
      <label for="department_id" class="form-label">Department*</label>
      <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id" >
        <option value="">Select Department</option>
        @foreach($departments as $department)
          <option value="{{ $department->id }}"
            {{ old('department_id', $doctor->department_id) == $department->id ? 'selected' : '' }}>
            {{ $department->name }}
          </option>
        @endforeach
      </select>
      @error('department_id')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
    </div>

    {{-- Doctor Image --}}
    <div class="mb-3">
      <label for="image" class="form-label">Doctor Image</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
      @if($doctor->image)
        <div class="mt-2">
          <img src="{{ asset('storage/' . $doctor->image) }}" alt="Current Image" width="80">
        </div>
      @endif
      @error('image')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
    </div>

    {{-- Specialized In --}}
    <div class="mb-3">
      <label for="specialized_in" class="form-label">Specialized In*</label>
      <input type="text" class="form-control @error('specialized_in') is-invalid @enderror" id="specialized_in"
             name="specialized_in" value="{{ old('specialized_in', $doctor->specialized_in) }}">
      @error('specialized_in')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
    </div>

    {{-- Description --}}
    <div class="mb-3">
      <label for="description" class="form-label">Description*</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" rows="4">{{ old('description', $doctor->description) }}</textarea>
      @error('description')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Doctor</button>
  </form>
</div>
@endsection
