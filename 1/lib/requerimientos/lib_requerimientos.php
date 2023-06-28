<?php 

class Requerimientos{

	// =============================================================================================== //
	// VARIABLES DE LA CLASE
	// =============================================================================================== //

	private $tipo_solicitud = '';
	private $descripcion_modulo = '';
	private $descripcion_requerimiento = '';
	private $fecha_solicitud = '';
	private $usuario_solicitante = '';
	private $descripcion_avance = '';
	private $fecha_avance = '';
	private $desarrollador = '';
	private $estado_requerimiento = '';

	// =============================================================================================== //
	// CONSTRUCTOR DESPARAMETRIZADO
	// =============================================================================================== //
	
	function __construct() {
		$this->tipo_solicitud = '';
		$this->descripcion_modulo = '';
		$this->descripcion_requerimiento = '';
		$this->fecha_solicitud = '';
		$this->usuario_solicitante = '';
		$this->descripcion_avance = '';
		$this->fecha_avance = '';
		$this->desarrollador = '';
		$this->estado_requerimiento = '';
	}

	// =============================================================================================== //
	// SETTERS
	// =============================================================================================== //

	private function set_tipo_solicitud($var){
		$this->tipo_solicitud = $var;
	}

	private function set_descripcion_modulo($var){
		$this->descripcion_modulo = $var;
	}

	private function set_descripcion_requerimiento($var){
		$this->descripcion_requerimiento = $var;
	}

	private function set_fecha_solicitud($var){
		$this->fecha_solicitud = $var;
	}

	private function set_usuario_solicitante($var){
		$this->usuario_solicitante = $var;
	}

	private function set_descripcion_avance($var){
		$this->descripcion_avance = $var;
	}

	private function set_fecha_avance($var){
		$this->fecha_avance = $var;
	}

	private function set_desarrollador($var){
		$this->desarrollador = $var;
	}

	private function set_estado_requerimiento($var){
		$this->estado_requerimiento = $var;
	}

	// =============================================================================================== //
	// GETTERS
	// =============================================================================================== //

	private function get_tipo_solicitud($var){
		return $this->tipo_solicitud = $var;
	}

	private function get_descripcion_modulo($var){
		return $this->descripcion_modulo = $var;
	}

	private function get_descripcion_requerimiento($var){
		return $this->descripcion_requerimiento = $var;
	}

	private function get_fecha_solicitud($var){
		return $this->fecha_solicitud = $var;
	}

	private function get_usuario_solicitante($var){
		return $this->usuario_solicitante = $var;
	}

	private function get_descripcion_avance($var){
		return $this->descripcion_avance = $var;
	}

	private function get_fecha_avance($var){
		return $this->fecha_avance = $var;
	}

	private function get_desarrollador($var){
		return $this->desarrollador = $var;
	}

	private function get_estado_requerimiento($var){
		return $this->estado_requerimiento = $var;
	}

	// =============================================================================================== //
	// METODOS
	// =============================================================================================== //


	// =============================================================================================== //
	// LISTAR
	// =============================================================================================== //
	public function listarRequerimientos($oneReq,$conn,$dbase){

		$estado = 'Sin Acción';
		$avance = 'Sin Novedad';
		$fecha_avance = 'No determinada';
		$desarrollador = 'No Asignado';

			if($conn){
	
	$sql = "SELECT * FROM requerimientos";
    mysqli_select_db($conn,$dbase);
    $resultado = mysqli_query($conn,$sql);
        
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Requerimientos [ Listado de Requerimientos ]</h2><hr>';
	      
                  
      echo "<table class='display compact' style='width:100%' id='requerimientosTable'>";
      
      
      echo "<thead>
		    <th class='text-nowrap text-center'>Tipo Solicitud</th>
		    <th class='text-nowrap text-center'>Descripción Modulo</th>
		    <th class='text-nowrap text-center'>Descripción Requerimiento</th>
		    <th class='text-nowrap text-center'>Fecha Solicitud</th>
		    <th class='text-nowrap text-center'>Usuario Solicitante</th>
		    <th class='text-nowrap text-center'>Descripción Avance</th>
		    <th class='text-nowrap text-center'>Fecha Avance</th>
		    <th class='text-nowrap text-center'>Desarrollador</th>
		    <th class='text-nowrap text-center'>Estado</th>
		    <th class='text-nowrap text-center'>Acciones</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$oneReq->get_tipo_solicitud($fila['tipo_solicitud'])."</td>";
			 echo "<td align=center>".$oneReq->get_descripcion_modulo($fila['descripcion_modulo'])."</td>";
			 echo '<td align=center>'.$oneReq->get_descripcion_requerimiento($fila['descripcion_requerimiento']).'</td>';
			 echo '<td align=center>'.$oneReq->get_fecha_solicitud($fila['fecha_solicitud']).'</td>';
			 echo '<td align=center>'.$oneReq->get_usuario_solicitante($fila['usuario_solicitante']).'</td>';
			 
			 if($oneReq->get_descripcion_avance($fila['descripcion_avance']) != ''){
			 	echo '<td align=center>'.$oneReq->get_descripcion_avance($fila['descripcion_avance']).'</td>';
			 }else{
			 	echo '<td align=center>'.$avance.'</td>';
			 }

			 if($oneReq->get_fecha_avance($fila['fecha_avance']) != ''){
			 	echo '<td align=center>'.$oneReq->get_fecha_avance($fila['fecha_avance']).'</td>';
			 }else{
			 	echo '<td align=center>'.$fecha_avance.'</td>';
			 }

			 if($oneReq->get_desarrollador($fila['usuario_desarrollador']) != ''){
			 	echo '<td align=center>'.$oneReq->get_desarrollador($fila['usuario_desarrollador']).'</td>';
			 }else{
			 	echo '<td align=center>'.$desarrollador.'</td>';
			 }

			 if($oneReq->get_estado_requerimiento($fila['estado_requerimiento']) != ''){
			 	echo '<td align=center>'.$oneReq->get_estado_requerimiento($fila['estado_requerimiento']).'</td>';
			 }else{
			 	echo '<td align=center>'.$estado.'</td>';
			 }
			 echo "<td class='text-nowrap'>";
			 echo '<a data-toggle="modal" data-target="#modalAddAvanceReq" href="#" data-id="'.$fila['id'].'" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-plus"></span> Añadir Avance</a>';
                    
            
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<hr>";
		
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';
		
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

	} // fin de la funcion


	// =============================================================================================== //
	// PERSISTENCIA
	// =============================================================================================== //
	public function addRequerimiento($oneReq,$tipo_solicitud,$descripcion_modulo,$descripcion_requerimiento,$nombre,$conn,$dbase){

		$actual_date = date('Y-m-d'); // se estable fecha actual

		// se crea el sql
		$sql = "INSERT INTO requerimientos ".
				"(tipo_solicitud,
				  descripcion_modulo,
				  descripcion_requerimiento,
				  fecha_solicitud,
				  usuario_solicitante)".
				"VALUES ".
				"($oneReq->set_tipo_solicitud('$tipo_solicitud'),
				  $oneReq->set_descripcion_modulo('$descripcion_modulo'),
				  $oneReq->set_descripcion_requerimiento('$descripcion_requerimiento'),
				  $oneReq->set_fecha_solicitud('$actual_date'),
				  $oneReq->set_usuario_solicitante('$nombre'))";

		mysqli_select_db($conn,$dbase);
		$query = mysqli_query($conn,$sql);

		if($query){
			echo 1; // se insertó el registro correctamente
		}else{
			echo -1; // error al intentar insertar el registro
		}

	}


	public function addAdvanceRequuerimiento($oneReq,$req_id,$desarrollador,$descripcion_avance,$estado_requerimiento,$conn,$dbase){

		$actual_date = date('Y-m-d'); // se establece la fecha actual

		// se crea el sql
		$sql = "update requerimientos set usuario_desarrollador = '$desarrollador', descripcion_avance = '$descripcion_avance', fecha_avance = '$actual_date', estado_requerimiento = '$estado_requerimiento' where id = '$req_id'";

		// se crea el query
		mysqli_select_db($conn,$dbase);
		$query = mysqli_query($conn,$sql);

		if($query){
			echo 1; // se actualizo correctamente
		}else{
			echo -1; // hubo un error al intentar ejecutar el query
		}



	}


	// =============================================================================================== //
	// FORMULARIOS
	// =============================================================================================== //

	public function modalFormNewRequirement($nombre){

		echo '<div class="modal fade" id="myModalRequerimientos" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Formulario de Solicitud de Desarrollo</h4>
			        </div>
			        <div class="modal-body">
			          
			          <form id="fr_add_new_requerimiento_ajax" method="POST">

			          <input type="hidden" id="usuario_solicitante" name="usuario_solicitante" value="'.$nombre.'">
			            
			            <div class="form-group">
			              <label for="tipo_solicitud">Tipo Solicitud:</label>
			              <select class="form-control" id="tipo_solicitud" name="tipo_solicitud">
			                <option value="" selected disabled>Seleccionar</option>
			                <option value="Desarrollo Nuevo Módulo">Desarrollo Nuevo Módulo</option>
			                <option value="Ajuste Módulo">Ajuste Módulo</option>
			                <option value="Nueva Funcionalidad en Módulo">Nueva Funcionalidad en Módulo</option>
			                <option value="Ajuste Funcionalidad en Módulo">Ajuste Funcionalidad en Módulo</option>
			              </select>
			            </div>
			            
			            <div class="form-group">
			              <label for="descripcion_modulo">Descripción Módulo:</label>
			              <input type="text" class="form-control" id="descripcion_modulo" name="descripcion_modulo" placeholder="Cite el módulo existente o defina uno nuevo">
			            </div>
			            <div class="form-group">
			              <label for="requerimiento">Requerimiento:</label>
			              <textarea class="form-control" rows="5" id="requerimiento" name="requerimiento" placeholder="Redacte aquí el requerimiento de desarrollo o ajuste a realizar"></textarea>
			            </div>
			            
			            
			            <button type="submit" class="btn btn-success" id="add_new_requerimiento" >
			            	<span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar Solicitud</button>

			          </form>
			          
			        </div>
			        <div class="modal-footer">

			        	<div id="messageNewRequerimiento"></div>

			          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_cancelar">
			          	<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancelar</button>
			        </div>
			      </div>
			    </div>
			  </div>';
	} // fin del metodo


	public function modalFormAdvanceRequirement($nombre){

		echo '<div class="modal fade" id="modalAddAvanceReq" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Formulario Agregar Avance al Requerimiento</h4>
			        </div>
			        <div class="modal-body">
			          
			          <form id="fr_add_advance_requerimiento_ajax" method="POST">

			          <input type="hidden" class="form-control" name="reqId" id="reqId" value="reqId">
			          <input type="hidden" id="desarrollador" name="desarrollador" value="'.$nombre.'">
			            
			          	<div class="form-group">
			              <label for="descripcion_avance">Avance:</label>
			              <textarea class="form-control" rows="5" id="descripcion_avance" name="descripcion_avance" placeholder="Redacte aquí el el avance que se ha realizado"></textarea>
			            </div>

			            <div class="form-group">
			              <label for="estado_requerimiento">Estado:</label>
			              <select class="form-control" id="estado_requerimiento" name="estado_requerimiento">
			                <option value="" selected disabled>Seleccionar</option>
			                <option value="En Desarrollo">En Desarrollo</option>
			                <option value="Desestimado">Desestimado</option>
			                <option value="Desaprobado">Desaprobado</option>
			                <option value="Aprobado">Aprobado</option>
			              </select>
			            </div>
			            
			            <button type="submit" class="btn btn-success" id="add_advance_requerimiento" >
			            	<span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar Avance</button>

			          </form>
			          
			        </div>
			        <div class="modal-footer">

			        	<div id="messageAddAdvanceRequerimiento"></div>

			          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_cancelar">
			          	<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancelar</button>
			        </div>
			      </div>
			    </div>
			  </div>';
	} // fin del metodo

} // fin de la clase





?>