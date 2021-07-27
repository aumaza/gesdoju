<?php session_start();      
      include "../../connection/connection.php"; 
      include "../../functions/functions.php";
      include "../lib/lib_users.php";
      include "../lib/lib_normas.php";
      include "../lib/lib_system.php";
      include "../lib/lib_organismos.php";
      include "../lib/lib_jurisdicciones.php";
      include "../lib/lib_autoridades_superiores.php";
      include "../lib/lib_funciones_ejecutivas.php";
      include "../lib/lib_escalas_sinep_pp.php";
      include "../lib/lib_adicional_grado.php";
      include "../lib/lib_unidades_retributivas.php";
      include "../lib/lib_tipo_organismos.php";

      
        $varsession = $_SESSION['user'];
	
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('gesdoju');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($varsession == null || $varsession = ''){
  echo '<!DOCTYPE html>
        <html lang="es">
        <head>
        <title>Gesdoju</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />';
        skeleton();
        echo '</head><body>';
        echo '<br><div class="container">
                <div class="alert alert-danger" role="alert">';
        echo '<p align="center"><img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
        echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
        echo "</div></div>";
        die();
        echo '</body></html>';
	}
	
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gesdoju</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />
  <?php skeleton(); ?>
  
  <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      
      $('#myTable').DataTable({
        "order": [[1, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "dom":  "Bfrtip",
        "buttons":        [ 'colvis' ],
        "fixedColumns": {
            leftColumns: 2
        },
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
          
           alert("Ha ingresado m�s caracteres de los requeridos, deben ser: \n" + limitNum);
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
             //Se a�aden a la salida los caracteres v�lidos
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
    //Se a?aden las letras validas
    var filtro ="^[abcdefghijklmn?opqrstuvwxyzABCDEFGHIJKLMN?OPQRSTUVWXYZ- ]+$"; // Caracteres V�idos
  
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
      height: auto;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
      height: auto;
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
.affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
  }

  .affix ~ .container-fluid {
    position: relative;
    padding-top: 70px;
  }

</style>
 
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" align="center">
        <h4><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> <strong>Ministerio de Economía de la Nación - Dirección de Presupuesto y Evaluación de Gastos en Personal</strong></h4>
        </div>
      </div>
      
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
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
      
      <a href="main.php" data-toggle="tooltip" data-placement="bottom" title="Gestión Documental Jurídica">
	<button type="button" class="btn btn-default navbar-btn">
	  <img class="img-reponsive img-rounded" src="../../icons/actions/go-home.png" /> Home</button></a>
     </ul>
     <ul class="nav navbar-nav">
     <form action="main.php" method="POST">
      
      <a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Datos Personales">
	<button type="submit" name="C" class="btn btn-default navbar-btn">
	  <img class="img-reponsive img-rounded" src="../../icons/actions/view-media-artist.png" /> <?php echo $nombre ?></button></a>
      <?php 
      if($_SESSION['user'] == 'root'){
      echo '<a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Usuarios">
	<button type="submit" name="J" class="btn btn-default navbar-btn">
	  <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Usuarios</button></a>';
      }
      ?>
      </form>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      
	<a href="../../logout.php" data-toggle="tooltip" data-placement="left" title="Cerrar Sesión"> 
	  <button class="btn btn-danger navbar-btn">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</button></a>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container-fluid">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <form action="main.php" method="POST">
	
	<button type="submit" class="btn btn-success btn-xs btn-block" name="B" data-toggle="tooltip" data-placement="right" title="Listar todas las Normas">
	    <img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Normas</button><br>
	
	 <div class="panel-group" id="accordion">
  
  
  <div class="panel panel-default" align="center">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Autoridades Superiores</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      
      <button type="submit" class="btn btn-default btn-xs btn-block" name="a_s" data-toggle="tooltip" data-placement="right" title="Listar Autoridades Superiores">
            <img class="img-reponsive img-rounded" src="../../icons/status/meeting-participant.png" /> Autoridades Superiores</button><hr>
     
     <button type="submit" class="btn btn-default btn-xs btn-block" name="promedio_autoridades" data-toggle="tooltip" data-placement="right" title="Calcular Promedios en Remuneraciones">
            <img class="img-reponsive img-rounded" src="../../icons/actions/office-chart-bar.png" /> Promedios</button>
      
      </div>
    </div>
  </div>
  
  <div class="panel panel-default" align="center">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Escalas Salariales</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      
      <button type="submit" class="btn btn-default btn-xs btn-block" name="sinep_pp" data-toggle="tooltip" data-placement="right" title="Listar Escalas Salariales Planta Permanente">
            <img class="img-reponsive img-rounded" src="../../icons/actions/format-list-ordered.png" /> SINEP Planta Permanente</button><hr>
      
      </div>
    </div>
  </div>
  
  
  <div class="panel panel-default" align="center">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
        Tablas Base</a>
      </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse">
      <div class="panel-body">
      
      <button type="submit" class="btn btn-default btn-xs btn-block" name="funciones_ejecutivas" data-toggle="tooltip" data-placement="right" title="Listar Funciones Ejecutivas">
            <img class="img-reponsive img-rounded" src="../../icons/actions/quickopen-class.png" /> Funciones Ejecutivas</button><hr>
      
      <button type="submit" class="btn btn-default btn-xs btn-block" name="adicional_grado" data-toggle="tooltip" data-placement="right" title="Listar Adicionales por Grado">
            <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Adicional Grado</button><hr>
      
      <button type="submit" class="btn btn-default btn-xs btn-block" name="unidades_retributivas" data-toggle="tooltip" data-placement="right" title="Listar Unidades Retributivas por Nivel y Grado">
            <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Unidades Retributivas</button><hr>
            
      <button type="submit" class="btn btn-default btn-xs btn-block" name="tipo_organismos" data-toggle="tooltip" data-placement="right" title="Listar los distintos tipos de Organismos">
            <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Tipo Organismo</button>
      
      </div>
    </div>
  </div>
  
  <div class="panel panel-default" align="center">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
        Explorador de Archivos</a>
      </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse">
      <div class="panel-body">
      
      <a href="../explorer/index.php" data-toggle="tooltip" data-placement="right" title="Ir al Exlorardor de Archivos" target="_blank"><button type="button" class="btn btn-default btn-xs btn-block"><img class="img-reponsive img-rounded" src="../../icons/places/user-home.png" /> Explorer</button></a>
      </div>
    </div>
  </div>
  
</div> 

  
  <?php 
	
	if($_SESSION['user'] == 'root'){
	
        echo '<div class="panel-group">
                <div class="panel panel-primary" align="center">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse6">Mantenimiento</a>
                    </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse">
                    <div class="panel-body">
                    <br>
                    
                    <button type="submit" class="btn btn-default btn-xs btn-block" name="back_up" data-toggle="tooltip" data-placement="right" title="Backup de Archivos Subidos"><img class="img-reponsive img-rounded" src="../../icons/apps/utilities-file-archiver.png" /> BackUp</button><hr>
                    
                    <button type="submit" class="btn btn-default btn-xs btn-block" name="dump_base" data-toggle="tooltip" data-placement="right" title="Backup Base de Datos"><img class="img-reponsive img-rounded" src="../../icons/actions/svn-update.png" /> BackUp Base</button><hr>
                    </div>
                </div>
                </div>
                </div>';
                // fin seccion mantenimiento
                
        echo '<div class="panel-group" id="accordion">
                <div class="panel panel-default" align="center">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        Organismos</a>
                    </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                    
                    <button type="submit" class="btn btn-default btn-xs btn-block" name="K" data-toggle="tooltip" data-placement="right" title="Listar Organismos"><img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Organismos</button>
                    
                    </div>
                    </div>
                </div>
                
                <div class="panel panel-default" align="center">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        Jurisdicciones</a>
                    </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                    
                    <button type="submit" class="btn btn-default btn-xs btn-block" name="L" data-toggle="tooltip" data-placement="right" title="Listar Jurisdicciones"><img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Jurisdicciones</button>
                    
                    </div>
                    </div>
                </div>
              </div>';
	
	}
	?>
  
  </form>
</div> 
	
	  <div class="col-sm-10 text-left"> 
    <button class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/apps/clock.png" /> <?php echo "<strong>Hora Actual:</strong> " . date("H:i"); ?></button>
      <?php setlocale(LC_ALL,"es_ES.UTF-8"); ?>
      <button class="btn btn-default navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/actions/view-calendar-day.png" /> <?php echo "<strong>Fecha Actual:</strong> ". strftime("%d de %b de %Y"); ?></button>
      <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal2">
            <img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Acerca de Gesdoju</button>
     <hr>
          
      <?php
   
      if($conn){
	  
	  // seccion ABM de normas
	  if(isset($_POST['nueva_norma'])){
	    newNorma($conn);
	  }
	  if(isset($_POST['add_normativa'])){
        $nombre_norma = mysqli_real_escape_string($conn,$_POST['nombre_norma']);
        $n_norma = mysqli_real_escape_string($conn,$_POST['n_norma']);
        $tipo_norma = mysqli_real_escape_string($conn,$_POST['t_norma']);
        $foro_norma = mysqli_real_escape_string($conn,$_POST['foro_norma']);
        $f_pub = mysqli_real_escape_string($conn,$_POST['f_pub']);
        $anio = mysqli_real_escape_string($conn,$_POST['anio']);
        $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
        $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
        $clas_inst = mysqli_real_escape_string($conn,$_POST['clas_inst']);
        $unidad_fisica = mysqli_real_escape_string($conn,$_POST['ub_fis']);
        $obs = mysqli_real_escape_string($conn,$_POST['observaciones']);
        $file = basename($_FILES["file"]["name"]);
    insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$organismo,$jurisdiccion,$clas_inst,$unidad_fisica,$obs,$file,$conn);
    }
	  if(isset($_POST['edit_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        editNorma($id,$conn);
	  }
	  if(isset($_POST['editar_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $nombre_norma = mysqli_real_escape_string($conn,$_POST['nombre_norma']);
        $n_norma = mysqli_real_escape_string($conn,$_POST['n_norma']);
        $tipo_norma = mysqli_real_escape_string($conn,$_POST['t_norma']);
        $foro_norma = mysqli_real_escape_string($conn,$_POST['foro_norma']);
        $f_pub = mysqli_real_escape_string($conn,$_POST['f_pub']);
        $anio = mysqli_real_escape_string($conn,$_POST['anio']);
        $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
        $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
        $unidad_fisica = mysqli_real_escape_string($conn,$_POST['ub_fis']);
        $obs = mysqli_real_escape_string($conn,$_POST['observaciones']);
        updateNorma($id,$nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$jurisdiccion,$organismo,$unidad_fisica,$obs,$conn);
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
	  
	  // fin seccion consulta de normas
	  // ============================================================================== //
	  
	  // secci?n AUTORIDADES SUPERIORES
	  if(isset($_POST['a_s'])){
	    autoridadesSuperiores($conn);
	  }
	  if(isset($_POST['add_as'])){
	    formAddAutoridad($conn);
	  }
	  if(isset($_POST['add_funcionario'])){
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
	    $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
	    $funcionario = mysqli_real_escape_string($conn,$_POST['funcionario']);
	    $cargo = mysqli_real_escape_string($conn,$_POST['cargo']);
	    $asignacion_mensual = mysqli_real_escape_string($conn,$_POST['salario']);
	    $desarraigo = mysqli_real_escape_string($conn,$_POST['desarraigo']);
	    $sac = mysqli_real_escape_string($conn,$_POST['sac']);
	    $otros = mysqli_real_escape_string($conn,$_POST['otros_conceptos']);
	    $observaciones = mysqli_real_escape_string($conn,$_POST['observaciones']);
	    addAutoridad($anio,$mes,$jurisdiccion,$funcionario,$cargo,$asignacion_mensual,$desarraigo,$sac,$otros,$observaciones,$conn);
	  }
	  if(isset($_POST['edit_autoridad'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    formEditAutoridad($id,$conn);
	  }
	  if(isset($_POST['update_funcionario'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
	    $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
	    $funcionario = mysqli_real_escape_string($conn,$_POST['funcionario']);
	    $cargo = mysqli_real_escape_string($conn,$_POST['cargo']);
	    $asignacion_mensual = mysqli_real_escape_string($conn,$_POST['salario']);
	    $desarraigo = mysqli_real_escape_string($conn,$_POST['desarraigo']);
	    $sac = mysqli_real_escape_string($conn,$_POST['sac']);
	    $otros = mysqli_real_escape_string($conn,$_POST['otros_conceptos']);
	    $observaciones = mysqli_real_escape_string($conn,$_POST['observaciones']);
	    updateAutoridad($id,$anio,$mes,$jurisdiccion,$funcionario,$cargo,$asignacion_mensual,$desarraigo,$sac,$otros,$observaciones,$conn);
	  }
	  if(isset($_POST['del_autoridad'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    formBorrarAutoridad($id,$conn);
	  }
	  if(isset($_POST['delete_autoridad'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    delAutoridad($id,$conn);
	  }
	  if(isset($_POST['promedio_autoridades'])){
	    formPromedio();
	  }
	  if(isset($_POST['promedio_mes_autoridades'])){
	    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    filtroMesAutoridades($mes,$anio,$conn);
	  }
	  if(isset($_POST['promedio_anio_autoridades'])){
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    filtroAnioAutoridades($anio,$conn);
	  }
	    
	  
	  // fin secci?n AUTORIDADES SUPERIORES
	  // =============================================================================== //
	  
	  // SECCION ESCALAS SALARIALES
	  // =============================================================================== //
	  // SUBSECCION FUNCIONES EJECUTIVAS
	  // =============================================================================== //
	  if(isset($_POST['funciones_ejecutivas'])){
	    funcionesEjecutivas($conn);
	  }
	  if(isset($_POST['add_fe'])){
	    formAddFuncionEjecutiva($conn);
	  }
	  if(isset($_POST['add_funcion_ejecutiva'])){
	    $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
	    $cant_ur = mysqli_real_escape_string($conn,$_POST['cant_ur']);
	    $valor_ur = mysqli_real_escape_string($conn,$_POST['valor_ur']);
	    $norma_regulatoria = mysqli_real_escape_string($conn,$_POST['norma_regulatoria']);
	    $f_vigencia = mysqli_real_escape_string($conn,$_POST['f_entrada_vigencia']);
	    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    addFuncionEjecutiva($nivel,$cant_ur,$valor_ur,$norma_regulatoria,$f_vigencia,$mes,$anio,$conn);
	  }
	  if(isset($_POST['edit_funcion_ejecutiva'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    formEditFuncionEjecutiva($id,$conn);
	  }
	  if(isset($_POST['update_fe'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
	    $cant_ur = mysqli_real_escape_string($conn,$_POST['cant_ur']);
	    $valor_ur = mysqli_real_escape_string($conn,$_POST['valor_ur']);
	    $norma_regulatoria = mysqli_real_escape_string($conn,$_POST['norma_regulatoria']);
	    $f_vigencia = mysqli_real_escape_string($conn,$_POST['f_entrada_vigencia']);
	    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    updateFuncionEjecutiva($id,$nivel,$cant_ur,$valor_ur,$norma_regulatoria,$f_vigencia,$mes,$anio,$conn);
	  }
	  if(isset($_POST['del_funcion_ejecutiva'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    formBorrarFuncionEjecutiva($id,$conn);
	  }
	  if(isset($_POST['delete_funcion_ejecutiva'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
	    delFuncionEjecutiva($id,$conn);
	  }
	  // FIN SUBSECCION FUNCIONES EJECUTIVAS
	  
	  // =============================================================================== //
	  // SECCION ESCALAS SINEP PLANTA PERMANENTE
	  // =============================================================================== //
	  if(isset($_POST['sinep_pp'])){
	    escalasSinepPP($conn);
	  }
	  if(isset($_POST['add_pp'])){
	    formAddSinepPP($conn);
	  }
	  if(isset($_POST['add_sinep_pp'])){
	    $norma_regulatoria = mysqli_real_escape_string($conn,$_POST['norma_regulatoria']);
	    $f_vigencia = mysqli_real_escape_string($conn,$_POST['f_entrada_vigencia']);
	    $mes = mysqli_real_escape_string($conn,$_POST['mes']);
	    $anio = mysqli_real_escape_string($conn,$_POST['anio']);
	    $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
	    $grado = mysqli_real_escape_string($conn,$_POST['grado']);
	    $agrupamiento = mysqli_real_escape_string($conn,$_POST['agrupamiento']);
	    $valor_ur = mysqli_real_escape_string($conn,$_POST['valor_ur']);
	    $sueldo_ur = mysqli_real_escape_string($conn,$_POST['sueldo_ur']);
	    $dedicacion_funcional_ur = mysqli_real_escape_string($conn,$_POST['dedicacion_funcional_ur']);
	    addSinepPP($norma_regulatoria,$f_vigencia,$mes,$anio,$nivel,$grado,$agrupamiento,$valor_ur,$sueldo_ur,$dedicacion_funcional_ur,$conn);
	  }
	  
	  
	  
	  // FIN SUBSECCION ESCALAS SINEP PLANTA PERMANENTE
	  // =============================================================================== //
	  
	  
	  
	  // SECCION ADICIONAL GRADO
	  // =============================================================================== //
	  if(isset($_POST['adicional_grado'])){
        adicionalGrado($conn);
	  }
	  if(isset($_POST['add_adicional_grado'])){
        formAddAdicionalGrado($conn);
	  }
	  if(isset($_POST['add_adi_gr'])){
        $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
        $grado = mysqli_real_escape_string($conn,$_POST['grado']);
        $cant_ur = mysqli_real_escape_string($conn,$_POST['cant_ur']);
        addAdicionalGrado($nivel,$grado,$cant_ur,$conn);
	  }
	  if(isset($_POST['edit_adicional_grado'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditAdicionalGrado($id,$conn);
	  }
	  if(isset($_POST['update_adicional_grado'])){
	    $id = mysqli_real_escape_string($conn,$_POST['id']);
        $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
        $grado = mysqli_real_escape_string($conn,$_POST['grado']);
        $cant_ur = mysqli_real_escape_string($conn,$_POST['cant_ur']);
        updateAdicionalGrado($id,$nivel,$grado,$cant_ur,$conn);
	  }
	  if(isset($_POST['del_adicional_grado'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formBorrarAdicionalGrado($id,$conn);
      }
      if(isset($_POST['delete_adicional_grado'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        delAdicionalGrado($id,$conn);
      }
	  
	  
	  
	  
	  //FIN SECCION ADICIONAL GRADO
	  // =============================================================================== //
	  
	  // SECCION UNIDADES RETIBUTIVAS
	  // =============================================================================== //
	  if(isset($_POST['unidades_retributivas'])){
	    unidadesRetributivas($conn);
	  }
	  if(isset($_POST['add_ur'])){
        formAddUR($conn);
	  }
	  if(isset($_POST['edit_ur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditUR($id,$conn);
	  }
	  if(isset($_POST['del_ur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formBorrarUR($id,$conn);
	  }
	  if(isset($_POST['agregar_ur'])){
        $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
        $grado = mysqli_real_escape_string($conn,$_POST['grado']);
        $sueldo_ur = mysqli_real_escape_string($conn,$_POST['sueldo_cant_ur']);
        $df_ur = mysqli_real_escape_string($conn,$_POST['df_cant_ur']);
        addUR($nivel,$grado,$sueldo_ur,$df_ur,$conn);
	  }
	  if(isset($_POST['delete_ur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        delUR($id,$conn);
	  }
	  if(isset($_POST['update_ur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $nivel = mysqli_real_escape_string($conn,$_POST['nivel']);
        $grado = mysqli_real_escape_string($conn,$_POST['grado']);
        $sueldo_ur = mysqli_real_escape_string($conn,$_POST['sueldo_cant_ur']);
        $df_ur = mysqli_real_escape_string($conn,$_POST['df_cant_ur']);
        updateUR($id,$nivel,$grado,$sueldo_ur,$df_ur,$conn);
	  }
	  
	  
	  // FIN SECCION UNIDADES RETIBUTIVAS
	  // =============================================================================== //
	  
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
	// fin seccion usuarios
	
	// seccion mantenimiento
	if(isset($_POST['back_up'])){
        backup();
	}
	if(isset($_POST['dump_base'])){
        dumpMysql($conn);
	}
	//fin seccion mantenimiento
	
	// seccion organismos
	if(isset($_POST['K'])){
       organismos($conn); 
	}
	if(isset($_POST['add_org'])){
       newOrganismo($conn);
	}
	if(isset($_POST['add_organismo'])){
        $cod_org = mysqli_real_escape_string($conn,$_POST['cod_org']);
        $cod_org = strtoupper($cod_org);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        $descripcion = strtoupper($descripcion);
        addOrganismo($cod_org,$descripcion,$conn);
	}
	if(isset($_POST['edit_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditOrganismo($id,$conn);
	}
	if(isset($_POST['updateOrg'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $cod_org = mysqli_real_escape_string($conn,$_POST['cod_org']);
        $cod_org = strtoupper($cod_org);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        $descripcion = strtoupper($descripcion);
        updateOrganismo($id,$cod_org,$descripcion,$conn);
	}
	if(isset($_POST['del_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formBorrarOrganismo($id,$conn);
	}
	if(isset($_POST['delete_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        delOrganismo($id,$conn);
	}
	// fin seccion organismos
	
	// seccion jurisdicciones
	if(isset($_POST['L'])){
        jurisdicciones($conn);
	}
	if(isset($_POST['add_jur'])){
        newJurisdiccion($conn);
	}
	if(isset($_POST['add_jurisdiccion'])){
        $cod_jur = mysqli_real_escape_string($conn,$_POST['cod_jur']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        $descripcion = strtoupper($descripcion);
        add_jurisdiccion($cod_jur,$descripcion,$conn);
	}
	if(isset($_POST['edit_jur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formEditJurisdiccion($id,$conn);
	}
	if(isset($_POST['updateJur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $cod_jur = mysqli_real_escape_string($conn,$_POST['cod_jur']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        $descripcion = strtoupper($descripcion);
        updateJurisdiccion($id,$cod_jur,$descripcion,$conn);
	
	}
	if(isset($_POST['del_jur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        formBorrarJurisdiccion($id,$conn);
	}
	if(isset($_POST['delete_jur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        delJurisdiccion($id,$conn);
	}
	
	// fin seccion jurisdicciones
	
	// ============================ TIPO DE ORGANISMOS ========================= //
	//LISTAR LOS TIPOS DE ORGANISMOS
	if(isset($_POST['tipo_organismos'])){
        tipoOrganismos($conn);
	}
	//FORMULARIO PARA AÑADIR NUEVO TIPO DE ORGANISMO
	if(isset($_POST['add_tipo_org'])){
        newTipoOrganismo($conn);
	}
	//FORMULARIO DE EDICION DE TIPO DE ORGANISMO
	if(isset($_POST['edit_tipo_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        editTipoOrganismo($id,$conn);
	}
	//persistencia a base de datos
	if(isset($_POST['add_tipo_organismo'])){
        $cod_org = mysqli_real_escape_string($conn,$_POST['cod_org']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        addTipoOrganismo($cod_org,$descripcion,$conn);
	}
	if(isset($_POST['update_tipo_organismo'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $cod_org = mysqli_real_escape_string($conn,$_POST['cod_org']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
        updateTipoOrganismo($id,$cod_org,$descripcion,$conn);
	}
	
	
	
	// ============================ FIN TIPO DE ORGANISMOS ========================= //
	
	}else{
	  mysqli_error($conn);
	}
	
	
	
	mysqli_close($conn);
      
   
   
   ?>
      
      
      
    
     </div>
 
  </div>
</div><br>



<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>

					<div class="modal-body">
						Desea eliminar este registro?
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
		
		<!-- script para insertar pedidos de cafeteria via web -->
<script type="text/javascript">
$(document).ready(function(){
    $('#add_normativa').click(function(){
        var datos=$('#nueva_norma_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../lib/insertar_normas.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Normativa Agregada Exitosamente");
                    location.href = "main.php";
                    }else{
                    alert("Hubo un problema al intentar Agregar la Normativa");
                }
            }
        });

        return false;
    });
});
</script>
		
		<!-- END Modal -->
		
		<!-- Modal 2 -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            <img class="img-reponsive img-rounded" src="../../icons/status/dialog-information.png" /> Acerca de Gesdoju</h4>
      </div>
      <div class="modal-body">
        
        <div class="container-fluid">
            <ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">
        <img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Gesdoju</a></li>
    <li><a data-toggle="tab" href="#menu1">
        <img class="img-reponsive img-rounded" src="../../icons/categories/preferences-system.png" /> Desarroladores</a></li>
    <li><a data-toggle="tab" href="#menu2">
        <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Colaboradores</a></li>
    <li><a data-toggle="tab" href="#menu3">
        <img class="img-reponsive img-rounded" src="../../icons/actions/flag-green.png" /> Version</a></li>
    <li><a data-toggle="tab" href="#menu4">
        <img class="img-reponsive img-rounded" src="../../icons/actions/bookmarks-organize.png" /> Licencia</a></li>
    <li><a data-toggle="tab" href="#menu5">
        <img class="img-reponsive img-rounded" src="../../icons/actions/mail-mark-task.png" /> Características Técnicas</a></li>
    </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Gestión de Documentación Jurídica</h2>
      <p align="center">Aplicación destinada a la carga, administración y consulta de documentación jurídica, como así también a la administración de escalas salariales tanto de Autoridades Superiores como del personal administrativo en la Administración Pública Nacional </p>
    </div>
    
    <div id="menu1" class="tab-pane fade">
      <h2>Augusto Maza</h2>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/run-build.png" /> Desarrollador Principal</p>
    </div>
    
    <div id="menu2" class="tab-pane fade">
      <h2>Sonia Boiarov</h2>
      <p><img class="img-reponsive img-rounded" src="../../icons/apps/akregator.png" /> Asesoramiento Jurídico</p>
    </div>
    
    <div id="menu3" class="tab-pane fade">
      <h2>1.0.0</h2>
      <p>Version beta</p>
      <p>2019-2021</p>
    </div>
    
    <div id="menu4" class="tab-pane fade">
      <h2>GNU GPL</h2>
      <p><a href="https://www.gnu.org/licenses/old-licenses/gpl-2.0.html" target="_blank"> Version 2</a></p>

    </div>
    
    <div id="menu5" class="tab-pane fade">
      <h2>Tecnología</h2>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> HTML 5</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> PHP 5 o superior</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> JavaScript</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> MariaDB 5 o superior</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> Bootstrap 3 (framework)</p>
    </div>
    
  </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
            <img class="img-reponsive img-rounded" src="../../icons/actions/window-close.png" /> Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- END Modal 2 -->

</body>
</html>
