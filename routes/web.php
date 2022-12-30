<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\SaqueController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'indexRegister'])->name('indexRegister');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth'); //Implementando
Route::post('/', [UserController::class, 'register'])->name('register'); //Implementando

Route::prefix('/app')->middleware('auth')->group(function () {
    //Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    //Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    //Users
    Route::get('/users/edit/', [UserController::class, 'edit'])->name('editUser');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('updateUser');

    //Contas    
    Route::get('/contas/create', [ContaController::class, 'create'])->name('createConta');
    Route::post('/contas', [ContaController::class, 'store'])->name('storeConta');
    Route::delete('/contas/{id}', [ContaController::class, 'destroy'])->name('deleteConta');
    Route::get('/contas/gerarPdf/', [ContaController::class, 'gerarPdf'])->name('gerarPdf');
    Route::get('/graficos', [ContaController::class, 'graficos'])->name('graficos');
    Route::get('/relatorios', [ContaController::class, 'relatorios'])->name('relatorios');

    //Depositos    
    Route::get('/depositos/create', [DepositoController::class, 'create'])->name('createDeposito');
    Route::post('/depositos', [DepositoController::class, 'store'])->name('storeDeposito');

    //Saques    
    Route::get('/saques/create', [SaqueController::class, 'create'])->name('createSaque');
    Route::post('/saques', [SaqueController::class, 'store'])->name('storeSaque');
});
