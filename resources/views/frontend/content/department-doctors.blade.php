@extends('frontend.app')

@section('content')
   <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <h2 class="text-center text-success fw-bold mt-4">Meet Our Specialists in the {{ $department->name }} Department</h2>
          <hr class="w-25 border-success mx-auto border-3 opacity-50" />

         <div class="row g-4">
            @forelse($doctors as $doctor)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow border-0 rounded-3">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $doctor->image) }}" 
                                class="card-img-top rounded-top object-fit-cover"
                                alt="{{ $doctor->name }}"
                                style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2 badge bg-success">
                                {{ $doctor->department->name ?? 'General' }}
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column"> 
                            <h5 class="card-title text-primary fw-bold mb-3 text-center">{{ $doctor->name }}</h5>
                            <h6 class="text-muted mb-2">Specialized In: {{ $doctor->specialized_in }}</h6>
                            <p class="card-text flex-grow-1 text-secondary small">
                                {{ \Illuminate\Support\Str::limit($doctor->description, 60) }}
                            </p>
                            <a href="#" class="btn btn-success mt-3 w-100" data-bs-toggle="modal" data-bs-target="#appointmentModal" data-doctor="{{ $doctor->id }}" data-doctorname="{{ $doctor->name }}">
                              Make Appointment
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center mt-5 mb-5">
                        <div class="alert alert-warning fs-5">No doctors found in this department...</div>
                    </div>
                @endforelse
         </div>


        </div>
      </div>
    </div>

  <!-- Appointment Modal -->
<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('appointments.store') }}">
      @csrf
      <input type="hidden" name="doctor_id" id="modalDoctorId">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appointmentModalLabel">Book Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="patient_name" class="form-label">Patient Name</label>
            <input type="text" name="patient_name" id="patient_name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="patient_phone" class="form-label">Phone Number</label>
            <input type="text" name="patient_phone" id="patient_phone" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="notes" class="form-label">Notes (optional)</label>
            <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success w-100">Confirm Appointment</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const appointmentModal = document.getElementById('appointmentModal');
    appointmentModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const doctorId = button.getAttribute('data-doctor');
        const doctorName = button.getAttribute('data-doctorname');

        // Set hidden input value
        appointmentModal.querySelector('#modalDoctorId').value = doctorId;

        // Optionally update modal title
        const modalTitle = appointmentModal.querySelector('.modal-title');
        modalTitle.textContent = `Book Appointment with Dr. ${doctorName}`;
    });
});
</script>
@endpush
