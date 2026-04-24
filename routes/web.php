<?php

use App\Http\Controllers\ProfileController;
use App\Models\Zone;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ZoneController;
use App\Models\Attraction;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->name('landing.')->group(function () {

    Route::get('/', function () {
        $zones = Zone::all();
        $attractions = App\Models\Attraction::all();
        return view('landing.pages.index', compact('zones', 'attractions'));
    })->name('index');
    Route::prefix('/attraction')->group(function () {
        Route::get('/{attraction}', [AttractionController::class, 'showAttractions'])->name('attractions');
        Route::post('/review', [ReviewController::class, 'store'])->name('attraction.review.store');
    });

    Route::prefix('/zone')->group(function () {
        Route::get('/{zone}', [ZoneController::class, 'showZones'])->name('zones');
        Route::post('/review', [ReviewController::class, 'store'])->name('zone.review.store');
    });
});


Route::get('/detail', function () {
    return view('landing.pages.detail');
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $zones = \App\Models\Zone::all();
        $attractions = \App\Models\Attraction::all();
        $publishedReviews = \App\Models\Review::where('is_published', true)->get();
        $unsublishedReviews = \App\Models\Review::where('is_published', false)->get();
        $counter = [
            'zones' => $zones->count(),
            'attraction' => $attractions->count(),
            'publishedReviews' => $publishedReviews->count(),
            'unpublishedReviews' => $unsublishedReviews->count(),
        ];
        return view('admin.pages.index', compact('counter'));
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
        Route::patch('/{review}/approve', [ReviewController::class, 'approve'])->name('approve');
        Route::patch('/{review}/disapporve', [ReviewController::class, 'disapprove'])->name('disapprove');
        Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('destroy');
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
