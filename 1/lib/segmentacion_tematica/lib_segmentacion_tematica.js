// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#segmentacionTable').DataTable({
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
                messageTop: 'Listado Segmentación Temática',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Segmentación Temática',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Segmentación Temática',
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
                messageTop: 'Listado Segmentación Temática',
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
** GUARDA NUEVO REGISTRO DE SEGMENTACION TEMATICA
*/

$(document).ready(function(){
    $('#add_segmentacion').click(function(){
        
        var datos = $('#fr_add_new_segmentacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/segmentacion_tematica/nueva_segmentacion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#clas_inst').val('');
                    $('#jurisdiccion').val('');
                    $('#saf').val('');
                    $('#cod_sirhu').val('');
                    $('#cod_org').val('');
                    $('#reg_paritario').val('');
                    $('#esc_estatuto').val('');
                    $('#reg_laboral').val('');
                    $('#convenio').val('');
                    $('#ubicacion_fisica').val('');
                    $('#clas_inst').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    alert("Error de conexion dentro de la funcion principal!!");                    
                }else if(r == 13){
                    alert("Error de conexion!!");                    
                }
                
            }
        });

        return false;
    
});
});

// ====================================================================================== //
// GUARDA EDICION REALIZADA //


/*
** GUARDA A BASE EL REGISTRO EDITADO
*/

$(document).ready(function(){
    $('#update_segmentacion').click(function(){
        
        var datos = $('#fr_update_segmentacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/segmentacion_tematica/update_segmentacion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Actualizado Exitosamente!!");
                    window.location.href="main.php";
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar Actualizar el Registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    alert("Error de conexion dentro de la funcion principal!!");                    
                }else if(r == 13){
                    alert("Error de conexion!!");                    
                }
                
            }
        });

        return false;
    
});
});


/*
** ELIINA DE  BASE EL REGISTRO
*/

$(document).ready(function(){
    $('#delete_segmentacion').click(function(){
        
        var datos = $('#fr_delete_segmentacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/segmentacion_tematica/delete_segmentacion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Eliminado Exitosamente!!");
                    window.location.href="main.php";
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar Eliminar el Registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("No se envió correctamente el ID del registro!!");
                    console.log("Datos: " + datos);
                }else if(r == 13){
                    alert("Error de conexion!!");                    
                }
                
            }
        });

        return false;
    
});
});
