@extends('layouts.app')
  
@section('title', 'Listagem de Produtos')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-end">
        <a href="{{ route('produtos.create') }}" class="btn btn-success mx-1"><i class="bi bi-plus-circle"></i> Criar Produto</a>
        <a href="{{ route('produtos.pdf') }}" target="_blank" class="btn btn-primary mx-1"><i class="bi bi-filetype-pdf"></i> Gerar Relatório</a>
    </div>
    <hr />
    @if(Session::has('sucesso'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('sucesso') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Código</th>
                <th class="text-center">Imagem</th>
                <th>Produto</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Preço</th>
                <th class="text-center">Disponível</th>
                <th class="text-center">Qtde</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if($produtos->count() > 0)
                @foreach($produtos as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->codigo }}</td>
                        <td class="text-center">
                            @if($item->imagem) <img src="{{ Storage::url($item->imagem) }}" class="img-thumbnail"> @else <img src="https://via.placeholder.com/100x100?text=Sem+Foto" class="img-thumbnail"> @endif
                        </td> 
                        <td>{{ $item->produto }}</td>
                        <td class="text-center">{{ $item->categoria->categoria }}</td>
                        <td class="text-center">{{ $item->preco }}</td>
                        <td class="text-center">{{ $item->disponivel ? 'Sim' : 'Não' }}</td>
                        <td class="text-center">{{ $item->quantidade }}</td>
                         
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('produtos.show', $item->id) }}" type="button" class="btn btn-sm btn-info text-light m-1"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('produtos.edit', $item->id)}}" type="button" class="btn btn-sm btn-primary m-1"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('produtos.destroy', $item->id) }}" method="POST" type="button" class="p-0 m-0" onsubmit="return confirm('Você deseja realmente excluir este registro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger m-1"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="9">Não há registro de produtos!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <nav aria-label="navigation" class="mt-2 {{ $produtos->count() > 0 ? '' : 'd-none' }}">
        <ul class="pagination justify-content-center">
            <li class="paginate_button page-item previous {{ $produtos->currentPage() == 1 ? 'disabled' : '' }}" id="fixed-header_previous"><a class="page-link" href="{{ $produtos->previousPageUrl() }}">Anterior</a></li>

                @for($i = 1; $i <= $produtos->lastPage(); $i++)
                    <li class="paginate_button page-item {{ $produtos->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $produtos->url($i) }}">{{ $i }}</a></li>
                @endfor

            <li class="paginate_button page-item next {{ $produtos->lastPage() == $produtos->currentPage() ? 'disabled' : '' }}" id="fixed-header_next"><a class="page-link" href="{{ $produtos->nextPageUrl() }}">Próxima</a></li>
        
        </ul>
    </nav>


@endsection