<?php 

// ENCABEZADO
function encabezado(){
    
    echo '<div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h4><img class="img-reponsive img-rounded" src="../../img/escudo32x32.png" />
                    <strong>Ministerio de Economía de la Nación - Dirección de Presupuesto y Evaluación de Gastos en Personal</strong>
                </h4>
            </div>
          </div>';
}


// BARRA DE NAVEGACION
function navBar($varsession,$nombre){

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
                
                <ul class="nav navbar-nav navbar-right">
                
                <a href="../../logout.php" data-toggle="tooltip" data-placement="left" title="Cerrar Sesión"> 
                <button class="btn btn-danger navbar-btn">
                    <img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</button></a>
                </ul>
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
                        <img class="img-reponsive img-rounded" src="../../icons/actions/code-class.png" /> Tipo Organismo</button>
                
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
                                </div>
                            </div>
                            </div>
                            </div>';
                            
                            
                    echo '<div class="panel-group" id="accordion">
                            <div class="panel panel-default" align="center">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    Organismos</a>
                                </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="K" data-meeting-participanttoggle="tooltip" data-placement="right" title="Listar Organismos"><img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Organismos</button>
                                
                                </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default" align="center">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                    Jurisdicciones</a>
                                </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                
                                <button type="submit" class="btn btn-default btn-xs btn-block" name="L" data-toggle="tooltip" data-placement="right" title="Listar Jurisdicciones"><img class="img-reponsive img-rounded" src="../../icons/actions/view-file-columns.png" /> Jurisdicciones</button>
                                
                                </div>
                                </div>
                            </div>
                        </div>';
                
                }
             
            
            echo '</form>
                  </div>';

}


// BOTONES INFORMATIVOS
function infoButttons(){

        echo '<button class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/apps/clock.png" /><strong>Hora Actual:</strong>'.date("H:i").'</button>';
            setlocale(LC_ALL,"es_ES.UTF-8");
            
        echo '<button class="btn btn-default navbar-btn">
                <img class="img-reponsive img-rounded" src="../../icons/actions/view-calendar-day.png" /><strong>Fecha Actual:</strong>'.strftime("%d de %b de %Y").'</button>';
            
        echo '<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal2">
                    <img class="img-reponsive img-rounded" src="../../icons/apps/accessories-dictionary.png" /> Acerca de Gesdoju</button>
                    
                <a href="../explorer/index.php" data-toggle="tooltip" data-placement="right" title="Ir al Sistema de Archivos de Gesdoju" target="_blank"><button type="button" class="btn btn-success navbar-btn"><img class="img-reponsive img-rounded" src="../../icons/places/folder-orange.png" /> Explorer</button></a><hr>';

}



?>
