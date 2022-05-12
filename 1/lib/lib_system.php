<?php

//////////////////////////////// SCRIPT DE LOGS ////////////////////////////////
/*
** Funcion que genera logs de log-in
*/

function logs($var){
      
      $fileName = "logs/$var.log.txt"; 
      $date = date("d/m/Y H:i:s");
      $message = 'Ultimo ingreso: '.$date;
       
  if (file_exists($fileName)){
  
  $file = fopen($fileName, 'a') or die("Se produjo un error al crear el archivo");
  fwrite($file, "\n".$date) or die("No se pudo escribir en el archivo");
  fclose($file);
  chmod($file, 0777);
  
  }else{
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $message) or die("No se pudo escribir en el archivo");
      fclose($file);
      chmod($file, 0777);
      }
  
}


///////////////////////////// SCRIPT PARA REALIZAR BACKUP /////////////////////////////////
/*
** funcion para realizar backup de directorio
*/
function backup(){

	 $message = shell_exec("../../backup.sh");
         echo '<div class="alert alert-success" role="alert">';
	 echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"><strong> '.print_r($message).'</strong></h1>';
         echo "</div>";
         

}


/*
** funcion para realizar backup de base de datos
*/
function dumpMysql($conn){

    if($conn){
    
        shell_exec('../../dump_data_base.sh');
         echo '<div class="alert alert-success" role="alert">';
        echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"><strong> Dump Successfully!!!</strong></h1>';
         echo "</div>";
        
         }else{
            
            echo '<div class="alert alert-danger" role="alert">';
            echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../icons/actions/dialog-ok-apply.png"                   class="img-reponsive img-rounded"><strong>'. mysqli_error($conn). '</strong></h1>';
         
         }
         

}


function modal2(){

    echo '<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            <img class="img-reponsive img-rounded" src="../../icons/status/dialog-information.png" /> Acerca de Gesdoju</h4>
      </div>
      <div class="modal-body">
        
        <div class="container-fluid">
            <ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">
        <img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Gesdoju</a></li>
    <li><a data-toggle="tab" href="#menu1">
        <img class="img-reponsive img-rounded" src="../../icons/categories/preferences-system.png" /> Desarroladores</a></li>
    <li><a data-toggle="tab" href="#menu2">
        <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Colaboradores</a></li>
    <li><a data-toggle="tab" href="#menu3">
        <img class="img-reponsive img-rounded" src="../../icons/actions/flag-green.png" /> Version</a></li>
    <li><a data-toggle="tab" href="#menu4">
        <img class="img-reponsive img-rounded" src="../../icons/actions/bookmarks-organize.png" /> Licencia</a></li>
    <li><a data-toggle="tab" href="#menu5">
        <img class="img-reponsive img-rounded" src="../../icons/actions/mail-mark-task.png" /> Características Técnicas</a></li>
    </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Gestión de Documentación Jurídica</h2>
      <p align="center">Aplicación destinada a la carga, administración y consulta de documentación jurídica, como así también a la administración de escalas salariales tanto de Autoridades Superiores como del personal administrativo en la Administración Pública Nacional </p>
    </div>
    
    <div id="menu1" class="tab-pane fade">
      <h2>Augusto Maza</h2>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/run-build.png" /> Desarrollador Principal</p>
    </div>
    
    <div id="menu2" class="tab-pane fade">
      <h2>Sonia Boiarov</h2>
      <p><img class="img-reponsive img-rounded" src="../../icons/apps/akregator.png" /> Asesoramiento Jurídico</p>
    </div>
    
    <div id="menu3" class="tab-pane fade">
      <h2>1.0.0</h2>
      <p>Version beta</p>
      <p>2019-2021</p>
    </div>
    
    <div id="menu4" class="tab-pane fade">
      <h2>GNU GPL</h2>
      <p><a href="https://www.gnu.org/licenses/old-licenses/gpl-2.0.html" target="_blank"> Version 2</a></p>

    </div>
    
    <div id="menu5" class="tab-pane fade">
      <h2>Tecnología</h2>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> HTML 5</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> PHP 5 o superior</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> JavaScript</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> MariaDB 5 o superior</p>
      <p><img class="img-reponsive img-rounded" src="../../icons/actions/system-suspend-hibernate.png" /> Bootstrap 3 (framework)</p>
    </div>
    
  </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
            <img class="img-reponsive img-rounded" src="../../icons/actions/window-close.png" /> Cerrar</button>
      </div>
    </div>

  </div>
</div>';



}


?>
