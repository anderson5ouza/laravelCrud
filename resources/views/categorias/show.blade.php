@extends('layouts.app')
  
@section('title', 'Detalhes da Categoria')
  
@section('contents')
    <hr />

    <div class="row">
        <div class="col">
            
            <div class="mb-3">
                <label for="categoriaInput" class="form-label">Categoria</label>
                <input type="text" class="form-control" value="{{ $categoria->categoria }}" readonly name="categoria" id="categoriaInput" placeholder="Informe a categoria">
            </div>
            <div class="mb-3">
                <label for="descricaoInput" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricaoInput" value="{{ $categoria->descricao }}" readonly placeholder="Informe a descrição">
            </div>
            <div class="d-flex justify-content-center pb-5 mb-5">
                <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Voltar</a>
            </div>
        </div>
    </div>
@endsection