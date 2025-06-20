<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeCategoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RecordTypeController;
use App\Http\Controllers\RecordCategoryController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DepartmentController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');

    // more admin routes here
    Route::resource('notice-categories', NoticeCategoryController::class);
    Route::resource('notices', NoticeController::class);
    Route::resource('record-categories', RecordCategoryController::class);
    Route::resource('records', RecordController::class);
    Route::resource('record-types', RecordTypeController::class);
    Route::resource('photos-galleries', PhotoGalleryController::class);
    Route::resource('departments', DepartmentController::class);

    // Restore route (using PUT or PATCH method)
    Route::put('notice-categories/{category}/restore', [NoticeCategoryController::class, 'restore'])
        ->name('notice-categories.restore');

    // Route::put('/notices/{notice}', [NoticeController::class, 'update'])->name('notices.update');
    Route::delete('notices/{notice}/force-delete', [NoticeController::class, 'forceDelete'])->name('notices.forceDelete');
    Route::patch('notices/{id}/restore', [NoticeController::class, 'restore'])->name('notices.restore');




    Route::put('record-types/{type}/restore', [RecordTypeController::class, 'restore'])
        ->name('record-types.restore');
    Route::put('record-categories/{category}/restore', [RecordCategoryController::class, 'restore'])
        ->name('record-categories.restore');

    Route::delete('records/{record}/force-delete', [RecordController::class, 'forceDelete'])->name('records.forceDelete');
    Route::patch('records/{id}/restore', [RecordController::class, 'restore'])->name('records.restore');
    //Route::patch('records/{record}/restore', [RecordController::class, 'restore'])->name('records.restore');

    
    // Route::delete('/photos-galleries/{photos_gallery}/photos/{photo}', [PhotoGalleryController::class, 'destroy'])
    // ->name('photos-galleries.photos.destroy');

    // Nested route for photos under a specific gallery
    Route::prefix('photos-galleries/{photoGallery}')->group(function () {
        Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos-galleries.photos.destroy');
    });
    //
    
});
