@extends('Produto.layouts.site')

@section('titulo','Editar Produto')
@section('conteudo')
    <div class="container">
        <h3>Editar produtos</h3>
        <div class="row"> 
            <form action="{{ route('atualizar', $produto->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <input type="hidden" name="_method" value="put">
                @include('Produto.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>       
        </div>
    </div>
@endsection()