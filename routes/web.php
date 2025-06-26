<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NoticeController;


// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [FrontendController::class, 'index'])->name('welcome');

//Route::get('/office-details/{id}', [FrontendController::class, 'showOfficeDetails'])->name('office-details');
Route::get('/office-details/{officeDetail}', [FrontendController::class, 'showOfficeDetails'])
    ->name('office-details.showOfficeDetails');
Route::get('/department/{slug}', [FrontendController::class, 'showdepartment'])->name('department.showdepartment');
Route::get('/notices/{slug}',[FrontendController::class, 'showpdfList'])->name('notice.showpdfList');
Route::get('/document/{id}/{slug}', [FrontendController::class, 'showpdfList2'])->name('document.showpdfList');

Route::get('/pdf-view/{category:slug}/{slug}', [FrontendController::class, 'showPdf'])->name('pdf.view');

Route::get('/photo-gallery',[FrontendController::class,'gallery'])->name('photo-gallery');
Route::get('/photo-gallery/{id}', [FrontendController::class, 'show'])->name('photo-gallery.show');

// Route::get('/pdf-view/{category:slug}/{slug}', [FrontendController::class, 'showPdf'])->name('pdf.view.record');

// Route::get('/pdf-view2/{}/{category:slug}/{slug}', [FrontendController::class, 'showPdf'])->name('pdf.view');
// Route::get('/introduction', [FrontendController::class, 'introduction'])->name('introduction');
// Route::get('/work-area', [FrontendController::class, 'workArea'])->name('work-area');


Route::get('/contact-us',[FrontendController::class,'contact'])->name('contact-us');
Route::get('/employee',[FrontendController::class,'employee'])->name('employee');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/notices/{slug}', [NoticeController::class, 'showByCategory'])->name('notices.category');