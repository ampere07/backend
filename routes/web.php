<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// In routes/web.php



// In routes/web.php



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/admin', function () {
        return Inertia::render('Admin'); // Your custom Admin view
    })->name('admin');

    Route::get('/home', function () {
        return Inertia::render('Home'); // Your custom Home view
    })->name('home');

    Route::get('/officers', function () {
        return Inertia::render('Officers'); // Your custom Officers view
    })->name('officers');

    Route::get('/faculty', function () {
        return Inertia::render('Faculty'); // Your custom Faculty view
    })->name('faculty');
});

require __DIR__.'/auth.php';









