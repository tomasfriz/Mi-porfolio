let productos = [];

fetch("/json/productos.json")
    .then(response => response.json())
    .then(data => {
        productos = data;
        cargarProductos(productos);
        createIndexDB(productos);
    })
    .catch(error => console.error(error));

const contenedorProductos = document.querySelector("#contenedor-productos");
const botonesCategorias = document.querySelectorAll(".boton-categoria");
const tituloPrincipal = document.querySelector("#titulo-principal");
const numerito = document.querySelector("#numerito");

// Carga los productos disponibles del archivo json y genera la vista del producto
function cargarProductos(productosElegidos) {

    contenedorProductos.innerHTML = "";

    productosElegidos.forEach(producto => {

        const div = document.createElement("div");
        div.classList.add("producto");
        div.innerHTML = `
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="${producto.imagen}" alt="${producto.titulo}">
                <div class="card-body">
                    <h2 class="card-title producto-titulo text-primary">${producto.titulo}</h2>
                    <p class="producto-precio text-primary">$${producto.precio}</p>
                    <a class="producto-vista" href="/vista.html?id=${producto.id}">Ver Más</a>
                </div>
            </div>
        `;
        contenedorProductos.append(div);
    })
}

// logica del filtrado de los productos por categoria
botonesCategorias.forEach(boton => {
    boton.addEventListener("click", (e) => {

        botonesCategorias.forEach(boton => boton.classList.remove("active"));
        e.currentTarget.classList.add("active");

        if (e.currentTarget.id != "todos") {
            const productoCategoria = productos.find(producto => producto.categoria === e.currentTarget.id);
            tituloPrincipal.innerText = productoCategoria.categoria;
            const productosBoton = productos.filter(producto => producto.categoria === e.currentTarget.id);
            cargarProductos(productosBoton);
        } else {
            tituloPrincipal.innerText = "Todos los productos";
            cargarProductos(productos);
        }

    })
});

// logica del contador de productos que hay en el carrito
let productosEnCarrito;
let productosEnCarritoLS = localStorage.getItem("productos-en-carrito");
if (productosEnCarritoLS) {
    productosEnCarrito = JSON.parse(productosEnCarritoLS);
    actualizarNumerito();
} else {
    productosEnCarrito = [];
}

// Actualiza el numero del contador del carrito
function actualizarNumerito() {
    let nuevoNumerito = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numerito.innerText = nuevoNumerito;
}