<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DashboardController; 


Route::get('/', function () {
    return redirect()->route('dashboard.index');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index'); 
Route::resource('dosen', DosenController::class);
Route::resource('mata_kuliah', MataKuliahController::class);
