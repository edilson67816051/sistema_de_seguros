<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CotizacionController;

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
    return view('welcome');
});

Auth::routes();

Route::resource('cotizacion',CotizacionController::class)->names('cotizacion');

Route::get('cotizacion/{id}/pdf', [CotizacionController::class, 'exportToPdf'])->name('cotizacion.pdf');

Route::get('/enviar-correo/{cotizacionId}', [MailController::class, 'sendEmail'])->name('enviar.correo');









