<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('assets/frontend/media/Nav_LOGO.png') }}" alt="Logo" height="60" />
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Left Menu -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-semibold fs-5 {{ Request::routeIs('home') ? 'text-success' : 'text-primary' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold fs-5 {{ Request::routeIs('our.doctor') ? 'text-success' : 'text-primary' }}" href="{{ route('our.doctor') }}">Doctors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold fs-5 {{ Request::routeIs('all.departments') ? 'text-success' : 'text-primary' }}" href="{{ route('all.departments') }}">Departments</a>
        </li>
      </ul> 

      <ul class="navbar-nav ms-auto">
      @if (Route::has('login'))
         @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary fs-5" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user me-1"></i> Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            
                <li>
                  <a class="dropdown-item text-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                </li> 
              
          </ul>
        </li>
        @endauth
      @endif
      </ul> 
      <!-- Right Menu: User Dropdown -->
      <!-- <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary fs-5" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user me-1"></i> Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            @if (Route::has('login'))
              @auth
                <li>
                  <a class="dropdown-item text-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
              @else
                <li>
                  <a class="dropdown-item text-primary" href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                  <li>
                    <a class="dropdown-item text-primary" href="{{ route('register') }}">Register</a>
                  </li>
                @endif
              @endauth
            @endif
          </ul>
        </li>
      </ul> -->
    </div>
  </div>
</nav>
<!-- Navbar End -->
