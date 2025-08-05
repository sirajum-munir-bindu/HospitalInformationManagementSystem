<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

     protected $fillable = [
        'doctor_id',
        'patient_name',
        'patient_phone',
        'appointment_date',
        'notes',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
}
