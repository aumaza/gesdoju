<?php include "../../../connection/connection.php";
      include "lib_tipo_norma.php";
      
           
      if($conn){
      //creamos el objeto
      $obj_tipo_norma = new TipoNorma();
      
      // captura de datos
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        
                  
      // se verifica que los datos no estén vacios
      if($descripcion == ''){
        echo 5; // hay campos vacios
                    
    }else{
        $obj_tipo_norma->addTipoNorma($obj_tipo_norma,$descripcion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
