// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#jurisdiccionesTable').DataTable({
        "order": [[0, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "deferRender": true,
        "dom":  "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                text: 'Export Excel',
                messageTop: 'Listado Jurisdicciones',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Jurisdicciones',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Jurisdicciones',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'print',
                text: 'Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' );
                        
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'Listado Jurisdicciones',
                autoPrint: false,
                exportOptions: {
                    columns: ':visible',
                }
                
            },
            'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: true
        } ],
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });
         
    });



// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE ORGANISMO
*/

$(document).ready(function(){
    $('#add_jurisdiccion').click(function(){
        
        var datos = $('#fr_add_new_jurisdiccion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/jurisdicciones/nueva_jurisdiccion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente</p></div>';
                    document.getElementById('messageNewJurisdiccion').innerHTML = mensaje;
                    $('#cod_jur').val('');
                    $('#descripcion').val('');
                    $('#cod_jur').focus('');
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el registro</p></div>';
                    document.getElementById('messageNewJurisdiccion').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageNewJurisdiccion').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 4){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Jurisdicción Existente!!</p></div>';
                    document.getElementById('messageNewJurisdiccion').innerHTML = mensaje;
                    $('#cod_jur').val('');
                    $('#descripcion').val('');
                    $('#cod_jur').focus('');
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion dentro de la funcion principal!!</p></div>';
                    document.getElementById('messageNewJurisdiccion').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);                    
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>';
                    document.getElementById('messageNewJurisdiccion').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);                    
                }
                
            }
        });

        return false;
    
});
});


/*
** GUARDA A BASE EL REGISTRO EDITADO
*/

$(document).ready(function(){
    $('#update_jurisdiccion').click(function(){
        
        var datos = $('#fr_update_jurisdiccion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/jurisdicciones/update_jurisdiccion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="L"> Ir a Jurisdicciones</button></form>';
                    document.getElementById('messageUpdateJurisdiccion').innerHTML = mensaje;
                    document.getElementById('cod_jur').disabled = true;
                    document.getElementById('descripcion').disabled = true;
                    document.getElementById('cod_jur').disabled = true;
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar actualizar el registro</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="L"> Ir a Jurisdicciones</button></form>';
                    document.getElementById('messageUpdateJurisdiccion').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageUpdateJurisdiccion').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion dentro de la funcion principal!!</p><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="L"> Ir a Jurisdicciones</button></form></div>';
                    document.getElementById('messageUpdateJurisdiccion').innerHTML = mensaje;
                    document.getElementById('cod_jur').disabled = true;
                    document.getElementById('descripcion').disabled = true;
                    document.getElementById('cod_jur').disabled = true;
                    console.log("Datos: " + datos);
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="L"> Ir a Jurisdicciones</button></form></div>';
                    document.getElementById('messageUpdateJurisdiccion').innerHTML = mensaje;
                    document.getElementById('cod_jur').disabled = true;
                    document.getElementById('descripcion').disabled = true;
                    document.getElementById('cod_jur').disabled = true;
                    console.log("Datos: " + datos);                    
                }
                
            }
        });

        return false;
    
});
});
