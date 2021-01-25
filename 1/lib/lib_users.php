<?php


function usuarios($conn){

if($conn)
{
	$sql = "SELECT * FROM usuarios";
    	mysqli_select_db('gesdoju');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Usuarios';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nombre</th>
            <th class='text-nowrap text-center'>Usuario</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Role</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['user']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['role']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                    if($fila['user'] != 'root'){
                     echo '<button type="submit" class="btn btn-danger btn-sm" name="del_user"><img src="../../icons/actions/edit-delete.png"  class="img-reponsive img-rounded"> Borrar</button>
                     <button type="submit" class="btn btn-warning btn-sm" name="allow_user"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Cambiar Permisos</button>';
                     }
             echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_user"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Usuario</button>
             </form><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Usuarios:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** funcion para agregar usuarios
*/
function newUser(){

      
        echo '<div class="container">
                <div class="row">
                <div class="col-sm-8">
            
                <div class="panel panel-primary">
                <div class="panel-heading"><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Usuario</div></div><hr>
                
                <form action="main.php" method="POST">
                
                <p><strong>Nombre y Apellido</strong>:</p>
                <div class="form-group">
                <input type="text" class="form-control" name="nombre" required>
                </div><hr>
                
                <p><strong>Usuario</strong>:</p>
                <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="usuario_organismo" required>
                </div><hr>
                
                <p><strong>Email</strong>:</p>
                <div class="form-group">
                <input type="email" class="form-control" name="email" required>
                </div><hr>
                
                <p><strong>Password</strong>:</p>
                <div class="form-group">
                <input type="password" class="form-control" name="pass1" required>
                </div><hr>
                
                <p><strong>Repita Password</strong>:</p>
                <div class="form-group">
                <input type="password" class="form-control" name="pass2" required>
                </div><hr>
                
                 <div class="form-group">
                    <label for="sel1">Permisos:</label>
                    <select class="form-control" name="role">
                        <option value="" disable>Seleccionar</option>
                        <option value="1">Usuario Habilitado</option>
                        <option value="0">Usuario Bloqueado</option>
                    </select>
                </div><hr>                
                
                <button type="submit" class="btn btn-success btn-block" name="insert_user"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
                
                </form>
                </div>
                </div>
                                               
                </div>
                </div>
                </div>';
}


/*
* Funcion para agregar usuarios al sistema
*/

function agregarUser($nombre,$user,$email,$pass1,$pass2,$role,$conn){

	mysqli_select_db($conn,'gesdoju');	

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,email,password,role)".
		"VALUES ".
      "('$nombre','$user','$email','$pass1','$role')";
      
			
	    if(strlen($pass1) <= 15 || strlen($pass2) <= 15){

	      if(strcmp($pass2, $pass1) == 0){
		    
		   $query = mysqli_query($conn,$sqlInsert);
		    
		    if($query){	
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Usuario Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
            }else{
			   
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Usuario. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
                echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Las Contraseñas no Coinciden. Reintente.';
			    echo "</div>";
			    echo "</div>";
		    
		    }
		    }else{
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Ha superado los 15 caracteres. Reintente.';
			    echo "</div>";
			    echo "</div>";
		    }
		    
		    
}


/*
** Funcion carga formulario de eliminacion de usuario
*/
function formBorrarUser($id,$conn){
    
    $sql = "select * from usuarios where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Eliminar Usuario</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por eliminar al siguiente Usuario del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Nombre</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['nombre'].'" readonly>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Usuario:</label>
		  <input type="text" class="form-control" value="'.$fila['user'].'" readonly>
		</div><hr>
		
		
		<button type="submit" class="btn btn-success btn-block" name="delete_user"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form> 
	      <a href="main.php"><button type="submit" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	      
	    </div>
	    </div>
	</div>';

}

/*
** funcion para eliminar usuario de la base de datos
*/
function delUser($id,$conn){

		
	mysqli_select_db($conn,'gesdoju');
	$sql = "delete from usuarios where id = '$id'";
    $res = mysqli_query($conn,$sql);


	if($res){
		
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Usuario Eliminado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
		    
            }else{
			   
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Usuario. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
	}
}


/*
** funcion que carga formulario para cambiar permisos de usuario
*/
function formAllowUser($id,$conn){

      $sql = "select * from usuarios where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
        
      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	    
	      <h2>Cambiar Permisos Usuario</h2><hr>
	      <div class="alert alert-danger">
	      <p align="center"><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
            <strong>Atención!</strong> Está por cambiar los permisos al siguiente Usuario del sistema. Si desea continuar presione Aceptar de lo contrario presione Cancelar.</p>
          </div><hr>
          
	        <form action="main.php" method="POST">
	        <input type="hidden" id="id" name="id" value="'.$fila['id'].'" />
	        
	        <div class="form-group">
		  <label for="nombre">Nombre</label>
		  <input type="text" class="form-control" id="nombre" value="'.$fila['nombre'].'" readonly>
		</div>
		
		<div class="form-group">
		  <label for="pwd">Usuario:</label>
		  <input type="text" class="form-control" value="'.$fila['user'].'" readonly>
		</div><hr>
		
		<div class="form-group">
            <label for="sel1">Permisos:</label>
            <select class="form-control" name="role">
             <option value="" disable>Seleccionar</option>
             <option value="1" '.($fila['role'] == "1" ? "selected" : ""). '>Usuario Habilitado</option>
             <option value="0" '.($fila['role'] == "0" ? "selected" : ""). '>Usuario Bloqueado</option>
            </select>
            </div><hr>
		
		<button type="submit" class="btn btn-success btn-block" name="role_user"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form> 
	      <a href="main.php"><button type="submit" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	      
	    </div>
	    </div>
        </div>';
 
}

/*
** funcion para cabiar permisos usuario de la base de datos
*/
function changeRole($id,$role,$conn){

		
	mysqli_select_db($conn,'gesdoju');
	$sql = "update usuarios set role = '$role' where id = '$id'";
    $res = mysqli_query($conn,$sql);


	if($res){
		
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Permisos Actualizados Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
		    
            }else{
			   
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Alctualizar los Permisos. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
	}
}

/*
** funcion que lista los datos del usuario
*/
function loadUser($conn,$nombre){

if($conn){
	
	$sql = "SELECT * FROM usuarios where nombre = '$nombre'";
    	mysqli_select_db($conn,'gesdoju');
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
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                    echo '<button type="submit" class="btn btn-primary btn-sm" name="pass_user"><img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Cambiar Password</button>
             </form></td>';
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
** funcion que carga formulario para modificar password de usuario
*/
function editPassUser($id,$conn){

      $sql = "select * from usuarios where id = '$id'";
      mysqli_select_db($conn,'gesdoju');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
      

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cambiar Password</h2><hr>
	      
	      <form action="main.php" method="post">
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
	
	<button type="submit" class="btn btn-success btn-block" name="change_pass"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Aceptar</button><br>
	      </form>
	      
	      <a href="main.php"><button type="submit" class="btn btn-danger btn-block" ><img src="../../icons/actions/dialog-close.png"  class="img-reponsive img-rounded"> Cancelar</button></a>
	      <br>
	  </div>
	  </div>
	
	      
	      </div>
	      </div>
	      </div>';

}

/*
* Funcion para editar la contraseña de los usuarios al sistema
*/
function updatePass($id,$pass1,$pass2,$conn){

	mysqli_select_db($conn,'gesdoju');	

	$sqlInsert = "update usuarios set password = '$pass1' where id = '$id'";
      
			
	    if(strlen($pass1) <= 15 || strlen($pass2) <= 15){

	      if(strcmp($pass2, $pass1) == 0){
		    
		   $query = mysqli_query($conn,$sqlInsert);
		    
		    if($query){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Password Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
            }else{
			   
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Password. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
                echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Las Contraseñas no Coinciden. Reintente.';
			    echo "</div>";
			    echo "</div>";
		    
		    }
		    }else{
			    echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Ha superado los 15 caracteres. Reintente.';
			    echo "</div>";
			    echo "</div>";
		    }
    
}
   



?>
