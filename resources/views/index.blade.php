<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praxis</title>
    <link href="{{ asset('../css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <button id="openModalBtn">Abrir Modal</button>
        <div id="myModal" class="modal container">
            <div class="modal-content">
                <form id="form_cadastro" class="formulario">
                    <fieldset>
                        <legend>Dados Pessoais</legend>

                        <div class="fields">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input class="form-input d-block" type="text" name="nome" id="nome" placeholder="Nome">
                            </div>

                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <input class="form-input d-block" type="text" name="idade" id="idade" placeholder="Idade">
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-input" type="email" name="email" id="email" placeholder="E-mail">
                            </div>

                            <div class="form-group">
                                <label for="sexo">Sexo</label>
                                <div>
                                    <input type="radio" name="sexo" value="masculino">
                                    <label for="masculino">Masculino</label>
                                    <input type="radio" name="sexo" value="feminino">
                                    <label for="feminino">Feminino</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input class="form-input" type="password" name="senha" id="senha" placeholder="Senha" autocomplete="false">
                            </div>

                            <div class="form-group">
                                <label for="confirmacao_senha">Confirmação de Senha</label>
                                <input class="form-input" type="password" name="confirmacao_senha" id="confirmacao_senha" placeholder="Confirmação de Senha" autocomplete="false">
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="fields">

                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input class="form-input" type="text" name="cep" id="cep" placeholder="cep">
                            </div>
                            <div class="form-group">
                                <br>
                                <button type="button" id="busca_cep" onclick="getCep()">Buscar Cep</button><br>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="form-group">
                                <label for="logradouro">Tipo de logradouro</label>
                                <input class="form-input" type="text" name="tipo_logradouro" id="tipo_logradouro" placeholder="Tipo Logradouro">
                            </div>

                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input class="form-input" type="text" name="logradouro" id="logradouro" placeholder="Logradouro">
                            </div>

                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input class="form-input" type="text" name="numero" id="numero" placeholder="Número">
                            </div>

                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input class="form-input" type="text" name="bairro" id="bairro" placeholder="Bairro">
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input class="form-input" type="text" name="cidade" id="cidade" placeholder="cidade">
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit">Salvar</button>
                    <button type="submit">Limpar</button>
                    <button type="submit" class="closeModalBtn" id="closeModalBtn">Cancelar</button>
                </form>
            </div>
        </div>



    </div>
</body>
<script src="{{asset('../js/api.js')}}"></script>
<script src="{{asset('../js/styles.js')}}"></script>

</html>