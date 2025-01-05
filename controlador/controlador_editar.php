<?php

include "modelo/conexion.php";

//primera fase --> validar si se pulsa el boton subir

if(!empty($_POST["btnEditar"])){

    //echo "<div class='alert alert-info'>Boton presionado</div>";

    //captura de variables

    $id = $_POST["id"]; //valor del id enviado por el metodo post
    $nombre = $_POST["nombre"]; //igual anterior. estos datos vienen ocultos.
    $imagen = $_FILES["imagen"]["tmp_name"]; //se captura el nombre de variable temporal del archivo.
    $nombreimagen = $_FILES["imagen"]["name"]; //se captura el nombre del archivo real.
    $tipoimagen = strtolower(pathinfo($nombreimagen, PATHINFO_EXTENSION)); //se captura la extension del archivo.
    $sizeimagen = $_FILES["imagen"]["size"]; //se captura el tamaño del archivo.
    $directorio = "archivos/";


    //se valida la extension si el archivo es de imagen

    if(is_file($imagen)){ //si es un archivo lo que se almacena en la variable imagen dejalo pasar
        if(($tipoimagen == "jpg") or ($tipoimagen == "jpeg") or ($tipoimagen == "png")){
            //eliminamos la imagen anterior
            try {
                unlink($nombre); //elimina la imagen del servidor.
            } catch (\Throwable $th) {
                //throw $th;
            }

            $ruta = $directorio.$id.".".$tipoimagen; //creamos la ruta para subir el archivo.

            if(move_uploaded_file($imagen, $ruta)){

                $editar = $conexion->query("UPDATE img SET foto = '$ruta' WHERE idimg = '$id'");

                if($editar){
                    echo "<div class='alert alert-success'>Imagen subida Correctamente.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Error al editar la imagen</div>";
                }
                
            }else{
    
                echo "<div class='alert alert-danger'>Error al subir la imagen</div>";
    
            }

    }else{

        echo "<div class='alert alert-success'>No se acepta formato diferentes a jpg - jpeg - png</div>";

    }
    }else{
        echo "<div class='alert alert-info'>Debe seleccionar una imagen</div>";
    }


}