<?php  include "../../../connection/connection.php";
       include "lib_normas.php";
       
       if($conn){
        
            $nro_norma = mysqli_real_escape_string($conn,$_POST['nro_norma']);
            $tipo_norma = mysqli_real_escape_string($conn,$_POST['tipo_norma']);
            
            if(($nro_norma == '') || ($tipo_norma == '')){
                echo 3; // hay campos sin completar
            }else{
                consultarNorma($nro_norma,$tipo_norma,$conn,$dbase);
            }
       
       
       }else{
            echo 7; // 
       }
    




?>
