document.querySelector(".header__input").addEventListener("submit", (ev) => {

    ev.preventDefault();
    const entrada = document.querySelector(".header__input-texto").value;

    window.location.href = `search.html?buscar=${entrada}`;
})