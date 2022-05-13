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
	
	
   $id = $_GET['id'];
   
   
   
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestión Documental - Informe Segmentación Temática</title>
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
    <p class="p-center">Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
    <hr>
    <h1 align="center">Segmentación Temática</H1>
    <h3 align="center">Informe Extendido</h3>
    
   
   </div>
   
   
   
   <?php 
          
       if($conn){
        
        mysqli_select_db($conn,$dbase);
    
    $sql = "select * from segmentacion_tematica where id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    
    
    $sql_1 = "select descripcion from tipo_organismo where cod_organismo = '$row[clas_inst]'";
    $query_1 = mysqli_query($conn,$sql_1);
    while($row_1 = mysqli_fetch_array($query_1)){
        $descripcion_tipo_organismo = $row_1['descripcion'];
    }
    
    $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$row[jurisdiccion]'";
    $query_2 = mysqli_query($conn,$sql_2);
    while($row_2 = mysqli_fetch_array($query_2)){
        $descripcion_jurisdiccion = $row_2['descripcion'];
    }
    
    $sql_3 = "select descripcion from organismos where cod_org = '$row[cod_org]'";
    $query_3 = mysqli_query($conn,$sql_3);
    while($row_3 = mysqli_fetch_assoc($query_3)){
        $descripcion_organismo = $row_3['descripcion'];
    }
       
       
    echo '<div class="row">
            
            <p class="p-justify"><strong>Clasificación Institucional:</strong> '.$descripcion_tipo_organismo.'</p><hr>
            <p class="p-justify"><strong>Jurisdicción</strong>: '.$descripcion_jurisdiccion.'</p><hr>
            <p class="p-justify"><strong>SAF</strong>: '.$row[saf].'</p><hr>
            <p class="p-justify"><strong>Código SIRHU</strong>: '.$row[cod_sirhu].'</p><hr>
            <p class="p-justify"><strong>Organismo</strong>: '.$descripcion_organismo.'</p><hr>
            <p class="p-justify"><strong>Régimen Paritario</strong>: '.$row[reg_paritario].'</p><hr>
            <p class="p-justify"><strong>Régimen Laboral</strong>: '.$row[reg_laboral].'</p><hr>
            <p class="p-justify"><strong>Escalafón / Estatuto</strong>: '.$row[esc_estatuto].'</p><hr>
            <p class="p-justify"><strong>Convenio</strong>: '.$row[convenio].'</p><hr>
            <p class="p-justify"><strong>Ubicación / Bibliorato</strong>: '.$row[ubicacion_fis].'</p><hr>
            
           
            </div>';
         
         }else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
      
    
   ?>  

</div>
 
<!-- end tercer bloque -->  



</body>
</html>
