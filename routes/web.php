<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurnosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('personal.activaturno', [TurnosController::class, 'activaturno'])->name('personal.activaturno');

// Route::get('turnos/update/{id}/{estado}', [TurnosController::class, 'cancelaturno'])->name('turnos.cancelaturno');
Route::get('turnos/cancelaturno/{id}/{estado}', [TurnosController::class, 'cancelaturno'])->name('turnos.cancelaturno');

Route::get('turnos/medicamentos/{id}/{estado}', [TurnosController::class, 'medicamentos'])->name('personal.medicamentos'); //aqui


Route::get('turnos/update/{id}/{estado}', [TurnosController::class, 'generafactura'])->name('turnos.generafactura');



Route::get('personal/factura/{turno}', [TurnosController::class, 'factura'])->name('personal.factura');


Route::post('personal/generarFac', [TurnosController::class, 'generarFac'])->name('generarFac');

Route::get('turnos.pagaFactura', [TurnosController::class, 'pagaFactura'])->name('turnos.pagaFactura'); 

// Route::view('turnos.pagafac', 'turnos.pagafac')->name('turnos.pagafac');
Route::get('/turnos/pagounidad/{id}', [TurnosController::class, 'pagounidad'])->name('turnos.pagafac');

Route::get('/personal/autorizo/{id}', [TurnosController::class, 'autorizo'])->name('turnos.autorizo');


Route::get('personal.medico', [TurnosController::class, 'medico'])->name('personal.medico');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('turnos', TurnosController::class);
});

require __DIR__ . '/auth.php';
