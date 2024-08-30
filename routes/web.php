<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers;

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

Route::get('usuario', [UsuarioController::class, 'index']);

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/comentarios', function () {
//     return view('comentarios');
// });

// Route::get('/atualizacao', function () {
//     return view('atualizacao');
// });
