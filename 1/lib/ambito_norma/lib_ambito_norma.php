<?php

class AmbitoNorma{
    
    // PROPIEDADES
    private $descripcion = '';
    
    // CONSTRUCTOR
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
    public function listarAmbitoNorma($obj_ambito_norma,$conn,$dbase){

    
                if($conn){
                
                
                $sql = "select * from ambito_norma";
                mysqli_select_db($conn,$dbase);
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="container-fluid">
                        <div class="jumbotron">
                            <h2><img class="img-reponsive img-rounded" src="../../icons/categories/applications-education-university.png" /> Ambito de Normas</h2><hr>';
                        
                        
                        echo "<table class='display compact' style='width:100%' id='ambitoNormaTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Descripción</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$obj_ambito_norma->get_descripcion($fila['descripcion'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<hr>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_ambito_norma" data-toggle="tooltip" data-placement="right" title="Agregar Ambito de Norma">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Ambito Norma</button>
                           
                        </form><hr>';
                    echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    } // FIN DEL METODO LISTAR

    
    // ====================================== FORMULARIOS ====================================== //

/*
** funcion que carga el formulario para agregar ambito de norma
*/
public function newAmbitoNorma(){

	echo '<div class="container">
		 <div class="jumbotron">
		   <h2><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cargar Nuevo Ambito de Norma</h2><hr>
			<form id="fr_add_new_ambito_norma_ajax" method="POST">
			 
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"  maxlength="100" placeholder="Ingrese la clasificación de Ambito de Norma. Ej.: Laboral" required>
                </div><hr>
		 
                <button type="submit" class="btn btn-success btn-block" id="add_ambito_norma">
                    <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form> <br>
		   
		 </div>
		 </div>';
 
 }
 
 
  // PERSISTENCIA A BASE
/*
** FUNCION QUE GUARDA REGISTRO A BASE
*/
public function addAmbitoNorma($obj_ambito_norma,$descripcion,$conn,$dbase){
    
    if($conn){
    
    mysqli_select_db($conn,$dbase);
    $sql = "select descripcion from ambito_norma where descripcion = '$descripcion'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
    
    if(($row == 'NULL') || ($row <= 0)){
        
        $sql_1 = "INSERT INTO ambito_norma".
                 "(descripcion)".
                 "VALUES ".
        		 "($obj_ambito_norma->set_descripcion('$descripcion'))";

        mysqli_select_db($conn,$dbase);
        $query_1 = mysqli_query($conn,$sql_1);
            
            if($query_1){
                $success = '[Registro insertado con éxito en la tabla Ambito de Norma con la Descripción: '.$descripcion.']';
                mysqlSuccessLogs($success);
                echo 1; // registro insertado con exito
            }else{
                $error = mysqli_error($conn);
                mysqlErrorLogs($error);
			    echo -1; // hubo un problema al insertar el registro
		    }
    }else{
	    echo 4; // registro existente
	}
	}else{
        echo 7; // error de conexion
	}
}
    
} // FIN DE LA CLASE
?>
