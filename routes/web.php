<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class,'index'])->name('home');
Route::get('/all-departments', [FrontendController::class,'allDepartments'])->name('all.departments');
Route::get('/department/doctors/{id}', [FrontendController::class,'showDepartmentDoctors'])->name('department.doctors');
Route::get('/our/doctor', [FrontendController::class,'ourDoctor'])->name('our.doctor');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');



// Route::get('/dashboard', function () {
//     return view('backend/content/home/index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('doctor', [DoctorController::class,'index'])->name('doctor');
    Route::get('doctor/create', [DoctorController::class,'create'])->name('doctor.create');
    Route::post('doctor/store', [DoctorController::class,'store'])->name('doctor.store');
    Route::get('doctor/edit/{id}', [DoctorController::class,'edit'])->name('doctor.edit');
    Route::put('doctor/update/{id}', [DoctorController::class,'update'])->name('doctor.update');
    Route::delete('doctor/delete/{id}', [DoctorController::class,'destroy'])->name('doctor.delete');
    Route::get('/doctor/appointments/{id}', [DoctorController::class,'doctorAppointments'])->name('doctor.appointments');

    Route::get('department', [DepartmentController::class,'index'])->name('department');
    Route::get('department/create', [DepartmentController::class,'create'])->name('department.create');
    Route::post('department/store', [DepartmentController::class,'store'])->name('department.store');
    Route::get('department/edit/{id}', [DepartmentController::class,'edit'])->name('department.edit');
    Route::put('department/update/{id}', [DepartmentController::class,'update'])->name('department.update');
    Route::delete('department/delete/{id}', [DepartmentController::class,'destroy'])->name('department.delete');

    Route::get('slider', [SliderController::class,'index'])->name('slider');
    Route::get('slider/create', [SliderController::class,'create'])->name('slider.create');
    Route::post('slider/store', [SliderController::class,'store'])->name('slider.store');
    Route::get('slider/edit/{id}', [SliderController::class,'edit'])->name('slider.edit');
    Route::put('slider/update/{id}', [SliderController::class,'update'])->name('slider.update');
    Route::delete('slider/delete/{id}', [SliderController::class,'destroy'])->name('slider.delete');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
