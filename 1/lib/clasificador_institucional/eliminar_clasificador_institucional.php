<?php include "../../../connection/connection.php";
      include "lib_clasificador_institucional.php";

      if($conn){

          $oneClasificador = new ClasificadorInstitucional();
          $id = mysqli_real_escape_string($conn,$_POST['id']);

          if($id == ''){
                echo 5; // hay campos sin completar
          }else{
                $oneClasificador->deleteClasificador($id,$conn,$dbase);
          }

      }else{
        echo 13; // SIN CONEXION A LA BASE DE DATOS
      }





?>
