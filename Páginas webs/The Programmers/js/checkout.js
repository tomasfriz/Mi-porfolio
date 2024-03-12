let productosEnCarrito = localStorage.getItem("productos-en-carrito");
productosEnCarrito = JSON.parse(productosEnCarrito);

const botonComprar = document.querySelector("#accion-comprar");
const contenedorFormulario = document.querySelector("#formulario");
const contenedorComprado = document.querySelector("#comprado");
const contenedorMensaje = document.querySelector("#mensaje");

// Genera codigo HTML de la vista del formulario
function cargarFormulario() {
    contenedorFormulario.classList.remove("disabled");
    botonComprar.classList.remove("disabled");
    contenedorComprado.classList.add("disabled");
    contenedorMensaje.classList.add("disabled");

    contenedorFormulario.innerHTML = "";

    const div = document.createElement("div");
    div.classList.add("formulario");
    div.innerHTML = `
            <form action="" method="get">
                <div>
                    <img src="./images/usuario.webp" class="img-fluid mx-auto d-block" alt="imagen ilustrativa del icono de usuario">
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="nombre" class="form-label text-primary">Nombre:</label>
                    <input type="text" class="form-control p-2" id="nombre" placeholder="Escriba su nombre..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="apellido" class="form-label text-primary">Apellido:</label>
                    <input type="text" class="form-control p-2" id="apellido" placeholder="Escriba su apellido..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="dni" class="form-label text-primary">DNI:</label>
                    <input type="text" class="form-control p-2" id="dni" placeholder="Escriba su DNI..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="telefono" class="form-label text-primary">Teléfono:</label>
                    <input type="number" class="form-control p-2" id="telefono" placeholder="Escriba su número de teléfono..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="mail" class="form-label text-primary">Mail:</label>
                    <input type="email" class="form-control p-2" id="mail" placeholder="Escriba su mail..." required>
                </div>
                <div class="mb-3">
                    <img src="./images/tarjeta.webp" class="img-fluid mx-auto d-block" alt="imagen ilustrativa de tarjeta generica">
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="nombre-tarjeta" class="form-label text-primary">Nombre del titular:</label>
                    <input type="text" class="form-control p-2" id="nombre-tarjeta" placeholder="Escriba el nombre del titular de la tarjeta..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="apellido-tarjeta" class="form-label text-primary">Apellido del titular:</label>
                    <input type="text" class="form-control p-2" id="apellido-tarjeta" placeholder="Escriba el apellido del titular de la tarjeta..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="documento-tarjeta" class="form-label text-primary">Número de documento:</label>
                    <input type="number" class="form-control p-2" id="documento-tarjeta" placeholder="Escriba el número de documento..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="numero-tarjeta" class="form-label text-primary">Número de tarjeta:</label>
                    <input type="number" class="form-control p-2" id="numero-tarjeta" placeholder="Escriba el número de la tarjeta..." required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="fecha-tarjeta" class="form-label text-primary">Fecha de vencimiento:</label>
                    <input type="date" class="form-control p-2" id="fecha-tarjeta" required>
                </div>
                <div class="mb-3 w-75 mx-auto d-block">
                    <label for="codigo-tarjeta" class="form-label text-primary">Código de seguridad:</label>
                    <input type="number" class="form-control p-2" id="codigo-tarjeta" placeholder="Escriba el código de seguridad de la tarjeta..." required>
                </div>
            </form>
            `;
    contenedorFormulario.append(div);
}

cargarFormulario();

// logica del boton cuando se activa la accion de click
botonComprar.addEventListener("click", comprarCarrito);

// Realiza la compra de los productos que estan en el carrito
function comprarCarrito() {
    productosEnCarrito.length = 0;
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));

    contenedorFormulario.classList.add("disabled");
    botonComprar.classList.add("disabled");
    contenedorComprado.classList.remove("disabled");
    contenedorMensaje.classList.remove("disabled");
}