<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      include "../system/lib_system.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
         
                  
      // se verifica que los datos no estén vacios
      if(($descripcion == '')){
            echo 5; // hay campos vacios
                    
    }else{
        $paritaria->addTipoRepresentacion($paritaria,$descripcion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
