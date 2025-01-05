<?php

include "modelo/conexion.php";

if(!empty($_GET["id"]) and !empty($_GET["nombre"])){
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];

    try {
        unlink($nombre);
    } catch (\Throwable $th) {
        //throw $th;
    }

    $eliminar= $conexion->query("DELETE  from img WHERE idimg = '$id' ");

    if($eliminar){
        echo "<div class='alert alert-success'>Imagen fue eliminada con exito.</div>";
    }else{
        echo "<div class='alert alert-danger'>Error al eliminar.</div>";
    } ?>

    <script>
        history.replaceState(null, null, location.pathname);
    </script>
<?php } ?>