<?php

include "modelo/conexion.php";

//primera fase --> validar si se pulsa el boton subir

if(!empty($_POST["btnSubida"])){

    //echo "<div class='alert alert-info'>Boton presionado</div>";

    //captura de variables
    $imagen = $_FILES["imagen"]["tmp_name"]; //se captura el nombre de variable temporal del archivo.

    $nombreimagen = $_FILES["imagen"]["name"]; //se captura el nombre del archivo real.

    $tipoimagen = strtolower(pathinfo($nombreimagen, PATHINFO_EXTENSION)); //se captura la extension del archivo.

    $sizeimagen = $_FILES["imagen"]["size"]; //se captura el tamaño del archivo.

    $directorio = "archivos/";




    //se valida la extension si el archivo es de imagen

    if(($tipoimagen == "jpg") or ($tipoimagen == "jpeg") or ($tipoimagen == "png")){

        //almacena generando el id automatica pero sin almacenar la ruta

        $sube = $conexion->query("INSERT INTO img(foto) VALUES ('')");

        $idRegistro = $conexion->insert_id;

        $ruta = $directorio.$idRegistro.".".$tipoimagen;

        //se realiza una actualizacion para agregar la ruta como tal

        $actualizarimagen = $conexion->query("UPDATE img SET foto = '$ruta' WHERE idimg = '$idRegistro'");


        //almacenando nuestro archivo en el servidor

        if(move_uploaded_file($imagen, $ruta)){

            echo "<div class='alert alert-success'>Imagen subida Correctamente.</div>";

        }else{

            echo "<div class='alert alert-danger'>Error al subir la imagen</div>";

        }

    }else{

        echo "<div class='alert alert-success'>No se acepta formato diferentes a jpg - jpeg - png</div>";

    }



}