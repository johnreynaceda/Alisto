<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sign-in', function () {
    return view('pages.signin');
})->name('signin');
Route::get('/became-a-service-provider', function () {
    return view('pages.service-provider');
})->name('service-provider');

Route::get('/dashboard', function () {
    if (auth()->user()->user_type === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->user_type === 'service_provider') {
        return redirect()->route('provider.dashboard');
    } else {
        return redirect()->route('client.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


//ADMINISTRATOR
Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/location', function () {
        return view('admin.location');
    })->name('admin.location');
    Route::get('/services-category', function () {
        return view('admin.category');
    })->name('admin.category');
});

//CLIENT
Route::prefix('client')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.index');
    })->name('client.dashboard');

});


//SERVICE PROVIDER
Route::prefix('service-provider')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('provider.index');
    })->name('provider.dashboard');
    Route::get('/services', function () {
        return view('provider.services');
    })->name('provider.services');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';