import { usuarios } from "./usuarios.js";

/*variable de verificación si hay algun usuario logueado*/
let usuarioOnLine = false;


const formularioLogin = document.querySelector(".login__form");

formularioLogin.addEventListener("submit", (event) => {
    event.preventDefault();

    const emailIngresado = document.querySelector("#login__form__email").value;
    const passwordIngresado = document.querySelector("#login__form__password").value;

    let usuarioEncontrado = false;

    usuarios.forEach((usuario) => {
        if ((usuario.email === emailIngresado) && (usuario.password === passwordIngresado)) {
            usuarioEncontrado = true;
        }
    });

    if (!usuarioEncontrado) {
        document.querySelector(".login__error").classList.add("input__invalido");
    } else {
        document.querySelector(".login__error").classList.remove("input__invalido");

        usuarioOnLine = true; /*logueado*/
        sessionStorage.setItem("usuario-ok", JSON.stringify(usuarioOnLine));/*pone en true que el usuario esta logueado*/

        window.location.href = "todos-los-productos.html";
    }
});