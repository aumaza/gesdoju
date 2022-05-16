<?php include "../../../connection/connection.php";
      include "../lib_system.php";
      include "lib_ambito_norma.php";
      
           
      if($conn){
      //creamos el objeto
      $obj_ambito_norma = new AmbitoNorma();
      
      // captura de datos
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        
                  
      // se verifica que los datos no estén vacios
      if($descripcion == ''){
        echo 5; // hay campos vacios
                    
    }else{
        $obj_ambito_norma->addAmbitoNorma($obj_ambito_norma,$descripcion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
