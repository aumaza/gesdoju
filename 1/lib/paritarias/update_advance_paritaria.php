<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $fecha_reunion = mysqli_real_escape_string($conn,$_POST['fecha_reunion']);     
      $resumen = mysqli_real_escape_string($conn,$_POST['resumen']);
           
                  
      // se verifica que los datos no estén vacios
      if(($id == '') ||
          ($fecha_reunion == '') ||
           ($resumen == '')){
          echo 5; // hay campos vacios
                    
    }else{
        $paritaria->updateAvanceParitaria($paritaria,$id,$fecha_reunion,$resumen,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
