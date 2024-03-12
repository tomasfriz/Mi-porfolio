let games = [
    {
        "id": 1,
        "titulo": "Assassin's Creed Odyssey",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 2,
        "titulo": "GTA V",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 3,
        "titulo": "Red Dead Redemption 2",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 4,
        "titulo": "Detroit: Become Human",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 5,
        "titulo": "Minecraft",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 6,
        "titulo": "God Of War",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 7,
        "titulo": "Until Dawn",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 8,
        "titulo": "Need For Speed",
        "categoria": "PS4",
        "precio": 2000
    },
    {
        "id": 9,
        "titulo": "Battlefield 2042",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 10,
        "titulo": "Call Of Duty",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 11,
        "titulo": "Elden Ring",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 12,
        "titulo": "Spider Man",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 13,
        "titulo": "Death Stranding",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 14,
        "titulo": "Hogwarts: Legacy",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 15,
        "titulo": "Demon Slayer",
        "categoria": "PS5",
        "precio": 4000
    },
    {
        "id": 16,
        "titulo": "Horizon Forbidden West",
        "categoria": "PS5",
        "precio": 4000
    },
];


let db;
const request = window.indexedDB.open('GameShop', 1);

// Manejo de eventos
request.onerror = (e) => {
    console.error(`IndexedDB error: ${request.errorCode}`);
};

request.onsuccess = (e) => {
    console.info('Conexión exitosa a la base de datos');
    db = e.target.result;

    addJuegos(games);
};

request.onupgradeneeded = (e) => {

    console.info('Base de datos creada');

    const db = e.target.result;

    const objectStore = db.createObjectStore('juegos', {
        keyPath: "id"
    })

    // Indexacion
    objectStore.createIndex('id', 'id', { unique: true });
    objectStore.createIndex('titulo', 'titulo', { unique: false });
    objectStore.createIndex('categoria', 'categoria', { unique: false });
    objectStore.createIndex('precio', 'precio', { unique: false });

    // Transaccion completada
    objectStore.transaction.oncompleted = (e) => {
        console.log('El objeto "juegos" se a creado');
    }
};

// Agrega juegos que son pasados por parametros
function addJuegos(juegos) {
    const transaction = db.transaction("juegos", "readwrite");

    // Transaccion completada
    transaction.oncomplete = function (e) {
        console.log('El juego se a agregado correctamente');
    }
    transaction.onerror = function (e) {
        console.log('No se pudo agregar el juego');
    }

    const objectStore = transaction.objectStore("juegos");

    for (const juego of juegos) {
        const request = objectStore.add(juego);
        // Se agregan los juegos
        request.onsuccess = function (e) {
            console.log('El juego se agrego correctamente');
        }
        request.onerror = function (e) {
            console.log('No se pudo agregar el juego');
        }
    }
}