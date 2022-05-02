// ESTRUCTURA TABLE NORMAS BUSQUEDA AVANZADA

 $(document).ready(function(){
      
      $('#normasAdvanceSearchTable').DataTable({
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
                messageTop: 'Normas - Búsqueda Avanzada',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Normas - Búsqueda Avanzada',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Normas - Búsqueda Avanzada',
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
                messageTop: 'Normas - Búsqueda Avanzada',
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

// ESTRUCTURA TABLE NORMAS BASE

 $(document).ready(function(){
      
      $('#normasTable').DataTable({
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
                messageTop: 'Listado de Normas',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado de Normas',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado de Normas',
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
                messageTop: 'Listado de Normas',
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




// INSERTAR NUEVO REGISTRO EN NORMAS
$(document).ready(function(){
    $('#add_normativa').click(function(){
        //var datos=$('#fr_nueva_norma_ajax').serialize();
         var data = new FormData();
         var form_data = $('#fr_nueva_norma_ajax').serializeArray();
            
         $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
         });
        
         //Custom data
        data.append('key', 'value');
         
         
         $.ajax({
            type:"POST",
            url:"../lib/insertar_normas.php",
            processData: false,
            contentType: false,
            data:data,
            success:function(r){
                if(r == 1){
                    alert("Normativa Agregada Exitosamente");
                     $('#nombre_norma').val('');
                     $('#n_norma').val('');
                     $('#t_norma').val('');
                     $('#foro_norma').val('');
                     $('#f_pub').val('');
                     $('#anio').val('');
                     $('#organismo').val('');
                     $('#jurisdiccion').val('');
                     $('#ub_fis').val('');
                     $('#observaciones').val('');
                     $('#nombre_norma').focus();
                    console.log(data);
                    }else if(r == -1){
                        alert("Hubo un problema al intentar Agregar el registro");
                        console.log(data);
                    }
                    else if(r == 3){
                        alert("Hay campos sin completar!!");
                        console.log(data);
                    }
                    else if(r == 2){
                        alert("Verifique los permisos del directorio destino del archivo a subir");
                        console.log(data);
                    }
                    else if(r == 5){
                        alert("Sólo se permiten archivos PDF");
                        console.log(data);
                    }
                    else if(r == 7){
                        alert("Aún no ha seleccionado el archivo a subir");
                        console.log(data);
                    }
                    else if(r == ''){
                        console.log(data);
                    }
            },
            
        });

        return false;
    });
});



/*
** BLOQUEA LOS CAMPOS A EDITAR HASTA QUE EL USUARIO SELECCIONE EL QUE DESEA
*/
 var callEnable = function(x){
            
    if((x == 'palabra_clave') || 
                (x == 'fecha_desde') ||
                    (x == 'fecha_hasta')){
                
        document.getElementById(x).disabled = false;
    
    }
}
