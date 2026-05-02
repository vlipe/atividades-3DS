<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return view('welcome'); });

Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/cadastro', function () { return view('cadastro'); })->name('cadastro');

Route::get('/configuracoes', [AuthController::class, 'edit'])->name('profile.edit');
Route::post('/configuracoes', [AuthController::class, 'update'])->name('profile.update');

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::post('/cadastro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
});

Route::fallback(function () {
    return view('errors.404');
});
