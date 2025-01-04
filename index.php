<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Practica Crud de imagenes</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center p-5">Crud de subida de imagenes en php.</h1>

        <?php

            require "modelo/conexion.php";
            include "controlador/controlador_subir.php";
            $sql= $conexion->query("SELECT * FROM img");

        ?>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Subir Archivo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control mb-2" type="file" id="formFile" name="imagen">
                    <input type="submit" value="subida" name="btnSubida" class="btn btn-success form-control">
                </form>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FOTO</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            while($datos = $sql->fetch_object()){

                            ?>
                            <tr>
                            <th scope="row"><?= $datos->idimg ?></th>
                            <td><img src="<?= $datos->foto ?>" width="80" alt=""></td>
                            <td>
                                <a href="" class="btn btn-warning">Editar</a>
                                <a href="" class="btn btn-danger">Eliminar</a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>