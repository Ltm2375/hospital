<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\DashboardController;
use App\Models\Historia;
use App\Models\Cita;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bienvenido');
});

//-----------------------------------------------------------------------------------------------------------
Route::resource('paciente', PacienteController::class);
Route::get('cancelar', function() {
    return redirect()->route('paciente.index')->with('datos2', 'Acción Cancelada ...!'); })->name('cancelar');
//-----------------------------------------------------------------------------------------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//-----------------------------------------------------------------------------------------------------------
Route::resource('cita', CitaController::class);
Route::get('/paciente/{dni}', [PacienteController::class, 'show']);
Route::get('cancelar2', function() {
    return redirect()->route('cita.index')->with('datos2', 'Acción Cancelada ...!'); })->name('cancelar2');
//-----------------------------------------------------------------------------------------------------------
Route::resource('historia', HistoriaController::class);


