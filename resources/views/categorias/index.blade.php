@extends('layouts.app')
  
@section('title', 'Listagem de Categorias')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-end">
        <a href="{{ route('categorias.create') }}" class="btn btn-success mx-1"><i class="bi bi-plus-circle"></i> Criar Categoria</a>
        <a href="{{ route('categorias.pdf') }}" target="_blank" class="btn btn-primary mx-1"><i class="bi bi-filetype-pdf"></i> Gerar Relatório</a>
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
                <th>Categoria</th>
                <th>Descrição</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
          <tbody class="table-group-divider">
            @if($categorias->count() > 0)
                @foreach($categorias as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td>{{ $item->descricao }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('categorias.show', $item->id) }}" type="button" class="btn btn-sm btn-info text-light m-1"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('categorias.edit', $item->id)}}" type="button" class="btn btn-sm btn-primary m-1"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('categorias.destroy', $item->id) }}" method="POST" type="button" class="p-0 m-0" onsubmit="return confirm('Ao excluir a categoria seus produtos serão removidos.\nDeseja continuar?')">
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
                    <td class="text-center" colspan="4">Não há registro de categorias!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <nav aria-label="navigation" class="mt-2 {{ $categorias->count() > 0 ? '' : 'd-none' }}">
        <ul class="pagination justify-content-center">
            <li class="paginate_button page-item previous {{ $categorias->currentPage() == 1 ? 'disabled' : '' }}" id="fixed-header_previous"><a class="page-link" href="{{ $categorias->previousPageUrl() }}">Anterior</a></li>

                @for($i = 1; $i <= $categorias->lastPage(); $i++)
                    <li class="paginate_button page-item {{ $categorias->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $categorias->url($i) }}">{{ $i }}</a></li>
                @endfor

            <li class="paginate_button page-item next {{ $categorias->lastPage() == $categorias->currentPage() ? 'disabled' : '' }}" id="fixed-header_next"><a class="page-link" href="{{ $categorias->nextPageUrl() }}">Próxima</a></li>
        
        </ul>
    </nav>

@endsection