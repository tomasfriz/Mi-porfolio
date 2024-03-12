const cacheName = "pwa";

// Instalación
self.addEventListener("install", async e => {
    console.log("sw instalada");

    var cache = await caches.open(cacheName);
    cache.addAll([
        "/index.html",
        "/css/styles.css",
        "/json/productos.json",
        "/js/main.js",
        "/images/logo.webp"
    ]);
});

// Activación
self.addEventListener("activate", (e) => {
    e.waitUntil(
        caches.keys().then(cacheNames => {
            console.log("sw activado");
            return Promise.all(
                cacheNames.map(cache => {
                    if (cache !== cacheName) {
                        return caches.delete(cache);
                    }
                })
            );
        })
    );
});

// Evento fetch
self.addEventListener('fetch', (event) => {
    // Compruebe si se trata de una solicitud de una imagen
    event.respondWith(caches.open(cacheName).then((cache) => {
        // Ir a la caché primero
        return cache.match(event.request.url).then((cachedResponse) => {
            // Devolver una respuesta en caché si tenemos una
            if (cachedResponse) {
                return cachedResponse;
            }

            // De lo contrario, golpea la red.
            return fetch(event.request).then((fetchedResponse) => {
                // Agregue la respuesta de la red al caché para visitas posteriores
                cache.put(event.request, fetchedResponse.clone());

                // Devolver la respuesta de la red
                return fetchedResponse;
            });
        });
    }));
});