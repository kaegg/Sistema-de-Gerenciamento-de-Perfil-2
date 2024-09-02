<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="{{ asset('src/css/index.css') }}">
    <script src="{{ asset('src/js/index.js') }}"></script>
</head>
<body>
    <nav>
        <ul class="nav nav-tabs navbar-fixed-top">
            <li role="presentation" class="active"><a href="#">Comentários</a></li>
            <li role="presentation"><a href="./atualizacao">Atualizar perfil</a></li>
        </ul>
    </nav>

    <div id="comentarios" class="container">
        <h1 id="tituloComentarios">Comentários e Sugestões</h1>
        
        <form id="comentariosForm" action="{{ route('comentario.store') }}" method="POST">
            @csrf
            <div id="inputsComentarios">
                <div class="form-group">
                    <label for="comentario">Comentário:</label>
                    <textarea id="comentario" name="comentario" class="form-control comentario" rows="4" required></textarea>
                    @error('comentario')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" value="submit" id="btnEnviarComentario" class="btn btn-default btnExt">Comentar</button>
            </div>
        </form>
        
        <div id="comentariosList">
            <h2>Comentários Recentes</h2>
            <ul id="comentariosUl">
                <li>
                    <img src="./src/img/profile.png" alt="Imagem do perfil de John Doe" class="iconePerfil">
                    <span>John Doe</span>
                    <textarea id="comentario1" name="comentario" class="form-control comentario" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit...</textarea>
                </li>
                <li>
                    <img src="./src/img/kauan.jpg" alt="Imagem do perfil de Kauan Eguchi" class="iconePerfil">
                    <span>Kauan Eguchi</span>
                    <textarea id="comentario2" name="comentario" class="form-control comentario" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit...</textarea>
                </li>
                <li>
                    <img src="./src/img/file.enc" alt="Imagem do perfil de Leonardo Almenara" class="iconePerfil">
                    <span>Leonardo Almenara</span>
                    <textarea id="comentario3" name="comentario" class="form-control comentario" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit...</textarea>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>