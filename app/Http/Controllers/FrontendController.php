<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Department;
use App\Models\Doctor;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->get();
        $departments = Department::latest('created_at', 'desc')->take(3)->get(); 
        return view('frontend/content/home', compact('sliders', 'departments'));
    }
    public function allDepartments()
    {
        $departments = Department::latest('created_at', 'desc')->get();
        return view('frontend/content/all-department', compact('departments')); 
    }

    public function showDepartmentDoctors($id)
    {
        $department = Department::findOrFail($id);
        $doctors = $department->doctors()->latest('created_at', 'desc')->get();
        return view('frontend/content/department-doctors', compact('department', 'doctors'));
    }

    // Add other methods as needed
    // ...

    public function ourDoctor( )
    {
        $doctors = Doctor::with('department')->get();
        return view('frontend/content/doctor', compact('doctors'));
    }
}
