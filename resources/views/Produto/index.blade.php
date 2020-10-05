@extends('Produto.layouts.site')
@section('titulo','Produtos')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h2>Lista das bebidas</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('adicionar') }}" class="btn btn-success">Incluir</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="scope">Id</th>
                            <th class="scope">Nome do Produto</th>
                            <th class="scope">Descrição</th>
                            <th class="scope">Imagem</th>
                            <th class="scope">Valor</th>
                            <th class="scope">Mostrar</th>
                            <th class="scope">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>
                                <img width="60" src="{{ asset($produto->imagem) }}">
                            </td>
                            <td>{{ $produto->valor }}</td>
                            <td>{{ $produto->Mostrar }}</td>
                            <td>
                                <a href="{{route('editar', $produto->id)}}" class="btn btn-primary">Editar</a>

                                <form action="{{ route('deletar', $produto->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>    
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection