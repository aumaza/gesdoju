<?php include "../../../connection/connection.php";
      include "lib_grupo_representante.php";
      
           
      if($conn){
      //creamos el objeto
      $grupo = new Grupo();
      
      // captura de datos
      $nombre_grupo = mysqli_real_escape_string($conn,$_POST['nombre_grupo']);
      $rep = mysqli_real_escape_string($conn,$_POST['representante']);     
      
      // pasar a mayusculas
      $nombre_grupo = strtoupper($nombre_grupo);
      $rep = strtoupper($rep);
            
      // se verifica que los datos no estén vacios
      if(($nombre_grupo == '') ||
            ($rep == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $grupo->addGrupo($grupo,$nombre_grupo,$rep,$conn);
    }
    }else{
        echo 13; //error de conexion
    }





?>
