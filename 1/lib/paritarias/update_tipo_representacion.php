<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      include "../system/lib_system.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
         
                  
      // se verifica que los datos no estén vacios
      if(($descripcion == '') || ($id == '')){
            echo 5; // hay campos vacios
                    
    }else{
        $paritaria->updateTipoRepresentacion($paritaria,$id,$descripcion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
