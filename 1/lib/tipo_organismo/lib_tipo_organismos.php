<?php

class TipoOrganismos{

	// DEFINICION DE VARIABLES / PROPIEDADES
	private $cod_organismo = '';
	private $descripcion = '';

	// CONSTRUCTOR DESPARAMETRIZADO
	function __construct(){
		$this->cod_organismo = '';
		$this->descripcion = '';
	}

	// SETTERS
	private function set_cod_organismo($var){
		$this->cod_organismo = $var;
	}

	private function set_descripcion($var){
		$this->descripcion = $var;
	}

	// GETTERS
	private function get_cod_organismo($var){
		return $this->cod_organismo = $var;
	}

	private function get_descripcion($var){
		return $this->descripcion = $var;
	}

	// METODOS

	// ====================================== LISTADOS ====================================== //
/*
** funcion para listar tipo de organismos
*/
public function listarTipoOrganismos($my_tipo_organismo,$conn,$dbase){

	if($conn){
		
		$sql = "SELECT * FROM tipo_organismo";
		mysqli_select_db($conn,$dbase);
		$resultado = mysqli_query($conn,$sql);
			
		//mostramos fila x fila
		$count = 0;
		echo '<div class="container-fluid">
			  <div class="jumbotron">
                <h2><img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Clasificación de Organismos</h2><hr>';
					  
		  echo "<table class='display compact' style='width:100%' id='tipoOrganismoTable'>";
		  echo "<thead>
				<th class='text-nowrap text-center'>Código Clasificación</th>
				<th class='text-nowrap text-center'>Clasificación</th>
				<th class='text-nowrap text-center'>Acciones</th>
				</thead>";
	
	
		while($fila = mysqli_fetch_array($resultado)){
				  // Listado normal
				 echo "<tr>";
				 echo "<td align=center>".$my_tipo_organismo->get_cod_organismo($fila['cod_organismo'])."</td>";
				 echo '<td align=center>'.$my_tipo_organismo->get_descripcion($fila['descripcion']).'</td>';
				 echo "<td class='text-nowrap'>";
				 echo '<form action="#" method="POST">
						<input type="hidden" name="id" value="'.$fila['id'].'">
										 
						<button type="submit" class="btn btn-success btn-sm" name="edit_tipo_org" data-toggle="tooltip" data-placement="left" title="Editar Datos del Tipo de Organismo">
						<img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
						
				 echo '</form>';
				 echo "</td>";
				 $count++;
			}
	
			echo "</table>";
			echo "<hr>";
			echo '<form <action="main.php" method="POST">
						<button type="submit" class="btn btn-default btn-sm" name="add_tipo_org"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Nueva Clasificación</button>
                  </form><hr>';
			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
			
			echo '</div></div>';
			}else{
			  echo 'Connection Failure...';
			}
	
		mysqli_close($conn);
	
	}


	// ====================================== FORMULARIOS ====================================== //

/*
** funcion que carga el formulario para carga de organismos
*/
public function newTipoOrganismo(){

	echo '<div class="container">
            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cargar Nueva Clasificación de Organismo</h2><hr>
                <form id="fr_add_new_tipo_organismo_ajax" method="POST">
                
                <div class="form-group">
                    <label for="cod_tipo_org">Código</label>
                    <input type="text" class="form-control" id="cod_tipo_org" name="cod_tipo_org"  maxlength="2" placeholder="Ingrese el código de clasificación" required>
                </div><hr>
                
                <div class="form-group">
                    <label for="descripcion">Clasificación</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="120" placeholder="Ingrese la clasificación de tipo de organismo" required>
                </div><hr>
            
                <button type="submit" class="btn btn-success btn-block" id="add_tipo_organismo" name="add_tipo_organismo">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form> <br>
            
            </div>
            </div>';
 
 }

 /*
** funcion que carga el formulario para editar carga de organismos
*/
public function editTipoOrganismo($my_tipo_organismo,$id,$conn){
    
    $sql = "select * from tipo_organismo where id = '$id'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $cod = $row['cod_organismo'];
        $descripcion = $row['descripcion'];
    }
    
    
   echo '<div class="container">
            <div class="jumbotron">
	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Clasificación de Organismo</h2><hr>
	        <form id="fr_update_tipo_organismo_ajax" method="POST">
	        <input type="hidden" name="id" value="'.$id.'">
	        
	        <div class="form-group">
            <label for="cod_tipo_org">Código</label>
            <input type="text" class="form-control" id="cod_tipo_organismo" name="cod_tipo_org"  maxlength="2" value="'.$my_tipo_organismo->get_cod_organismo($cod).'" required readonly>
            </div><hr>
	        
	        <div class="form-group">
		  <label for="descripcion">Clasificación</label>
		  <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="120" value="'.$my_tipo_organismo->get_descripcion($descripcion).'" required>
		</div><hr>
		
		<button type="submit" class="btn btn-success btn-block" id="update_tipo_organismo" name="update_tipo_organismo">
		<img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>';

}


// ====================================== PERSISTENCIA ====================================== //

/*
** funcion que agrega Organismos a la base de datos
*/
public function addTipoOrganismo($my_tipo_organismo,$cod_tipo_org,$descripcion,$conn){

    $sql = "select cod_organismo, descripcion from tipo_organismo where cod_organismo = '$cod_tipo_org' or descripcion = '$descripcion'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
          
    if($rows == 0){
            
            $consulta = "INSERT INTO tipo_organismo".
            			"(cod_organismo,
						  descripcion)".
            			"VALUES ".
        				"($my_tipo_organismo->set_cod_organismo('$cod_tipo_org'),
						  $my_tipo_organismo->set_descripcion('$descripcion'))";

        mysqli_select_db($conn,'gesdoju');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo 1; // registro insertado con exito
    }else{
			    echo -1; // hubo un problema al insertar el registro
		    }
		    }else{
		    
                echo 4; // registro existente
		    
		    }

}


/*
** funcion actualizar registro de tipo de organismos
*/
public function updateTipoOrganismo($my_tipo_organismo,$id,$cod_org,$descripcion,$conn){

	$sql = "update tipo_organismo set cod_organismo = $my_tipo_organismo->set_cod_organismo('$cod_org'), descripcion = $my_tipo_organismo->set_descripcion('$descripcion') where id = '$id'";
	mysqli_select_db($conn,'gesdoju');
	$query = mysqli_query($conn,$sql);
	
	if($query){
		echo 1; // registro actualizado con exito
	}else{
		echo -1; // hubo un problema al actualizar el registro
	}


}


} // FIN DE LA CLASE


?>
