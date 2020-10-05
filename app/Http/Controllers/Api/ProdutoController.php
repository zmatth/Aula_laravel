<?php

namespace App\Http\Controllers\Api;


use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar()
    {
        $dados = Produto::all();
        foreach($dados as $dado)
        {
            $dado['imagem']= url($dado['imagem']);
        }

        return response()->json($dados,200);
    }
}
