/*crea localstorage para la visibilización de productos en
"ver producto"*/
const local = JSON.parse(localStorage.getItem("producto")) || [];

/*captura todos los link a "ver producto"*/
const links = document.querySelectorAll(".producto__venta-link");

/*recorre cada link, agrega un escuchador "click", y toma de su padre
los datos de el producto. Luego los guarda en el localStorage para que
la página "ver producto" los tome y muestre*/
links.forEach((link) => {
    link.addEventListener("click", (evento) => {
        const padre = link.parentElement;
        console.log(padre);

        const producto = [{
            imagen: padre.querySelector(".producto__venta-img").getAttribute("src"),
            titulo: padre.querySelector(".producto__venta-titulo").textContent
        }
        ];
        localStorage.setItem("producto", JSON.stringify(producto));
    });
});