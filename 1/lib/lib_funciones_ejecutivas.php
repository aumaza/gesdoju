<?php

/*
** funcion que lista toda la información de las funciones ejecutivas
*/

function funcionesEjecutivas($conn){

if($conn){
	
	$sql = "SELECT * FROM funciones_ejecutivas";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/quickopen-class.png"  class="img-reponsive img-rounded"> Funciones Ejecutivas
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Nivel</th>
		    <th class='text-nowrap text-center'>Cantidad UR</th>
            <th class='text-nowrap text-center'>Valor UR</th>
            <th class='text-nowrap text-center'>Monto</th>
            <th class='text-nowrap text-center'>Norma Regulatoria</th>
            <th class='text-nowrap text-center'>Entrada Vigencia</th>
            <th class='text-nowrap text-center'>Mes</th>
            <th class='text-nowrap text-center'>Año</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['nivel']."</td>";
			 echo "<td align=center>".$fila['cant_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['valor_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['monto']."</td>";
			 echo "<td align=center>".$fila['norma_regulatoria']."</td>";
			 echo "<td align=center>".$fila['f_entrada_vigencia']."</td>";
			 echo "<td align=center>".$fila['mes']."</td>";
			 echo "<td align=center>".$fila['anio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos">
                        <button type="submit" class="btn btn-success btn-sm" name="edit_funcion_ejecutiva">
                            <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <button type="submit" class="btn btn-danger btn-sm" name="del_funcion_ejecutiva">
                            <img src="../../icons/places/user-trash.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    </form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_fe">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Funcion Ejecutiva</button>
                    </form>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** funcion formulario de carga de nueva función ejecutiva
*/
function formAddFuncionEjecutiva($conn){


echo '<div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Nueva Función Ejecutiva</div>
            <div class="panel-body">
            
            
                <form action="main.php" method="POST">
                    <div class="form-group">
                    
                    
                    <div class="form-group">
                        <label>Nivel Función Ejecutiva:</label>
                        <select class="form-control" name="nivel" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Cantidad UR por Nivel:</label>
                        <select class="form-control" name="cant_ur" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="1895">Nivel 1 - 1895</option>
                            <option value="1684">Nivel 2 - 1684</option>
                            <option value="1474">Nivel 3 - 1474</option>
                            <option value="1263">Nivel 4 - 1263</option>
                        </select>
                    </div>
                    
                                     
                    <div class="form-group">
                    <label>Valor de UR:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el valor de UR sin separador de miles y use un punto en lugar de una coma para los decimales" name="valor_ur" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Norma Regulatoria:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la norma que regula" name="norma_regulatoria" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Fecha Entrada Vigencia:</label>
                    <input type="date" class="form-control" name="f_entrada_vigencia" required>
                    </div>
                    
                     <div class="form-group">
                        <label>Mes:</label>
                        <select class="form-control" name="mes" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Enero">Enero</option>
                            <option value="Febrero">Febrero</option>
                            <option value="Marzo">Marzo</option>
                            <option value="Abril">Abril</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Junio">Junio</option>
                            <option value="Julio">Julio</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Septiembre">Septiembre</option>
                            <option value="Octubre">Octubre</option>
                            <option value="Noviembre">Noviembre</option>
                            <option value="Diciembre">Diciembre</option>
                        </select>
                    </div>
                    
                                      
                    <div class="form-group">
                    <label>Año:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el año, formato de 4 dígitos" name="anio" minlength="4" maxlength="4" required>
                    </div><hr> 
                                        
                    <button type="submit" class="btn btn-success btn-block" name="add_funcion_ejecutiva">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>
            </div>';


}


/*
** funcion para persistencia de funciones ejecutivas
*/
function addFuncionEjecutiva($nivel,$cant_ur,$valor_ur,$norma_regulatoria,$f_vigencia,$mes,$anio,$conn){

    $monto = $cant_ur * $valor_ur;
    $monto = number_format((float)$monto, 2, '.', '');
    
    mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "INSERT INTO funciones_ejecutivas ".
		"(nivel,cant_ur,valor_ur,monto,norma_regulatoria,f_entrada_vigencia,mes,anio)".
		"VALUES ".
      "('$nivel','$cant_ur','$valor_ur','$monto','$norma_regulatoria','$f_vigencia','$mes','$anio')";
           
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
** funcion formulario de carga de nueva función ejecutiva
*/
function formEditFuncionEjecutiva($id,$conn){

        $sql = "select * from funciones_ejecutivas where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);


echo '<div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar Función Ejecutiva</div>
            <div class="panel-body">
            
            
                <form action="main.php" method="POST">
                    <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />                  
                    
                    <div class="form-group">
                        <label>Nivel Función Ejecutiva:</label>
                        <select class="form-control" name="nivel" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="1" '.($fila['nivel'] == "1" ? "selected" : ""). '>1</option>
                            <option value="2" '.($fila['nivel'] == "2" ? "selected" : ""). '>2</option>
                            <option value="3" '.($fila['nivel'] == "3" ? "selected" : ""). '>3</option>
                            <option value="4" '.($fila['nivel'] == "4" ? "selected" : ""). '>4</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Cantidad UR por Nivel:</label>
                       <select class="form-control" name="cant_ur" required>
                           <option value="" disabled selected>Seleccionar</option>
                           <option value="1895" '.($fila['cant_ur'] == "1895" ? "selected" : ""). '>Nivel 1 - 1895</option>
                           <option value="1684" '.($fila['cant_ur'] == "1684" ? "selected" : ""). '>Nivel 2 - 1684</option>
                           <option value="1474" '.($fila['cant_ur'] == "1474" ? "selected" : ""). '>Nivel 3 - 1474</option>
                           <option value="1263" '.($fila['cant_ur'] == "1263" ? "selected" : ""). '>Nivel 4 - 1263</option>
                       </select>
                    </div>
                    
                    
                    <div class="form-group">
                    <label>Valor de UR:</label>
                    <input type="text" class="form-control" name="valor_ur" value="'.$fila['valor_ur'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Norma Regulatoria:</label>
                    <input type="text" class="form-control" name="norma_regulatoria" value="'.$fila['norma_regulatoria'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Fecha Entrada Vigencia:</label>
                    <input type="date" class="form-control" name="f_entrada_vigencia"  value="'.$fila['f_entrada_vigencia'].'" required>
                    </div>
                    
                     <div class="form-group">
                        <label>Mes:</label>
                        <select class="form-control" name="mes" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Enero" '.($fila['mes'] == "Enero" ? "selected" : ""). '>Enero</option>
                            <option value="Febrero" '.($fila['mes'] == "Febrero" ? "selected" : ""). '>Febrero</option>
                            <option value="Marzo" '.($fila['mes'] == "Marzo" ? "selected" : ""). '>Marzo</option>
                            <option value="Abril" '.($fila['mes'] == "Abril" ? "selected" : ""). '>Abril</option>
                            <option value="Mayo" '.($fila['mes'] == "Mayo" ? "selected" : ""). '>Mayo</option>
                            <option value="Junio" '.($fila['mes'] == "Junio" ? "selected" : ""). '>Junio</option>
                            <option value="Julio" '.($fila['mes'] == "Julio" ? "selected" : ""). '>Julio</option>
                            <option value="Agosto" '.($fila['mes'] == "Agosto" ? "selected" : ""). '>Agosto</option>
                            <option value="Septiembre" '.($fila['mes'] == "Septiembre" ? "selected" : ""). '>Septiembre</option>
                            <option value="Octubre" '.($fila['mes'] == "Octubre" ? "selected" : ""). '>Octubre</option>
                            <option value="Noviembre" '.($fila['mes'] == "Noviembre" ? "selected" : ""). '>Noviembre</option>
                            <option value="Diciembre" '.($fila['mes'] == "Diciembre" ? "selected" : ""). '>Diciembre</option>
                        </select>
                    </div>
                    
                                      
                    <div class="form-group">
                    <label>Año:</label>
                    <input type="text" class="form-control" name="anio" value="'.$fila['anio'].'" minlength="4" maxlength="4" required>
                    </div><hr> 
                                        
                    <button type="submit" class="btn btn-success btn-block" name="update_fe">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>
            </div>';


}


/*
** funcion persistencia al actualizar datos de registro
*/
function updateFuncionEjecutiva($id,$nivel,$cant_ur,$valor_ur,$norma_regulatoria,$f_vigencia,$mes,$anio,$conn){

    $monto = $cant_ur * $valor_ur;
    $monto = number_format((float)$monto, 2, '.', '');
    
    mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "update funciones_ejecutivas set nivel = '$nivel', cant_ur = '$cant_ur', valor_ur = '$valor_ur', monto = '$monto', norma_regulatoria = '$norma_regulatoria', f_entrada_vigencia = '$f_vigencia', mes = '$mes', anio = '$anio' where id = '$id'";
           
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


/*
** eliminar registro de funcionarios
*/
function formBorrarFuncionEjecutiva($id,$conn){

    $sql = "select * from funciones_ejecutivas where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Registro Funciones ejecutivas</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Nivel Funcion Ejecutiva</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['nivel'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Cantidad UR</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['cant_ur'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Valor UR</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['valor_ur'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Monto</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['monto'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Mes</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['mes'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Norma Regulatoria</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['norma_regulatoria'].'" readonly>
		</div><hr>
		
		<div class="form-group">
		  <label for="nombre">Año</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['anio'].'" readonly>
		</div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="delete_funcion_ejecutiva"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form> 
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	      
	    </div>
	    </div>
	</div>';

}


/*
** funcion que borra regitro de la base de datos
*/
function delFuncionEjecutiva($id,$conn){

    mysqli_select_db($conn,'gesdoju');
	$sql = "delete from funciones_ejecutivas where id = '$id'";
           
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


?>
