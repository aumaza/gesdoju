<?php

class Organismos{

    // DEFINICIÓN DE PROPIEDADES / VARIABLES
    private $cod_org = '';
    private $descripcion = '';
    private $ubicacion_fisica = '';
    
    
    // CONSTRUCTOR DESPARAMETRIZADO
    function __construct(){
        $this->cod_org = '';
        $this->descripcion = '';
        $this->ubicacion_fisica = '';
    }
    
    // SETTERS
    private function set_cod_org($var){
        $this->cod_org = $var;
    }
    
    private function set_descripcion($var){
        $this->descripcion = $var;
    }
    
    private function set_ubicacion_fisica($var){
        $this->ubicacion_fisica = $var;
    }
    
    // GETTERS
    private function get_cod_org($var){
        return $this->cod_org = $var;
    }
    
    private function get_descripcion($var){
        return $this->descripcion = $var;
    }
    
    private function get_ubicacion_fisica($var){
        return $this->ubicacion_fisica = $var;
    }
    
    // METODOS

/*
** funcion para listar organismos
*/
public function listarOrganismos($my_organismo,$conn,$dbase){

if($conn){
	
	$sql = "SELECT * FROM organismos";
    mysqli_select_db($conn,$dbase);
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Organismos
	      </div><br>';
	      
                  
      echo "<table class='display compact' style='width:100%' id='organismosTable'>";
      
      
      echo "<thead>
		    <th class='text-nowrap text-center'>Código Organismo</th>
		    <th class='text-nowrap text-center'>Organismo</th>
		    <th class='text-nowrap text-center'>Ubicación Física / Bibliorato</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$my_organismo->get_cod_org($fila['cod_org'])."</td>";
			 echo '<td align=center>'.$my_organismo->get_descripcion($fila['descripcion']).'</td>';
			 echo '<td align=center>'.$my_organismo->get_ubicacion_fisica($fila['ubicacion_fisica']).'</td>';
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    
                    <button type="submit" class="btn btn-success btn-sm" name="edit_org" data-toggle="tooltip" data-placement="left" title="Editar Datos del Organismo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
                    <button type="submit" class="btn btn-danger btn-sm" name="del_org" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</button>';
                    
             echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_org">
                    <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Organismo</button><hr>
                    </form>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

} // FIN MÉTODO LISTAR ORGANISMOS

    // FORMUALARIOS

/*
** funcion que carga el formulario para carga de organismos
*/
public function newOrganismo($conn){

   echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Organismo</h2><hr>
	        <form id="fr_add_new_organismo_ajax" method="POST">
	        
	        <div class="form-group">
            <label for="nombre">Código Organismo</label>
            <input type="text" class="form-control" id="cod_org" name="cod_org"  maxlength="2" placeholder="Ingrese el código del organismo. Este debe respetar la nomenclatura del SIRHU. Ej.: QM" required>
            </div><hr>
	        
	        <div class="form-group">
            <label for="nombre">Organismo</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="120" placeholder="Ingrese el Nombre del Organismo" required>
            </div><hr>
            
            <div class="form-group">
            <label for="ubicacion_fisica">Ubicacion Física / Bibliorato</label>
            <input type="text" class="form-control" id="ubicacion_fisica" name="ubicacion_fisica"  placeholder="Ingrese el Número o descripcion del bibliorato donde se ubicará el contenido papel" required>
            </div><hr>
		
		<button type="submit" class="btn btn-success btn-block" id="add_organismo" name="add_organismo">
		<img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

} // FIN FORMULARIO DE CARGA DE ORGANISMO
    
 

/*
** funcion editar Organismo
*/
public function formEditOrganismo($id,$my_organismo,$conn,$dbase){

  $sql = "select * from organismos where id = '$id'";
  mysqli_select_db($conn,$dbase);
  $query = mysqli_query($conn,$sql);
  while($fila = mysqli_fetch_array($query)){
        $cod_org = $fila['cod_org'];
        $descripcion = $fila['descripcion'];
        $ubicacion_fisica = $fila['ubicacion_fisica'];
        }
       
       echo '<div class="container">
            <div class="row">
            <div class="col-sm-8">
            
            <div class="panel panel-success">
            <div class="panel-heading"><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar Organismo</div>
            <div class="panel-body">
            <form id="fr_update_organismo_ajax" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="'.$id.'">
            
            <div class="form-group">
                <label for="email">Código Organismo:</label>
                <input type="text" class="form-control" id="cod_org" name="cod_org" value="'.$my_organismo->get_cod_org($cod_org).'" readonly>
            </div><hr>
            
            <div class="form-group">
                <label for="email">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$my_organismo->get_descripcion($descripcion).'" required>
            </div><hr>
            
            <div class="form-group">
            <label for="ubicacion_fisica">Ubicacion Física / Bibliorato</label>
            <input type="text" class="form-control" id="ubicacion_fisica" name="ubicacion_fisica"  value="'.$my_organismo->get_ubicacion_fisica($ubicacion_fisica).'" required>
            </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" id="update_organismo" name="update_organismo">Aceptar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';

} // FIN METODO FORMULARIO EDICION DE ORGANISMO


/*
** Funcion carga formulario de eliminacion de registro
*/
public function formBorrarOrganismo($id,$my_organismo,$conn,$dbase){
    
    $sql = "select * from organismos where id = '$id'";
      mysqli_select_db($conn,$dbase);
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Organismo</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Organismo</label>
		  <input type="text" class="form-control" id="nombre" value="'.$my_organismo->get_descripcion($fila['descripcion']).'" readonly>
		</div><hr>
		
		
		<button type="submit" class="btn btn-success btn-block" name="delete_org"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form> 
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	      
	    </div>
	    </div>
	</div>';

} // FIIN METODO ELIMINAR ORGANISMO

// PERSISTENCIA A BASE

/*
** funcion que agrega Organismos a la base de datos
*/
public function addOrganismo($cod_org,$my_organismo,$descripcion,$ubicacion_fisica,$conn,$dbase){

    $sql = "select cod_org, descripcion from organismos where cod_org = '$cod_org' or descripcion = '$descripcion'";
    mysqli_select_db($conn,$dbase);
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
          
    if($rows == 0){
            
            $consulta = "INSERT INTO organismos".
                        "(cod_org,
                          descripcion,
                          ubicacion_fisica)".
                        "VALUES ".
                        "($my_organismo->set_cod_org('$cod_org'),
                          $my_organismo->set_descripcion('$descripcion'),
                          $my_organismo->set_ubicacion_fisica('$ubicacion_fisica'))";
        
        mysqli_select_db($conn,$dbase);
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
                $success = '[Registro insertado con éxito en la tabla Organismos con el código: '.$cod_org.']';
                mysqlSuccessLogs($success);
                echo 1; // registro guardado correctamente
            }else{
                $error = mysqli_error($conn);
                mysqlErrorLogs($error);
			    echo -1; // hubo un error al intentar guardar el registro
		    }
		    }else{
		        echo 4; // registro existente
		    }

} // FIN METODO AGREGAR REGISTRO A BASE

/*
** funcion actualizar registro de organismos
*/
public function updateOrganismo($id,$my_organismo,$cod_org,$descripcion,$ubicacion_fisica,$conn,$dbase){

        $sql = "update organismos set 
                cod_org = $my_organismo->set_cod_org('$cod_org'), 
                descripcion = $my_organismo->set_descripcion('$descripcion'), 
                ubicacion_fisica = $my_organismo->set_ubicacion_fisica('$ubicacion_fisica')
                where id = '$id'";
                
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        if($query){
                $success = '[Registro actualizado con éxito en la tabla Organismos con ID: '.$id.']';
                mysqlSuccessLogs($success);
                echo 1; // registro actualizado correctamente
        }else{
           $error = mysqli_error($conn);
           mysqlErrorLogs($error);
           echo -1; // hubo un problema al intentar actualizar el registro
        }


} // FIN METODO ACTUALIZAR REGISTRO EN BASE


/*
** Función para eliminar un registro de la tabla organismos
*/

public function delOrganismo($id,$conn,$dbase){

		
	mysqli_select_db($conn,$dbase);
	$sql = "delete from organismos where id = '$id'";
           
	$res = mysqli_query($conn,$sql);


	if($res){
		echo "<br>";
        echo '<div class="container">';
		echo '<div class="alert alert-success" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" />Registro Eliminado Satisfactoriamente.';
		echo "</div>";
		echo "</div>";
	}else{
		echo '<div class="container">';
        echo '<div class="alert alert-warning" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Registro. '  .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
} // FIN METODO ELIMINAR REGISTRO DE LA BASE


public function modalOrganismoConfirm(){

    echo '<div class="modal fade" id="myModalOrganismo" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Atención!!!</h4>
                </div>
                <div class="modal-body">
                <p>El Organismo ha sido actualizado Exitosamente.</p>
                
                 
                
                </div>
                <div class="modal-footer">
                
                    <form action="main.php" method="POST">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="listar_organismos">
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
