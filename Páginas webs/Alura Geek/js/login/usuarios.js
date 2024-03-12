export const usuarios = [
    {
        email: "admin@gmail.com",
        password: "Admin2022"
    },
    {
        email: "tomas@gmail.com",
        password: "tomas821"
    }
];

/*chequea en el sessionstorage si el usuario esta online (true),
devuelve booleano*/
const verUsuarioOnline = () => {
    const usuarioOk = JSON.parse(sessionStorage.getItem("usuario-ok")) || false;
    return usuarioOk;
};

/*cambia el boton "login" por "salir" y su atributo href a 
index.html*/
const btnSalir = () => {
    const btnlogin = document.querySelector(".header__login");

    btnlogin.innerHTML = "Salir";
    btnlogin.href = "index.html";

    /*cuando cambia el boton a salir, se agrega un escuchador
    para que cuando haga click, desloguee (sessionStorage a "false")*/
    btnlogin.addEventListener("click", (evento) => {
        const usuarioOK = false;
        sessionStorage.setItem("usuario-ok", JSON.stringify(usuarioOK));
    });

};

/*cambia estilos del boton "agregar producto" para que aparezca*/
const btnAgregarProducto = () => {
    const btnAgregar = document.querySelector(".producto__header__link");
    btnAgregar.style.display = "flex";
}

/*cambia estilos del contenedor de los botones modificar/borrar
para que aparezca*/
const btnModificar = () => {
    const botones = document.querySelector(".producto__modificar");
    botones.style.visibility = "visible";
};

/*objeto exportado con todas las funciones anteriores declaradas*/
export const controlUsuarioOk = {
    verUsuarioOnline,
    btnSalir,
    btnAgregarProducto,
    btnModificar
}