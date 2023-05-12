<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\PolizaController;
use App\Http\Controllers\Cliente\VehiculoController;

Route::resource('vehiculo',VehiculoController::class);
Route::resource('poliza',PolizaController::class);
Route::resource('pago',PagoController::class);