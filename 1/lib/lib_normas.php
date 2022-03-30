<?php

/*
** Funcion alta de norma
*/
function newNorma($conn){

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Normativa</h2><hr>
	        <form action="#" method="POST" enctype="multipart/form-data">
	        
	        <div class="form-group">
		  <label for="nombre">Nombre de la Norma</label>
		  <input type="text" class="form-control" id="nombre_norma" name="nombre_norma"  maxlength="140" placeholder="Ingrese el Nombre de la Norma" required>
		</div>
	        
	        <div class="form-group">
		  <label for="nombre">Nro de Norma</label>
		  <input type="text" class="form-control" id="n_norma" name="n_norma"  maxlength="25" placeholder="00000" required>
		</div>
		
		<div class="form-group">
		  <label for="sel1">Tipo de Norma:</label>
		  <select class="form-control" id="t_norma" name="t_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Ley">Ley</option>
		    <option value="Decreto">Decreto</option>
		    <option value="Resolucion">Resolución</option>
		    <option value="Disposicion">Disposición</option>
		    <option value="Nota">Nota</option>
		    <option value="Memo">Memo</option>
		    <option value="Decision Administrativa">Decisión Administrativa</option>
		    <option value="Resolucion Conjunta">Resolución Conjunta</option>
		    <option value="Convenio Colectivo">Convenio Colectivo</option>
		  </select>
		</div> 
		
		<div class="form-group">
		  <label for="sel1">Ambito de la Norma:</label>
		  <select class="form-control" id="foro_norma" name="foro_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Comercial">Comercial</option>
		    <option value="Laboral">Laboral</option>
		    <option value="Civil">Civil</option>
		    <option value="Penal">Penal</option>
		    <option value="Salarial">Salarial</option>
		    <option value="Estructura">Estructura Organizativa</option>
		    <option value="Presupuesto">Presupuesto</option>
		    <option value="Carrera">Carrera</option>
		    </select>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Fecha Publicación:</label>
		  <input type="date" class="form-control" id="f_pub" name="f_pub" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Año:</label>
		  <input type="text" class="form-control" id="anio" name="anio" placeholder="AAAA" maxlength="4" required>
		</div>';
		
		  
        echo '<div class="form-group">
		  <label for="sel1">Organismos</label>
		  <select class="form-control" id="organismo" name="organismo" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM organismos order by descripcion ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores[cod_org].'">'.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		<div class="form-group">
		  <label for="sel1">Jurisdicción</label>
		  <select class="form-control" id="jurisdiccion" name="jurisdiccion" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM jurisdicciones order by descripcion ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
                while ($valores = mysqli_fetch_array($res)){
				echo '<option value="'.$valores[cod_jur].'">'.$valores[descripcion].'</option>';
			    }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		
		<div class="form-group">
		  <label for="nombre">Ubicación Física/Carpeta</label>
		  <input type="text" class="form-control" id="ub_fis" name="ub_fis" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Breve Descripción:</label>
		  <textarea class="form-control" id="observaciones" name="observaciones" maxlength="1000" placeholder="Ingrese una breve Descripción" required></textarea>
		</div><hr>
		
        <div class="form-group">
		  <label for="pwd">Seleccione Archivo a Subir:</label>
          <input type="file" name="file" id="file">
        </div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="add_normativa">
            <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> <br>
	      
	    </div>
	    </div>
	</div>';

}


/*
** Funcion editar norma
*/
function editNorma($id,$conn){
    
    $sql = "select * from normas where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Editar Normativa</h2><hr>
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Nombre de la Norma</label>
		  <input type="text" class="form-control" id="nombre" name="nombre_norma"  maxlength="140" value="'.$fila['nombre_norma'].'" required>
		</div>
	        
	        <div class="form-group">
		  <label for="nombre">Nro de Norma</label>
		  <input type="text" class="form-control" id="nombre" name="n_norma" value="'.$fila['n_norma'].'" maxlength="25" required>
		</div>
		
		<div class="form-group">
		  <label for="sel1">Tipo de Norma:</label>
		  <select class="form-control" name="t_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Ley" '.($fila['tipo_norma'] == "Ley" ? "selected" : ""). '>Ley</option>
		    <option value="Decreto" '.($fila['tipo_norma'] == "Decreto" ? "selected" : "").'>Decreto</option>
		    <option value="Resolucion" '.($fila['tipo_norma'] == "Resolucion" ? "selected" : "").'>Resolución</option>
		    <option value="Disposicion" '.($fila['tipo_norma'] == "Disposicion" ? "selected" : "").'>Disposición</option>
		    <option value="Nota" '.($fila['tipo_norma'] == "Nota" ? "selected" : "").'>Nota</option>
		    <option value="Memo" '.($fila['tipo_norma'] == "Memo" ? "selected" : "").'>Memo</option>
		    <option value="Decision Administrativa" '.($fila['tipo_norma'] == "Decision Administrativa" ? "selected" : "").'>Decisión Administrativa</option>
		    <option value="Resolucion Conjunta" '.($fila['tipo_norma'] == "Resolucion Conjunta" ? "selected" : "").'>Resolución Conjunta</option>
		    <option value="Convenio Colectivo" '.($fila['tipo_norma'] == "Convenio Colectivo" ? "selected" : "").'>Convenio Colectivo</option>
		  </select>
		</div> 
		
		<div class="form-group">
		  <label for="sel1">Ambito de la Norma:</label>
		  <select class="form-control" name="foro_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Comercial" '.($fila['f_norma'] == "Comercial" ? "selected" : ""). '>Comercial</option>
		    <option value="Laboral" '.($fila['f_norma'] == "Laboral" ? "selected" : ""). '>Laboral</option>
		    <option value="Civil" '.($fila['f_norma'] == "Civil" ? "selected" : ""). '>Civil</option>
		    <option value="Penal" '.($fila['f_norma'] == "Penal" ? "selected" : ""). '>Penal</option>
		    <option value="Salarial" '.($fila['f_norma'] == "Salarial" ? "selected" : ""). '>Salarial</option>
		    <option value="Estructura" '.($fila['f_norma'] == "Estructura" ? "selected" : ""). '>Estructura Organizativa</option>
		    <option value="Presupuesto" '.($fila['f_norma'] == "Presupuesto" ? "selected" : ""). '>Presupuesto</option>
		    <option value="Carrera" '.($fila['f_norma'] == "Carrera" ? "selected" : ""). '>Carrera</option>
		    </select>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Fecha Publicación:</label>
		  <input type="date" class="form-control" id="f_pub" name="f_pub" value="'.$fila['f_pub'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Año:</label>
		  <input type="text" class="form-control" id="anio" name="anio" value="'.$fila['anio_pub'].'" maxlength="4" required>
		</div>';
		
		echo '<div class="form-group">
		  <label for="sel1">Organismos</label>
		  <select class="form-control" name="organismo" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM organismos order by descripcion ASC";
		      mysqli_select_db($conn,'gesdoju');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cod_org].'" '.("'.$fila[organismo].'" == "'.$valores[cod_org].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
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
				echo '<option value="'.$valores[cod_jur].'" '.("'.$fila[jurisdiccion].'" == "'.$valores[cod_jur].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		
		<div class="form-group">
		  <label for="nombre">Ubicación Física/Carpeta</label>
		  <input type="text" class="form-control" name="ub_fis" value="'.$fila['unidad_fisica'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Breve Descripción:</label>
		  <textarea class="form-control" id="observaciones" name="observaciones" required>'.$fila['observaciones'].'</textarea>
		</div>
		
		<button type="submit" class="btn btn-success btn-block" name="editar_norma"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button><hr>
		<button type="submit" class="btn btn-danger btn-block" name="B"><img src="../../icons/actions/dialog-cancel.png"  class="img-reponsive img-rounded"> Cancelar</button>
	    </form><hr> 
	    
	    </div>
	    </div>
	</div>';

}

/*
** Funcion carga formulario de eliminacion de registro
*/
function formBorrarNorma($id,$conn){
    
    $sql = "select * from normas where id = '$id'";
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
		  <label for="nombre">Nro de Norma</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['n_norma'].'" readonly>
		</div><hr>
		
		
		<button type="submit" class="btn btn-success btn-block" name="delete_norma"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><hr>
		<button type="submit" class="btn btn-danger btn-block" name="B"><img src="../../icons/actions/dialog-cancel.png"  class="img-reponsive img-rounded"> Cancelar</button>
	      </form> 
	  
	    </div>
	</div>';

}



/*
** Función para agregar un registro a la base de datos en la tabla normas
*/ 

function addNorma($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$jurisdiccion,$organismo,$unidad_fisica,$obs,$conn){

		
	mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "INSERT INTO normas ".
		"(nombre_norma,n_norma,tipo_norma,f_norma,f_pub,anio_pub,jurisdiccion,organismo,unidad_fisica,observaciones)".
		"VALUES ".
      "('$nombre_norma','$n_norma','$tipo_norma','$foro_norma','$f_pub','$anio','$jurisdiccion','$organismo','$unidad_fisica','$obs')";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Norma Agregada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
	}else{
            echo '<div class="container">';
            echo '<div class="alert alert-warning" alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar la Norma. '  .mysqli_error($conn);
			echo "</div>";
			echo "</div>";
	}
}


/*
** Función para editar un registro de la tabla normas
*/

function updateNorma($id,$nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$jurisdiccion,$organismo,$unidad_fisica,$obs,$conn){

		
	mysqli_select_db($conn,'gesdoju');
	$sqlInsert = "update normas set 
                    nombre_norma = '$nombre_norma', 
                    n_norma = '$n_norma', 
                    tipo_norma = '$tipo_norma', 
                    f_norma = '$foro_norma', 
                    f_pub = '$f_pub', 
                    anio_pub = '$anio', 
                    jurisdiccion = '$jurisdiccion', 
                    organismo = '$organismo', 
                    unidad_fisica = '$unidad_fisica', 
                    observaciones = '$obs' 
                    where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		echo "<br>";
        echo '<div class="container">';
		echo '<div class="alert alert-success" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Norma Editada Satisfactoriamente.';
		echo "</div>";
		echo "</div>";
	}else{
		echo '<div class="container">';
        echo '<div class="alert alert-warning" alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Editar la Norma. '  .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}

/*
** Función para eliminar un registro de la tabla normas
*/

function delNorma($id,$conn){

		
	mysqli_select_db($conn,'gesdoju');
	$sql = "delete from normas where id = '$id'";
           
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



function normas($conn){

if($conn){
	
	$sql = "SELECT * FROM normas";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-info">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Normas
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Nombre Norma</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
            <th class='text-nowrap text-center'>Tipo Norma</th>
            <th class='text-nowrap text-center'>Ambito</th>
            <th class='text-nowrap text-center'>F. Publicación</th>
            <th class='text-nowrap text-center'>Año Publicación</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['nombre_norma']."</td>";
			 echo "<td align=center>".$fila['n_norma']."</td>";
			 echo "<td align=center>".$fila['tipo_norma']."</td>";
			 echo "<td align=center>".$fila['f_norma']."</td>";
			 echo "<td align=center>".$fila['f_pub']."</td>";
			 echo "<td align=center>".$fila['anio_pub']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <button type="submit" class="btn btn-info btn-sm" name="edit_norma" data-toggle="tooltip" data-placement="top" title="Editar Datos de la Norma">
                        <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <button type="submit" class="btn btn-danger btn-sm" name="del_norma" data-toggle="tooltip" data-placement="top" title="Eliminar Registro">
                        <img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_norma" data-toggle="tooltip" data-placement="top" title="Información Extendida de la Norma">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                                        
                </form>
                </td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="nueva_norma">
                    <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Normativa</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


function normativas($conn,$norma){

if($conn){
	
	$sql = "SELECT * FROM normas where tipo_norma = '$norma'";
    	mysqli_select_db($conn,'gesdoju');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Tipo de Norma: '.$norma.'
	      </div><br>';
	
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nombre Norma</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
            <th class='text-nowrap text-center'>Tipo Norma</th>
            <th class='text-nowrap text-center'>Ambito</th>
            <th class='text-nowrap text-center'>F. Publicación</th>
            <th class='text-nowrap text-center'>Año Publicación</th>
            <th class='text-nowrap text-center'>Organismo</th>
            <th class='text-nowrap text-center'>Jurisdicción</th>
            <th class='text-nowrap text-center'>Unidad Física</th>
            <th class='text-nowrap text-center'>Descripción</th>
            <th class='text-nowrap text-center'>Archivo</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre_norma']."</td>";
			 echo "<td align=center>".$fila['n_norma']."</td>";
			 echo "<td align=center>".$fila['tipo_norma']."</td>";
			 echo "<td align=center>".$fila['f_norma']."</td>";
			 echo "<td align=center>".$fila['f_pub']."</td>";
			 echo "<td align=center>".$fila['anio_pub']."</td>";
			 $mysql = "select * from organismos where cod_org = '$fila[organismo]'";
			 $res = mysqli_query($conn,$mysql);
			 while($row = mysqli_fetch_array($res)){
			 echo '<td align=center><a href="#" data-toggle="tooltip" data-placement="left" title="'.$row['descripcion'].'">'.$fila['organismo'].'</td>';
			 }
			 
			 $query = "select * from jurisdicciones where cod_jur = '$fila[jurisdiccion]'";
			 $resp = mysqli_query($conn,$query);
			 while($linea = mysqli_fetch_array($resp)){
             echo '<td align=center><a href="#" data-toggle="tooltip" data-placement="left" title="'.$linea['descripcion'].'">'.$fila['jurisdiccion'].'</td>';			 
			 }
			 echo "<td align=center>".$fila['unidad_fisica']."</td>";
			 echo "<td align=center>".$fila['observaciones']."</td>";
			 echo "<td align=center>".$fila['file_name']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    <input type="hidden" name="file_name" value="'.$fila['file_name'].'">
                    
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos de la Norma"><button type="submit" class="btn btn-success btn-sm" name="edit_norma"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro"><button type="submit" class="btn btn-danger btn-sm" name="del_norma"><img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Subir Archivo PDF de la Norma"><button type="submit" class="btn btn-warning btn-sm" name="upload_file"><img src="../../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Subir</button>';
                   if($fila['file_name'] != ''){
                   echo '<a href="../normas/download.php?file_name='.$fila['file_name'].'" data-toggle="tooltip" data-placement="left" title="Ver o Descargar Archivo '.$fila[file_name].'"><button type="button" class="btn btn-primary btn-sm"><img src="../../icons/actions/layer-visible-on.png"  class="img-reponsive img-rounded"> Ver</button>';
                   }else{
                   echo '<a href="../normas/download.php?file_name='.$fila['file_name'].'" data-toggle="tooltip" data-placement="left" title="No Existe Archivo cargado aún"><button type="button" class="btn btn-primary btn-sm disabled"><img src="../../icons/actions/layer-visible-off.png"  class="img-reponsive img-rounded"> Ver</button>';
                   }
             echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}





/*
* Funcion para cambiar avatar de usuario
*/
function selectFile($id){
    
    echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Archivo PDF';
	echo '</div><br>';
	                         
	echo '
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Seleccione el Archivo a Subir:</strong><hr>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="'.$id.'">
                
                <div class="form-group">
                <label for="tipo_archivo">Tipo Archivo:</label>
                <select class="form-control" id="tipo_archivo" name="tipo_archivo">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="1">Norma</option>
                    <option value="2">Acta Comisión</option>
                </select>
                </div><hr>
                
                <input type="file" name="file"><br>
                <button type="submit" name="upload"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
                </form>
            </div>
            </div>
            
	      </div>  
	    </div>
	  </div>
	  </div>';
}


/*
** Funcion para subir pdf
*/

function uploadPDF($id,$file,$tipo_archivo,$conn){

  // File upload path
$targetDir_1 = '../../uploads/';
$targetDir_2 = '../../actas_comision/';
$fileName = $file;
//$fileName = basename($_FILES["file"]["name"]);

if($tipo_archivo == 1){

$targetFilePath_1 = $targetDir_1 . $fileName;

$fileType = pathinfo($targetFilePath_1,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('pdf');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath_1)){
           
            
            // Insert image file name into database
           
           $sql = "update normas set file_path = '$targetFilePath_1', file_name = '$fileName' where id = '$id'";
           mysqli_select_db($conn,'gesdoju');
	    $insert = mysqli_query($conn,$sql);
         
            if($insert){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div><hr>";
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
            } 
            }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups. Hubo un error subiendo el Archivo. Verifique si posee permisos su usuario, o el directorio de destino tiene permisos de escritura</strong>';
                          echo "</div><hr>";
                }
                }else{
    
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups, solo archivos con extensión: PDF son soportados.</strong>';
			  echo "</div><hr>";
                }
                }else{
                          echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/system-reboot.png" /><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                }
                
}

if($tipo_archivo == 2){

    $targetFilePath_2 = $targetDir_2 . $fileName;

$fileType = pathinfo($targetFilePath_2,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('pdf','doc','docx','odt','txt');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath_2)){
           
            
            // Insert image file name into database
           
           $sql = "update representacion_paritarias set file_path = '$targetFilePath_2', file_name = '$fileName' where id = '$id'";
           mysqli_select_db($conn,'gesdoju');
	    $insert = mysqli_query($conn,$sql);
         
            if($insert){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div><hr>";
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
            } 
            }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups. Hubo un error subiendo el Archivo. Verifique si posee permisos su usuario, o el directorio de destino tiene permisos de escritura</strong>';
                          echo "</div><hr>";
                }
                }else{
    
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups, solo archivos con extensión: PDF, DOC, DOCX, ODT, TXT son soportados.</strong>';
			  echo "</div><hr>";
                }
                }else{
                          echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/system-reboot.png" /><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                }
    





}

}


/*
** insertar nueva norma en base de datos
*/
function insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$organismo,$jurisdiccion,$unidad_fisica,$obs,$file,$conn){

 
$targetDir = '../../uploads/';
$fileName = $file;
//$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('pdf');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
         
        
        $sql = "INSERT INTO normas ".
                "(nombre_norma,
                  n_norma,
                  tipo_norma,
                  f_norma,
                  f_pub,
                  anio_pub,
                  jurisdiccion,
                  organismo,
                  unidad_fisica,
                  observaciones,
                  file_name,
                  file_path)".
                "VALUES ".
                "('$nombre_norma',
                  '$n_norma',
                  '$tipo_norma',
                  '$foro_norma',
                  '$f_pub',
                  '$anio',
                  '$jurisdiccion',
                  '$organismo',
                  '$unidad_fisica',
                  '$obs',
                  '$fileName',
                  '$targetFilePath')";
        
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);

         
            if($query){
            
			  echo '<div class="alert alert-success" role="alert">
                    <h1 class="panel-title text-left" contenteditable="true">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> Norma Guardada Exitosamente. El Archivo '.$fileName. ' se ha subido correctamente..</strong></h1><hr>
                    
                    <form action="main.php" method="POST">
                        <button type="submit" class="btn btn-success btn-sm" name="nueva_norma">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Continuar Cargando</button>
                    </form>
                    <div><hr>';
              
              
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
            echo "</div><hr>";
            
            } 
            }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups. Hubo un error subiendo el Archivo. Verifique si posee permisos su usuario, o el directorio de destino tiene permisos de escritura</strong>';
              echo "</div><hr>";
              
            }
            }else{
    
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups, solo archivos con extensión: PDF son soportados.</strong>';
			  echo "</div><hr>";
            }
            }else{
                          echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/system-reboot.png" /><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
            }

}


function quitarTildes($cadena){

    $notAllow = array ("á", // 1
                       "é", // 2
                       "í", // 3
                       "ó", // 4
                       "ú", // 5
                       "Á", // 6
                       "É", // 7
                       "Í", // 8
                       "Ó", // 9
                       "Ú", // 10
                       "ñ", // 11
                       "À", // 12
                       "Ã", // 13
                       "Ì", // 14
                       "Ò", // 15
                       "Ù", // 16
                       "Ã™", // 17
                       "Ã ", // 18
                       "Ã¨", // 19
                       "Ã¬", // 20
                       "Ã²", // 21
                       "Ã¹", // 22
                       "A³", // 23
                       "ç", // 24
                       "Ç", // 25
                       "Ã¢", // 26
                       "ê", // 27
                       "Ã®", // 28
                       "Ã´", // 29
                       "Ã»", // 30
                       "Ã‚", // 31
                       "ÃŠ", // 32
                       "ÃŽ", // 33
                       "Ã”", // 34
                       "Ã›", // 35
                       "ü", // 36
                       "Ã¶", // 37
                       "Ã–", // 38
                       "Ã¯", // 39
                       "Ã¤", // 40
                       "«", // 41
                       "Ò", // 42
                       "Ã", // 43
                       "Ã„", // 44
                       "Ã‹", // 45
                       "A©", // 46
                       "Â°", // 47
                       "A¡", // 48
                       "Aš"); // 49
    
    $allow = array ("a", // 1
                    "e", // 2
                    "i", // 3
                    "o", // 4
                    "u", // 5
                    "A", // 6
                    "E", // 7
                    "I", // 8
                    "O", // 9
                    "U", // 10
                    "n", // 11
                    "N", // 12
                    "A", // 13
                    "E", // 14
                    "I", // 15
                    "O", // 16
                    "U", // 17
                    "a", // 18
                    "e", // 19
                    "i", // 20
                    "o", // 21
                    "u", // 22
                    "o", // 23
                    "c", // 24
                    "C", // 25
                    "a", // 26
                    "e", // 27
                    "i", // 28
                    "o", // 29
                    "u", // 30
                    "A", // 31
                    "E", // 32
                    "I", // 33
                    "O", // 34
                    "U", // 35
                    "u", // 36
                    "o", // 37
                    "O", // 38
                    "i", // 39
                    "a", // 40
                    "e", // 41
                    "U", // 42
                    "I", // 43
                    "A", // 44
                    "E", // 45
                    "e", // 46
                    "º", // 47
                    "a", // 48
                    "U"); // 49
    
    $texto = str_replace($notAllow, $allow ,$cadena);
    
    return $texto;
}


// INFORMACION EXTENDIDA
function infoNorma($id,$conn){
    
    $sql = "select * from normas where id = '$id'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($query)){
        $nombre_norma = $row['nombre_norma'];
        $n_norma = $row['n_norma'];
        $tipo_norma = $row['tipo_norma'];
        $foro_norma = $row['f_norma'];
        $f_pub = $row['f_pub'];
        $anio = $row['anio_pub'];
        $organismo = $row['organismo'];
        $jurisdiccion = $row['jurisdiccion'];
        $unidad_fisica = $row['unidad_fisica'];
        $obs = $row['observaciones'];
        $archivo = $row['file_name'];
    }
    
    $sql_1 = "select descripcion from organismos where cod_org = '$organismo'";
    $query_1 = mysqli_query($conn,$sql_1);
    while($row_1 = mysqli_fetch_array($query_1)){
        $org_descripcion = $row_1['descripcion'];
    }
    
    $sql_2 = "select descripcion from jurisdicciones where cod_jur = '$jurisdiccion'";
    $query_2 = mysqli_query($conn,$sql_2);
    while($row_2 = mysqli_fetch_array($query_2)){
        $jur_descripcion = $row_2['descripcion'];
    }
        
    
    echo '<div class="container">
             <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/arrow-down-double.png" /> Información Extendida</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group">
                    <li class="list-group-item"><strong>Nombre de la Norma:</strong> '.$nombre_norma.'</li>
                    <li class="list-group-item"><strong>Número de la Norma:</strong> '.$n_norma.'</li>
                    <li class="list-group-item"><strong>Tipo de Norma:</strong> '.$tipo_norma.'</li>
                    <li class="list-group-item"><strong>Ambito de  la Norma:</strong> '.$foro_norma.'</li>
                    <li class="list-group-item"><strong>Fecha Publicación:</strong> '.$f_pub.'</li>
                    <li class="list-group-item"><strong>Año Publicación:</strong> '.$anio.'</li>
                    <li class="list-group-item"><strong>Organismo:</strong> '.$org_descripcion.'</li>
                    <li class="list-group-item"><strong>Jurisdicción:</strong> '.$jur_descripcion.'</li>
                    <li class="list-group-item"><strong>Ubicación / Bibliorato:</strong> '.$unidad_fisica.'</li>
                    <li class="list-group-item"><strong>Onservaciones:</strong> '.$obs.'</li>
                    </ul>
                    <div class="panel-footer">
                        
                        <form action="main.php" method="POST">
                                <button type="submit" class="btn btn-default btn-sm btn-block" name="B">
                                <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Volver a Normas</button>
                        </form><br>
                        
                        <a href="../lib/informes/print.php?file=print_informe_norma.php&id='.$id.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>';
                        
                        if($archivo == ''){
                        
                        echo '<form action="main.php" method="POST">
                              
                              <input type="hidden" name="id" value="'.$id.'">
                              
                                <button type="submit" class="btn btn-warning btn-sm btn-block" name="upload_file" data-toggle="tooltip" data-placement="left" title="Subir Archivo PDF de la Norma">
                                <img src="../../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Subir</button>
                        
                              </form>';
                        
                        }else{
                            echo '<a href="../normas/download.php?file_name='.$archivo.'&tipo_archivo=1" data-toggle="tooltip" data-placement="left" title="Ver o Descargar Archivo '.$archivo.'">
                                    <button type="button" class="btn btn-default btn-sm btn-block">
                                        <img src="../../icons/actions/layer-visible-on.png"  class="img-reponsive img-rounded"> Ver</button>';
                        }
                     
                    '</div>
                </div>
                </div>
            </div>
            </div>';
}


/*
** FUNCION DE BUSQUEDA AVANZADA
*/
function formAdvanceSearch(){
    
    echo '<div class="container">
            <div class="panel panel-default">
            <div class="panel-heading">
                <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</div>
            <div class="panel-body">
            
            <div class="row">
             <div class="alert alert-info">
                <p><img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> 
                    <strong>Importante:</strong> Desde el botón <strong>Habilitar</strong> habilite el campo por el cual desea realizar la búsqueda. Puede habilitar ambos o solo uno.</p>
             </div>
            </div>
            
            <form action="#" method="POST">
                <div class="form-group">
                
                <label for="palabra_clave">Palabra Clave:</label>
                <input type="text" class="form-control" id="palabra_clave" placeholder="Ingrese alguna/s palabra/s que puedan estar contenidas en el campo Observaciones" name="palabra_clave" disabled><br>
                <button type="button" class="btn btn-warning" onclick=callEnable("palabra_clave")>
                    <img src="../../icons/status/object-unlocked.png"  class="img-reponsive img-rounded"> Habilitar</button>
                </div><hr>
                
                <div class="form-group">
                <label for="fecha">Fecha Publicación Desde:</label>
                <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" disabled><br>
                <button type="button" class="btn btn-warning" onclick=callEnable("fecha_desde")>
                    <img src="../../icons/status/object-unlocked.png"  class="img-reponsive img-rounded"> Habilitar</button>
                </div><hr>
                
                <div class="form-group">
                <label for="fecha">Fecha Publicación Hasta:</label>
                <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" disabled><br>
                <button type="button" class="btn btn-warning" onclick=callEnable("fecha_hasta")>
                    <img src="../../icons/status/object-unlocked.png"  class="img-reponsive img-rounded"> Habilitar</button>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" name="search">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Buscar</button>
            </form>
            
            </div>

            </div>
            </div>';
}


/*
** RESULTADO DE BUSQUEDA AVANZADA
*/
function searchAdvanceResults($palabra_clave,$fecha_desde,$fecha_hasta,$conn){

    if(($palabra_clave != '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql = "SELECT * FROM normas WHERE MATCH(observaciones) AGAINST('+$palabra_clave' IN BOOLEAN MODE) and f_pub between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-info">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Nombre Norma</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
            <th class='text-nowrap text-center'>Tipo Norma</th>
            <th class='text-nowrap text-center'>Ambito</th>
            <th class='text-nowrap text-center'>F. Publicación</th>
            <th class='text-nowrap text-center'>Año Publicación</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($query)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['nombre_norma']."</td>";
			 echo "<td align=center>".$fila['n_norma']."</td>";
			 echo "<td align=center>".$fila['tipo_norma']."</td>";
			 echo "<td align=center>".$fila['f_norma']."</td>";
			 echo "<td align=center>".$fila['f_pub']."</td>";
			 echo "<td align=center>".$fila['anio_pub']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&palabra_clave='.$palabra_clave.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
    
    }
    
    if(($palabra_clave != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM normas WHERE MATCH(observaciones) AGAINST ('+$palabra_clave' IN BOOLEAN MODE)";
        mysqli_select_db($conn,'gesdoju');
        $query_1 = mysqli_query($conn,$sql_1);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-info">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Nombre Norma</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
            <th class='text-nowrap text-center'>Tipo Norma</th>
            <th class='text-nowrap text-center'>Ambito</th>
            <th class='text-nowrap text-center'>F. Publicación</th>
            <th class='text-nowrap text-center'>Año Publicación</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila_1 = mysqli_fetch_array($query_1)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila_1['nombre_norma']."</td>";
			 echo "<td align=center>".$fila_1['n_norma']."</td>";
			 echo "<td align=center>".$fila_1['tipo_norma']."</td>";
			 echo "<td align=center>".$fila_1['f_norma']."</td>";
			 echo "<td align=center>".$fila_1['f_pub']."</td>";
			 echo "<td align=center>".$fila_1['anio_pub']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&palabra_clave='.$palabra_clave.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
    
    }
    
    if(($palabra_clave == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM normas WHERE f_pub between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,'gesdoju');
        $query_2 = mysqli_query($conn,$sql_2);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-info">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Nombre Norma</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
            <th class='text-nowrap text-center'>Tipo Norma</th>
            <th class='text-nowrap text-center'>Ambito</th>
            <th class='text-nowrap text-center'>F. Publicación</th>
            <th class='text-nowrap text-center'>Año Publicación</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila_2 = mysqli_fetch_array($query_2)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila_2['nombre_norma']."</td>";
			 echo "<td align=center>".$fila_2['n_norma']."</td>";
			 echo "<td align=center>".$fila_2['tipo_norma']."</td>";
			 echo "<td align=center>".$fila_2['f_norma']."</td>";
			 echo "<td align=center>".$fila_2['f_pub']."</td>";
			 echo "<td align=center>".$fila_2['anio_pub']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&palabra_clave='.$palabra_clave.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		
		}

}





?>
