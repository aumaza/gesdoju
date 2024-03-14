// ESTRUCTURA TABLE

 $(document).ready(function(){

      $('#autoridadesSuperioresTable').DataTable({
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
                messageTop: 'Listado Autoridades Superiores',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Autoridades Superiores',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Autoridades Superiores',
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
                messageTop: 'Listado Autoridades Superiores',
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
** GUARDA NUEVO REGISTRO DE AUTORIDADES SUPERIORES
*/

$(document).ready(function(){
    $('#new_autoridad_superior').click(function(){

        var datos = $('#fr_add_new_autoridad_superior_ajax').serialize();

        $.ajax({
            type:"POST",
            url:"../lib/autoridades_superiores/nueva_autoridad_superior.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente</p></div>';
                    document.getElementById('messageNewAutoridadSuperior').innerHTML = mensaje;
                    $('#organismo').val('');
                    $('#normativa').val('');
                    $('#descripcion').val('');
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el registro</p></div>';
                    document.getElementById('messageNewAutoridadSuperior').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageNewAutoridadSuperior').innerHTML = mensaje;
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 4){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Registro Existente!!</p></div>';
                    document.getElementById('messageNewAutoridadSuperior').innerHTML = mensaje;
                    $('#organismo').val('');
                    $('#normativa').val('');
                    $('#descripcion').val('');
                    console.log("Datos: " + datos);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>';
                    document.getElementById('messageNewAutoridadSuperior').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }

            }
        });

        return false;

});
});



function callEditAutoridadSuperior(id){
    console.log(id);
    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=650,left=1100,right=200,top=80`;

    open("../lib/autoridades_superiores/form_editar_autoridad_superior.php?id="+id+"", "edit_autoridad_superior", params);


}

