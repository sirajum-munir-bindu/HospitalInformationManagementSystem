@extends('backend.app')

@section('content')
<div class="container-fluid"> 
    <div class="row">
        <div class="col-4">
            <div class="card p-2 shadow">
                <a href="{{ route('department') }}">
                    <div class="card-header text-center font-weight-bold bg-primary text-light">Total Department</div>
                </a>
                <div class="card-body">
                    <h1 class="card-title text-center font-weight-bold">{{ $totalDepartments }}</h1>
                </div>
            </div>
        </div>
        
        <div class="col-4">
            <div class="card p-2 shadow">
                <a href="{{ route('doctor') }}">
                    <div class="card-header text-center font-weight-bold bg-primary text-light">Total Doctor</div>
                </a> 
                <div class="card-body">
                    <h1 class="card-title text-center font-weight-bold">{{ $totalDoctors }}</h1>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card p-2 shadow"> 
                <div class="card-header text-center font-weight-bold bg-primary text-light">Total Appointments</div> 
                <div class="card-body">
                    <h1 class="card-title text-center font-weight-bold">{{ $totalAppointments }}</h1>
                </div>
            </div>
        </div> 

    </div>
</div>
@endsection