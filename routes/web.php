<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Models\Document;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Employee Welcome/Download Page (No Login Required)
Route::get('/', function () {
    $documents = Document::where('is_published', true)
                        ->latest()
                        ->get();
    return view('welcome', compact('documents'));
});

// Public Download Link (No Login Required)
Route::get('download/document/{document}', [DocumentController::class, 'download'])
    ->name('document.download');

/*
|--------------------------------------------------------------------------
| Authenticated & Verified Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DocumentController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Documents CRUD
    Route::resource('documents', DocumentController::class);
});

require __DIR__.'/auth.php';
