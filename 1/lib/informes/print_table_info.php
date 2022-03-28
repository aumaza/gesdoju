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
  <link rel="stylesheet" href="informes_busqueda.css" type="text/css">
   
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <div class="row">
       
    <p class="p-center"><img class="img-50" src="../../../img/escudo.png"></p>
    <p class="p-center">Ministerio de Economía de la Nación</p>
    <p class="p-center">Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
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
        $count = 0;
        
            echo '<table id="normas">
                    <tr>
                        <th>Nombre Norma</th>
                        <th>Nro. Norma</th>
                        <th>Tipo Norma</th>
                        <th>Fecha Pub.</th>
                        <th>Organismo</th>
                        <th>Resumen</th>
                    </tr>';
                      
        while($row = mysqli_fetch_array($query)){
            
                    echo "<tr>";
                    echo "<td>".$row['nombre_norma']."</td>";
                    echo "<td>".$row['n_norma']."</td>";
                    echo "<td>".$row['tipo_norma']."</td>";
                    echo "<td>".$row['f_pub']."</td>";
                                        
                        $mysql = "select descripcion from organismos where cod_org = '$row[organismo]'";
                        $res = mysqli_query($conn,$mysql);
                            
                            while($fila = mysqli_fetch_array($res)){
                                echo '<td>'.$fila['descripcion'].'</td>';
                            }
                    echo "<td width='275'>".$row['observaciones']."</td></tr>";
                    $count++;
        
        }
        echo '</table>';
        
      
        }
    	
    	
    	// EVALUA QUE NO SEA NULA SOLO "PABRA CLAVE"
    	if(($palabra_clave != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM normas WHERE MATCH(observaciones) AGAINST ('+$palabra_clave' IN BOOLEAN MODE) order by f_pub ASC";
        mysqli_select_db($conn,'gesdoju');
        $query_1 = mysqli_query($conn,$sql_1);
        $count  = 0;
        
        echo '<table id="normas">
                    <tr>
                        <th>Nombre Norma</th>
                        <th>Nro. Norma</th>
                        <th>Tipo Norma</th>
                        <th>Fecha Pub.</th>
                        <th>Organismo</th>
                        <th>Resumen</th>
                    </tr>';
                      
        while($row_1 = mysqli_fetch_array($query_1)){
            
                    echo "<tr>";
                    echo "<td>".$row_1['nombre_norma']."</td>";
                    echo "<td>".$row_1['n_norma']."</td>";
                    echo "<td>".$row_1['tipo_norma']."</td>";
                    echo "<td>".$row_1['f_pub']."</td>";
                                        
                        $mysql_1 = "select descripcion from organismos where cod_org = '$row_1[organismo]'";
                        $res_1 = mysqli_query($conn,$mysql_1);
                            
                            while($fila_1 = mysqli_fetch_array($res_1)){
                                echo '<td>'.$fila_1['descripcion'].'</td>';
                            }
                    echo "<td width='275'>".$row_1['observaciones']."</td></tr>";
                    $count++;
        }
        echo '</table>';
        
        
        }
        
        
        // EVALUA QUE NO SEAN NULAS "FECHA DESDE" Y "FECHA HASTA"
        if(($palabra_clave == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM normas WHERE f_pub between '$fecha_desde' and '$fecha_hasta' order by f_pub ASC";
        mysqli_select_db($conn,'gesdoju');
        $query_2 = mysqli_query($conn,$sql_2);
        $count = 0;
        
        echo '<table id="normas">
                    <tr>
                        <th>Nombre Norma</th>
                        <th>Nro. Norma</th>
                        <th>Tipo Norma</th>
                        <th>Fecha Pub.</th>
                        <th>Organismo</th>
                        <th>Resumen</th>
                    </tr>';
                      
        while($row_2 = mysqli_fetch_array($query_2)){
            
                    echo "<tr>";
                    echo "<td>".$row_2['nombre_norma']."</td>";
                    echo "<td>".$row_2['n_norma']."</td>";
                    echo "<td>".$row_2['tipo_norma']."</td>";
                    echo "<td>".$row_2['f_pub']."</td>";
                                        
                        $mysql_2 = "select descripcion from organismos where cod_org = '$row_2[organismo]'";
                        $res_2 = mysqli_query($conn,$mysql_2);
                            
                            while($fila_2 = mysqli_fetch_array($res_2)){
                                echo '<td>'.$fila_2['descripcion'].'</td>';
                            }
                    echo "<td width='275'>".$row_2['observaciones']."</td></tr>";
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
         <h1><strong>Cantidad de Registros Encontrados:</strong> <?php echo $count; ?></h1>
    </div>
    </page_footer>
    


</body>
</html>
