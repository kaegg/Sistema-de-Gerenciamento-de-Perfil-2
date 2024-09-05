<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    
    public function index(){
        if (Auth::check()) {
            $comentarios = Comentario::buscaTodosComentarios();
            $usuario = Auth::user();
            return view('comentarios', ['comentarios' => $comentarios],  ['usuario' => $usuario]);
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'comentario' => 'required',
        ], [
            'comentario.required' => 'Por favor, insira um comentário.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $userId = Auth::id();

        Comentario::criarComentario([
            "comentario" => $request->comentario,
            "idUsuario" => $userId
        ]);

        return redirect()->route('comentarios')->with('success', 'Comentário criado com sucesso!');
    }

    public function like($id){
        $comentario = Comentario::findOrFail($id);
        $comentario->increment('like');
        return redirect()->route('comentarios');
    }

    public function deslike($id){
        $comentario = Comentario::findOrFail($id);
        $comentario->increment('deslike');
        return redirect()->route('comentarios');
    }
}
