<?php session_start();

    include "../../../connection/connection.php";
            
        $usuario = $_SESSION['user'];
        $password = $_SESSION['pass'];
	
	$sql = "select nombre from usuarios where user = '$usuario' and password = '$password'";
	mysqli_select_db($conn,'gesdoju');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
    if($usuario == null || $usuario = ''){
 
    echo '<!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Storia</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="../../../assets/img/storia-favicon.png" rel="icon">';
            skeleton();
            echo '</head><body>';
            echo '<br><div class="container">
                    <div class="alert alert-danger" role="alert">';
            echo '<p align="center"><img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> '.$usuario.' Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
            echo '<a href="../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
            echo "</div></div>";
            die();
            echo '</body></html>';
	}
	
        //CAPTURA LAS VARIABLES
        $palabra_clave = $_GET['palabra_clave'];
        $fecha_desde = $_GET['fecha_desde'];
        $fecha_hasta = $_GET['fecha_hasta'];
	
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestión Documental - Informe de Norma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../../icons/apps/kthesaurus.png" rel="icon">
  <link rel="stylesheet" href="informes_norma.css" type="text/css">
   
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <div class="row">
       
    <p class="p-center"><img class="img-50" src="../../../img/escudo.png"></p>
    <p class="p-center">Ministerio de Economía de la Nación</p>
    <p class="p-center">Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</p>
    <hr>
    <h1 align="center">Normas</H1>
    <h3 align="center">Informe Búsqueda Avanzada</h3>
    
   
   </div>
   
   
   
   <?php 
        
        
       if($conn){
        
        // EVALUA QUE LAS TRES VARIABLES NO SEAN NULAS 
        if(($palabra_clave != '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql = "SELECT * FROM normas WHERE MATCH(observaciones) AGAINST('+$palabra_clave' IN BOOLEAN MODE) and f_pub between '$fecha_desde' and '$fecha_hasta' order by f_pub ASC";
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);
        $count = 1;
        
        while($row = mysqli_fetch_array($query)){
             
        
        echo '<div class="row">
            
            <p class="p-justify"><strong>Nombre Norma:</strong> '.$row['nombre_norma'].'</p><hr>
            <p class="p-justify"><strong>Nro. Norma</strong>: '.$row['n_norma'].'</p><hr>
            <p class="p-justify"><strong>Tipo Norma</strong>: '.$row['tipo_norma'].'</p><hr>
            <p class="p-justify"><strong>Ambito de la Norma</strong>: '.$row['f_norma'].'</p><hr>
            <p class="p-justify"><strong>Fecha Publicación</strong>: '.$row['f_pub'].'</p><hr>
            <p class="p-justify"><strong>Año</strong>: '.$row['anio_pub'].'</p><hr>';
            
             $query_a = "select descripcion from jurisdicciones where cod_jur = '$row[jurisdiccion]'";
			 $resp_a = mysqli_query($conn,$query_a);
			 while($linea_a = mysqli_fetch_array($resp_a)){
             echo '<p class="p-justify"><strong>Organismo</strong>: '.$linea_a['descripcion'].'</p><hr>';			 
			 }
             
             $mysql = "select descripcion from organismos where cod_org = '$row[organismo]'";
			 $res = mysqli_query($conn,$mysql);
			 while($fila = mysqli_fetch_array($res)){
			 echo '<p class="p-justify"><strong>Jurisdicción</strong>: '.$fila['descripcion'].'</p><hr>';
			 }
            
      echo '<p class="p-justify"><strong>Ubicación / Bibliorato</strong>: '.$row['unidad_fisica'].'</p><hr>
            <p class="p-justify"><strong>Observaciones</strong>: '.$row['observaciones'].'</p><br>
            
            </div>
            <p class="p-center">Hoja '.$count++.'</p>';
            
            
        }
            
        }
    	
    	
    	// EVALUA QUE NO SEA NULA SOLO "PABRA CLAVE"
    	if(($palabra_clave != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM normas WHERE MATCH(observaciones) AGAINST ('+$palabra_clave' IN BOOLEAN MODE) order by f_pub ASC";
        mysqli_select_db($conn,'gesdoju');
        $query_1 = mysqli_query($conn,$sql_1);
        $count = 1;
        
        while($row_1 = mysqli_fetch_array($query_1)){
        
        echo '<div class="row">
            
            <p class="p-justify"><strong>Nombre Norma:</strong> '.$row_1['nombre_norma'].'</p><hr>
            <p class="p-justify"><strong>Nro. Norma</strong>: '.$row_1['n_norma'].'</p><hr>
            <p class="p-justify"><strong>Tipo Norma</strong>: '.$row_1['tipo_norma'].'</p><hr>
            <p class="p-justify"><strong>Ambito de la Norma</strong>: '.$row_1['f_norma'].'</p><hr>
            <p class="p-justify"><strong>Fecha Publicación</strong>: '.$row_1['f_pub'].'</p><hr>
            <p class="p-justify"><strong>Año</strong>: '.$row_1['anio_pub'].'</p><hr>';
            
             $query_b = "select descripcion from jurisdicciones where cod_jur = '$row_1[jurisdiccion]'";
			 $resp_b = mysqli_query($conn,$query_b);
			 while($linea_b = mysqli_fetch_array($resp_b)){
             echo '<p class="p-justify"><strong>Organismo</strong>: '.$linea_b['descripcion'].'</p><hr>';			 
			 }
             
             $mysql_1 = "select descripcion from organismos where cod_org = '$row_1[organismo]'";
			 $res_1 = mysqli_query($conn,$mysql_1);
			 while($fila_1 = mysqli_fetch_array($res_1)){
			 echo '<p class="p-justify"><strong>Jurisdicción</strong>: '.$fila_1['descripcion'].'</p><hr>';
			 }
            
      echo '<p class="p-justify"><strong>Ubicación / Bibliorato</strong>: '.$row_1['unidad_fisica'].'</p><hr>
            <p class="p-justify"><strong>Observaciones</strong>: '.$row_1['observaciones'].'</p><br>
            
            </div>
            <p class="p-center">Hoja '.$count++.'</p>';
        }
        
        
        }
        
        
        // EVALUA QUE NO SEAN NULAS "FECHA DESDE" Y "FECHA HASTA"
        if(($palabra_clave == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM normas WHERE f_pub between '$fecha_desde' and '$fecha_hasta' order by f_pub ASC";
        mysqli_select_db($conn,'gesdoju');
        $query_2 = mysqli_query($conn,$sql_2);
        $count = 1;
        
        while($row_2 = mysqli_fetch_array($query_2)){
        
        echo '<div class="row">
            
            <p class="p-justify"><strong>Nombre Norma:</strong> '.$row_2['nombre_norma'].'</p><hr>
            <p class="p-justify"><strong>Nro. Norma</strong>: '.$row_2['n_norma'].'</p><hr>
            <p class="p-justify"><strong>Tipo Norma</strong>: '.$row_2['tipo_norma'].'</p><hr>
            <p class="p-justify"><strong>Ambito de la Norma</strong>: '.$row_2['f_norma'].'</p><hr>
            <p class="p-justify"><strong>Fecha Publicación</strong>: '.$row_2['f_pub'].'</p><hr>
            <p class="p-justify"><strong>Año</strong>: '.$row_2['anio_pub'].'</p><hr>';
            
             $query_c = "select descripcion from jurisdicciones where cod_jur = '$row_2[jurisdiccion]'";
			 $resp_c = mysqli_query($conn,$query_c);
			 while($linea_c = mysqli_fetch_array($resp_c)){
             echo '<p class="p-justify"><strong>Organismo</strong>: '.$linea_c['descripcion'].'</p><hr>';			 
			 }
             
             $mysql_2 = "select descripcion from organismos where cod_org = '$row_2[organismo]'";
			 $res_2 = mysqli_query($conn,$mysql_2);
			 while($fila_2 = mysqli_fetch_array($res_2)){
			 echo '<p class="p-justify"><strong>Jurisdicción</strong>: '.$fila_2['descripcion'].'</p><hr>';
			 }
            
     
      echo '<p class="p-justify"><strong>Ubicación / Bibliorato</strong>: '.$row_2['unidad_fisica'].'</p><hr>
            <p class="p-justify"><strong>Observaciones</strong>: '.$row_2['observaciones'].'</p><br>
            
           
            </div>
            <p class="p-center">Hoja '.$count++.'</p>';
        }
        
        }
       
           
         }else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
      
    
   ?>  

</div>
 
<!-- end tercer bloque -->  



</body>
</html>
