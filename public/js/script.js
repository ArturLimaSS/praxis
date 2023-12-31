const openModal = (e) => {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    modal.classList.remove("fade-out");
    modal.classList.add("fade-in"); 
    getCidade();
    getTipoLogradouro();
}

document.getElementById("openModalBtn").addEventListener("click", () => {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    modal.classList.remove("fade-out");
    modal.classList.add("fade-in");
    getCidade();
    getTipoLogradouro();
});

document.getElementById("closeModalBtn").addEventListener("click", () => {
    closeModal();
});


const closeModal = () => {
    var modal = document.getElementById("myModal");
    modal.classList.remove("fade-in");
    modal.classList.add("fade-out");

    setTimeout(() => {
        modal.style.display = "none";
        modal.classList.remove("fade-out");
        limparForm()
        window.location.reload();
    }, 300);
}

window.addEventListener("click", (event) => {
    if (event.target === document.getElementById("myModal")) {
        var modal = document.getElementById("myModal");
        modal.classList.remove("fade-in");
        modal.classList.add("fade-out");
        setTimeout(() => {
            modal.style.display = "none";
            modal.classList.remove("fade-out");
            window.location.reload();
        }, 300);
    }
});

const limparForm = () => {
    document.getElementById('form_cadastro').reset();
}

const handleCep = (e) => {
    let input = e.target;
    input.value = mascaraCep(input.value);

    if (input.value !== "") {
        document.getElementById('tipo_logradouro').required = true;
        document.getElementById('logradouro').required = true;
        document.getElementById('numero').required = true;
        document.getElementById('cidade').required = true;
        const checkObrigatorios = document.getElementsByClassName('check-obrigatorio-var');
        for (let i = 0; i < checkObrigatorios.length; i++) {
            checkObrigatorios[i].classList.remove('d-none');
        }
    } else {
        document.getElementById('tipo_logradouro').required = false;
        document.getElementById('logradouro').required = false;
        document.getElementById('numero').required = false;
        document.getElementById('cidade').required = false;
        const checkObrigatorios = document.getElementsByClassName('check-obrigatorio-var');
        for (let i = 0; i < checkObrigatorios.length; i++) {
            checkObrigatorios[i].classList.add('d-none');
        }
    }
}

const mascaraCep = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '');
    value = value.replace(/(\d{1,5})(\d)/, '$1-$2')
    return value
}


const validaEmail = (email) => {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return regex.test(email);
}

const email = document.getElementById('email')
email.addEventListener('blur', () => {
    const emailValue = email.value;

    if (emailValue.trim() !== '') {
        const isValid = validaEmail(emailValue);
        if (!isValid) {
            alert('Email inválido');
            email.value = '';
        }
    }
});
