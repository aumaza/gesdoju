<?php

class Representantes{

    // VARIABLES
    private $nombre_representante = '';
    private $dni_representante = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    function __constructor(){
        
        $this->nombre_representante = '';
        $this->dni_representante = '';
        
    }
    
    // setters
    private function set_nombre_representante($var){
        $this->nombre_representante = $var;
    }
    
    private function set_dni_representante($var){
        $this->dni_representante = $var;
    }
    
    // getters
    private function get_nombre_representante($var){
        return $this->nombre_representante = $var;
    }
    
    private function get_dni_representante($var){
        return $this->dni_representante = $var;
    }

    // METODOS
    
    /*
    ** LISTAR REPRESENTANTES
    */
    public function listarRepresentantes($representante,$conn,$dbase){

    
                if($conn){
                
                
                $sql = "select * from representantes";
                mysqli_select_db($conn,$dbase);
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="container-fluid">
                        <div class="jumbotron">
                        <h2><img src="../../icons/actions/representantes.png"  class="img-reponsive img-rounded"> Representantes [ Listado de Representantes en Paritarias ]</h2><hr>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-sm" name="launch_paritarias"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Menú Paritarias</button>
                        </form><hr>';
                        
                        
                        echo "<table class='display compact' style='width:100%' id='representantesTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>DNI Representante</th>
                        <th class='text-nowrap text-center'>Nombre Representante</th>
                        <th class='text-nowrap text-center'>Acciones</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$representante->get_dni_representante($fila['dni_representante'])."</td>";
                        echo "<td align=center>".$representante->get_nombre_representante($fila['nombre_representante'])."</td>";
                        echo "<td class='text-nowrap' align=center>";
                        echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >
                                <button type="submit" class="btn btn-default btn-sm" name="editar_representante" data-toggle="tooltip" data-placement="right" title="Editar Datos del Representante">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
                        </form>';
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<hr>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_representante" data-toggle="tooltip" data-placement="right" title="Agregar Representante">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nuevo Representante</button>
                                
                            <button type="submit" class="btn btn-default btn-sm" name="grupos" data-toggle="tooltip" data-placement="right" title="Listar Grupos de Representantes">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Grupos</button>
                        </form><hr>';
                    echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';
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
            <div class="jumbotron">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/user-group-new.png" /> Alta Representante</h3><hr>
                        
                                   
            <form id="fr_add_new_representante_ajax" method="POST">
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                        <div class="form-group">
                            <label for="dni_representante">DNI Representante:</label>
                            <input type="text" class="form-control" id="dni_representante" maxlength="8" placeholder="Ingrese el DNI del Representante" name="dni_representante" oninput="Numeros(this.value);" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nombre_representante">Nombre y Apellido:</label>
                            <input type="text" class="form-control" id="nombre_representante" placeholder="Ingrese el Nombre y Apellido del representante a agregar" name="nombre_representante" oninput="Text(this.value);" required>
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

    public function formEditRepresentante($id,$conn,$dbase){
    
        $sql = "select * from representantes where id = '$id'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
    
        echo '<div class="container">
            <div class="jumbotron">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar Representante</h3><hr>
                        
                        
                                   
            <form id="fr_update_representante_ajax" method="POST">
            <input type="hidden" name="id" id="id" value="'.$id.'" required>
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                    
                        <div class="form-group">
                            <label for="dni_representante">DNI Representante:</label>
                            <input type="text" class="form-control" id="dni_representante" maxlength="8" placeholder="Ingrese el DNI del Representante" name="dni_representante" value="'.$row['dni_representante'].'" required>
                        </div>
                        
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
           
            </div></div>';   
    
    }
    
    
/*
** PERSISTENCIA A BASE DE NUEVO REPRESENTANTE
*/
    public function addRepresentante($representante,$nombre_representante,$dni_representante,$conn,$dbase){
    
        if($conn){
        
            mysqli_select_db($conn,$dbase);
            $sql = "select * from representantes where nombre_representante = '$nombre_representante'";
            $query = mysqli_query($conn,$sql);
        
            if($query){
                
                $rows = mysqli_num_rows($query);
                
                if($rows == 0){
                    
                    $sql_2 = "INSERT INTO representantes ".
                    "(dni_representante,
                      nombre_representante)".
                    "VALUES ".
                    "($representante->set_dni_representante('$dni_representante'),
                      $representante->set_nombre_representante('$nombre_representante'))";
                    
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
    
    public function updateRepresentante($id,$representante,$nombre_representante,$dni_representante,$conn,$dbase){
    
        if($conn){

            $sql = "update representantes set nombre_representante = $representante->set_nombre_representante('$nombre_representante'), dni_representante = $representante->set_dni_representante('$dni_representante') where id = '$id'";
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


} // END OF CLASS

?>
