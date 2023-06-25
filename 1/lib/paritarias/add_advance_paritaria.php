<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $nro_actuacion = mysqli_real_escape_string($conn,$_POST['nro_actuacion']);
      $grupo_representante = mysqli_real_escape_string($conn,$_POST['grupo_representantes']);
      $tipo_representacion = mysqli_real_escape_string($conn,$_POST['tipo_representacion']);
      $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
      $fecha_reunion = mysqli_real_escape_string($conn,$_POST['fecha_reunion']);     
      $resumen = mysqli_real_escape_string($conn,$_POST['resumen']);
      $participantes_externos = mysqli_real_escape_string($conn,$_POST['participantes_externos']);
      $asunto = mysqli_real_escape_string($conn,$_POST['asunto']);
      $compromisos_asumidos = mysqli_real_escape_string($conn,$_POST['compromisos_asumidos']);
      $fecha_prox_reunion = mysqli_real_escape_string($conn,$_POST['fecha_prox_reunion']);
      $comentarios_adicionales = mysqli_real_escape_string($conn,$_POST['comentarios_adicionales']);
           
                  
      // se verifica que los datos no estén vacios
      if(($id == '') ||
          ($nro_actuacion == '') ||
           ($grupo_representante == '') ||
            ($tipo_representacion == '') ||
              ($organismo == '') ||
                  ($fecha_reunion == '') ||
                    ($resumen == '') ||
                      ($participantes_externos == '') ||
                        ($asunto == '') ||
                          ($compromisos_asumidos == '') ||
                           ($fecha_prox_reunion == '') ||
                            ($comentarios_adicionales == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $paritaria->addAdvanceParitaria($paritaria, $id, $nro_actuacion, $organismo, $tipo_representacion, $grupo_representante, $fecha_reunion, $participantes_externos,$asunto,$compromisos_asumidos,$fecha_prox_reunion,$comentarios_adicionales,$resumen, $conn, $dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
