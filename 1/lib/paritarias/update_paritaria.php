<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      
           
      if($conn){
      //creamos el objeto
      $paritaria = new Paritarias();
      
      // captura de datos
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $nro_actuacion = mysqli_real_escape_string($conn,$_POST['nro_actuacion']);
      $grupo_representante = mysqli_real_escape_string($conn,$_POST['grupo_representante']);
      $tipo_representacion = mysqli_real_escape_string($conn,$_POST['tipo_representacion']);
      $tipo_pedido = mysqli_real_escape_string($conn,$_POST['tipo_pedido']);
      $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
      $fecha_reunion = mysqli_real_escape_string($conn,$_POST['fecha_reunion']);     
      $resumen_reunion = mysqli_real_escape_string($conn,$_POST['resumen_reunion']);
      $myfile = basename($_FILES["myfile"]["name"]); 
      
                  
      // se verifica que los datos no estén vacios
      if(($id == '') ||
          ($nro_actuacion == '') ||
            ($grupo_representante == '') ||
                ($tipo_representacion == '') ||
                  ($tipo_pedido == '') ||
                    ($organismo == '') ||
                        ($fecha_reunion == '') ||
                            ($resumen_reunion == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $paritaria->updateParitaria($paritaria,$id,$nro_actuacion,$grupo_representante,$tipo_representacion,$tipo_pedido,$organismo,$fecha_reunion,$resumen_reunion,$myfile,$conn,$dbase);
    }
    }else{
        echo 13; //error de conexion
    }





?>
