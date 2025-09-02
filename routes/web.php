<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;

Route::get('/init', [MainController::class, 'initMethod'])->name('init');
Route::get('/view', [MainController::class, 'viewPage'])->name('view');

// Route para controller single action
Route::get('/single-action', SingleActionController::class)->name('single');

// Route para controller do tipo resource
// Route::resource('users', UserController::class);

Route::resources([
    'users' => UserController::class,
    'clients' => ClientsController::class,
    'products' => ProductsController::class
]);
