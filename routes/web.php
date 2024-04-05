<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('projects')->as('project.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::get('/show', [ProjectController::class, 'show'])->name('show');
    });
    Route::prefix('courts')->as('court.')->group(function () {
        Route::get('/', [CourtController::class, 'index'])->name('index');
    });

    Route::prefix('booking')->group(function () {
        Route::get('/', [BookingController::class, 'showBooking'])->name('showBooking');
        Route::post('/', [BookingController::class, 'booking'])->name('booking');
    });
});
