function Almacenamiento(a, b) {
    let storage = {
    }

    function resetear() {
        storage = {}
        console.log("El backup se borro con exito");
    }

    function agregar(a, b) {
        storage[a] = b
        console.log("Se creo el backup con exito");
    }

    function leer(a) {
        return storage[a]
    }

    return {
        resetear,
        agregar,
        leer,
    }
}

// Instanciar el objeto anteponiendo "new"
const backup = new Almacenamiento()