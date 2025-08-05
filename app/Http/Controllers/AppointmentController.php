<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'patient_name' => 'required|string|max:255',
        'patient_phone' => 'required|string|max:20',
        'appointment_date' => 'required|date|after_or_equal:today',
        'notes' => 'nullable|string'
    ]);

    Appointment::create($request->all());

    return back()->with('success', 'Appointment booked successfully!');
}

}
