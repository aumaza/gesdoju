<?php   include "../../connection/connection.php";
        include "../lib/normas/lib_normas.php";
        
                
        if($conn){
        
            $nombre_norma = mysqli_real_escape_string($conn,$_POST['nombre_norma']);
            $n_norma = mysqli_real_escape_string($conn,$_POST['n_norma']);
            $tipo_norma = mysqli_real_escape_string($conn,$_POST['t_norma']);
            $foro_norma = mysqli_real_escape_string($conn,$_POST['foro_norma']);
            $f_pub = mysqli_real_escape_string($conn,$_POST['f_pub']);
            $anio = mysqli_real_escape_string($conn,$_POST['anio']);
            $organismo = mysqli_real_escape_string($conn,$_POST['organismo']);
            $jurisdiccion = mysqli_real_escape_string($conn,$_POST['jurisdiccion']);
            $unidad_fisica = mysqli_real_escape_string($conn,$_POST['ub_fis']);
            $obs = mysqli_real_escape_string($conn,$_POST['observaciones']);
            $file = basename($_FILES["file"]["name"]);
            $files[] = array($_FILES["files"]["name"]);
            
            $nombre_norma = quitarTildes($nombre_norma);
            $obs = quitarTildes($obs);
            
            if(($nombre_norma == '') ||
                ($n_norma == '') ||
                    ($tipo_norma == '') ||
                        ($foro_norma == '') ||
                            ($f_pub == '') ||
                                ($anio == '') ||
                                    ($organismo == '') ||
                                        ($jurisdiccion == '') ||
                                            ($unidad_fisica == '') ||
                                                ($obs == '')){
                echo 15; // campos vacios
            }else{
              
                $respuesta = insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$organismo,$jurisdiccion,$unidad_fisica,$obs,$file,$conn,$dbase);
                
                switch($respuesta){
                
                    case 1: $norma = $tipo_norma.'_'.$n_norma.'_'.$anio;
                            normasViculadas($norma,$n_norma,$tipo_norma,$files,$conn,$dbase);
                            break;
                    
                    case 2: echo 2; // Sólo se ha subido el Archivo
                            break;
                    
                    case 3: echo 3; // Contáctese con el Administrador para cambiar permisos del directorio de destino
                            break;
                            
                    case 4: echo 4; // Sólo se permiten Archivos PDF
                            break;
                    
                    case 5: echo 5; // No ha Seleccionado Archivos aún;
                            break;
                            
                    case 6: echo 6; // La Norma ya se encuentra ingresada
                            break;
                }
            }
        }else{
            echo 13; // error de conexion
        }
  
?>
