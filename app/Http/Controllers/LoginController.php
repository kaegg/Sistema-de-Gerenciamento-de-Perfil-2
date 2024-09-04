<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(Request $request) {
        $request->validate([
            'emailLogin' => 'required|email',
            'senhaLogin' => 'required',
        ],[
            'emailLogin.required' => "O campo Email deve ser informado.",
            'emailLogin.email' => "O campo Email deve seguir o padrão example@example.com.",
            'senhaLogin.required' => "O campo Senha deve ser informado."
        ]);
    
        $credentials = [
            'email' => $request->input('emailLogin'),
            'password' => $request->input('senhaLogin'),
        ];
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('comentarios');
        }
    
        return back()->withErrors([
            'emailLogin' => 'As credenciais fornecidas estão incorretas.',
        ])->withInput();
    }
    
}
