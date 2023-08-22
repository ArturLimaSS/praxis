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
        <button id="openModalBtn" class="custom-button">Novo</button><br><br>
        <div>
            <table class="table">
                <thead class="table-head">
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
            </table>
        </div>

        <div id="myModal" class="modal container">
            <div class="modal-content">
                <form id="form_cadastro" class="formulario">
                    <fieldset>
                        <legend>Dados Pessoais</legend>

                        <div class="fields">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <span class="check-obrigatorio">*</span>
                                <input class="form-input d-block" type="text" name="nome" id="nome" placeholder="Nome">
                            </div>

                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <span class="check-obrigatorio">*</span>
                                <input class="form-input d-block" type="text" name="idade" id="idade" placeholder="Idade">
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <span class="check-obrigatorio">*</span>
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
                    <fieldset class="mb-1">
                        <legend>Endereço</legend>
                        <div class="fields">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input class="form-input" oninput="handleCep(event)" maxlength="9" type="text" name="cep" id="cep" placeholder="cep">
                            </div>
                            <div class="form-group">
                                <br>
                                <button type="button" id="busca_cep" onclick="getCep()">Buscar Cep</button><br>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="form-group">
                                <label for="logradouro">Tipo de logradouro</label>
                                <span class="check-obrigatorio-var d-none">*</span>
                                <select class="form-input" name="tipo_logradouro" id="tipo_logradouro">
                                    <option value="" disabled selected>Selecione o tipo de logradouro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <span class="check-obrigatorio-var d-none">*</span>
                                <input class="form-input" type="text" name="logradouro" id="logradouro" placeholder="Logradouro">
                            </div>

                            <div class="form-group">
                                <label for="numero">Número</label>
                                <span class="check-obrigatorio-var d-none">*</span>
                                <input class="form-input" type="text" name="numero" id="numero" placeholder="Número">
                            </div>

                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input class="form-input" type="text" name="bairro" id="bairro" placeholder="Bairro">
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <span class="check-obrigatorio-var d-none">*</span>
                                <select class="form-input" name="cidade" id="cidade"></select>
                            </div>
                        </div>
                    </fieldset>
                    <button class="custom-button" type="submit">Salvar</button>
                    <button class="custom-button" type="submit" id="limpar_formulario" onclick="limparForm()">Limpar</button>
                    <button class="custom-button" type="submit" class="closeModalBtn" id="closeModalBtn">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="{{asset('../js/api.js')}}"></script>
<script src="{{asset('../js/script.js')}}"></script>

</html>