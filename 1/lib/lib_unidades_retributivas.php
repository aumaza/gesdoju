<?php


/*
** funcion que lista toda la información de las Unidades Retributivas por Nivel y Grado
*/

function unidadesRetributivas($conn){

if($conn){
	
	$sql = "SELECT * FROM unidades_retributivas";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/format-list-ordered.png"  class="img-reponsive img-rounded"> Unidades Retributivas
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nivel</th>
		    <th class='text-nowrap text-center'>Grado</th>
		    <th class='text-nowrap text-center'>Sueldo UR</th>
		    <th class='text-nowrap text-center'>Dedicación Func. UR</th>
		    <th class='text-nowrap text-center'>Total</th>
		    <th>&nbsp;</th>
		    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nivel']."</td>";
			 echo "<td align=center>".$fila['grado']."</td>";
			 echo "<td align=center>".$fila['sueldo_ur']."</td>";
			 echo "<td align=center>".$fila['dedicacion_funcional_ur']."</td>";
			 echo "<td align=center>".$fila['total_ur']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos">
                        <button type="submit" class="btn btn-success btn-sm" name="edit_ur">
                            <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <button type="submit" class="btn btn-danger btn-sm" name="del_ur">
                            <img src="../../icons/places/user-trash.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    </form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_ur">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar</button>
                    </form>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}

/*
** funcion formulario de carga de nueva unidad retributiva
*/
function formAddUR($conn){


echo '<div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Unidad Retributiva</div>
            <div class="panel-body">
            
            
                <form action="main.php" method="POST">
                    <div class="form-group">
                                      
                    <div class="form-group">
                        <label>Nivel Escalafonario:</label>
                        <select class="form-control" name="nivel" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Grado Escalafonario:</label>
                        <select class="form-control" name="grado" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                                  
                    <div class="form-group">
                    <label>Sueldo Cantidad UR:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="sueldo_cant_ur" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Dedicación Funcional Cantidad UR:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="df_cant_ur" required>
                    </div><hr>
                                        
                    <button type="submit" class="btn btn-success btn-block" name="agregar_ur">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>
            </div>';

}


/*
** funcion formulario de edición para un registro de unidad retributiva
*/
function formEditUR($id,$conn){

      $sql = "select * from unidades_retributivas where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);


echo '<div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar Unidad Retributiva</div>
            <div class="panel-body">
            
            
                <form action="main.php" method="POST">
                    <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />  
                
                                                          
                    <div class="form-group">
                        <label>Nivel Escalafonario:</label>
                        <select class="form-control" name="nivel" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="A" '.($fila['nivel'] == "A" ? "selected" : ""). '>A</option>
                            <option value="B" '.($fila['nivel'] == "B" ? "selected" : ""). '>B</option>
                            <option value="C" '.($fila['nivel'] == "C" ? "selected" : ""). '>C</option>
                            <option value="D" '.($fila['nivel'] == "D" ? "selected" : ""). '>D</option>
                            <option value="E" '.($fila['nivel'] == "E" ? "selected" : ""). '>E</option>
                            <option value="F" '.($fila['nivel'] == "F" ? "selected" : ""). '>F</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Grado Escalafonario:</label>
                        <select class="form-control" name="grado" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="0" '.($fila['grado'] == "0" ? "selected" : ""). '>0</option>
                            <option value="1" '.($fila['grado'] == "1" ? "selected" : ""). '>1</option>
                            <option value="2" '.($fila['grado'] == "2" ? "selected" : ""). '>2</option>
                            <option value="3" '.($fila['grado'] == "3" ? "selected" : ""). '>3</option>
                            <option value="4" '.($fila['grado'] == "4" ? "selected" : ""). '>4</option>
                            <option value="5" '.($fila['grado'] == "5" ? "selected" : ""). '>5</option>
                            <option value="6" '.($fila['grado'] == "6" ? "selected" : ""). '>6</option>
                            <option value="7" '.($fila['grado'] == "7" ? "selected" : ""). '>7</option>
                            <option value="8" '.($fila['grado'] == "8" ? "selected" : ""). '>8</option>
                            <option value="9" '.($fila['grado'] == "9" ? "selected" : ""). '>9</option>
                            <option value="10" '.($fila['grado'] == "10" ? "selected" : ""). '>10</option>
                        </select>
                    </div>
                                  
                    <div class="form-group">
                    <label>Sueldo Cantidad UR:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="sueldo_cant_ur" value="'.$fila['sueldo_ur'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Dedicación Funcional Cantidad UR:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="df_cant_ur" value="'.$fila['dedicacion_funcional_ur'].'" required>
                    </div>
                    
                    <hr> 
                                        
                    <button type="submit" class="btn btn-success btn-block" name="update_ur">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>
            </div>';

}


/*
** eliminar registro de funcionarios
*/
function formBorrarUR($id,$conn){

    $sql = "select * from unidades_retributivas where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Registro Unidad Retributiva</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Nivel</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['nivel'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Grado</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['grado'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Sueldo Cantidad UR</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['sueldo_ur'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Dedicación Funcional Cantidad UR</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['dedicacion_funcional_ur'].'" readonly>
		</div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="delete_ur"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form> 
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	      
	    </div>
	    </div>
	</div>';

}


// ========================================================================== //
// Seccion PERSISTENCIA //
// ========================================================================== //

/*
** funcion para persistencia de funciones ejecutivas
*/
function addUR($nivel,$grado,$sueldo_ur,$df_ur,$conn){


    $total_ur = $sueldo_ur + $df_ur;
    
    mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "INSERT INTO unidades_retributivas ".
		"(nivel,grado,sueldo_ur,dedicacion_funcional_ur, total_ur)".
		"VALUES ".
      "('$nivel','$grado','$sueldo_ur','$df_ur','$total_ur')";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Registro Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
	}else{
            echo '<div class="container">';
            echo '<div class="alert alert-warning" alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Registro. '  .mysqli_error($conn);
			echo "</div>";
			echo "</div>";
	}


}


/*
** funcion que borra regitro de la base de datos
*/
function delUR($id,$conn){

    mysqli_select_db($conn,'gesdoju');
	$sql = "delete from unidades_retributivas where id = '$id'";
           
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


/*
** funcion persistencia al actualizar datos de registro
*/
function updateUR($id,$nivel,$grado,$sueldo_ur,$df_ur,$conn){

    $total_ur = $sueldo_ur + $df_ur;
    
    mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "update unidades_retributivas set nivel = '$nivel', grado = '$grado', sueldo_ur = '$sueldo_ur', dedicacion_funcional_ur = '$df_ur', total_ur = '$total_ur' where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Registro Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
	}else{
            echo '<div class="container">';
            echo '<div class="alert alert-warning" alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Registro. '  .mysqli_error($conn);
			echo "</div>";
			echo "</div>";
	}

}


?>
