<?php

/*
** funcion que lista toda la información de las funciones ejecutivas
*/

function escalasSinepPP($conn){

if($conn){
	
	$sql = "SELECT * FROM escalas_sinep_pp";
    mysqli_select_db($conn,'gesdoju');
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container">
	      <div class="alert alert-success">
	      <img src="../../icons/actions/format-list-ordered.png"  class="img-reponsive img-rounded"> Escalas Salariales SINEP Planta Permanente
	      </div><br>';
                  
      echo "<table class='display compact' style='width:100%' id='myTable'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Norma Regulatoria</th>
            <th class='text-nowrap text-center'>Entrada Vigencia</th>
            <th class='text-nowrap text-center'>Mes</th>
            <th class='text-nowrap text-center'>Año</th>
            <th class='text-nowrap text-center'>Valor UR</th>
            <th class='text-nowrap text-center'>Nivel</th>
            <th class='text-nowrap text-center'>Grado</th>
            <th class='text-nowrap text-center'>Agrupamiento</th>
            <th class='text-nowrap text-center'>Sueldo UR</th>
            <th class='text-nowrap text-center'>Sueldo Monto</th>
            <th class='text-nowrap text-center'>Dedicación Func. UR</th>
            <th class='text-nowrap text-center'>Dedicación Func. Monto</th>
            <th class='text-nowrap text-center'>Asig. Bas. UR</th>
            <th class='text-nowrap text-center'>Asig. Bas. Monto</th>
            <th class='text-nowrap text-center'>Básico Conformado UR</th>
            <th class='text-nowrap text-center'>Básico Conformado Monto</th>
            <th class='text-nowrap text-center'>Adicional Grado UR</th>
            <th class='text-nowrap text-center'>Adicional Grado Monto</th>
            <th class='text-nowrap text-center'>Sup. Agrup %</th>
            <th class='text-nowrap text-center'>Sup. Agrup. Monto</th>
            <th class='text-nowrap text-center'>% Tramo</th>
            <th class='text-nowrap text-center'>Tramo Monto</th>
            <th class='text-nowrap text-center'>Monto Total</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['norma_regulatoria']."</td>";
			 echo "<td align=center>".$fila['f_entrada_vigencia']."</td>";
			 echo "<td align=center>".$fila['mes']."</td>";
			 echo "<td align=center>".$fila['anio']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['valor_ur']."</td>";
			 echo "<td align=center>".$fila['nivel']."</td>";
			 echo "<td align=center>".$fila['grado']."</td>";
			 echo "<td align=center>".$fila['agrupamiento']."</td>";
			 echo "<td align=center>".$fila['sueldo_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['sueldo_monto']."</td>";
			 echo "<td align=center>".$fila['dedicacion_funcional_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['dedicacion_funcional_monto']."</td>";
			 echo "<td align=center>".$fila['asignacion_basica_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['asignacion_basica_monto']."</td>";
			 echo "<td align=center>".$fila['basico_conformado_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['basico_conformado_monto']."</td>";
			 echo "<td align=center>".$fila['adicional_grado_ur']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['adicional_grado_monto']."</td>";
			 echo "<td align=center>".$fila['suplemento_agrup_porcentaje']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['suplemento_agrup_monto']."</td>";
			 echo "<td align=center>".$fila['tramo_porcentaje']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['tramo_suma']."</td>";
			 echo "<td align=center><strong>$</strong>".$fila['monto_total']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="main.php" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                                     
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Editar Datos">
                        <button type="submit" class="btn btn-success btn-sm" name="edit_escala_pp">
                            <img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>
                    
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Eliminar Registro">
                        <button type="submit" class="btn btn-danger btn-sm" name="del_escala_pp">
                            <img src="../../icons/places/user-trash.png"  class="img-reponsive img-rounded"> Borrar</button>
                    
                    </form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button><hr>';
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="add_pp">
                        <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar</button>
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
function formAddSinepPP($conn){


echo '<div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Nivel y Grado a la Escala SINEP</div>
            <div class="panel-body">
            
            
                <form action="main.php" method="POST">
                    <div class="form-group">
                    
                                        
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
                    </div>
                    
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
                        <label>Agrupamiento:</label>
                        <select class="form-control" name="agrupamiento" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="General">General</option>
                            <option value="Profesional">Profesional</option>
                            <option value="Cientifico-Tecnico">Científico-Técnico</option>
                            <option value="Especializado">Especializado</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Valor de UR:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el valor de UR sin separador de miles y use un punto en lugar de una coma para los decimales" name="valor_ur" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Sueldo (Cantidad UR):</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="sueldo_ur" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Dedicación Funcional (Cantidad UR):</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="dedicacion_funcional_ur" required>
                    </div>
                    
                    <div class="form-group">
                    <label>Adicional Grado (Cantidad UR):</label>
                    <input type="text" class="form-control" placeholder="Ingrese la cantidad de UR" name="asignacion_grado_ur" required>
                    </div><hr> 
                                        
                    <button type="submit" class="btn btn-success btn-block" name="add_sinep_pp">
                        <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
                </form>
              
            
            </div>
            </div>
            </div>';

}


/*
** funcion para persistencia de escalas salariales sinep planta Permanente
*/
function addSinepPP($norma_regulatoria,$f_vigencia,$mes,$anio,$nivel,$grado,$agrupamiento,$valor_ur,$sueldo_ur,$dedicacion_funcional_ur,$adicional_grado_ur,$conn){

    //$monto = $cant_ur * $valor_ur;
    
    // se calcula asignacion basica
    $asignacion_basica_ur = $sueldo_ur + $dedicacion_funcional_ur;
    $asignacion_basica_monto = $asignacion_basica_ur * $valor_ur;
    $asignacion_basica_monto = number_format((float)$asignacion_basica_monto, 2, '.', ''); // se castea a flotante
    
    // calcula sueldo monto
    $sueldo_monto = $sueldo_ur * $valor_ur;
    $sueldo_monto = number_format((float)$sueldo_monto, 2, '.', ''); // se castea a flotante
    
    // calculamos dedicacion funcional monto
    $dedicacion_funcional_monto = $dedicacion_funcional_ur * $valor_ur;
    $dedicacion_funcional_monto = number_format((float)$dedicacion_funcional_monto, 2, '.', ''); // se castea a flotante
    
    // calculamos adicional grado
    $adicional_grado_monto = $adicional_grado_ur * $valor_ur;
    $adicional_grado_monto = number_format((float)$adicional_grado_monto, 2, '.', '');
    
    // se calcula el basico conformado
    
    // se calcula suplemento por agrupamiento
    if($agrupamiento == 'General'){
        
       $porcentaje_agrup = 0.00;
       $monto_agrupamiento = $asignacion_basica_monto * $porcentaje_agrup;
       $monto_agrupamiento = number_format((float)$monto_agrupamiento, 2, '.', '');
    }
    if($agrupamiento == 'Profesional'){
        
        $porcentaje_agrup = 0.35;
        $monto_agrupamiento = $asignacion_basica_monto * $porcentaje_agrup;
        $monto_agrupamiento = number_format((float)$monto_agrupamiento, 2, '.', '');    
    }
    if($agrupamiento == 'Cientifico-Tecnico'){
        
        $porcentaje_agrup = 0.40;
        $monto_agrupamiento = $asignacion_basica_monto * $porcentaje_agrup;
        $monto_agrupamiento = number_format((float)$monto_agrupamiento, 2, '.', '');
    }
    if($agrupamiento == 'Especializado'){
        
        $porcentaje_agrup = 0.50;
        $monto_agrupamiento = $asignacion_basica_monto * $porcentaje_agrup;
        $monto_agrupamiento = number_format((float)$monto_agrupamiento, 2, '.', '');
    }
    
    
    // se calcula adicional por tramo
    if($grado >= 4 && $grado <= 7){
        
        $tramo_porcentaje = 0.15;
        $tramo_suma = $asignacion_basica_monto * $tramo_porcentaje;
        $tramo_suma = number_format((float)$tramo_suma, 2, '.', '');
    }
    if($grado >= 8 && $grado <= 10){
        
        $tramo_porcentaje = 0.30;
        $tramo_suma = $asignacion_basica_monto * $tramo_porcentaje;
        $tramo_suma = number_format((float)$tramo_suma, 2, '.', '');
    }
    
    // se calcula adicional grado
    mysqli_select_db($conn,'gesdoju');
    $sql = "select cant_ur from adicional_grado_ur where nivel = '$nivel' and grado = '$grado'";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
	      $adicional_grado_ur = $row['cant_ur'];
	}
    
    $adicional_grado_monto = $adicional_grado_ur * $valor_ur;
    $adicional_grado_monto = number_format((float)$adicional_grado_monto, 2, '.', '');
    
    
    //$monto_total = number_format((float)$monto_total, 2, '.', '');
    
    
	$sqlInsert = "INSERT INTO escalas_sinep_pp ".
          "(norma_regulatoria,f_entrada_vigencia,mes,anio,valor_ur,nivel,grado,agrupamiento,sueldo_ur,sueldo_monto,dedicacion_funcional_ur,dedicacion_funcional_monto,asignacion_basica_ur,asignacion_basica_monto,basico_conformado_ur,basico_conformado_monto,adicional_grado_ur,adicional_grado_monto,suplemento_agrup_porcentaje,suplemento_agrup_monto,tramo_porcentaje,tramo_suma,monto_total)".
		"VALUES ".
		"('$norma_regulatoria','$f_vigencia','$mes','$anio','$nivel','$grado','$agrupamiento','$valor_ur','$sueldo_ur','$sueldo_monto','$dedicacion_funcional_ur','$dedicacion_funcional_monto','$asignacion_basica_ur','$asignacion_basica_monto','$basico_conformado_ur','$basico_conformado_monto','$adicional_grado_ur','$adicional_grado_monto','$suplemento_agrup_porcentaje','$monto_agrupamiento','$tramo_porcentaje','$tramo_suma','$monto_total')";
           
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


?>
