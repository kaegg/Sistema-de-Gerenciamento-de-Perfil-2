<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario; // Assumindo que existe um modelo Comentario
use Validator;

class ComentarioController extends Controller
{
    // Função para listar todos os comentários
    public function index()
    {
        // Busca todos os comentários do banco de dados
        $comentarios = Comentario::all();

        // Passa os comentários para a view
        return view('comentarios.index', compact('comentarios'));
    }

    // Função para adicionar um novo comentário
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            'comentario' => 'required',
        ], [
            'comentario.required' => 'Por favor, insira um comentário.',
        ]);

        if ($validator->fails()) {
            // Retorna para a página anterior com os erros e os dados do formulário
            return back()->withErrors($validator)->withInput();
        }

        // Criação do comentário
        Comentario::create([
            'comentario' => $request->comentario,
        ]);

        // Redireciona de volta para a página de comentários com uma mensagem de sucesso
        return redirect()->route('comentarios.index')->with('success', 'Comentário adicionado com sucesso!');
    }
}
