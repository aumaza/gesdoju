<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      include "../system/lib_system.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $paritaria_id = mysqli_real_escape_string($conn,$_POST['paritaria_id']);
      $fecha_reunion = mysqli_real_escape_string($conn,$_POST['fecha_reunion']);     
      $resumen = mysqli_real_escape_string($conn,$_POST['resumen']);
      $participantes_externos = mysqli_real_escape_string($conn,$_POST['participantes_externos']);
      $asunto = mysqli_real_escape_string($conn,$_POST['asunto']);
      $compromisos_asumidos = mysqli_real_escape_string($conn,$_POST['compromisos_asumidos']);
      $fecha_prox_reunion = mysqli_real_escape_string($conn,$_POST['fecha_prox_reunion']);
      $comentarios_adicionales = mysqli_real_escape_string($conn,$_POST['comentarios_adicionales']);
           
                  
      // se verifica que los datos no estén vacios
      if(($id == '') ||
          ($paritaria_id == '') ||
          ($fecha_reunion == '') ||
            ($participantes_externos == '') ||
              ($asunto == '') ||
                ($compromisos_asumidos == '') ||
                  ($fecha_prox_reunion == '') ||
                    ($comentarios_adicionales == '') ||
                      ($resumen == '')){
          echo 5; // hay campos vacios
                    
    }else{
        $paritaria->updateAvanceParitaria($paritaria,$id,$paritaria_id,$fecha_reunion,$participantes_externos,$asunto,$compromisos_asumidos,$fecha_prox_reunion,$comentarios_adicionales,$resumen,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
