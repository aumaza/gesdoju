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
    
    $dbname = "gesdoju-";
    $file = $dbname . date("d-m-Y") . '.sql';
    //$dump = "mysqldump --user=root --password=slack142 gesdoju > $file";
    $dump = "mysqldump --user=gesdoju --password=gesdoju gesdoju > $file";
	$command = system($dump);
	chmod($file, 0777);
		
        copy($file, "../../sqls/$file");
        unlink($file);
         echo '<div class="alert alert-success" role="alert">';
        echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"><strong> Dump Successfully!!!</strong></h1>';
         echo "</div>";
        
         }else{
            
            echo '<div class="alert alert-danger" role="alert">';
            echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../icons/actions/dialog-ok-apply.png"                   class="img-reponsive img-rounded"><strong>'. mysqli_error($conn). '</strong></h1>';
         
         }
         

}


?>
