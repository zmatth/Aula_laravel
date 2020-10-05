@extends('Produto.layouts.site')

@section('titulo','Adicionar Produto')
@section('conteudo')    
    <div class="container">
        <h3>Adicionar produto</h3>
        <div class="row">
            <form action="{{ route('salvar') }}" method="post"
            enctype="multipart/form-data">
                @csrf
                @include('Produto.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>       
        </div>
    </div>
@endsection()