document.getElementById("openModalBtn").addEventListener("click", () => {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    modal.classList.remove("fade-out");
    modal.classList.add("fade-in");
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