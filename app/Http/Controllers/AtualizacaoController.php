<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AtualizacaoController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $usuario = Auth::user();
            return view('atualizacao', ['usuario' => $usuario]);
        } else {
            return redirect()->route('login');
        }
    }
}
