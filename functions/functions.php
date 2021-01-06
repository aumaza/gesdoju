<?php


/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/gesdoju/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/scrolling-nav.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/gesdoju/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/Chart.js/Chart.min.css" >
	<link rel="stylesheet" href="/gesdoju/skeleton/Chart.js/Chart.css" >
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="/gesdoju/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/gesdoju/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/gesdoju/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/gesdoju/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/gesdoju/skeleton/js/dataTables.select.min.js"></script>
	<script src="/gesdoju/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/gesdoju/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/gesdoju/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/gesdoju/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/gesdoju/skeleton/Chart.js/Chart.js"></script>';
}


/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

function cambiarPermisos($id,$role,$conn){

  $sql = "UPDATE usuarios set role = '$role' where id = '$id'";
  mysqli_select_db('gesdoju');
  $retval = mysqli_query($conn,$sql);
  if($retval){
    
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Rol Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
	  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "El usuario no existe. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
 
}



function loadUser($conn,$nombre){

if($conn){
	
	$sql = "SELECT * FROM usuarios where nombre = '$nombre'";
    	mysqli_select_db('gesdoju');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Mis Datos
	      </div><br>';
	
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Usuario</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['user']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../usuarios/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Cambiar Password</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** Funcion alta de norma
*/
function newNorma(){

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cargar Normativa</h2><hr>
	        <form action="../normas/formNuevoRegistro.php" method="POST">
	        
	        <div class="form-group">
		  <label for="nombre">Nro de Norma</label>
		  <input type="text" class="form-control" id="nombre" name="n_norma"  onKeyDown="limitText(this,25);" placeholder="00000/00" required>
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
		    </select>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Fecha Publicación:</label>
		  <input type="date" class="form-control" id="f_pub" name="f_pub" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Año:</label>
		  <input type="text" class="form-control" id="anio" name="anio" placeholder="AAAA" onKeyDown="limitText(this,4);" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Observaciones:</label>
		  <textarea class="form-control" id="observaciones" name="observaciones" onKeyDown="limitText(this,300);" required></textarea>
		</div>
		
		<button type="submit" class="btn btn-success btn-block" name="A"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
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
      mysqli_select_db('gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Editar Normativa</h2><hr>
	        <form action="../normas/formUpdate.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Nro de Norma</label>
		  <input type="text" class="form-control" id="nombre" name="n_norma" value="'.$fila['n_norma'].'" onKeyDown="limitText(this,25);" required>
		</div>
		
		<div class="form-group">
		  <label for="sel1">Tipo de Norma:</label>
		  <select class="form-control" name="t_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Ley" '.($fila['t_norma'] == "Ley" ? "selected" : ""). '>Ley</option>
		    <option value="Decreto" '.($fila['t_norma'] == "Decreto" ? "selected" : "").'>Decreto</option>
		    <option value="Resolución" '.($fila['t_norma'] == "Resolución" ? "selected" : "").'>Resolución</option>
		    <option value="Disposición" '.($fila['t_norma'] == "Disposición" ? "selected" : "").'>Disposición</option>
		    <option value="Nota" '.($fila['t_norma'] == "Nota" ? "selected" : "").'>Nota</option>
		    <option value="Memo" '.($fila['t_norma'] == "Memo" ? "selected" : "").'>Memo</option>
		  </select>
		</div> 
		
		<div class="form-group">
		  <label for="sel1">Ambito de la Norma:</label>
		  <select class="form-control" name="foro_norma">
		    <option value="" disabled selected>Seleccionar</option>
		    <option value="Comercial" '.($fila['foro_norma'] == "Comercial" ? "selected" : ""). '>Comercial</option>
		    <option value="Laboral" '.($fila['foro_norma'] == "Laboral" ? "selected" : ""). '>Laboral</option>
		    <option value="Civil" '.($fila['foro_norma'] == "Civil" ? "selected" : ""). '>Civil</option>
		    <option value="Penal" '.($fila['foro_norma'] == "Penal" ? "selected" : ""). '>Penal</option>
		    </select>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Fecha Publicación:</label>
		  <input type="date" class="form-control" id="f_pub" name="f_pub" value="'.$fila['f_pub'].'" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Año:</label>
		  <input type="text" class="form-control" id="anio" name="anio" value="'.$fila['anio_pub'].'" onKeyDown="limitText(this,4);" required>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Observaciones:</label>
		  <textarea class="form-control" id="observaciones" name="observaciones" onKeyDown="limitText(this,300);" required>'.$fila['observaciones'].'</textarea>
		</div>
		
		<button type="submit" class="btn btn-success btn-block" name="A"><img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
	      </form> 
	      <a href="../main/main.php"><button type="submit" class="btn btn-primary btn-block" ><img src="../../icons/actions/arrow-left.png"  class="img-reponsive img-rounded"> Volver</button></a>
	      <br>
	      
	    </div>
	    </div>
	</div>';

}


function updateNorma($id,$n_norma,$t_norma,$foro_norma,$f_pub,$anio,$obs,$conn){

		
	mysqli_select_db('gesdoju');
	$sqlInsert = "update normas set n_norma = '$n_norma', t_norma = '$t_norma', foro_norma = '$foro_norma', f_pub = '$f_pub', anio_pub = '$anio', observaciones = '$obs' where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		//mysqli_query($conn,$sqlInsert);
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Registro Actualizado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al Actualizar el Registro!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}



function normas($conn){

if($conn){
	
	$sql = "SELECT * FROM normas";
    	mysqli_select_db('gesdoju');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Normas
	      </div><br>';
	
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nro. Norma</th>
                    <th class='text-nowrap text-center'>Tipo Norma</th>
                    <th class='text-nowrap text-center'>Foro</th>
                    <th class='text-nowrap text-center'>F. Publicación</th>
                    <th class='text-nowrap text-center'>Año Publicación</th>
                    <th class='text-nowrap text-center'>Observaciones</th>
                    <th class='text-nowrap text-center'>Archivo</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['n_norma']."</td>";
			 echo "<td align=center>".$fila['t_norma']."</td>";
			 echo "<td align=center>".$fila['foro_norma']."</td>";
			 echo "<td align=center>".$fila['f_pub']."</td>";
			 echo "<td align=center>".$fila['anio_pub']."</td>";
			 echo "<td align=center>".$fila['observaciones']."</td>";
			 echo "<td align=center>".$fila['file_name']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../normas/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm " ><span class="glyphicon glyphicon-pencil"></span> Editar</a><br>';
			 echo '<a href="#" data-href="../normas/eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a><br>';
			 echo '<a href="../normas/upload.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-upload"></span> PDF</a><br>';
			 echo '<a href="../normas/download.php?file_name='.$fila['file_name'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cloud-download"></span> PDF</a>';
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


function normativas($conn,$norma){

if($conn){
	
	$sql = "SELECT * FROM normas where t_norma = '$norma'";
    	mysqli_select_db('gesdoju');
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
		    <th class='text-nowrap text-center'>Nro. Norma</th>
                    <th class='text-nowrap text-center'>Tipo Norma</th>
                    <th class='text-nowrap text-center'>Foro</th>
                    <th class='text-nowrap text-center'>F. Publicación</th>
                    <th class='text-nowrap text-center'>Año Publicación</th>
                    <th class='text-nowrap text-center'>Observaciones</th>
                    <th class='text-nowrap text-center'>Archivo</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['n_norma']."</td>";
			 echo "<td align=center>".$fila['t_norma']."</td>";
			 echo "<td align=center>".$fila['foro_norma']."</td>";
			 echo "<td align=center>".$fila['f_pub']."</td>";
			 echo "<td align=center>".$fila['anio_pub']."</td>";
			 echo "<td align=center>".$fila['observaciones']."</td>";
			 echo "<td align=center>".$fila['file_name']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../normas/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm " ><span class="glyphicon glyphicon-pencil"></span> Editar</a><br>';
			 echo '<a href="#" data-href="../normas/eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a><br>';
			 echo '<a href="../normas/upload.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-upload"></span> PDF</a><br>';
			 echo '<a href="../normas/download.php?file_name='.$fila['file_name'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cloud-download"></span> PDF</a>';
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


function editPassUser($id,$conn){

      $sql = "select * from usuarios where id = '$id'";
      mysqli_select_db('gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
      

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cambiar Password</h2><hr>
	      
	      <form action="formUpdate.php" method="post">
	      <input type="hidden" id="id" name="id" value="' . $fila['id'].'" />
   
         
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	    <input id="text" type="text" class="form-control" value="' . $fila['nombre'].'" name="nombre" value="" onkeyup="this.value=Text(this.value);" readonly required>
	  </div>
	
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	    <input id="text" type="text" class="form-control" name="user" onKeyDown="limitText(this,20);" onKeyUp="limitText(this,20);" value="' . $fila['user'].'" readonly required>
	  </div>
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	    <input id="password" type="password" class="form-control" name="pass1" onKeyDown="limitText(this,15);" onKeyUp="limitText(this,15);" placeholder="Password" >
	  </div>
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	    <input  type="password" class="form-control" name="pass2" onKeyDown="limitText(this,15);" onKeyUp="limitText(this,15);" placeholder="Repita Password" >
	  </div>
	  <br>
	
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-12" align="left">
	  <button type="submit" class="btn btn-success" name="A"><span class="glyphicon glyphicon-pencil"></span>  Cambiar Password</button>
	  <a href="../main/main.php"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
	  </div>
	  </div>
	</form> 
	      
	      </div>
	      </div>
	      </div>';

}


/*
* Funcion para editar la contraseña de los usuarios al sistema
*/

function updatePass($id,$pass1,$pass2,$conn){

	$sql = "UPDATE usuarios set password = '$pass1' WHERE id = '$id'";
    	mysqli_select_db('gesdoju');
    	
    	
    	if(strcmp($pass2, $pass1) == 0){
    		
		      mysqli_query($conn,$sql);
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Password Actualizado Satisfactoriamente<br>';
			echo 'Aguarde un Instante que será redirigido';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo '<meta http-equiv="refresh" content="4;URL=../main/main.php "/>';
			
	   	}else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-danger" role="alert">';
			echo "Las Contraseñas no Coinciden. Intente Nuevamente!<br>";
			echo 'Aguarde un instante que será redirigido';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo '<meta http-equiv="refresh" content="4;URL=../main/main.php "/>';

    	}
   
}


function delNorma($id,$conn){

		
	mysqli_select_db('gesdoju');
	$sql = "delete from normas where id = '$id'";
           
	$res = mysqli_query($conn,$sql);


	if($res){
		//mysqli_query($conn,$sqlInsert);
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Registro Eliminado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al Eliminar el Registro!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}

function addNorma($n_norma,$t_norma,$foro_norma,$f_pub,$anio,$obs,$conn){

		
	mysqli_select_db('gesdoju');
	$sqlInsert = "INSERT INTO normas ".
		"(n_norma,t_norma,foro_norma,f_pub,anio_pub,observaciones)".
		"VALUES ".
      "('$n_norma','$t_norma','$foro_norma','$f_pub','$anio','$obs')";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		//mysqli_query($conn,$sqlInsert);
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Registro Guardado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al guardar el Registro!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}

/*
** Funcion para subir pdf
*/

function uploadPDF($id,$conn){

  // File upload path
$targetDir = '../../uploads/';
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('pdf');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
           
            
            // Insert image file name into database
           
           $sql = "update normas set file_path = '$targetFilePath', file_name = '$fileName' where id = '$id'";
           mysqli_select_db('gesdoju');
	    $insert = mysqli_query($conn,$sql);
         
            if($insert){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong>El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                
            } 
        }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/think-img.png" alt="Avatar" class="avatar" ><strong> Ups. Hubo un error subiendo el Archivo.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
        }
    }else{
    
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/aircraft-crash64-img.png" alt="Avatar" class="avatar" ><strong> Ups, solo archivos con extensión: PDF son soportados.</strong>';
			  echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
    }
}else{
			  echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/refresh-img.png" alt="Avatar" class="avatar" ><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
}

}


?>
