<?php 

class TipoNorma{

    // PROPIEDADES
    private $descripcion = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->descripcion = '';
    }
    
    // SETTERS
    private function set_descripcion($var){
        $this->descripcion = $var;
    }
    
    // GETTERS
    private function get_descripcion($var){
        return $this->descripcion = $var;
    }

    // METODOS
    
    /*
    ** LISTAR
    */
    public function listarTipoNorma($obj_tipo_norma,$conn,$dbase){

    
                if($conn){
                
                
                $sql = "select * from tipo_norma";
                mysqli_select_db($conn,$dbase);
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/help-contents.png" /> Tipo de Norma</div>
                        
                        <div class="panel-body">
                        <div class="table-responsive"><br>';
                        
                        echo "<table class='display compact' style='width:100%' id='myTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Descripción</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$obj_tipo_norma->get_descripcion($fila['descripcion'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<br>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_tipo_norma" data-toggle="tooltip" data-placement="right" title="Agregar Tipo de Norma">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Tipo Norma</button>
                           
                        </form><br>';
                    echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    } // FIN DEL METODO LISTAR

    // ====================================== FORMULARIOS ====================================== //

/*
** funcion que carga el formulario para agregar tipo de norma
*/
public function newTipoNorma(){

	echo '<div class="container">
		 <div class="row">
		 <div class="col-sm-8">
		   <h2>Cargar Nuevo Tipo de Norma</h2><hr>
			<form id="fr_add_new_tipo_norma_ajax" method="POST">
			 
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="100" placeholder="Ingrese la clasificación de tipo de norma. Ej.: Ley" required>
                </div><hr>
		 
                <button type="submit" class="btn btn-success btn-block" id="add_tipo_norma">
                    <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form> <br>
		   
		 </div>
		 </div>
	 </div>';
 
 }

 
 
 // PERSISTENCIA A BASE
/*
** FUNCION QUE GUARDA REGISTRO A BASE
*/
public function addTipoNorma($obj_tipo_norma,$descripcion,$conn,$dbase){
    
    if($conn){
    
    mysqli_select_db($conn,$dbase);
    $sql = "select descripcion from tipo_norma where descripcion = '$descripcion'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
    
    if(($row == 'NULL') || ($row <= 0)){
        
        $sql_1 = "INSERT INTO tipo_norma".
                 "(descripcion)".
                 "VALUES ".
        		 "($obj_tipo_norma->set_descripcion('$descripcion'))";

        mysqli_select_db($conn,$dbase);
        $query_1 = mysqli_query($conn,$sql_1);
            
            if($query_1){
                echo 1; // registro insertado con exito
            }else{
			    echo -1; // hubo un problema al insertar el registro
		    }
    }else{
	    echo 4; // registro existente
	}
	}else{
        echo 7; // error de conexion
	}
}



} // FIN DE CLASE



?>
