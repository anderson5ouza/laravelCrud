@extends('layouts.app')
  
@section('contents')
  <div class="row">
    <div class="col-md-6 offset-md-3">

      <div class="row g-3">
          <div class="col-sm-4 d-flex flex-column gap-2">
            <div class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 pb-2 rounded-3">
              <i class="bi bi-tags"></i>
            </div>
            <h4 class="fw-semibold mb-0 text-body-emphasis text-center">Categorias</h4>
            <h5  class="w-100 text-center"><span class="badge rounded-pil {{ $categorias == 0 ? 'text-bg-danger' : 'text-bg-success'}}">{{ $categorias }}</span></h5>
          </div>

          <div class="col-sm-4 d-flex flex-column gap-2">
            <div class="d-inline-flex align-items-center justify-content-center text-bg-info bg-gradient fs-2 pb-2 rounded-3">
              <i class="bi bi-cart-check"></i>
            </div>
            <h4 class="fw-semibold mb-0 text-body-emphasis text-center">Produtos</h4>
           <h5  class="w-100 text-center"><span class="badge rounded-pil {{ $produtos == 0 ? 'text-bg-danger' : 'text-bg-success'}}">{{ $produtos }}</span></h5>
          </div>

          <div class="col-sm-4 d-flex flex-column gap-2">
            <div class="d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 pb-2 rounded-3">
              <i class="bi bi-people-fill"></i>
            </div>
            <h4 class="fw-semibold mb-0 text-body-emphasis text-center">Usuários</h4>
            <h5  class="w-100 text-center"><span class="badge rounded-pil {{ $usuarios == 0 ? 'text-bg-danger' : 'text-bg-success'}}">{{ $usuarios }}</span></h5>
          </div>

        </div>
    
    </div>
  </div>
@endsection