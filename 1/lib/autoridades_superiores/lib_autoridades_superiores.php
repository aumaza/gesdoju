<?php

class AutoridadesSuperiores{

    // PROPIEDADES
    private $organismo = '';                        // varchar(300) not null
    private $normativa = '';                         // varchar(300) not null
    private $observacion = '';                     // varchar(1000)
    private $autoridad_superior_id = '';  // int(11) not null,
    private $anio = '';                                    // varchar(4) not null,
    private $mes = '';                                    // varchar(10) not null,
    private $apellido_nombre = '';          // varchar(100) not null,
    private $asignacion_mensual = '';     // float(8,2) not null,
    private $desarragaigo = '';                  // float(8,2),
    private $sac = '';                                      // float(8,2),
    private $cant_ur = '';                              // int(11) not null,
    private $otros_conceptos = '';           // float(8,2)

    // CONSTRUCTOR
    function __construct(){
        $this->organismo = '';
        $this->normativa = '';
        $this->observacion = '';
        $this->autoridad_superior_id = '';
        $this->anio = '';
        $this->mes = '';
        $this->apellido_nombre = '';
        $this->asignacion_mensual = '';
        $this->desarragaigo = '';
        $this->sac = '';
        $this->cant_ur = '';
        $this->otros_conceptos = '';
    }

    // SETTERS
    private function setOrganismo($var){
        $this->organismo = $var;
    }

    private function setNormativa($var){
        $this->normativa = $var;
    }

    private function setObservacion($var){
        $this->observacion = $var;
    }

    private function setAutoridadSuperiorId($var){
        $this->autoridad_superior_id = $var;
    }

    private function setAnio($var){
        $this->anio = $var;
    }

    private function setMes($mes){
        $this->mes = $var;
    }

    private function setApellidoNombre($var){
        $this->apellido_nombre = $var;
    }

    private function setAsignacionMensual($var){
        $this->asignacion_mensual = $var;
    }

    private function setDesarraigo($var){
        $this->desarragaigo = $var;
    }

    private function setSac($var){
        $this->sac = $var;
    }

    private function setCantUr($var){
        $this->cant_ur = $var;
    }

    private function setOtrosConceptos($var){
        $this->otros_conceptos = $var;
    }

    // GETTERS
    private function getOrganismo($var){
        return $this->organismo = $var;
    }

    private function getNormativa($var){
        return $this->normativa = $var;
    }

    private function getObservacion($var){
        return $this->observacion = $var;
    }

    private function getAutoridadSuperiorId($var){
        return $this->autoridad_superior_id = $var;
    }

    private function getAnio($var){
        return $this->anio = $var;
    }

    private function getMes($mes){
        return $this->mes = $var;
    }

    private function getApellidoNombre($var){
        return $this->apellido_nombre = $var;
    }

    private function getAsignacionMensual($var){
        return $this->asignacion_mensual = $var;
    }

    private function getDesarraigo($var){
        return $this->desarragaigo = $var;
    }

    private function getSac($var){
        return $this->sac = $var;
    }

    private function getCantUr($var){
        return $this->cant_ur = $var;
    }

    private function getOtrosConceptos($var){
        return $this->otros_conceptos = $var;
    }

    // METODOS

    public function listarAutoridadesSuperiores($one_as,$conn,$dbase){

    if($conn){

	$sql = "SELECT * FROM autoridades_superiores";
    mysqli_select_db($conn,$dbase);
    $resultado = mysqli_query($conn,$sql);

	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Autoridades Superiores [ Listado ]</h2><hr>';


      echo "<table class='display compact' style='width:100%' id='autoridadesSuperioresTable'>";


      echo "<thead>
		    <th class='text-nowrap text-center'>Organismo</th>
		    <th class='text-nowrap text-center'>Normativa</th>
		    <th class='text-nowrap text-center'>Observaciones</th>
            <th class='text-nowrap text-center'>Acciones</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$one_as->getOrganismo($fila['organismo'])."</td>";
			 echo "<td align=center>".$one_as->getNormativa($fila['normativa'])."</td>";
			 echo '<td align=center>'.$one_as->getObservacion($fila['observacion']).'</td>';
			 echo "<td class='text-nowrap' align=center>";
			 echo '<form action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">

                    <div class="btn-group">
                         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Acciones <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">

                          <li><button type="button" class="btn btn-default btn-sm btn-block" value="'.$fila['id'].'"  onclick="callEditAutoridadSuperior(this.value);">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button></li>

                          <li><button type="submit" class="btn btn-default btn-sm btn-block" name="historico_autoridades_superiores" data-toggle="tooltip" data-placement="left" title="Histórico"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Historico</button></li>

                        </ul>
                      </div>';

             echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		echo '<form <action="main.php" method="POST">
                    <button type="submit" class="btn btn-success btn-sm" name="add_autoridad_superior">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Autoridad Superior</button>
                    </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';

		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

} // FIN MÉTODO LISTAR AUTORIDADES SUPERIORES

// FORMULARIOS

public function formAddAutoridadSuperior($conn,$dbase){

echo '<div class="container">
	    <div class="jumbotron">

	      <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Autoridad Superior</h2><hr>
          <form action="#" method="POST"><button type="submit" class="btn btn-primary btn-sm" name="autoridades_superiores"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Volver a Autoridades Superiores</button></form><hr>

	        <form id="fr_add_new_autoridad_superior_ajax" method="POST">

	        <div class="form-group">
                <label for="organismo">Organismo</label>
                <select class="form-control" id="organismo" name="organismo" required>
                <option value="" disabled selected>Seleccionar</option>';

                    if($conn){
                    $query = "SELECT descripcion FROM clasificador_institucional order by clasificador ASC";
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
            </div>

            <div class="form-group">
                <label for="normativa">Normativa</label>
                <select class="form-control" id="normativa" name="normativa" required>
                <option value="" disabled selected>Seleccionar</option>';

                    if($conn){
                    $query = "SELECT n_norma, tipo_norma, anio_pub FROM normas order by n_norma ASC";
                    mysqli_select_db($conn,$dbase);
                    $res = mysqli_query($conn,$query);

                    if($res){
                        while ($valores = mysqli_fetch_array($res)){
                        echo '<option value="'.$valores[tipo_norma]. '  '.$valores[n_norma].'/'.$valores[anio_pub].'">'.$valores[tipo_norma].'  '.$valores[n_norma]. '/'.$valores[anio_pub].'</option>';
                        }
                        }
                    }

                    mysqli_close($conn);

                echo '</select>
            </div>

            <div class="form-group">
                <label for="descripcion">Breve Descripción (*)</label>
                <textarea class="form-control" id="descripcion" name="descripcion" maxlength="2000" placeholder="Ingrese una breve Descripción" required></textarea>
            </div><hr>

		<button type="submit" class="btn btn-success btn-block" id="new_autoridad_superior">
		<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
	      </form><hr>

	    <div id="messageNewAutoridadSuperior"></div>


	    </div>
        </div>';

} // FIN FORMULARIO DE CARGA DE AUTORIDAD SUPERIOR


public function formEditAutoridadSuperior($one_as,$id,$organismo,$normativa,$descripcion,$conn,$dbase){

    // se realiza la consulta
    mysqli_select_db($conn,$dbase);
    $sql = "select * from autoridades_superiores where id = '$id'";
    $query = mysqli_query($conn,$sql);


echo '<div class="container">
	    <div class="jumbotron">

	      <h2><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Autoridad Superior</h2><hr>
          <form action="#" method="POST"><button type="submit" class="btn btn-primary btn-sm" name="autoridades_superiores"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Volver a Autoridades Superiores</button></form><hr>

	        <form id="fr_add_edit_autoridad_superior_ajax" method="POST">

	        <div class="form-group">
                <label for="organismo">Organismo</label>
                <select class="form-control" id="organismo" name="organismo" required>
                <option value="" disabled selected>Seleccionar</option>';

                    if($conn){
                    $query = "SELECT descripcion FROM clasificador_institucional order by clasificador ASC";
                    mysqli_select_db($conn,$dbase);
                    $res = mysqli_query($conn,$query);

                    if($res){
                        while ($valores = mysqli_fetch_array($res)){
                        echo '<option value="'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
                        }
                        }
                    }

                    //mysqli_close($conn);

                echo '</select>
            </div>

            <div class="form-group">
                <label for="normativa">Normativa</label>
                <select class="form-control" id="normativa" name="normativa" required>
                <option value="" disabled selected>Seleccionar</option>';

                    if($conn){
                    $query = "SELECT n_norma, tipo_norma, anio_pub FROM normas order by n_norma ASC";
                    mysqli_select_db($conn,$dbase);
                    $res = mysqli_query($conn,$query);

                    if($res){
                        while ($valores = mysqli_fetch_array($res)){
                        echo '<option value="'.$valores[tipo_norma]. '  '.$valores[n_norma].'/'.$valores[anio_pub].'">'.$valores[tipo_norma].'  '.$valores[n_norma]. '/'.$valores[anio_pub].'</option>';
                        }
                        }
                    }

                    mysqli_close($conn);

                echo '</select>
            </div>

            <div class="form-group">
                <label for="descripcion">Breve Descripción (*)</label>
                <textarea class="form-control" id="descripcion" name="descripcion" maxlength="2000" placeholder="Ingrese una breve Descripción" required></textarea>
            </div><hr>

		<button type="submit" class="btn btn-success btn-block" id="new_autoridad_superior">
		<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
	      </form><hr>

	    <div id="messageNewAutoridadSuperior"></div>


	    </div>
        </div>';

} // FIN FORMULARIO DE CARGA DE AUTORIDAD SUPERIOR

// PERSISTENCIA

public function addAutoridadSuperior($one_as,$organismo,$normativa,$descripcion,$conn,$dbase){

        // consulta de existencia
        mysqli_select_db($conn,$dbase);
        $sql = "select * from autoridades_superiores where organismo = '$organismo'";
        $query = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($query);

        if($rows == 0){

            $sql_1 = "insert into autoridades_superiores".
                            "(organismo,
                                normativa,
                                observacion)".
                            "VALUES".
                            "($one_as->setOrganismo('$organismo'),
                               $one_as->setNormativa('$normativa'),
                               $one_as->setObservacion('$descripcion'))";
            $query_1 = mysqli_query($conn,$sql_1);

            if($query_1){
                echo 1; // registro insertado correctamente
                $success = "[ Se ha guardado satisfactoriamente un registro... ]";
                $one_as->mysqlAutoridadesSuperioresInsertSuccessLogs($success);
            }else{
                echo -1; // registro no insertado
                $error = mysqli_error($conn);
                $one_as->mysqlAutoridadesSuperioresInsertErrorLogs($error);
            }
        }
        if($rows > 0){
                echo 2; // registro existente
        }
} // FIN DE LA FUNCION


// LOGS
/*
** GUARDAR LOS SUCCESS DE MYSQL PARA AUTORIDADES SUPERIORES
*/
public function mysqlAutoridadesSuperioresInsertSuccessLogs($success){

      $fileName = "autoridades_superiores_success.log";
      $date = date("d-m-Y H:i:s");
      $message = 'Success: '.$success.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        //chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            //chmod($file, 0777);
            }

}

/*
** GUARDAR LOS ERRORES DE MYSQL PARA NORMAS
*/
public function mysqlAutoridadesSuperioresInsertErrorLogs($error){

      $fileName = "autoridades_superiores_error.log";
      $date = date("d-m-Y H:i:s");
      $message = 'Error: '.$error.' - '.$date;

        if (file_exists($fileName)){

        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$date);
        fclose($file);
        //chmod($file, 0777);

        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            //chmod($file, 0777);
            }

}


} // FIN DE LA CLASE






?>
