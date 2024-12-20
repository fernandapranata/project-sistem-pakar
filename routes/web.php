<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnosaController;

// Routes Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/gejala', [AdminController::class, 'gejalaIndex'])->name('admin.gejala');
    Route::post('/admin/gejala', [AdminController::class, 'gejalaStore'])->name('admin.gejala.store');
    Route::get('/admin/gejala/{id}/edit', [AdminController::class, 'gejalaEdit'])->name('admin.gejala.edit');
    Route::put('/admin/gejala/{id}', [AdminController::class, 'gejalaUpdate'])->name('admin.gejala.update');
    Route::delete('/admin/gejala/{id}', [AdminController::class, 'gejalaDestroy'])->name('admin.gejala.destroy');
    Route::get('/admin/kerusakan', [AdminController::class, 'kerusakanIndex'])->name('admin.kerusakan');
    Route::post('/admin/kerusakan', [AdminController::class, 'kerusakanStore'])->name('admin.kerusakan.store');
    Route::get('/admin/kerusakan/{id}/edit', [AdminController::class, 'kerusakanEdit'])->name('admin.kerusakan.edit');
    Route::put('/admin/kerusakan/{id}', [AdminController::class, 'kerusakanUpdate'])->name('admin.kerusakan.update');
    Route::delete('/admin/kerusakan/{id}', [AdminController::class, 'kerusakanDestroy'])->name('admin.kerusakan.destroy');
    Route::get('/admin/solusi', [AdminController::class, 'solusiIndex'])->name('admin.solusi');
    Route::post('/admin/solusi', [AdminController::class, 'solusiStore'])->name('admin.solusi.store');
    Route::get('/admin/solusi/{id}/edit', [AdminController::class, 'solusiEdit'])->name('admin.solusi.edit');
    Route::put('/admin/solusi/{id}', [AdminController::class , 'solusiUpdate'])->name('admin.solusi.update');
    Route::delete('/admin/solusi/{id}', [AdminController::class, 'solusiDestroy'])->name('admin.solusi.destroy');
});

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Diagnosa Routes
    Route::get('/diagnosa', [DiagnosaController::class, 'showDiagnosaForm'])->name('diagnosa.form');
    Route::get('/diagnosa/ciri-kerusakan', [DiagnosaController::class, 'showCiriKerusakan'])->name('ciri_kerusakan');
    Route::post('/diagnosa/process', [DiagnosaController::class, 'processDiagnosa'])->name('diagnosa.process');
});
