// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#jurisdiccionesTable').DataTable({
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
    $('#add_jurisdiccion').click(function(){
        
        var datos = $('#fr_add_new_jurisdiccion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/jurisdicciones/nueva_jurisdiccion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    bootbox.alert("Registro Guardado Exitosamente!!");
                    $('#cod_jur').val('');
                    $('#descripcion').val('');
                    $('#cod_jur').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    bootbox.alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    bootbox.alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    bootbox.alert("Error. Jurisdicción Existente Existente!!");
                    $('#cod_jur').val('');
                    $('#descripcion').val('');
                    $('#cod_jur').focus('');
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    bootbox.alert("Error de conexion dentro de la funcion principal!!");                    
                }else if(r == 13){
                    alert("Error de conexion!!");                    
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
                    bootbox.alert("Registro Actualizado Exitosamente!!");
                    window.location.href="#";
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
