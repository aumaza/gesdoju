<?php include "../../../connection/connection.php";
      include "lib_grupo_representante.php";
      
           
      if($conn){
      //creamos el objeto
      $grupo = new Grupo();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $rep = mysqli_real_escape_string($conn,$_POST['representante']);     
      
      // pasar a mayusculas
      $rep = strtoupper($rep);
            
      // se verifica que los datos no estén vacios
      if(($rep == '') ||
            ($id == '')){
                   echo 5; // hay campos vacios
                    
    }else{
       $grupo->updateGrupo($id,$grupo,$rep,$conn);        
    }
    }else{
        echo 13; //error de conexion
    }





?>
