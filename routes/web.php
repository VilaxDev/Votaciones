<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify'])->name('register.verify');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('votaciones', [AuthController::class, 'votaciones'])->name('votaciones');
    Route::get('candidatos', [CandidatosController::class, 'index'])->name('candidatos');
    Route::post('admin/candidatos', [CandidatosController::class, 'create'])->name('candidatos.create');
    Route::get('admin/candidatos/edit/{id}', [CandidatosController::class, 'edit'])->name('candidatos.edit');
    Route::put('admin/candidatos/update/{id}', [CandidatosController::class, 'update'])->name('candidatos.update');
    Route::delete('admin/candidatos/delete/{id}', [CandidatosController::class, 'delete'])->name('candidatos.delete');
    Route::get('admin/usuarios', [UsersController::class, 'index'])->name('admin.usuarios.index');
    Route::post('admin/usuarios', [UsersController::class, 'importExcel'])->name('admin.usuarios.importExcel');
});
