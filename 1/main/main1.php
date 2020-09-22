<?php include "../../connection/connection.php";
      include "../../functions/functions.php";
      
      
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />
  <title>Gestión Documental Jurídica</title>
  <?php skeleton();?>

      <!-- Custom styles for this template -->
  <link href="/gesdoju/skeleton/css/blog-post.css" rel="stylesheet">
  
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

 
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

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="main.php" data-toggle="tooltip" data-placement="right" title="Búsque y consulte normativas de manera sencilla"><img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Gestión Documental Jurídica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <form action="main.php" method="POST">
            <a class="nav-link js-scroll-trigger" href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos Personales"><button class="btn btn-default navbar-btn" type="submit" name="B"><img class="img-reponsive img-rounded" src="../../icons/actions/view-media-artist.png" /> <?php echo $nombre ?></button></a>
          </form>
          </li>      
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <a href="../../logout.php" data-toggle="tooltip" data-placement="left" title="Cerrar Sesión"> <button class="btn btn-danger navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</button></a>
      </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8"><br><hr>
	
	<?php
	
	if($conn){
	
	  if(isset($_POST['A'])){
	    newNorma();
	  }
	  if(isset($_POST['B'])){
	    loadUser($conn,$nombre);
	  }
	  if(isset($_POST['C'])){
	    normas($conn);
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
	
	}else{
	  mysqli_error($conn);
	}
	mysqli_close($conn);
	
	?>
        
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4"><br><hr>

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header bg-dark text-white"><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit-verify.png" /> Búsqueda</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">Aceptar</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4"> 
          <h5 class="card-header bg-dark text-white"><img class="img-reponsive img-rounded" src="../../icons/emblems/image-stack.png" /> Categorías</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <form action="main.php" method="POST">
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Leyes"><input type="submit" name="D" value="Ley"></a>
                  </li>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Decretos"><input type="submit" name="E" value="Decreto"></a>
                  </li>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Resoluciones"><input type="submit" name="F" value="Resolución"></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Disposiciones"><input type="submit" name="G" value="Disposición"></a>
                  </li>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Notas"><input type="submit" name="H" value="Nota"></a>
                  </li>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Listar Memos"><input type="submit" name="I" value="Memo"></a>
                  </li>
                  </form>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header bg-dark text-white"><img class="img-reponsive img-rounded" src="../../icons/status/task-delegate.png" /> Acciones</h5>
          <div class="card-body" align="center">
             <form action="main.php" method="POST">
	      <a href="#" data-toggle="tooltip" data-placement="right" title="Cargar Norma"><button type="submit" class="btn btn-secondary btn-sm" name="A"><img class="img-reponsive img-rounded" src="../../icons/apps/accessories-text-editor.png" /> Normativa</button></a>
	      <a href="#" data-toggle="tooltip" data-placement="right" title="Listar todas las Normas"><button type="submit" class="btn btn-secondary btn-sm" name="C"><img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Normativas</button></a><hr>
	      </form>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
    <p class="m-0 text-center text-white"><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> Ministerio de Economía de la Nación - Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
     </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/gesdoju/skeleton/jquery/jquery.min.js"></script>
  <script src="/gesdoju/skeleton/js/bootstrap.bundle.min.js"></script>
  
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
