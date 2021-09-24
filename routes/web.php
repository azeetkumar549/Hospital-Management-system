<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DoctorController;

 //admin
 Route::get("/",[AdminController::class,"index"])->name('admin');
 Route::match(['get','post'],"/add-branch",[AdminController::class,"add_branch"])->name('addbranch');
 Route::get("/manage-branch",[AdminController::class,"manage_branch"])->name('manage_branch');
 Route::match(['get','post'],"/edit-branch/{id}",[AdminController::class,"updateBranch"])->name('update.branch');
 Route::match(['get','post'],"/edit-staff/{id}",[AdminController::class,"updatestaff"])->name('update.staff');
 Route::match(['get','post'],"/edit-doctor/{id}",[AdminController::class,"updateDoctor"])->name('update.doctor');
 Route::get("/manage-staff",[AdminController::class,"manage_staff"])->name('manage_staff');
 Route::get("/manage-doctor",[AdminController::class,"manage_doctor"])->name('manage_doctor');
 Route::get("/manage-admin-patient",[AdminController::class,"manage_admin_patient"])->name('manage_admin_Patient');
 Route::match(['get','post'],"/add-doctor",[AdminController::class,"add_Doctor"])->name('add_doctor');
 Route::match(['get','post'],"/add-staff",[AdminController::class,"add_Staff"])->name('add_staff');
 Route::delete("/deleteuser/{id}",[AdminController::class,"destroyuser"])->name('deleteuser');
 Route::delete("/deletebranch/{id}",[AdminController::class,"destroybranch"])->name('deletebranch');
 Route::get('/doctorstatus/{id}',[AdminController::class,'status_doctor'])->name('status_doctor');
 Route::get('staffstatus/{id}',[AdminController::class,'status_staff'])->name('status_staff');

 //staff
 Route::get("/staff",[StaffController::class,"index"])->name('Staff');
 Route::match(['get','post'],"/add-patient",[StaffController::class,"addPatient"])->name('add_patient');
 Route::get("/manage-patient",[StaffController::class,"manage_patient"])->name('manage_patient');
 Route::delete("/deletestaff/{id}",[StaffController::class,"destroy"])->name('delete');
 Route::match(['get','post'],"/edit/{id}",[StaffController::class,"updatePatient"])->name('update');
 //Doctor
 Route::get("/doctor",[DoctorController::class,"index"])->name('Doctor');
 Route::get("/doctor-graph",[DoctorController::class,"line_graph"])->name('Doctor_graph');



Route::middleware('auth')->group(function(){

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
