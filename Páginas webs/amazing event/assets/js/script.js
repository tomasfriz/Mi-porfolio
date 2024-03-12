fetch('./assets/amazing.json')
    .then(response => response.json())
    .then(data => {
        let objeto = data;
        const bodyInsert = document.getElementById("bodyInsert")
        function agarrarData(data) {
            if (window.location.href.includes('/index.html') || window.location.href == '') {
                data.events.forEach((element) => InsertarElementos(element))
            } else if (window.location.href.includes('/pastEvents.html')) {
                data.events.forEach((element) => { if (element.date < data.currentDate) { InsertarElementos(element) } })
            } else if (window.location.href.includes('/futureEvents.html')) {
                data.events.forEach((element) => { if (element.date > data.currentDate) { InsertarElementos(element) } })
            }
        }
        agarrarData(objeto);

        //Insercion de elementos
        function InsertarElementos(element) {
            if (bodyInsert != null) {
                bodyInsert.insertAdjacentHTML(
                    "beforeend",
                    `
            <div class="d-inline-block mt-2 ms-2 card border border-danger-subtle bg-danger text-light ${element.category} ${element._id}">
                <img src="${element.image}" class="card-img-top border-bottom border-danger-subtle" alt="${element.name}">
                <div style="height: 60%" class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">${element.name}</h5>
                        <p class="card-text description py-4">${element.description}</p>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between">
                            <a type="button" class="btn btn-info text-light" href="./details.html?id=${element._id}">
                            Learn more
                            </a>
                            <p class="ms-3 py-2 text-center d-block my-auto bg-info rounded w-25 text-light">${element.price}$</p>
                        </div>
                    </div>
                </div>
            </div>
            `
                )
            }
        }

        // Crea filtros
        function crearFiltros(json) {
            let seccionFiltros = document.getElementById("seccion-filtros");
            let filtros = [];
            json.events.forEach(element => {
                let filtro = element.category
                if (!filtros.includes(element.category)) {
                    seccionFiltros.insertAdjacentHTML('beforeend',
                        `<li>
                <input class="filtro" type="checkbox" data-valor="${filtro}" id="${filtro}">
                <label class="pe-3" for="${filtro}">${filtro}</label>
                </li>
                `)
                    filtros.push(filtro)
                }
            });
        }
        crearFiltros(objeto)
        let casillasFiltros = Array.from(document.querySelectorAll(".filtro"))

        //Filtrado
        const Tarjetas = Array.from(document.querySelectorAll(".card"))
        casillasFiltros.forEach(filtro => filtro.addEventListener("change", filtradoTotal))

        function filtradoTotal() {
            let filtroAproved = filtrarCheckbox();
            let filtroAproved2 = filtradoTexto(filtroAproved);
            let idValidas = obetenerIds(filtroAproved2);
            imprimirTarjetas(idValidas)
        }

        function filtrarCheckbox() {
            let filtrosActivos = casillasFiltros.filter(filtro => filtro.checked == true).map((filtro) => { return filtro.id });
            if (!filtrosActivos.length == 0) {
                return Tarjetas.filter((tarjeta) => {
                    let categoriasTarjeta = tarjeta.classList.value;
                    return filtrosActivos.some((filtro) => {
                        return categoriasTarjeta.includes(filtro);
                    });
                });
            } else {
                return Tarjetas;
            }
        }

        function obetenerIds(elementosValidos) {
            return elementosValidos.map(elemento => {
                let clases = elemento.classList;
                let id = clases[clases.length - 1];
                return id;
            })
        }

        function imprimirTarjetas(ids) {
            bodyInsert.innerHTML = ''
            if (ids.length > 0) {
                ids.forEach((id) => {
                    let objetosBuscados = data.events.filter(evento => { return evento._id == id });
                    objetosBuscados.forEach((objetoBuscado) => InsertarElementos(objetoBuscado))
                })
            } else {
                agarrarData(objeto)
            }
        }

        // Filtrado de texto
        const search = document.querySelector("#Search")
        search.addEventListener("keyup", filtradoTotal)

        function filtradoTexto(filtroAproved) {
            let prueba = []
            if (search.value == "") {
                return filtroAproved;
            } else {
                filtroAproved.forEach((tarjeta) => {
                    let contenidoTarjeta = tarjeta.textContent.toLowerCase();
                    let contenidoBusqueda = search.value;
                    if (contenidoTarjeta.includes(contenidoBusqueda)) {
                        prueba.push(tarjeta)
                    }
                })
            }

            if (prueba.length == 0) {
                bodyInsert.innerHTML = ''
                bodyInsert.insertAdjacentHTML(
                    "beforeend",
                    `
                    <section id="NotFound" class="m-auto text-center text-light w-50 shadow rounded p-3 bg-info border border-danger-subtle">
                        <h2 class="fs-1 my-5">No events found<h2>
                        <p class="fs-3 my-5">Try again<p>
                    </section>
                `)
            } else {
                return prueba;
            }
        }

    })
    .catch(error => console.error(error));