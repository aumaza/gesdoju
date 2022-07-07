<?php 


/*
** Funcion alta de norma
*/
function newNorma($conn){
        
      echo '<div class="container-fluid">
            <div class="jumbotron">
            <div class="row">
            <div class="col-sm-12">
            <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cargar Normativa</h2><hr>
            
           
                <h4>Verificar si Existe Norma a Cargar</h4>
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#verificarNormaModal">Verificar</button><hr>
                
                <div class="col-sm-12">
                    <div class="alert alert-info">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded">
                        <strong>Los campos con asteriscos son obligatorios</strong>
                    </div>
                </div>
                
	        <form id="fr_nueva_norma_ajax" method="POST" enctype="multipart/form-data">
	        
	        <div class="col-sm-3">
	        
                <div class="form-group">
                    <label for="nombre">Nombre de la Norma (*)</label>
                    <input type="text" class="form-control" id="nombre_norma" name="nombre_norma"  maxlength="140" placeholder="Ingrese el Nombre de la Norma" oninput="Text(this.value);"  required>
                </div>
	        
                <div class="form-group">
                    <label for="nombre">Nro de Norma (*)</label>
                    <input type="text" class="form-control" id="n_norma" name="n_norma"  maxlength="25" placeholder="00000" value="" oninput="NumerosNorma(this.value);" required>
                </div>
		
            </div>';
		
		
		
		echo '<div class="col-sm-3">
            
                <div class="form-group">
                <label for="t_norma">Tipo de Norma (*)</label>
                <select class="form-control" id="t_norma" name="t_norma" required>
                <option value="" disabled selected>Seleccionar</option>';
                    
                    if($conn){
                    $query = "SELECT * FROM tipo_norma order by id ASC";
                    mysqli_select_db($conn,'gesdoju');
                    $res = mysqli_query($conn,$query);

                    if($res){
                        while ($valores = mysqli_fetch_array($res)){
                        echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                        }
                        }
                    }

                    //mysqli_close($conn);
                
                echo '</select>
                      </div>
		
                        <div class="form-group">
                        <label for="a_norma">Ambito de la Norma (*)</label>
                        <select class="form-control" id="foro_norma" name="foro_norma" required>
                        <option value="" disabled selected>Seleccionar</option>';
                            
                            if($conn){
                            $query = "SELECT * FROM ambito_norma order by id ASC";
                            mysqli_select_db($conn,'gesdoju');
                            $res = mysqli_query($conn,$query);

                            if($res){
                                while ($valores = mysqli_fetch_array($res)){
                                echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                                }
                                }
                            }

                            //mysqli_close($conn);
                        
                        echo '</select>
                        </div>
                    </div>
		
		<div class="col-sm-3">
		
            <div class="form-group">
            <label for="pwd">Fecha Publicación (*)</label>
            <input type="date" class="form-control" id="f_pub" name="f_pub" required>
            </div>
		
            <div class="form-group">
            <label for="pwd">Año (*)</label>
            <input type="text" class="form-control" id="anio" name="anio" placeholder="AAAA" maxlength="4" oninput="NumerosAnio(this.value);" required>
            </div>
		</div>';
		
		  
        echo '<div class="col-sm-3">
                <div class="form-group">
                <label for="sel1">Organismos (*)</label>
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
                <label for="sel1">Jurisdicción (*)</label>
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
            </div>
		
		<div class="col-sm-12">
		    
            <div class="form-group">
            <label for="pwd">Breve Descripción (*)</label>
            <textarea class="form-control" id="observaciones" name="observaciones" maxlength="1000" placeholder="Ingrese una breve Descripción"  required></textarea>
            </div>
        </div>
		
		<div class="col-sm-12">
            <p align="center"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> <strong>Archivos a Subir</strong></p>
            <div class="alert alert-success">
            <div class="form-group">
            <label for="pwd">Seleccione Archivo a Subir de la Norma Principal (*)</label>
            <input type="file" name="file" id="file">

            </div></div>
            
            <div class="alert alert-success">
            <div class="form-group">
            <label for="pwd">Seleccione Archivo a Subir de las Normas Vinculadas (*)</label>
            <input type="file" name="files[]" id="files" multiple="" >
            </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="alert alert-info">
            <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded">
                <strong>Antes de presionar el botón Guardar, verifique que los datos son los correctos.</strong>
            </div>
        </div>

		<div class="col-sm-12">
            <button type="submit" class="btn btn-default btn-block" id="add_normativa" >
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
        </div>
	      </form><hr>
	      
	    </div>
	    </div>
	
	
	<div id="messageNewNorma"></div>
	
	
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

      echo '<div class="container-fluid">
	     <div class="jumbotron">
            <div class="row">
            <div class="col-sm-12">
	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Normativa</h2><hr>
                
                <div class="col-sm-12">
                    <div class="alert alert-info">
                    <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded">
                        <strong>Los campos con asteriscos son obligatorios</strong>
                    </div>
                </div>
	      
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	         <div class="col-sm-3">
                
                <div class="form-group">
                <label for="nombre">Nombre de la Norma (*)</label>
                <input type="text" class="form-control" id="nombre" name="nombre_norma"  maxlength="140" value="'.$fila['nombre_norma'].'" oninput="Text(this.value);" required readonly>
                </div>
	        
                <div class="form-group">
                <label for="nombre">Nro de Norma (*)</label>
                <input type="text" class="form-control" id="nombre" name="n_norma" value="'.$fila['n_norma'].'" maxlength="25" oninput="Numeros(this.value);" required readonly>
                </div>
		
            </div>
		
		<div class="col-sm-3">
		
            <div class="form-group">
            <label for="t_norma">Tipo de Norma (*)</label>
            <select class="form-control" id="t_norma" name="t_norma" required>
            <option value="" disabled selected>Seleccionar</option>';
                
                if($conn){
                $query = "SELECT * FROM tipo_norma order by id ASC";
                mysqli_select_db($conn,'gesdoju');
                $res = mysqli_query($conn,$query);

                if($res){
                    while ($valores = mysqli_fetch_array($res)){
                    echo '<option value="'.$valores[descripcion].'" '.("'.$fila[tipo_norma].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
                    }
                    }
                }

                //mysqli_close($conn);
            
            echo '</select>
                </div>
		
                <div class="form-group">
                <label for="a_norma">Ambito de la Norma (*)</label>
                <select class="form-control" id="foro_norma" name="foro_norma" required>
                <option value="" disabled selected>Seleccionar</option>';
                    
                    if($conn){
                    $query = "SELECT * FROM ambito_norma order by id ASC";
                    mysqli_select_db($conn,'gesdoju');
                    $res = mysqli_query($conn,$query);

                    if($res){
                        while ($valores = mysqli_fetch_array($res)){
                        echo '<option value="'.$valores[descripcion].'" '.("'.$fila[f_norma].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
                        }
                        }
                    }

                    //mysqli_close($conn);
                
                echo '</select>
                </div>
        </div>
		
		
		<div class="col-sm-3">
            
            <div class="form-group">
            <label for="pwd">Fecha Publicación (*)</label>
            <input type="date" class="form-control" id="f_pub" name="f_pub" value="'.$fila['f_pub'].'" required>
            </div>
            
            <div class="form-group">
            <label for="pwd">Año (*)</label>
            <input type="text" class="form-control" id="anio" name="anio" value="'.$fila['anio_pub'].'" maxlength="4" oninput="Numeros(this.value);" required>
            </div>
		</div>';
		
		echo '<div class="col-sm-3">
            
                <div class="form-group">
                <label for="sel1">Organismos (*)</label>
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
                <label for="sel1">Jurisdicción (*)</label>
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
            </div>
		
		<div class="col-sm-12">
		
            <div class="form-group">
            <label for="nombre">Ubicación Física/Carpeta (*)</label>
            <input type="text" class="form-control" name="ub_fis" value="'.$fila['unidad_fisica'].'" oninput="alfaNum(this.value);" required>
            </div>
            
            <div class="form-group">
            <label for="pwd">Breve Descripción (*)</label>
            <textarea class="form-control" id="observaciones" name="observaciones" oninput="alfaNum(this.value);" required>'.$fila['observaciones'].'</textarea>
            </div>
		
		</div>
		
		<div class="col-sm-12">
            <div class="alert alert-info">
            <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded">
                <strong>Antes de presionar el botón Guardar, verifique que los datos son los correctos.</strong>
            </div>
        </div>
		
		<div class="col-sm-12"><hr>
		
            <button type="submit" class="btn btn-default btn-block" name="editar_norma">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button><hr>
            <button type="submit" class="btn btn-danger btn-block" name="B">
                <img src="../../icons/actions/dialog-cancel.png"  class="img-reponsive img-rounded"> Cancelar</button>
		
		</div>
	    </form><hr> 
	    
	    </div>
	    </div>
	</div></div>';

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
	    <div class="jumbotron">
        <div class="row">
	    <div class="col-sm-12">
	      <h2><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar Norma</h2><hr>
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

/*
** LISTAR TODAS LAS NORMAS (FUNCION ACTUAL)
*/

function normas($conn,$dbase){

if($conn){
	
	$sql = "SELECT * FROM normas";
    mysqli_select_db($conn,$dbase);
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Normas [ Listado de Normas ]</h2><hr>
	     
	      
	      <form <action="main.php" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="nueva_norma" data-toggle="tooltip" data-placement="top" title="Agregar una Nueva Norma">
                    <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Normativa</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada" data-toggle="tooltip" data-placement="top" title="Búsqueda Avanzada de Registros">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
        </form><hr>';
        
        infoCarrouselNormas($conn,$dbase);
        
      echo "<table class='display compact' style='width:100%' id='normasTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Nombre Norma</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
            <th class='text-nowrap text-center'>Tipo Norma</th>
            <th class='text-nowrap text-center'>Ambito</th>
            <th class='text-nowrap text-center'>F. Publicación</th>
            <th class='text-nowrap text-center'>Año Publicación</th>
            <th class='text-nowrap text-center'>Acciones</th>
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
                                     
                    <button type="submit" class="btn btn-default btn-sm" name="edit_norma" data-toggle="tooltip" data-placement="left" title="Editar Datos de la Norma">
                        <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="del_norma" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_norma" data-toggle="tooltip" data-placement="left" title="Información Extendida de la Norma">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                                        
                </form>
                </td>';
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
* Funcion para cambiar avatar de usuario
*/
function selectFile($id){
    
    echo '<div class="container" >
	      <div class="jumbotron">
	      <h3><img src="../../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Archivo PDF</h3><hr>
	                         
                <strong>Seleccione el Archivo a Subir:</strong><hr>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="'.$id.'">
                
                <div class="form-group">
                <label for="tipo_archivo">Tipo Archivo:</label>
                <select class="form-control" id="tipo_archivo" name="tipo_archivo" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="1">Norma</option>
                    <option value="2">Acta Comisión</option>
                </select>
                </div><hr>
                
                <input type="file" name="file"><br>
                <button type="submit" name="upload" class="btn btn-default btn-block"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
                </form><hr>
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

function insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$organismo,$jurisdiccion,$obs,$file,$conn,$dbase){
    

    mysqli_select_db($conn,$dbase);
    $sql_1 = "select * from normas where n_norma = '$n_norma' and tipo_norma = '$tipo_norma' and organismo = '$organismo' and anio_pub = '$anio'";
    $query_1 = mysqli_query($conn,$sql_1);    
    $rows = mysqli_num_rows($query_1);

   $sql_2 = "select ubicacion_fisica from organismos where cod_org = '$organismo'";
   $query_2 = mysqli_query($conn,$sql_2);
   while($row_2 = mysqli_fetch_array($query_2)){
        $ubicacion_fisica = $row_2['ubicacion_fisica'];
   }
   
   if($ubicacion_fisica == ''){
        $ubicacion_fisica = 'N/D';
   }

if($rows == 0){


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
                  '$ubicacion_fisica',
                  '$obs',
                  '$fileName',
                  '$targetFilePath')";
        
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);

         
            if($query){
            

			    return 1; // sea actualizo la base  y subio bien el archivo
        
                       
            }else{
		  
			   return 2; // solo se subio el archivo
            
            }
            }else{
			              
              return 3; // verificar permisos del directorio
              
            }
            }else{
    
			  return 4; // solo archivos pdf
            }
            }else{
                return 5; // no ha seleccionado archivos
            }
         
}

else if($rows == 1){
   return 6; // la norma ya se encuentra ingresada
}
} // FIN DE LA FUNCION


/*
** FUNCION PARA GURDAR NORMAS VINCULADAS
*/
function normasViculadas($norma,$n_norma,$tipo_norma,$files,$conn,$dbase){

    $sql_1 = "select id from normas where n_norma = '$n_norma' and tipo_norma = '$tipo_norma'";
    mysqli_select_db($conn,$dbase);
    $query_1 = mysqli_query($conn,$sql_1);
    while($row = mysqli_fetch_array($query_1)){
        $id = $row['id'];
    }
    
    $id = intVal($id);
    
    $carpeta = '../../documentos/'.$norma; 
			
        if(!file_exists($carpeta)){
            
            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");
            chmod($carpeta,0777);
		
    
    
        foreach($_FILES["files"]['tmp_name'] as $key => $tmp_name){
		//condicional si el fichero existe
		
            if($_FILES["files"]["name"][$key]){
                
                // Nombres de archivos temporales
                $archivonombre = $_FILES["files"]["name"][$key]; 
                $fuente = $_FILES["files"]["tmp_name"][$key]; 
                
                            
                $dir = opendir($carpeta);
                $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
                
        
                move_uploaded_file($fuente, $target_path);
                    
                    
                closedir($dir); //Cerramos la conexion con la carpeta destino
            }
        }
	
	$sql = "INSERT INTO normas_vinculadas ".
            "(id_norma_principal,
              path_name)".
            "VALUES ".
            "('$id',
              '$carpeta')";
        
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        if($query){
        
            echo 1; // normas insertadas correctamente
            
        }else{
           echo -1; // hubo un problema al intentar actualizar la base de datos de normas vinculadas
        }
    
    }
} // FIN DE FUNCION


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
    
    $sql_3 = "select * from normas_vinculadas where id_norma_principal = '$id'";
    $query_3 = mysqli_query($conn,$sql_3);
    $rows = mysqli_num_rows($query_3);
    
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
            <div class="jumbotron">
             <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/arrow-down-double.png" /> Información Extendida</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
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
                    <li class="list-group-item"><strong>Observaciones:</strong> '.$obs.'</li>
                    </ul>
                    <div class="panel-footer">
                        
                        <form action="main.php" method="POST">
                            <input type="hidden" name="id" value="'.$id.'" >
                            
                                <button type="submit" class="btn btn-default btn-sm btn-block" name="B">
                                <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Volver a Normas</button>
                                
                                <button type="submit" class="btn btn-default btn-sm btn-block" name="add_normas_vinculadas">
                                <img src="../../icons/actions/document-new.png"  class="img-reponsive img-rounded"> Agredar Normas Vinculadas</button>
                                
                        </form>';
                                
                              if($rows == 1){
                                                             
                               echo '<form action="#" method="POST">
                                        <input type="hidden" name="id" value="'.$id.'" >
                                        
                                        <button type="submit" class="btn btn-default btn-sm btn-block" name="ver_normas_vinculadas">
                                        <img src="../../icons/emblems/image-stack.png"  class="img-reponsive img-rounded"> Ver Normas Vinculadas</button>
                                    
                                    </form>';
                              
                              }  
                                
                        
                        
                        echo '<a href="../lib/informes/print.php?file=print_informe_norma.php&id='.$id.'" target="_blank">
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
            </div>
            </div>';
}


/*
** FUNCION DE BUSQUEDA AVANZADA
*/
function formAdvanceSearch(){
    
    echo '<div class="container">
            <div class="jumbotron">
            <h3><img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</h3><hr>
            
            
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
                <label for="anio_pub">Año Publicación:</label>
                <input type="text" class="form-control" id="anio_pub" placeholder="AAAA" name="anio_pub" maxlength="4" disabled><br>
                <button type="button" class="btn btn-warning" onclick=callEnable("anio_pub")>
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
function searchAdvanceResults($palabra_clave,$anio_pub,$fecha_desde,$fecha_hasta,$conn){

    if(($palabra_clave != '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql = "SELECT * FROM normas WHERE MATCH(nombre_norma,f_norma,observaciones) AGAINST('+$palabra_clave' IN BOOLEAN MODE) and f_pub between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h3><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h3><hr>';
                  
      echo "<table class='display compact' style='width:100%' id='normasAdvanceSearchTable'>";
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
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_norma" data-toggle="tooltip" data-placement="top" title="Información Extendida de la Norma">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                                        
                </form>
                </td>';
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&palabra_clave='.$palabra_clave.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div></div>';
    
    }
    
    if(($palabra_clave != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM normas WHERE MATCH(nombre_norma,f_norma,observaciones) AGAINST ('+$palabra_clave' IN BOOLEAN MODE)";
        mysqli_select_db($conn,'gesdoju');
        $query_1 = mysqli_query($conn,$sql_1);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h3><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h3><hr>';
                  
      echo "<table class='display compact' style='width:100%' id='normasAdvanceSearchTable'>";
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
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila_1['id'].'">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_norma" data-toggle="tooltip" data-placement="top" title="Información Extendida de la Norma">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                                        
                </form>
                </td>';
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&palabra_clave='.$palabra_clave.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div>';
    
    }
    
    if(($palabra_clave == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM normas WHERE f_pub between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,'gesdoju');
        $query_2 = mysqli_query($conn,$sql_2);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h3><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h3><hr>';
                  
      echo "<table class='display compact' style='width:100%' id='normasAdvanceSearchTable'>";
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
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila_2['id'].'">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_norma" data-toggle="tooltip" data-placement="top" title="Información Extendida de la Norma">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                                        
                </form>
                </td>';
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&palabra_clave='.$palabra_clave.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div>';
		
		}
    
    if(($palabra_clave == '') && ($fecha_desde == '') && ($fecha_hasta == '') && ($anio_pub != '')){
    
        $sql_2 = "SELECT * FROM normas WHERE anio_pub = '$anio_pub'";
        mysqli_select_db($conn,'gesdoju');
        $query_2 = mysqli_query($conn,$sql_2);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h3><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h3><hr>';
                  
      echo "<table class='display compact' style='width:100%' id='normasAdvanceSearchTable'>";
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
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila_2['id'].'">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="info_norma" data-toggle="tooltip" data-placement="top" title="Información Extendida de la Norma">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Información Extendida</button>
                                        
                </form>
                </td>';
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<a href="../lib/informes/print_search.php?file=print_table_info.php&anio_pub='.$anio_pub.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_avanzada">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div>';
		
		}
}


/*
** CARGA MODAL DE VERIFICACION SI EXISTE NORMA
*/
function modalVerificarNorma($conn,$dbase){
    
    echo '<div class="modal fade" id="verificarNormaModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Verificar Norma a Cargar</h4>
                </div>
                <div class="modal-body">
                <p>Ingrese los Datos de la norma sobre la que desea consultar.</p><hr>
                
                    <form id="fr_consultar_norma_ajax" method="POST">
                        
                        <div class="form-group">
                            <label for="nombre">Nro de Norma</label>
                            <input type="text" class="form-control" id="nro_norma" name="nro_norma"  maxlength="25" placeholder="00000" oninput="Numeros(this.value);" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="anio">Año Publicación</label>
                            <input type="text" class="form-control" id="anio" name="anio"  maxlength="4" placeholder="AAAA" oninput="Numeros(this.value);" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="t_norma">Tipo de Norma</label>
                            <select class="form-control" id="tipo_norma" name="tipo_norma" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM tipo_norma order by id ASC";
                                mysqli_select_db($conn,$dbase);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                                </div><hr>
                                
                        <button type="submit" class="btn btn-default btn-block" id="consultar_norma">
                            <img src="../../icons/actions/view-filter.png"  class="img-reponsive img-rounded"> Consultar</button>
                        
                    </form>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <img src="../../icons/actions/window-close.png"  class="img-reponsive img-rounded"> Cerrar</button>
                </div>
            </div>
            
            </div>
        </div>';

}


/*
** FUNCION QUE REALIZA CONSULTA SI EXISTE O NO LA NORMA YA CARGADA
*/
function consultarNorma($nro_norma,$tipo_norma,$anio,$conn,$dbase){
    
    $sql = "select n_norma, tipo_norma, anio_pub from normas where n_norma = '$nro_norma' and tipo_norma = '$tipo_norma' and anio_pub = '$anio'";
    mysqli_select_db($conn,$dbase);
    $query = mysqli_query($conn,$sql);
        
    if($query){
        
        $rows = mysqli_num_rows($query);
        
        if($rows == 0){
        
            echo 1; // norma inexistente
        
        }
        if($rows > 0){
            
            echo 2; // norma existente
        }
    }else{
        echo -1; // hubo un problema para realizar la consulta
    }

}


?>
