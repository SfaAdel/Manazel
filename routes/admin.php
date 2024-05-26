<?php

use App\Http\Controllers\Admin\TestmonialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::name('dashboard')->get('/dashboard', function () {
    return view('admin.index');
})->middleware('auth:admin');

Route::group([
    'prefix' => 'dashboard',
    'as' => 'admin.',
    'middleware' => ['auth:admin'] // Remove 'dashboard' if it's not a valid middleware
], function () {
    // Resource routes
    Route::resource('categories', CategoryController::class, ['except' => 'show']);
    Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::resource('services', ServiceController::class, ['except' => 'show']);
    Route::resource('sub_services', SubServiceController::class, ['except' => 'show']);
    Route::resource('providers', ProviderController::class, ['except' => 'show']);
    Route::resource('testimonials', TestmonialController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('blogs', BlogController::class);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
