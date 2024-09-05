<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UsuarioController;
Use App\Http\Controllers\ComentarioController;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\AtualizacaoController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function () {
    Route::get('/comentarios', [ComentarioController::class, 'index'])->name('comentarios');
});

Route::post('/comentario', [ComentarioController::class, 'store'])->name('comentario.store');

Route::post('/comentario/{id}/like', [ComentarioController::class, 'like'])->name('like');

Route::post('/comentario/{id}/deslike', [ComentarioController::class, 'deslike'])->name('deslike');

Route::get('/atualizacao', [AtualizacaoController::class, 'index'])->name('index')->middleware('auth');

Route::put('/atualizacao/usuario/{id}', [UsuarioController::class, 'update'])->name('atualizarUsuario');

Route::delete('/atualizacao/usuario/{id}', [UsuarioController::class, 'destroy'])->name('excluirConta');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');