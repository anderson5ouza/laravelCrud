<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid py-3">
    <a class="navbar-brand" href="#">CRUD LARAVEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('painel') ? 'active' : '' }}" href="{{ route('painel') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs(['categorias', 'categorias.*']) ? 'active' : '' }}" href="{{ route('categorias') }}">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs(['produtos', 'produtos.*']) ? 'active' : '' }}" href="{{ route('produtos') }}">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('perfil') ? 'active' : '' }}" href="{{ route('perfil') }}">Meu Perfil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid py-3">
  <div class="row">
    <div class="col">
      <p class="d-flex justify-content-end">Olá, {{ auth()->user()->name }} |&nbsp;&nbsp;<a class="text-danger" href="{{ route('logout') }}">Sair</a></p>
    </div>
  </div>
</div>
