<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Auth;
use Validator;

class ComentarioController extends Controller
{
    
    public function index(){
        // $comentarios = Comentario::with('usuario')->get();

        return view('comentarios');
        // if (Auth::check()) {
        // } else {
        //     return redirect()->route('login');
        // }
    }

    public function store(Request $request){
        dd("teste");

        $validator = Validator::make($request->all(), [
            'comentario' => 'required',
        ], [
            'comentario.required' => 'Por favor, insira um comentário.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $userId = Auth::id();

        dd($userId);

        Comentario::create([
            "comentario" => $request->comentario,
            "idUsuario" => $userId
        ]);

        // Redireciona de volta para a página de comentários com uma mensagem de sucesso
        return redirect()->route('comentarios.index')->with('success', 'Comentário adicionado com sucesso!');
    }

    public function teste(Request $request){
        dd("entrou");
    }
}
