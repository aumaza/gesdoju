<?php include "../../../connection/connection.php";
      include "lib_grupo_representante.php";
      
           
      if($conn){
      //creamos el objeto
      $grupo = new Grupo();
      
      // captura de datos
      $nombre_grupo = mysqli_real_escape_string($conn,$_POST['nombre_grupo']);
      $rep_titular = mysqli_real_escape_string($conn,$_POST['representante_titular']);
      $rep_suplente = mysqli_real_escape_string($conn,$_POST['representante_suplente']);
      $asesor_1 = mysqli_real_escape_string($conn,$_POST['primer_asesor']);
      $asesor_2 = mysqli_real_escape_string($conn,$_POST['segundo_asesor']);
      
      // pasar a mayusculas
      $nombre_grupo = strtoupper($nombre_grupo);
            
      // se verifica que los datos no estén vacios
      if(($nombre_grupo == '') ||
            ($rep_titular == '') ||
                ($rep_suplente == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $grupo->addGrupo($grupo,$nombre_grupo,$rep_titular,$rep_suplente,$asesor_1,$asesor_2,$conn,$dabse);
    }
    }else{
        echo 13; //error de conexion
    }





?>
