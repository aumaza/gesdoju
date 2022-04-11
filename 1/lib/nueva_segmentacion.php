<?php include "../../connection/connection.php";
      include "lib_segmentacion_tematica.php";
      
           
      if($conn){
      //creamos el objeto
      $segmentacion = new SegmentacionTematica();
      
      // captura de datos
        $clas_inst = mysqli_real_escape_string($conn,$_POST['clas_inst']);
        $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
        $saf = mysqli_real_escape_string($conn,$_POST['saf']);
        $cod_sirhu = mysqli_real_escape_string($conn,$_POST['cod_sirhu']);
        $cod_org = mysqli_real_escape_string($conn,$_POST['cod_org']);
        $reg_paritario = mysqli_real_escape_string($conn,$_POST['reg_paritario']);
        $regimen_laboral = mysqli_real_escape_string($conn,$_POST['reg_laboral']);
        $cod_estatuto = mysqli_real_escape_string($conn,$_POST['esc_estatuto']);
        $convenio = mysqli_real_escape_string($conn,$_POST['convenio']);
        $ub_fis = mysqli_real_escape_string($conn,$_POST['ubicacion_fisica']);
        
      
                  
      // se verifica que los datos no estén vacios
      if(($clas_inst == '') ||
            ($jurisdiccion == '') ||
                ($saf == '') ||
                    ($cod_sirhu == '') ||
                        ($cod_org == '') ||
                            ($reg_paritario == '') ||
                                ($regimen_laboral == '') ||
                                    ($cod_estatuto == '') ||
                                        ($convenio == '') ||
                                            ($ub_fis == '')){
                   echo 5; // hay campos vacios
                    
    }else{
        $segmentacion->addSegmentacion($segmentacion,$clas_inst,$jurisdiccion,$saf,$cod_sirhu,$cod_org,$reg_paritario,$regimen_laboral,$cod_estatuto,$convenio,$ub_fis,$conn);
    }
    }else{
        echo 13; //error de conexion
    }





?>
