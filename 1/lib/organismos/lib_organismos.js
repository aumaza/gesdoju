// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#organismosTable').DataTable({
        "order": [[0, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "dom":  "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                text: 'Export Excel',
                messageTop: 'Listado Organismos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Organismos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Organismos',
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
                messageTop: 'Listado Organismos',
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
    $('#add_organismo').click(function(){
        
        var datos = $('#fr_add_new_organismo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/organismos/nuevo_organismo.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente</p></div>';
                    document.getElementById('messageNewOrganismo').innerHTML = mensaje;
                    $('#cod_org').val('');
                    $('#saf').val('');
                    $('#descripcion').val('');
                    $('#ubicacion_fisica').val('');
                    $('#cod_org').focus('');
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el registro</p></div>';
                    document.getElementById('messageNewOrganismo').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageNewOrganismo').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 4){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Organismo Existente!!</p></div>';
                    document.getElementById('messageNewOrganismo').innerHTML = mensaje;
                    $('#cod_org').val('');
                    $('#saf').val('');
                    $('#descripcion').val('');
                    $('#ubicacion_fisica').val('');
                    $('#cod_org').focus('');
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion dentro de la funcion principal!!</p></div>';
                    document.getElementById('messageNewOrganismo').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>';
                    document.getElementById('messageNewOrganismo').innerHTML = mensaje;
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
    $('#update_organismo').click(function(){
        
        var datos = $('#fr_update_organismo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/organismos/update_organismo.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="listar_organismos"> Ir a Organismos</button></form>';
                    document.getElementById('messageUpdateOrganismo').innerHTML = mensaje;
                    document.getElementById('cod_org').disabled = true;
                    document.getElementById('saf').disabled = true;
                    document.getElementById('descripcion').disabled = true;
                    document.getElementById('ubicacion_fisica').disabled = true;
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar actualizar el registro</p></div><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="listar_organismos"> Ir a Organismos</button></form>';
                    document.getElementById('messageUpdateOrganismo').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageUpdateOrganismo').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion dentro de la funcion principal!!</p><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="listar_organismos"> Ir a Organismos</button></form></div>';
                    document.getElementById('messageUpdateOrganismo').innerHTML = mensaje;
                    $('#cod_org').disabled = true;
                    $('#saf').disabled = true;
                    $('#descripcion').disabled = true;
                    $('#ubicacion_fisica').disabled = true;
                    
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p><hr><form action="#" method="POST"><button type="submit" class="btn btn-default btn-block" name="listar_organismos"> Ir a Organismos</button></form></div>';
                    document.getElementById('messageUpdateOrganismo').innerHTML = mensaje;
                    $('#cod_org').disabled = true;
                    $('#saf').disabled = true;
                    $('#descripcion').disabled = true;
                    $('#ubicacion_fisica').disabled = true;
                   
                }
                
            }
        });

        return false;
    
});
});

/*
** CAPTURA ID DE MODAL
*/
$(document).ready(function(e) {
  $('#modalEditOrganismo').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    id = parseInt(id);
    document.getElementById('idOrg').innerText = id;
    $(e.currentTarget).find('#bookId').val(id);
    console.log(id);
  });
});
