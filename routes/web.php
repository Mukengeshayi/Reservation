<?php

use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SalleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::middleware(['role:admin'])->group(function () {
    Route::resource('admin/salles', SalleController::class);
    Route::resource('admin/dashboard',DashboardController ::class);
    Route::resource('admin/employés', EmployerController ::class);
    Route::resource('admin/employés', EmployerController ::class);

    Route::resource('admin/adminreservations',AdminReservationController ::class);
    Route::patch('admin/adminreservations/{reservation}/status',[AdminReservationController ::class, 'updateStatus'])->name('adminreservations.updateStatus');;

});

Route::middleware(['role:demandeur'])->group(function () {
    Route::resource('demandeur/reservations', ReservationController::class);

});

require __DIR__.'/auth.php';
