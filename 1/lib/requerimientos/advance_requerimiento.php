<?php include "../../../connection/connection.php";
      include "lib_requerimientos.php";
      


      if($conn){

      		$oneReq = new Requerimientos(); // se crea el objeto

                  $req_id = mysqli_real_escape_string($conn,$_POST['reqId']);
      		$desarrollador = mysqli_real_escape_string($conn,$_POST['desarrollador']);
      		$descripcion_avance = mysqli_real_escape_string($conn,$_POST['descripcion_avance']);
      		$estado_requerimiento = mysqli_real_escape_string($conn,$_POST['estado_requerimiento']);
      		

      		if(($req_id == '') ||
                        ($descripcion_avance == '') || 
      				($estado_requerimiento == '') || 
      					($desarrollador == '')){
      			echo 5; // hay campos sin completar
      		}else{
      			$oneReq->addAdvanceRequuerimiento($oneReq,$req_id,$desarrollador,$descripcion_avance,$estado_requerimiento,$conn,$dbase);
      		}

      }else{
      	echo 13; // sin conexion a la base de datos
      }




?>