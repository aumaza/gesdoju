<?php

// LISTADOS


/*
** funcion que lista SEGMENTACION TEMATICA
*/

function segmentacionTematica($conn){

if($conn){
	
	$sql = "SELECT * FROM segmentacion_tematica";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/code-class.png"  class="img-reponsive img-rounded"> Segmentación Temática
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Clasificación Institucional</th>
		    <th class='text-nowrap text-center'>Jurisdicción</th>
            <th class='text-nowrap text-center'>SAF</th>
            <th class='text-nowrap text-center'>Código SIRHU</th>
            <th class='text-nowrap text-center'>Organismo</th>
            <th class='text-nowrap text-center'>Régimen Paritario</th>
            <th class='text-nowrap text-center'>Escalafón / Estatuto</th>
            <th class='text-nowrap text-center'>Convenio</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['clas_inst']."</td>";
			 echo "<td align=center>".$fila['jurisdiccion']."</td>";
			 echo "<td align=center>".$fila['saf']."</td>";
			 echo "<td align=center>".$fila['cod_sirhu']."</td>";
			 echo "<td align=center>".$fila['desc_organismo']."</td>";
			 echo "<td align=center>".$fila['reg_paritario']."</td>";
			 echo "<td align=center>".$fila['esc_estatuto']."</td>";
			 echo "<td align=center>".$fila['convenio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Registro">
                        <button type="submit" class="btn btn-success btn-sm" name="edit_segmentacion">
                            <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <button type="submit" class="btn btn-danger btn-sm" name="del_segmentacion">
                            <img src="../../icons/places/user-trash.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    </form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_st">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Registro</button>
                    </form>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}

?>
