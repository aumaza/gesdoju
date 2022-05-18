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
            visible: false
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
                    bootbox.alert("Registro Guardado Exitosamente!!");
                    $('#cod_org').val('');
                    $('#descripcion').val('');
                    $('#ubicacion_fisica').val('');
                    $('#cod_org').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    bootbox.alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    bootbox.alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    bootbox.alert("Error. Organismo Existente!!");
                    $('#cod_org').val('');
                    $('#descripcion').val('');
                    $('#ubicacion_fisica').val('');
                    $('#cod_org').focus('');
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    bootbox.alert("Error de conexion dentro de la funcion principal!!");                    
                }else if(r == 13){
                    bootbox.alert("Error de conexion!!");                    
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
                    alert("Registro Actualizado Exitosamente!!");
                    window.location='main.php?organismo=organismos';
                }else if(r == -1){
                    bootbox.alert("Error. Hubo un problema al intentar Actualizar el Registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    bootbox.alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    bootbox.alert("Error de conexion dentro de la funcion principal!!");                    
                }else if(r == 13){
                    bootbox.alert("Error de conexion!!");                    
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
