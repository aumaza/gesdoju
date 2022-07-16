<?php

class Jurisdicciones{

	// SE DEFINEN LAS VARIABLES / PROPIEDADES
	private $cod_jur = '';
	private $descripcion = '';

	// CONSTRUCTOR DESPARAMETRIZADO
	function __constructor(){
		$this->cod_jur = '';
		$this->descripcion = '';
	}

	// SETTERS
	private function set_cod_jur($var){
		$this->cod_jur = $var;
	}

	private function set_descripcion($var){
		$this->descripcion = $var;
	}

	// GETTERS
	private function get_cod_jur($var){
		return $this->cod_jur = $var;
	}

	private function get_descripcion($var){
		return $this->descripcion = $var;
	}


	// METODOS

/*
** funcion para listar jurisdicciones
*/
public function listarJurisdicciones($my_jurisdiccion,$conn,$dbase){

	if($conn){
		
		$sql = "SELECT * FROM jurisdicciones";
		mysqli_select_db($conn,$dbase);
		$resultado = mysqli_query($conn,$sql);
			
		//mostramos fila x fila
		$count = 0;
		echo '<div class="container">
	      <div class="jumbotron">
	      <h2><img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Jurisdicciones [ Listado de Jurisdicciones ]</h2><hr>';
					  
		  echo "<table class='display compact' style='width:100%' id='jurisdiccionesTable'>";
		  
		             
		  echo "<thead>
				<th class='text-nowrap text-center'>Código Jurisdicción</th>
				<th class='text-nowrap text-center'>Jurisdicción</th>
				<th>&nbsp;</th>
				</thead>";
	
	
		while($fila = mysqli_fetch_array($resultado)){
				  // Listado normal
				 echo "<tr>";
				 echo "<td align=center>".$my_jurisdiccion->get_cod_jur($fila['cod_jur'])."</td>";
				 echo '<td align=center>'.$my_jurisdiccion->get_descripcion($fila['descripcion']).'</td>';
				 echo "<td class='text-nowrap'>";
				 echo '<form <action="main.php" method="POST">
						<input type="hidden" name="id" value="'.$fila['id'].'">
										 
						<button type="submit" class="btn btn-success btn-sm" name="edit_jur" data-toggle="tooltip" data-placement="left" title="Editar Datos de la Jurisdicción">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
						<button type="submit" class="btn btn-danger btn-sm" name="del_jur" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</button>';
						
				 echo '</form>';
				 echo "</td>";
				 $count++;
			}
	
			echo "</table>";
			echo "<hr>";
			echo '<form <action="main.php" method="POST">
						<button type="submit" class="btn btn-default btn-sm" name="add_jur"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Jurisdicción</button>
                 </form><hr>';
			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';
			
			echo '</div></div>';
			}else{
			  echo 'Connection Failure...';
			}
	
		mysqli_close($conn);
	
	}


	// SECCION FORMULARIOS

/*
** funcion que carga el formulario para carga de jurisdiccion
*/
public function newJurisdiccion($conn){

	echo '<div class="container">
            <div class="jumbotron">
                
                <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cargar Jurisdicción</h2><hr>
                <form id="fr_add_new_jurisdiccion_ajax" method="POST">
			 
                    <div class="form-group">
                        <label for="cod_jur">Código Jurisdicción</label>
                        <input type="text" class="form-control" id="cod_jur" name="cod_jur"  maxlength="2" placeholder="Ingrese el código de la Jurisdicción" required>
                    </div><hr>
			 
                    <div class="form-group">
                        <label for="descripcion">Jurisdicción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="120" placeholder="Ingrese el Nombre de la Jurisdicción" required>
                    </div><hr>
		 
                <button type="submit" class="btn btn-success btn-block" id="add_jurisdiccion" name="add_jurisdiccion">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form><hr>
                
                <div id="messageNewJurisdiccion"></div>
		   
		 </div>
         </div>';
 
 }
	
	
	
/*
** funcion editar Jurisdicción
*/
public function formEditJurisdiccion($my_jurisdiccion,$id,$conn,$dbase){

	$sql = "select * from jurisdicciones where id = '$id'";
	mysqli_select_db($conn,$dbase);
	$query = mysqli_query($conn,$sql);
	while($fila = mysqli_fetch_array($query)){
		  $cod_jur = $fila['cod_jur'];
		  $descripcion = $fila['descripcion'];
		  }
		 
		 echo '<div class="container">
                <div class="jumbotron">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar Jurisdicción</h3><hr>
                
                <form id="fr_update_jurisdiccion_ajax" method="POST">
                <input type="hidden" class="form-control" name="id" value="'.$id.'">
                
                <div class="form-group">
                    <label for="cod_jur">Código Jurisdicción:</label>
                    <input type="text" class="form-control" id="cod_jur" name="cod_jur" value="'.$my_jurisdiccion->get_cod_jur($cod_jur).'" readonly>
                </div><hr>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$my_jurisdiccion->get_descripcion($descripcion).'">
                </div><hr>
                
                <button type="submit" class="btn btn-success btn-block" id="update_jurisdiccion" name="update_jurisdiccion">Aceptar</button>
                </form><hr>
                
                <div id="messageUpdateJurisdiccion"></div>
                
			  </div>
			  </div>';
  }

  /*
** Funcion carga formulario de eliminacion de registro
*/
public function formBorrarJurisdiccion($my_jurisdiccion,$id,$conn,$dbase){
    
    $sql = "select * from jurisdicciones where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
                <div class="jumbotron">
	    
                <h2><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar Norma</h2><hr>
                    <div class="alert alert-danger">
                    <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
                        <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
                    </div><hr>
          
                <form action="main.php" method="POST">
                <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
                
                <div class="form-group">
                <label for="nombre">Jurisdicción</label>
                <input type="text" class="form-control" id="nombre" value="'.$my_jurisdiccion->get_descripcion($fila['descripcion']).'" readonly>
                </div><hr>
		
		
                <button type="submit" class="btn btn-success btn-block" name="delete_jur">
                <img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
                </form> 
	      
            </div>
            </div>';

}

// END SECCION FORMULARIOS


 // SECCION PERSISTENCIA

/*
** funcion que agrega Jurisdicción a la base de datos
*/
public function addJurisdiccion($my_jurisdiccion,$cod_jur,$descripcion,$conn,$dbase){

    $sql = "select cod_jur, descripcion from jurisdicciones where cod_jur = '$cod_jur' or descripcion = '$descripcion'";
    mysqli_select_db($conn,$dbase);
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
          
    if($rows == 0){
            
            $consulta = "INSERT INTO jurisdicciones".
            			"(cod_jur,
						  descripcion)".
            			"VALUES ".
        				"($my_jurisdiccion->set_cod_jur('$cod_jur'),
						  $my_jurisdiccion->set_descripcion('$descripcion'))";
        
						  mysqli_select_db($conn,$dbase);
        				  $resp = mysqli_query($conn,$consulta);
            
            if($resp){
                echo 1; // registro insertado con exito
                $success = '[Registro insertado con éxito en la tabla Jurisdicciones]';
                mysqlSuccessLogs($success);
    		}else{
                echo -1; // hubo un problema al intentar insertar el registro
                $error = mysqli_error($conn);
                mysqlErrorLogs($error);
		    }
		    }else{
		        echo 4; // jurisdiccion ya existente		    
		    }

}

/*
** funcion actualizar registro de Jurisdicción
*/
public function updateJurisdiccion($my_jurisdiccion,$id,$cod_jur,$descripcion,$conn,$dbase){

	$sql = "update jurisdicciones set cod_jur = $my_jurisdiccion->set_cod_jur('$cod_jur'), descripcion = $my_jurisdiccion->set_descripcion('$descripcion') where id = '$id'";
	mysqli_select_db($conn,$dbase);
	$query = mysqli_query($conn,$sql);
	
	if($query){
        echo 1; // registro insertado con exito
		$success = '[Registro actualizado con éxito en la tabla Jurisdicciones con ID: '.$id.']';
        mysqlSuccessLogs($success);
	}else{
        echo -1; // hubo un problema al insertar el registro
        $error = mysqli_error($conn);
        mysqlErrorLogs($error);
	}
}

/*
** Función para eliminar un registro de la tabla jurisdicciones
*/

function delJurisdiccion($id,$conn,$dbase){

		
	mysqli_select_db($conn,$dbase);
	$sql = "delete from jurisdicciones where id = '$id'";
           
	$res = mysqli_query($conn,$sql);


	if($res){
		echo '<div class="container">
                <div class="jumbotron">
                    <div class="alert alert-success" alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" />Registro Eliminado Satisfactoriamente.
                    </div><hr>
                    <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-block" name="L">
                            <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ir a Jurisdicciones</button>
                    </form>
                </div>
              </div>';
	}else{
		echo '<div class="container">
                <div class="jumbotron">
                    <div class="alert alert-warning" alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Registro. '  .mysqli_error($conn).'
                    </div><hr>
                    <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-block" name="L">
                            <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Ir a Jurisdicciones</button>
                    </form>
                </div>
              </div>';
	}
}


// FIN SECCION PERSISTENCIA

public function modalFormAltaJurisdiccion(){

    echo '<div class="modal fade" id="myModalAltaJurisdiccion" role="dialog">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cargar Jurisdicción</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="fr_add_new_jurisdiccion_ajax" method="POST">
			 
                        <div class="form-group">
                        <label for="cod_jur">Código Jurisdicción</label>
                        <input type="text" class="form-control" id="cod_jur" name="cod_jur"  maxlength="2" placeholder="Ingrese el código de la Jurisdicción" required>
                        </div><hr>
                        
                        <div class="form-group">
                        <label for="descripcion">Jurisdicción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="120" placeholder="Ingrese el Nombre de la Jurisdicción" required>
                        </div><hr>
                    
                    <button type="submit" class="btn btn-success btn-block" id="add_jurisdiccion" name="add_jurisdiccion">
                    <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                    </form>
                
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
        </div>';

}


public function modalJurisdiccionConfirm(){

    echo '<div class="modal fade" id="myModalJurisdiccion" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Atención!!!</h4>
                </div>
                <div class="modal-body">
                <p>La Jurisdicción ha sido actualizada Exitosamente.</p>
                
                 
                
                </div>
                <div class="modal-footer">
                
                    <form action="main.php" method="POST">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="L">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Continuar</button>
                    </form> 
                        
                </div>
            </div>
            
            </div>
        </div>
        
        </div>';

}



} // FIN DE LA CLASE

?>
