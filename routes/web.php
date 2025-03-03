<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FeeController;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('posts', PostController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('clients', ClientController::class);
Route::resource('tasks', TaskController::class);
Route::resource('fees', FeeController::class);
Route::get('fees/{id}/print', [FeeController::class, 'print'])->name('fees.print');
Route::get('fees/{id}/download', [FeeController::class, 'download'])->name('fees.download');