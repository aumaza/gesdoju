<?php   session_start();
        include "connection/connection.php";
        include "functions/functions.php";
        include "1/lib/system/lib_system.php";
      
      
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>GESDO [ Gestión Documental ]</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="icons/apps/accessories-dictionary.png" />
  <meta name="description" content="">
  <meta name="author" content="">
 
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>

<body id="page-top">

  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   
    <ul class="nav navbar-nav">
      <a href="registro/password.php" data-toggle="tooltip" data-placement="bottom" title="Ingrese aquí para blanquear su Password"><button type="button" class="btn btn-light navbar-btn"><img class="img-reponsive img-rounded" src="icons/status/task-attempt.png" /> Olvidé mi Password</button></a>
      </ul>
   </nav>

  
    <div class="container text-center">
      <h1>GESDO [ Gestión Documental ]</h1>
     </div><br>
   <div class="container">
   <div class="main">
  
   <?php
                 
         if($conn){
         
            if(isset($_POST['A'])){
                
                    $user = mysqli_real_escape_string($conn,$_POST["user"]);
                    $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
                    logIn($user,$pass,$conn,$dbase);
            }
        }else{
            echo 'Error Conction...';
        }
	
	
           
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="skeleton/js/scrolling-nav.js"></script>
  <script src="skeleton/js/bootstrap.min.js"></script>

</body>

</html>
