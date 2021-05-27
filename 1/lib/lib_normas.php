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
		  <input type="text" class="form-control" id="nombre" name="nombre_norma"  maxlength="140" placeholder="Ingrese el Nombre de la Norma" required>
		</div>
	        
	        <div class="form-group">
		  <label for="nombre">Nro de Norma</label>
		  <input type="text" class="form-control" id="nombre" name="n_norma"  maxlength="25" placeholder="00000" required>
		</div>
		
		<div class="form-group">
		  <label for="sel1">Tipo de Norma:</label>
		  <select class="form-control" name="t_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Ley">Ley</option>
		    <option value="Decreto">Decreto</option>
		    <option value="Resolución">Resolución</option>
		    <option value="Disposición">Disposición</option>
		    <option value="Nota">Nota</option>
		    <option value="Memo">Memo</option>
		    <option value="Dec. Admin.">Decisión Administrativa</option>
		    <option value="Res. Conjunta">Resolución Conjunta</option>
		  </select>
		</div> 
		
		<div class="form-group">
		  <label for="sel1">Ambito de la Norma:</label>
		  <select class="form-control" name="foro_norma">
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
		  <select class="form-control" name="organismo" required>
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
		  <select class="form-control" name="jurisdiccion" required>
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

			mysqli_close($conn);
		  
		 echo '</select>
		</div>
		
		<div class="form-group">
		  <label for="nombre">Ubicación Física/Carpeta</label>
		  <input type="text" class="form-control" name="ub_fis" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Breve Descripción:</label>
		  <textarea class="form-control" id="observaciones" name="observaciones" maxlength="500" placeholder="Ingrese una breve Descripción, recuerde que sólo se permiten 500 caracteres" required></textarea>
		</div><hr>
		
        <div class="form-group">
		  <label for="pwd">Seleccione Archivo a Subir:</label>
          <input type="file" name="file" required>
        </div><hr>
		
		<button type="submit"  class="btn btn-success btn-block" name="add_normativa"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
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
		    <option value="Resolución" '.($fila['tipo_norma'] == "Resolución" ? "selected" : "").'>Resolución</option>
		    <option value="Disposición" '.($fila['tipo_norma'] == "Disposición" ? "selected" : "").'>Disposición</option>
		    <option value="Nota" '.($fila['tipo_norma'] == "Nota" ? "selected" : "").'>Nota</option>
		    <option value="Memo" '.($fila['tipo_norma'] == "Memo" ? "selected" : "").'>Memo</option>
		    <option value="Dec. Admin." '.($fila['tipo_norma'] == "Dec. Admin." ? "selected" : "").'>Decisión Administrativa</option>
		    <option value="Res. Conjunta" '.($fila['tipo_norma'] == "Dec. Admin." ? "selected" : "").'>Resolución Conjunta</option>
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
		  <textarea class="form-control" id="observaciones" name="observaciones" maxlength="240" required>'.$fila['observaciones'].'</textarea>
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
	$sqlInsert = "update normas set nombre_norma = '$nombre_norma', n_norma = '$n_norma', tipo_norma = '$tipo_norma', f_norma = '$foro_norma', f_pub = '$f_pub', anio_pub = '$anio', jurisdiccion = '$jurisdiccion', organismo = '$organismo', unidad_fisica = '$unidad_fisica', observaciones = '$obs' where id = '$id'";
           
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
	      <div class="alert alert-success">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Normas
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
			 echo '<td align=center><a href="#" data-toggle="tooltip" data-placement="left" title="'.$fila['observaciones'].'">Pase el mouse sobre el link</td>';
			 echo "<td align=center>".$fila['file_name']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos de la Norma"><button type="submit" class="btn btn-success btn-sm" name="edit_norma"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro"><button type="submit" class="btn btn-danger btn-sm" name="del_norma"><img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Subir Archivo PDF de la Norma"><button type="submit" class="btn btn-warning btn-sm" name="upload_file"><img src="../../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Subir</button>';
                    if($fila['file_name'] != ''){
                   echo '<a href="../normas/download.php?file_name='.$fila['file_name'].'" data-toggle="tooltip" data-placement="left" title="Ver o Descargar Archivo '.$fila[file_name].'"><button type="button" class="btn btn-primary btn-sm"><img src="../../icons/actions/layer-visible-on.png"  class="img-reponsive img-rounded"> Leer Norma</button>';
                   }else{
                   echo '<a href="../normas/download.php?file_name='.$fila['file_name'].'" data-toggle="tooltip" data-placement="left" title="No Existe Archivo cargado aún"><button type="button" class="btn btn-primary btn-sm disabled"><img src="../../icons/actions/layer-visible-off.png"  class="img-reponsive img-rounded"> Leer Norma</button>';
                   }
             echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="nueva_norma"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Normativa</button>
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
                <strong>Seleccione el Archivo a Subir:</strong><br>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="'.$id.'">
                
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

function uploadPDF($id,$file,$conn){

  // File upload path
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
           
            
            // Insert image file name into database
           
           $sql = "update normas set file_path = '$targetFilePath', file_name = '$fileName' where id = '$id'";
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
		"(nombre_norma,n_norma,tipo_norma,f_norma,f_pub,anio_pub,jurisdiccion,organismo,unidad_fisica,observaciones,file_name,file_path)".
		"VALUES ".
      "('$nombre_norma','$n_norma','$tipo_norma','$foro_norma','$f_pub','$anio','$jurisdiccion','$organismo','$unidad_fisica','$obs','$fileName','$targetFilePath')";
        
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);

         
            if($query){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> Norma Guardada Exitosamente. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
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


?>
