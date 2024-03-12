import { clienteService } from "../service/client-service.js";

const url = new URL(window.location);
const id = url.searchParams.get("id");

const seccion = document.querySelector(".agregar__seccion");
const nombre = document.querySelector(".agregar__form__nombre-input");
const precio = document.querySelector(".agregar__form__precio-input");
const descripcion = document.querySelector(".agregar__descripcion")
const imagenDiv = document.querySelector(".agregar__imagen-div");
let fileImagen = "";

const obtenerProducto = () => {

    if (id === null) {
        console.log("error")
    }

    clienteService.verProducto(id)
        .then((producto) => {
            /*cargo todos los input*/
            seccion.value = producto.seccion;
            nombre.value = producto.nombre;
            precio.value = producto.precio;
            descripcion.value = producto.descripcion;
            imagenDiv.style.backgroundImage = `url("${producto.imagen}")`;
            fileImagen = producto.imagen;
            /*pongo un escuchador en el boton de carga
            de imagen para su modificacion*/
            const btnAgregarImagen = document.querySelector(".agregar__imagen");

            btnAgregarImagen.addEventListener('change', cargar);
            function cargar(ev) {
                var arch = new FileReader();
                arch.readAsDataURL(ev.target.files[0]);
                arch.addEventListener('load', leer);
            }
            function leer(ev) {
                document.getElementById('box__imagen').style.backgroundImage = "url('" + ev.target.result + "')";
                fileImagen = ev.target.result;
                document.querySelector(".archivo__faltante").parentElement.classList.remove("input__invalido");
            }
        }).catch((error) => console.log(error));
};

obtenerProducto();

document.querySelector(".agregar__form").addEventListener("submit", (evento) => {
    evento.preventDefault();
    modificarProducto();
});

const modificarProducto = async () => {

    try {
        const modificado = await clienteService.modificarProducto(fileImagen, seccion.value, nombre.value, precio.value, descripcion.value, id)
        console.log("antes");
        window.location.href = ("edicion-concluida.html");
        console.log("despues")

    } catch (error) {
        console.log(error)
    }
}







