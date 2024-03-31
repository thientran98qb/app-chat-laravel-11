<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::prefix('projects')->as('project.')->middleware('auth')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::get('/show', [ProjectController::class, 'show'])->name('show');
});
