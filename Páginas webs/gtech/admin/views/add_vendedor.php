<?php

require_once "../function/autoload.php";


$vendedores = (new Vendedor())->datosVendedor();


?>

<div id="conenedor_formulario" class="row my-5 m-auto">
    <div class="col p-0 flex-column align-items-center">
        <h1 id="admin_titule" class="text-center mb-5 fw-bold">Agregar vendedor</h1>
        <div class="row m-0 mb-5 d-flex align-items-center">

            <form id="formulario" action="actions/add_vendedor_acc.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre y Apellido</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="foto_perfil" class="form-label">Foto de perfil</label>
                    <input class="form-control" type="file" name="foto_perfil" id="foto_perfil" accept="image/*" required>
                </div>
                <div class="mb-3">

                    <label for="valoracion" class="form-label">Valoración</label>
                    <select class="form-select" name="valoracion" id="valoracion">
                        <option value="" selected disabled>Elija una opción</option>
                        <option value="Muy malo">Muy malo</option>
                        <option value="Malo">Malo</option>
                        <option value="Bueno">Bueno</option>
                        <option value="Muy bueno">Muy bueno</option>
                        <option value="Exelente">Exelente</option>
                    </select>

                </div>
                <button type="submit" class="d-block btn mt-5 m-auto"> Agregar poducto </button>
            </form>
        </div>
    </div>

</div>