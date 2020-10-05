<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $classe;

    public function listar(Request $requisicao)
    {
        $dados = $this->classe::all();
        foreach($dados as $dado)
        {
            $dado['imagem']= url($dado['imagem']);
        }

        return $this->classe::paginate($requisicao->per_page);
    }

    public function salvar (Request $requisicao)
    {
        $dados = $requisicao->all();

        return response()->json($this->classe::create($dados),201);
    }

    public function buscar(Request $requisicao, $id)
    {
        $dados = $this->classe::find($id);
        if(is_null($dados))
        {
            return response()->json('Item não encontrado',404);
        }

        $dados['imagem'] = url($dados['imagem']);

        return response()->json($dados,200);
    }


    public function atualizar(Request $requisicao, $id)
    {
        $dados = $requisicao->all();

        $item = $this->classe::find($id);

        if(is_null($item))
        {
            return response()->json(['erro'=>'Item não encontrado',404]);
        }

        return response()->json($item->update($dados),200);
    }


    public function deletar($id)
    {
        $item = $this->classe::find($id);

        if(is_null($item))
        {
            return response()->json(['erro','Item não encontrado']);
        }

        $item->delete();

        return response()->json('Item removido',200);
    }

}
