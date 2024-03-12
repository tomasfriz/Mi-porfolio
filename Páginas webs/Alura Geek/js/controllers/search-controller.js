import { clienteService } from "../service/client-service.js";

import { crearElementos } from "../controllers/crear-elemento.js"


const url = new URL(window.location);
const buscar = url.searchParams.get("buscar");


const mostrarBusqueda = async () => {

    try {
        const lista = await clienteService.buscarSearch(buscar);

        const titulo = document.querySelector(".producto__header-titulo");

        const cajaProductos = document.querySelector(".productos__todos").querySelector(".productos__venta")

        if (lista.length === 0) {
            titulo.innerHTML = `No hubo coincidencias con: "${buscar}"`;
        } else {
            titulo.innerHTML = `Se encontró: "${buscar}"`;
            lista.forEach((producto) => {
                const card = crearElementos.cardProducto(producto);
                cajaProductos.appendChild(card);
            });
        }

    } catch (error) {
        alert("Hubo un error en la base de datos. Intentelo más tarde.");
    }
}

mostrarBusqueda();

/*
const mostrarBusqueda = async () =>{

    try{
        const lista = await clienteService.listaProductos()

        const expresion = new RegExp(buscar,"i");

        const cajaProductos = document.querySelector(".productos__todos").querySelector(".productos__venta")

        lista.forEach((producto) => {

            if(expresion.test(producto.nombre)){

                const card = crearElementos.cardProducto(producto);

                cajaProductos.appendChild(card);
            }
        });

        const titulo = document.querySelector(".producto__header-titulo")
        if(cajaProductos.childElementCount){
            titulo.innerHTML = `Se encontró: "${buscar}"`;
        }else{
            titulo.innerHTML = `No hubo coincidencias con: "${buscar}"`;
        }  
    }catch(error){
        console.log(error)
    }
}
*/