const tipo_logradouro = document.querySelector("#tipo_logradouro")
const logradouro = document.querySelector("#logradouro")
const numero = document.querySelector("#numero")
const bairro = document.querySelector("#bairro")
const cidade = document.querySelector("#cidade")
const route = '/api/pessoa';

const getCep = async () => {
    const cep = document.querySelector('#cep').value;
    try {
        const response = await fetch(`https://viacep.com.br/ws/${ cep }/json/`);
        const data = await response.json();
        logradouro.value = data.logradouro;
        bairro.value = data.bairro
        cidade.value = data.localidade
    } catch (error) {
        console.log(error)
    }
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
        "cep": target.cep.value,
        "tipo_logradouro": target.tipo_logradouro.value,
        "logradouro": target.logradouro.value,
        "numero": target.numero.value,
        "bairro": target.bairro.value,
        "cidade": target.cidade.value
    };
    fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(dataResponse => console.log(dataResponse))
        .catch(error => console.log(error))
})
