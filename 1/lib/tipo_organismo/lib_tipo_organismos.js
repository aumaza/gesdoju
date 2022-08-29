// ESTRUCTURA TABLE TIPO ORGANISMO

 $(document).ready(function(){
      
      $('#tipoOrganismoTable').DataTable({
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
                messageTop: 'Listado Tipo Organismo',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Tipo Organismo',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Tipo Organismo',
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
                messageTop: 'Listado Tipo Organismo',
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
    $('#add_tipo_organismo').click(function(){
        
        var datos = $('#fr_add_new_tipo_organismo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/tipo_organismo/nuevo_tipo_organismo.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#cod_tipo_org').val('');
                    $('#descripcion').val('');
                    $('#cod_tipo_org').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Tipo Organismo Existente!!");
                    $('#cod_tipo_org').val('');
                    $('#descripcion').val('');
                    $('#cod_tipo_org').focus('');
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
** GUARDA A BASE EL REGISTRO EDITADO
*/

$(document).ready(function(){
    $('#update_tipo_organismo').click(function(){
        
        var datos = $('#fr_update_tipo_organismo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/tipo_organismo/update_tipo_organismo.php",
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
