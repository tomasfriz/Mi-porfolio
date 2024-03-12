import { clienteService } from "../service/client-service.js";

import { crearElementos } from "../controllers/crear-elemento.js"

const starwar = document.querySelector(".starwar").querySelector(".productos__venta");
const consolas = document.querySelector(".consolas").querySelector(".productos__venta");
const diversos = document.querySelector(".diversos").querySelector(".productos__venta");

const mostrarProductosSecciones = async (contenedor, seccion) => {

    try {
        const lista = await clienteService.seisProductosSeccion(seccion)

        lista.forEach((producto) => {
            const divProducto = crearElementos.cardProducto(producto);
            contenedor.appendChild(divProducto)
        });
    } catch (error) { console.log(error) }
};

mostrarProductosSecciones(starwar, "Starwar");
mostrarProductosSecciones(consolas, "Consolas");
mostrarProductosSecciones(diversos, "Diversos");

/*
clienteService.listaProductos().then((lista) => crearListasProductos(lista)).catch((error) => alert ("Ocurrió un error"));

const crearListasProductos = (lista) => {

    const starwar = document.querySelector(".starwar").querySelector(".productos__venta");
    const consolas = document.querySelector(".consolas").querySelector(".productos__venta");
    const diversos = document.querySelector(".diversos").querySelector(".productos__venta");

    lista.forEach((producto) => {

    const divProducto = crearElementos.cardProducto(producto);
        
    
        if((producto.seccion === "Starwar") &&(starwar.childElementCount < 6)){
            starwar.appendChild(divProducto)
        }

        if((producto.seccion === "Consolas") && (consolas.childElementCount < 6)){
            consolas.appendChild(divProducto)
        }

        if((producto.seccion === "Diversos") && (diversos.childElementCount < 6)){
            diversos.appendChild(divProducto)
        }
    });
}
*/