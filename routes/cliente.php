<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Cliente\PagoController;
use App\Http\Controllers\Cliente\PolizaController;
use App\Http\Controllers\Cliente\VehiculoController;
use App\Http\Controllers\Cliente\SiniestroController;

Route::resource('vehiculo',VehiculoController::class);
Route::resource('poliza',PolizaController::class);
Route::resource('pago',PagoController::class);

Route::resource('siniestro',SiniestroController::class);


Route::post('/confirmarPoliza',[PolizaController::class,'confirmar'])->name('confirmarpoliza');

Route::get('/pagar/{id}',[PagoController::class,'pagar'])->name('pagar');

Route::get('/metodopago/{id}',[PagoController::class,'metodopago'])->name('metodopago');

Route::post('/pagarqr',[PagoController::class,'pagarqr'])->name('pagoqr');
Route::post('/finalizarpagorqr/{id}',[PagoController::class,'finalizarpagorqr'])->name('finalizarpagorqr');
