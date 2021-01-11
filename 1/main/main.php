<?php include "../../connection/connection.php"; 
      include "../../functions/functions.php";
      include "../lib/lib_users.php";
      include "../lib/lib_normas.php";
      

      session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('gesdoju');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gesdoju</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />
  <?php skeleton(); ?>
  
  <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
  <!-- END Data Table Script -->
  
  <script >
    function limitText(limitField, limitNum) {
       if (limitField.value.length > limitNum) {
          
           alert("Ha ingresado más caracteres de los requeridos, deben ser: \n" + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
       
       if(limitField.value.lenght < limitNum){
	  alert("Ha ingresado menos caracteres de los requeridos, deben ser:  \n"  + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
}
</script>

<script>
function Numeros(string){
//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
             //Se añaden a la salida los caracteres validos
              out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permiten Números");
	     }
	     }
	
    //Retornar valor filtrado
    return out;
} 
</script>

<script> 
function Text(string){//validacion solo letras
    var out = '';
    //Se añaden las letras validas
    var filtro ="^[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ- ]+$"; // Caracteres Válidos
  
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
	     out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permite Texto");
	     }
	     }
    return out;
}
</script>

  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
  
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 160%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 60px;
  height: 60px;
  border-radius: 60%;
}
</style>
 
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <a href="main.php" data-toggle="tooltip" data-placement="bottom" title="Gestión Documental Jurídica"><button type="button" class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/go-home.png" /> Home</button></a>
     </ul>
     <ul class="nav navbar-nav">
     <form action="main.php" method="POST">
      <a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Datos Personales"><button type="submit" name="C" class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/view-media-artist.png" /> <?php echo $nombre ?></button></a>
      <?php 
      if($_SESSION['user'] == 'root'){
      echo '<a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Usuarios"><button type="submit" name="J" class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Usuarios</button></a>';
      }
      ?>
      </form>
     </ul>
      <ul class="nav navbar-nav navbar-right">
      <a href="../../logout.php" data-toggle="tooltip" data-placement="left" title="Cerrar Sesión"> <button class="btn btn-danger navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</button></a>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <form action="main.php" method="POST">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Cargar Norma"><button type="submit" class="btn btn-default btn-sm" name="A"><img class="img-reponsive img-rounded" src="../../icons/apps/accessories-text-editor.png" /> + Norma</button></a>
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listar Normas"><button type="submit" class="btn btn-default btn-sm" name="B"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Normas</button></a><hr>
		
	 <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Categorías</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
      <br>
        <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Leyes"><button type="submit" class="btn btn-default btn-sm" name="D"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Leyes</button></a><hr>
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listar Decretos"><button type="submit" class="btn btn-default btn-sm" name="E"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Decretos</button></a><hr>
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listar Resoluciones"><button type="submit" class="btn btn-default btn-sm" name="F"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Resoluciones</button></a><hr>
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listar Disposiciones"><button type="submit" class="btn btn-default btn-sm" name="G"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Disposiciones</button></a><hr>
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listar Notas"><button type="submit" class="btn btn-default btn-sm" name="H"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Notas</button></a><hr>
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listar Memos"><button type="submit" class="btn btn-default btn-sm" name="I"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Memos</button></a><hr>
	</form>
	</div>
      </ul>
      </div>
  </div>
</div> 
	
	  <div class="col-sm-10 text-left"> 
    <button class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/apps/clock.png" /> <?php echo "<strong>Hora Actual:</strong> " . date("H:i"); ?></button>
      <?php setlocale(LC_ALL,"es_ES.UTF-8"); ?>
      <button class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/view-calendar-day.png" /> <?php echo "<strong>Fecha Actual:</strong> ". strftime("%d de %b de %Y"); ?></button>
     <hr>
     <div class="alert alert-info">
        <img class="img-reponsive img-rounded" src="../../icons/actions/help-feedback.png" /> <strong>Bienvenido/a</strong> <?php echo $nombre ?> a <strong>Gesdoju - Gestión Documental Jurídica</strong>
     </div><hr>
     
      <?php
   
      if($conn){
	  
	  // seccion ABM de normas
	  if(isset($_POST['A'])){
	    newNorma($conn);
	  }
	  if(isset($_POST['add_norma'])){
        $n_norma = mysqli_real_escape_string($conn,$_POST['n_norma']);
        $tipo_norma = mysqli_real_escape_string($conn,$_POST['t_norma']);
        $foro_norma = mysqli_real_escape_string($conn,$_POST['foro_norma']);
        $f_pub = mysqli_real_escape_string($conn,$_POST['f_pub']);
        $anio = mysqli_real_escape_string($conn,$_POST['anio']);
        $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
        $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
        $unidad_fisica = mysqli_real_escape_string($conn,$_POST['ub_fis']);
        $obs = mysqli_real_escape_string($conn,$_POST['observaciones']);
        addNorma($n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$jurisdiccion,$organismo,$unidad_fisica,$obs,$conn);
	  }
	  if(isset($_POST['edit_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        editNorma($id,$conn);
	  }
	  if(isset($_POST['editar_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $n_norma = mysqli_real_escape_string($conn,$_POST['n_norma']);
        $tipo_norma = mysqli_real_escape_string($conn,$_POST['t_norma']);
        $foro_norma = mysqli_real_escape_string($conn,$_POST['foro_norma']);
        $f_pub = mysqli_real_escape_string($conn,$_POST['f_pub']);
        $anio = mysqli_real_escape_string($conn,$_POST['anio']);
        $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
        $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
        $unidad_fisica = mysqli_real_escape_string($conn,$_POST['ub_fis']);
        $obs = mysqli_real_escape_string($conn,$_POST['observaciones']);
        updateNorma($id,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$jurisdiccion,$organismo,$unidad_fisica,$obs,$conn);
	  }
	  if(isset($_POST['del_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formBorrarNorma($id,$conn);
	  }
	  if(isset($_POST['delete_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        delNorma($id,$conn);
	  }
	  if(isset($_POST['upload_file'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        selectFile($id);
	  }
	  if(isset($_POST['upload'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $file = basename($_FILES["file"]["name"]);
        uploadPDF($id,$file,$conn);
	  }
	  // fin seccion ABM de normas
	  
	  // seccion consulta de normas
	  if(isset($_POST['B'])){
	    normas($conn);
      }
	  if(isset($_POST['C'])){
	    loadUser($conn,$nombre);
	  }
	  if(isset($_POST['D'])){
	      $norma = "Ley";
	      normativas($conn,$norma);
	  }
	  if(isset($_POST['E'])){
	      $norma = "Decreto";
	      normativas($conn,$norma);
	  }
	  if(isset($_POST['F'])){
	      $norma = "Resolución";
	      normativas($conn,$norma);
	  }
	  if(isset($_POST['G'])){
	      $norma = "Disposición";
	      normativas($conn,$norma);
	  }
	  if(isset($_POST['H'])){
	      $norma = "Nota";
	      normativas($conn,$norma);
	  }
	  if(isset($_POST['I'])){
	      $norma = "Memo";
	      normativas($conn,$norma);
	  }
	  // fin seccion consulta de normas
	  
	  //seccion usuarios
	  if(isset($_POST['J'])){
	      usuarios($conn);
	}
	if(isset($_POST['add_user'])){
        newUser();
	}
	if(isset($_POST['insert_user'])){
        $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
        $user = mysqli_real_escape_string($conn,$_POST['user']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
        $pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        agregarUser($nombre,$user,$email,$pass1,$pass2,$role,$conn);
	}
	if(isset($_POST['del_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formBorrarUser($id,$conn);
	}
	if(isset($_POST['delete_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        delUser($id,$conn);
	}
	if(isset($_POST['allow_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formAllowUser($id,$conn);
	}
	if(isset($_POST['role_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        changeRole($id,$role,$conn);
	}
	if(isset($_POST['pass_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        editPassUser($id,$conn);
	}
	if(isset($_POST['change_pass'])){
       $id = mysqli_real_escape_string($conn,$_POST['id']);
       $pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
       $pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);
       updatePass($id,$pass1,$pass2,$conn);	
	}
	
	
	}else{
	  mysqli_error($conn);
	}
	mysqli_close($conn);
      
   
   
   ?>
      
      
      
     <br>
     </div>
 
  </div>
</div>

<footer class="container-fluid text-center">
  <p><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> Ministerio de Economía de la Nación - Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
</footer>

<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>

					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
						<a class="btn btn-danger btn-ok"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</div>
				</div>
			</div>
		</div>

		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
		
		<!-- END Modal -->

</body>
</html>
