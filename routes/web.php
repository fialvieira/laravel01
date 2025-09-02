<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/init', [MainController::class, 'initMethod'])->name('init');
Route::get('/view', [MainController::class, 'viewPage'])->name('view');
