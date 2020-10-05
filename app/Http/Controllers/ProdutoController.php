<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // public function index()
    // {
    //     $produtos = [
    //         (object)['produto' => 'Vinho','ml'=>'600ml'],
    //         (object)['produto' => 'Wisky','ml'=>'500ml'],
    //         (object)['produto' => 'Champagne','ml'=>'700ml']
    //     ];

        
    //     $produto1 = new Produto();
    //     dd($produto1->listar());
    //     return view('Produto.index', compact('produtos'));
    // }

    // public function criar(Request $requisicao)
    // {
    //     dd($requisicao->all());
    //     return 'Criado';
    // }

    // public function editar()
    // {
    //     return 'Editado';
    // }

    public function produto(Request $requisicao)
    {
        $produtos = Produto::all();
        $mensagem = $requisicao->session()->get('mensagem');
        return view('/Produto.index', compact('produtos','mensagem'));
    }

    public function adicionar()
    {
        return view('/Produto.adicionar');
    }

    public function salvar(Request $requisicao)
    {

        $produto = $requisicao->all();   
        
        if (isset($produto['Mostrar']))
        {
            $produto['Mostrar'] = 'sim';
        }


        if ($requisicao->hasFile('imagem'))
        {
            $produto['imagem'] = $this->tratarImagem($requisicao, $produto);
        }

        Produto::create($produto);

        $requisicao->session()->flash('mensagem','Produto adicionado com sucesso');

        return redirect()->route('produtos');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        return view('Produto.editar',compact('produto'));
    }

    public function atualizar(Request $requisicao, $id)
    {
        $produto = $requisicao->all();


        if (isset($produto['Mostrar']))
        {
            $produto['Mostrar'] = 'sim';
        } else
        {
            $produto['Mostrar'] = 'nao';
        }

        if ($requisicao->hasFile('imagem'))
        {
            $produto['imagem'] = $this->tratarImagem($requisicao, $produto);
        }


        $produtoSelecionado = Produto::find($id);
        $produtoSelecionado ->update($produto);

        $requisicao->session()->flash('mensagem','Produto atualizado');

        return redirect()->route('produtos');

    }

    public function deletar(Request $requisicao, $id)
    {
        $produto = Produto::find($id);

        $produto->delete();

        $requisicao->session()->flash('mensagem','Produto deletado');
        
        return redirect()->route('produtos');
    }

    public function tratarImagem(Request $requisicao, $produto)
    {
        $imagem = $requisicao->file('imagem');
        $num = rand(1000,9999);
        $dir = 'image/produtos/';
        $extensao = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $extensao;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }

}
