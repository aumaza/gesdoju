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
    <p class="p-center">Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
    <hr>
    <h1 align="center">Normas</H1>
    <h3 align="center">Informe Extendido</h3>
    
   
   </div>
   
   
   
   <?php 
          
       if($conn){
        
        $sql = "SELECT * from normas where id  = '$id'";
	  	mysqli_select_db($conn,'gesdoju');
    	$resultado = mysqli_query($conn,$sql);
    	while($row = mysqli_fetch_array($resultado)){
            $nombre_norma = $row['nombre_norma'];
            $n_norma = $row['n_norma'];
            $tipo_norma = $row['tipo_norma'];
            $foro_norma = $row['f_norma'];
            $f_pub = $row['f_pub'];
            $anio = $row['anio_pub'];
            $organismo = $row['organismo'];
            $jurisdiccion = $row['jurisdiccion'];
            $unidad_fisica = $row['unidad_fisica'];
            $obs = $row['observaciones'];
    	}
    	
    	$sql_1 = "select descripcion from organismos where cod_org = '$organismo'";
        $query_1 = mysqli_query($conn,$sql_1);
        while($row_1 = mysqli_fetch_array($query_1)){
            $org_descripcion = $row_1['descripcion'];
        }
        
        $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$jurisdiccion'";
        $query_2 = mysqli_query($conn,$sql_2);
        while($row_2 = mysqli_fetch_array($query_2)){
            $jur_descripcion = $row_2['descripcion'];
        }
       
       
    echo '<div class="row">
            
            <p class="p-justify"><strong>Nombre Norma:</strong> '.$nombre_norma.'</p><hr>
            <p class="p-justify"><strong>Nro. Norma</strong>: '.$n_norma.'</p><hr>
            <p class="p-justify"><strong>Tipo Norma</strong>: '.$tipo_norma.'</p><hr>
            <p class="p-justify"><strong>Ambito de la Norma</strong>: '.$foro_norma.'</p><hr>
            <p class="p-justify"><strong>Fecha Publicación</strong>: '.$f_pub.'</p><hr>
            <p class="p-justify"><strong>Año</strong>: '.$anio.'</p><hr>
            <p class="p-justify"><strong>Organismo</strong>: '.$org_descripcion.'</p><hr>
            <p class="p-justify"><strong>Jurisdicción</strong>: '.$jur_descripcion.'</p><hr>
            <p class="p-justify"><strong>Ubicación / Bibliorato</strong>: '.$unidad_fisica.'</p><hr>
            <p class="p-justify"><strong>Observaciones</strong>: '.$obs.'</p><br>
            
           
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
