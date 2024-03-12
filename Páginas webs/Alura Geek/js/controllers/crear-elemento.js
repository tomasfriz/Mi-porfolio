/*crea todos los elementos de la CardProducto*/
const cardProducto = (producto) => {
    const card = `
        <div class="producto__venta-img">
            <img src="${producto.imagen}" alt="">
        </div>
        <h3 class="producto__venta-titulo">${producto.nombre}</h3>
        <h4 class="producto__venta-precio">$ ${producto.precio}</h4>
        <a class="producto__venta-link" href="producto.html?id=${producto.id}">Ver producto</a>`;

    const divCard = document.createElement("div");
    divCard.classList.add("productos__venta-articulo");
    divCard.id = producto.id;
    divCard.innerHTML = card;
    return divCard;
}

const mostrarProducto = (producto) => {
    const productoDiv = document.querySelector(".producto");

    const datosProducto = `
            <div class="producto__imagen">
                <img src="${producto.imagen}" alt="">
            </div>
            <div class="producto__texto">
                <h3 class="producto__titulo">${producto.nombre}</h3>
                <h4 class="producto__valor">$${producto.precio}</h4>
                <p class="producto__descripcion">${producto.descripcion}
                </p>
                <div class="producto__modificar">
                    <i class="fa-solid fa-pen-to-square" id="producto__modificar"></i>
                <i class="fa-solid fa-trash-can" id="producto__borrar"></i>
                </div>
            </div>`;
    productoDiv.innerHTML = datosProducto;
}

export const crearElementos = {
    cardProducto,
    mostrarProducto
}