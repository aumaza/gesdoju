<?php

class SegmentacionTematica{

    // VARIABLES / PROPIEDADES
    private $clas_inst = '';
    private $jurisdiccion = '';
    private $saf = '';
    private $cod_sirhu = '';
    private $cod_org = '';
    private $reg_paritario = '';
    private $reg_laboral = '';
    private $esc_estatuto = '';
    private $convenio = '';
    private $ubicacion_fisica = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    function __construct(){
        $this->clas_inst = '';
        $this->jurisdiccion = '';
        $this->saf = '';
        $this->cod_sirhu = '';
        $this->cod_org = '';
        $this->reg_paritario = '';
        $this->reg_laboral = '';
        $this->esc_estatuto = '';
        $this->convenio = '';
        $this->ubicacion_fisica = '';
    }
    
    // SETTERS
    private function set_clas_inst($var){
        $this->clas_inst = $var;
    }
    private function set_jurisdiccion($var){
        $this->jurisdiccion = $var;
    }
    private function set_saf($var){
        $this->saf = $var;
    }
    private function set_cod_sirhu($var){
        $this->cod_sirhu = $var;
    }
    private function set_cod_org($var){
        $this->cod_org = $var;
    }
    private function set_reg_paritario($var){
        $this->reg_paritario = $var;
    }
    private function set_reg_laboral($var){
        $this->reg_laboral = $var;
    }
    private function set_esc_estatuto($var){
        $this->esc_estatuto = $var;
    }
    private function set_convenio($var){
        $this->convenio = $var;
    }
    private function set_ubicacion_fisica($var){
        $this->ubicacion_fisica = $var;
    }
    
    // GETTERS
    private function get_clas_inst($var){
        return $this->clas_inst = $var;
    }
    private function get_jurisdiccion($var){
        return $this->jurisdiccion = $var;
    }
    private function get_saf($var){
        return $this->saf = $var;
    }
    private function get_cod_sirhu($var){
        return $this->cod_sirhu = $var;
    }
    private function get_cod_org($var){
        return $this->cod_org = $var;
    }
    private function get_reg_paritario($var){
        return $this->reg_paritario = $var;
    }
    private function get_reg_laboral($var){
        return $this->reg_laboral = $var;
    }
    private function get_esc_estatuto($var){
        return $this->esc_estatuto = $var;
    }
    private function get_convenio($var){
        return $this->convenio = $var;
    }
    private function get_ubicacion_fisica($var){
        return $this->ubicacion_fisica = $var;
    }
   

    // ====================================================== METODOS ======================================================= //
    
    // ====================================================== LISTAR ======================================================= //


/*
** funcion que lista SEGMENTACION TEMATICA
*/

public function listarSegmentacionTematica($segmentacion,$conn){

if($conn){
	
	
	$sql = "SELECT * FROM segmentacion_tematica";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
    
	
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/code-class.png"  class="img-reponsive img-rounded"> Segmentación Temática
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='segmentacionTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Clasificación Institucional</th>
		    <th class='text-nowrap text-center'>Jurisdicción</th>
            <th class='text-nowrap text-center'>SAF</th>
            <th class='text-nowrap text-center'>Código SIRHU</th>
            <th class='text-nowrap text-center'>Organismo</th>
            <th>&nbsp;</th>
            </thead>";


	while($row = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 $sql_1 = "select descripcion from tipo_organismo where cod_organismo = '$row[clas_inst]'";
			 $query_1 = mysqli_query($conn,$sql_1);
			 while($row_1 = mysqli_fetch_array($query_1)){
                echo "<td align=center>".$segmentacion->get_clas_inst($row_1['descripcion'])."</td>";
			 }
			 $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$row[jurisdiccion]'";
			 $query_2 = mysqli_query($conn,$sql_2);
			 while($row_2 = mysqli_fetch_array($query_2)){
                echo "<td align=center>".$segmentacion->get_jurisdiccion($row_2['descripcion'])."</td>";
			 }
			 echo "<td align=center>".$segmentacion->get_saf($row['saf'])."</td>";
			 echo "<td align=center>".$segmentacion->get_cod_sirhu($row['cod_sirhu'])."</td>";
			 $sql_3 = "select descripcion from organismos where cod_org = '$row[desc_organismo]'";
			 $query_3 = mysqli_query($conn,$sql_3);
			 while($row_3 = mysqli_fetch_array($query_3)){
                echo "<td align=center>".$row_3['descripcion']."</td>";
			 }
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                                     
                    <button type="submit" class="btn btn-success btn-sm" name="edit_segmentacion" data-toggle="tooltip" data-placement="left" title="Editar Registro">
                            <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <button type="submit" class="btn btn-danger btn-sm" name="del_segmentacion" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                            <img src="../../icons/places/user-trash.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_segmentacion"  data-toggle="tooltip" data-placement="left" title="Información Extendida de Segmentación Temática">
                            <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                    
                    </form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="nueva_segmentacion">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Registro</button>
                        
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada_segmentacion">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
                    </form>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}
    
    // FORMULARIOS

/*
** FORMUALRIO ALTA DE SEGMENTACION
*/
public function formNewSegmentacion($conn){

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Segmentacion Temática</h2><hr>
	        <form id="fr_add_new_segmentacion_ajax" method="POST">
	        
	        <div class="form-group">
		  <label for="clas_inst">Clasificación Institucional</label>
		  <select class="form-control" id="clas_inst" name="clas_inst" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM tipo_organismo order by cod_organismo ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores['cod_organismo'].'">'.$valores['cod_organismo'].' - '.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		<div class="form-group">
		  <label for="jurisdiccion">Jurisdicción</label>
		  <select class="form-control" id="jurisdiccion" name="jurisdiccion" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM jurisdicciones order by cod_jur ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
                while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores[cod_jur].'">'.$valores[cod_jur].' - '.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
	        
	        
	        <div class="form-group">
		  <label for="saf">SAF:</label>
		  <input type="text" class="form-control" id="saf" name="saf"  maxlength="3" required>
		</div>
		
		 <div class="form-group">
		  <label for="cod_sirhu">Código SIRHU:</label>
		  <input type="text" class="form-control" id="cod_sirhu" name="cod_sirhu"  maxlength="2" required>
		</div>
		
		<div class="form-group">
		  <label for="cod_org">Organismos</label>
		  <select class="form-control" id="cod_org" name="cod_org" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM organismos order by cod_org ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores[cod_org].'">'.$valores[cod_org].' - '.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		<div class="form-group">
		  <label for="reg_paritario">Régimen Paritario:</label>
		  <input type="text" class="form-control" id="reg_paritario" name="reg_paritario" required>
		</div>
		
		<div class="form-group">
		  <label for="reg_laboral">Régimen Laboral:</label>
		  <input type="text" class="form-control" id="reg_laboral" name="reg_laboral" required>
		</div>
		
		<div class="form-group">
		  <label for="esc_estatuto">Escalafón / Estatuto:</label>
		  <input type="text" class="form-control" id="esc_estatuto" name="esc_estatuto" required>
		</div>
		
		<div class="form-group">
		  <label for="convenio">Convenio:</label>
		  <input type="text" class="form-control" id="convenio" name="convenio" required>
		</div>
		
		<div class="form-group">
		  <label for="ubicacion_fisica">Ubicación Física/Carpeta</label>
		  <input type="text" class="form-control" id="ubicacion_fisica" name="ubicacion_fisica" required>
		</div>
		
		
		<button type="submit" class="btn btn-success btn-block" id="add_segmentacion" name="add_segmentacion">
            <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

}


/*
** FORMUALRIO EDICION DE SEGMENTACION
*/
public function formEditSegmentacion($id,$conn,$dbase){
        
        mysqli_select_db($conn,$dbase);
        $sql = "select * from segmentacion_tematica where id = '$id'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        
      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Editar Segmentacion Temática</h2><hr>
	        <form id="fr_update_segmentacion_ajax" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$id.'" >
	        
	        <div class="form-group">
		  <label for="clas_inst">Clasificación Institucional</label>
		  <select class="form-control" id="clas_inst" name="clas_inst" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM tipo_organismo order by cod_organismo ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores['cod_organismo'].'" '.($valores['cod_organismo'] == $row['clas_inst'] ? "selected" : "").'>'.$valores['cod_organismo'].' - '.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		<div class="form-group">
		  <label for="jurisdiccion">Jurisdicción</label>
		  <select class="form-control" id="jurisdiccion" name="jurisdiccion" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM jurisdicciones order by cod_jur ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
                while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores[cod_jur].'" '.($valores[cod_jur] == $row['jurisdiccion'] ? "selected" : "").'>'.$valores[cod_jur].' - '.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
	        
	        
	        <div class="form-group">
		  <label for="saf">SAF:</label>
		  <input type="text" class="form-control" id="saf" name="saf"  maxlength="3" value="'.$row['saf'].'" required>
		</div>
		
		 <div class="form-group">
		  <label for="cod_sirhu">Código SIRHU:</label>
		  <input type="text" class="form-control" id="cod_sirhu" name="cod_sirhu"  maxlength="2" value="'.$row['cod_sirhu'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="cod_org">Organismos</label>
		  <select class="form-control" id="cod_org" name="cod_org" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM organismos order by cod_org ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores[cod_org].'" '.($valores[cod_org] == $row['cod_org'] ? "selected" : "").'>'.$valores[cod_org].' - '.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		<div class="form-group">
		  <label for="reg_paritario">Régimen Paritario:</label>
		  <input type="text" class="form-control" id="reg_paritario" name="reg_paritario" value="'.$row['reg_paritario'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="reg_laboral">Régimen Laboral:</label>
		  <input type="text" class="form-control" id="reg_laboral" name="reg_laboral" value="'.$row['reg_laboral'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="esc_estatuto">Escalafón / Estatuto:</label>
		  <input type="text" class="form-control" id="esc_estatuto" name="esc_estatuto" value="'.$row['esc_estatuto'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="convenio">Convenio:</label>
		  <input type="text" class="form-control" id="convenio" name="convenio" value="'.$row['convenio'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="ubicacion_fisica">Ubicación Física/Carpeta</label>
		  <input type="text" class="form-control" id="ubicacion_fisica" name="ubicacion_fisica" value="'.$row['ubicacion_fisica'].'" required>
		</div>
		
		
		<button type="submit" class="btn btn-success btn-block" id="update_segmentacion" name="update_segmentacion">
            <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

}


/*
** FORMULARIO DE ELIMINACION DE REGISTRO
*/
public function formBorrarSegmentacion($id,$conn,$dbase){
    
    $sql = "select * from segmentacion_tematica where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Registro</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form id="fr_delete_segmentacion_ajax" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">ID del Registro</label>
		  <input type="text" class="form-control" id="id" value="'.$fila['id'].'" readonly>
		</div><hr>
		
		
		<button type="submit" class="btn btn-success btn-block" id="delete_segmentacion" name="delete_segmentacion">
		<img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><hr>
		
		<button type="submit" class="btn btn-danger btn-block" name="segmentacion_tematica">
		<img src="../../icons/actions/dialog-cancel.png"  class="img-reponsive img-rounded"> Cancelar</button>
	      </form> 
	  
	    </div>
	</div>';

}

/*
** FUNCION DE BUSQUEDA AVANZADA
*/
function formAdvanceSearchSegmentacion($conn,$dbase){
    
    echo '<div class="container">
            <div class="panel panel-default">
            <div class="panel-heading">
                <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada Segmentación Temática</div>
            <div class="panel-body">
            
                        
            <form action="#" method="POST">
                <div class="form-group">
                
                <div class="form-group">
                <label for="clas_inst">Clasificación Institucional</label>
                <select class="form-control" id="clas_inst" name="clas_inst" required>
                <option value="" disabled selected>Seleccionar</option>';
                    
                    if($conn){
                    $query = "SELECT * FROM tipo_organismo order by cod_organismo ASC";
                    mysqli_select_db($conn,$dbase);
                    $res = mysqli_query($conn,$query);

                    if($res){
                        while ($valores = mysqli_fetch_array($res)){
                        echo '<option value="'.$valores['cod_organismo'].'">'.$valores['cod_organismo'].' - '.$valores[descripcion].'</option>';
                        }
                        }
                    }

                    mysqli_close($conn);
                
                echo '</select>
                </div>
                
                <button type="submit" class="btn btn-default btn-block" name="search_segmentacion">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Buscar</button>
            </form>
            
            </div>

            </div>
            </div>';
}


/*
** RESULTADO DE BUSQUEDA AVANZADA
*/
function searchAdvanceResultsSegmentacion($clas_inst,$conn,$dbase){

   
    
        $sql = "SELECT * FROM segmentacion_tematica where clas_inst = '$clas_inst'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        //$row = mysqli_fetch_assoc($query);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-info">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Clasificación Institucional</th>
		    <th class='text-nowrap text-center'>Jurisdicción</th>
            <th class='text-nowrap text-center'>SAF</th>
            <th class='text-nowrap text-center'>SIRHU</th>
            <th class='text-nowrap text-center'>Organismo</th>
            <th class='text-nowrap text-center'>Régimen Paritario</th>
            <th class='text-nowrap text-center'>Régimen Laboral</th>
            <th class='text-nowrap text-center'>Escalafon / Estatuto</th>
            <th class='text-nowrap text-center'>Convenio</th>
            <th class='text-nowrap text-center'>Ubicacion Física / Bibliorato</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($query)){
			  // Listado normal
			 echo "<tr>";
			 $sql_1 = "select descripcion from tipo_organismo where cod_organismo = '$clas_inst'";
			 $query_1 = mysqli_query($conn,$sql_1);
			 $row_1 = mysqli_fetch_assoc($query_1);
			 {
			 echo "<td align=center>".$row_1['descripcion']."</td>";
			 }
			 
			 $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$fila[jurisdiccion]'";
			 $query_2 = mysqli_query($conn,$sql_2);
			 $row_2 = mysqli_fetch_assoc($query_2);
			 {
			 echo "<td align=center>".$row_2['descripcion']."</td>";
			 }
			 
			 echo "<td align=center>".$fila['saf']."</td>";
			 echo "<td align=center>".$fila['cod_sirhu']."</td>";
			 
			 $sql_3 = "select descripcion from organismos where cod_org = '$fila[desc_organismo]'";
			 $query_3 = mysqli_query($conn,$sql_3);
			 $row_3 = mysqli_fetch_assoc($query_3);
			 {
			 echo "<td align=center>".$row_3['descripcion']."</td>";
			 }
			 
			 echo "<td align=center>".$fila['reg_paritario']."</td>";
			 echo "<td align=center>".$fila['regimen_laboral']."</td>";
			 echo "<td align=center>".$fila['esc_estatuto']."</td>";
			 echo "<td align=center>".$fila['convenio']."</td>";
			 echo "<td align=center>".$fila['ubicacion_fis']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search_officio.php?file=print_table_info_segmentacion.php&clas_inst='.$clas_inst.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada_segmentacion">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
    
    
}

    // ====================================================== INFORMES ======================================================= //

/*
** INFORMACION EXTENDIDA SOBRE SEGMENTACION TEMATICA
*/

    public function infoSegmentacion($segmentacion,$id,$conn,$dbase){
    
    mysqli_select_db($conn,$dbase);
    
    $sql = "select * from segmentacion_tematica where id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    
    
    $sql_1 = "select descripcion from tipo_organismo where cod_organismo = '$row[clas_inst]'";
    $query_1 = mysqli_query($conn,$sql_1);
    while($row_1 = mysqli_fetch_array($query_1)){
        $descripcion_tipo_organismo = $row_1['descripcion'];
    }
    
    $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$row[jurisdiccion]'";
    $query_2 = mysqli_query($conn,$sql_2);
    while($row_2 = mysqli_fetch_array($query_2)){
        $descripcion_jurisdiccion = $row_2['descripcion'];
    }
    
    $sql_3 = "select descripcion from organismos where cod_org = '$row[desc_organismo]'";
    $query_3 = mysqli_query($conn,$sql_3);
    while($row_3 = mysqli_fetch_assoc($query_3)){
        $descripcion_organismo = $row_3['descripcion'];
    }
    
    echo '<div class="container">
             <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/arrow-down-double.png" /> Información Extendida Segmentación Temática</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse-in">
                    <ul class="list-group">
                    <li class="list-group-item"><strong>Clasificación Institucional:</strong> '.$segmentacion->get_clas_inst($descripcion_tipo_organismo).'</li>
                    <li class="list-group-item"><strong>Jurisdicción:</strong> '.$segmentacion->get_jurisdiccion($descripcion_jurisdiccion).'</li>
                    <li class="list-group-item"><strong>SAF:</strong> '.$segmentacion->get_saf($row['saf']).'</li>
                    <li class="list-group-item"><strong>Código SIRHU:</strong> '.$segmentacion->get_cod_sirhu($row['cod_sirhu']).'</li>
                    <li class="list-group-item"><strong>Organismo:</strong> '.$segmentacion->get_cod_org($descripcion_organismo).'</li>
                    <li class="list-group-item"><strong>Régimen Paritario:</strong> '.$segmentacion->get_reg_paritario($row['reg_paritario']).'</li>
                    <li class="list-group-item"><strong>Régimen Laboral:</strong> '.$segmentacion->get_reg_laboral($row['regimen_laboral']).'</li>
                    <li class="list-group-item"><strong>Código / Estatuto:</strong> '.$segmentacion->get_esc_estatuto($row['esc_estatuto']).'</li>
                    <li class="list-group-item"><strong>Convenio:</strong> '.$segmentacion->get_convenio($row['convenio']).'</li>
                    <li class="list-group-item"><strong>Ubicación Física / Bibliorato:</strong> '.$segmentacion->get_ubicacion_fisica($row['ubicacion_fis']).'</li>
                    </ul>
                    <div class="panel-footer">
                        
                        <form action="main.php" method="POST">
                                <button type="submit" class="btn btn-default btn-sm btn-block" name="segmentacion_tematica">
                                <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Volver a Segmentación Temática</button>
                        </form><br>
                        
                        <a href="../lib/informes/print.php?file=print_informe_segmentacion.php&id='.$id.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>';
                        
                    '</div>
                </div>
                </div>
            </div>
            </div>';
}



    // ====================================================== PERSISTENCIA ======================================================= //
/*
** CARGA DE REGISTRO A BASES
*/
public function addSegmentacion($segmentacion,$clas_inst,$jurisdiccion,$saf,$cod_sirhu,$cod_org,$reg_paritario,$regimen_laboral,$cod_estatuto,$convenio,$ub_fis,$conn){
    
    if($conn){
        
            mysqli_select_db($conn,'gesdoju');
                                
                    $sql = "INSERT INTO segmentacion_tematica ".
                           "(clas_inst,
                             jurisdiccion,
                             saf,
                             cod_sirhu,
                             cod_org,
                             reg_paritario,
                             reg_laboral,
                             esc_estatuto,
                             convenio,
                             ubicacion_fisica)".
                            "VALUES ".
                            "($segmentacion->set_clas_inst('$clas_inst'),
                              $segmentacion->set_jurisdiccion('$jurisdiccion'),
                              $segmentacion->set_saf('$saf'),
                              $segmentacion->set_cod_sirhu('$cod_sirhu'),
                              $segmentacion->set_cod_org('$cod_org'),
                              $segmentacion->set_reg_paritario('$reg_paritario'),
                              $segmentacion->set_reg_laboral('$regimen_laboral'),
                              $segmentacion->set_esc_estatuto('$cod_estatuto'),
                              $segmentacion->set_convenio('$convenio'),
                              $segmentacion->set_ubicacion_fisica('$ub_fis'))";
                    
                    $query = mysqli_query($conn,$sql);
                        
                    if($query){
                        echo 1; // registro insertado correctamente
                    }else{
                        echo -1; // hubo un problema al insertar el registro
                    }
            
        }else{
            echo 7; // no hay conexion
        }
    
    } // end funcion


/*
** ACTUALIZACION DE REGISTRO 
*/
public function updateSegmentacion($id,$segmentacion,$clas_inst,$jurisdiccion,$saf,$cod_sirhu,$cod_org,$reg_paritario,$regimen_laboral,$esc_estatuto,$convenio,$ub_fis,$conn,$dbase){

    if($conn){

    $sql = "update segmentacion_tematica set
            clas_inst = $segmentacion->set_clas_inst('$clas_inst'),
            jurisdiccion = $segmentacion->set_jurisdiccion('$jurisdiccion'),
            saf = $segmentacion->set_saf('$saf'),
            cod_sirhu = $segmentacion->set_cod_sirhu('$cod_sirhu'),
            cod_org = $segmentacion->set_cod_org('$cod_org'),
            reg_paritario = $segmentacion->set_reg_paritario('$reg_paritario'),
            reg_laboral = $segmentacion->set_reg_laboral('$regimen_laboral'),
            esc_estatuto = $segmentacion->set_esc_estatuto('$esc_estatuto'),
            convenio = $segmentacion->set_convenio('$convenio'),
            ubicacion_fisica = $segmentacion->set_ubicacion_fisica('$ub_fis')
            where id = '$id'";
    
    $query = mysqli_query($conn,$sql);
    mysqli_select_db($conn,$dbase);
    
    if($query){
        echo 1; // registro actualizado correctamente
    }else{
        echo -1; // hubo un problema al intentar actualizar el registro
    }
    
    }else{
        echo 7; //error de conexion
    }

} // FIN DEL METODO


/*
** ELIMINAR REGISTRO DE LA BASE
*/
public function deleteSegmentacion($id,$conn,$dbase){

    $sql = "delete from segmentacion_tematica where id = '$id'";
    mysqli_select_db($conn,$dbase);
    $query = mysqli_query($conn,$sql);
    
    if($query){
        echo 1; // registro eliminado
    }else{
        echo -1; // hubo un problema al eliminar el registro
    }
    


}



} // FIN DE LA CLASE




?>
