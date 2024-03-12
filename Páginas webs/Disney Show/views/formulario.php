    <div class="d-flex justify-content-center text-center p-5">
        <h1 class="mb-2 fw-bold">Contactanos para consultar y/o comprar peliculas y series de disney</h1>
    </div>
    <form class="d-flex flex-column justify-content-center align-items-center" action="./gracias.php" method="GET">
    <div class="mb-3 w-50">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" class="form-control border-info" id="name" placeholder="nombre" minlength="2" required>
    </div>
    <div class="mb-3 w-50">
        <label for="lastname" class="form-label">Apellido:</label>
        <input type="text" class="form-control border-info" id="lastname" placeholder="apellido" minlength="2" required>
    </div>
    <div class="mb-3 w-50">
        <label for="email" class="form-label">Mail:</label>
        <input type="email" class="form-control border-info" id="email"
        placeholder="ejemplo@gmail.com" minlength="2" required>
    </div>
    <div class="mb-3 w-50">
        <label for="phone" class="form-label">Telefono:</label>
        <input type="number" class="form-control border-info" id="phone"
        placeholder="54-11-2345-6789 (sin guiones)" minlength="2" required>
    </div>
    <div class="mb-3 w-50">
        <label for="consultation" class="form-label">Consulta:</label>
        <textarea class="form-control border-info" id="consultation" placeholder="Mensaje..." rows="3" minlength="2"></textarea>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <button class="btn btn-success boton my-3" type="submit">Enviar</button>
    </div>
    </form>