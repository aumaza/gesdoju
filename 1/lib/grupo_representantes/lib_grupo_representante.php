<?php

class Grupo{
    
    private $nombre_grupo = '';
    private $representante_titular = '';
    private $representante_suplente = '';
    private $primer_asesor = '';
    private $segundo_asesor = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->nombre_grupo = '';
        $this->representante_titular = '';
        $this->representante_suplente = '';
        $this->primer_asesor = '';
        $this->segundo_asesor = '';
    }
    
    // SETTERS
    private function set_nombre_grupo($var){
        $this->nombre_grupo = $var;
    }
    
    private function set_representante_titular($var){
        $this->representante_titular = $var;
    }
    
    private function set_representante_suplente($var){
        $this->representante_suplente = $var;
    }
    
    private function set_primer_asesor($var){
        $this->primer_asesor = $var;
    }
    
    private function set_segundo_asesor($var){
        $this->segundo_asesor = $var;
    }
    
    // GETTERS
    private function get_nombre_grupo($var){
        return $this->nombre_grupo = $var;
    }
    
    private function get_representante_titular($var){
        return $this->representante_titular = $var;
    }
    
    private function get_representante_suplente($var){
        return $this->representante_suplente = $var;
    }
    
    private function get_primer_asesor($var){
        return $this->primer_asesor = $var;
    }
    
    private function get_segundo_asesor($var){
        return $this->segundo_asesor = $var;
    }


    // METODOS
    
    /*
    ** LISTAR GRUPOS
    */
    public function listarGrupos($grupo,$conn,$dbase){

    
                if($conn){
                
                
                $sql = "select * from grupo_representantes";
                mysqli_select_db($conn,$dbase);
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Grupo Representantes</div>
                        
                        <div class="panel-body">
                        <div class="table-responsive"><br>';
                        
                        echo "<table class='display compact' style='width:100%' id='grupoRepresentantesTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Nombre Grupo</th>
                        <th class='text-nowrap text-center'>Titular</th>
                        <th class='text-nowrap text-center'>Suplente</th>
                        <th class='text-nowrap text-center'>Primer Asesor</th>
                        <th class='text-nowrap text-center'>Segundo Asesor</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$grupo->get_nombre_grupo($fila['nombre_grupo'])."</td>";
                        echo "<td align=center>".$grupo->get_representante_titular($fila['representante_titular'])."</td>";
                        echo "<td align=center>".$grupo->get_representante_suplente($fila['representante_suplente'])."</td>";
                        echo "<td align=center>".$grupo->get_primer_asesor($fila['primer_asesor'])."</td>";
                        echo "<td align=center>".$grupo->get_segundo_asesor($fila['segundo_asesor'])."</td>";
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

    public function formAltaGrupo($conn,$dbase){
    
        echo '<div class="container">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Alta Grupo</div>
                        
                        <div class="panel-body">
                                   
            <form id="fr_add_new_grupo_ajax" method="POST">
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                    <hr><p><strong>Importante:</strong> Al dar de alta un grupo como mínimo debe tener dos integrante, luego podrá editar el grupo añadiendo o quitando integrantes del mismo</p><hr>
                                          
                        <div class="form-group">
                            <label for="nombre_grupo">Nombre Grupo:</label>
                            <input type="text" class="form-control" id="nombre_grupo" placeholder="Ingrese el Nombre descriptivo para el grupo de representantes" name="nombre_grupo" oninput="alfaNum(this.value);" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="representante_titular">Representante Titular</label>
                            <select class="form-control" id="representante_titular" name="representante_titular" onchange="compareSelect(this.value);" >
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores[nombre_representante].'">'.$valores['dni_representante'].' - '.$valores[nombre_representante].'</option>';
                                    }
                                    }
                                }

                                
                            echo '</select>
                            </div>
                            
                            <div class="form-group">
                            <label for="representante_suplente">Representante Suplente</label>
                            <select class="form-control" id="representante_suplente" name="representante_suplente" onchange="compareSelect(this.value);" >
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores[nombre_representante].'">'.$valores['dni_representante'].' - '.$valores[nombre_representante].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                            
                            <div class="form-group">
                            <label for="primer_asesor">Primer Asesor</label>
                            <select class="form-control" id="primer_asesor" name="primer_asesor" onchange="compareSelect(this.value);" >
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores[nombre_representante].'">'.$valores['dni_representante'].' - '.$valores[nombre_representante].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                            
                            <div class="form-group">
                            <label for="segundo_asesor">Segundo Asesor</label>
                            <select class="form-control" id="segundo_asesor" name="segundo_asesor" onchange="compareSelect(this.value);" >
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores[nombre_representante].'">'.$valores['dni_representante'].' - '.$valores[nombre_representante].'</option>';
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

    public function formEditGrupo($id,$conn,$dbase){
    
        $sql = "select * from grupo_representantes where id = '$id'";
        mysqli_select_db($conn,$dbase);
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
                                    <strong>Importante:</strong> Puede agregar tantos representantes como hay en el listado. Si añade un representante que ya se encuentra en el grupo, no tomará el cambio ya que se estarían repitiendo.</p>
                                    
                        </div>
                    </div><hr>
                           
                                                
                        <div class="form-group">
                            <label for="nombre_grupo">Nombre Grupo:</label>
                            <input type="text" class="form-control" id="nombre_grupo" placeholder="Ingrese el Nombre descriptivo para el grupo de representantes" name="nombre_grupo" value="'.$row['nombre_grupo'].'" readonly required>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="representante_titular">Representante Titular</label>
                            <select class="form-control" id="representante_titular" name="representante_titular" onchange="compareSelect(this.value);" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                        echo '<option value="'.$valores['dni_representante'].' - '.$valores['nombre_representante'].'" 
                                                '.(strcmp($row[representante_titular],$valores[dni_representante].' - '.$valores[nombre_representante]) == 0 ? "selected" : "").'>
                                                    '.$valores['dni_representante'].' - '.$valores['nombre_representante'].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                            
                            <div class="form-group">
                            <label for="representante_suplente">Representante Suplente</label>
                            <select class="form-control" id="representante_suplente" name="representante_suplente" onchange="compareSelect(this.value);" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores['nombre_representante'].'" 
                                                '.(strcmp($row[representante_suplente],$valores[dni_representante].' - '.$valores[nombre_representante]) == 0 ? "selected" : "").'>
                                                    '.$valores['dni_representante'].' - '.$valores['nombre_representante'].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                            
                            <div class="form-group">
                            <label for="primer_asesor">Primer Asesor</label>
                            <select class="form-control" id="primer_asesor" name="primer_asesor" onchange="compareSelect(this.value);" >
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores['nombre_representante'].'" 
                                                '.(strcmp($row[primer_asesor],$valores[dni_representante].' - '.$valores[nombre_representante]) == 0 ? "selected" : "").'>
                                                    '.$valores['dni_representante'].' - '.$valores['nombre_representante'].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                            
                            <div class="form-group">
                            <label for="segundo_asesor">Segundo Asesor</label>
                            <select class="form-control" id="segundo_asesor" name="segundo_asesor" onchange="compareSelect(this.value);" >
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM representantes order by nombre_representante ASC";
                                mysqli_select_db($conn,'gesdoju');
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores['dni_representante'].' - '.$valores['nombre_representante'].'" 
                                                '.(strcmp($row[segundo_asesor],$valores[dni_representante].' - '.$valores[nombre_representante]) == 0 ? "selected" : "").'>
                                                    '.$valores['dni_representante'].' - '.$valores['nombre_representante'].'</option>';
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
                    <img class="img-reponsive img-rounded" src="../../icons/actions/view-refresh.png" /> Actualizar</button>
                
            </form>
           
            </div></div></div>';   
    
    }
    
    
/*
** PERSISTENCIA A BASE DE NUEVO GRUPO
*/
    public function addGrupo($grupo,$nombre_grupo,$rep_titular,$rep_suplente,$asesor_1,$asesor_2,$conn,$dbase){
    
        if($conn){
        
            mysqli_select_db($conn,$dbase);
            $sql = "select * from grupo_representantes where nombre_grupo = '$nombre_grupo'";
            $query = mysqli_query($conn,$sql);
        
            if($query){
                
                $rows = mysqli_num_rows($query);
                
                if($rows == 0){
                    
                    $sql_2 = "INSERT INTO grupo_representantes ".
                    "(nombre_grupo,
                      representante_titular,
                      representante_suplente,
                      primer_asesor,
                      segundo_asesor)".
                    "VALUES ".
                    "($grupo->set_nombre_grupo('$nombre_grupo'),
                      $grupo->set_representante_titular('$rep_titular'),
                      $grupo->set_representante_suplente('$rep_suplente'),
                      $grupo->set_primer_asesor('$asesor_1'),
                      $grupo->set_segundo_asesor('$asesor_2'))";
                    
                    $query_2 = mysqli_query($conn,$sql_2);
                        
                    if($query_2){
                        $success = '[Registro insertado con éxito en la tabla Grupo Representantesigo:]';
                        mysqlSuccessLogs($success);
                        echo 1; // registro insertado correctamente
                    }else{
                        $error = mysqli_error($conn);
                        mysqlErrorLogs($error);
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
    
    public function updateGrupo($id,$grupo,$nombre_grupo,$rep_titular,$rep_suplente,$asesor_1,$asesor_2,$conn,$dbase){
    
        if($conn){

            $sql = "update grupo_representantes set 
                    nombre_grupo = $grupo->set_nombre_grupo('$nombre_grupo'),
                    representante_titular = $grupo->set_representante_titular('$rep_titular'),
                    representante_suplente = $grupo->set_representante_suplente('$rep_suplente'),
                    primer_asesor = $grupo->set_primer_asesor('$asesor_1'),
                    segundo_asesor = $grupo->set_segundo_asesor('$asesor_2')
                    where id = '$id'";
                    
            mysqli_select_db($conn,$dbase);
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
