<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> 
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('src/css/index.css') }}">
    <script src="{{ asset('src/js/index.js') }}"></script>
</head>
<body>
    <div class="container" id="login">
        <div id="tituloLogin">
            <h1>Login <i data-feather="lock"></i></h1> 
            <script>
                feather.replace()
            </script>  
        </div>

        <form id="formLogin" action="{{ route('login.store') }}" method="POST">
            @csrf
            <div id="inputsLogin" class="input-group">
                <div id="email">
                    <label for="inputEmail">Email:</label>
                    <input type="email" id="inputEmail" class="form-control" name="emailLogin" value="{{ old('emailLogin') }}" required>
                    @error('emailLogin')
                        <br>
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div id="senha">
                    <label for="inputSenha" style="margin-top: 15px;">Senha:</label> 
                    <input type="password" id="inputSenha" class="form-control" name="senhaLogin" required>
                    <span class="glyphicon glyphicon-eye-open mostrarSenha" aria-hidden="true"></span>
                    @error('senhaLogin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            </div>
        
            <div id="buttonLogin">
                <button type="submit" id="btnEntrar" class="btn btn-default btnExt">Entrar</button>
            </div>
        
        </form>
    </div>
    
    <div class="create">
        <p>Não possui conta ainda? 
            <a id="novaConta" data-toggle="modal" data-target="#criarConta">
                <u>criar conta</u>
            </a>
        </p>
    </div>

    <div class="container">

        <div class="modal fade" id="criarConta" tabindex="-1" role="dialog" aria-labelledby="criarContaModalLabel">
            <div class="modal-dialog" role="document">
    
                <div class="modal-content">
    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title text-center" id="criarContaModalLabe">Criar Conta</h4>
                    </div>
                    
                    <div class="modal-body">
    
                        <form id="formCriarConta" action="{{ url('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="newEmail">Email:</label>
                                <input type="email" class="form-control inputs" id="newEmail" name="email" value="{{ old('email') }}" required >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="newPassword">Senha:</label>
                                <input type="password" class="form-control inputs" id="newPassword" name="password" value="{{ old('password') }}" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="confirmPassword">Confirmar Senha:</label>
                                <input type="password" class="form-control inputs" id="confirmPassword" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <hr>

                            <div class="form-group text-center">
                                <button type="button" class="btn btn-primary btn-block btnExt" style="background-color: #3b5998; border-color: #3b5998;">
                                    Login com Facebook
                                </button>

                                <button type="button" class="btn btn-danger btn-block btnExt" style="background-color: #db4437; border-color: #db4437; margin-top: 15px;">
                                    Login com Google
                                </button>
                            </div>

                            <button type="submit" class="btn btn-default btnExt">Criar Conta</button>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('erroDeCadastro'))
            $('#criarConta').modal('show');
        @endif
    });
</script>