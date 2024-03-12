import { clienteService } from "../service/client-service.js";
import { crearElementos } from "./crear-elemento.js";
import { controlUsuarioOk } from "../login/usuarios.js";

const mostrarPagina = async () => {
    const url = new URL(window.location);
    const id = url.searchParams.get("id");
    try {
        const producto = await clienteService.verProducto(id);
        productosSimilares(producto);
        mostrarProducto(producto);
    } catch (error) { console.log(error) }
}

const productosSimilares = async (producto) => {
    try {
        const listaProductos = await clienteService.seisProductosSeccion(producto.seccion)
        const similares = document.querySelector(".productos__similares").querySelector(".productos__venta");
        listaProductos.forEach((producto) => {
            if (similares.childElementCount < 6) {
                const card = crearElementos.cardProducto(producto);
                similares.appendChild(card);
            }
        });
    } catch (error) { console.log(error) }
};

const mostrarProducto = (producto) => {

    crearElementos.mostrarProducto(producto);
    if (controlUsuarioOk.verUsuarioOnline()) {
        controlUsuarioOk.btnModificar();

        document.querySelector("#producto__modificar").addEventListener("click", (evento) => {
            window.location.href = `editar-producto.html?id=${producto.id}`
        });

        document.querySelector("#producto__borrar").addEventListener("click", (evento) => {
            borrar(producto);
        });
    }
};


const borrar = async (producto) => {

    if (window.confirm("Está seguro que desea borrar este producto?")) {
        try {
            const lista = await clienteService.productosSimilares(producto.seccion)

            if (lista.length <= 6) {
                throw new Error("No se puede borrar. Quedan solo 6 productos de esta sección");
            } else {
                clienteService.borrarProducto(producto.id)
                    .then((respuesta) => window.location.href = "borrado-concluido.html")
                    .catch((error) => console.log(error))
            }
        } catch (error) {
            alert(error);
        }
    }
}

mostrarPagina();
