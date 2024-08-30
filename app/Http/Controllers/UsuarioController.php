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

        return view("login.index", compact("login"));
    }

    public function create(){

    }
}
