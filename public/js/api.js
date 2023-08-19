document.addEventListener('DOMContentLoaded', (e) => {
    getPessoas()
})

const tipo_logradouro = document.querySelector("#tipo_logradouro")
const logradouro = document.querySelector("#logradouro")
const numero = document.querySelector("#numero")
const bairro = document.querySelector("#bairro")
const cidade = document.querySelector("#cidade")

//REQUISIÇÃO NA API VIACEP - CASO O RETORNO FOR SUCCES, DEFINE OS VALORES DOS CAMPOS DOS FORMULÁRIOS
//CASO FOR ERROR, EXIBE UM ALERTA PARA O USUÁRIO DE ACORDO COM O TIPO DO ERRO. 

const getCep = async () => {
    const cep = document.querySelector('#cep').value;

    try {
        const response = await fetch(`https://viacep.com.br/ws/${ cep }/json/`);
        const data = await response.json();
        if (data.erro === true) {
            alert("CEP Não encontrado na base de dados.")
        }
        logradouro.value = data.logradouro;
        bairro.value = data.bairro
        cidade.value = data.localidade
    } catch (error) {
        alert('Número de Cep Inválido.')
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
            let cidades = '';

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
            console.log(responseJson)
            let tipos = '';

            for (let i = 0; i < responseJson.length; i++) {
                tipos += `<option value="${ responseJson[i].id }">${ responseJson[i].nome }</option>`;
            }

            selectTipoLogradouro.innerHTML = tipos;
        })
}

const getPessoas = () => {
    fetch('/api/pessoa', {
        method: "get",
        headers: {
            "Content-Type":"application/json"
        }
    }).then(response => response.json())
    .then(responseJson => console.log(responseJson))
}

//FAZ O ENVIO DOS DADOS PARA A API, RETORNANDO SUCESSO OU ERROR PARA O USUÁRIO

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
        .then(dataResponse => console.log(dataResponse))
        .catch(error => console.log(error))
})

