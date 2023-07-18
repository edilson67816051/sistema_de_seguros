<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\RoleControlle;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PolizaController;
use App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\Admin\CoberturaController;
use App\Http\Controllers\Admin\SiniestroController;
use App\Http\Controllers\admin\EvaluacionController;

Route::get('',[HomeController::class,'index'])->name('admin.index');


Route::resource('users',UserController::class)->names('admin.users');
Route::resource('client',ClientController::class)->names('admin.client');

Route::resource('roles',RoleControlle::class)->names('admin.roles');

Route::resource('coberturas',CoberturaController::class);
Route::resource('adminsiniestro',SiniestroController::class);
Route::resource('evaluacion',EvaluacionController::class);

Route::resource('bitacora',LogController::class);
Route::resource('poliza',PolizaController::class);
Route::get('polizaestado/{id}',[PolizaController::class,'estado'])->name('polizaestado');

Route::get('poliza_d/{id}/pdf', [PolizaController::class, 'exportToPdf'])->name('poliza.pdf');


