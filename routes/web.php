<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UsuarioController;
Use App\Http\Controllers\ComentarioController;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\AtualizacaoController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('register ', [UsuarioController::class, 'register'])->name('register');

Route::get('/comentarios', [ComentarioController::class, 'index'])->name('comentarios');

Route::post('/comentario', [ComentarioController::class, 'store'])->name('comentario.store');

Route::get('/atualizacao', [AtualizacaoController::class, 'index'])->name('index');

Route::put('/atualizacao/user/{id}', [UserController::class, 'update']);
