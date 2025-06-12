<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');

    // more admin routes here
});