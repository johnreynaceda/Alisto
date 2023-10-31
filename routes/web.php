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
    if (auth()->check()) {
        if (auth()->user()->user_type == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->user_type == 'service provider') {
            return redirect()->route('provider.dashboard');
        } else {
            return redirect()->route('client.dashboard');
        }

    } else {
        return view('welcome');
    }
});
Route::get('/sign-in', function () {
    return view('pages.signin');
})->name('signin');

Route::get('/location', function () {
    return view('pages.location');
})->name('location');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/became-a-service-provider', function () {
    return view('pages.service-provider');
})->name('service-provider');

Route::get('/dashboard', function () {
    if (auth()->user()->user_type === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->user_type === 'service provider') {
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
    Route::get('/services-category-add', function () {
        return view('admin.category.add');
    })->name('admin.category.add');
    Route::get('/service-providers', function () {
        return view('admin.service-providers');
    })->name('admin.service-providers');
    Route::get('/clients', function () {
        return view('admin.clients');
    })->name('admin.clients');
    Route::get('/accounts', function () {
        return view('admin.accounts');
    })->name('admin.accounts');


});

//CLIENT
Route::prefix('client')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.index');
    })->name('client.dashboard');
    Route::get('/services/{id}', function () {
        return view('client.services');
    })->name('client.services');
    Route::get('/services/provider/{id}', function () {
        return view('client.services-provider');
    })->name('client.services-provider');
    Route::get('/appointments', function () {
        return view('client.appointments');
    })->name('client.appointments');
    Route::get('/location/{id}', function () {
        return view('client.locations');
    })->name('client.locations');
    Route::get('/location/{id}/{servicesid}', function () {
        return view('client.location-services');
    })->name('client.location-services');
    Route::get('/location', function () {
        return view('client.location');
    })->name('client.location');
    Route::get('/services-all', function () {
        return view('client.services-all');
    })->name('client.services-all');

});


//SERVICE PROVIDER
Route::prefix('service-provider')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('provider.index');
    })->name('provider.dashboard');
    Route::get('/services', function () {
        return view('provider.services');
    })->name('provider.services');
    Route::get('/appointments', function () {
        return view('provider.appointments');
    })->name('provider.appointments');
    Route::get('/clients', function () {
        return view('provider.clients');
    })->name('provider.clients');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
