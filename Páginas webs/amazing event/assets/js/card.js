fetch('./assets/amazing.json')
    .then(response => response.json())
    .then(data => {
        const urlObject = new URL(window.location.href)
        const idObjeto = urlObject.searchParams.get('id')

        let bodyInsert = document.getElementById("Contenedor")

        function InsertarElementos(id) {
            if (bodyInsert != null) {
                data.events.forEach((event) => {
                    if (event._id == id) {
                        bodyInsert.insertAdjacentHTML("beforeend", `
                        <div class="my-5 d-flex flex-column w-75">
                                <div class="row shadow rounded d-flex p-3 border border-danger-subtle bg-info">
                                    <div class="w-100 mx-3 mx-auto my-auto col">
                                        <img src="${event.image}" alt="Illustatrive image" class="w-100 rounded border border-danger-subtle">
                                    </div>
                                    <section class="d-flex text-light flex-column g-2 col-sm-8">
                                        <h2>${event.name}<span class="badge fs-6 ms-2 bg-danger">${event.date}</span></h2>
                                        <p>${event.description}</p>
                                        <section>
                                            <i class="bi bi-cash-stack"></i>
                                            <p class="d-inline fw-bold">Price:</p>
                                            <p class="d-inline">${event.price}</p>
                                        </section>
                                        <section>
                                            <i class="bi bi-geo-alt-fill"></i>
                                            <p class="d-inline fw-bold">Location:</p>
                                            <p class="d-inline">${event.place}</p>
                                        </section>
                                        <section>
                                            <i class="bi d-inline bi-person-check-fill"></i>
                                            <p class="d-inline fw-bold">Capacity:</p>
                                            <p class="d-inline">${event.capacity}</p>
                                        </section>
                                        <section>
                                            <i class="bi bi-person-fill"></i>
                                            <p class="d-inline fw-bold">${event.estimate == null ? 'Assistance' : 'Estimate'}</p>
                                            <p class="d-inline">${event.estimate != null ? event.estimate : event.assistance}</p>
                                        </section>
                                    </section>
                                </div>
                            <a class="btn btn-danger my-5 shadow text-light" href="./index.html">Back Home</a>
                        </div>
                        `
                        )
                    }
                })
            }
        }

        InsertarElementos(idObjeto)
    })
    .catch(error => console.error(error));