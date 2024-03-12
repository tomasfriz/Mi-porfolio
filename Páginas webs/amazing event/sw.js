const cacheName = "pwa";

// Instalación
self.addEventListener("install", async e => {
    console.log("sw intalada");

    var cache = await caches.open(cacheName);
    cache.addAll([
        "./index.html",
        "./assets/css/styles.css",
        "./assets/amazing.json",
        "./assets/js",
        "./assets/images/144x144.png"
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
self.addEventListener("fetch", (e) => {
    e.respondWith(fetch(e.request)
        .catch(() => caches.match(e.request))
    );
});