<?php

namespace App\Http\Controllers;
 
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctors = Doctor::count();
        $totalDepartments = Department::count();
        $totalAppointments = Appointment::count();

        return view('backend.content.home.index', compact('totalDoctors', 'totalDepartments', 'totalAppointments')); 
    }
}
