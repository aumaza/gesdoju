<?php include "../../../connection/connection.php";
      include "../lib_system.php";
      include "lib_jurisdicciones.php";
      
           
      if($conn){
      //creamos el objeto
      $my_jurisdiccion = new Jurisdicciones();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $cod_jur = mysqli_real_escape_string($conn,$_POST['cod_jur']);
      $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
           
      // pasar a mayusculas
      $cod_jur = strtoupper($cod_jur);
      $descripcion = strtoupper($descripcion);
            
      // se verifica que los datos no estén vacios
      if(($cod_jur == '') ||
            ($descripcion == '') ||
                ($id == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $my_jurisdiccion->updateJurisdiccion($my_jurisdiccion,$id,$cod_jur,$descripcion,$conn);
    }
    }else{
        echo 13; //error de conexion
    }





?>
