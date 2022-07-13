<?php include "../../../connection/connection.php";
      include "../system/lib_system.php";
      include "lib_jurisdicciones.php";
      
           
      if($conn){
      //creamos el objeto
      $my_jurisdiccion = new Jurisdicciones();
      
      // captura de datos
        $cod_jur = mysqli_real_escape_string($conn,$_POST['cod_jur']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        
      
      // pasar a mayusculas
      $cod_jur = strtoupper($cod_jur);
      $descripcion = strtoupper($descripcion);
            
      // se verifica que los datos no estén vacios
      if(($cod_jur == '') ||
            ($descripcion == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $my_jurisdiccion->addJurisdiccion($my_jurisdiccion,$cod_jur,$descripcion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
