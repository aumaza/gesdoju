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
                echo 3; // campos vacios
            }else{
              
                $respuesta = insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_norma,$f_pub,$anio,$organismo,$jurisdiccion,$unidad_fisica,$obs,$file,$conn,$dbase);
                
                if($respuesta === 1){
                    $norma = $tipo_norma.'_'.$n_norma.'_'.$anio;
                    normasViculadas($norma,$n_norma,$tipo_norma,$files,$conn,$dbase);
                }
                if($respuesta === 2){
                    echo '<script> alert("Sólo se ha subido el Archivo"); </script>';
                }
                if($respuesta === 3){
                    echo '<script> alert("Contáctese con el Administrador para cambiar permisos del directorio de destino"); </script>';
                }
                if($respuesta === 4){
                    echo '<script> alert("Sólo se permiten Archivos PDF"); </script>';  
                }
                if($respuesta === 5){
                    echo '<script> alert("No ha Seleccionado Archivos aún"); </script>';  
                }
                if($respuesta === 6){
                    echo '<script> alert("La Norma ya se encuentra ingresada"); </script>';  
                }
                if($respuesta === 15){
                    echo '<script> alert("Estoy Aca"); </script>';  
                }
                
            }
        }else{
            echo 13; // error de conexion
        }
  
?>
