<?php include "../../../connection/connection.php";
      include "lib_clasificador_institucional.php";

      if($conn){

          $oneClasificador = new ClasificadorInstitucional();
          $id = mysqli_real_escape_string($conn,$_POST['id']);
          $cod_clasificador = mysqli_real_escape_string($conn,$_POST['cod_clasificador']);
          $descripcion = mysqli_real_escape_string($conn,$_POST['clasificador_descripcion']);

          if(($id == '') || ($cod_clasificador == '') || ($descripcion == '')){
                echo 5; // hay campos sin completar
          }else{
                $oneClasificador->updateClasificador($oneClasificador,$id,$cod_clasificador,$descripcion,$conn,$dbase);
          }

      }else{
        echo 13; // SIN CONEXION A LA BASE DE DATOS
      }





?>
