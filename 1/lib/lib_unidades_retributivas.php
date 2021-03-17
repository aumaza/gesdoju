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




?>