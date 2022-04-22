<?php   session_start();
        ini_set('display_errors', 1);
        include "../../../connection/connection.php";
        include "../../../functions/functions.php";
        include "lib_normas.php";

	
	$varsession = $_SESSION['user'];
	
	if(($varsession == null ) || ($varsession = '')){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
   
?>


<html><head>
	<meta charset="utf-8">
	<title>Subir Archivo Normas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/bookmarks-organize.png" />
	<?php skeleton();?>
	
	<style>
	 .avatar {
		vertical-align: middle;
		horizontal-align: right;
		width: 60px;
		height: 60px;
		border-radius: 60%;
	      }
	</style>
	
</head>
<body background="../../img/background.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
	<a href="../../main/main.php"><button><span class="glyphicon glyphicon-chevron-left"></span> Volver</button></a>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br>

  <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
        
       <?php
        
       if($conn){
        
            if(isset($_POST['up_normas_file'])){
                $norma_file = basename($_FILES["file"]["name"]);
                readArchivo($norma_file);
                
                //upload_file($norma_file,$conn,$dbase);
            }
        }else{
	      echo mysqli_error($conn);
        }
                                    

  //cerramos la conexion
  
  mysqli_close($conn);

//<meta http-equiv="refresh" content="3;URL=../main/main.php "/>
?>
<div class="container">
<div class="row">
<div class="col-md-12">

</div>
</div>
</div>


</body>
</html>
