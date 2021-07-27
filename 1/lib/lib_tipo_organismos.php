<?php

// ====================================== LISTADOS ====================================== //
/*
** funcion para listar tipo de organismos
*/
function tipoOrganismos($conn){

if($conn){
	
	$sql = "SELECT * FROM tipo_organismo";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Clasificación de Organismos
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Código Clasificación</th>
		    <th class='text-nowrap text-center'>Clasificación</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cod_organismo']."</td>";
			 echo '<td align=center>'.$fila['descripcion'].'</td>';
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos del Tipo de Organismo"><button type="submit" class="btn btn-success btn-sm" name="edit_tipo_org"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro"><button type="submit" class="btn btn-danger btn-sm" name="del_tipo_org"><img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>';
                    
             echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_tipo_org"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Nueva Clasificación</button>
                    </form>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


// ====================================== FORMULARIOS ====================================== //

/*
** funcion que carga el formulario para carga de organismos
*/
function newTipoOrganismo($conn){

   echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Nueva Clasificación de Organismo</h2><hr>
	        <form action="main.php" method="POST">
	        
	        <div class="form-group">
            <label for="nombre">Código</label>
            <input type="text" class="form-control" id="nombre" name="cod_org"  maxlength="2" placeholder="Ingrese el código de clasificación" required>
            </div><hr>
	        
	        <div class="form-group">
		  <label for="nombre">Clasificación</label>
		  <input type="text" class="form-control" id="nombre" name="descripcion"  maxlength="120" placeholder="Ingrese la clasificación de tipo de organismo" required>
		</div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="add_tipo_organismo"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

}


/*
** funcion que carga el formulario para editar carga de organismos
*/
function editTipoOrganismo($id,$conn){
    
    $sql = "select * from tipo_organismo where id = '$id'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $cod = $row['cod_organismo'];
        $descripcion = $row['descripcion'];
    }
    
    
   echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Editar Clasificación de Organismo</h2><hr>
	        <form action="main.php" method="POST">
	        <input type="hidden" name="id" value="'.$id.'">
	        
	        <div class="form-group">
            <label for="nombre">Código</label>
            <input type="text" class="form-control" id="nombre" name="cod_org"  maxlength="2" value="'.$cod.'" required>
            </div><hr>
	        
	        <div class="form-group">
		  <label for="nombre">Clasificación</label>
		  <input type="text" class="form-control" id="nombre" name="descripcion"  maxlength="120" value="'.$descripcion.'" required>
		</div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="update_tipo_organismo"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

}




// ====================================== PERSISTENCIA ====================================== //

/*
** funcion que agrega Organismos a la base de datos
*/
function addTipoOrganismo($cod_org,$descripcion,$conn){

    $sql = "select cod_organismo, descripcion from tipo_organismo where cod_organismo = '$cod_org' or descripcion = '$descripcion'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
          
    if($rows == 0){
            
            $consulta = "INSERT INTO tipo_organismo".
            "(cod_organismo,descripcion)".
            "VALUES ".
        "('$cod_org','$descripcion')";
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
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Ya existe registro de esa Clasificación de Organismo. Verifique el Código o la Descripción del mismo. No puede haber dos Clasificaciones con la misma Descripción o Código';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** funcion actualizar registro de tipo de organismos
*/
function updateTipoOrganismo($id,$cod_org,$descripcion,$conn){

        $sql = "update tipo_organismo set cod_organismo = '$cod_org', descripcion = '$descripcion' where id = '$id'";
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

?>
