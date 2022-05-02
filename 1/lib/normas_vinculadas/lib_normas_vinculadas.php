<?php

class NormasVinculadas{

    // PROPIEDADES
    private $id_norma_principal = '';
    private $path_name = '';
    
    // CONSTRUCTOR DESPARAMETRIZADO
    private function __constructor(){
        $this->id_norma_principal = '';
        $this->path_name = '';
    }
    
    // SETTERS
    private function set_id_norma_principal($var){
        $this->id_norma_principal = $var;
    }
           
    private function set_path_name($var){
        $this->path_name = $var;
    }
    
    //GETTERS
    private function get_id_norma_principal($var){
        return $this->id_norma_principal = $var;
    }
    
    private function get_path_name($var){
        return $this->path_name = $var;
    }
    
    // METODOS
    
    // ============================================== FORMULARIOS ============================================ //
    public function formAltaVincularNormas($id,$conn,$dbase){
        
        mysqli_select_db($conn,$dbase);
        $sql = "select tipo_norma, n_norma, anio_pub from normas where id = '$id'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
    
        echo '<div class="container">
		 <div class="row">
		 <div class="col-sm-8">
		   <h2>Cargar Normas Vinculadas</h2><hr>
			<form action="#" method="POST" enctype="multipart/form-data">
			 <input type="hidden" name="id" value="'.$id.'" required>
			 
                <div class="form-group">
                    <label for="norma">Norma</label>
                    <input type="text" class="form-control" id="norma" name="norma" value="'.$row['tipo_norma'].'_Nro_'.$row['n_norma'].'-'.$row['anio_pub'].'" required readonly>
                </div><hr>
                
                <div class="form-group">
                <label for="files">Selecione el/los Archivo/s:</label>
                <input type="file" name="files[]" multiple="">
                </div>
		 
                <button type="submit" class="btn btn-success btn-block" name="add_nueva_norma_vinculada">
                    <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form> <br>
		   
		 </div>
		 </div>
	 </div>';
   
    
    }



    
    // ============================================ PERSISTENCIA =============================================== //
    public function addNormasVinculadas($obj_norma_vinculada,$id_norma,$norma,$files,$conn,$dbase){
    
        $carpeta = '../../documentos/'.$norma; 
			
        if(!file_exists($carpeta)){
            
            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");
            chmod($carpeta,0777);
		
    
    
        foreach($_FILES["files"]['tmp_name'] as $key => $tmp_name){
		//condicional si el fichero existe
		
		if($_FILES["files"]["name"][$key]){
			
			// Nombres de archivos temporales
			$archivonombre = $_FILES["files"]["name"][$key]; 
			$fuente = $_FILES["files"]["tmp_name"][$key]; 
			
						
			$dir = opendir($carpeta);
			$target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
			
	
			if(move_uploaded_file($fuente, $target_path)){	
				
                        echo '<div class="container">
                                <div class="row">
                                <div class="col-sm-8">
                                <div class="alert alert-success" role="alert">
                                <h1 class="panel-title text-left" contenteditable="true"></h1>
                                <p align="center"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" />
                                <strong> Norma Guardada Exitosamente. El/Los Archivo/s '.$archivonombre. ' se ha/n subido correctamente..</strong></p>
                                </div></div></div></div>';
            }else{	
                        echo '<div class="container">
                                <div class="row">
                                <div class="col-sm-8">
                                <div class="alert alert-warning" role="alert">
                                <h1 class="panel-title text-left" contenteditable="true"></h1>
                                <p align="center"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" />
                                <strong> Ups. Hubo un error subiendo el Archivo. Verifique si posee permisos su usuario, o el directorio de destino tiene permisos de escritura</strong></p>
                                </div></div></div></div>';
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
	
	$sql = "INSERT INTO normas_vinculadas ".
            "(id_norma_principal,
              path_name)".
            "VALUES ".
            "($obj_norma_vinculada->set_id_norma_principal('$id_norma'),
              $obj_norma_vinculada->set_path_name('$carpeta'))";
        
        mysqli_select_db($conn,$dbase);
        $query = mysqli_query($conn,$sql);
        
        if($query){
        
            echo ' <div class="container">
                    <div class="row">
                    <div class="col-sm-8">
                    <div class="alert alert-success" role="alert">
                    <h1 class="panel-title text-left" contenteditable="true"></h1>
                    <p align="center"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" />
                        <strong> Base de Datos Actualizada correctamente..</strong></p>
                 </div></div></div></div>';
        }else{
        
            echo '<div class="container">
                    <div class="row">
                    <div class="col-sm-8">
                    <div class="alert alert-danger" role="alert">
                    <h1 class="panel-title text-left" contenteditable="true"></h1>
                    <p align="center"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" />
                    <strong> Hubo un problema al intentar actualizar base de datos.</strong></h1> '.mysqli_error($conn).'</p>
			     </div></div></div></div>';
        }
    
    }else{
    
            foreach($_FILES["files"]['tmp_name'] as $key => $tmp_name){
            //condicional si el fichero existe
		
                if($_FILES["files"]["name"][$key]){
                    
                    // Nombres de archivos temporales
                    $archivonombre = $_FILES["files"]["name"][$key]; 
                    $fuente = $_FILES["files"]["tmp_name"][$key]; 
                    
                                
                    $dir = opendir($carpeta);
                    $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
                    
            
                    if(move_uploaded_file($fuente, $target_path)){	
                        
                                echo '<div class="container">
                                        <div class="row">
                                        <div class="col-sm-8">
                                        <div class="alert alert-success" role="alert">
                                        <h1 class="panel-title text-left" contenteditable="true"></h1>
                                        <p align="center"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" />
                                        <strong> Norma Guardada Exitosamente. El/Los Archivo/s '.$archivonombre. ' se ha/n subido correctamente..</strong></p>
                                        </div></div></div></div>';
                    }else{	
                                echo '<div class="container">
                                        <div class="row">
                                        <div class="col-sm-8">
                                        <div class="alert alert-warning" role="alert">
                                        <h1 class="panel-title text-left" contenteditable="true"></h1>
                                        <p align="center"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" />
                                        <strong> Ups. Hubo un error subiendo el Archivo. Verifique si posee permisos su usuario, o el directorio de destino tiene permisos de escritura</strong></p>
                                        </div></div></div></div>';
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
            }
        }
    
    }
    
} // FIN DE LA FUNCION


public function listarNormasVinculadas($id,$conn,$dbase){
    
    mysqli_select_db($conn,$dbase);
    $sql = "select N.id, N.tipo_norma, N.n_norma, N.anio_pub, V.path_name from normas N,  normas_vinculadas V where N.id = '$id' and V.id_norma_principal = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    
    $path = $row['path_name'];
    $norma = $row['tipo_norma']. ' ' .$row['n_norma'].'/'.$row['anio_pub'];
    
    if($filehandle = opendir($path)){

        $list = array();
        $count = 0;
    
        while($file = readdir($filehandle)){

            if($file != "." && $file != ".."){
            
                $list[] = $file;
                $count++;
            }
        }
    }

        echo '<div class="container">
                <div class="row">
                <div class="col-sm-8">
                <div class="panel panel-primary">
                <div class="panel-heading">Normas vinculadas a: <strong>'.$norma.'</strong></div>
                <div class="panel-body">
                     <div class="list-group">';
                        
                        for($i = 0; $i < $count; $i++){
                            echo '<a class="list-group-item" href="../normas/download.php?file_name='.$list[$i].'&path='.$path.'" >'.($i+1). ' - ' .$list[$i].'</a>';
                        }       
                        
          echo '</div>
                </div>
                <div class="panel-footer"><strong>Cantidad de Normas Vinculadas:</strong> <span class="badge">'.$count.'</span></div>
             </div>
             </div>
             </div>
             </div>';


} //FIN DE LA FUNCION


} // FIN DE LA CLASE



?>


