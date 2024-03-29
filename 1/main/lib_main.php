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
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="launch_autoridades_superiores" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Autoridades Superiores</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" data-toggle="tooltip" title="Sección en Desarrollo!" data-placement="right" disabled><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Escalas Salariales</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="segmentacion_tematica" data-toggle="tooltip" title="Sección en Desarrollo!" data-placement="right" disabled><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Segmentación Temática</button></li>


                    <li><button type="submit" class="btn btn-default btn-block" name="launch_paritarias"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Gestión Paritarias</button></li>

                    <li><button type="submit" class="btn btn-default btn-block" name="sinep"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> SINEP</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="listar_organismos"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Organismos</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-block" name="L"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Jurisdicciones</button></li>
                    
                    <li class="divider"></li>
                    
                    <li><button type="submit" class="btn btn-primary btn-block" name="C"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$nombre.'</button></li>
                    <li class="divider"></li>';

                    if($varsession == 'root'){

                  echo '<li><button type="submit" class="btn btn-default btn-block" name="launch_tablas_base"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Tablas Base</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="launch_herramientas"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Mantenimiento</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="J"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>
                        <li><button type="submit" class="btn btn-default btn-block" name="send_email"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Enviar Email</button></li>
                        <li><a href="../../3rdparty/vendor/phpmailer/phpmailer/get_oauth_token.php" target="_blank"><button type="button" class="btn btn-default btn-block" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Comprobar Estado Mail</button></a></li>';
                    }

              echo '<li class="divider"></li>
                    
                    <li><button type="submit" class="btn btn-danger btn-block" name="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
                    </form>
                     
                </ul>
                </div>
               
                <ul class="nav navbar-nav navbar-right">
                    <form action="main.php" method="POST">
                        <button class="btn btn-warning btn-sm navbar-btn" name="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalRequerimientos">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Solicitud de Desarrollo</button>
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
             <h2>
                <img class="img-reponsive img-rounded" src="../../icons/categories/preferences-system.png" /></span> Gestión del Sistema
             </h2><hr>
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1">
                      <img class="img-reponsive img-rounded" src="../../icons/categories/preferences-desktop.png" /> Mantenimiento</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group">
                    <form action="#" method="POST">
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="requerimientos">
                        <img class="img-reponsive img-rounded" src="../../icons/apps/system-software-update.png" /> Requerimientos de Desarrollo</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="back_up">
                        <img class="img-reponsive img-rounded" src="../../icons/apps/utilities-file-archiver.png" /> Back Up</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="dump_base">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/svn-update.png" /> Back Up Base</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="view_errors">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/view-pim-tasks-pending.png" /> Errores Mysql</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="view_success">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/view-task.png" /> Inserción Exitosa de Registros</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="button" class="btn btn-default btn-block" onclick="callExplorer();">
                        <img class="img-reponsive img-rounded" src="../../icons/apps/system-file-manager.png" /> Explorer</button>
                       </li>
                       
                       <li class="list-group-item">
                        <button type="button" class="btn btn-default btn-block" onclick="callAdminExplorer();">
                        <img class="img-reponsive img-rounded" src="../../icons/apps/system-file-manager.png" /> Administrador Explorer</button>
                       </li>
                    
                    </form>
                    </ul>
                    <div class="panel-footer" align=center><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></div>
                  </div>
                </div>
              </div>
            </div>
            </div>';
}



/*
** MAIN TABLAS BASE
*/
function launchTablasBase(){

    echo '<div class="container">
             <div class="jumbotron">
             <h2><img class="img-reponsive img-rounded" src="../../icons/actions/view-choose.png" /> Sección Tablas Base</h2><hr>     
                        <p>Carga, edición y visualización de Tablas Base de las cuales usan datos otras partes del sistema.</p><hr>
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1">
                      <img class="img-reponsive img-rounded" src="../../icons/actions/table.png" /> Tablas</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group">
                    <form action="#" method="POST">
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="funciones_ejecutivas">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/resource-group.png" /> Funciones Ejecutivas</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="adicional_grado">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/view-certificate-add.png" /> Adicional Grado</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="unidades_retributivas">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/resource-calendar-insert.png" /> Unidades Retributivas</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="tipo_organismos">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/feed-subscribe.png" /> Tipo Organismo</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="tipo_normas">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/feed-subscribe.png" /> Tipo Normas</button>
                      </li>
                      
                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="ambito_normas">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/bookmarks-organize.png" /> Ambito Norma</button>
                       </li>
                       
                       <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="tipo_representacion">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/feed-subscribe.png" /> Tipo Representación</button>
                       </li>
                    
                    </form>
                    </ul>
                    <div class="panel-footer" align=center><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></div>
                  </div>
                </div>
              </div>
            </div>
            </div>';

}

// LAUNCH AUTORIDADES SUPERIORES
function launchAutoridadesSuperiores(){

    echo '<div class="container">
             <div class="jumbotron">
             <h2>
                <img class="img-reponsive img-rounded" src="../../icons/status/meeting-chair.png" /></span> Gestión Autoridades Superiores
             </h2><hr>
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1">
                      <img class="img-reponsive img-rounded" src="../../icons/actions/code-block.png" /> Estructura Organizacional</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse">
                    <ul class="list-group">
                    <form action="#" method="POST">

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="clasificador_institucional">
                        <img class="img-reponsive img-rounded" src="../../icons/places/folder-bookmark.png" /> Clasificador Institucional</button>
                      </li>

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="autoridades_superiores">
                        <img class="img-reponsive img-rounded" src="../../icons/status/meeting-participant.png" /> Autoridades Superiores</button>
                      </li>

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="estructura_estado">
                        <img class="img-reponsive img-rounded" src="../../icons/emblems/image-has-versions-open.png" /> Estructura del Estado</button>
                      </li>

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="presidencia">
                        <img class="img-reponsive img-rounded" src="../../icons/organismos/argentina-presidencia_32.png" /> Presidencia</button>
                      </li>

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="secretarias_presidencia">
                        <img class="img-reponsive img-rounded" src="../../icons/organismos/institution_32x32.png" /> Secretarias de Presidencia</button>
                      </li>

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="jefatura_gabinete">
                        <img class="img-reponsive img-rounded" src="../../icons/organismos/institution_32x32.png" /> Jefatura Gabinete de Ministros</button>
                      </li>

                      <li class="list-group-item">
                        <button type="submit" class="btn btn-default btn-block" name="ministerios">
                        <img class="img-reponsive img-rounded" src="../../icons/organismos/institution_32x32.png" /> Ministerios</button>
                      </li>


                    </form>
                    </ul>
                    <div class="panel-footer" align=center><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" /> <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></div>
                  </div>
                </div>
              </div>
            </div>
            </div>';

}


?>
