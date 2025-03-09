<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FeeController;
use App\Models\User;
use App\Http\Controllers\Auth\SocialiteController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show'); // Cambiado a /profile/show
});

Route::get('/check-operario', function () {
    $user = User::where('email', 'operario1@gmail.com')->first();
    if ($user->hasRole('operario') && $user->can('tasks')) {
        return "El usuario tiene el rol y permiso correctos.";
    } else {
        return "El usuario no tiene el rol o permiso correctos.";
    }
});

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Route::get('/google-login', function () {
    return view('google-login');
})->name('google.login');

require __DIR__ . '/auth.php';

Route::resource('posts', PostController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('clients', ClientController::class);
Route::resource('tasks', TaskController::class)->except(['destroy']);
Route::resource('fees', FeeController::class);
Route::get('fees/{id}/print', [FeeController::class, 'print'])->name('fees.print');
Route::get('fees/{id}/download', [FeeController::class, 'download'])->name('fees.download');
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('fees/monthly-charge', [FeeController::class, 'monthlyCharge'])->name('fees.monthlyCharge');
