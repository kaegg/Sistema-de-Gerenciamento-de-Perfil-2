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

        @if (session('success'))
            <div id="mensagemComentario" class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('success') }}
            </div>
        @endif
        
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
                @foreach ($comentarios as $comentario)
                <li>
                    @if ($comentario->usuario->foto)
                        <img src="data:image/png;base64,{{ base64_encode($comentario->usuario->foto) }}" alt="Imagem do perfil de {{ $comentario->usuario->nome }}" class="iconePerfil">
                    @else
                        <img src="./src/img/profile.png" alt="Imagem do perfil de {{ $comentario->usuario->nome }}" class="iconePerfil">
                    @endif

                    <span>{{ $comentario->usuario->nome }}</span>
                    <span>{{ $comentario->created_at->format('d/m/Y') }}</span>
                    <textarea id="comentario1" name="comentario" class="form-control comentario" readonly>{{ $comentario->comentario }}</textarea>
                
                    <div class="like-deslike" style="margin-top: 15px">
                        <form action="{{ route('like', $comentario->idComentario) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; cursor: pointer;">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 20px; color: #5cb85c;"></span>
                            </button>
                        </form>
                        <span style="font-size: 16px; color: #5cb85c;">{{ $comentario->like }}</span>
                        
                        <form action="{{ route('deslike', $comentario->idComentario) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; cursor: pointer;">
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 20px; color: #d9534f;"></span>
                            </button>
                        </form>
                        <span style="font-size: 16px; color: #d9534f;">{{ $comentario->deslike }}</span>
                    </div>
                
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>