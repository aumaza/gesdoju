<?php

class ClasificadorInstitucional{

    // PROPERTIES
    private $ordenamiento = '';
    private $descripcion = '';

    // CONSTRUCTOR DESPARAMETRIZADO
    function __construct(){
        $this->ordenamiento = '';
        $this->descripcion = '';
    }

    // SETTERS
    private function setOrdenamiento($var){
        $this->ordenamiento = $var;
    }

    private function setDescripcion($var){
        $this->descripcion = $var;
    }

    // GETTERS
    private function getOrdenamiento($var){
        return $this->ordenamiento = $var;
    }

    private function getDescripcion($var){
        return $this->descripcion = $var;
    }

    // METHODS
    // LISTAR CLASIFICADOR
    public function listarClasificadorInstitucional($oneClasificador,$conn,$dbase){

if($conn){

	$sql = "SELECT * FROM clasificador_institucional";
    mysqli_select_db($conn,$dbase);
    $resultado = mysqli_query($conn,$sql);

	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Clasificador Institucional [ Listado ]</h2><hr>';


      echo "<table class='display compact' style='width:100%' id='clasificadorTable'>";


      echo "<thead>
		    <th class='text-nowrap text-center'>Ordenamiento</th>
		    <th class='text-nowrap text-center'>Descripción</th>
		    <th class='text-nowrap text-center'>Acciones</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$oneClasificador->getOrdenamiento($fila['clasificador'])."</td>";
			 echo "<td align=center>".$oneClasificador->getDescripcion($fila['descripcion'])."</td>";
			 echo "<td class='text-nowrap' align=center>";
			 echo '<div class="btn-group">
                         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Acciones <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">

                          <li><button type="button" class="btn btn-default btn-sm btn-block" value="'.$fila['id'].'"  onclick="callEditClasificador(this.value);">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Clasificador
                                </button></li>

                          <li><button type="button" class="btn btn-default btn-sm btn-block" value="'.$fila['id'].'"  onclick="callDeleteClasificador(this.value);">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                                </button></li>

                        </ul>
                      </div>';

                echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<button type="button" class="btn btn-success btn-sm"          onclick="callNewClasificador();">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Clasificador</button><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';

		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

} // FIN MÉTODO LISTAR ORGANISMOS

// FORMULARIOS //
/*
** funcion que carga el formulario para carga de clasificador institucional
*/
public function newClasificador(){

   echo '<div class="container">
	    <div class="jumbotron">

	      <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cargar Clasificador Institucional</h2><hr>

	        <form id="fr_add_new_clasificador_ajax" method="POST">

	        <div class="form-group">
            <label for="cod_clasificador">Clasificador</label>
            <input type="text" class="form-control" id="cod_clasificador" name="cod_clasificador"  maxlength="15" placeholder="Ingrese el código de clasificador. Ej.: 0.0.0.00.00.000" required>
            </div><hr>

	        <div class="form-group">
            <label for="clasificador_descripcion">Descripción</label>
            <input type="text" class="form-control" id="clasificador_descripcion" name="clasificador_descripcion"  maxlength="200" placeholder="Ingrese la Descripción del clasificador" required>
            </div><hr>

		<button type="submit" class="btn btn-success btn-block" id="add_new_clasificador">
		<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
	      </form><hr>

	    </div>
        </div>';

} // FIN FORMULARIO DE CARGA DE CLASIFICADOR


/*
** funcion que carga el formulario para edicion de clasificador institucional
*/
public function formEditClasificador($oneClasificador,$id,$conn,$dbase){

    mysqli_select_db($conn,$dbase);
    $sql = "select * from clasificador_institucional where id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

   echo '<div class="container">
	    <div class="jumbotron">

	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Clasificador Institucional</h2><hr>

	        <form id="fr_update_clasificador_ajax" method="POST">
            <input type="hidden" id="id" name="id" value="'.$id.'">

	        <div class="form-group">
            <label for="cod_clasificador">Clasificador</label>
            <input type="text" class="form-control" id="cod_clasificador" name="cod_clasificador"  maxlength="15" placeholder="Ingrese el código de clasificador. Ej.: 0.0.0.00.00.000" value="'.$oneClasificador->getOrdenamiento($row['clasificador']).'" required>
            </div><hr>

	        <div class="form-group">
            <label for="clasificador_descripcion">Descripción</label>
            <input type="text" class="form-control" id="clasificador_descripcion" name="clasificador_descripcion"  maxlength="200" placeholder="Ingrese la Descripción del clasificador" value="'.$oneClasificador->getDescripcion($row['descripcion']).'" required>
            </div><hr>

		<button type="submit" class="btn btn-success btn-block" id="update_clasificador">
		<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Actualizar</button>
	      </form><hr>

	    </div>
        </div>';

} // FIN FORMULARIO DE EDICION DE CLASIFICADOR


/*
** funcion que carga el formulario para eliminar clasificador institucional
*/
public function formEliminarClasificador($oneClasificador,$id,$conn,$dbase){

    mysqli_select_db($conn,$dbase);
    $sql = "select * from clasificador_institucional where id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

   echo '<div class="container">
	    <div class="jumbotron">

	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Eliminar Clasificador Institucional</h2><hr>

	        <form id="fr_delete_clasificador_ajax" method="POST">
            <input type="hidden" id="id" name="id" value="'.$id.'">

	        <div class="form-group">
            <label for="cod_clasificador">Clasificador</label>
            <input type="text" class="form-control" id="cod_clasificador" name="cod_clasificador"  maxlength="15" placeholder="Ingrese el código de clasificador. Ej.: 0.0.0.00.00.000" value="'.$oneClasificador->getOrdenamiento($row['clasificador']).'" readonly>
            </div><hr>

	        <div class="form-group">
            <label for="clasificador_descripcion">Descripción</label>
            <input type="text" class="form-control" id="clasificador_descripcion" name="clasificador_descripcion"  maxlength="200" placeholder="Ingrese la Descripción del clasificador" value="'.$oneClasificador->getDescripcion($row['descripcion']).'" readonly>
            </div><hr>

		<button type="submit" class="btn btn-danger btn-block" id="delete_clasificador">
		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
	      </form><hr>

	    </div>
        </div>';

} // FIN FORMULARIO DE EDICION DE CLASIFICADOR


// ==================================== PERSISTENCIA ============================ //
// GUARDAR REGISTRO DE CLASIFICADOR
public function addClasificador($oneClasificador,$cod_clasificador,$clasificador_descripcion,$conn,$dbase){

    if(strlen($cod_clasificador) == 15){

    mysqli_select_db($conn,$dbase);
    $sql = "select clasificador from clasificador_institucional where clasificador = '$cod_clasificador'";
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);

    if($rows == 0){
        $sql_1 = "insert into clasificador_institucional ".
                 "(clasificador, descripcion) ".
                 "VALUES ".
                 "($oneClasificador->setOrdenamiento('$cod_clasificador'),
                   $oneClasificador->setDescripcion('$clasificador_descripcion'))";
        $query_1 = mysqli_query($conn,$sql_1);

        if($query_1){
            echo 1; // registro insertado correctamente
        }else{
            echo -1; // se produjo un error al insertar el registro
        }


    }if($rows > 0){
        echo 4; // REGISTRO EXISTENTE
    }

    }if(strlen($cod_clasificador) < 15){
        echo 7; // EL CLASIFICADOR DEBE TENER 15 CARACTERES
    }
}

// ACTUALIZAR REGISTRO DE CLASIFICADOR
public function updateClasificador($oneClasificador,$id,$cod_clasificador,$descripcion,$conn,$dbase){

    if(strlen($cod_clasificador) == 15){

            mysqli_select_db($conn,$dbase);
            $sql_1 = "update clasificador_institucional set ".
                     "clasificador = $oneClasificador->setOrdenamiento('$cod_clasificador'), ".
                     "descripcion = $oneClasificador->setDescripcion('$descripcion') ".
                     "where id = '$id'";
            $query_1 = mysqli_query($conn,$sql_1);

            if($query_1){
                echo 1; // actulizacion exitosa
            }else{
                echo -1; // error, no se ha podido actualziar el registro
            }

    }if(strlen($cod_clasificador) < 15){
        echo 7; // EL CLASIFICADOR DEBE TENER 15 CARACTERES
    }

}

// SE ELIMINA UN REGISTRO
public function deleteClasificador($id,$conn,$dbase){

    //se selecciona la base de datos
    mysqli_select_db($conn,$dbase);
    //se prepara el sql
    $sql = "delete from clasificador_institucional where id = '$id'";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo 1; // registro eliminado correctamente
    }else{
        echo -1; // hubo un problema al intentar borrar el registro
    }
}

} // END CLASS

?>
