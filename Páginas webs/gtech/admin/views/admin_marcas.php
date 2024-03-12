<?php
$marcas = (new Marcas())->obtener_marcas();
?>

<div class="row m-0">
    <div class="col">

        <h1 id="admin_titule" class="text-center mb-5 fw-bold">Administración de Marcas</h1>
        <div class="row m-0 mb-5 d-flex flex-column align-items-center">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marca</th>
                        <th scope="col" width="40%">Editar</th>
                        <th scope="col" width="20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($marcas as $marca) { ?>
                        <tr>
                            <td><?= $marca->getId() ?></td>
                            <td><?= $marca->getNombre()  ?></td>
                            <td>
                                <form class="col-6" action="actions/edit_marca_acc.php?id=<?= $marca->getId()  ?>" method="post">
                                    <input class="form-control" type="text" name="marca" id="marca">
                                    <button class="btn w-100 mt-2" type="submit">Editar marca</button>
                                </form>
                            </td>
                            <td>
                                <a href="actions/delete_marca_acc.php?id=<?= $marca->getId() ?>" role="button" class="d-block btn btn-sm ">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>

                </tbody>
            </table>
            <form class="col-6" action="actions/add_marca_acc.php" method="post">
                <label class="form-label" for="marca">Marca</label>
                <input class="form-control" type="text" name="marca" id="marca">
                <button class="btn d-block m-auto mt-2" type="submit">Agregar marca</button>
            </form>
        </div>


    </div>
</div>