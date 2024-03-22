@extends('layouts.app')
  
@section('title', 'Detalhes do Produto ' . $produto->produto)
  
@section('contents')
    <hr />

    
    <div class="row">
        <div class="col-md-6 col-sm-12 offset-md-3 d-flex justify-content-center">
            @if($produto->imagem) <img src="{{ Storage::url($produto->imagem) }}" class="img-fluid rounded border-dark-subtle border border-success p-2"> @else <img src="https://via.placeholder.com/300x300?text=Sem+Foto" class="img-fluid rounded border-dark-subtle border border-success p-2"> @endif
        </div>
    </div>


    <div class="row">
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="codigoInput" class="form-label">Código</label>
                    <input type="text" class="form-control" value="{{ $produto->codigo }}" name="codigo" id="codigoInput" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="produtoInput" class="form-label">Produto</label>
                    <input type="text" class="form-control" value="{{ $produto->produto }}" name="produto" id="produtoInput" readonly>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="categoriaInput" class="form-label">Categoria</label>
                <input type="text" class="form-control" value="{{ $produto->categoria->categoria }}" name="categoria_id" id="categoriaInput" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="descricaoInput" class="form-label">Descrição</label>
                     <textarea class="form-control" name="descricao" id="descricaoInput" readonly style="height: 100px">{{ $produto->descricao }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="precoInput" class="form-label">Preço</label>
                    <input type="text" class="form-control" value="{{ $produto->preco }}" name="preco" id="precoInput" readonly>
                </div>
            </div>
             <div class="col-lg-4">
                <div class="mb-3">
                    <label for="quantidadeInput" class="form-label">Quantidade</label>
                    <input type="text" class="form-control" value="{{ $produto->quantidade }}" name="quantidade" id="quantidadeInput" readonly>
                </div>
            </div>
            <div class="col-lg-4">
                <label for="disponivelInput" class="form-label">Disponível</label>
                <input type="text" class="form-control" value="{{ $produto->disponivel ? 'Sim' : 'Não' }}" name="disponivel" id="disponivelInput" readonly>
                
            </div>
        </div>

        <div class="row pb-5 mb-5">
            <div class="col mb-3 d-flex justify-content-center">
                <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Voltar</a>
            </div>
        </div>

@endsection