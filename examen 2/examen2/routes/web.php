<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ProveedorController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('insumos', InsumoController::class)->except('show');
    Route::resource('proveedores', ProveedorController::class)
        ->except('show')
        ->parameters(['proveedores' => 'proveedor']);
    Route::resource('empleados', EmpleadoController::class)->except('show');
});
