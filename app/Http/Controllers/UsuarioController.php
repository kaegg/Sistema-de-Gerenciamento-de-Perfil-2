<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Session;
use Validator;

use Illuminate\Http\Request;
use App\Pessoa;
use Resources\Views;

class UsuarioController extends Controller
{
    public function index(){
        echo"entrou index usuarioController";
        return view("login.index", compact("login"));
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'confirmed'
        ],[
            'email.required' => "O campo Email deve ser informado.",
            'password.required' => "O campo Senha deve ser informado.",
            'password.min' => "O campo Senha deve conter ao menos 6 caracteres.",
            'password_confirmation.confirmed' => "O campo Confirmar Senha deve ser igual ao campo Senha.",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Usuario::create([
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('comentarios')->with('success', 'Conta criada com sucesso. Você já pode fazer login.');
    }
}