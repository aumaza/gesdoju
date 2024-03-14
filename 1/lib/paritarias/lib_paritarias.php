<?php 

class Paritarias {

	// =============================================================================================== //
	// PROPIEDADES DE LA CLASE
	// =============================================================================================== //
	private $nro_actuacion        = '';
	private $grupo_representantes = '';
	private $tipo_representacion  = '';
	private $tipo_pedido          = '';
	private $organismo            = '';
	private $fecha_reunion        = '';
	private $file_name            = '';
	private $file_path            = '';
	private $resumen_reunion      = '';
	private $participantes_externos = '';
	private $documento_adjunto = '';
	private $asunto = '';
	private $compromisos_asumidos = '';
	private $fecha_prox_reunion = '';
	private $asunto_futuro = '';
	private $comentarios_adicionales = '';

	// =============================================================================================== //
	// CONSTRUCTOR DESPARAMETRIZADO
	// =============================================================================================== //
	function __construct() {
		$this->nro_actuacion        = '';
		$this->grupo_representantes = '';
		$this->tipo_representacion  = '';
		$this->tipo_pedido          = '';
		$this->organismo            = '';
		$this->fecha_reunion        = '';
		$this->file_name            = '';
		$this->file_path            = '';
		$this->resumen_reunion      = '';
		$this->participantes_externos = '';
		$this->documento_adjunto = '';
		$this->asunto = '';
		$this->compromisos_asumidos = '';
		$this->fecha_prox_reunion = '';
		$this->asunto_futuro = '';
		$this->comentarios_adicionales = '';
	}

	// =============================================================================================== //
	// SETTERS
	// =============================================================================================== //
	private function set_nro_actuacion($var) {
		$this->nro_actuacion = $var;
	}

	private function set_grupo_representantes($var) {
		$this->grupo_representantes = $var;
	}

	private function set_tipo_representancion($var) {
		$this->tipo_representacion = $var;
	}

	private function set_tipo_pedido($var) {
		$this->tipo_pedido = $var;
	}

	private function set_organismo($var) {
		$this->organismo = $var;
	}

	private function set_fecha_reunion($var) {
		$this->fecha_reunion = $var;
	}

	private function set_file_name($var) {
		$this->file_name = $var;
	}

	private function set_file_path($var) {
		$this->file_path = $var;
	}

	private function set_resumen_reunion($var) {
		$this->resumen_reunion = $var;
	}

	private function set_participantes_externos($var){
		$this->participantes_externos = $var;
	}

	private function set_documento_adjunto($var){
		$this->documento_adjunto = $var;
	}

	private function set_asunto($var){
		$this->asunto = $var;
	}

	private function set_compromisos_asumidos($var){
		$this->compromisos_asumidos = $var;
	}

	private function set_fecha_prox_reunion($var){
		$this->fecha_prox_reunion = $var;
	}

	private function set_asunto_futuro($var){
		$this->asunto_futuro = $var;
	}

	private function set_comentarios_adicionales($var){
		$this->comentarios_adicionales = $var;
	}

	// =============================================================================================== //
	// GETTERS
	// =============================================================================================== //
	private function get_nro_actuacion($var) {
		return $this->nro_actuacion = $var;
	}

	private function get_grupo_representantes($var) {
		return $this->grupo_representantes = $var;
	}

	private function get_tipo_representacion($var) {
		return $this->tipo_representacion = $var;
	}

	private function get_tipo_pedido($var) {
		return $this->tipo_pedido = $var;
	}

	private function get_organismo($var) {
		return $this->organismo = $var;
	}

	private function get_fecha_reunion($var) {
		return $this->fecha_reunion = $var;
	}

	private function get_file_name($var) {
		return $this->file_name = $var;
	}

	private function get_file_path($var) {
		return $this->file_path = $var;
	}

	private function get_resumen_reunion($var) {
		return $this->resumen_reunion = $var;
	}

	private function get_participantes_externos($var){
		return $this->participantes_externos = $var;
	}

	private function get_documento_adjunto($var){
		return $this->documento_adjunto = $var;
	}

	private function get_asunto($var){
		return $this->asunto = $var;
	}

	private function get_compromisos_asumidos($var){
		return $this->compromisos_asumidos = $var;
	}

	private function get_fecha_prox_reunion($var){
		return $this->fecha_prox_reunion = $var;
	}

	private function get_asunto_futuro($var){
		return $this->asunto_futuro = $var;
	}

	private function get_comentarios_adicionales($var){
		return $this->comentarios_adicionales = $var;
	}

	// =============================================================================================== //
	// ========================================== METODOS ============================================ //
	// =============================================================================================== //

	/*
	 ** LISTAR PARITARIAS ACTIVAS
	 */
	public function listarParitarias($paritaria, $conn, $dbase) {

		if ($conn) {

			$fecha_actual = date('Y-m-d');
			$empty = "Sin Cargar";
			$empty_group = "Sin Designar";
			$empty_request = "Sin Determinar";
			$update_grupo = "Actualice el grupo";

			$sql = "select r.id, r.nro_actuacion, r.grupo_representantes, 
					ifnull(concat(g.representante_titular, '<br>', g.representante_suplente), 
							'Debe Actualizar Grupo') as representantes, r.tipo_representacion,
						r.tipo_pedido,
						r.fecha_reunion,
						r.organismo,						
						r.resumen_reunion,
						(select count(*) from avances_paritaria as a where a.paritaria_id = r.id) as cant_avances
						from representacion_paritarias as r 
						left join grupo_representantes as g on g.nombre_grupo = r.grupo_representantes";

			mysqli_select_db($conn, $dbase);
			$query = mysqli_query($conn, $sql);
			//mostramos fila x fila
			$count = 0;
			echo '<div class="container-fluid">
                        <div class="jumbotron">
                        <h2><img src="../../icons/actions/agreement_representation.png"  class="img-reponsive img-rounded"> Representación Paritarias [ Listado de Representaciones ]</h2><hr>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-primary btn-sm" name="launch_paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Menú Paritarias</button>
                        </form><hr>';

			echo "<table class='display compact' style='width:100%' id='paritariasTable'>";
			echo "<thead>
                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Nro. Actuación</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Nombre Grupo</span></th>
                        
                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Representantes</span></th>
                        
                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Tipo Representación</span></th>
                        
                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Tipo Pedido</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Fecha Alta</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Organismo</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Referencia/Descripción</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Acciones</span></th>
                        </thead>";

			while ($fila = mysqli_fetch_array($query)) {
				// Listado normal
				echo "<tr>";
				if($paritaria->get_nro_actuacion($fila['nro_actuacion']) != ""){
					echo "<td align=center>".$paritaria->get_nro_actuacion($fila['nro_actuacion'])."</td>";
				}else{
					echo "<td align=center><span class='label label-warning'><strong>".$empty."</strong></span></td>";
				}

				echo "<td align=center>".$paritaria->get_grupo_representantes($fila['grupo_representantes'])."</td>";
				echo "<td align=center>".$paritaria->get_grupo_representantes($fila['representantes'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_representacion($fila['tipo_representacion'])."</td>";
				
				if($paritaria->get_tipo_pedido($fila['tipo_pedido']) != ""){
					echo "<td align=center>".$paritaria->get_tipo_pedido($fila['tipo_pedido'])."</td>";
				}else{
					echo "<td align=center><span class='label label-danger'><strong>".$empty_request."</strong></span></td>";
				}

				if ($paritaria->get_fecha_reunion($fila['fecha_reunion']) == $fecha_actual) {
					echo "<td align=center><span class='label label-primary'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</span></td>";
				} else if ($paritaria->get_fecha_reunion($fila['fecha_reunion']) > $fecha_actual) {
					echo "<td align=center><span class='label label-success'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</span></td>";
				} else if ($paritaria->get_fecha_reunion($fila['fecha_reunion']) < $fecha_actual) {
					echo "<td align=center><span class='label label-danger'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</span></td>";
				}

				echo "<td align=center>".$paritaria->get_organismo($fila['organismo'])."</td>";
				echo "<td align=center>".$paritaria->get_resumen_reunion($fila['resumen_reunion'])."</td>";
				echo "<td align=center class='text-nowrap'>";

				echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >

                                <div class="btn-group">
		                         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		                            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Acciones <span class="caret"></span></button>
		                        <ul class="dropdown-menu dropdown-menu-right">
		                        
		                          <li><button type="submit" class="btn btn-default btn-sm btn-block" name="edit_paritaria">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button></li>
		                          
		                          <li><button type="submit" class="btn btn-default btn-sm btn-block" name="view_advance" data-toggle="tooltip" title="Cantidad Avances: '.$fila['cant_avances'].'">
                                <span class="glyphicon glyphicon-random" aria-hidden="true"></span> Avances Paritaria <span class="badge">'.$fila['cant_avances'].'</span></li>

                                <li><button type="submit" class="btn btn-default btn-sm btn-block" name="info_paritaria">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Información Extendida</button></li>
		                        
		                        </ul>
		                      </div>
		               </form>';
				echo "</td>";
				$count++;
			}

			echo '</table><hr>';

			echo '<form action="#" method="POST">

                            <button type="submit" class="btn btn-success btn-sm" name="nueva_paritaria" data-toggle="tooltip" data-placement="bottom" title="Agregar Nuevo registro de Paritaria">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</button>

                            <button type="submit" class="btn btn-info btn-sm" name="busqueda_paritarias" data-toggle="tooltip" data-placement="bottom" title="Búsqueda Avanzada sobre Paritarias">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda Avanzada</button>

                            </form><hr>';

			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  <span class="badge badge-info">'.$count.'</span></div><hr>';
			echo '</div></div>';

		} else {
			echo 'Connection Failure...';
		}

		mysqli_close($conn);

	}// FIN DEL METODO LISTAR

	/*
	 ** LISTAR AVANCES PARITARIA
	 */
	public function listarAvancesParitaria($paritaria, $id, $conn, $dbase) {

		if ($conn) {

			$fecha_actual = date('Y-m-d');
			$empty = "Sin Cargar";

			$sql = "select a.id,
					   rp.nro_actuacion,
					   a.organismo,
					   a.tipo_representacion,
					   ifnull(concat(g.representante_titular, '<br>', g.representante_suplente, '<br>' ,g.primer_asesor, '<br>', g.segundo_asesor), 'Debe Actualizar Grupo') as representantes,
					   a.fecha_reunion,
					   a.resumen,
					   a.participantes_externos,
					   a.asunto,
					   a.compromiso_asumido,
					   a.documento_adjunto,
					   a.fecha_prox_reunion,
					   a.asunto_futuro,
					   a.comentario_adicional
					   from avances_paritaria as a
					   left join grupo_representantes as g on g.nombre_grupo = a.grupo
					   join representacion_paritarias as rp on a.paritaria_id  = rp.id 
					   where a.paritaria_id = '$id'";

			
			mysqli_select_db($conn, $dbase);
			$query = mysqli_query($conn, $sql);

			//mostramos fila x fila
			$count = 0;
			echo '<div class="container-fluid">
                        <div class="jumbotron">
                        <h2><img src="../../icons/actions/advance-process.png"  class="img-reponsive img-rounded"> Avances Paritaria</h2><hr>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-primary btn-sm" name="paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Volver a Paritarias</button>
                        </form><hr>';

			echo "<table class='display compact' style='width:100%' id='avancesParitariaTable'>";
			echo "<thead>
                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Nro. Actuación</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Representantes</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Tipo Representación</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Fecha Reunión</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Organismo</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Participantes Externos</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Asunto</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Compromisos Asumidos</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Documento Adjunto</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Fecha Próxima Reunión</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Asunto a Tratar</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Comentarios Adicionales</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-default'>Resumen</span></th>

                        <th class='text-nowrap text-center'>
                        <span class='label label-warning'>Acciones</span></th>
                        </thead>";

			while ($fila = mysqli_fetch_array($query)) {
				// Listado normal
				echo "<tr>";
				if($paritaria->get_nro_actuacion($fila['nro_actuacion']) != ""){
					echo "<td align=center id='nro_actuacion'>".$paritaria->get_nro_actuacion($fila['nro_actuacion'])."</td>";
				}else{
					echo "<td align=center id='nro_actuacion'><span class='label label-danger'>".$empty."</span></td>";
				}
				echo "<td align=center>".$paritaria->get_grupo_representantes($fila['representantes'])."</td>";
				
				echo "<td align=center>".$paritaria->get_tipo_representacion($fila['tipo_representacion'])."</td>";
				if ($paritaria->get_fecha_reunion($fila['fecha_reunion']) == $fecha_actual) {
					echo "<td align=center><span class='label label-info'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</span></td>";
				} else if ($paritaria->get_fecha_reunion($fila['fecha_reunion']) > $fecha_actual) {
					echo "<td align=center><span class='label label-success'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</span></td>";
				} else if ($paritaria->get_fecha_reunion($fila['fecha_reunion']) < $fecha_actual) {
					echo "<td align=center><span class='label label-danger'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</span></td>";
				}
				echo "<td align=center>".$paritaria->get_organismo($fila['organismo'])."</td>";
				echo "<td align=center>".$paritaria->get_participantes_externos($fila['participantes_externos'])."</td>";
				echo "<td align=center>".$paritaria->get_asunto($fila['asunto'])."</td>";
				echo "<td align=center>".$paritaria->get_compromisos_asumidos($fila['compromiso_asumido'])."</td>";
				echo "<td align=center>".$paritaria->get_documento_adjunto($fila['documento_adjunto'])."</td>";
				if($paritaria->get_fecha_prox_reunion($fila['fecha_prox_reunion']) == $fecha_actual){
					echo "<td align=center><span class='label label-info'>".$paritaria->get_fecha_prox_reunion($fila['fecha_prox_reunion'])."</span></td>";
				}else if($paritaria->get_fecha_prox_reunion($fila['fecha_prox_reunion']) > $fecha_actual){
					echo "<td align=center><span class='label label-success'>".$paritaria->get_fecha_prox_reunion($fila['fecha_prox_reunion'])."</span></td>";
				}else if($paritaria->get_fecha_prox_reunion($fila['fecha_prox_reunion']) < $fecha_actual){
					echo "<td align=center><span class='label label-danger'>".$paritaria->get_fecha_prox_reunion($fila['fecha_prox_reunion'])."</span></td>";
				}
				echo "<td align=center>".$paritaria->get_asunto_futuro($fila['asunto_futuro'])."</td>";
				echo "<td align=center>".$paritaria->get_comentarios_adicionales($fila['comentario_adicional'])."</td>";
				echo "<td align=center>".$paritaria->get_resumen_reunion($fila['resumen'])."</td>";
				echo "<td class='text-nowrap'>";
				echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >

                                <button type="submit" class="btn btn-default btn-sm" name="edit_advance_paritaria">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>


                        </form>';
				echo "</td>";
				$count++;
			}

			echo '</table><hr>';

			echo '<form action="#" method="POST">
                            <input type="hidden" id="id" name="id" value="'.$id.'" >

                            <button type="button" class="btn btn-success btn-sm" value="'.$id.'" onclick="callNewAdvanceParitaria(this.value);">
				          		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Avance</button>

                            <button type="submit" class="btn btn-info btn-sm" name="doc_adicional" data-toggle="tooltip" data-placement="right" title="Documentación Relacionada">
                                <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Documentación Relacionada</button>

                            </form><hr>';

			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong> <span class="badge badge-info">'.$count.'</span></div><hr>';
			echo '</div></div>';

		} else {
			echo 'Connection Failure...';
		}

		mysqli_close($conn);

	}// FIN DEL METODO LISTAR

	/*
	 ** LISTAR
	 */
	public function listarTipoRepresentacion($paritaria, $conn, $dbase) {

		if ($conn) {

			$sql = "select * from tipo_representacion";
			mysqli_select_db($conn, $dbase);
			$query = mysqli_query($conn, $sql);
			//mostramos fila x fila
			$count = 0;
			echo '<div class="container-fluid">
                        <div class="jumbotron">
                        <h2><img class="img-reponsive img-rounded" src="../../icons/categories/applications-engineering.png" /> Tipo de Representación </h2><hr>';

			echo "<table class='display compact' style='width:100%' id='tipoRepresentacionTable'>";
			echo "<thead>
                        <th class='text-nowrap text-center'>Tipo Representación</th>
                        <th class='text-nowrap text-center'>Acciones</th>
                        </thead>";

			while ($fila = mysqli_fetch_array($query)) {
				// Listado normal
				echo "<tr>";
				echo "<td align=center>".$paritaria->get_tipo_representacion($fila['descripcion'])."</td>";
				echo "<td class='text-nowrap' align=center>";
				echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >

                                <button type="submit" class="btn btn-default btn-sm" name="edit_tipo_representacion">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                        </form>';
				echo "</td>";
				$count++;
			}

			echo "</table>";
			echo "<hr>";
			echo '<form action="#" method="POST">

                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_tipo_representacion" data-toggle="tooltip" data-placement="right" title="Agregar Registro de Tipo Representación">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Registro</button>

                            </form><hr>';

			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  '.$count.'</div><hr>';
			echo '</div></div>';

		} else {
			echo 'Connection Failure...';
		}

		mysqli_close($conn);

	}// FIN DEL METODO LISTAR

	public function listarDocRelacionada($id, $conn, $dbase) {

		mysqli_select_db($conn, $dbase);
		$sql   = "select avances_paritaria.* , representacion_paritarias.nro_actuacion from avances_paritaria join representacion_paritarias on avances_paritaria.paritaria_id = representacion_paritarias.id where paritaria_id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row   = mysqli_fetch_assoc($query);

		$dir    = $row['files_path'].'/';
		$path   = substr($dir, 3);
		$path_b = substr($dir, 6);

		$actuacion = $row['nro_actuacion'];

		if ($filehandle = opendir($path)) {
			$list  = array();
			$count = 0;

			while (($file = readdir($filehandle)) !== FALSE) {

				if ($file != "." && $file != "..") {

					$list[] = $file;
					$count++;
				}

			}
		} else {
			echo '<br>no puedo entrar<br>';
		}

		closedir($filehandle);

		echo '<div class="container">
                <div class="jumbotron">
                <h2><img class="img-reponsive img-rounded" src="../../icons/actions/document-open-folder.png" /> Avances Paritarias [ Documentación Relacionada ] </h2><hr>

                <div class="row">
                <div class="col-sm-12">
                <div class="panel panel-primary">
                <div class="panel-heading">Nro. Actuación: <strong>'.$actuacion.'</strong></div>
                <div class="panel-body">
                     <div class="list-group">';

		for ($i = 0; $i < $count; $i++) {
			echo '<a class="list-group-item" href="../../actas_comision/download.php?file_name='.$list[$i].'&path='.$path_b.'" >'.($i+1).' - '.$list[$i].'</a>';
		}

		echo '</div>
                </div>
                <div class="panel-footer"><strong>Cantidad de Documentos:</strong> <span class="badge">'.$count.'</span></div>

             </div><br>

             <form action="#" method="POST">
                    <button type="submit" class="btn btn-primary btn-sm" name="paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Volver a Paritarias</button>
             </form>
             </div>
             </div>
             </div>
             </div>';

	}//FIN DE LA FUNCION

	/*
	 ** FORMULARIO DE CARGA DE TIPO DE REPRESENTACION
	 */
	public function formAltaTipoRepresentacion() {

		echo '<div class="container">
                <div class="jumbotron">
                <h3 align="center"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Tipo de Representación</h2><hr>
                <p align="center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Preste atención a los datos que recibe cada campo. <strong>Los Campos que muestran (*) son obligatorios</strong></p><hr>

                <div class="row">

                    <div class="col-sm-12" style="background-color:#f2f4f4; border: 2px solid black; border-radius: 5px;"><br>

                        <form id="fr_add_new_tipo_representacion_ajax" method="POST">

                        <div class="form-group">
                            <label for="descripcion">Descripción: (*)</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div><hr>

                        <button type="submit" class="btn btn-default btn-block" id="add_new_tipo_representacion">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/document-save.png" /> Guardar</button>
                        </form>
                        <br>
                    </div>

                </div>
                </div>
                </div>';
	}

	/*
	 ** FORMULARIO DE EDITAR DE TIPO DE REPRESENTACION
	 */
	public function formEditTipoRepresentacion($paritaria, $id, $conn, $dbase) {

		mysqli_select_db($conn, $dbase);
		$sql   = "select * from tipo_representacion where id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row   = mysqli_fetch_assoc($query);

		echo '<div class="container">
                <div class="jumbotron">
                <h3 align="center"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Tipo de Representación</h3><hr>
                <p align="center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Preste atención a los datos que recibe cada campo. <strong>Los Campos que muestran (*) son obligatorios</strong></p><hr>

                <div class="row">

                    <div class="col-sm-12" style="background-color:#f2f4f4; border: 2px solid black; border-radius: 5px;"><br>

                        <form id="fr_update_tipo_representacion_ajax" method="POST">
                        <input type="hidden" id="id" name="id" value="'.$id.'">

                        <div class="form-group">
                            <label for="descripcion">Descripción: (*)</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$row['descripcion'].'" required>
                        </div><hr>

                        <button type="submit" class="btn btn-default btn-block" id="update_tipo_representacion">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/document-save.png" /> Actualizar</button>
                        </form>
                        <br>
                    </div>

                </div>
                </div>';
	}

	/*
	 ** FORMULARIO DE CARGA DE UN NUEVO REGISTRO
	 */

	public function formAltaParitaria($conn, $dbase) {

		echo '<div class="container">
                <div class="jumbotron">
                <div class="alert alert-info">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/view-task.png" /> Alta Registro Paritaria</h3><hr>

                <form action="#" method="POST">
                    <button type="submit" class="btn btn-primary btn-sm" name="paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Volver a Paritarias</button>
                </form>

                </div><hr>



            <form id="fr_add_new_paritaria_ajax" method="POST" enctype="multipart/form-data">


            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="nro_actuacion">Nro. Actuación:</label>
                            <input type="text" class="form-control" id="nro_actuacion" name="nro_actuacion"
                                placeholder="Ingrese aquí el Nro. de GEDO o CCOO">
                        </div>

                        <div class="form-group">
                            <label for="grupo_representante">Grupo Representante</label>
                            <select class="form-control" id="grupo_representante" name="grupo_representante">
                            <option value="" disabled selected>Seleccionar</option>';

		if ($conn) {
			$query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
					echo '<option value="'.$valores[nombre_grupo].'">'.$valores[nombre_grupo].'</option>';
				}
			}
		}

		//mysqli_close($conn);

		echo '</select>
                            </div>


                        <div class="form-group">
                            <label for="tipo_representacion">Tipo Representación</label>
                            <select class="form-control" id="tipo_representacion" name="tipo_representacion">
                            <option value="" disabled selected>Seleccionar</option>';

		if ($conn) {
			$query = "SELECT descripcion FROM tipo_representacion order by descripcion ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
					echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
				}
			}
		}

		//mysqli_close($conn);

		echo '</select>
                            </div>

                         <div class="form-group">
                          <label for="tipo_pedido">Tipo Solicitud:</label>
                          <select class="form-control" id="tipo_pedido" name="tipo_pedido">
                            <option value="">Seleccionar</option>
                            <option value="Solicitud">Solicitud</option>
                            <option value="Ratificación">Ratificación</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="organismo">Organismo</label>
                            <select class="form-control" id="organismo" name="organismo" ed>
                            <option value="" disabled selected>Seleccionar</option>';

		if ($conn) {
			$query = "SELECT * FROM organismos order by descripcion ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
					echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
				}
			}
		}

		mysqli_close($conn);

		echo '</select>
                            </div>

                        <div class="form-group">
                            <label for="fecha_reunion">Fecha Alta:</label>
                            <input type="date" class="form-control" id="fecha_reunion" name="fecha_reunion">
                        </div>

                        <div class="form-group">
                            <label for="resumen_reunion">Descripción / Referencia:</label>
                            <textarea class="form-control" id="resumen_reunion" name="resumen_reunion" maxlength="1000" placeholder="Ingrese una breve Descripción o Referencia"></textarea>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="alert alert-success">
                                <label for="file">
                                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                        Seleccione Archivo GEDO o CCOO ingresado en Nro. Actuación:</label><hr>
                                <input type="file" id="myfile" name="myfile">
                            </div>
                        </div>
                    </div>


                </div>
                </div><br>

                <div class="alert alert-success">
                <button type="submit" class="btn btn-default btn-block" id="add_new_paritaria">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok.png" /> Aceptar</button>
                </div>
            </form>

            <div id="messageNewParitaria"></div>

            </div></div>';

	}

	/*
	 ** FORMULARIO DE CARGA DE UN NUEVO REGISTRO DE AVANCES PARITARIA
	 */

	public function formAltaAvancesParitaria($paritaria, $id, $conn, $dbase) {

		$actual_date = date('2017-1-01');
		$datetime = date('Y-m-d H:i:s');

		mysqli_select_db($conn, $dbase);
		$sql   = "select * from representacion_paritarias where id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row   = mysqli_fetch_assoc($query);

		echo '<div class="container">
                <div class="jumbotron">
                <div class="alert alert-info">
                <h3><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta Registro de Avances Paritaria</h3>
                </div><hr>


            <form id="fr_add_new_avance_paritaria_ajax" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="'.$id.'">

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                          <label for="nro_actuacion">Nro. Actuación:</label>
                          <input type="text" class="form-control" id="nro_actuacion" name="nro_actuacion"
                            value="'.$paritaria->get_nro_actuacion($row[nro_actuacion]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="grupo_representante">Grupo Representante:</label>
                          <input type="text" class="form-control" id="grupo_representantes" name="grupo_representantes"
                            value="'.$paritaria->get_grupo_representantes($row[grupo_representantes]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="tipo_representacion">Tipo Representación:</label>
                          <input type="text" class="form-control" id="tipo_representacion" name="tipo_representacion"
                            value="'.$paritaria->get_tipo_representacion($row[tipo_representacion]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="organismo">Organismo:</label>
                          <input type="text" class="form-control" id="organismo" name="organismo"
                            value="'.$paritaria->get_organismo($row[organismo]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="documento_adjunto">Documento Adjunto:</label>
                          <input type="text" class="form-control" id="documento_adjunto" name="documento_adjunto">
                        </div>

                        <div class="alert alert-success">
		                        <div class="form-group">
		                            <label for="file">Seleccione Archivo:</label>
		                            <input type="file" id="myfiles" name="myfiles[]" multiple="">
		                        </div>
	                    	</div>

                    </div>

                    
	                    <div class="col-sm-6">
	                    	
	                    	<div class="form-group">
	                            <label for="fecha_reunion">Fecha Reunión:</label>
	                            <input type="date" class="form-control" id="fecha_reunion" name="fecha_reunion">
	                        </div>

	                    	<div class="form-group">
	                            <label for="participantes_externos">Organismos Participantes:</label>
	                            <textarea class="form-control" id="participantes_externos" name="participantes_externos" maxlength="2000" placeholder="Ingrese los participantes de otros organismos en la reunión"></textarea>
	                        </div>

	                        <div class="form-group">
	                          <label for="asunto">Asunto:</label>
	                          <input type="text" class="form-control" id="asunto" name="asunto" maxlength="100" placeholder="Tema tratado en reunión">
	                        </div>

	                    	<div class="form-group">
	                            <label for="resumen_reunion">Resumen / Conclusiones de Reunión:</label>
	                            <textarea class="form-control" id="resumen" name="resumen" maxlength="2000" placeholder="Ingrese un breve Resúmen de la Reunión"></textarea>
	                        </div>

	                        <div class="form-group">
	                            <label for="compromisos_asumidos">Compromisos Asumidos:</label>
	                            <textarea class="form-control" id="compromisos_asumidos" name="compromisos_asumidos" maxlength="2000" placeholder="Ingrese un breve Resúmen de los Compromisos Pactados"></textarea>
	                        </div>

	                        <div class="form-group">
	                            <label for="fecha_prox_reunion">Fecha Próxima Reunión:</label>
	                            <input type="date" class="form-control" id="fecha_prox_reunion" name="fecha_prox_reunion">
	                        </div>

	                        <div class="form-group">
	                            <label for="asunto_futuro">Asunto a Tratar:</label>
	                            <input type="text" class="form-control" id="asunto_futuro" name="asunto_futuro">
	                        </div>

	                        <div class="form-group">
	                            <label for="comentarios_adicionales">Comentarios Adicionales:</label>
	                            <textarea class="form-control" id="comentarios_adicionales" name="comentarios_adicionales" maxlength="2000" placeholder="Ingrese comentarios adicionales"></textarea>
	                        </div>

	                	</div>


                </div>
                </div><br>

                <div class="alert alert-success">
                <button type="submit" class="btn btn-default btn-block" id="add_new_avance_paritaria">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
                </div>
            </form>

            <div id="messageNewAvanceParitaria"></div>

            </div></div>';

	}

	/*
	 ** FORMULARIO DE CARGA DE UN NUEVO REGISTRO DE AVANCES PARITARIA
	 */

	public function formEditarAvancesParitaria($paritaria, $id, $conn, $dbase) {

		mysqli_select_db($conn, $dbase);
		$sql   = "select * from avances_paritaria where id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row   = mysqli_fetch_assoc($query);

		echo '<div class="container">
                <div class="jumbotron">
                <div class="alert alert-info">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit-sign.png" /> Editar Registro de Avances Paritaria</h3>
                </div><hr>
                <form action="#" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Volver a Paritarias</button>
                </form><hr>



            <form id="fr_update_avance_paritaria_ajax" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="'.$id.'">
            <input type="hidden" id="paritaria_id" name="paritaria_id" value="'.$row[paritaria_id].'">

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">


                        <div class="form-group">
                          <label for="grupo_representante">Grupo Representante:</label>
                          <input type="text" class="form-control" id="grupo_representantes" name="grupo_representantes"
                            value="'.$paritaria->get_grupo_representantes($row[grupo]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="tipo_representacion">Tipo Representación:</label>
                          <input type="text" class="form-control" id="tipo_representacion" name="tipo_representacion"
                            value="'.$paritaria->get_tipo_representacion($row[tipo_representacion]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="organismo">Organismo:</label>
                          <input type="text" class="form-control" id="organismo" name="organismo"
                            value="'.$paritaria->get_organismo($row[organismo]).'" readonly>
                        </div>

                        <div class="form-group">
                          <label for="documento_adjunto">Documento Adjunto:</label>
                          <input type="text" class="form-control" id="documento_adjunto" name="documento_adjunto"
                          value="'.$paritaria->get_documento_adjunto($row[documento_adjunto]).'" readonly>
                        </div>

                        <div class="alert alert-success">
		                        <div class="form-group">
		                            <label for="file">Seleccione Archivo:</label>
		                            <input type="file" id="myfiles" name="myfiles[]" multiple="">
		                        </div>
	                    	</div>

                    </div>

                    
	                    <div class="col-sm-6">
	                    	
	                    	<div class="form-group">
	                            <label for="fecha_reunion">Fecha Reunión:</label>
	                            <input type="date" class="form-control" id="fecha_reunion" name="fecha_reunion" value="'.$paritaria->get_fecha_reunion($row[fecha_reunion]).'">
	                        </div>

	                    	<div class="form-group">
	                            <label for="`participantes_externos">Organismos Participantes:</label>
	                            <textarea class="form-control" id="participantes_externos" name="participantes_externos" maxlength="2000" placeholder="Ingrese los participantes de otros organismos en la reunión">'.$paritaria->get_participantes_externos($row[participantes_externos]).'</textarea>
	                        </div>

	                        <div class="form-group">
	                          <label for="asunto">Asunto:</label>
	                          <input type="text" class="form-control" id="asunto" name="asunto" maxlength="100" value="'.$paritaria->get_asunto($row[asunto]).'" placeholder="Tema tratado en reunión">
	                        </div>

	                    	<div class="form-group">
	                            <label for="resumen_reunion">Resumen / Conclusiones de Reunión:</label>
	                            <textarea class="form-control" id="resumen" name="resumen" maxlength="2000" placeholder="Ingrese un breve Resúmen de la Reunión">'.$paritaria->get_resumen_reunion($row[resumen]).'</textarea>
	                        </div>

	                        <div class="form-group">
	                            <label for="compromisos_asumidos">Compromisos Asumidos:</label>
	                            <textarea class="form-control" id="compromisos_asumidos" name="compromisos_asumidos" maxlength="2000" placeholder="Ingrese un breve Resúmen de los Compromisos Pactados">'.$paritaria->get_compromisos_asumidos($row[compromiso_asumido]).'</textarea>
	                        </div>

	                        <div class="form-group">
	                            <label for="fecha_prox_reunion">Fecha Próxima Reunión:</label>
	                            <input type="date" class="form-control" id="fecha_prox_reunion" name="fecha_prox_reunion" value="'.$paritaria->get_fecha_prox_reunion($row[fecha_prox_reunion]).'">
	                        </div>

	                        <div class="form-group">
	                            <label for="asunto_futuro">Asunto a Tratar:</label>
	                            <input type="text" class="form-control" id="asunto_futuro" name="asunto_futuro"
	                            	value="'.$paritaria->get_asunto_futuro($row[asunto_futuro]).'">
	                        </div>

	                        <div class="form-group">
	                            <label for="comentarios_adicionales">Comentarios Adicionales:</label>
	                            <textarea class="form-control" id="comentarios_adicionales" name="comentarios_adicionales" maxlength="2000" placeholder="Ingrese comentarios adicionales">'.$paritaria->get_comentarios_adicionales($row[comentario_adicional]).'</textarea>
	                        </div>

	                	</div>


                </div>
                </div><br>

                <div class="alert alert-success">
                <button type="submit" class="btn btn-default btn-block" id="update_avance_paritaria">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/view-refresh.png" /> Actualizar</button>
                </div>
            </form>

            <div id="messageUpdateAvanceParitaria"></div>

            </div></div>';

	}

	public function formEditParitaria($id, $conn, $dbase) {

		mysqli_select_db($conn, $dbase);
		$sql   = "select * from representacion_paritarias where id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row   = mysqli_fetch_assoc($query);

		echo '<div class="container">
                <div class="jumbotron">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit-sign.png" /> Editar Representación Paritaria</h3><hr>
                <form action="#" method="POST">
                    <button type="submit" class="btn btn-default btn-sm" name="paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Volver a Paritarias</button>
                </form><hr>

            <form id="fr_update_paritaria_ajax" method="POST">
            <input type="hidden" id="id" name="id" value="'.$id.'">


            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="nro_actuacion">Nro. Actuación:</label>
                            <input type="text" class="form-control" id="nro_actuacion" name="nro_actuacion"
                                value="'.$row['nro_actuacion'].'" required>
                        </div>

                        <div class="form-group">
                            <label for="grupo_representante">Grupo Representante</label>
                            <select class="form-control" id="grupo_representante" name="grupo_representante" required>
                            <option value="" disabled selected>Seleccionar</option>';

		if ($conn) {
			$query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
					echo '<option value="'.$valores[nombre_grupo].'" '.("'$valores[nombre_grupo]'" == "'$row[grupo_representantes]'"?"selected":"").'>'.$valores[nombre_grupo].'</option>';
				}
			}
		}

		//mysqli_close($conn);

		echo '</select>
                            </div>

                        <div class="form-group">
                            <label for="tipo_representacion">Tipo Representación</label>
                            <select class="form-control" id="tipo_representacion" name="tipo_representacion" required>
                            <option value="" disabled selected>Seleccionar</option>';

		if ($conn) {
			$query = "SELECT descripcion FROM tipo_representacion order by descripcion ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
					echo '<option value="'.$valores[descripcion].'" '.("'$valores[descripcion]'" == "'$row[tipo_representacion]'"?"selected":'').'>'.$valores[descripcion].'</option>';
				}
			}
		}

		//mysqli_close($conn);

		echo '</select>
                            </div>

                        <div class="form-group">
                          <label for="tipo_pedido">Tipo Solicitud:</label>
                          <select class="form-control" id="tipo_pedido" name="tipo_pedido">
                            <option value="">Seleccionar</option>;
                            <option value="Solicitud" '.($row['tipo_pedido'] == "Solicitud"?"selected":'').'>Solicitud</option>
                            <option value="Ratificación" '.($row['tipo_pedido'] == "Ratificaación"?"selected":'').'>Ratificación</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="organismo">Organismo</label>
                            <select class="form-control" id="organismo" name="organismo" required>
                            <option value="" disabled selected>Seleccionar</option>';

		if ($conn) {
			$query = "SELECT * FROM organismos order by descripcion ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
					echo '<option value="'.$valores[descripcion].'" '.("'$valores[descripcion]'" == "'$row[organismo]'"?"selected":"").'>'.$valores[descripcion].'</option>';
				}
			}
		}

		mysqli_close($conn);

		echo '</select>
                            </div>

                        <div class="form-group">
                            <label for="fecha_reunion">Fecha Reunión:</label>
                            <input type="date" class="form-control" id="fecha_reunion" name="fecha_reunion" value="'.$row['fecha_reunion'].'" required>
                        </div>

                        <div class="form-group">
                            <label for="resumen_reunion">Descripción:</label>
                            <textarea class="form-control" id="resumen_reunion" name="resumen_reunion" maxlength="1000" placeholder="Ingrese un breve Resúmen de la Reunión" required>'.$row['resumen_reunion'].'</textarea>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="alert alert-success">
                                <label for="file">
                                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                        Seleccione Archivo GEDO o CCOO ingresado en Nro. Actuación:</label><hr>
                                <input type="file" id="myfile" name="myfile">
                            </div>
                        </div>
                    </div>


                    
                </div>
                </div><hr>

                <button type="submit" class="btn btn-default btn-block" id="update_paritaria" name="update_paritaria">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/view-refresh.png" /> Actualizar</button>
            </form>

            </div></div>';

	}

	// INFORMACION EXTENDIDA
	public function infoParitaria($paritaria, $id, $conn, $dbase) {

		$sql = "select * from representacion_paritarias where id = '$id'";
		mysqli_select_db($conn, $dbase);
		$query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($query)) {
			$nro_actuacion        = $row['nro_actuacion'];
			$grupo_representantes = $row['grupo_representantes'];
			$tipo_representacion  = $row['tipo_representacion'];
			$tipo_pedido          = $row['tipo_pedido'];
			$organismo            = $row['organismo'];
			$fecha_reunion        = $row['fecha_reunion'];
			$resumen_reunion      = $row['resumen_reunion'];
			$archivo              = $row['file_name'];
		}

		$sql_1   = "select * from grupo_representantes where nombre_grupo = '$grupo_representantes'";
		$query_1 = mysqli_query($conn, $sql_1);
		while ($row_1 = mysqli_fetch_array($query_1)) {
			$rep_titular  = $row_1['representante_titular'];
			$rep_suplente = $row_1['representante_suplente'];
			$asesor_1     = $row_1['primer_asesor'];
			$asesor_2     = $row_1['segundo_asesor'];
		}


		$sql_2 = "select a.id,
					   rp.nro_actuacion,
					   a.organismo,
					   a.tipo_representacion,
					   ifnull(concat(g.representante_titular, '<br>', g.representante_suplente, '<br>' ,g.primer_asesor, '<br>', g.segundo_asesor), 'Debe Actualizar Grupo') as representantes,
					   a.fecha_reunion,
					   a.resumen,
					   a.participantes_externos,
					   a.asunto,
					   a.compromiso_asumido,
					   a.fecha_prox_reunion,
					   a.comentario_adicional
					   from avances_paritaria as a
					   left join grupo_representantes as g on g.nombre_grupo = a.grupo
					   join representacion_paritarias as rp on a.paritaria_id  = rp.id 
					   where a.paritaria_id = '$id'";

			
			mysqli_select_db($conn, $dbase);
			$query_2 = mysqli_query($conn, $sql_2);
			$count = 1;


		echo '<div class="container-fluid">
            <div class="jumbotron">
             <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseA">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/arrow-down-double.png" /> Información Extendida</a>
                    </h4>
                </div>
                <div id="collapseA" class="panel-collapse collapse-in">
                    <ul class="list-group">
                    <li class="list-group-item"><span class="label label-default"><strong>Nro. Actuación:</strong></span> '.$paritaria->get_nro_actuacion($nro_actuacion).'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Grupo:</strong></span> '.$paritaria->get_grupo_representantes($grupo_representantes).'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Representante Titular:</strong></span> '.$rep_titular.'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Representante Suplente:</strong></span> '.$rep_suplente.'</li>';
		if (($asesor_1 != '') && ($asesor_2 != '')) {
			echo '<li class="list-group-item"><span class="label label-default"><strong>Primer Asesor:</strong></span> '.$asesor_1.'</li>
                          <li class="list-group-item"><span class="label label-default"><strong>Segundo Asesor:</strong></span> '.$asesor_2.'</li>';
		}
		echo '<li class="list-group-item"><span class="label label-default"><strong>Tipo Representacion:</strong></span> '.$paritaria->get_tipo_representacion($tipo_representacion).'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Tipo Pedido:</strong></span> '.$paritaria->get_tipo_pedido($tipo_pedido).'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Organismo:</strong></span> '.$paritaria->get_organismo($organismo).'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Fecha Alta:</strong></span> '.$paritaria->get_fecha_reunion($fecha_reunion).'</li>
                    <li class="list-group-item"><span class="label label-default"><strong>Descripción / Referencia:</strong></span> '.$paritaria->get_resumen_reunion($resumen_reunion).'</li>

                    
                    </ul>

                    <div class="panel-group" id="accordion">
					    <div class="panel panel-primary">
					      <div class="panel-heading">
					        <h4 class="panel-title" align=center>
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapseB">
					          	<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Avances</a>
					        </h4>
					      </div>
					      <div id="collapseB" class="panel-collapse collapse">
					        <div class="panel-body">';

					          while($row_2 = mysqli_fetch_array($query_2)){
					          
					          echo '<div class="panel panel-default">
							          <div class="panel-heading">
							            <h4 class="panel-title">
							              <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$count.'"><span class="label label-default"><strong>Fecha Reunión:</strong></span> <span class="label label-info">'.$row_2['fecha_reunion'].'</span></a>
							            </h4>
							          </div>
					          		<div id="collapse'.$count.'" class="panel-collapse collapse in">
							            <div class="panel-body">

							            <li class="list-group-item"><span class="label label-default"><strong>Asunto:</strong></span> '.$row_2['asunto'].'</li>
							            <li class="list-group-item"><span class="label label-default"><strong>Representantes Externos:</strong></span> '.$row_2['participantes_externos'].'</li>
							            <li class="list-group-item"><span class="label label-default"><strong>Compromiso Asumido:</strong></span> '.$row_2['compromiso_asumido'].'</li>
							            <li class="list-group-item"><span class="label label-default"><strong>Comentario Adicional:</strong></span> '.$row_2['comentario_adicional'].'</li>
							            <li class="list-group-item"><span class="label label-default"><strong>Resumen:</strong></span> '.$row_2['resumen'].'</li>
							            <li class="list-group-item list-group-item-info"><span class="label label-default"><strong>Fecha Próxima Reunión:</strong></span> <span class="label label-warning">'.$row_2['fecha_prox_reunion'].'</span></li>

							            </div>
							          </div>
							        </div>';
							   $count++;
							}


					        
					        echo '</div>
					      </div>
					    </div>
					    
					    
					    
					  </div>

                    <div class="panel-footer">

                        <form action="main.php" method="POST">
                                <button type="submit" class="btn btn-default btn-sm btn-block" name="paritarias">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Volver a Paritarias</button>
                        </form><br>

                        
                        <a href="../lib/informes/print.php?file=print_informe_paritaria.php&id='.$id.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Informe</button></a><br>';

		if ($paritaria->get_file_name($archivo) == '') {

			echo '<form action="main.php" method="POST">

                              <input type="hidden" name="id" value="'.$id.'">

                                <button type="submit" class="btn btn-warning btn-sm btn-block" name="upload_file" data-toggle="tooltip" data-placement="left" title="Subir Archivo">
                                <span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Subir</button>

                              </form>';

		} else {
			echo '<a href="../normas/download.php?file_name='.$paritaria->get_file_name($archivo).'&tipo_archivo=2" data-toggle="tooltip" data-placement="top" title="Ver o Descargar Archivo '.$paritaria->get_file_name($archivo).'"><button type="button" class="btn btn-default btn-sm btn-block"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver Documento</button></a>';
		}

		'</div>
                </div>
                </div>
            </div>
            </div></div>';
	}

	/*
	 ** FUNCION DE BUSQUEDA AVANZADA
	 */
	public function formAdvanceSearchParitarias($conn, $dbase) {

		echo '<div class="container">
            <div class="jumbotron">
            <h3><img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</h3><hr>


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

		if ($conn) {
			$query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
			mysqli_select_db($conn, $dbase);
			$res = mysqli_query($conn, $query);

			if ($res) {
				while ($valores = mysqli_fetch_array($res)) {
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

            </div>';
	}

	/*
	 ** RESULTADO DE BUSQUEDA AVANZADA
	 */
	public function searchAdvanceParitariasResults($paritaria, $grupo_representante, $fecha_desde, $fecha_hasta, $conn, $dbase) {

		if (($grupo_representante != '') && ($fecha_desde != '') && ($fecha_hasta != '')) {

			$sql = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante' and fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
			mysqli_select_db($conn, $dbase);
			$query = mysqli_query($conn, $sql);

			//mostramos fila x fila
			$count = 0;
			echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h2><hr>';

			echo "<table class='display compact' style='width:100%' id='myTable'>";
			echo "<thead>
            <th class='text-nowrap text-center'>Nro. Actuación</th>
		    <th class='text-nowrap text-center'>Grupo Representante</th>
		    <th class='text-nowrap text-center'>Tipo Representacion</th>
            <th class='text-nowrap text-center'>Tipo Pedido</th>
            <th class='text-nowrap text-center'>Fecha Raunión</th>
            <th class='text-nowrap text-center'>Resúmen Reunión</th>
            <th>&nbsp;</th>
            </thead>";

			while ($fila = mysqli_fetch_array($query)) {
				// Listado normal
				echo "<tr>";
				echo "<td align=center>".$paritaria->get_get_nro_actuacion($fila['nro_actuacion'])."</td>";
				echo "<td align=center>".$paritaria->get_grupo_representantes($fila['grupo_representantes'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_representacion($fila['tipo_representacion'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_pedido($fila['tipo_pedido'])."</td>";
				echo "<td align=center>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</td>";
				echo "<td align=center>".$paritaria->get_resumen_reunion($fila['resumen_reunion'])."</td>";
				echo "<td class='text-nowrap'>";
				echo '</td>';
				$count++;
			}

			echo "</table>";
			echo "<hr>";
			echo '<a href="../lib/informes/print_search_officio.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>

              <form action="#" method="POST">

                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>

              </form><hr>';
			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  '.$count.'</div>';
			echo '</div></div>';

		}

		if (($grupo_representante != '') && ($fecha_desde == '') && ($fecha_hasta == '')) {

			$sql_1 = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante'";
			mysqli_select_db($conn, $dbase);
			$query_1 = mysqli_query($conn, $sql_1);

			//mostramos fila x fila
			$count = 0;
			echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h2><hr>';

			echo "<table class='display compact' style='width:100%' id='myTable'>";
			echo "<thead>
            <th class='text-nowrap text-center'>Nro. Actuación</th>
		    <th class='text-nowrap text-center'>Grupo Representante</th>
		    <th class='text-nowrap text-center'>Tipo Representacion</th>
            <th class='text-nowrap text-center'>Tipo Pedido</th>
            <th class='text-nowrap text-center'>Fecha Raunión</th>
            <th class='text-nowrap text-center'>Resúmen Reunión</th>
            <th>&nbsp;</th>
            </thead>";

			while ($fila_1 = mysqli_fetch_array($query_1)) {
				// Listado normal
				echo "<tr>";
				echo "<td align=center>".$paritaria->get_nro_actuacion($fila_1['nro_actuacion'])."</td>";
				echo "<td align=center>".$paritaria->get_grupo_representantes($fila_1['grupo_representantes'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_representacion($fila_1['tipo_representacion'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_pedido($fila_1['tipo_pedido'])."</td>";
				echo "<td align=center>".$paritaria->get_fecha_reunion($fila_1['fecha_reunion'])."</td>";
				echo "<td align=center>".$paritaria->get_resumen_reunion($fila_1['resumen_reunion'])."</td>";
				echo "<td class='text-nowrap'>";
				echo '</td>';
				$count++;
			}

			echo "</table>";
			echo "<hr>";
			echo '<a href="../lib/informes/print_search_officio.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>

              <form action="#" method="POST">

                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>

              </form><hr>';
			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  '.$count.'</div>';
			echo '</div>';

		}

		if (($grupo_representante == '') && ($fecha_desde != '') && ($fecha_hasta != '')) {

			$sql_2 = "SELECT * FROM representacion_paritarias WHERE fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
			mysqli_select_db($conn, $dbase);
			$query_2 = mysqli_query($conn, $sql_2);

			//mostramos fila x fila
			$count = 0;
			echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h2><hr>';

			echo "<table class='display compact' style='width:100%' id='myTable'>";
			echo "<thead>
            <th class='text-nowrap text-center'>Nro. Actuación</th>
		    <th class='text-nowrap text-center'>Grupo Representante</th>
		    <th class='text-nowrap text-center'>Tipo Representacion</th>
            <th class='text-nowrap text-center'>Tipo Pedido</th>
            <th class='text-nowrap text-center'>Fecha Raunión</th>
            <th class='text-nowrap text-center'>Resúmen Reunión</th>
            <th>&nbsp;</th>
            </thead>";

			while ($fila_2 = mysqli_fetch_array($query_2)) {
				// Listado normal
				echo "<tr>";
				echo "<td align=center>".$paritaria->get_nro_actuacion($fila_2['nro_actuacion'])."</td>";
				echo "<td align=center>".$paritaria->get_grupo_representantes($fila_2['grupo_representantes'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_representacion($fila_2['tipo_representacion'])."</td>";
				echo "<td align=center>".$paritaria->get_tipo_pedido($fila_2['tipo_pedido'])."</td>";
				echo "<td align=center>".$paritaria->get_fecha_reunion($fila_2['fecha_reunion'])."</td>";
				echo "<td align=center>".$paritaria->get_resumen_reunion($fila_2['resumen_reunion'])."</td>";
				echo "<td class='text-nowrap'>";
				echo '</td>';
				$count++;
			}

			echo "</table>";
			echo "<hr>";
			echo '<a href="../lib/informes/print_search_officio.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>

              <form action="#" method="POST">

                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>

              </form><hr>';
			echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  '.$count.'</div>';
			echo '</div>';

		}

	}

	// =========================================================================================================== //
	// ============================================== PERSISTENCIA A BASE ======================================== //
	// =========================================================================================================== //

	/*
	 ** PERSISTENCIA A BASE DE NUEVA PARITARIA
	 */
	public function addParitaria($paritaria, $nro_actuacion, $grupo_representante, $tipo_representacion, $tipo_pedido, $organismo, $fecha_reunion, $resumen_reunion, $myfile, $conn, $dbase) {

		if ($conn) {

			$targetDir = '../../../actas_comision/';
			$fileName  = $myfile;
			//$fileName = basename($_FILES["file"]["name"]);
			$dir            = opendir($targetDir);// SE ABRE EL DIECTORIO
			$targetFilePath = $targetDir.$fileName;

			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

			if (!empty($_FILES["myfile"]["name"])) {
				// Allow certain file formats
				$allowTypes = array('pdf');

				if (in_array($fileType, $allowTypes)) {

					// Upload file to server
					if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {

						closedir($dir);// SE CIERRA EL DIRECTORIO

						mysqli_select_db($conn, $dbase);

						$sql = "INSERT INTO representacion_paritarias ".
						"(nro_actuacion,
                                  grupo_representantes,
                                  tipo_representacion,
                                  tipo_pedido,
                                  organismo,
                                  fecha_reunion,
                                  resumen_reunion,
                                  file_name,
                                  file_path)".
						"VALUES ".
						"($paritaria->set_nro_actuacion('$nro_actuacion'),
							$paritaria->set_grupo_representantes('$grupo_representante'),
							$paritaria->set_tipo_representacion('$tipo_representacion'),
							$paritaria->set_tipo_pedido('$tipo_pedido'),
							$paritaria->set_organismo('$organismo'),
							$paritaria->set_fecha_reunion('$fecha_reunion'),
							$paritaria->set_resumen_reunion('$resumen_reunion'),
							$paritaria->set_file_name('$fileName'),
							$paritaria->set_file_path('$targetFilePath'))";

						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1;// registro insertado correctamente
							$success = '[Se ha guardado de manera exitosa resitro en la tabla Representación Paritarias]';
                			mysqlSuccessLogs($success);
							
						} else {
							echo -1;// hubo un problema al insertar el registro
							$myError = mysql_error($conn);
				            $error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Representación Paritarias]';
				            mysqlErrorLogs($error);
						}
					} else {
						echo 3;// no se ha podido subir el archivo
					}
				} else {
					echo 9;// solo se permiten archivos PDF
				}
			} else {
				echo 11;// no se ha seleccionado archivo
			}

		} else {
			echo 7;// no hay conexion
		}

	}// end funcion

	// =========================================================================================================== //
	/*
	 **  GUARDA A BASE LOS AVANCES DE UNA PARITARIA
	 */
	public function addAdvanceParitaria($paritaria, $id, $nro_actuacion, $organismo, $tipo_representacion, $grupo_representante, $fecha_reunion, $participantes_externos,$documento_adjunto,$asunto,$compromisos_asumidos,$fecha_prox_reunion,$asunto_futuro,$comentarios_adicionales,$resumen, $conn, $dbase) {
		$fileName = "mysql_error.log.txt";
		$color = '#008000';
		$hour = ' 00:00:00';
		$carpeta = '../../../actas_comision/'.$nro_actuacion;

		if (!file_exists($carpeta)) {

			mkdir($carpeta);
			chmod($carpeta, 0777);

			foreach ($_FILES["myfiles"]['tmp_name'] as $key => $tmp_name) {
				//condicional si el fichero existe

				if ($_FILES["myfiles"]["name"][$key]) {

					// Nombres de archivos temporales
					$archivonombre = $_FILES["myfiles"]["name"][$key];
					$fuente        = $_FILES["myfiles"]["tmp_name"][$key];

					$dir         = opendir($carpeta);
					$target_path = $carpeta.'/'.$archivonombre;//indicamos la ruta de destino de los archivos

					move_uploaded_file($fuente, $target_path);

					closedir($dir);//Cerramos la conexion con la carpeta destino
				}
			}

			$sql = "INSERT INTO avances_paritaria ".
			"(paritaria_id,
              organismo,
              tipo_representacion,
              grupo,
              fecha_reunion,
              resumen,
              participantes_externos,
              documento_adjunto,
              asunto,
              compromiso_asumido,
              fecha_prox_reunion,
              asunto_futuro,
              comentario_adicional,
              files_path)".
			"VALUES ".
			"('$id',
				$paritaria->set_organismo('$organismo'),
				$paritaria->set_tipo_representacion('$tipo_representacion'),
				$paritaria->set_grupo_representantes('$grupo_representante'),
				$paritaria->set_fecha_reunion('$fecha_reunion'),
				$paritaria->set_resumen_reunion('$resumen'),
				$paritaria->set_participantes_externos('$participantes_externos'),
				$paritaria->set_documento_adjunto('$documento_adjunto'),
				$paritaria->set_asunto('$asunto'),
				$paritaria->set_compromisos_asumidos('$compromisos_asumidos'),
				$paritaria->set_fecha_prox_reunion('$fecha_prox_reunion'),
				$paritaria->set_asunto_futuro('$asunto_futuro'),
				$paritaria->set_comentarios_adicionales('$comentarios_adicionales'),
				$paritaria->set_file_path('$carpeta')
			)";

			mysqli_select_db($conn, $dbase);
			$query = mysqli_query($conn, $sql);
			

			if ($query){

				$sql_1 = "select max(id) as id from avances_paritaria where paritaria_id = '$id'";
				mysqli_select_db($conn, $dbase);
				$query_1 = mysqli_query($conn,$sql_1);
				while($row = mysqli_fetch_array($query_1)){
					$advance_paritaria_id = $row['id'];
				}

				if($advance_paritaria_id != ''){

					$sql_2 = "INSERT INTO events ".
					 "(paritaria_id,
					   advance_paritaria_id,
					   title,
					   color,
					   start,
					   end)".
					 "VALUES ".
					 "('$id',
					   '$advance_paritaria_id',
					 	$paritaria->set_asunto_futuro('$asunto_futuro'),
					   '$color',
					    $paritaria->set_fecha_prox_reunion('$fecha_prox_reunion$hour'),
					    $paritaria->set_fecha_prox_reunion('$fecha_prox_reunion$hour')
					  )";

					$query_2 = mysqli_query($conn,$sql_2);

					if($query_2){
						echo 1;// avance insertadas correctamente
						$success = '[Se ha guardado de manera exitosa registro en la tabla Avances Paritaria]';
                		mysqlSuccessLogs($success);
					}else{
						echo -3; // no se pudo insertar el registro en calendario
						$file = fopen($fileName, 'w');
						$message = mysqli_error($conn);
			            fwrite($file, $sql_2);
			            fclose($file);
					}
				}else{
					echo -2;// no se pudo ejecutar la consulta sobre avances paritaria
				}
			} else {
				echo -1;// hubo un problema al intentar insertar los datos en avances paritaria
				$myError = mysqli_error($conn);
				$error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Avances Paritaria]';
				mysqlErrorLogs($error);

			}

		} else {

			foreach ($_FILES["myfiles"]['tmp_name'] as $key => $tmp_name) {
				//condicional si el fichero existe

				if ($_FILES["myfiles"]["name"][$key]) {

					// Nombres de archivos temporales
					$archivonombre = $_FILES["myfiles"]["name"][$key];
					$fuente        = $_FILES["myfiles"]["tmp_name"][$key];

					$dir         = opendir($carpeta);
					$target_path = $carpeta.'/'.$archivonombre;//indicamos la ruta de destino de los archivos

					move_uploaded_file($fuente, $target_path);

					closedir($dir);//Cerramos la conexion con la carpeta destino
				}
			}

			$sql = "INSERT INTO avances_paritaria ".
			"(paritaria_id,
              organismo,
              tipo_representacion,
              grupo,
              fecha_reunion,
              resumen,
              participantes_externos,
              documento_adjunto,
              asunto,
              compromiso_asumido,
              fecha_prox_reunion,
              asunto_futuro,
              comentario_adicional,
              files_path)".
			"VALUES ".
			"('$id',
				$paritaria->set_organismo('$organismo'),
				$paritaria->set_tipo_representacion('$tipo_representacion'),
				$paritaria->set_grupo_representantes('$grupo_representante'),
				$paritaria->set_fecha_reunion('$fecha_reunion'),
				$paritaria->set_resumen_reunion('$resumen'),
				$paritaria->set_participantes_externos('$participantes_externos'),
				$paritaria->set_documento_adjunto('$documento_adjunto'),
				$paritaria->set_asunto('$asunto'),
				$paritaria->set_compromisos_asumidos('$compromisos_asumidos'),
				$paritaria->set_fecha_prox_reunion('$fecha_prox_reunion'),
				$paritaria->set_asunto_futuro('$asunto_futuro'),
				$paritaria->set_comentarios_adicionales('$comentarios_adicionales'),
				$paritaria->set_file_path('$carpeta')
            )";

            
			mysqli_select_db($conn, $dbase);
			$query = mysqli_query($conn, $sql);
			if ($query){

				$sql_1 = "select max(id) as id from avances_paritaria where paritaria_id = '$id'";
				$query_1 = mysqli_query($conn,$sql_1);
				while($row = mysqli_fetch_array($query_1)){
					$advance_paritaria_id = $row['id'];
				}

				if($advance_paritaria_id != ''){

					$sql_2 = "INSERT INTO events ".
					 "(paritaria_id,
					   advance_paritaria_id,
					   title,
					   color,
					   start,
					   end)".
					 "VALUES ".
					 "('$id',
					   '$advance_paritaria_id',
					 	$paritaria->set_asunto_futuro('$asunto_futuro'),
					   '$color',
					    $paritaria->set_fecha_prox_reunion('$fecha_prox_reunion$hour'),
					    $paritaria->set_fecha_prox_reunion('$fecha_prox_reunion$hour')
					  )";

					$query_2 = mysqli_query($conn,$sql_2);

					if($query_2){
						echo 1;// avance insertadas correctamente
						$success = '[Se ha guardado de manera exitosa registro en la tabla Avances Paritaria]';
                		mysqlSuccessLogs($success);
					}else{
						echo -3; // no se pudo insertar el registro en calendario
						$file = fopen($fileName, 'w');
						$message = mysqli_error($conn);
			            fwrite($file, $sql_2);
			            fclose($file);
					}
				}else{
					echo -2;// no se pudo ejecutar la consulta sobre avances paritaria
				}
			} else {
				echo -1;// hubo un problema al intentar insertar los datos en avances paritaria
				$myError = mysqli_error($conn);
				$error = '[Se ha producido el error: ' .$myError. ' al intentar guardar en la tabla Avances Paritaria]';
				mysqlErrorLogs($error);

			}
		}

	}// END OF FUNCTION

	// =========================================================================================================== //

	/*
	 ** actualizar avance de paritaria
	 */
	public function updateAvanceParitaria($paritaria,$id,$paritaria_id,$fecha_reunion,$participantes_externos,$asunto,$compromisos_asumidos,$fecha_prox_reunion,$asunto_futuro,$comentarios_adicionales,$resumen,$conn,$dbase) {
		$fileName = "mysql_error.log.txt";
		$color = '#008000';
		$hour = ' 00:00:00';

		mysqli_select_db($conn, $dbase);
		$sql = "update avances_paritaria set 
				fecha_reunion = $paritaria->set_fecha_reunion('$fecha_reunion'),
				participantes_externos = $paritaria->set_participantes_externos('$participantes_externos'),
				asunto = $paritaria->set_asunto('$asunto'),
				compromiso_asumido = $paritaria->set_compromisos_asumidos('$compromisos_asumidos'),
				fecha_prox_reunion = $paritaria->set_fecha_reunion('$fecha_prox_reunion'),
				asunto_futuro = $paritaria->set_asunto_futuro('$asunto_futuro'),
				comentario_adicional = $paritaria->set_comentarios_adicionales('$comentarios_adicionales'), 
				resumen = $paritaria->set_resumen_reunion('$resumen') where id = '$id'";

		$sql_1 = "update events set
				  title = $paritaria->set_asunto_futuro('$asunto_futuro'),
				  color = '$color',
				  start = $paritaria->set_fecha_prox_reunion('$fecha_prox_reunion$hour'),
				  end = $paritaria->set_fecha_prox_reunion('$fecha_prox_reunion$hour') where advance_paritaria_id = '$id' and paritaria_id = '$paritaria_id'";
		
		$query_1 = mysqli_query($conn,$sql_1);

		$query = mysqli_query($conn, $sql);

		if ($query){
			
			if($query_1){
		
				echo 1;// actualizacion exitosa
				$success = '[Se ha actualizado de manera exitosa registro en la tabla Avances Paritaria con ID: ' .$id.']';
                mysqlSuccessLogs($success);
			}else{
				echo -2;//
				$file = fopen($fileName, 'w');
				$message = mysqli_error($conn);
	            fwrite($file, $sql_1);
	            fclose($file);
	            //chmod($file, 0777);
			}

		}else {
			echo -1;// no se pudo actualizar
			$file = fopen($fileName, 'w');
			$message = mysqli_error($conn);
            fwrite($file, $message);
            fclose($file);
            //chmod($file, 0777);
            $myError = mysqli_error($conn);
			$error = '[Se ha producido el error: ' .$myError. ' al intentar actualizar registro en la tabla Avances Paritaria con ID: ' .$id.']';
			mysqlErrorLogs($error);
		}

	}// END OF FUNCTION

	// =========================================================================================================== //

	public function addTipoRepresentacion($paritaria, $descripcion, $conn, $dbase) {

		if ($conn) {

			mysqli_select_db($conn, $dbase);

			$sql   = "select * from tipo_representacion where descripcion = '$descripcion'";
			$query = mysqli_query($conn, $sql);
			$rows  = mysqli_num_rows($query);

			if ($rows == 0) {

				$sql_1 = "insert into tipo_representacion ".
				"(descripcion)".
				"values ".
				"($paritaria->set_tipo_representacion('$descripcion'))";
				$query_1 = mysqli_query($conn, $sql_1);

				if ($query_1) {
					echo 1;
					$success = '[Se ha insertado de manera exitosa registro en la tabla Tipo Representación]';
                	mysqlSuccessLogs($success);
				} else {
					echo -1;
					$myError = mysql_error($conn);
					$error = '[Se ha producido el error: ' .$myError. ' al intentar insertar registro en la tabla Tipo Representación]';
					mysqlErrorLogs($error);
				}

			}if ($rows > 0) {
				echo 4;// registro existente
			}
		} else {
			echo 7;
		}

	}

	public function updateParitaria($paritaria,$id,$nro_actuacion,$grupo_representante,$tipo_representacion,$tipo_pedido,$organismo,$fecha_reunion,$resumen_reunion,$myfile,$conn,$dbase) {

		if ($conn) {

			$targetDir = '../../../actas_comision/';
			$fileName  = $myfile;
			//$fileName = basename($_FILES["file"]["name"]);
			$dir            = opendir($targetDir);// SE ABRE EL DIECTORIO
			$targetFilePath = $targetDir.$fileName;

			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

			if (!empty($_FILES["myfile"]["name"])) {
				// Allow certain file formats
				$allowTypes = array('pdf');

				if (in_array($fileType, $allowTypes)) {

					// Upload file to server
					if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {

						closedir($dir);// SE CIERRA EL DIRECTORIO

						mysqli_select_db($conn, $dbase);
						$sql = "update representacion_paritarias set
								nro_actuacion = $paritaria->set_nro_actuacion('$nro_actuacion'),
			                    grupo_representantes = $paritaria->set_grupo_representantes('$grupo_representante'),
			                    tipo_representacion = $paritaria->set_tipo_representacion('$tipo_representacion'),
			                    tipo_pedido = $paritaria->set_tipo_pedido('$tipo_pedido'),
			                    organismo = $paritaria->set_organismo('$organismo'),
			                    fecha_reunion = $paritaria->set_fecha_reunion('$fecha_reunion'),
			                    resumen_reunion = $paritaria->set_resumen_reunion('$resumen_reunion'),
			                    file_name = $paritaria->set_file_name('$fileName'),
								file_path = $paritaria->set_file_path('$targetFilePath')
			                    where id = '$id'";
						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1; // actualizacion ok
							$success = '[Se ha actualizado de manera exitosa registro en la tabla Representación Paritaria con ID: ' .$id.' ]';
                			mysqlSuccessLogs($success);
						} else {
							echo -1; // actualizacion error
							$myError = mysqli_error($conn);
							$error = '[Se ha producido el error: ' .$myError. ' al intentar actualizar registro en la tabla Representación Paritaria con ID: ' .$id.']';
							mysqlErrorLogs($error);
						}
					}else{
						echo 3;// no se ha podido subir el archivo
					}
				} else {
					echo 9;// solo se permiten archivos PDF
				}
			} else {
				
				mysqli_select_db($conn, $dbase);
				$sql = "update representacion_paritarias set
						nro_actuacion = $paritaria->set_nro_actuacion('$nro_actuacion'),
			            grupo_representantes = $paritaria->set_grupo_representantes('$grupo_representante'),
			            tipo_representacion = $paritaria->set_tipo_representacion('$tipo_representacion'),
			            tipo_pedido = $paritaria->set_tipo_pedido('$tipo_pedido'),
			            organismo = $paritaria->set_organismo('$organismo'),
			            fecha_reunion = $paritaria->set_fecha_reunion('$fecha_reunion'),
			            resumen_reunion = $paritaria->set_resumen_reunion('$resumen_reunion')
			            where id = '$id'";
						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo 1; // actualizacion ok
							$success = '[Se ha actualizado de manera exitosa registro en la tabla Representación Paritaria con ID: ' .$id. ' ]';
                			mysqlSuccessLogs($success);
						} else {
							echo -1; // actualizacion error
							$error = '[Se ha producido el error: ' .$myError. ' al intentar actualizar registro en la tabla Representación Paritaria con ID: ' .$id.' ]';
							mysqlErrorLogs($error);
						}
			}
		}else {
			echo 7; // sin conexion
		}

	}// END OF FUNCTION

	public function updateTipoRepresentacion($paritaria, $id, $descripcion, $conn, $dbase) {

		if ($conn) {

			mysqli_select_db($conn, $dbase);
			$sql = "update tipo_representacion set
                    descripcion = $paritaria->set_tipo_representacion('$descripcion')
                    where id = '$id'";

			$query = mysqli_query($conn, $sql);

			if ($query) {
				echo 1;
				$success = '[Se ha actualizado de manera exitosa registro en la tabla Tipo Representación con ID: ' .$id.']';
                			mysqlSuccessLogs($success);
			} else {
				echo -1;
				$myError = mysqli_error($conn);
				$error = '[Se ha producido el error: ' .$myError. ' al intentar actualizar registro en la tabla Tipo Representación con ID: ' .$id.']';
							mysqlErrorLogs($error);
			}

		} else {
			echo 7;
		}

	}

	public function calendarioParitarias($conn, $dbase) {

		$diaSem = array(0=> "",
			1               => "Lúnes",
			2               => "Martes",
			3               => "Miércoles",
			4               => "Jueves",
			5               => "Viernes",
			6               => "Sábado",
			7               => "Domingo");

		$semana = 1;
		$dia    = date('j');
		$mes    = date('m');
		$anio   = date('Y');

		echo "<div class='col-sm-4' align='center'>

                        <div class='panel panel-default'>
                            <div class='panel-heading'>


                                 <div class='form-group'>
                                    <label for='anio'>Selecione Año:</label>
                                    <select class='form-control' id='anio' name='cambio_anio' onchange='cambiarAnio(this.value);'>";

		for ($i = 2020; $i <= 2030; $i++) {

			echo '<option value="'.$i.'" '.($i == $anio?"selected":'').'>'.$i.'</option>';

		}

		echo '</select>
                                            </div>';

		echo "</div>
                        </div>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>

                                <div class='form-group'>
                                    <label for='mes'>Selecione Mes:</label>
                                    <select class='form-control' id='mes' name='cambio_mes' onchange='cambiarMes(this.value);'>";

		for ($i = 1; $i <= 12; $i++) {

			echo '<option value="'.$i.'" '.($i == $mes?"selected":'').'>'.$i.'</option>';

		}

		echo '</select></div>';

		echo "</div>
                        </div>

                        <br>
                    </div>";

		$nuevo_anio = '<div id="nuevo_anio" ></div>';
		//$n_anio = strVal($nuevo_anio);

		$nuevo_mes = '<div id="nuevo_mes"></div>';
		//$n_mes = strVal($nuevo_mes);

		echo $nuevo_anio;
		echo $nuevo_mes;

		$miAnio = intVal($anio);

		switch ($mes) {

			case '01':$mi_mes = 'Enero';
				$cant_dias       = 31;
				break;

			case '02':$mi_mes = 'Febrero';
				if ($miAnio%4 != 0) {
					$cant_dias = 28;
				} else if ($miAnio%4 == 0) {
					$cant_dias = 29;
				}
				break;

			case '03':$mi_mes = 'Marzo';
				$cant_dias       = 31;
				break;
			case '04':$mi_mes = 'Abril';
				$cant_dias       = 30;
				break;
			case '05':$mi_mes = 'Mayo';
				$cant_dias       = 31;
				break;
			case '06':$mi_mes = 'Junio';
				$cant_dias       = 30;
				break;
			case '07':$mi_mes = 'Julio';
				$cant_dias       = 31;
				break;
			case '08':$mi_mes = 'Agosto';
				$cant_dias       = 31;
				break;
			case '09':$mi_mes = 'Septiembre';
				$cant_dias       = 30;
				break;
			case '10':$mi_mes = 'Octubre';
				$cant_dias       = 31;
				break;
			case '11':$mi_mes = 'Noviembre';
				$cant_dias       = 30;
				break;
			case '12':$mi_mes = 'Diciembre';
				$cant_dias       = 31;
				break;
		}

		for ($i = 1; $i <= $cant_dias; $i++) {

			$diaSemana                       = date('N', strtotime(date(''.$anio.'-'.$mes.'').'-'.$i));
			$calendario[$semana][$diaSemana] = $i;

			if ($diaSemana == 7) {
				$semana++;
			}
		}

		echo "<div>

                <table class='table table-bordered' id='calendar-table'>
                    <thead>

                    <tr>";
		echo "<th class='text-nowrap text-center' id='mi_anio' style='background-color:#454545; color: white;' colspan=2>Año: $anio </th>
                                <th class='text-nowrap text-center' id='mi_mes' style='background-color:#454545; color: white;' colspan=5>Mes $mi_mes</th>";

		echo "</tr>

                    <tr>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[1] &nbsp;
</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[2] &nbsp;
</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[3] &nbsp;
</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[4] &nbsp;
</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[5] &nbsp;
</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[6] &nbsp;
</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[7] &nbsp;
</td>
                        </tr>
                    </thead>
                        <tbody>";

		foreach ($calendario as $dias) {

			echo "<tr>";
			for ($i = 1; $i <= 7; $i++) {

				if ($dias[$i] == $dia) {
					echo "<td align=center id='dia' style='background-color:#FFA07A; color: whi<th class='text-nowrap text-center' style='background-color:#454545; color: white;'>".$dias[$i]."</td>";
				} else if ($i == 7) {
					echo "<td align=center style='background-color: #FF5733; color: white;'>".$dias[$i]."</td>";
				} else if ($dias[$i] == '') {
					echo "<td align=center style='background-color:  #d5dbdb; color: white;'>".$dias[$i]."</td>";
				} else {
					echo "<td align=center>".$dias[$i]."</td>";
				}
			}

			echo "</tr>";
		}

		echo "</tbody>
                            </table>
                            <br/>
                            </div>";

	}// FIN FUNCION

	public function sumarAnio($anio) {
		return $anio+1;
	}

	public function restarAnio($anio) {
		return $anio-1;
	}

	/*
	 ** MAIN REPRESENTACION PARITARIAS
	 */
	public function launchRepresentacionParitarias(){

		echo '<div class="container">
				<div class="jumbotron">
				  <h2><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Gestión Paritarias</h2><hr>

				   <div class="panel-group">
				    <div class="panel panel-primary">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse1" data-toggle="tooltip" title="Click para expandir/contraer">
				          <img src="../../icons/actions/debug-run.png"  class="img-reponsive img-rounded">Gestionar</a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse in">
				        <ul class="list-group">
				        <form action="#" method="POST">
				          
				          <li class="list-group-item">
				          <button type="submit" class="btn btn-default btn-block" name="paritarias">
				          <img src="../../icons/actions/agreement_representation.png"  class="img-reponsive img-rounded"> Paritarias</button></li>
				          
				          <li class="list-group-item">
				          <button type="button" class="btn btn-default btn-block" onclick="callCalendar();">
				          <img src="../../icons/actions/view-calendar-month.png"  class="img-reponsive img-rounded"> Calendario</button></li>
				          
				          <li class="list-group-item">
				          <button type="submit" class="btn btn-default btn-block" name="representantes">
				          <img src="../../icons/actions/representantes.png"  class="img-reponsive img-rounded"> Representantes</button></li>
				          
				          <li class="list-group-item">
				          <button type="submit" class="btn btn-default btn-block" name="grupos">
				          <img src="../../icons/actions/partners.png"  class="img-reponsive img-rounded"></span> Grupos</button></li>
				                       
				                       
				          </form>
				          </li>
				        </ul>
				        <div class="panel-footer" align=center><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></div>
				        </form>
				      </div>
				    </div>
				  </div>
				</div>
				</div>';
	} // end of function


	


}// FIN DE LA CLASE

?>
