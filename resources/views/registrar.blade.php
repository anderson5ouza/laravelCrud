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
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><i class="bi bi-person-add"></i> Criar Conta</h1>
              </div>
              <form action="{{ route('registrar.action') }}" method="POST" class="user">
                @csrf

                <div class="form-group my-3">
                  <input name="name" type="text" class="form-control form-control-user @error('name')is-invalid @enderror" value="{{ old('name') }}" placeholder="Informe seu nome completo">
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group my-3">
                  <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror"value="{{ old('email') }}" placeholder="Informe seu e-mail">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group row my-3">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" value="{{ old('password') }}" placeholder="Senha">
                    @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Repita sua senha">
                    @error('password_confirmation')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-user btn-block my-3"><i class="bi bi-person-add"></i> Criar Conta</button>
                  </div>
                </div>
                
              </form>
       
              <div class="text-center">
                <a class="btn btn-sm text-primary" href="{{ route('login') }}">Já possui uma conta? Entre por aqui ;)</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>