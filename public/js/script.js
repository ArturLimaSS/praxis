document.getElementById("openModalBtn").addEventListener("click", () => {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    modal.classList.remove("fade-out");
    modal.classList.add("fade-in");
    getCidade();
    getTipoLogradouro();
});

document.getElementById("closeModalBtn").addEventListener("click", () => {
    var modal = document.getElementById("myModal");
    modal.classList.remove("fade-in");
    modal.classList.add("fade-out");

    setTimeout(() => {
        modal.style.display = "none";
        modal.classList.remove("fade-out");
    }, 300);
});

window.addEventListener("click", (event) => {
    if (event.target === document.getElementById("myModal")) {
        var modal = document.getElementById("myModal");
        modal.classList.remove("fade-in");
        modal.classList.add("fade-out");

        setTimeout(() => {
            modal.style.display = "none";
            modal.classList.remove("fade-out");
        }, 300);
    }
});

const limparForm = () => {
    document.getElementById('form_cadastro').reset();
}

const handleCep = (e) => {
    let input = e.target
    input.value = mascaraCep(input.value);
    console.log(input.value)
}

const mascaraCep = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '');
    value = value.replace(/(\d{1,5})(\d)/, '$1-$2')
    return value
}