<?php include "../../connection/connection.php";
      include "lib_organismos.php";
      
           
      if($conn){
      //creamos el objeto
      $my_organismo = new Organismos();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $cod_org = mysqli_real_escape_string($conn,$_POST['cod_org']);
      $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
           
      // pasar a mayusculas
      $cod_org = strtoupper($cod_org);
      $descripcion = strtoupper($descripcion);
            
      // se verifica que los datos no estén vacios
      if(($cod_org == '') ||
            ($descripcion == '') ||
                ($id == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $my_organismo->updateOrganismo($id,$my_organismo,$cod_org,$descripcion,$conn);
    }
    }else{
        echo 13; //error de conexion
    }





?>
