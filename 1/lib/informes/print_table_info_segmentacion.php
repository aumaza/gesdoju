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
        $clas_inst = $_GET['clas_inst'];
        
	
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestión Documental - Informe de Segmentación Temática</title>
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
    <h1 align="center">Segmentación Temática</H1>
    <h3 align="center">Informe Búsqueda Avanzada</h3>
    
   
   </div>
   
   
   
   <?php 
       
              
       if($conn){
       
        $sql = "SELECT * FROM segmentacion_tematica where clas_inst = '$clas_inst'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        
        //mostramos fila x fila
        $count = 0;
        
            echo '<table id="normas">
                    <tr>
                        <th>Clas. Inst.</th>
                        <th>Jur.</th>
                        <th>SAF</th>
                        <th>SIRHU</th>
                        <th>Organismo</th>
                        <th>Rég. Paritario</th>
                        <th>Rég. Laboral</th>
                        <th>Escalafón</th>
                        <th>Convenio</th>
                        
                    </tr>';
                      
        while($fila = mysqli_fetch_array($query)){
            
                    echo "<tr>";
                    $sql_1 = "select descripcion from tipo_organismo where cod_organismo = '$clas_inst'";
                    $query_1 = mysqli_query($conn,$sql_1);
                    $row_1 = mysqli_fetch_assoc($query_1);
                    {
                    echo "<td>".$row_1['descripcion']."</td>";
                    }
                    
                    $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$fila[jurisdiccion]'";
                    $query_2 = mysqli_query($conn,$sql_2);
                    $row_2 = mysqli_fetch_assoc($query_2);
                    {
                    echo "<td>".$row_2['descripcion']."</td>";
                    }
                                       
                    echo "<td>".$fila['saf']."</td>";
                    echo "<td>".$fila['cod_sirhu']."</td>";
                    
                    $sql_3 = "select descripcion from organismos where cod_org = '$fila[desc_organismo]'";
                    $query_3 = mysqli_query($conn,$sql_3);
                    $row_3 = mysqli_fetch_assoc($query_3);
                    {
                    echo "<td>".$row_3['descripcion']."</td>";
                    }
                    
                    echo "<td>".$fila['reg_paritario']."</td>";
                    echo "<td>".$fila['regimen_laboral']."</td>";
                    echo "<td>".$fila['esc_estauto']."</td>";
                    echo "<td>".$fila['convenio']."</td></tr>";
                    $count++;
        
        }
        echo '</table>';
        
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
