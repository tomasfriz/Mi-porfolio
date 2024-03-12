import { controlUsuarioOk } from "./usuarios.js";

/*chequeo si el administrador esta logueado*/
if (controlUsuarioOk.verUsuarioOnline()) {

    /*cambio el boton "login" por "salir" y cambio su href*/
    controlUsuarioOk.btnSalir();

    /*si estoy en la página "todos los productos", habilito
    el boton de "agregar producto"*/
    if (document.querySelector(".productos__todos")) {
        controlUsuarioOk.btnAgregarProducto();
    };
}

