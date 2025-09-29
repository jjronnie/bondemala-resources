<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Employee Welcome/Download Page (No Login Required)
Route::get('/', function () {
    $documents = App\Models\Document::where('is_published', true)
                                   ->latest()
                                   ->get();
    return view('welcome', compact('documents'));
});

// Public Download Link (No Login Required)
Route::get('download/document/{document}', [DocumentController::class, 'download'])
    ->name('document.download');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Documents CRUD (Protected by 'auth' middleware)
Route::resource('documents', DocumentController::class)
    ->middleware(['auth', 'verified']);

// Existing Breeze dashboard route
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
