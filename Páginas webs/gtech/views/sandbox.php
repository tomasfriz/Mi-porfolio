<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Probando cosas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <div class="col">
                <?PHP

                    (new Productos())->obtener_productos();
                    echo "<pre>";
                    print_r($_SESSION);
                    echo "</pre>";
                    echo (new Productos())->obtener_productos();
                    //(new Alerta())->clear_alertas();
                ?>
            </div>
        </div>
    </div>
</div>