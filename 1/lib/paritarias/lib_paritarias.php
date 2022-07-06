<?php

class Paritarias{

    // VARIABLES DE LA CLASE
    private $grupo_representantes = '';
    private $tipo_representacion = '';
    private $organismo = '';
    private $fecha_reunion = '';
    private $file_name = '';
    private $file_path = '';
    private $resumen_reunion = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    function __construct(){
        $this->grupo_representantes = '';
        $this->tipo_representacion = '';
        $this->organismo = '';
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
    
    private function set_organismo($var){
        $this->organismo = $var;
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
    
    private function get_organismo($var){
        return $this->organismo = $var;
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
    ** LISTAR
    */
    public function listarParitarias($paritaria,$conn,$dbase){

    
                if($conn){
                
                $fecha_actual = date('Y-m-d');
                
                $sql = "select * from representacion_paritarias";
                mysqli_select_db($conn,$dbase);
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="container-fluid">
                        <div class="jumbotron">
                        <h2><img src="../../icons/actions/view-file-columns.png"  class="img-reponsive img-rounded"> Representación Paritarias [ Listado de Representaciones ]</h2><hr>';
                        
                        echo "<table class='display compact' style='width:100%' id='paritariasTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Representantes</th>
                        <th class='text-nowrap text-center'>Tipo Representación</th>
                        <th class='text-nowrap text-center'>Fecha Reunión</th>
                        <th class='text-nowrap text-center'>Organismo</th>
                        <th class='text-nowrap text-center'>Resumen</th>
                        <th>&nbsp;</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        $sql_1 = "select representante_titular, representante_suplente from grupo_representantes where nombre_grupo = '$fila[grupo_representantes]'";
                        $query_1 = mysqli_query($conn,$sql_1);
                        while($row = mysqli_fetch_array($query_1)){                       
                            echo "<td align=center>".$row['representante_titular']. " <br> " .$row['representante_suplente']."</td>";
                        }
                        echo "<td align=center>".$paritaria->get_tipo_representacion($fila['tipo_representacion'])."</td>";
                        if($paritaria->get_fecha_reunion($fila['fecha_reunion']) == $fecha_actual){
                            echo "<td align=center style='background-color:#F8C471'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</td>";
                        }
                        else if($paritaria->get_fecha_reunion($fila['fecha_reunion']) > $fecha_actual){
                            echo "<td align=center style='background-color:#AED6F1'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</td>";
                        }
                        else if($paritaria->get_fecha_reunion($fila['fecha_reunion']) < $fecha_actual){
                            echo "<td align=center style='background-color:#F1948A'>".$paritaria->get_fecha_reunion($fila['fecha_reunion'])."</td>";
                        }
                        echo "<td align=center>".$paritaria->get_organismo($fila['organismo'])."</td>";
                        echo "<td align=center>".$paritaria->get_resumen_reunion($fila['resumen_reunion'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-default btn-sm" name="edit_paritaria">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar</button>
                                
                                <button type="submit" class="btn btn-default btn-sm" name="info_paritaria">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/help-about.png" /> Información Extendida</button>
                                
                        </form>';
                        echo "</td>";
                        $count++;
                    }

                    echo '</table><hr>';
                    
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nueva_paritaria" data-toggle="tooltip" data-placement="right" title="Agregar Informe de Paritaria">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Registro de Reunión</button>
                            
                            <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias" data-toggle="tooltip" data-placement="right" title="Búsqueda Avanzada sobre Paritarias">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/system-search.png" /> Búsqueda Avanzada</button>
                            
                            </form><hr>';
                        
                    echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    } // FIN DEL METODO LISTAR
    
    
    /*
    ** LISTAR
    */
    public function listarTipoRepresentacion($paritaria,$conn,$dbase){

    
                if($conn){
                
                
                $sql = "select * from tipo_representacion";
                mysqli_select_db($conn,$dbase);
                $query = mysqli_query($conn,$sql);
                //mostramos fila x fila
                $count = 0;
                echo '<div class="container-fluid">
                        <div class="jumbotron">
                        <h2><img class="img-reponsive img-rounded" src="../../icons/categories/applications-engineering.png" /> Tipo de Representación </h2><hr>';
                        
                        echo "<table class='display compact' style='width:100%' id='paritariasTable'>";
                        echo "<thead>
                        <th class='text-nowrap text-center'>Tipo Representación</th>
                        <th class='text-nowrap text-center'>Acciones</th>
                        </thead>";


                while($fila = mysqli_fetch_array($query)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td align=center>".$paritaria->get_tipo_representacion($fila['descripcion'])."</td>";
                        echo "<td class='text-nowrap'>";
                        echo '<form action="#" method="POST">
                                <input type="hidden" name="id" value="'.$fila['id'].'" >
                                
                                <button type="submit" class="btn btn-default btn-sm" name="edit_tipo_representacion">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar</button>
                                
                        </form>';
                        echo "</td>";
                        $count++;
                    }

                    echo "</table>";
                    echo "<hr>";
                    echo '<form action="#" method="POST">
                            
                            <button type="submit" class="btn btn-default btn-sm" name="nuevo_tipo_representacion" data-toggle="tooltip" data-placement="right" title="Agregar Registro de Tipo Representación">
                                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nuevo Registro de Tipo de Representación</button>
                            
                            </form><hr>';
                        
                echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div><hr>';
                    echo '</div></div>';
                    
                    }else{
                    echo 'Connection Failure...';
                    }

                mysqli_close($conn);

    } // FIN DEL METODO LISTAR
    
    
    /*
    ** FORMULARIO DE CARGA DE TIPO DE REPRESENTACION
    */
    public function formAltaTipoRepresentacion(){
    
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
    public function formEditTipoRepresentacion($paritaria,$id,$conn,$dbase){
        
        mysqli_select_db($conn,$dbase);
        $sql = "select * from tipo_representacion where id = '$id'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        
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

    public function formAltaParitaria($conn,$dbase){
    
        echo '<div class="container">
                <div class="jumbotron">
            <h3><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit-sign.png" /> Alta Registro de Reunión Paritaria</h3><hr>
                        
                        
                                   
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
                                mysqli_select_db($conn,$dbase);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[nombre_grupo].'">'.$valores[nombre_grupo].'</option>';
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
                                
                                if($conn){
                                $query = "SELECT descripcion FROM tipo_representacion order by descripcion ASC";
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
                            <label for="organismo">Organismo</label>
                            <select class="form-control" id="organismo" name="organismo" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM organismos order by descripcion ASC";
                                mysqli_select_db($conn,$dbase);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                                    }
                                    }
                                }

                                mysqli_close($conn);
                            
                            echo '</select>
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
            
            <div id="messageNewParitaria"></div>
            
            </div></div>';   
    
    }
    
    
    public function formEditParitaria($id,$conn,$dbase){
        
        mysqli_select_db($conn,$dbase);
        $sql = "select * from representacion_paritarias where id = '$id'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
    
        echo '<div class="container">
                <div class="jumbotron">
                <h3><img class="img-reponsive img-rounded" src="../../icons/actions/document-edit-sign.png" /> Editar Registro de Reunión Paritaria</h3><hr>
                                   
            <form id="fr_update_paritaria_ajax" method="POST">
            <input type="hidden" id="id" name="id" value="'.$id.'">
            
             
            <div class="container">     
                <div class="row">
                    <div class="col-sm-6">
                                                                                  
                        <div class="form-group">
                            <label for="grupo_representante">Grupo Representante</label>
                            <select class="form-control" id="grupo_representante" name="grupo_representante" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
                                mysqli_select_db($conn,$dbase);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[nombre_grupo].'" '.("'$valores[nombre_grupo]'" == "'$row[grupo_representantes]'" ? "selected" : "").'>'.$valores[nombre_grupo].'</option>';
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
                                
                                if($conn){
                                $query = "SELECT descripcion FROM tipo_representacion order by descripcion ASC";
                                mysqli_select_db($conn,$dbase);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[descripcion].'" '.("'$valores[descripcion]'" == "'$row[tipo_representacion]'" ? "selected" : '').'>'.$valores[descripcion].'</option>';
                                    }
                                    }
                                }

                                //mysqli_close($conn);
                            
                            echo '</select>
                            </div>
                        
                        <div class="form-group">
                            <label for="organismo">Organismo</label>
                            <select class="form-control" id="organismo" name="organismo" required>
                            <option value="" disabled selected>Seleccionar</option>';
                                
                                if($conn){
                                $query = "SELECT * FROM organismos order by descripcion ASC";
                                mysqli_select_db($conn,$dbase);
                                $res = mysqli_query($conn,$query);

                                if($res){
                                    while ($valores = mysqli_fetch_array($res)){
                                    echo '<option value="'.$valores[descripcion].'" '.("'$valores[descripcion]'" == "'$row[organismo]'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
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
                            <label for="resumen_reunion">Resumen Reunión:</label>
                            <textarea class="form-control" id="resumen_reunion" name="resumen_reunion" maxlength="1000" placeholder="Ingrese un breve Resúmen de la Reunión" required>'.$row['resumen_reunion'].'</textarea>
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
    public function infoParitaria($paritaria,$id,$conn,$dbase){
    
    $sql = "select * from representacion_paritarias where id = '$id'";
    mysqli_select_db($conn,$dbase);
    $query = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($query)){
        $grupo_representantes = $row['grupo_representantes'];
        $tipo_representacion = $row['tipo_representacion'];
        $organismo = $row['organismo'];
        $fecha_reunion = $row['fecha_reunion'];
        $resumen_reunion = $row['resumen_reunion'];
        $archivo = $row['file_name'];
    }
    
    $sql_1 = "select * from grupo_representantes where nombre_grupo = '$grupo_representantes'";
    $query_1 = mysqli_query($conn,$sql_1);
    while($row_1 = mysqli_fetch_array($query_1)){
        $rep_titular = $row_1['representante_titular'];
        $rep_suplente = $row_1['representante_suplente'];
        $asesor_1 = $row_1['primer_asesor'];
        $asesor_2 = $row_1['segundo_asesor'];
    }
    
    echo '<div class="container">
            <div class="jumbotron">
             <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/arrow-down-double.png" /> Información Extendida</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse-in">
                    <ul class="list-group">
                    <li class="list-group-item"><strong>Grupo:</strong> '.$paritaria->get_grupo_representantes($grupo_representantes).'</li>
                    <li class="list-group-item"><strong>Representante Titular:</strong> '.$rep_titular.'</li>
                    <li class="list-group-item"><strong>Representante Suplente:</strong> '.$rep_suplente.'</li>';
                    if(($asesor_1 != '') && ($asesor_2 != '')){
                    echo '<li class="list-group-item"><strong>Primer Asesor:</strong> '.$asesor_1.'</li>
                          <li class="list-group-item"><strong>Segundo Asesor:</strong> '.$asesor_2.'</li>';
                    }
              echo '<li class="list-group-item"><strong>Tipo Representacion:</strong> '.$paritaria->get_tipo_representacion($tipo_representacion).'</li>
                    <li class="list-group-item"><strong>Organismo:</strong> '.$paritaria->get_organismo($organismo).'</li>
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
            </div></div>';
}


/*
** FUNCION DE BUSQUEDA AVANZADA
*/
public function formAdvanceSearchParitarias($conn,$dbase){
    
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
                                
                                if($conn){
                                $query = "SELECT nombre_grupo FROM grupo_representantes order by nombre_grupo ASC";
                                mysqli_select_db($conn,$dbase);
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

            </div>';
}
   
   
/*
** RESULTADO DE BUSQUEDA AVANZADA
*/
public function searchAdvanceParitariasResults($paritaria,$grupo_representante,$fecha_desde,$fecha_hasta,$conn,$dbase){

    if(($grupo_representante != '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante' and fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h2><hr>';
                  
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
		echo "<hr>";
		echo '<a href="../lib/informes/print_search_officio.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div></div>';
    
    }
    
    if(($grupo_representante != '') && ($fecha_desde == '') && ($fecha_hasta == '')){
        
        $sql_1 = "SELECT * FROM representacion_paritarias WHERE grupo_representantes = '$grupo_representante'";
        mysqli_select_db($conn,$dbase);
        $query_1 = mysqli_query($conn,$sql_1);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h2><hr>';
                  
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
		echo "<hr>";
		echo '<a href="../lib/informes/print_search_officio.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div>';
    
    }
    
    if(($grupo_representante == '') && ($fecha_desde != '') && ($fecha_hasta != '')){
    
        $sql_2 = "SELECT * FROM representacion_paritarias WHERE fecha_reunion between '$fecha_desde' and '$fecha_hasta'";
        mysqli_select_db($conn,$dbase);
        $query_2 = mysqli_query($conn,$sql_2);
        
        //mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="jumbotron">
	      <h2><img src="../../icons/apps/kthesaurus.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada</h2><hr>';
                  
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
		echo "<hr>";
		echo '<a href="../lib/informes/print_search_officio.php?file=print_paritarias_info.php&grupo_representante='.$grupo_representante.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                            <button type="button" class="btn btn-default btn-sm btn-block">
                                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a><hr>
              
              <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-default btn-sm" name="busqueda_paritarias">
                    <img src="../../icons/actions/system-search.png"  class="img-reponsive img-rounded"> Búsqueda Avanzada</button>
                    
              </form><hr>';
		echo '<div class="alert alert-info"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Registros:</strong>  ' .$count.'</div>';
		echo '</div>';
		
		}

}
   
   
    // PERSISTENCIA A BASE
/*
** PERSISTENCIA A BASE DE NUEVA PARITARIA
*/
    public function addParitaria($paritaria,$grupo_representante,$tipo_representacion,$organismo,$fecha_reunion,$resumen_reunion,$conn,$dbase){
    
        if($conn){
        
            mysqli_select_db($conn,$dbase);
                                
                    $sql = "INSERT INTO representacion_paritarias ".
                    "(grupo_representantes,
                      tipo_representacion,
                      organismo,
                      fecha_reunion,
                      resumen_reunion)".
                    "VALUES ".
                    "($paritaria->set_grupo_representantes('$grupo_representante'),
                      $paritaria->set_tipo_representacion('$tipo_representacion'),
                      $paritaria->set_organismo('$organismo'),
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
    
    
    public function addTipoRepresentacion($paritaria,$descripcion,$conn,$dbase){
    
        if($conn){
        
            mysqli_select_db($conn,$dbase);
            
            $sql = "select * from tipo_representacion where descripcion = '$descripcion'";
            $query = mysqli_query($conn,$sql);
            $rows = mysqli_num_rows($query);
            
            if($rows == 0){
            
            $sql_1 = "insert into tipo_representacion ".
                   "(descripcion)".
                   "values ".
                   "($paritaria->set_tipo_representacion('$descripcion'))";
            $query_1 = mysqli_query($conn,$sql_1);
            
            if($query_1){
                echo 1;
            }else{
                echo -1;
            }
        
        }if($rows > 0){
            echo 4; // registro existente
        }
        }else{
            echo 7;
        }
    
    
    }

    public function updateParitaria($paritaria,$id,$grupo_representante,$tipo_representacion,$organismo,$fecha_reunion,$resumen_reunion,$conn,$dbase){
        
        if($conn){
        
            mysqli_select_db($conn,$dbase);
            $sql = "update representacion_paritarias set
                    grupo_representantes = $paritaria->set_grupo_representantes('$grupo_representante'),
                    tipo_representacion = $paritaria->set_tipo_representacion('$tipo_representacion'),
                    organismo = $paritaria->set_organismo('$organismo'),
                    fecha_reunion = $paritaria->set_fecha_reunion('$fecha_reunion'),
                    resumen_reunion = $paritaria->set_resumen_reunion('$resumen_reunion')
                    where id = '$id'";
            $query = mysqli_query($conn,$sql);
            
            if($query){
                echo 1;
            }else{
                echo -1;
            }       
        
        }else{
            echo 7;
        }
    
    } // END OF FUNCTION
    
    
    public function updateTipoRepresentacion($paritaria,$id,$descripcion,$conn,$dbase){
    
        if($conn){
            
            mysqli_select_db($conn,$dbase);
            $sql = "update tipo_representacion set
                    descripcion = $paritaria->set_tipo_representacion('$descripcion')
                    where id = '$id'";
            
            $query = mysqli_query($conn,$sql);
            
            if($query){
                echo 1;
            }else{
                echo -1;
            }
        
        }else{
            echo 7;
        }
    
    }
    
    public function calendarioParitarias($conn,$dbase){
        
        
       $diaSem = array(0 => "",
                        1 => "Lúnes",
                        2 => "Martes",
                        3 => "Miércoles",
                        4 => "Jueves",
                        5 => "Viernes",
                        6 => "Sábado",
                        7 => "Domingo");
       
        
        
        $semana = 1;
        $dia = date('j');
        $mes = date('m');
        $anio = date('Y');
        
        
        echo "<div class='col-sm-4' align='center'>
                    
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                               
                               
                                 <div class='form-group'>
                                    <label for='anio'>Selecione Año:</label>
                                    <select class='form-control' id='anio' name='cambio_anio' onchange='cambiarAnio(this.value);'>";
                                    
                                    for($i = 2020; $i <= 2030; $i++){    
                                        
                                        echo '<option value="'.$i.'" '.($i == $anio ? "selected" : '').'>'.$i.'</option>';                                      
                                        
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
                                    
                                    for($i = 1; $i <= 12; $i++){    
                                        
                                        echo '<option value="'.$i.'" '.($i == $mes ? "selected" : '').'>'.$i.'</option>';                                      
                                        
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
            
            switch($mes){
                
                case '01': $mi_mes = 'Enero';
                            $cant_dias = 31; break;
                                
                case '02': $mi_mes = 'Febrero'; 
                           if($miAnio % 4 != 0){
                               $cant_dias = 28;
                           }else if($miAnio % 4 == 0){
                               $cant_dias = 29;
                           }
                             break;
                                
                case '03': $mi_mes = 'Marzo';  
                            $cant_dias = 31; break;
                case '04': $mi_mes = 'Abril'; 
                            $cant_dias = 30; break;
                case '05': $mi_mes = 'Mayo'; 
                            $cant_dias = 31; break;
                case '06': $mi_mes = 'Junio';
                            $cant_dias = 30; break;
                case '07': $mi_mes = 'Julio';
                            $cant_dias = 31; break;
                case '08': $mi_mes = 'Agosto';
                            $cant_dias = 31; break;
                case '09': $mi_mes = 'Septiembre';
                            $cant_dias = 30; break;
                case '10': $mi_mes = 'Octubre';
                            $cant_dias = 31; break;
                case '11': $mi_mes = 'Noviembre';
                            $cant_dias = 30; break;
                case '12': $mi_mes = 'Diciembre';
                            $cant_dias = 31; break;
                }   
        
        
        
            for($i = 1; $i <= $cant_dias; $i++){
            
                    $diaSemana = date('N', strtotime(date(''.$anio.'-'.$mes.'').'-'.$i));
                    $calendario[$semana][$diaSemana] = $i;
                    
                    if($diaSemana == 7){
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
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[1] &nbsp;</td>
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[2] &nbsp;</td>   
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[3] &nbsp;</td>   
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[4] &nbsp;</td>   
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[5] &nbsp;</td>   
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[6] &nbsp;</td>   
                        <td class='text-nowrap text-center' style='background-color:#454545; color: white;'> $diaSem[7] &nbsp;</td>   
                        </tr>
                    </thead>
                        <tbody>";
                        
                        foreach ($calendario as $dias){
                        
                            echo "<tr>";
                                for($i = 1; $i <= 7; $i++){
                                    
                                    if($dias[$i] == $dia){
                                        echo "<td align=center id='dia' style='background-color:#FFA07A; color: whi<th class='text-nowrap text-center' style='background-color:#454545; color: white;'>".$dias[$i]."</td>";
                                    }else if($i == 7){
                                        echo "<td align=center style='background-color: #FF5733; color: white;'>".$dias[$i]."</td>";
                                    }
                                    else if($dias[$i] == ''){
                                        echo "<td align=center style='background-color:  #d5dbdb; color: white;'>".$dias[$i]."</td>";
                                    }
                                    else{
                                         echo "<td align=center>".$dias[$i]."</td>";
                                    }
                                }
                
                            echo "</tr>";
                        }
                    
                    echo "</tbody>
                            </table> 
                            <br/>
                            </div>";
        
    
    } // FIN FUNCION

    public function sumarAnio($anio){
            return $anio + 1;
    }
    
    public function restarAnio($anio){
        return $anio - 1;
    }
    
/*
** MAIN REPRESENTACION PARITARIAS
*/
public function launchRepresentacionParitarias(){

    echo '<div class="container">
            <div class="jumbotron">
            <h2><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Sección Representación Paritarias</h2><hr>     
            <p>En esta sección encontrará todo lo referente a la carga, edición y visualización de la Representación Paritarias</p><hr>
            
            <div class="container">
        
                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="nueva_paritaria"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Nuevo Registro</button>
                        </form><br>
                    
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="paritarias"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Listar Representación Paritarias</button>
                        </form><br>
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="busqueda_paritarias"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Búsquedas Avanzadas</button>
                        </form><br>
                    </div>
                </div><hr>

                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sección Representantes</h2><hr>     
                    <p>En esta sección encontrará todo lo referente a la carga, edición y visualización de los Representantes que actuan en las paritarias</p><hr>

                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="nuevo_representante"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Nuevo Representante</button>
                        </form><br>
                    
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="representantes"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Listar Representantes</button>
                        </form><br>
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="nuevo_grupo"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Nuevo Grupo</button>
                        </form><br>
                    </div>
                </div><hr>

                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="grupos"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Listar Grupos</button>
                        </form><br>
                    
                    </div>
                    
                    
                </div>
        
            </div>  
        </div></div>';
} // END OF FUNCTION
    
} // FIN DE LA CLASE



?>
