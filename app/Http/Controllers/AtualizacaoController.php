<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AtualizacaoController extends Controller
{
    public function index(){
        $usuario = Auth::user();

        return view('atualizacao', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id){
        dd($request, $id);
    }
}
