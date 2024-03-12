
/*const url = "http://localhost:3000/productos_alurageek"*/

const url = "https://json-alurageek-challenge.herokuapp.com/productos_alurageek"

const listaProductos = () => fetch(`${url}`).then((respuesta) => respuesta.json()).catch((error) => error);

const agregarProducto = (imagen, seccion, nombre, precio, descripcion) => {
    return fetch((`${url}`), {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            nombre,
            precio,
            descripcion,
            imagen,
            seccion/*,
            id:uuid.v4()*/
        })
    })
}

const verProducto = (id) => fetch(`${url}/${id}`).then((respuesta) => respuesta.json()).catch((error) => error);

const modificarProducto = (imagen, seccion, nombre, precio, descripcion, id) => fetch(`${url}/${id}`, {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ imagen, nombre, seccion, precio, descripcion })
}).then((respuesta) => respuesta).catch((error) => error);

const borrarProducto = (id) => fetch(`${url}/${id}`, {
    method: "DELETE"
})
    .then((respuesta) => respuesta)
    .catch((error) => error);

const productosSimilares = (seccion) => fetch(`${url}?seccion=${seccion}`)
    .then((respuesta) => respuesta.json())
    .catch((error) => error)

/*busca una lista de 6 productos de una seccion,
los ordena descendentemente, */
const seisProductosSeccion = (seccion) => fetch(`${url}?seccion=${seccion}&_sort=id&_order=desc&_limit=6`)
    .then((respuesta) => respuesta.json())
    .catch((error) => error)

const buscarSearch = (palabra) => fetch(`${url}?nombre_like=${palabra}`)
    .then((respuesta) => respuesta.json())
    .catch((error) => error)

export const clienteService = {
    listaProductos,
    agregarProducto,
    verProducto,
    modificarProducto,
    borrarProducto,
    productosSimilares,
    seisProductosSeccion,
    buscarSearch
}

/*const buscarInput = (palabra) => fetch(`http://localhost:3000/productos_alurageek?seccion=Starwar&_sort=id&_order=desc`).then((resultado) => resultado.json()).catch((error) => error)*/