<?php include "../../../connection/connection.php";
      include "lib_paritarias.php";
      
      
      if($conn){
        
        // creamos el objeto
        $paritaria = new Paritarias();
        
        $anio = mysqli_real_escape_string($conn,$_POST['anio']);
        $mes = mysqli_real_escape_string($conn,$_POST['mes']);
               
        if(($anio == '') ||
            ($mes == '')){
            echo 3; // no se recibieron los datos 
        }else{
            echo 1;
        
        }
      }else{
        echo 13; // sin conexion
      }





?>
