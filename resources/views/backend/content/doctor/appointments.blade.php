@extends('backend.app')

@section('content')
<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Appointments for Dr. {{ $doctor->name }}</h2>
    <a href="{{ route('doctor') }}" class="btn btn-success">Doctors</a>
  </div>
  
  @if($appointments->isEmpty())
    <p>No appointments found.</p>
  @else
    <table class="table table-bordered align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Patient Name</th>
          <th>Patient Phone</th>
          <th>Appointment Date</th>  
        </tr>
      </thead>
      <tbody>
        @foreach($appointments as $key=>$appointment)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $appointment->patient_name }}</td>
            <td>{{ $appointment->patient_phone }}</td>
            <td>{{ $appointment->appointment_date }}</td>  
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection