<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CoberturaController;

Route::get('',[HomeController::class,'index'])->name('admin.index');


Route::resource('users',UserController::class)->names('admin.users');

Route::resource('coberturas',CoberturaController::class);



