(() => {
    /*Movimiento boton banner hacia sección predeterminada*/
    const botonBanner = document.querySelector(".banner__boton");
    botonBanner.addEventListener("click", (evento) => {
        evento.preventDefault();
        let link = evento.currentTarget.getAttribute('href');
        document.querySelector(link).scrollIntoView({
            behavior: 'smooth'
        });
    });
})();

