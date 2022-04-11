<?php include "../../connection/connection.php";
      include "lib_segmentacion_tematica.php";
      
           
      if($conn){
      //creamos el objeto
      $segmentacion = new SegmentacionTematica();
      
      // captura de datos
        $id = mysqli_real_escape_string($conn,$_POST['id']);
                  
      // se verifica que los datos no estén vacios
      if($id == ''){
          echo 5; // hay campos vacios
      }else{
        $segmentacion->deleteSegmentacion($id,$conn,$dbase);
      }
    }else{
        echo 13; //error de conexion
    }





?>
