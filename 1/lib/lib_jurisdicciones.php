<?php

// SECCION FORMULARIOS

/*
** funcion que carga el formulario para carga de jurisdiccion
*/
function newJurisdiccion($conn){

   echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Jurisdicción</h2><hr>
	        <form action="main.php" method="POST">
	        
	        <div class="form-group">
            <label for="nombre">Código Jurisdicción</label>
            <input type="text" class="form-control" id="nombre" name="cod_jur"  maxlength="2" placeholder="Ingrese el código de la Jurisdicción" required>
            </div><hr>
	        
	        <div class="form-group">
		  <label for="nombre">Jurisdicción</label>
		  <input type="text" class="form-control" id="nombre" name="descripcion"  maxlength="120" placeholder="Ingrese el Nombre de la Jurisdicción" required>
		</div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="add_jurisdiccion"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

}


/*
** funcion editar Jurisdicción
*/
function formEditJurisdiccion($id,$conn){

  $sql = "select * from jurisdicciones where id = '$id'";
  mysqli_select_db($conn,'gesdoju');
  $query = mysqli_query($conn,$sql);
  while($fila = mysqli_fetch_array($query)){
        $cod_jur = $fila['cod_jur'];
        $descripcion = $fila['descripcion'];
        }
       
       echo '<div class="container">
            <div class="row">
            <div class="col-sm-8">
            
            <div class="panel panel-success">
            <div class="panel-heading"><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar Jurisdicción</div>
            <div class="panel-body">
            <form action="main.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
            <div class="form-group">
                <label for="email">Código Jurisdicción:</label>
                <input type="text" class="form-control" name="cod_jur" value="'.$cod_jur.'" readonly>
            </div><hr>
            
            <div class="form-group">
                <label for="email">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" value="'.$descripcion.'">
            </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="updateJur">Aceptar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}

/*
** Funcion carga formulario de eliminacion de registro
*/
function formBorrarJurisdiccion($id,$conn){
    
    $sql = "select * from jurisdicciones where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Norma</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Jurisdicción</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['descripcion'].'" readonly>
		</div><hr>
		
		
		<button type="submit" class="btn btn-success btn-block" name="delete_jur"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form> 
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	      
	    </div>
	    </div>
	</div>';

}

// END SECCION FORMULARIOS

// ============================================================================== //

// SECCION PERSISTENCIA

/*
** funcion que agrega Jurisdicción a la base de datos
*/
function add_jurisdiccion($cod_jur,$descripcion,$conn){

    $sql = "select cod_jur, descripcion from jurisdicciones where cod_jur = '$cod_jur' or descripcion = '$descripcion'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
          
    if($rows == 0){
            
            $consulta = "INSERT INTO jurisdicciones".
            "(cod_jur,descripcion)".
            "VALUES ".
        "('$cod_jur','$descripcion')";
        mysqli_select_db($conn,'gesdoju');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Registro Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Registro. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
		    
                echo "<br>";
			    echo '<div class="container">';
			     echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Ya existe registro de ese Organismo. Verifique el Código de Organismo o la Descripción del mismo. No puede haber dos Organismos con la misma Descripción o Código';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** funcion actualizar registro de Jurisdicción
*/
function updateJurisdiccion($id,$cod_jur,$descripcion,$conn){

        $sql = "update jurisdicciones set cod_jur = '$cod_jur', descripcion = '$descripcion' where id = '$id'";
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);
        
        if($query){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Registro Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
        }else{
                    echo "<br>";
                    echo '<div class="container">';
                    echo '<div class="alert alert-warning" alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Registro. '  .mysqli_error($conn);
                    echo "</div>";
                    echo "</div>";
                }


}

/*
** Función para eliminar un registro de la tabla jurisdicciones
*/

function delJurisdiccion($id,$conn){

		
	mysqli_select_db($conn,'gesdoju');
	$sql = "delete from jurisdicciones where id = '$id'";
           
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
}


// FIN SECCIO PERSISTENCIA

// ============================================================================== //


// SECCION LISTADOS

/*
** funcion para listar jurisdicciones
*/
function jurisdicciones($conn){

if($conn){
	
	$sql = "SELECT * FROM jurisdicciones";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Jurisdicciones
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Código Jurisdicción</th>
		    <th class='text-nowrap text-center'>Jurisdicción</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cod_jur']."</td>";
			 echo '<td align=center>'.$fila['descripcion'].'</td>';
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos de la Jurisdicción"><button type="submit" class="btn btn-success btn-sm" name="edit_jur"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro"><button type="submit" class="btn btn-danger btn-sm" name="del_jur"><img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>';
                    
             echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_jur"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Jurisdicción</button>
                    </form>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}
?>
