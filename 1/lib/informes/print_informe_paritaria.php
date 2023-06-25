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
  <title>Gestión Documental - Alta Representación Paritaria</title>
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
    <h1 align="center">Representación Paritarias</H1>
    <h3 align="center">Carátula</h3>
       
   </div>
   
   
   
   <?php 
          
    if($conn){
    
    $sql = "select * from representacion_paritarias where id = '$id'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($query)){
        $nro_actuacion = $row['nro_actuacion'];
        $grupo_representantes = $row['grupo_representantes'];
        $tipo_representacion = $row['tipo_representacion'];
        $organismo = $row['organismo'];
        $fecha_reunion = $row['fecha_reunion'];
        $resumen_reunion = $row['resumen_reunion'];
        $archivo = $row['file_name'];
    }
    
    $sql_1 = "select * from grupo_representantes where nombre_grupo = '$grupo_representantes'";
    $query_1 = mysqli_query($conn,$sql_1);
    while($row_1 = mysqli_fetch_array($query_1)){
        $rep_titular = $row_1['representante_titular'];
        $rep_suplente = $row_1['representante_suplente'];
        $asesor_1 = $row_1['primer_asesor'];
        $asesor_2 = $row_1['segundo_asesor'];
    }
       
       
    echo '<div class="row">
            
            <p class="p-justify"><strong>Nro. Actuación:</strong> '.$nro_actuacion.'</p><hr>
            <p class="p-justify"><strong>Grupo:</strong> '.$grupo_representantes.'</p><hr>
            <p class="p-center"><strong>Integrantes</strong></p><hr>
            <p class="p-justify"><strong>Representante Titular:</strong> '.$rep_titular.'</p>
            <p class="p-justify"><strong>Representante Suplente:</strong> '.$rep_suplente.'</p>';
            if(($asesor_1 != '') && ($asesor_2 != '')){
            echo '<p class="p-justify"><strong>Primer Asesor:</strong> '.$asesor_1.'</p>
                  <p class="p-justify"><strong>Segundo Asesor:</strong> '.$asesor_2.'</p>';
            }
      echo '<hr><p class="p-justify"><strong>Tipo Representación</strong>: '.$tipo_representacion.'</p><hr>
            <p class="p-justify"><strong>Organismo</strong>: '.$organismo.'</p><hr>
            <p class="p-justify"><strong>Fecha Alta</strong>: '.$fecha_reunion.'</p><hr>
            <p class="p-justify"><strong>Referencia / Descripción</strong>: '.$resumen_reunion.'</p><hr>
            
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
