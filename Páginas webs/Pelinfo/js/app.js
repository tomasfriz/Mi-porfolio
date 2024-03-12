const app = new Vue({
    el: "#app",

    vuetify: new Vuetify(),

    data: {
        peliculas: [],
        filtroGenero: "",
        favoritos: [],
        buscar: "",
        ids: [],
        dialog: false,
        generos: ['', 'Accion', 'Ciencia Ficcion', 'Fantasia', 'Drama', 'Aventura', 'Horror', 'Guerra', 'Misterio'],
        titulo: "",
        descripcion: "",
        lanzamiento: "",
        genero: "",
    },

    created() {
        fetch('/data.json')
            .then(response => response.json())
            .then(response => {
                for (const pelicula of response) {
                    this.peliculas.push({
                        id: pelicula.id,
                        poster: `https://www.themoviedb.org/t/p/w600_and_h900_bestv2${pelicula.poster_path}`,
                        titulo: pelicula.title,
                        descripcion: pelicula.overview,
                        lanzamiento: pelicula.release_date,
                        genero: pelicula.genre
                    })
                }
            })
            .catch(err => console.error(err))
    },
    methods: {
        abrirModal(pelicula) {
            this.dialog = true;
            this.titulo = pelicula.titulo;
            this.descripcion = pelicula.descripcion;
            this.lanzamiento = pelicula.lanzamiento;
            this.genero = pelicula.genero;
        },

        leerStorage() {
            let peliculas = localStorage.getItem("favoritos"),
                pelicula = JSON.parse(peliculas);
            for (const json of pelicula) {
                this.ids.push(json.id)
                console.log(json.id);
            }
        },
        guardarStorageFavoritos(id, poster, titulo, descripcion, lanzamiento, genero) {

            if (localStorage["favoritos"] == null) {
                let pelis = [];
                pelis.push({
                    "id": id,
                    "poster": poster,
                    "titulo": titulo,
                    "descripcion": descripcion,
                    "lanzamiento": lanzamiento,
                    "genero": genero
                });

                localStorage.setItem("favoritos", JSON.stringify(pelis));

            } else {
                let pelis = localStorage.getItem("favoritos");
                pelis = JSON.parse(pelis);

                for (const peli of pelis) {

                    if (peli.id === id) {

                        pelis = JSON.stringify(pelis);
                        localStorage.setItem("favoritos", pelis)

                        return;

                    }
                }
                pelis.push({
                    "id": id,
                    "poster": poster,
                    "titulo": titulo,
                    "descripcion": descripcion,
                    "lanzamiento": lanzamiento,
                    "genero": genero
                });
                pelis = JSON.stringify(pelis);
                localStorage.setItem("favoritos", pelis)
            }
        },
        filtro(item) {
            var estado = true;

            if (item.genero.toLowerCase().indexOf(this.filtroGenero.toLowerCase()) < 0) {
                estado = false;
            }
            else if (item.titulo.toLowerCase().indexOf(this.buscar.toLowerCase()) < 0) {
                estado = false;
            }

            return estado;
        }
    }
})
