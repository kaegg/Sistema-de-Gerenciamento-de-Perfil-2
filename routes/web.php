<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('usuario', [UsuarioController::class, 'index']);

Route::get('/', function () {
    return view('login');
});

Route::post('register', [UsuarioController::class, 'register'])->name('register');

// Route::get('/comentarios', function () {
//     return view('comentarios');
// });

// Route::get('/atualizacao', function () {
//     return view('atualizacao');
// });
