@extends('frontend.app')

@section('content')
  <!-- Dynamic Slider start --> 
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div
          id="carouselExampleIndicators"
          class="carousel slide"
          data-bs-ride="carousel"
          data-bs-interval="3000"
          data-bs-pause="false"
        >
          <div class="carousel-indicators">
            @foreach($sliders as $index => $slider)
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="{{ $index }}" 
                @if($index === 0) class="active" aria-current="true" @endif
                aria-label="Slide {{ $index + 1 }}"
              ></button>
            @endforeach
          </div>
          <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
              <div class="carousel-item @if($index === 0) active @endif">
                <img
                  src="{{ asset('storage/' . $slider->image) }}"
                  class="d-block w-100"
                  alt="{{ $slider->alt }}"
                  style="height: 500px; width: auto"
                />
              </div>
            @endforeach
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span
              class="carousel-control-prev-icon"
              aria-hidden="true"
            ></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span
              class="carousel-control-next-icon"
              aria-hidden="true"
            ></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Dynamic Slider end -->

  <!-- department Section start -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center text-success fw-bold">Our Departments</h2>
        <hr class="w-25 border-success mx-auto border-3 opacity-50" />

        <div class="row g-4">
          @forelse($departments as $department)
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card h-100 border-0 shadow">
                <div class="ratio ratio-4x3">
                  <img src="{{ asset('storage/' . $department->image) }}" class="card-img-top object-fit-cover rounded-top" alt="{{ $department->name }}">
                </div>
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title text-success text-center">{{ $department->name }}</h5>
                  <p class="card-text flex-grow-1 text-muted">{{ \Illuminate\Support\Str::limit($department->description, 80) }}</p>
                  <div class="d-flex justify-content-center gap-2 mb-2 mt-auto">
                    <a href="{{ route('department.doctors', $department->id) }}" class="btn btn-success">View Doctors</a>
                    <button type="button" class="btn btn-primary view-details-btn"
                      data-bs-toggle="modal"
                      data-bs-target="#departmentModal"
                      data-name="{{ $department->name }}"
                      data-description="{{ $department->description }}"
                      data-image="{{ asset('storage/' . $department->image) }}">
                      View Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
            @empty
                <div class="col-12 text-center">
                <div class="alert alert-warning">No departments found.</div>
                </div>
            @endforelse
        </div>
        
      </div>
    </div>
    <div class="container text-center">
    <div class="row">
      <div class="col-12">
      <a
        href="{{ route('all.departments') }}"
        class="btn btn-primary mt-3 opacity-75"
        style="font-size: 20px; font-weight: 600"
        >View All Departments</a>
      </div>
    </div>
    </div>
  </div>
  <!-- department Section end -->

    <!-- Department Modal -->
  <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="departmentModalLabel"></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <img id="departmentModalImg" class="w-100" alt="Department Image">
          <div class="p-4">
            <h5 class="fw-bold text-success" id="departmentModalTitle"></h5>
            <p class="text-muted" id="departmentModalDesc"></p>
          </div>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('departmentModal');
      const title = document.getElementById('departmentModalLabel');
      const img = document.getElementById('departmentModalImg');
      const modalTitle = document.getElementById('departmentModalTitle');
      const desc = document.getElementById('departmentModalDesc');

      document.querySelectorAll('.view-details-btn').forEach(function(btn) {
        btn.addEventListener('click', function () {
          const name = this.getAttribute('data-name');
          const description = this.getAttribute('data-description');
          const image = this.getAttribute('data-image');

          title.textContent = name;
          modalTitle.textContent = name;
          desc.textContent = description;
          img.src = image;
          img.alt = name;
        });
      });
    });
  </script>
 

@endsection 