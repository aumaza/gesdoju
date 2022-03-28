<?php

class Representantes{

    // VARIABLES
    private $nombre_representante = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    function __constructor(){
        
        $this->nombre_representante = '';
    }
    
    // setters
    private function set_nombre_representante($var){
        $this->nombre_representante = $var;
    }
    
    // getters
    private function get_nombre_representante($var){
        return $this->nombre_representante = $var;
    }

    // METODOS
    
    /*
    ** LISTAR REPRESENTANTES
    */
    public function listarRepresentantes($representante,$conn){

    
                if($conn){
                
                
                $sql = "select * from representantes";
                mysqli_select_db($conn,'gesdoju');
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Representantes</div>
                        
                        <div class="panel-body">
                        <div class="table-responsive"><br>';
                        
                        echo "<table class='display compact' style='width:100%' id='myTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Nombre Representante</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$representante->get_nombre_representante($fila['nombre_representante'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >
                                <button type="submit" class="btn btn-primary btn-sm" name="editar_representante" data-toggle="tooltip" data-placement="right" title="Editar Datos del Representante">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar</button>
                        </form>';
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<br>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_representante" data-toggle="tooltip" data-placement="right" title="Agregar Representante">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nuevo Representante</button>
                                
                            <button type="submit" class="btn btn-default btn-sm" name="grupos" data-toggle="tooltip" data-placement="right" title="Listar Grupos de Representantes">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Grupos</button>
                        </form><br>';
                    echo '<button type="button" class="btn btn-primary">Cantidad de Representantes:  ' .$count; echo '</button>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    }
    
    

/*
** FORMULARIO DE CARGA DE UN NUEVO REPRESENTANTE
*/

    public function formAltaRepresentante(){
    
        echo '<div class="container">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/user-group-new.png" /> Alta Representante</div>
                        
                        <div class="panel-body">
                                   
            <form id="fr_add_new_representante_ajax" method="POST">
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                                          
                        <div class="form-group">
                            <label for="nombre_representante">Nombre y Apellido:</label>
                            <input type="text" class="form-control" id="nombre_representante" placeholder="Ingrese el Nombre y Apellido del representante a agregar" name="nombre_representante" required>
                        </div>
                        
                    </div>
                </div>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" id="add_new_representante" name="add_new_representante">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Agregar</button>
            </form>
           
            </div></div></div>';   
    
    }
    

/*
** FORMULARIO DE EDICION DE UN REPRESENTANTE
*/

    public function formEditRepresentante($id,$conn){
    
        $sql = "select nombre_representante from representantes where id = '$id'";
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
    
        echo '<div class="container">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar Representante</div>
                        
                        <div class="panel-body">
                                   
            <form id="fr_update_representante_ajax" method="POST">
            <input type="hidden" name="id" id="id" value="'.$id.'" required>
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                                          
                        <div class="form-group">
                            <label for="nombre_representante">Nombre y Apellido:</label>
                            <input type="text" class="form-control" id="nombre_representante" placeholder="Ingrese el Nombre y Apellido del representante a agregar" name="nombre_representante" value="'.$row['nombre_representante'].'" required>
                        </div>
                        
                    </div>
                </div>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" id="update_representante" name="update_representante">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/document-save-as.png" /> Guardar</button>
            </form>
           
            </div></div></div>';   
    
    }
    
    
/*
** PERSISTENCIA A BASE DE NUEVO REPRESENTANTE
*/
    public function addRepresentante($representante,$nombre_representante,$conn){
    
        if($conn){
        
            mysqli_select_db($conn,'gesdoju');
            $sql = "select * from representantes where nombre_representante = '$nombre_representante'";
            $query = mysqli_query($conn,$sql);
        
            if($query){
                
                $rows = mysqli_num_rows($query);
                
                if($rows == 0){
                    
                    $sql_2 = "INSERT INTO representantes ".
                    "(nombre_representante)".
                    "VALUES ".
                    "($representante->set_nombre_representante('$nombre_representante'))";
                    
                    $query_2 = mysqli_query($conn,$sql_2);
                        
                    if($query_2){
                        echo 1; // registro insertado correctamente
                    }else{
                        echo -1; // hubo un problema al insertar el registro
                    }
                    
                }else{
                    echo 4; // registro existente
                }
            
            }
        
        }else{
            echo 7; // no hay conexion
        }
    
    } // end funcion
    
/*
** ACTUALIZA REGISTRO EN BASE
*/
    
    public function updateRepresentante($id,$representante,$nombre_representante,$conn){
    
        if($conn){

            $sql = "update representantes set nombre_representante = $representante->set_nombre_representante('$nombre_representante') where id = '$id'";
            mysqli_select_db($conn,'gesdoju');
            $query = mysqli_query($conn,$sql);
            
            if($query){
                echo 1; // registro actualizado correctamente
            }else{
                echo -1; // hubo un problema al actualizar el registro
            }
            
        }else{
           echo 7; // no es posible conectarse a la base de datos
        }
    
    }


} // END OF CLASS

?>
