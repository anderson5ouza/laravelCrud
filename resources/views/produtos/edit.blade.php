@extends('layouts.app')
  
@section('title', 'Editar Produto')
  
@section('contents')
    <hr />
    <form action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="codigoInput" class="form-label">Código</label>
                    <input type="text" class="form-control" value="{{ $produto->codigo ?? old('codigo') }}" name="codigo" id="codigoInput" placeholder="Informe o código">
                    @if($errors->has('codigo')) <div class="text-danger fs-6">{{ $errors->first('codigo') }}</div> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="produtoInput" class="form-label">Produto</label>
                    <input type="text" class="form-control" value="{{ $produto->produto ?? old('produto') }}" name="produto" id="produtoInput" placeholder="Informe a produto">
                    @if($errors->has('produto')) <div class="text-danger fs-6">{{ $errors->first('produto') }}</div> @endif
                </div>
            </div>
            <div class="col-lg-6">
                <label for="categoriaSelect" class="form-label">Categoria</label>
                <select class="form-select" id="categoriaSelect" name="categoria_id">
                    <option value="">Selecione uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ ($produto->categoria_id ?? old('categoria_id')) == $categoria->id ? 'selected' : '' }}>{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
                @if($errors->has('categoria_id')) <div class="text-danger fs-6">{{ $errors->first('categoria_id') }}</div> @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="descricaoInput" class="form-label">Descrição</label>
                     <textarea class="form-control" name="descricao" placeholder="Descreva o produto brevemente..." id="descricaoInput" style="height: 100px">{{ $produto->descricao ?? old('descricao') }}</textarea>
                    @if($errors->has('descricao')) <div class="text-danger fs-6">{{ $errors->first('descricao') }}</div> @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="precoInput" class="form-label">Preço</label>
                    <input type="text" class="form-control money" maxlength="8" value="{{ $produto->preco ?? old('preco') }}" name="preco" id="precoInput" placeholder="Informe o preço">
                    @if($errors->has('preco')) <div class="text-danger fs-6">{{ $errors->first('preco') }}</div> @endif
                </div>
            </div>
             <div class="col-lg-4">
                <div class="mb-3">
                    <label for="quantidadeInput" class="form-label">Quantidade</label>
                    <input type="text" class="form-control qtde" maxlength="4" value="{{ $produto->quantidade ?? old('quantidade') }}" name="quantidade" id="quantidadeInput" placeholder="Informe a quantidade">
                    @if($errors->has('quantidade')) <div class="text-danger fs-6">{{ $errors->first('quantidade') }}</div> @endif
                </div>
            </div>
            <div class="col-lg-4">
                <label for="disponivelSelect" class="form-label">Disponível</label>
                <select class="form-select" id="disponivelSelect" name="disponivel">
                    <option value="1" {{ ($produto->disponivel ?? old('disponivel')) == 1 ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ ($produto->disponivel ??  old('disponivel')) == 0 ? 'selected' : '' }}>Não</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="imagemSelect" class="form-label">Foto do Produto</label>
                <input type="file" class="form-control" id="imagemSelect" name="imagem" accept="image/png, image/gif, image/jpeg">
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-md-2 d-flex justify-content-start">
                @if($produto->imagem) <img src="{{ Storage::url($produto->imagem) }}" class="img-fluid rounded border-dark-subtle border border-success p-2"> @else <img src="https://via.placeholder.com/300x300?text=Sem+Foto" class="img-fluid rounded border-dark-subtle border border-success p-2"> @endif
            </div>
        </div>


        <div class="row mt-2 mb-4 {{ $produto->imagem ? '' : 'd-none' }}">
            <div class="col">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="remover_imagem" role="switch" id="flexSwitchRemoverImagem">
                    <label class="form-check-label" for="flexSwitchRemoverImagem">Remover imagem</label>
                </div>
            </div>
        </div>

        <input type="hidden" name="imagem_atual" value="{{ $produto->imagem }}" />

        <div class="row mt-3">
            <div class="col">
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ route('produtos') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Voltar</a>
                    <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</button>
                </div>
            </div>
        </div>

    </form>
@endsection