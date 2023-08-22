document.addEventListener('DOMContentLoaded', (e) => {
    getPessoas()
})
function formatValue(value) {
    return value !== null ? value : '';
}
const select_tipo_logradouro = document.querySelector("#tipo_logradouro")
const logradouro = document.querySelector("#logradouro")
const numero = document.querySelector("#numero")
const bairro = document.querySelector("#bairro")
const cidade = document.querySelector("#cidade")


const getCep = async () => {
    const cep = document.querySelector('#cep').value;

    try {
        const response = await fetch(`https://viacep.com.br/ws/${ cep }/json/`);
        const data = await response.json();
        if (data.erro === true) {
            alert("CEP Não encontrado na base de dados.")
        }
        const tipo_logradouro = data.logradouro.split(' ')[0];
        for (let i = 0; i < select_tipo_logradouro.options.length; i++) {
            const option = select_tipo_logradouro.options[i];
            if (option.text.toLowerCase() === tipo_logradouro.toLowerCase()) {
                option.selected = true;
                break;
            }
        }
        logradouro.value = data.logradouro.split(' ').slice(1).join(' ');
        bairro.value = data.bairro;

        for (let i = 0; i < cidade.options.length; i++) {
            const option = cidade.options[i];
            if (option.text.toLowerCase() === data.localidade.toLowerCase()) {
                option.selected = true;
                break;
            }
        }

    } catch (error) {
        alert('Número de CEP Inválido.')
    }
}

const getCidade = () => {
    fetch('/api/cidade', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(responseJson => {
            const selectCidade = document.getElementById('cidade');
            console.log(responseJson)
            let cidades = '<option value="" disabled selected>Selecione cidade</option>';

            for (let i = 0; i < responseJson.length; i++) {
                cidades += `<option value="${ responseJson[i].id }">${ responseJson[i].nome }</option>`;
            }

            selectCidade.innerHTML = cidades;
        })
}

const getTipoLogradouro = () => {
    fetch('/api/tipo', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(responseJson => {
            const selectTipoLogradouro = document.getElementById('tipo_logradouro');
            console.log(responseJson);

            let tipos = '<option value="" disabled selected>Selecione o tipo de logradouro</option>';

            for (let i = 0; i < responseJson.length; i++) {
                tipos += `<option value="${ responseJson[i].id }">${ responseJson[i].nome }</option>`;
            }

            selectTipoLogradouro.innerHTML = tipos;
        });
}


const getPessoas = () => {
    fetch('/api/pessoa', {
        method: "get",
        headers: {
            "Content-Type": "application/json"
        }
    }).then(response => response.json())
        .then(responseJson => {
            let tbody = document.getElementById('table-body');
            let pessoas = ''
            tbody.innerHTML = pessoas
            console.log(responseJson)
            if (responseJson.length > 0) {
                for (let i = 0; i < responseJson.length; i++) {
                    const nome = formatValue(responseJson[i].nome);
                    const tipoLogradouro = formatValue(responseJson[i].tipo_logradouro);
                    const logradouro = formatValue(responseJson[i].logradouro);
                    const numero = formatValue(responseJson[i].numero);
                    const bairro = formatValue(responseJson[i].bairro);
                    const cidade = formatValue(responseJson[i].cidade);
                    const idade = formatValue(responseJson[i].idade);
                    const sexo = formatValue(responseJson[i].sexo);

                    let enderecoCompleto = '';

                    if (tipoLogradouro !== '') {
                        enderecoCompleto += `${ tipoLogradouro } ${ logradouro } ${ numero }`;
                    } else {
                        enderecoCompleto += `${ logradouro } ${ numero }`;
                    }

                    if (bairro !== '') {
                        enderecoCompleto += `, ${ bairro }`;
                    }

                    if (cidade !== '') {
                        enderecoCompleto += `, ${ cidade }`;
                    }

                    pessoas += `<tr>
                        <td>${ nome }</td>
                        <td>${ enderecoCompleto }</td>
                        <td>${ idade }</td>
                        <td>${ sexo }</td>
                        <td><button onClick="editarUsuario(${ responseJson[i].id })">Editar</button><button onClick="excluirUsuario(${ responseJson[i].id })">Excluir</button></td>
                        </tr>`;
                }
            } else {
                pessoas += '<tr><td class="text-center" colspan="5">Nenhum Usuário Cadastrado</td></tr>';
            }

            tbody.innerHTML = pessoas;

        })
}

const editarUsuario = (id) => {
    fetch(`/api/pessoa/${ id }`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(pessoa => {
            openModal();
            document.querySelector("#nome").value = pessoa.nome;
            document.querySelector("#idade").value = pessoa.idade;
            document.querySelector("#sexo").value = pessoa.sexo;
            document.querySelector("#email").value = pessoa.email;
            if (pessoa.endereco) {
                const endereco = pessoa.endereco;
                document.querySelector("#cep").value = endereco.cep;
                document.querySelector("#tipo_logradouro").value = endereco.tipo_logradouro_id;
                document.querySelector("#logradouro").value = endereco.logradouro;
                document.querySelector("#numero").value = endereco.numero;
                document.querySelector("#bairro").value = endereco.bairro;
                document.querySelector("#cidade").value = endereco.cidade_id;
            }
            document.querySelector("#form_cadastro").removeEventListener('submit', cadastrarUsuario);
            document.querySelector("#form_cadastro").addEventListener('submit', (e) => {
                e.preventDefault();
                atualizarUsuario(id);
            });


        });
}

const atualizarUsuario = (id) => {
    const target = document.querySelector("#form_cadastro");
    const data = {
        "nome": target.nome.value,
        "idade": target.idade.value,
        "sexo": target.sexo.value,
        "email": target.email.value,
        "senha": target.senha.value,
        "cep": target.cep.value.replace('-', ''),
        "tipo_logradouro": target.tipo_logradouro.value,
        "logradouro": target.logradouro.value,
        "numero": target.numero.value,
        "bairro": target.bairro.value,
        "cidade": target.cidade.value
    };

    fetch(`/api/pessoa/${ id }`, {
        method: 'PUT', // Use o método PUT para atualizar os dados
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(responseJson => {
            if (responseJson.status === 'success') {
                alert(responseJson.message);
                getPessoas();
                closeModal();
            }
        })
        .catch(error => console.log(error))
}

const excluirUsuario = (id) => {
    fetch(`/api/pessoa/${ id }`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(responseJson => {
            if (responseJson.status === 'success') {
                getPessoas();
            }
        })
}

document.querySelector("#form_cadastro").addEventListener('submit', (e) => {
    e.preventDefault();
    const target = e.target;
    const data = {
        "nome": target.nome.value,
        "idade": target.idade.value,
        "sexo": target.sexo.value,
        "email": target.email.value,
        "senha": target.senha.value,
        "cep": target.cep.value.replace('-', ''),
        "tipo_logradouro": target.tipo_logradouro.value,
        "logradouro": target.logradouro.value,
        "numero": target.numero.value,
        "bairro": target.bairro.value,
        "cidade": target.cidade.value
    };

    fetch('/api/pessoa', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(responseJson => {
            if (responseJson.status === 'success') {
                alert(responseJson.message)
                getPessoas();
                closeModal();
            }
        })
        .catch(error => console.log(error))
})