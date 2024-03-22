<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

<main class="form-signin w-100 m-auto">

    <h1 class="h3 mb-3 fw-normal text-center"><i class="bi bi-person-fill-lock"></i> Área Restrita</h1>

    <form action="{{ route('login.action') }}" method="POST" class="user">
      @csrf
      
    <div class="form-floating">
      <input name="email" type="email" class="form-control form-control-user" id="floatingInput" placeholder="Informe seu e-mail">
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control form-control-user" id="floatingPassword" placeholder="Informe sua Senha">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="form-check text-start my-3">
      <input name="remember" type="checkbox" class="form-check-input" id="customCheck">
      <label class="form-check-label" for="flexCheckDefault">
        Lembrar
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit"><i class="bi bi-box-arrow-right"></i> Entrar</button>
  </form>

  @if(Session::has('sucesso'))
   <div class="row my-3">
      <div class="col">
        <div class="alert alert-success text-center" role="alert">
            {{ Session::get('sucesso') }}
        </div>
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="row my-3">
      <div class="col">
        <div class="alert alert-danger">
            <ul class="py-0 my-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
      </div>
    </div>
  @endif
  

  <div class="row my-5">
    <div class="col text-center">
      <a class="btn btn-sm btn-success" href="{{ route('registrar') }}"><i class="bi bi-person-add"></i> Criar conta!</a>
    </div>
  </div>

</main>

</body>
</html>