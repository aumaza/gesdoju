<?php


/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/gesdoju/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/scrolling-nav.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/gesdoju/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/Chart.js/Chart.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/Chart.js/Chart.css" >
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="/gesdoju/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/gesdoju/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/gesdoju/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/gesdoju/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/gesdoju/skeleton/js/dataTables.select.min.js"></script>
	<script src="/gesdoju/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/gesdoju/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/gesdoju/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/gesdoju/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/gesdoju/skeleton/Chart.js/Chart.js"></script>';
}


/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

function cambiarPermisos($id,$role,$conn){

  $sql = "UPDATE usuarios set role = '$role' where id = '$id'";
  mysqli_select_db('gesdoju');
  $retval = mysqli_query($conn,$sql);
  if($retval){
    
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Rol Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
	  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "El usuario no existe. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
 
}













?>
