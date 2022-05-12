<?php  include "../../../connection/connection.php";
       include "lib_normas.php";
       
       if($conn){
        
            $nro_norma = mysqli_real_escape_string($conn,$_POST['nro_norma']);
            $tipo_norma = mysqli_real_escape_string($conn,$_POST['tipo_norma']);
            $anio = mysqli_real_escape_string($conn,$_POST['anio']);
            
            if(($nro_norma == '') || ($tipo_norma == '') || ($anio == '')){
                echo 3; // hay campos sin completar
            }else{
                consultarNorma($nro_norma,$tipo_norma,$anio,$conn,$dbase);
            }
       
       
       }else{
            echo 7; // 
       }
    




?>
