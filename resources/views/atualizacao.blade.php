<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('src/css/index.css') }}">
    <script src="{{ asset('src/js/index.js') }}"></script>
</head>
<body>
    <nav>
        <ul class="nav nav-tabs navbar-fixed-top">
            <li role="presentation"><a href="./comentarios">Comentários</a></li>
            <li role="presentation" class="active"><a href="#">Atualizar perfil</a></li>
        </ul>
    </nav>

    <div class="container" id="updateProfile">
        <div id="tituloUpdateProfile">
            <h1>Atualizar Perfil 
                <div class="profile-wrapper">
                    <img src="./src/img/profile.png" alt="Imagem do perfil" class="iconePerfil" id="imagemPerfil">
                    <span class="glyphicon glyphicon-pencil edit-icon" aria-hidden="true"></span>
                </div>
            </h1>
            <input type="file" id="imgPerfil" accept="image/*" style="display: none;">
        </div>

        <form id="updateProfileForm">
            <div id="inputsUpdateProfile" class="input-group">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome:</label>
                        <input type="text" id="name" class="form-control" required>
                        <span id="nameError" class="error-message"></span>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="lastName">Sobrenome:</label>
                        <input type="text" id="lastName" class="form-control" required>
                        <span id="lastNameError" class="error-message"></span>  
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="rg" style="margin-top: 15px;">RG:</label>
                        <input type="text" id="rg" class="form-control" required>
                        <span id="rgError" class="error-message"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cpf" style="margin-top: 15px;">CPF:</label>
                        <input type="text" id="cpf" class="form-control" required>
                        <span id="cpfError" class="error-message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="cep" style="margin-top: 15px;">CEP:</label>
                        <input type="text" id="cep" class="form-control" required>
                        <span id="cepError" class="error-message"></span>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="address" style="margin-top: 15px;">Endereço:</label>
                        <input type="text" id="address" class="form-control" required>
                        <span id="addressError" class="error-message"></span>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label for="numero" style="margin-top: 15px;">N°:</label>
                        <input type="number" id="numero" class="form-control" required>
                        <span id="numeroError" class="error-message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="bairro" style="margin-top: 15px;">Bairro:</label>
                        <input type="text" id="bairro" class="form-control" required>
                        <span id="bairroError" class="error-message"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="complemento" style="margin-top: 15px;">Complemento:</label>
                        <input type="text" id="complemento" class="form-control" required>
                        <span id="complementoError" class="error-message"></span>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="uf" style="margin-top: 15px;">UF:</label>
                        <input type="text" id="uf" class="form-control" required>
                        <span id="ufError" class="error-message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="phone" style="margin-top: 15px;">Telefone:</label>
                        <input type="text" id="phone" class="form-control" required>
                        <span id="phoneError" class="error-message"></span>
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="email" style="margin-top: 15px;">E-mail:</label>
                        <input type="email" id="email" class="form-control inputs" required>
                        <span id="emailError" class="error-message"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cartao" style="margin-top: 15px;">Cartão:</label>
                        <select id="cartao" class="inputs text-center">
                            <option value="">-- Selecione uma opção --</option>
                            <option value="credito">Cartão de crédito</option>
                            <option value="debito">Cartão de débito</option>
                        </select> 
                    </div>

                    <div class="form-group col-md-6">
                        <label for="chavePix" style="margin-top: 15px;">Chave(s) Pix:</label>
                        <select id="chavePix" class="inputs text-center">
                            <option value="">-- Selecione uma opção --</option>
                            <option value="celular">Celular</option>
                            <option value="email">E-mail</option>
                            <option value="cpf">CPF</option>
                            <option value="aleatoria">Aleatória</option>
                        </select> 
                    </div>
                </div>
            </div>

            <div id="buttonUpdateProfile">
                <button type="submit" id="btnAtualizar" class="btn btn-default btnExt">
                    <span class="glyphicon glyphicon glyphicon-floppy-disk"></span> Atualizar</button>
            </div>
        </form>

        <!-- Modal para informações do cartão -->
        <div class="modal fade" id="cartaoModal" tabindex="-1" role="dialog" aria-labelledby="cartaoModalTitulo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title text-center" id="cartaoModalTitulo"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="formCadastrarCartao">
            
                            <div class="form-group">
                                <label for="nomeTitular">Nome:</label>
                                <input type="text" class="form-control inputs" id="nomeTitular" required>
                            </div>

                            <div class="form-group">
                                <label for="numeroCartao">Número do cartão:</label>
                                <input type="number" class="form-control inputs" id="numeroCartao" required>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV:</label>
                                    <input type="number" class="form-control inputs" id="cvv"  required>
                                </div>
    
                                <div class="form-group col-md-6">
                                    <label for="validade">Validade:</label>
                                    <input type="month" class="form-control inputs text-center" id="validade" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-default btnExt">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para informações do pix -->
        <div class="modal fade" id="pixModal" tabindex="-1" role="dialog" aria-labelledby="pixTitulo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title text-center" id="pixTitulo"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="formCadastrarPix">
            
                            <div class="form-group">
                                <label for="chave">Chave pix:</label>
                                <input type="text" class="form-control inputs" id="chave" required>
                            </div>

                            <button type="submit" class="btn btn-default btnExt">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
