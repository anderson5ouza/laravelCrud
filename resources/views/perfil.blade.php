@extends('layouts.app')
  
@section('title', 'Perfil')
  
@section('contents')
    <hr />

    @if(Session::has('sucesso'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('sucesso') }}
        </div>
    @endif

    <form action="{{ route('user.update', auth()->user()->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Meus Dados</h4>
                </div>
                <div class="row" id="res"></div>
                <div class="row mt-2">
  
                    <div class="col-md-6">
                        <label class="labels">Nome</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" placeholder="Informe o seu nome">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">E-mail</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Informe o seu e-mail">
                    </div>
                </div>
                <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Salvar</button></div>
            </div>
        </div>
         
    </div>   
            
        </form>
@endsection