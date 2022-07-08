<?php

/*
** Funcion de validación de ingreso
*/
function logIn($user,$pass,$conn,$dbase){

    mysqli_select_db($conn,$dbase);
    
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
	
	$sql_1 = "select password from usuarios where user = '$user'";
	$query_1 = mysqli_query($conn,$sql_1);
	while($row = mysqli_fetch_array($query_1)){
        $hash = $row['password'];
	}
	
    
    
	$sql = "SELECT * FROM usuarios where user = '$user' and role = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM usuarios where user = '$user' and role = 0";
	$retval = mysqli_query($conn,$query);
	
	
	
	if(!$q && !$retval){	
			echo '<div class="alert alert-danger" role="alert">';
			echo "Error de Conexion..." .mysqli_error($conn);
			echo "</div>";
			echo '<a href="#"><br><br>
                    <button type="submit" class="btn btn-primary">Aceptar</button></a>';	
			exit;			
			
			}
		
			if(($user = mysqli_fetch_assoc($retval)) && (password_verify($pass,$hash))){
				
                echo '<div class="jumbotron">
                        <h3 align="center"><strong>Atención!  </strong> '.$_SESSION["user"].'</h3><hr>
                        <div class="alert alert-danger" role="alert">
                            <p align="center"><img src="icons/status/user-busy.png"  class="img-reponsive img-rounded"> <strong> Usuario Bloqueado. Contacte al Administrador.</strong></p>
                        </div><hr>
                        </div>';
                        exit;
			}

			else if(($user = mysqli_fetch_assoc($q)) && (password_verify($pass,$hash))){

				if(strcmp($_SESSION["user"], 'root') == 0){

				echo "<br>";
				echo '<div class="alert alert-success" role="alert">';
				echo '<img src="img/lodding.gif"  class="img-reponsive img-rounded avatar" width="60" height="40">';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
				write_visita($_SESSION['user']);
  				echo '<meta http-equiv="refresh" content="5;URL=1/main/main.php "/>';
				
			}else{
				echo '<div class="alert alert-success" role="alert">';
				echo '<img src="img/lodding.gif"  class="img-reponsive img-rounded avatar" width="60" height="40">';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
				write_visita($_SESSION['user']);
  				echo '<meta http-equiv="refresh" content="5;URL=1/main/main.php "/>';
				
			}
			}else{
				echo '<div class="alert alert-danger" role="alert">';
				echo '<img src="icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Usuario o Contraseña Incorrecta. Reintente Por Favor....';
				echo "</div>";
				}
}


/*
** GUARDAR LOS ERRORES DE MYSQL
*/
function mysqlErrorLogs($error){
    
      $fileName = "../../../logs/mysql_error.log.txt"; 
      $date = date("d-m-Y H:i:s");
      $message = 'Error: '.$error.' - '.$date.'';
       
        if (file_exists($fileName)){
        
        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$date);
        fclose($file);
        chmod($file, 0777);
        
        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            chmod($file, 0777);
            }

}


/*
** GUARDAR LOS SUCCESS DE MYSQL
*/
function mysqlSuccessLogs($success){
    
      $fileName = "../../../logs/mysql_success.log.txt"; 
      $date = date("d-m-Y H:i:s");
      $message = 'Success: '.$success.' - '.$date.'';
       
        if (file_exists($fileName)){
        
        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        chmod($file, 0777);
        
        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            chmod($file, 0777);
            }

}


//////////////////////////////// SCRIPT DE LOGS ////////////////////////////////
/*
** Funcion que genera logs de log-in
*/

function logs($var,$ip_add){
      
      $fileName = "logs/$var.log.txt"; 
      $date = date("d/m/Y H:i:s");
      $message = 'Ultimo ingreso: '.$date. '- Desde la IP: '.$ip_add.'';
       
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



    //función que escribe la IP del cliente en un archivo de texto    
    function write_visita($var){

        //Indicar ruta de archivo válida
        $archivo = "logs/$var.log.txt";

        //Si que quiere ignorar la propia IP escribirla aquí, esto se podría automatizar
        $ip = "mi.ip.";
        $new_ip = get_client_ip();

        if ($new_ip !== $ip){
            $now = new DateTime();

       //Distinguir el tipo de petición, 
       // tiene importancia en mi contexto pero no es obligatorio

        if (!$_GET) {
            $datos = "*POST: ".$_POST;

        } 
        else
        {
            //Saber a qué URL se accede
            $peticion = explode('/', $_GET['PATH_INFO']);
            $datos = str_pad($peticion[0],10).' '.$peticion[1];   
        }
        $txt =  str_pad($new_ip,25). " ".
                str_pad($now->format('d-m-Y H:i:s'),25)." ".
                str_pad(ip_info($new_ip, "Country"),25)." ".json_encode($datos);

        $myfile = file_put_contents($archivo, $txt.PHP_EOL , FILE_APPEND);
        }
    }


function get_client_ip() {
        
        $ipaddress = '';
        if(getenv('HTTP_CLIENT_IP')){
            $ipaddress = getenv('HTTP_CLIENT_IP');
        }
        else if(getenv('HTTP_X_FORWARDED_FOR')){
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        }
        else if(getenv('HTTP_X_FORWARDED')){
            $ipaddress = getenv('HTTP_X_FORWARDED');
        }
        else if(getenv('HTTP_FORWARDED_FOR')){
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        }
        else if(getenv('HTTP_FORWARDED')){
           $ipaddress = getenv('HTTP_FORWARDED');
        }
        else if(getenv('REMOTE_ADDR')){
            $ipaddress = getenv('REMOTE_ADDR');
        }
        else{
            $ipaddress = 'UNKNOWN';
        }
        
        return $ipaddress;
    }


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }
    
///////////////////////////// SCRIPT PARA REALIZAR BACKUP /////////////////////////////////
/*
** funcion para realizar backup de directorio
*/
function backup(){

	 $message = shell_exec("../../backup.sh");
         echo '<div class="alert alert-success" role="alert">
                <h1 class="panel-title text-left" contenteditable="true">
                    <img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"><strong> '.print_r($message).'</strong></h1>
                </div>';
         

}


/*
** funcion para realizar backup de base de datos
*/
function dumpMysql($conn,$dbase){

    if($conn){
        
        $fecha = date('d-m-Y');
        $salida = $dbase.'-'.$fecha.'.sql';
        
        $dump = "mysqldump --user='gesdoju' --password='gesdoju' --host='localhost' $dbase > $salida";
        system($dump);
        
        if(is_file($salida)){
        
         echo '<div class="container">
                <div class="jumbotron">
                    <div class="alert alert-success" role="alert">
                        <p><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"><strong> Dump Successfully!!!</strong></p>
                    </div>
                </div>
              </div>';
            copy($salida, '../../sqls/'.$salida);
            unlink($salida);
         
         }else{
            echo '<div class="container">
                    <div class="jumbotron">
                    <div class="alert alert-danger" role="alert">
                    <p><img src="../../icons/actions/application-exit.png"  class="img-reponsive img-rounded"><strong> No se pudo hacer back up de la base de datos</strong></p>
                 </div>
                 </div>
                 </div>';
         
         }
        
         }else{
            
            echo '<div class="container">
                    <div class="jumbotron">
                    <div class="alert alert-danger" role="alert">
                        <p><img src="../../icons/actions/dialog-ok-apply.png" class="img-reponsive img-rounded"><strong>'. mysqli_error($conn). '</p>
                    </div>
                    </div>
                    </div>';
         
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


function viewMysqlErrors(){
    
    $fileName = "../../logs/mysql_error.log.txt";
    $contents = file_get_contents($fileName);
    $lines = explode("\n",$contents);
    
    
    echo '<div class="container">
            <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Errores Inserción de registros</h1><hr>
            <div class="row">
                <div class="col-sm-4" align=center style="background-color:#f2f4f4; border: 2px solid black; border-radius: 5px;">Mysql Errors</div>
                <div class="col-sm-8" align=left style="background-color:#f2f4f4; border: 2px solid black; border-radius: 5px;">';
                
                foreach($lines as $line){
                    echo $line .'<br>';
                }
                
      echo '</div>
            </div>
            </div>
            </div>';
}

function viewMysqlSuccess(){

    $fileName = "../../logs/mysql_success.log.txt";
    $contents = file_get_contents($fileName);
    $lines = explode("\n",$contents);
    
    
    echo '<div class="container">
            <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Inserción de registros Exitosos</h1><hr>
            <div class="row">
                <div class="col-sm-4" align=center style="background-color:#f2f4f4; border: 2px solid black; border-radius: 5px;">Record Success</div>
                <div class="col-sm-8" align=left style="background-color:#f2f4f4; border: 2px solid black; border-radius: 5px;">';
                
                foreach($lines as $line){
                    echo $line .'<br>';
                }
                
      echo '</div>
            </div>
            </div>
            </div>';

}

function logOut($nombre){
    
    echo '<div class="container">
            <div class="jumbotron" align="center">
                <h1>Hasta Luego '.$nombre.'</h1>
                <img src="lodding_1.gif"  class="img-reponsive img-rounded">
                <meta http-equiv="refresh" content="4;URL=../../logout.php "/>
            </div></div>';

}



?>
