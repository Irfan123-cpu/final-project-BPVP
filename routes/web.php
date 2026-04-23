<?php

use App\Http\Controllers\ProfileController;
use App\Models\Zone;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $zones = Zone::all();
    return view('landing.pages.index', compact('zones'));
});

Route::get('/detail', function () {
    return view('landing.pages.detail');
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin.pages.index');
    })->name('index');
    Route::resource('zones', ZoneController::class);
    Route::controller(AttractionController::class)->prefix('attraction')->name('attraction.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });


    Route::controller(ReviewController::class)->prefix('reviews')->name('review.')->group(function () {
        Route::get('/', 'index')->name('index'); 
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/attraction/{id}/review', [ReviewController::class, 'store'])->name('review.store');
});

require __DIR__ . '/auth.php';