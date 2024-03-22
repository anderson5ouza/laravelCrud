@extends('layouts.app')
  
@section('title', 'Adicionar Categoria')
  
@section('contents')
    <hr />
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                
                <div class="mb-3">
                    <label for="categoriaInput" class="form-label">Categoria</label>
                    <input type="text" class="form-control" value="{{ old('categoria') }}" name="categoria" id="categoriaInput" placeholder="Informe a categoria">
                    @if($errors->has('categoria')) <div class="text-danger fs-6">{{ $errors->first('categoria') }}</div> @endif
                </div>
                <div class="mb-3">
                    <label for="descricaoInput" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricaoInput" name="descricao" value="{{ old('descricao') }}" placeholder="Informe a descrição">
                    @if($errors->has('descricao')) <div class="text-danger fs-6">{{ $errors->first('descricao') }}</div> @endif
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Voltar</a>
                    <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i> Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
@endsection

                            