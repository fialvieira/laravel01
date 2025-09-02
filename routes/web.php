<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
use Illuminate\Support\Facades\Route;

// Route::middleware([StartMiddleware::class, EndMiddleware::class])->group(function () {
//     Route::get('/', [MainController::class, 'index'])->name('index');
//     Route::get('/about', [MainController::class, 'about'])->name('about')->withoutMiddleware([EndMiddleware::class]);
//     Route::get('/contact', [MainController::class, 'contact'])->name('contact');
// });


// Route::get('/', [MainController::class, 'index'])->name('index')->middleware([StartMiddleware::class]);
// Route::get('/about', [MainController::class, 'about'])->name('about')->middleware([EndMiddleware::class]);
// Route::get('/contact', [MainController::class, 'contact'])->name('contact')->middleware([StartMiddleware::class, EndMiddleware::class]); // Executados na ordem do array

Route::middleware(['correr_antes', 'correr_depois'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
});

// Route::get('/', [MainController::class, 'index'])->name('index');
// Route::get('/about', [MainController::class, 'about'])->name('about');
// Route::get('/contact', [MainController::class, 'contact'])->name('contact');
