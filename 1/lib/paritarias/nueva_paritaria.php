<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $grupo_representante = mysqli_real_escape_string($conn,$_POST['grupo_representante']);
      $tipo_representacion = mysqli_real_escape_string($conn,$_POST['tipo_representacion']);
      $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
      $fecha_reunion = mysqli_real_escape_string($conn,$_POST['fecha_reunion']);     
      $resumen_reunion = mysqli_real_escape_string($conn,$_POST['resumen_reunion']); 
      
                  
      // se verifica que los datos no estén vacios
      if(($grupo_representante == '') ||
            ($tipo_representacion == '') ||
                ($organismo == '') ||
                ($fecha_reunion == '') ||
                    ($resumen_reunion == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $paritaria->addParitaria($paritaria,$grupo_representante,$tipo_representacion,$organismo,$fecha_reunion,$resumen_reunion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
