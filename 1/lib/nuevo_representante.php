<?php include "../../connection/connection.php";
      include "lib_representantes.php";
      
           
      if($conn){
      //creamos el objeto
      $representante = new Representantes();
      
      // captura de datos
      $nombre_representante = mysqli_real_escape_string($conn,$_POST['nombre_representante']);
           
      // pasar a mayusculas
      $nombre_representante = strtoupper($nombre_representante);
            
      // se verifica que los datos no estén vacios
      if(($nombre_representante == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $representante->addRepresentante($representante,$nombre_representante,$conn);
    }
    }else{
        echo 13; //error de conexion
    }





?>