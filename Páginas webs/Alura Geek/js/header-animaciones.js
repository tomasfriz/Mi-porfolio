(() => {
    /* Animación del header - se esconde cuando se escrolea hacia abajo,
    y aparece cuando se escrolea hacia arriba*/

    /*header*/
    let header = document.querySelector(".header");
    /*variable que mantiene el scroll anterior para comparar con el actual*/
    let scrollAnterior = 0

    /*boton del menu busqueda en versión movil*/
    let botonBusqueda = document.querySelector(".header__hamburguesa");
    /*barra de busqueda*/
    let barraBusqueda = document.querySelector(".header__input");

    /*escucha el scroll. Si baja, esconde el header; si sube, aparece*/
    window.addEventListener("scroll", () => {

        if (((window.scrollY > scrollAnterior) && !header.classList.contains("header__arriba") && (scrollAnterior != 0)) || ((window.scrollY < scrollAnterior) && header.classList.contains("header__arriba"))) {
            header.classList.toggle("header__arriba");

            /*en caso de que se haga scroll hacia abajo y se enconda la barra, si
            llegara a estar la barra de busqueda visible, tambien la esconde*/
            if (!barraBusqueda.classList.contains(".header__input-fuera")) {
                barraBusqueda.classList.add("header__input-fuera");
            }
        }
        scrollAnterior = window.scrollY;
    });

    /* Animación del botón de busqueda en versión Móvil*/
    botonBusqueda.addEventListener("click", () => {
        barraBusqueda.classList.toggle("header__input-fuera")
    });
})();