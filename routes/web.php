<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;

Route::get('/rota', function () {
    return 'Hello, this is the rota page!';
});

Route::get('/injection', function (Request $request) {
    var_dump($request->all());
});

Route::match(['get', 'post'], '/match', function (Request $request) {
    return 'This route responds to both GET and POST requests.';
});

Route::any('/any', function (Request $request) {
    return 'This route responds to all HTTP methods.';
});

Route::get('/index', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);

Route::redirect('/saltar', '/index');
Route::permanentRedirect('/saltar-permanente', '/index');

Route::view('/view', 'home');
Route::view('/view2', 'home', ['myName' => 'Filipe Vieira']);

/** ROUTE PARAMETERS **/
Route::get('/valor/{value}', [MainController::class, 'mostrarValor']);
Route::get('/valores/{value1}/{value2}', [MainController::class, 'mostrarValores']);
Route::get('/valores2/{value1}/{value2}', [MainController::class, 'mostrarValores2']);

Route::get('/opcional/{value?}', [MainController::class, 'mostrarValorOpcional']);
Route::get('/opcional1/{value1}/{value2?}', [MainController::class, 'mostrarValorOpcional2']);

// Route::get('/user/{user_id}/post/{post_id}', [MainController::class, 'showPosts']);

/** ROUTE PARAMETERS WITH CONSTRAINTS **/
Route::get('/exp1/{value}', function ($value) {
    return "O valor é: " . $value;
})->where('value', '[0-9]+');

Route::get('/exp2/{value}', function ($value) {
    return "O valor é: " . $value;
})->where('value', '[A-Za-z0-9]+');

Route::get('/exp3/{value1}/{value2}', function ($value1, $value2) {
    return "Os valores são: " . $value1 . " e " . $value2;
})->where([
    'value1' => '[0-9]+',
    'value2' => '[A-Za-z0-9]+'
]);

Route::get('/user/{user_id}/post/{post_id}', [MainController::class, 'showPosts'])->where([
    'user_id' => '[0-9]+',
    'post_id' => '[0-9]+'
]);
// Alternatively, you can use whereNumber
// Route::get('/user/{user_id}/post/{post_id}', [MainController::class, 'showPosts'])->whereNumber('user_id', 'post_id');

/** ROUTE NAMES **/
Route::get('/rota_abc', function () {
    return "Esta é a rota ABC";
})->name('rota_nomeada');

Route::get('/rota_referenciada', function () {
    return redirect()->route('rota_nomeada');
});

Route::prefix('admin')->group(function () {
    Route::get('/home', [MainController::class, 'index']);
    Route::get('/about', [MainController::class, 'about']);
    Route::get('/management', [MainController::class, 'mostrarValor']);
});
/*
 /admin/home
 /admin/about
 /admin/management
 */

 Route::get('/admin/only', function() {
    echo 'Apenas administradores';
 })->middleware([OnlyAdmin::class]);

Route::middleware([OnlyAdmin::class])->group(function () {
    Route::get('/admin/only2', function() {
        echo 'Apenas administradores 1.';
    });
    Route::get('/admin/only3', function() {
        echo 'Apenas administradores 2.';
    });
});

/** CONTROLLERS **/
Route::controller(UserController::class)->group(function () {
    Route::get('/user/new', 'new');
    Route::get('/user/edit', 'edit');
    Route::get('/user/delete', 'delete');
});

Route::fallback(function() {
    return 'A rota acessada não existe. <a href="/index">Clique aqui</a> para ir para a página inicial.';
});
