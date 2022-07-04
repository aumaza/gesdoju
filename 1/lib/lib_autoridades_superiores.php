<?php


/*
** funcion que lista toda la información de las autoridades superiores
*/

function autoridadesSuperiores($conn){

if($conn){
	
	$sql = "SELECT * FROM autoridades_superiores";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/status/meeting-participant.png"  class="img-reponsive img-rounded"> Autoridades Superiores [ Listado de Autoridades ]</h2><hr>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Año</th>
		    <th class='text-nowrap text-center'>Mes</th>
            <th class='text-nowrap text-center'>Jurisdicción</th>
            <th class='text-nowrap text-center'>Funcionario</th>
            <th class='text-nowrap text-center'>Cargo</th>
            <th class='text-nowrap text-center'>Asignación Mensual</th>
            <th class='text-nowrap text-center'>Asignación Desarraigo</th>
            <th class='text-nowrap text-center'>SAC</th>
            <th class='text-nowrap text-center'>Otros Conceptos</th>
            <th class='text-nowrap text-center'>Observaciones</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['anio']."</td>";
			 echo "<td align=center>".$fila['mes']."</td>";
			 echo "<td align=center>".$fila['jurisdiccion']."</td>";
			 echo "<td align=center>".$fila['apellido_nombre']."</td>";
			 echo "<td align=center>".$fila['cargo']."</td>";
			 echo "<td align=center>".$fila['asignacion_mensual']."</td>";
			 echo "<td align=center>".$fila['desarraigo']."</td>";
			 echo "<td align=center>".$fila['sac']."</td>";
			 echo "<td align=center>".$fila['otros_conceptos']."</td>";
			 echo "<td align=center>".$fila['observaciones']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos del Funcionario">
                        <button type="submit" class="btn btn-success btn-sm" name="edit_autoridad">
                            <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <button type="submit" class="btn btn-danger btn-sm" name="del_autoridad">
                            <img src="../../icons/places/user-trash.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    </form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_as">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Autoridad Superior</button>
                    </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** funcion formulario de carga de nueva autoridad
*/
function formAddAutoridad($conn){


echo '<div class="container">
        <div class="jumbotron">
            <p><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Nueva Autoridad</p><hr>
            
            
            
                <form action="main.php" method="POST">
                    <div class="form-group">
                    
                    <label>Año:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el año" name="anio" maxlength="4" minlength="4" required>
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
                        <label for="sel1">Jurisdicción</label>
                        <select class="form-control" name="jurisdiccion" required>
                        <option value="" disabled selected>Seleccionar</option>';
                            
                            if($conn){
                            $query = "SELECT * FROM jurisdicciones order by descripcion ASC";
                            mysqli_select_db($conn,'gesdoju');
                            $res = mysqli_query($conn,$query);

                            if($res){
                                while ($valores = mysqli_fetch_array($res)){
                                echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                                }
                                }
                            }

                            mysqli_close($conn);
                        
                        echo '</select>
                        </div>
                    
                    <div class="form-group">
                    <label>Funcionario:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el Apellido y Nombre del funcionario" name="funcionario" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Cargo:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el cargo ocupado" name="cargo" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Asignación Mensual:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma en concepto de salario" name="salario" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Asignación Desarraigo:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma en concepto de desarraigo" name="desarraigo">
                    </div>
                    
                    <div class="form-group">
                    <label>SAC - Sueldo Anual Complementario:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma en concepto de sac" name="sac">
                    </div>
                    
                    <div class="form-group">
                    <label>Otros Conceptos:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma de otros conceptos" name="otros_conceptos" required>
                    </div>
                    
                     <div class="form-group">
                    <label>Observaciones:</label>
                    <textarea class="form-control" rows="5" placeholder="Ingrese una breve observación. Cantidad máxima de caracteres 240" name="observaciones" maxlength="240"></textarea>
                    </div><hr> 
                                        
                    <button type="submit" class="btn btn-success btn-block" name="add_funcionario">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>';


}

/*
** funcion para persistencia de autoridades superiores
*/
function addAutoridad($anio,$mes,$jurisdiccion,$funcionario,$cargo,$asignacion_mensual,$desarraigo,$sac,$otros,$observaciones,$conn){

    mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "INSERT INTO autoridades_superiores ".
		"(anio,mes,jurisdiccion,apellido_nombre,cargo,asignacion_mensual,desarraigo,sac,otros_conceptos,observaciones)".
		"VALUES ".
      "('$anio','$mes','$jurisdiccion','$funcionario','$cargo','$asignacion_mensual','$desarraigo','$sac','$otros','$observaciones')";
           
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
** funcion formulario de edición de registro
*/
function formEditAutoridad($id,$conn){

    $sql = "select * from autoridades_superiores where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
    
    echo '<div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar Autoridad</div>
            <div class="panel-body">
            
            
                <form action="main.php" method="POST">
                    <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
                    
                    <div class="form-group">
                    <label>Año:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el año" name="anio" value="'.$fila['anio'].'" maxlength="4" minlength="4" required>
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
                        <label for="sel1">Jurisdicción</label>
                        <select class="form-control" name="jurisdiccion" required>
                        <option value="" disabled selected>Seleccionar</option>';
                            
                            if($conn){
                            $query = "SELECT * FROM jurisdicciones order by descripcion ASC";
                            mysqli_select_db($conn,'gesdoju');
                            $res = mysqli_query($conn,$query);

                            if($res){
                                while ($valores = mysqli_fetch_array($res)){
                                echo '<option value="'.$valores[descripcion].'" '.("'.$fila[jurisdiccion].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
                                }
                                }
                            }

                            mysqli_close($conn);
                        
                        echo '</select>
                        </div>
                    
                    <div class="form-group">
                    <label>Funcionario:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el Apellido y Nombre del funcionario" value="'.$fila['apellido_nombre'].'" name="funcionario" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Cargo:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el cargo ocupado" name="cargo" value="'.$fila['cargo'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Asignación Mensual:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma en concepto de salario" name="salario" value="'.$fila['asignacion_mensual'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Asignación Desarraigo:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma en concepto de desarraigo" name="desarraigo" value="'.$fila['desarraigo'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>SAC - Sueldo Anual Complementario:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma en concepto de sac" name="sac" value="'.$fila['sac'].'" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Otros Conceptos:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la suma de otros conceptos" name="otros_conceptos" value="'.$fila['otros_conceptos'].'" required>
                    </div>
                    
                     <div class="form-group">
                    <label>Observaciones:</label>
                    <textarea class="form-control" rows="5" placeholder="Ingrese una breve observación. Cantidad máxima de caracteres 240" name="observaciones" maxlength="240">'.$fila['observaciones'].'</textarea>
                    </div><hr> 
                                        
                    <button type="submit" class="btn btn-success btn-block" name="update_funcionario">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>
            </div>';

}


/*
** funcion persistencia al actualizar datos de registro
*/
function updateAutoridad($id,$anio,$mes,$jurisdiccion,$funcionario,$cargo,$asignacion_mensual,$desarraigo,$sac,$otros,$observaciones,$conn){

    mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "update autoridades_superiores set anio = '$anio', mes = '$mes', jurisdiccion = '$jurisdiccion', apellido_nombre = '$funcionario', cargo = '$cargo', asignacion_mensual = '$asignacion_mensual', desarraigo = '$desarraigo', sac = '$sac', otros_conceptos = '$otros', observaciones = '$observaciones' where id = '$id'";
           
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
function formBorrarAutoridad($id,$conn){

    $sql = "select * from autoridades_superiores where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Registro Autoridad Superior</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar el siguiente Registro del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Funcionario</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['apellido_nombre'].'" readonly>
		</div><hr>
		
		
		<button type="submit" class="btn btn-success btn-block" name="delete_autoridad"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
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
function delAutoridad($id,$conn){

    mysqli_select_db($conn,'gesdoju');
	$sql = "delete from autoridades_superiores where id = '$id'";
           
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
** funcion que carga fomulario para calcular promedio de remuneraciones
*/
function formPromedio(){

    echo '<div class="alert alert-info" align="center">
	  <h3>Autoridades Superiores</h3>
	  <p>Filtros para calcular Promedio de Remuneraciones por Mes de un determinado Año o de un Año determinado</p>
	 </div><hr>
   
	  <form action="main.php" method="POST">
	    
	    <div class="form-group">
            <label>Mes:</label>
              <select class="form-control" name="mes" >
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
	      <label>Ingrese Año:</label>
	      <input type="text" class="form-control" name="anio" maxlength="4" required>
	    </div><hr>
	    
	        
	    <div class="alert alert-warning" alert-dismissible role="alert" align="center">
              <img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded">
		<strong>Importante:</strong> Tenga en cuenta, que el filtro calculará el promedio de Remuneraciones de acuerdo al mes y/o Año que usted seleccione
            </div><hr>
	  
	  <div class="alert alert-warning" align="center">
	   <button type="submit" class="btn btn-default" name="promedio_mes_autoridades">
	      <img src="../../icons/actions/view-calendar-month.png"  class="img-reponsive img-rounded"> Promedio Mes</button>
	    <button type="submit" class="btn btn-default" name="promedio_anio_autoridades">
	      <img src="../../icons/actions/view-calendar.png"  class="img-reponsive img-rounded"> Promedio Año</button>
	  </div>
	 </form><br>';


}


/*
** funcion que devuelve el filtro aplicado para un mes y año determinado
*/
function filtroMesAutoridades($mes,$anio,$conn){
  
  $sql = "select AVG(asignacion_mensual) as promedio from autoridades_superiores where mes = '$mes' and anio = '$anio'";
  mysqli_select_db($conn,'gesdoju');
  $query = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($query)){
    $promedio = $row['promedio'];
  }
  
  if($promedio == ''){
    
    $promedio = '0.00';
    
    
  }
  
  if($query){
  
  setlocale(LC_ALL,"es_ES");
      
    
     
	echo '<div class="alert alert-success" alert-dismissible role="alert">
		<img src="../../icons/status/task-complete.png"  class="img-reponsive img-rounded">
		  <strong>Atención:</strong> El promedio de remuneraciones para el mes: <strong>'."$mes".'</strong> y el año <strong>'."$anio".'</strong> es de <strong>$'."$promedio".'</strong>
	      </div>';
    
  
  }else{
    
    echo '<div class="alert alert-success" alert-dismissible role="alert">
	    <img src="../../icons/status/task-complete.png"  class="img-reponsive img-rounded">
	      <strong>Atención:</strong> Hubo un error al intentar realizar la consulta...
	  </div>';
  }
  
  
  
}


/*
** funcion que devuelve el filtro aplicado para un mes y año determinado
*/
function filtroAnioAutoridades($anio,$conn){
  
  $sql = "select AVG(asignacion_mensual) as promedio from autoridades_superiores where anio = '$anio'";
  mysqli_select_db($conn,'gesdoju');
  $query = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($query)){
    $promedio = $row['promedio'];
  }
  
  if($promedio == ''){
    
    $promedio = '0.00';
    
    
  }
  
  if($query){
  
  setlocale(LC_ALL,"es_ES");
      
    
     
	echo '<div class="alert alert-success" alert-dismissible role="alert">
		<img src="../../icons/status/task-complete.png"  class="img-reponsive img-rounded">
		  <strong>Atención:</strong> El promedio de remuneraciones para el año <strong>'."$anio".'</strong> es de <strong>$'."$promedio".'</strong>
	      </div>';
    
  
  }else{
    
    echo '<div class="alert alert-success" alert-dismissible role="alert">
	    <img src="../../icons/status/task-complete.png"  class="img-reponsive img-rounded">
	      <strong>Atención:</strong> Hubo un error al intentar realizar la consulta...
	  </div>';
  }
  
  
  
}


?>
