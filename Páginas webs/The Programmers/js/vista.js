fetch("/json/productos.json")
    .then(response => response.json())
    .then(data => {
        producto = data
        cargarDetalle(producto);
    })
    .catch(error => console.error(error));

const contenedorProducto = document.querySelector("#contenedor-producto");
let botonesAgregar = document.querySelectorAll(".producto-agregar");
const numerito = document.querySelector("#numerito");
const url = new URL(window.location.href);
const id = url.searchParams.get('id');

// Carga la informacion detallada del producto y genera la vista del mismo.
function cargarDetalle(productosElegidos) {

    contenedorProducto.innerHTML = "";

    productosElegidos.forEach(producto => {
        if (producto.id == id) {
            const div = document.createElement("div");
            div.classList.add("producto");
            div.innerHTML = `
        <div class="d-flex w-100">
            <div class="row shadow rounded p-3 border border-primary bg-light">
                <div class="mx-3 mx-auto my-auto col">
                    <img src="${producto.imagen}" alt="imagen ilustrativa del curso ${producto.titulo}" class="w-100 img-fluid border border-primary">
                </div>
                <section class="d-flex text-primary flex-column g-2 col-sm-8 producto-titulo">
                    <h2 class="mb-3">${producto.titulo}</h2>
                    <p class="mb-3">${producto.descripcion}</p>
                    <section class="mb-3">
                        <i class="bi d-inline bi-person-check-fill"></i>
                        <p class="d-inline fw-bold">Categoría:</p>
                        <p class="d-inline">${producto.categoria}</p>
                    </section>
                    <section class="mb-5">
                        <i class="bi bi-cash-stack"></i>
                        <p class="d-inline fw-bold">Precio:</p>
                        <p class="d-inline">$${producto.precio}</p>
                    </section>
                <button class="producto-agregar" id="${producto.id}">Agregar al carrito</button>
                </section>
            </div>
        </div>
        `;
            contenedorProducto.append(div);
        }
    })
    actualizarBotonesAgregar();
}

// Actualiza los botones una vez agregado el producto al carrito
function actualizarBotonesAgregar() {
    botonesAgregar = document.querySelectorAll(".producto-agregar");
    botonesAgregar.forEach(boton => {
        boton.addEventListener("click", agregarAlCarrito);
    });
}

// logica del contador de productos que hay en el carrito
let productosEnCarrito;
let productosEnCarritoLS = localStorage.getItem("productos-en-carrito");
if (productosEnCarritoLS) {
    productosEnCarrito = JSON.parse(productosEnCarritoLS);
    actualizarNumerito();
} else {
    productosEnCarrito = [];
}

// Agrega el producto al carrito, agrega el producto al localStorage y suma la cantidad de productos que estan en el carrito a 1 el contador
function agregarAlCarrito(e) {
    const idBoton = e.currentTarget.id;
    const productoAgregado = producto.find(prod => prod.id === idBoton);

    if (productosEnCarrito.some(prod => prod.id === idBoton)) {
        const index = productosEnCarrito.findIndex(prod => prod.id === idBoton);
        productosEnCarrito[index].cantidad++;
    } else {
        productoAgregado.cantidad = 1;
        productosEnCarrito.push(productoAgregado);
    }

    actualizarNumerito();
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
}

// Actualiza el numero del contador del carrito
function actualizarNumerito() {
    let nuevoNumerito = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numerito.innerText = nuevoNumerito;
}