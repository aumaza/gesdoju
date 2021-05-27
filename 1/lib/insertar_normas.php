<?php session_start();
        
        include "../../connection/connection.php";
        include "../lib/lib_normas.php";
                    
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
    insertNormativa($nombre_norma,$n_norma,$tipo_norma,$foro_forma,$f_pub,$anio,$organismo,$jurisdiccion,$unidad_fisica,$obs,$file,$conn);
  
?>
