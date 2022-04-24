<?php include "../../../connection/connection.php";
      include "lib_tipo_organismos.php";
      
           
      if($conn){
      //creamos el objeto
      $my_tipo_organismo = new TipoOrganismos();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $cod_tipo_org = mysqli_real_escape_string($conn,$_POST['cod_tipo_org']);
      $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
           
      // pasar a mayusculas
      $cod_tipo_org = strtoupper($cod_tipo_org);
      $descripcion = strtoupper($descripcion);
            
      // se verifica que los datos no estén vacios
      if(($cod_tipo_org == '') ||
            ($descripcion == '') ||
                ($id == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $my_tipo_organismo->updateTipoOrganismo($my_tipo_organismo,$id,$cod_tipo_org,$descripcion,$conn);
    }
    }else{
        echo 13; //error de conexion
    }





?>
