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
 
    echo '<script> alert("Su sesión ha caducado"); </script>';
    
	}
	
        //CAPTURA LAS VARIABLES
        $grupo_representante = $_GET['grupo_representante'];
        $fecha_desde = $_GET['fecha_desde'];
        $fecha_hasta = $_GET['fecha_hasta'];
	
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestión Documental - Informe de Paritarias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="informes_busqueda.css" type="text/css">
   
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <div class="row">
       
    <p class="p-center"><img class="img-50" src="../../../img/escudo.png"></p>
    <p class="p-center">Ministerio de Economía de la Nación</p>
    <p class="p-center">Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</p>
    <hr>
    <h1 align="center">Paritarias</H1>
    <h3 align="center">Informe Búsqueda Avanzada Representación Paritarias</h3>
    
   
   </div>
   
   
   
   <?php 
       
                     
       if($conn){
       
        // EVALUA QUE LAS TRES VARIABLES NO SEAN NULAS 
        if(($grupo_representante != '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante' and fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        $count = 0;
        
            echo '<table id="normas">
                    <tr>
                        <th>Nro. Actuacion</th>
                        <th>Grupo Representante</th>
                        <th>Tipo Representación</th>
                        <th>Organismo</th>
                        <th>Fecha Reunión</th>
                        <th>Resúmen Reunión</th>
                    </tr>';
                      
        while($row = mysqli_fetch_array($query)){
            
                    echo "<tr>";
                    echo "<td>".$row['nro_actuacion']."</td>";
                    echo "<td>".$row['grupo_representantes']."</td>";
                    echo "<td>".$row['tipo_representacion']."</td>";
                    echo "<td>".$row['organismo']."</td>";
                    echo "<td>".$row['fecha_reunion']."</td>";
                    echo "<td width='560'>".$row['resumen_reunion']."</td></tr>";
                    $count++;
        
        }
        echo '</table>';
        
      
        }
    	
    	
    	// EVALUA QUE NO SEA NULA SOLO "PABRA CLAVE"
    	if(($grupo_representante != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante'";
        mysqli_select_db($conn,$dbase);
        $query_1 = mysqli_query($conn,$sql_1);
        $count  = 0;
        
        echo '<table id="normas">
                    <tr>
                        <th>Nro. Actuacion</th>
                        <th>Integrantes</th>
                        <th>Tipo Representación</th>
                        <th>Organismo</th>
                        <th>Fecha Reunión</th>
                        <th>Resúmen Reunión</th>
                    </tr>';
                      
        while($row_1 = mysqli_fetch_array($query_1)){
            
                    echo "<tr>";
                    echo "<td>".$row_1['nro_actuacion']."</td>";
                    $mysql = "select * from grupo_representantes where nombre_grupo = '$grupo_representante'";
                    $myquery = mysqli_query($conn,$mysql);
                    while($fila = mysqli_fetch_array($myquery)){
                    echo "<td>".'Titular: '.$fila['representante_titular'].'<hr>Suplente: '.$fila['representante_suplente']."</td>";
                    }
                    echo "<td>".$row_1['tipo_representacion']."</td>";
                    echo "<td>".$row_1['organismo']."</td>";
                    echo "<td>".$row_1['fecha_reunion']."</td>";
                    echo "<td width='560'>".$row_1['resumen_reunion']."</td></tr>";
                    $count++;
        }
        echo '</table>';
        
        
        }
        
        
        // EVALUA QUE NO SEAN NULAS "FECHA DESDE" Y "FECHA HASTA"
        if(($grupo_representante == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM representacion_paritarias WHERE fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,$dbase);
        $query_2 = mysqli_query($conn,$sql_2);
        $count = 0;
        
        echo '<table id="normas">
                    <tr>
                        <th>Nro. Actuación</th>
                        <th>Grupo Representante</th>
                        <th>Tipo Representación</th>
                        <th>Organismo</th>
                        <th>Fecha Reunión</th>
                        <th>Resúmen Reunión</th>
                    </tr>';
                      
        while($row_2 = mysqli_fetch_array($query_2)){
            
                    echo "<tr>";
                    echo "<td>".$row_2['nro_actuacion']."</td>";
                    echo "<td>".$row_2['grupo_representantes']."</td>";
                    echo "<td>".$row_2['tipo_representacion']."</td>";
                    echo "<td>".$row_2['organismo']."</td>";
                    echo "<td>".$row_2['fecha_reunion']."</td>";
                    echo "<td width='560'>".$row_2['resumen_reunion']."</td></tr>";
                    $count++;
        
        }
        echo '</table>';
                
        
        }
       
           
         }else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
      
    
   ?>  

</div>
 
    
    <page_footer> 
    <div class="row">
         <p><strong>Cantidad de Registros Encontrados:</strong> <?php echo $count; ?></p>
    </div>
    </page_footer>
    


</body>
</html>
