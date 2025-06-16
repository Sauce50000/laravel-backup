<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeCategoryController;
use App\Http\Controllers\NoticeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');

    // more admin routes here
    Route::resource('notice-categories', NoticeCategoryController::class);
    Route::resource('notices', NoticeController::class);
    
    // Restore route (using PUT or PATCH method)
    Route::put('notice-categories/{category}/restore', [NoticeCategoryController::class, 'restore'])
        ->name('notice-categories.restore');

    // Route::put('/notices/{notice}', [NoticeController::class, 'update'])->name('notices.update');
Route::delete('notices/{notice}/force-delete', [NoticeController::class, 'forceDelete'])->name('notices.forceDelete');
Route::patch('notices/{id}/restore', [NoticeController::class, 'restore'])->name('notices.restore');

});
