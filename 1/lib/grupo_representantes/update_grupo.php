<?php include "../../../connection/connection.php";
      include "lib_grupo_representante.php";
      
           
      if($conn){
      //creamos el objeto
      $grupo = new Grupo();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $nombre_grupo = mysqli_real_escape_string($conn,$_POST['nombre_grupo']);
      $rep_titular = mysqli_real_escape_string($conn,$_POST['representante_titular']);
      $rep_suplente = mysqli_real_escape_string($conn,$_POST['representante_suplente']);
      $asesor_1 = mysqli_real_escape_string($conn,$_POST['primer_asesor']);
      $asesor_2 = mysqli_real_escape_string($conn,$_POST['segundo_asesor']);     
                  
      // se verifica que los datos no estén vacios
      if(($nombre_grupo == '') ||
            ($rep_titular == '') ||
                ($rep_suplente == '')){
                   echo 5; // hay campos vacios
                    
    }else{
       $grupo->updateGrupo($id,$grupo,$nombre_grupo,$rep_titular,$rep_suplente,$asesor_1,$asesor_2,$conn,$dbase);        
    }
    }else{
        echo 13; //error de conexion
    }





?>
