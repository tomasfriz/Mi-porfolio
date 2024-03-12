<?php 
$vendedores = (new Vendedor())->datosVendedor();
?>

<div class="row m-0">
    <div class="col">

        <h1 id="admin_titule" class="text-center mb-5 fw-bold">Administración de Vendedores</h1>
        <div class="row m-0 mb-5 d-flex justify-content-center">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Foto_perfil</th>
                        <th scope="col">valoriación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($vendedores as $vendedor) { ?>
                        <tr>
                            <td><?= $vendedor->getId() ?></td>
                            <td><?= $vendedor->getNombre()  ?></td>
                            <td><img class="rounded-circle" src="../recursos/imagenes/<?= $vendedor->getFoto()  ?>" alt="<?= $vendedor->getNombre()  ?>"></td>
                            <td><?= $vendedor->getValoracion()  ?></td>
                            <td>
                                <a href="index.php?seccion=edit_vendedor&id=<?= $vendedor->getId() ?>" role="button" class="d-block btn btn-sm  mb-1">Editar</a>
                                <a href="index.php?seccion=delete_vendedor&id=<?= $vendedor->getId() ?>" role="button" class="d-block btn btn-sm ">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?seccion=add_vendedor" class="d-block btn btn-lg mt-5"> Sumar nuevo vendedor</a>
        </div>


    </div>
</div>