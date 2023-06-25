<?php 

function mainHome(){
    echo '<div class="container">
            <div class="jumbotron">
                <h1 align=center>Gesdo [ Gestión Documental ]</h1><hr>      
                <p align=center>Sistema de Gestión Documental</p><hr>
                <p align=center><img src="../../img/gesdo.jpg" class="img-rounded" alt="GESDO" width="500" height="350"></p><hr>';
                encabezado();
            
            echo '</div></div>';
}

/*
** CARGA DE INFO CANTIDAD DE NORMAS POR TIPO
*/
function infoCarrouselNormas($conn,$dbase){
        
        mysqli_select_db($conn,$dabse);
        $sql = "select tipo_norma, count(tipo_norma) as cant, row_number() over(order by cant asc) as num from normas group by tipo_norma order by num asc";
        $query = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($query);
        $slide[] = array();
        
    echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">
                
                <ol class="carousel-indicators">';
                for($i = 0; $i < $rows; $i++){
                    if($slide[$i] == 1){
                        echo '<li data-target="#myCarousel" data-slide-to="'.$slide[$i].'" class="active"></li>';
                    }else{
                        echo '<li data-target="#myCarousel" data-slide-to="'.$slide[$i].'"></li>';
                }
                }
                
          echo '</ol>

                
                <div class="carousel-inner">';
                
               
                
                    while($row = mysqli_fetch_array($query)){
                    
                        if($row['num'] == 1){
                            echo '<div class="item active">
                                    <div class="well well-sm">
                                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Tipo de Norma:</strong> '.$row['tipo_norma'].' <span class="badge">'.$row['cant'].'</span>
                                    </div>
                                </div>';
                        }else{

                            echo '<div class="item">
                                    <div class="well well-sm">
                                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Tipo de Norma:</strong> '.$row['tipo_norma'].' <span class="badge">'.$row['cant'].'<span>
                                    </div>
                                </div>';
                        }
                        
                    }
               
                
        echo '</div></div>';
}


// ENCABEZADO
function encabezado(){
    
    echo '<div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h4><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" />
                    <strong>Ministerio de Economía de la Nación - Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong>
                </h4>
            </div>
          </div>';
}

// MAIN NAVBAR
function mainNavBar($varsession,$nombre){
    
    echo '<nav class="navbar navbar-inverse navbar-fixed-top">
  
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm navbar-btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Inicio <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <form action="main.php" method="POST">
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="B"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Normas</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="a_s" data-toggle="tooltip" title="Sección en Desarrollo!" data-placement="right" disabled><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Autoridades Superiores</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" data-toggle="tooltip" title="Sección en Desarrollo!" data-placement="right" disabled><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Escalas Salariales</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="segmentacion_tematica" data-toggle="tooltip" title="Sección en Desarrollo!" data-placement="right" disabled><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Segmentación Temática</button></li>


                    <li><button type="submit" class="btn btn-default btn-block" name="launch_paritarias"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Gestión Paritarias</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="listar_organismos"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Organismos</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="L"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Jurisdicciones</button></li>
                    
                    <li><button type="button" class="btn btn-default btn-block" onclick="callExplorer();"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Explorer</button></li>
                    
                    <li class="divider"></li>
                    
                    <li><button type="submit" class="btn btn-primary btn-block" name="C"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$nombre.'</button></li>
                    <li class="divider"></li>';

                    if($varsession == 'root'){

                  echo '<li><button type="submit" class="btn btn-default btn-block" name="launch_tablas_base"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Tablas Base</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="launch_herramientas"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Mantenimiento</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="J"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>
                        <li><button type="button" class="btn btn-default btn-block" onclick="callAdminExplorer();"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Admin Explorer</button></li>';
                    }

              echo '<li class="divider"></li>
                    
                    <li><button type="submit" class="btn btn-danger btn-block" name="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
                    </form>
                     
                </ul>
                </div>
               
                <ul class="nav navbar-nav navbar-right">
                    <form action="main.php" method="POST">
                        <button class="btn btn-warning btn-sm navbar-btn" name="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal2">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Acerca de...</button>
                    </form>                    
                </ul>
                
            
                
            </nav>';
}


// BARRA DE NAVEGACION
function navBar($varsession,$nombre,$conn,$dbase){

    echo '<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                
                <a href="main.php" data-toggle="tooltip" data-placement="bottom" title="Gestión Documental Jurídica">
                <button type="button" class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/go-home.png" /> Home</button></a>
                </ul>
                <ul class="nav navbar-nav">
                
                <form action="main.php" method="POST">
                
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Datos Personales">
                <button type="submit" name="C" class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/view-media-artist.png" /> '.$nombre.'</button></a>';
                
                if($varsession == 'root'){
                
                    echo '<a href="#" data-toggle="tooltip" data-placement="bottom" title="Editar Usuarios">
                    <button type="submit" name="J" class="btn btn-default navbar-btn">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Usuarios</button></a>';
                }
                
                
        echo '</form>
                </ul>
                <ul class="nav navbar-nav">';
                infoCarrouselNormas($conn,$dbase);
                
         echo '</ul>
                <form action="#" method="POST">
                <ul class="nav navbar-nav navbar-right">                
                <button type="submit" class="btn btn-danger navbar-btn" name="logout">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</button>
                </ul>
                </form>
                
                </div>
            </div>
            </nav>';

}


// LEFT PANEL
function leftPanel($varsession){

    echo '<div class="container-fluid">

            <div class="row content">
                <div class="col-sm-2 sidenav">
                <form action="main.php" method="POST">
                
                <button type="submit" class="btn btn-success btn-xs btn-block" name="B" data-toggle="tooltip" data-placement="right" title="Listar todas las Normas">
                    <img class="img-reponsive img-rounded" src="../../icons/apps/kthesaurus.png" /> Normas</button><br>
                
                <div class="panel-group" id="accordion">
            
            
            <div class="panel panel-default" align="center">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    Autoridades Superiores</a>
                </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="a_s" data-toggle="tooltip" data-placement="right" title="Listar Autoridades Superiores">
                        <img class="img-reponsive img-rounded" src="../../icons/status/meeting-participant.png" /> Autoridades Superiores</button><hr>
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="promedio_autoridades" data-toggle="tooltip" data-placement="right" title="Calcular Promedios en Remuneraciones">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/office-chart-bar.png" /> Promedios</button>
                
                </div>
                </div>
            </div>
            
            <div class="panel panel-default" align="center">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Escalas Salariales</a>
                </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="sinep_pp" data-toggle="tooltip" data-placement="right" title="Listar Escalas Salariales Planta Permanente">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/format-list-ordered.png" /> SINEP Planta Permanente</button><hr>
                
                </div>
                </div>
            </div>
            
            
            <div class="panel panel-default" align="center">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                    Tablas Base</a>
                </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse">
                <div class="panel-body">
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="funciones_ejecutivas" data-toggle="tooltip" data-placement="right" title="Listar Funciones Ejecutivas">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/quickopen-class.png" /> Funciones Ejecutivas</button><hr>
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="adicional_grado" data-toggle="tooltip" data-placement="right" title="Listar Adicionales por Grado">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Adicional Grado</button><hr>
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="unidades_retributivas" data-toggle="tooltip" data-placement="right" title="Listar Unidades Retributivas por Nivel y Grado">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Unidades Retributivas</button><hr>
                        
                <button type="submit" class="btn btn-default btn-xs btn-block" name="tipo_organismos" data-toggle="tooltip" data-placement="right" title="Listar los distintos tipos de Organismos">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Tipo Organismo</button><hr>
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="tipo_normas" data-toggle="tooltip" data-placement="right" title="Listar los distintos tipos de Normas">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Tipo Normas</button><hr>
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="ambito_normas" data-toggle="tooltip" data-placement="right" title="Listar los distintos Ambitos de Normas">
                        <img class="img-reponsive img-rounded" src="../../icons/categories/applications-education-university.png" /> Ambitos Normas</button><hr>
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="tipo_representacion" data-toggle="tooltip" data-placement="right" title="Listar los distintos tipos de Representación">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Tipo Representación</button>
                
                </div>
                </div>
            </div>
            
            
            <div class="panel panel-default" align="center">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                    Segmentación Temática</a>
                </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse">
                <div class="panel-body">
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="segmentacion_tematica" data-toggle="tooltip" data-placement="right" title="Listar Segmentación Temática">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Segmentación Temática</button>
                    
                </div>
                </div>
            </div>
            
                <div class="panel panel-default" align="center">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#paritarias">
                    Representación Paritarias</a>
                </h4>
                </div>
                <div id="paritarias" class="panel-collapse collapse">
                <div class="panel-body">
                
                <button type="submit" class="btn btn-default btn-xs btn-block" name="paritarias" data-toggle="tooltip" data-placement="right" title="Listar Seguimiento Paritarias">
                        <img class="img-reponsive img-rounded" src="../../icons/categories/applications-engineering.png" /> Paritarias</button><hr>
                <button type="submit" class="btn btn-default btn-xs btn-block" name="representantes" data-toggle="tooltip" data-placement="right" title="Listar Representantes">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Representantes</button>
                    
                </div>
                </div>
            </div>
            
            </div>';

                
                if($varsession == 'root'){
                
                    echo '<div class="panel-group">
                            <div class="panel panel-primary" align="center">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse6">Mantenimiento</a>
                                </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                <br>
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="back_up" data-toggle="tooltip" data-placement="right" title="Backup de Archivos Subidos"><img class="img-reponsive img-rounded" src="../../icons/apps/utilities-file-archiver.png" /> BackUp</button><hr>
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="dump_base" data-toggle="tooltip" data-placement="right" title="Backup Base de Datos"><img class="img-reponsive img-rounded" src="../../icons/actions/svn-update.png" /> BackUp Base</button><hr>
                                
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="view_errors" data-toggle="tooltip" data-placement="right" title="Visualizar Errores en Intentar insertar registros"><img class="img-reponsive img-rounded" src="../../icons/actions/tools-report-bug.png" /> Visualizar Errores</button><hr>
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="view_success" data-toggle="tooltip" data-placement="right" title="Visualizar Registros Exitosos"><img class="img-reponsive img-rounded" src="../../icons/actions/view-task.png" /> Visualizar Registros Exitosos</button><hr>
                                
                                </div>
                                
                            </div>
                            </div>
                            </div>';
                            
                            
                    echo '                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="listar_organismos" data-toggle="tooltip" data-placement="right" title="Listar Organismos">
                                    <img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Organismos</button>
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="L" data-toggle="tooltip" data-placement="right" title="Listar Jurisdicciones">
                                    <img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Jurisdicciones</button><br>';
                
                }
             
            
            echo '</form>
                  </div>';

}


// BOTONES INFORMATIVOS
function infoButttons(){

        echo '<button type="button" class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/apps/clock.png" /><strong>Hora Actual:</strong>'.date("H:i").'</button>';
            setlocale(LC_ALL,"es_ES.UTF-8");
            
        echo '<button type="button" class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/view-calendar-day.png" /><strong>Fecha Actual:</strong>'.strftime("%d de %b de %Y").'</button>';
            
        echo '<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal2">
                    <img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Acerca de Gesdoju</button>
                    
                <button type="button" class="btn btn-success navbar-btn" onclick="callExplorer();"><img class="img-reponsive img-rounded" src="../../icons/places/folder-orange.png" /> Explorer</button>
        
                <button type="button" class="btn btn-default navbar-btn" onclick="callAdminExplorer();">
                        <img class="img-reponsive img-rounded" src="../../icons/status/meeting-chair.png" /> Admin Explorer</button><hr>';

}

/*
** MAIN HERRAMIENTAS
*/
function launchHerramientas(){

    echo '<div class="container">
            <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Sección Mantenimiento</h1><hr>     
            <p>En esta sección se encuentran herramientas para el Administrador del Sistema.</p><hr>
            
            <div class="container">
        
                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="back_up"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span> Back Up</button>
                        </form><br>
                    
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="dump_base"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Back Up Base</button>
                        </form><br>
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="view_errors"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Errores Mysql</button>
                        </form><br>
                    </div>
                </div><hr>

                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="view_success"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Inserción Exitosa de Registros</button>
                        </form><br>
                    
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <button type="button" class="btn btn-default btn-lg" onclick="callExplorer();"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Explorer</button>
                        <br><br>
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <button type="button" class="btn btn-default btn-lg" onclick="callAdminExplorer();"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Administrador Explorer</button>
                        <br><br>
                    </div>
                </div><hr>
    
                </div>
        
            </div>  
        </div></div>';

}


/*
** MAIN TABLAS BASE
*/
function launchTablasBase(){

    echo '<div class="container">
            <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Sección Tablas Base</h1><hr>     
            <p>En esta sección encontrará todo lo referente a la carga, edición y visualización de Tablas Base de las cuales usan datos otras partes del sistema.</p><hr>
            
            <div class="container">
        
                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="funciones_ejecutivas"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Funciones Ejecutivas</button>
                        </form><br>
                    
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="adicional_grado"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Adicional Grado</button>
                        </form><br>
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="unidades_retributivas"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Unidades Retributivas</button>
                        </form><br>
                    </div>
                </div><hr>

                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="tipo_organismos"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Tipo Organismo</button>
                        </form><br>
                    
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="tipo_normas"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Tipo Normas</button>
                        </form><br>
                    </div>
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="ambito_normas"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Ambito Norma</button>
                        </form><br>
                    </div>
                </div><hr>

                <div class="row">
                    
                    <div class="col-sm-4" align=center style="background-color:#808B96; border: 2px solid black; border-radius: 5px;"><br>
                    
                        <form action="#" method="POST">
                        <button type="submit" class="btn btn-default btn-lg" name="tipo_representacion"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Tipo Representación</button>
                        </form><br>
                    
                    </div>
                    
                    
                </div>
        
            </div>  
        </div></div>';


}



?>
