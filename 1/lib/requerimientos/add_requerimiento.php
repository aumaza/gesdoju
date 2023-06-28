<?php include "../../../connection/connection.php";
      include "lib_requerimientos.php";
      


      if($conn){

      		$oneReq = new Requerimientos(); // se crea el objeto

      		$nombre = mysqli_real_escape_string($conn,$_POST['usuario_solicitante']);
      		$tipo_solicitud = mysqli_real_escape_string($conn,$_POST['tipo_solicitud']);
      		$descripcion_modulo = mysqli_real_escape_string($conn,$_POST['descripcion_modulo']);
      		$descripcion_requerimiento = mysqli_real_escape_string($conn,$_POST['requerimiento']);
      		

      		if(($tipo_solicitud == '') || 
      			($descripcion_modulo == '') || 
      				($descripcion_requerimiento == '') || 
      					($nombre == '')){
      			echo 5; // hay campos sin completar
      		}else{
      			$oneReq->addRequerimiento($oneReq,$tipo_solicitud,$descripcion_modulo,$descripcion_requerimiento,$nombre,$conn,$dbase);
      		}

      }else{
      	echo 13; // sin conexion a la base de datos
      }




?>