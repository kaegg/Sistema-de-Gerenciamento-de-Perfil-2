<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Session;
use Validator;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Resources\Views;

class UsuarioController extends Controller
{
    public function register(Request $request){
        $nome = explode("@", $request->email);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:usuario,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ], [
            'email.required' => "O campo Email deve ser informado.",
            'email.email' => "O campo Email deve seguir o padrão example@example.com.",
            'email.unique' => "O email informado já foi cadastrado.",
            'password.required' => "O campo Senha deve ser informado.",
            'password.min' => "O campo Senha deve conter ao menos 6 caracteres.",
            'password_confirmation.required' => "O campo Confirmar Senha deve ser informado.",
            'password_confirmation.min' => "O campo Confirmar Senha deve conter ao menos 6 caracteres.",
            'password_confirmation.same' => "O campo Confirmar Senha deve ser igual ao campo Senha.",
        ]);
        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('erroDeCadastro', true);
        }

        Usuario::criarUsuario([
            'email' => $request->email,
            'senha' => $request->password,
            'nome' => $nome[0]
        ]);

        return redirect()->route('comentarios')->with('success', 'Conta criada com sucesso. Você já pode fazer login.');
    }
}