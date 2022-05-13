// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#tipoNormaTable').DataTable({
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
                messageTop: 'Listado Tipo de Norma',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Tippo de Norma',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Tipo de Norma',
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
                messageTop: 'Listado Tipo de Norma',
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
    $('#add_tipo_norma').click(function(){
        
        var datos = $('#fr_add_new_tipo_norma_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/tipo_norma/nuevo_tipo_norma.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    bootbox.alert("Registro Guardado Exitosamente!!");
                    $('#descripcion').val('');
                    $('#descripcion').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    bootbox.alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    bootbox.alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    bootbox.alert("Error. Tipo Norma Existente!!");
                    $('#descripcion').val('');
                    $('#descripcion').focus('');
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
 
