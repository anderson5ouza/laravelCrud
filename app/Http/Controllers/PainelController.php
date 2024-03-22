<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;

class PainelController extends Controller
{
    public function index(){

        $categorias = Categoria::count();
        $produtos = Produto::count();
        $usuarios = User::count();

        return view('painel', compact('categorias','produtos','usuarios'));

    }
}
