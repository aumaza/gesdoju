<?php include "connection/connection.php";
      include "functions/functions.php";
      
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="icons/apps/accessories-dictionary.png" />
  <meta name="description" content="">
  <meta name="author" content="">
  <?php skeleton();?>
  <link href="/gesdoju/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body id="page-top">

  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   
    <ul class="nav navbar-nav">
      <a href="registro/password.php" data-toggle="tooltip" data-placement="bottom" title="Ingrese aquí para blanquear su Password"><button type="button" class="btn btn-light navbar-btn"><img class="img-reponsive img-rounded" src="icons/status/task-attempt.png" /> Olvidé mi Password</button></a>
      </ul>
    
    
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Gestión Documental Jurídica</h1>
     </div>
   </header><br>
   <div class="container">
   <div class="main">
  
   <?php
         
         if($conn){
         
	  if(isset($_POST['A'])){
         
	$user = mysqli_real_escape_string($conn,$_POST["user"]);
	$pass1 = mysqli_real_escape_string($conn,$_POST["pass"]);
	session_start();
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass1;
	        
	mysqli_select_db('gesdoju');
	
	$sql = "SELECT * FROM usuarios where user='$user' and password='$pass1' and role = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM usuarios where user='$user' and password='$pass1' and role = 0";
	$retval = mysqli_query($conn,$query);
	
	
	
	if(!$q && !$retval){	
			echo '<div class="alert alert-danger" role="alert">';
			echo "Error de Conexion..." .mysqli_error($conn);
			echo "</div>";
			echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
			exit;			
			
			}
		
			if($user = mysqli_fetch_assoc($retval)){
				

				echo '<div class="alert alert-danger" role="alert">';
				echo "<strong>Atención!  </strong>" .$_SESSION["user"];
				echo "<br>";
				echo '<span class="pull-center "><img src="icons/status/security-low.png"  class="img-reponsive img-rounded"><strong> Usuario Bloqueado. Contacte al Administrador.</strong>';
				echo "</div>";
				exit;
			}

			else if($user = mysqli_fetch_assoc($q)){

				if(strcmp($_SESSION["user"], 'root') == 0){

				echo "<br>";
				echo '<div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
  				echo '<meta http-equiv="refresh" content="5;URL=1/main/main.php "/>';
				
			}else{
				echo '<div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
  				echo '<meta http-equiv="refresh" content="5;URL=1/main/main.php "/>';
				
			}
			}else{
				echo '<div class="alert alert-danger" role="alert">';
				echo '<span class="pull-center "><img src="icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Usuario o Contraseña Incorrecta. Reintente Por Favor....';
				echo "</div>";
				}
				}
				}else{
				  mysqli_error($conn);
				}
	
			
	
	//cerramos la conexion
	
	mysqli_close($conn);
           
      ?>
      </div>
      </div>
  

  <!-- Post Content Column -->
      <div class="container">
      <div class="row">
      <div class="col-lg-8">

        <!-- Title -->
        <!-- Preview Image -->
        <br>
        <img class="img-fluid rounded" src="img/justice.jpg" alt="">
        <hr>
        
      </div>
      
      <div class="col-lg-4"><br>
      <p class="lead">Ingrese sus datos</p><hr>
      <form action="index.php" method="POST">
       <div class="form-group">
	<label for="usr">Usuario:</label>
	<input style="text-align: center" type="text" class="form-control" id="usr" name="user" placeholder="usuario_organismo">
      </div>
      <div class="form-group">
	<label for="pwd">Password:</label>
	<input  style="text-align: center" type="password" class="form-control" id="pwd" name="pass">
      </div>
       <button type="submit" class="btn btn-success" name="A">Ingresar</button>
       <button type="reset" class="btn btn-danger ">Limpiar</button>
      </form>
      <hr>
      
      </div>
      </div>
      </div>
      
     
      
   

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white"><img class="img-reponsive img-rounded" src="img/escudo32x32.png" /> Ministerio de Economía de la Nación - Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/gesdoju/skeleton/jquery/jquery.min.js"></script>
  <script src="/gesdoju/skeleton/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="/gesdoju/skeleton/js/scrolling-nav.js"></script>

</body>

</html>
