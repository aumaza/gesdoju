<?php include "../../../connection/connection.php";
      include "lib_clasificador_institucional.php";

      if($conn){

          $oneClasificador = new ClasificadorInstitucional();

          $cod_clasificador = mysqli_real_escape_string($conn,$_POST['cod_clasificador']);
          $clasificador_descripcion = mysqli_real_escape_string($conn,$_POST['clasificador_descripcion']);

          if(($cod_clasificador == '') || ($clasificador_descripcion == "")){
                echo 5; // hay campos sin completar
          }else{
                $oneClasificador->addClasificador($oneClasificador,$cod_clasificador,$clasificador_descripcion,$conn,$dbase);
          }

      }else{
        echo 13; // SIN CONEXION A LA BASE DE DATOS
      }





?>
