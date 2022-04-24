<?php

class Grupo{
    
    private $nombre_grupo = '';
    private $representante = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->nombre_grupo = '';
        $this->representante = '';
    }
    
    // SETTERS
    private function set_nombre_grupo($var){
        $this->nombre_grupo = $var;
    }
    
    private function set_representante($var){
        $this->representante = $var;
    }
    
    // GETTERS
    private function get_nombre_grupo($var){
        return $this->nombre_grupo = $var;
    }
    
    private function get_representante($var){
        return $this->representante = $var;
    }


    // METODOS
    
    /*
    ** LISTAR GRUPOS
    */
    public function listarGrupos($grupo,$conn){

    
                if($conn){
                
                
                $sql = "select * from grupo_representantes";
                mysqli_select_db($conn,'gesdoju');
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Grupo Representantes</div>
                        
                        <div class="panel-body">
                        <div class="table-responsive"><br>';
                        
                        echo "<table class='display compact' style='width:100%' id='myTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Nombre Grupo</th>
                        <th class='text-nowrap text-center'>Integrantes</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$grupo->get_nombre_grupo($fila['nombre_grupo'])."</td>";
                        echo "<td align=center>".$grupo->get_representante($fila['representantes'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-primary btn-sm" name="editar_grupo" data-toggle="tooltip" data-placement="right" title="Editar Datos del Grupo">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar</button>
                                
                        </form>';
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<br>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_grupo" data-toggle="tooltip" data-placement="right" title="Agregar Grupo">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nuevo Grupo</button>
                        </form><br>';
                    echo '<button type="button" class="btn btn-primary">Cantidad de Representantes:  ' .$count; echo '</button>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    }

    

/*
** FORMULARIO DE CARGA DE UN NUEVO GRUPO
*/

    public function formAltaGrupo($conn){
    
        echo '<div class="container">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Alta Grupo</div>
                        
                        <div class="panel-body">
                                   
            <form id="fr_add_new_grupo_ajax" method="POST">
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                    <hr><p><strong>Importante:</strong> Al dar de alta un grupo como mínimo debe tener un integrante, luego podrá editar el grupo añadiendo o quitando integrantes del mismo</p><hr>
                                          
                        <div class="form-group">
                            <label for="nombre_grupo">Nombre Grupo:</label>
                            <input type="text" class="form-control" id="nombre_grupo" placeholder="Ingrese el Nombre descriptivo para el grupo de representantes" name="nombre_grupo" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="representantes">Representantes</label>
                            <select class="form-control" id="representante" name="representante" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre_representante FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[nombre_representante].'">'.$valores[nombre_representante].'</option>';
                                    }
                                    }
                                }

                                mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                        
                    </div>
                </div>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" id="add_new_grupo" name="add_new_grupo">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Agregar</button>
            </form>
           
            </div></div></div>';   
    
    }
    
    
    /*
** FORMULARIO DE EDICION DE UN GRUPO
*/

    public function formEditGrupo($id,$conn){
    
        $sql = "select * from grupo_representantes where id = '$id'";
        mysqli_select_db($conn,'gesdoju');
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
    
        echo '<div class="container">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Alta Grupo</div>
                        
                        <div class="panel-body">
                                   
            <form id="fr_update_grupo_ajax" method="POST">
            <input type="hidden" name="id" id="id" value="'.$id.'" required>
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <p align="justify"><img class="img-reponsive img-rounded" src="../../icons/status/dialog-information.png" />
                                    <strong>Importante:</strong> Puede agregar tantos representantes como hay en el listado. Si añade un representante que ya se encuentra en el grupo, no tomará el cambio ya que se estarían repitiendo.
                                    Si desea quitar un integrante del grupo, seleccione el integrante del listado y presione el botón <strong>Quitar Integrante</strong></p>
                        </div>
                    </div><hr>
                           
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p><img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Este grupo ya cuenta con el/los integrantes: '.$row['representantes'].'</p>
                            </div>
                        </div><hr>
                        
                        <div class="form-group">
                            <label for="nombre_grupo">Nombre Grupo:</label>
                            <input type="text" class="form-control" id="nombre_grupo" placeholder="Ingrese el Nombre descriptivo para el grupo de representantes" name="nombre_grupo" value="'.$row['nombre_grupo'].'" readonly required>
                        </div>
                        
                        <div class="form-group">
                            <label for="representantes">Representantes</label>
                            <select class="form-control" id="representante" name="representante" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre_representante FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[nombre_representante].'">'.$valores[nombre_representante].'</option>';
                                    }
                                    }
                                }

                                mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                        
                    </div>
                </div>
                </div><hr>
                
                <button type="submit" class="btn btn-default btn-block" id="update_grupo" name="update_grupo">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Agregar Integrante</button>
                
                <button type="submit" class="btn btn-default btn-block" id="delete_integrante" name="delete_integrante">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/list-remove.png" /> Quitar Integrante</button>
                
            </form>
           
            </div></div></div>';   
    
    }
    
    
/*
** PERSISTENCIA A BASE DE NUEVO GRUPO
*/
    public function addGrupo($grupo,$nombre_grupo,$rep,$conn){
    
        if($conn){
        
            mysqli_select_db($conn,'gesdoju');
            $sql = "select * from grupo_representantes where nombre_grupo = '$nombre_grupo'";
            $query = mysqli_query($conn,$sql);
        
            if($query){
                
                $rows = mysqli_num_rows($query);
                
                if($rows == 0){
                    
                    $sql_2 = "INSERT INTO grupo_representantes ".
                    "(nombre_grupo,
                      representantes)".
                    "VALUES ".
                    "($grupo->set_nombre_grupo('$nombre_grupo'),
                      $grupo->set_representante('$rep'))";
                    
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
    
    public function updateGrupo($id,$grupo,$rep,$conn){
    
        if($conn){

            $sql = "update grupo_representantes set representantes = CONCAT(representantes,$grupo->set_representante(',$rep')) where id = '$id'";
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
    
    
/*
** QUITA INTEGRANTE DE UN GRUPO
*/
    
    public function delIntegrante($id,$grupo,$rep,$conn){
    
        if($conn){

            $sql = "update grupo_representantes 
                    set representantes = REPLACE(representantes,$grupo->set_representante('$rep'),'') where id = '$id'";
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

} //FIN CLASE




?>
