<?php

class Paritarias{

    // VARIABLES DE LA CLASE
    private $grupo_representantes = '';
    private $tipo_representacion = '';
    private $fecha_reunion = '';
    private $file_name = '';
    private $file_path = '';
    private $resumen_reunion = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    function __constructor(){
        $this->grupo_representantes = '';
        $this->tipo_representacion = '';
        $this->fecha_reunion = '';
        $this->file_name = '';
        $this->file_path = '';
        $this->resumen_reunion = '';
    }
    
    // SETTERS
    private function set_grupo_representantes($var){
        $this->grupo_representantes = $var;
    }
    
    private function set_tipo_representancion($var){
        $this->tipo_representacion = $var;
    }
    
    private function set_fecha_reunion($var){
        $this->fecha_reunion = $var;
    }
    
    private function set_file_name($var){
        $this->file_name = $var;
    }
    
    private function set_file_path($var){
        $this->file_path = $var;
    }
    
    private function set_resumen_reunion($var){
        $this->resumen_reunion = $var;
    }
    
    
    // GETTERS
    private function get_grupo_representantes($var){
        return $this->grupo_representantes = $var;
    }
    
    private function get_tipo_representacion($var){
        return $this->tipo_representacion = $var;
    }
    
    private function get_fecha_reunion($var){
        return $this->fecha_reunion = $var;
    }
    
    private function get_file_name($var){
        return $this->file_name = $var;
    }
    
    private function get_file_path($var){
        return $this->file_path = $var;
    }
    
    private function get_resumen_reunion($var){
        return $this->resumen_reunion = $var;
    }

    
    // METODOS

    /*
    ** LISTAR GRUPOS
    */
    public function listarParitarias($paritaria,$conn){

    
                if($conn){
                
                
                $sql = "select * from representacion_paritarias";
                mysqli_select_db($conn,'gesdoju');
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/categories/applications-engineering.png" /> Representación Paritarias</div>
                        
                        <div class="panel-body">
                        <div class="table-responsive"><br>';
                        
                        echo "<table class='display compact' style='width:100%' id='myTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Grupo Encargado</th>
                        <th class='text-nowrap text-center'>Tipo Representación</th>
                        <th class='text-nowrap text-center'>Fecha Reunión</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$paritaria->get_grupo_representantes($fila['grupo_representantes'])."</td>";
                        echo "<td align=center>".$paritaria->get_tipo_representacion($fila['tipo_representacion'])."</td>";
                        echo "<td align=center>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-default btn-sm" name="info_paritaria" data-toggle="tooltip" data-placement="right" title="Información Extendida sobre paritaria">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/help-about.png" /> Información Extendida</button>
                                
                        </form>';
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<br>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nueva_paritaria" data-toggle="tooltip" data-placement="right" title="Agregar Informe de Paritaria">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Registro de Reunión</button>
                            
                            <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias" data-toggle="tooltip" data-placement="right" title="Búsqueda Avanzada sobre Paritarias">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/system-search.png" /> Búsqueda Avanzada</button>
                        </form><br>';
                    echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    } // FIN DEL METODO LISTAR
    
    
/*
** FORMULARIO DE CARGA DE UN NUEVO REGISTRO
*/

    public function formAltaParitaria($conn){
    
        echo '<div class="container">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit-sign.png" /> Alta Registro de Reunión Paritaria</div>
                        
                        <div class="panel-body">
                                   
            <form id="fr_add_new_paritaria_ajax" method="POST">
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                                                                                  
                        <div class="form-group">
                            <label for="grupo_representante">Grupo Representante</label>
                            <select class="form-control" id="grupo_representante" name="grupo_representante" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[nombre_grupo].'">'.$valores[nombre_grupo].'</option>';
                                    }
                                    }
                                }

                                mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                        
                        <div class="form-group">
                            <label for="tipo_representacion">Tipo de Representación:</label>
                            <select class="form-control" id="tipo_representacion" name="tipo_representacion">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Negociacion">Negociación</option>
                                <option value="Interpretacion">Interpretación</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="fecha_reunion">Fecha Reunión:</label>
                            <input type="date" class="form-control" id="fecha_reunion" name="fecha_reunion" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="resumen_reunion">Resumen Reunión:</label>
                            <textarea class="form-control" id="resumen_reunion" name="resumen_reunion" maxlength="1000" placeholder="Ingrese un breve Resúmen de la Reunión" required></textarea>
                        </div>
                        
                        
                    </div>
                </div>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" id="add_new_paritaria" name="add_new_paritaria">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Agregar</button>
            </form>
           
            </div></div></div>';   
    
    }
    
    
    // INFORMACION EXTENDIDA
    public function infoParitaria($paritaria,$id,$conn){
    
    $sql = "select * from representacion_paritarias where id = '$id'";
    mysqli_select_db($conn,'gesdoju');
    $query = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($query)){
        $grupo_representantes = $row['grupo_representantes'];
        $tipo_representacion = $row['tipo_representacion'];
        $fecha_reunion = $row['fecha_reunion'];
        $resumen_reunion = $row['resumen_reunion'];
        $archivo = $row['file_name'];
    }
    
    $sql_1 = "select representantes from grupo_representantes where nombre_grupo = '$grupo_representantes'";
    $query_1 = mysqli_query($conn,$sql_1);
    while($row_1 = mysqli_fetch_array($query_1)){
        $representantes = $row_1['representantes'];
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
                    <li class="list-group-item"><strong>Grupo:</strong> '.$paritaria->get_grupo_representantes($grupo_representantes).'</li>
                    <li class="list-group-item"><strong>Integrantes:</strong> '.$representantes.'</li>
                    <li class="list-group-item"><strong>Tipo Representacion:</strong> '.$paritaria->get_tipo_representacion($tipo_representacion).'</li>
                    <li class="list-group-item"><strong>Fecha Reunión:</strong> '.$paritaria->get_fecha_reunion($fecha_reunion).'</li>
                    <li class="list-group-item"><strong>Resúmen Reunión:</strong> '.$paritaria->get_resumen_reunion($resumen_reunion).'</li>
                    </ul>
                    <div class="panel-footer">
                        
                        <form action="main.php" method="POST">
                                <button type="submit" class="btn btn-default btn-sm btn-block" name="paritarias">
                                <img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Volver a Paritarias</button>
                        </form><br>
                        
                        <a href="../lib/informes/print.php?file=print_informe_paritaria.php&id='.$id.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>';
                        
                        if($paritaria->get_file_name($archivo) == ''){
                        
                        echo '<form action="main.php" method="POST">
                              
                              <input type="hidden" name="id" value="'.$id.'">
                              
                                <button type="submit" class="btn btn-warning btn-sm btn-block" name="upload_file" data-toggle="tooltip" data-placement="left" title="Subir Archivo">
                                <img src="../../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Subir</button>
                        
                              </form>';
                        
                        }else{
                            echo '<a href="../normas/download.php?file_name='.$paritaria->get_file_name($archivo).'&tipo_archivo=2" data-toggle="tooltip" data-placement="left" title="Ver o Descargar Archivo '.$paritaria->get_file_name($archivo).'">
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
public function formAdvanceSearchParitarias($conn){
    
    echo '<div class="container">
            <div class="panel panel-default">
            <div class="panel-heading">
                <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</div>
            <div class="panel-body">
            
            <div class="row">
             <div class="alert alert-info">
                <p><img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> 
                    <strong>Importante:</strong> Desde el botón <strong>Habilitar</strong> habilite el campo por el cual desea realizar la búsqueda. Puede habilitar todos o sólo las fechas desde / hasta.</p>
             </div>
            </div>
            
            <form action="#" method="POST">
                <div class="form-group">
                
                
                        <div class="form-group">
                            <label for="grupo_representante">Grupo Representante</label>
                            <select class="form-control" id="grupo_representante" name="grupo_representante" disabled>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[nombre_grupo].'">'.$valores[nombre_grupo].'</option>';
                                    }
                                    }
                                }

                                mysqli_close($conn);
                            
                            echo '</select><br>
                                    <button type="button" class="btn btn-warning" onclick=callEnableParitaria("grupo_representante")>
                                        <img src="../../icons/status/object-unlocked.png"  class="img-reponsive img-rounded"> Habilitar</button>
                            </div><hr>
                
                <div class="form-group">
                <label for="fecha">Fecha Publicación Desde:</label>
                <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" disabled><br>
                <button type="button" class="btn btn-warning" onclick=callEnableParitaria("fecha_desde")>
                    <img src="../../icons/status/object-unlocked.png"  class="img-reponsive img-rounded"> Habilitar</button>
                </div><hr>
                
                <div class="form-group">
                <label for="fecha">Fecha Publicación Hasta:</label>
                <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" disabled><br>
                <button type="button" class="btn btn-warning" onclick=callEnableParitaria("fecha_hasta")>
                    <img src="../../icons/status/object-unlocked.png"  class="img-reponsive img-rounded"> Habilitar</button>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" name="search_paritaria">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Buscar</button>
            </form>
            
            </div>

            </div>
            </div>';
}
   
   
/*
** RESULTADO DE BUSQUEDA AVANZADA
*/
public function searchAdvanceParitariasResults($paritaria,$grupo_representante,$fecha_desde,$fecha_hasta,$conn){

    if(($grupo_representante != '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante' and fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
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
		    <th class='text-nowrap text-center'>Grupo Representante</th>
		    <th class='text-nowrap text-center'>Tipo Representacion</th>
            <th class='text-nowrap text-center'>Fecha Raunión</th>
            <th class='text-nowrap text-center'>Resúmen Reunión</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($query)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$paritaria->get_grupo_representantes($fila['grupo_representantes'])."</td>";
			 echo "<td align=center>".$paritaria->get_tipo_representacion($fila['tipo_representacion'])."</td>";
			 echo "<td align=center>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</td>";
			 echo "<td align=center>".$paritaria->get_resumen_reunion($fila['resumen_reunion'])."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
    
    }
    
    if(($grupo_representante != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante'";
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
		    <th class='text-nowrap text-center'>Grupo Representante</th>
		    <th class='text-nowrap text-center'>Tipo Representacion</th>
            <th class='text-nowrap text-center'>Fecha Raunión</th>
            <th class='text-nowrap text-center'>Resúmen Reunión</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila_1 = mysqli_fetch_array($query_1)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$paritaria->get_grupo_representantes($fila_1['grupo_representantes'])."</td>";
			 echo "<td align=center>".$paritaria->get_tipo_representacion($fila_1['tipo_representacion'])."</td>";
			 echo "<td align=center>".$paritaria->get_fecha_reunion($fila_1['fecha_reunion'])."</td>";
			 echo "<td align=center>".$paritaria->get_resumen_reunion($fila_1['resumen_reunion'])."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
    
    }
    
    if(($grupo_representante == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM representacion_paritarias WHERE fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
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
		    <th class='text-nowrap text-center'>Grupo Representante</th>
		    <th class='text-nowrap text-center'>Tipo Representacion</th>
            <th class='text-nowrap text-center'>Fecha Raunión</th>
            <th class='text-nowrap text-center'>Resúmen Reunión</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila_2 = mysqli_fetch_array($query_2)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$paritaria->get_grupo_representantes($fila_2['grupo_representantes'])."</td>";
			 echo "<td align=center>".$paritaria->get_tipo_representacion($fila_2['tipo_representacion'])."</td>";
			 echo "<td align=center>".$paritaria->get_fecha_reunion($fila_2['fecha_reunion'])."</td>";
			 echo "<td align=center>".$paritaria->get_resumen_reunion($fila_2['resumen_reunion'])."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '</td>';
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../lib/informes/print_search.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><br>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		
		}

}
   
   
    // PERSISTENCIA A BASE
/*
** PERSISTENCIA A BASE DE NUEVA PARITARIA
*/
    public function addParitaria($paritaria,$grupo_representante,$tipo_representacion,$fecha_reunion,$resumen_reunion,$conn){
    
        if($conn){
        
            mysqli_select_db($conn,'gesdoju');
                                
                    $sql = "INSERT INTO representacion_paritarias ".
                    "(grupo_representantes,
                      tipo_representacion,
                      fecha_reunion,
                      resumen_reunion)".
                    "VALUES ".
                    "($paritaria->set_grupo_representantes('$grupo_representante'),
                      $paritaria->set_tipo_representacion('$tipo_representacion'),
                      $paritaria->set_fecha_reunion('$fecha_reunion'),
                      $paritaria->set_resumen_reunion('$resumen_reunion'))";
                    
                    $query = mysqli_query($conn,$sql);
                        
                    if($query){
                        echo 1; // registro insertado correctamente
                    }else{
                        echo -1; // hubo un problema al insertar el registro
                    }
            
        }else{
            echo 7; // no hay conexion
        }
    
    } // end funcion

    

    
    
    
} // FIN DE LA CLASE



?>
