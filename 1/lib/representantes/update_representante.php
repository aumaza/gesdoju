<?php include "../../../connection/connection.php";
      include "lib_representantes.php";
      
           
      if($conn){
      //creamos el objeto
      $representante = new Representantes();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $nombre_representante = mysqli_real_escape_string($conn,$_POST['nombre_representante']);
      $dni_representante = mysqli_real_escape_string($conn,$_POST['dni_representante']);
      $email_representante = mysqli_real_escape_string($conn,$_POST['email_representante']);
      // pasar a mayusculas
      $nombre_representante = strtoupper($nombre_representante);
            
      // se verifica que los datos no estén vacios
      if(($nombre_representante == '') ||
            ($dni_representante == '') ||
                ($id == '') ||
                  ($email_representante == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $representante->updateRepresentante($id,$representante,$nombre_representante,$dni_representante,$email_representante,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
