<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Session;
use Validator;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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

        return redirect()->route('comentarios');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'nullable|string|max:255',
            'rg' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:14',
            // 'cep' => 'nullable|string|max:9',
            'endereco' => 'nullable|string|max:255',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'uf' => 'nullable|string|max:2',
            'telefone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255', 
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->nome = $request->input('nome');
        $usuario->sobrenome = $request->input('sobrenome');
        $usuario->rg = $request->input('rg');
        $usuario->cpf = $request->input('cpf');
        // $usuario->cep = $request->input('cep');
        $usuario->endereco = $request->input('endereco');
        $usuario->numero = $request->input('numero');
        $usuario->bairro = $request->input('bairro');
        $usuario->complemento = $request->input('complemento');
        $usuario->uf = $request->input('uf');
        $usuario->telefone = $request->input('telefone');
        $usuario->email = $request->input('email');
        $usuario->foto = $request->input('foto');

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageContent = file_get_contents($image->getRealPath());
    
            $usuario->foto = base64_encode($imageContent);
        }

        $usuario->save();

        return redirect()->route('index')->with('success', 'Perfil atualizado com sucesso!');
    }
}