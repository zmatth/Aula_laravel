@extends('Produto.layouts.site')

@section('titulo','Home')


@section('conteudo')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="d-flex flex-row justify-content-center">Lista de Produtos</h3>
            </div>
        </div>
        <div class="row">
            @foreach($produtos as $produto)
                <div class="card col-3" style="width: 18rem; margin-left: 50px;">
                    <img src="{{asset($produto->imagem)}}"class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$produto->nome}}</h5>
                        <p class="card-text">{{$produto->descricao}}</p>
                        <a href="#" class="btn btn-success">Comprar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row d-flex flex-row justify-content-center">
        {{$produtos->links()}}
    </div>

@endsection
