<?php session_start(); 
      
      error_reporting(E_ALL ^ E_NOTICE);
      ini_set('display_errors', 0);

	  include "../../../connection/connection.php";
      include "lib_clasificador_institucional.php";
      include "../system/lib_system.php";
      include "../../../functions/functions.php";

      $varsession = $_SESSION['user'];
	
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db($conn,'gesdoju');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
   
    
	if($varsession == null || $varsession == ''){
  echo '<!DOCTYPE html>
        <html lang="es">
        <head>
        <title>GESDO [ Gestión Documental ]</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../../../icons/apps/accessories-dictionary.png" />';
        skeleton();
        echo '</head>
                <body>
                <br><div class="container">
                <div class="alert alert-danger" role="alert">
                    <p align="center"><img src="../../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> Su sesión a caducado. Por favor, inicie sesión nuevamente</p><hr>
                    <a href="../../../logout.php"><button type="buton" class="btn btn-default btn-block"><img src="../../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>
                </div>
                </div>';
                die();
        echo '</body>
              </html>';
	}
?>

      <!DOCTYPE html>
		<html lang="es">
		<head>
		  <title>GESDO [ Eliminar Clasificador Institucional ]</title>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />
		  <link rel="stylesheet" href="main.css" >
		  <?php skeleton(); ?>
		  
		 
		</head>
		<body style = "background: #839192;">
      	
      	<div><br>

      	<?php
           
	      if($conn){
          // SE CAPTURAN LOS DATOS
          $id = $_GET['id'];
	      //creamos el objeto
	      $oneClasificador = new ClasificadorInstitucional();
	      $oneClasificador->formEliminarClasificador($oneClasificador,$id,$conn,$dbase);
	  	  }else{
	  	  	echo "sin conexion";
	  	  }

	  	  ?>

	  	</div>
	<script type="text/javascript" src="lib_clasificador_institucional.js"></script>

  	</body>
  	</html>
