<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::with('department')->get();
        return view('backend.content.doctor.index', compact('doctors')); 
    } 

    public function create(){
        $departments = Department::all();
        return view('backend.content.doctor.create', compact('departments'));
    } 
    
    public function store(Request $request){
        // Validate and store the doctor data
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'specialized_in' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('doctors', 'public');
        }

        Doctor::create($data);

        return redirect()->route('doctor')->with('success', 'Doctor created successfully.');
    }

    public function edit($id){
        $doctor = Doctor::findOrFail($id);
        $departments = Department::all();
        return view('backend.content.doctor.edit', compact('doctor', 'departments'));
    }
    
    public function update(Request $request, $id){
      
        $doctor = Doctor::findOrFail($id); 
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'specialized_in' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

        $doctor->department_id = $request->department_id;
        $doctor->name = $request->name;
        $doctor->specialized_in = $request->specialized_in;
        $doctor->description = $request->description;   

        // Handle image upload
        if ($request->hasFile('image')) { 
            if ($doctor->image && Storage::disk('public')->exists($doctor->image)) {
                Storage::disk('public')->delete($doctor->image);
            }

            $imagePath = $request->file('image')->store('doctors', 'public');
            $doctor->image = $imagePath;
        }

        $doctor->save();

        return redirect()->route('doctor')->with('success', 'Doctor updated successfully.');
    }

    public function destroy($id){
        $doctor = Doctor::findOrFail($id);

        // Delete the doctor's image if it exists
        if ($doctor->image) {
            Storage::disk('public')->delete($doctor->image);
        }

        $doctor->delete();

        return redirect()->route('doctor')->with('success', 'Doctor deleted successfully.');
    }  
    
    public function doctorAppointments($id){
        $doctor = Doctor::findOrFail($id);
        $appointments = $doctor->appointments()->get();
        return view('backend.content.doctor.appointments', compact('doctor', 'appointments'));
    }
               
}
