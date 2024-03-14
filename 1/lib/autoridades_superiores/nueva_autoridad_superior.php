<?php include "../../../connection/connection.php";
      include "lib_autoridades_superiores.php";
      
           
      if($conn){
      //creamos el objeto
      $one_as = new AutoridadesSuperiores();
      
      // captura de datos
        $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
        $normativa = mysqli_real_escape_string($conn,$_POST['normativa']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

      // se verifica que los datos no estén vacios
      if(($organismo == '') ||
            ($normativa == '') ||
                ($descripcion == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $one_as->addAutoridadSuperior($one_as,$organismo,$normativa,$descripcion,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
