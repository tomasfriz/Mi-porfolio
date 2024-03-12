import { clienteService } from "../service/client-service.js";

import { crearElementos } from "../controllers/crear-elemento.js"

clienteService.listaProductos().then((lista) => todosLosProductos(lista)).catch((error) => console.log(error));

const todosLosProductos = (lista) => {

    const todosLosProductos = document.querySelector(".productos__todos").querySelector(".productos__venta");

    lista.forEach((producto) => {
        const divproducto = crearElementos.cardProducto(producto);
        todosLosProductos.appendChild(divproducto);
    });
};