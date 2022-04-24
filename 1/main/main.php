<?php session_start(); 
      ini_set('display_errors', 0);
      include "../../connection/connection.php"; 
      include "../../functions/functions.php";
      include "../lib/lib_main.php";
      include "../lib/lib_users.php";
      include "../lib/normas/lib_normas.php";
      include "../lib/lib_system.php";
      include "../lib/organismos/lib_organismos.php";
      include "../lib/jurisdicciones/lib_jurisdicciones.php";
      include "../lib/lib_autoridades_superiores.php";
      include "../lib/lib_funciones_ejecutivas.php";
      include "../lib/lib_escalas_sinep_pp.php";
      include "../lib/lib_adicional_grado.php";
      include "../lib/lib_unidades_retributivas.php";
      include "../lib/tipo_organismo/lib_tipo_organismos.php";
      include "../lib/segmentacion_tematica/lib_segmentacion_tematica.php";
      include "../lib/paritarias/lib_paritarias.php";
      include "../lib/representantes/lib_representantes.php";
      include "../lib/grupo_representantes/lib_grupo_representante.php";
      include "../lib/tipo_norma/lib_tipo_norma.php";
      include "../lib/ambito_norma/lib_ambito_norma.php";
      include "../lib/normas_vinculadas/lib_normas_vinculadas.php";

      
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
  <link rel="stylesheet" href="main.css" >
  <?php skeleton(); ?>
  
    <script type="text/javascript" src="main.js"></script>
   

 
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="nobackbutton();">

<div class="panel-group">
    
        <!-- ENCABEZAD0  -->
    <?php encabezado(); ?>
    
        <!-- NAVBAR  -->
    <?php navBar($_SESSION['user'],$nombre); ?>

        <!-- LEFT PANEL -->
    <?php leftPanel($_SESSION['user']); ?>

  

        <!-- CENTRAL PANEL -->
	  <div class="col-sm-10 text-left"> 
        
            <!-- BOTONES INFORMATIVOS -->
        <?php infoButttons(); ?>
          
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
        $unidad_fisica = mysqli_real_escape_string($conn,$_POST['ub_fis']);
        $obs = mysqli_real_escape_string($conn,$_POST['observaciones']);
        $file = basename($_FILES["file"]["name"]);
        
        $nombre_norma = quitarTildes($nombre_norma);
        $obs = quitarTildes($obs);
        
        if(($nombre_norma == '') ||
                ($n_norma == '') ||
                    ($tipo_norma == '') ||
                        ($foro_norma == '') ||
                            ($f_pub == '') ||
                                ($anio == '') ||
                                    ($organismo == '') ||
                                        ($jurisdiccion == '') ||
                                            ($unidad_fisica == '') ||
                                                ($obs == '') ||
                                                    ($file == '')){
            echo '<div class="alert alert-warning">
                    <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hay Campos sin Completar!!.
                    </div>';
        
        }else{
            insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$organismo,$jurisdiccion,$unidad_fisica,$obs,$file,$conn);
      }
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
        
        $nombre_norma = quitarTildes($nombre_norma);
        $obs = quitarTildes($obs);
        
        if(($id == '') ||
            ($nombre_norma == '') ||
                ($n_norma == '') ||
                    ($tipo_norma == '') ||
                        ($foro_norma == '') ||
                            ($f_pub == '') ||
                                ($anio == '') ||
                                    ($organismo == '') ||
                                        ($jurisdiccion == '') ||
                                            ($unidad_fisica == '') ||
                                                ($obs == '')){
            echo '<div class="alert alert-warning">
                    <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hay Campos sin Completar!!.
                    </div>';
        
        }else{
            updateNorma($id,$nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$jurisdiccion,$organismo,$unidad_fisica,$obs,$conn);
	  }
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
        $tipo_archivo = mysqli_real_escape_string($conn,$_POST['tipo_archivo']);
        $file = basename($_FILES["file"]["name"]);
        uploadPDF($id,$file,$tipo_archivo,$conn);
	  }
	  if(isset($_POST['info_norma'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        infoNorma($id,$conn);
	  }
	  if(isset($_POST['subir_archivo'])){
        formSubirArchivo();
	  }
	  
	  
	  // fin seccion ABM de normas
	  
	  // SECCION CONSULTA DE NORMAS
	  if(isset($_POST['B'])){
	    normas($conn);
      }
      if(isset($_POST['busqueda_avanzada'])){
        formAdvanceSearch();
      }
      if(isset($_POST['search'])){
        $palabra_clave = mysqli_real_escape_string($conn,$_POST['palabra_clave']);
        $fecha_desde = mysqli_real_escape_string($conn,$_POST['fecha_desde']);
        $fecha_hasta = mysqli_real_escape_string($conn,$_POST['fecha_hasta']);
        searchAdvanceResults($palabra_clave,$fecha_desde,$fecha_hasta,$conn);
      }
      // FIN SECCION CONSULTA DE NORMAS
      
      // ============================================================================== //
      // SECCION NORMAS VINCULADAS
      // SE CREA EL OBJETO
      $obj_norma_vinculada = new NormasVinculadas();
      
      if(isset($_POST['add_normas_vinculadas'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $obj_norma_vinculada->formAltaVincularNormas($id,$conn,$dbase);
      }
      if(isset($_POST['add_nueva_norma_vinculada'])){
        $id_norma = mysqli_real_escape_string($conn,$_POST['id']);
        $norma = mysqli_real_escape_string($conn,$_POST['norma']);
        $files[] = array($_FILES["files"]["name"]);
        $obj_norma_vinculada->addNormasVinculadas($obj_norma_vinculada,$id_norma,$norma,$files,$conn,$dbase);     
      }
      if(isset($_POST['ver_normas_vinculadas'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $obj_norma_vinculada->listarNormasVinculadas($id,$conn,$dbase);
      }
      
      
      // FIN SECCION NORMAS VINCULADAS
	  
	  // SECCION CARGAR USUARIOS
	  if(isset($_POST['C'])){
	    loadUser($conn,$nombre);
	  }
	  
	  
	  // ============================================================================== //
	  
	  // SECCION AUTORIDADES SUPERIORES
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
	    
	  
	  // FIN SECCION AUTORIDADES SUPERIORES
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
	  
	  //SECCION USUARIOS //
	  // =============================================================================== //
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
	// FIN SECCION USUARIOS //
	// =============================================================================== //
	
	// SECCION MANTENIMIENTO //
	// =============================================================================== //
	if(isset($_POST['back_up'])){
        backup();
	}
	if(isset($_POST['dump_base'])){
        dumpMysql($conn);
	}
	// FIN SECCION MANTENIMIENTO //
	// =============================================================================== //
	
	// SECCION ORGANISMOS //
	// =============================================================================== //
	// SE CREO EL OBJETO ORGoNISMO
	$my_organismo = new Organismos();
	
	if(isset($_POST['listar_organismos'])){
       $my_organismo->listarOrganismos($my_organismo,$conn); 
	}
	if(isset($_POST['add_org'])){
       $my_organismo->newOrganismo($conn);
	}
	if(isset($_POST['edit_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_organismo->formEditOrganismo($id,$my_organismo,$conn);
	}
	if(isset($_POST['del_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_organismo->formBorrarOrganismo($id,$my_organismo,$conn);
	}
	if(isset($_POST['delete_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_organismo->delOrganismo($id,$conn);
	}
	// FIN SECCION ORGANISMOS //
	// =============================================================================== //
	
	// SECCION JURIDISDICCIONES //
	// =============================================================================== //
	// SE CREA EL OBJETO
	$my_jurisdiccion = new Jurisdicciones();
	
	if(isset($_POST['L'])){
        $my_jurisdiccion->listarJurisdicciones($my_jurisdiccion,$conn);
	}
	if(isset($_POST['add_jur'])){
        $my_jurisdiccion->newJurisdiccion($conn);
	}
	if(isset($_POST['edit_jur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_jurisdiccion->formEditJurisdiccion($my_jurisdiccion,$id,$conn);
	}
	if(isset($_POST['del_jur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_jurisdiccion->formBorrarJurisdiccion($my_jurisdiccion,$id,$conn);
	}
	if(isset($_POST['delete_jur'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_jurisdiccion->delJurisdiccion($id,$conn);
	}
	
	// FIN SECCION JURIDISDICCIONES //
	// =============================================================================== //
	
	// ============================ TIPO DE ORGANISMOS ========================= //
	// SE CREA EL OBJETO
	$my_tipo_organismo = new TipoOrganismos();

	//LISTAR LOS TIPOS DE ORGANISMOS
	if(isset($_POST['tipo_organismos'])){
        $my_tipo_organismo->listarTipoOrganismos($my_tipo_organismo,$conn);
	}
	//FORMULARIO PARA AÑADIR NUEVO TIPO DE ORGANISMO
	if(isset($_POST['add_tipo_org'])){
        $my_tipo_organismo->newTipoOrganismo();
	}
	//FORMULARIO DE EDICION DE TIPO DE ORGANISMO
	if(isset($_POST['edit_tipo_org'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $my_tipo_organismo->editTipoOrganismo($my_tipo_organismo,$id,$conn);
	}
	// ============================ FIN TIPO DE ORGANISMOS ========================= //
	
	// ============================ SEGMENTACION TEMATICA ========================= //
	// SE INICIALIZA EL OBJETO
	$segmentacion = new SegmentacionTematica();
	
	if(isset($_POST['segmentacion_tematica'])){
        $segmentacion->listarSegmentacionTematica($segmentacion,$conn);
	}
	if(isset($_POST['nueva_segmentacion'])){
        $segmentacion->formNewSegmentacion($conn);
	}
	if(isset($_POST['edit_segmentacion'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $segmentacion->formEditSegmentacion($id,$conn,$dbase);
	}
	if(isset($_POST['del_segmentacion'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $segmentacion->formBorrarSegmentacion($id,$conn,$dbase);
	}
	if(isset($_POST['info_segmentacion'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $segmentacion->infoSegmentacion($segmentacion,$id,$conn,$dbase);
	}
	if(isset($_POST['busqueda_avanzada_segmentacion'])){
        $segmentacion->formAdvanceSearchSegmentacion($conn,$dbase);
	}
	if(isset($_POST['search_segmentacion'])){
        $clas_inst = mysqli_real_escape_string($conn,$_POST['clas_inst']);
        $segmentacion->searchAdvanceResultsSegmentacion($clas_inst,$conn,$dbase);
	}
	// ============================ FIN SEGMENTACION TEMATICA ========================= //
	
	
	// ============================ REPRESENTACION PARITARIAS ========================= //
	// se crea el objeto
	$paritaria = new Paritarias();
	
	if(isset($_POST['paritarias'])){
        $paritaria->listarParitarias($paritaria,$conn);        
	}
	if(isset($_POST['nueva_paritaria'])){
        $paritaria->formAltaParitaria($conn);
	}
	if(isset($_POST['info_paritaria'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $paritaria->infoParitaria($paritaria,$id,$conn);
	}
	if(isset($_POST['busqueda_paritarias'])){
        $paritaria->formAdvanceSearchParitarias($conn);
	}
	if(isset($_POST['search_paritaria'])){
        $grupo_representante = mysqli_real_escape_string($conn,$_POST['grupo_representante']);
        $fecha_desde = mysqli_real_escape_string($conn,$_POST['fecha_desde']);
        $fecha_hasta = mysqli_real_escape_string($conn,$_POST['fecha_hasta']);        
        $paritaria->searchAdvanceParitariasResults($paritaria,$grupo_representante,$fecha_desde,$fecha_hasta,$conn);
	}
		
	// ============================ FIN REPRESENTACION PARITARIAS ========================= //
	
	// ============================ REPRESENTANTES ========================= //
	// se crea un representante
	$representante = new Representantes();
	
	// LISTA TODOS LOS REPRESENTANTES
	if(isset($_POST['representantes'])){
        $representante->listarRepresentantes($representante,$conn);
	}
	if(isset($_POST['nuevo_representante'])){
        $representante->formAltaRepresentante();
	}
	if(isset($_POST['editar_representante'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $representante->formEditRepresentante($id,$conn);
	}
	
	
	// ============================ FIN REPRESENTANTES ========================= //
	
	
	// ============================ GRUPO REPRESENTANTE ========================= //
	// se crea el objeto grupo
	$grupo = new Grupo();
	
	// LISTAR TODOS LOS GRUPOS
	if(isset($_POST['grupos'])){
        $grupo->listarGrupos($grupo,$conn);
	}
	if(isset($_POST['nuevo_grupo'])){
        $grupo->formAltaGrupo($conn);
	}
	if(isset($_POST['editar_grupo'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $grupo->formEditGrupo($id,$conn);
	}
	
	
	// ============================ FIN GRUPO REPRESENTANTE ========================= //
	
	// ============================ SECCION TIPO DE NORMA ========================= //
	// se crea el objeto
	$obj_tipo_norma = new TipoNorma();
	
	if(isset($_POST['tipo_normas'])){
        $obj_tipo_norma->listarTipoNorma($obj_tipo_norma,$conn,$dbase);
	}
	if(isset($_POST['nuevo_tipo_norma'])){
        $obj_tipo_norma->newTipoNorma();
	}
	
	
	// ============================ FIN SECCION TIPO DE NORMA ========================= //
	
	// ============================ SECCION AMBITO DE NORMA ========================= //
	// se crea el objeto
	$obj_ambito_norma = new AmbitoNorma();
	
	if(isset($_POST['ambito_normas'])){
        $obj_ambito_norma->listarAmbitoNorma($obj_ambito_norma,$conn,$dbase);
	}
	if(isset($_POST['nuevo_ambito_norma'])){
        $obj_ambito_norma->newAmbitoNorma();
	}
	
	// ============================ FIN SECCION AMBITO DE NORMA ========================= //
	
	}else{
	  mysqli_error($conn);
	}
	
      
   
   
   ?>
      
      
      
    
     </div>
 
  </div>
</div><br>

<script type="text/javascript" src="../lib/normas/lib_normas.js"></script>
<script type="text/javascript" src="../lib/representantes/lib_representantes.js"></script>
<script type="text/javascript" src="../lib/grupo_representantes/lib_grupo_representantes.js"></script>
<script type="text/javascript" src="../lib/paritarias/lib_paritarias.js"></script>
<script type="text/javascript" src="../lib/organismos/lib_organismos.js"></script>
<script type="text/javascript" src="../lib/jurisdicciones/lib_jurisdicciones.js"></script>
<script type="text/javascript" src="../lib/tipo_organismo/lib_tipo_organismos.js"></script>
<script type="text/javascript" src="../lib/segmentacion_tematica/lib_segmentacion_tematica.js"></script>
<script type="text/javascript" src="../lib/tipo_norma/lib_tipo_norma.js"></script>
<script type="text/javascript" src="../lib/ambito_norma/lib_ambito_norma.js"></script>

<!-- Modal 2 -->
<?php modal2(); ?>
<!-- END Modal 2 -->

</body>
</html>
