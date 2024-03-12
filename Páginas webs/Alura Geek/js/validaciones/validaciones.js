export const validarInput = (input) => {

    /*me fijo el data-atribut a ver que input es*/
    const tipoDeInput = input.dataset.input;

    /*si validity es false, imprimo el error y cambio atributos a rojo*/
    if (input.validity.valid) {
        input.parentElement.classList.remove("input__invalido");
        input.parentElement.querySelector(".mensaje__error").innerHTML = "";
    } else {
        input.parentElement.classList.add("input__invalido");
        input.parentElement.querySelector(".mensaje__error").innerHTML = imprimirMensaje(tipoDeInput, input);
    }
};

/*array de tipos de errores que controlo*/
const tipoDeErrores = [
    "valueMissing",
    "patternMismatch"
];

/*array con objetos que tienen, para aca data-atribut, sus
errores y los mensajes que deben imprimir*/
const mensajesDeError = {
    nombre_footer: {
        valueMissing: "El campo Nombre no puede estar vacío"
    },
    mensaje_footer: {
        valueMissing: "El campo Mensaje no puede estar vacío"
    },
    email_login: {
        valueMissing: "El campo email no puede estar vacío",
        patternMismatch: "No es un tipo de mail válido(nombre@dominio.xxx)"
    },
    password_login: {
        valueMissing: "El campo Password no puede estar vacío"
    },
    nombre_agregar_producto: {
        valueMissing: "Debe ingresar un nombre para el producto"
    },
    precio_agregar_producto: {
        valueMissing: "Debe ingresar el precio del producto (ej: 1000,00)"
    },
    descripcion_agregar_producto: {
        valueMissing: "Debe ingresar una breve descripcion del producto"
    }
}

/*recorre los errores del input del array de errores, y chequea
si alguno del input.validity de esos errores esta en true, si es
asi, imprime el mensaje de error correspondiente*/
const imprimirMensaje = (tipoDeInput, input) => {
    let mensaje = "";
    tipoDeErrores.forEach((error) => {
        if (input.validity[error]) {
            mensaje = mensajesDeError[tipoDeInput][error];
        }
    });
    return mensaje;
}