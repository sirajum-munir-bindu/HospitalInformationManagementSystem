<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('slider') }}">
                    <i class="fa-solid fa-sliders"></i>
                    <span>Slider</span>
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('department') }} ">
                    <i class="fa-solid fa-building-user"></i>
                    <span>Departments</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('doctor') }}">
                    <i class="fa-solid fa-person"></i>
                    <span>Doctors</span>
                </a>
            </li>  

            <li class="nav-item">
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger p-2 ml-3"> 
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                         <span>Logout</span>
                    </button>
                </form>
            </li>  

        </ul>
        <!-- End of Sidebar -->