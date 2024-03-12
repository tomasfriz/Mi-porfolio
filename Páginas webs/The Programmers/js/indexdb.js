let db;

function createIndexDB(productos) {
    const request = window.indexedDB.open('The Programmers', 1);

    // Manejo de eventos
    request.onerror = (e) => {
        console.error(`IndexedDB error: ${request.errorCode}`);
    };

    request.onsuccess = (e) => {
        console.info('Conexión exitosa a la base de datos');
        db = e.target.result;
        addCursos(productos);
    };

    request.onupgradeneeded = (e) => {

        console.info('Base de datos creada');

        const db = e.target.result;

        const objectStore = db.createObjectStore('cursos', {
            keyPath: "id"
        })

        // Indexacion
        objectStore.createIndex('id', 'id', { unique: true });
        objectStore.createIndex('titulo', 'titulo', { unique: false });
        objectStore.createIndex('imagen', 'imagen', { unique: false });
        objectStore.createIndex('categoria', 'categoria', { unique: false });
        objectStore.createIndex('descripcion', 'descripcion', { unique: false });
        objectStore.createIndex('precio', 'precio', { unique: false });

        // Transaccion completada
        objectStore.transaction.oncompleted = (e) => {
            console.log('El objeto "cursos" se a creado');
        }
    };
}

// Agrega los cursos que son pasados por parametros
function addCursos(cursos) {
    const transaction = db.transaction("cursos", "readwrite");

    // Transaccion completada
    transaction.oncomplete = function (e) {
        console.log('El curso se agrego correctamente');
    }
    transaction.onerror = function (e) {
        console.log('No se pudo agregar el curso');
    }

    const objectStore = transaction.objectStore("cursos");

    for (const curso of cursos) {
        const request = objectStore.add(curso);
        // Se agregan los cursos
        request.onsuccess = function (e) {
            console.log('El curso se agrego correctamente');
        }
        request.onerror = function (e) {
            console.log('No se pudo agregar el curso');
        }
    }
}