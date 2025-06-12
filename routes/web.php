<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;


// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Route::get('/introduction', [FrontendController::class, 'introduction'])->name('introduction');
Route::get('/work-area', [FrontendController::class, 'workArea'])->name('work-area');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

