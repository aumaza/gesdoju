// ESTRUCTURA TABLE

 $(document).ready(function(){

      $('#clasificadorTable').DataTable({
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
                messageTop: 'Listado Clasificador Institucional',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Clasificador Institucional',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Clasificador Institucional',
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
                messageTop: 'Listado Clasificador Institucional',
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


/*
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#add_new_clasificador').click(function(){

        var datos = $('#fr_add_new_clasificador_ajax').serialize();

        $.ajax({
            type:"POST",
            url:"nuevo_clasificador_institucional.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#cod_clasificador').val('');
                    $('#clasificador_descripcion').val('');
                    $('#cod_clasificador').focus('');
                    console.log("Datos: " + datos);
                    window.opener.location.reload();
                    self.close();

                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Registro Existente!!");
                    $('#cod_clasificador').val('');
                    $('#clasificador_descripcion').val('');
                    $('#cod_clasificador').focus('');
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    alert("ATENCION!!!. El Código Clasificador debe tener 15 caracteres!");
                }
                else if(r == 13){
                    alert("Error de conexion!!");
                }

            }
        });

        return false;

});
});


/*
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#update_clasificador').click(function(){

        var datos = $('#fr_update_clasificador_ajax').serialize();

        $.ajax({
            type:"POST",
            url:"editar_clasificador_institucional.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Actulizado Exitosamente!!");
                    $('#cod_clasificador').val('');
                    $('#clasificador_descripcion').val('');
                    $('#cod_clasificador').focus('');
                    console.log("Datos: " + datos);
                    window.opener.location.reload();
                    self.close();


                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar actualizar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Registro Existente!!");
                    $('#cod_clasificador').val('');
                    $('#clasificador_descripcion').val('');
                    $('#cod_clasificador').focus('');
                    console.log("Datos: " + datos);
                }else if(r == 7){
                    alert("ATENCION!!!. El Código Clasificador debe tener 15 caracteres!");
                }
                else if(r == 13){
                    alert("Error de conexion!!");
                }

            }
        });

        return false;

});
});

/*
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#delete_clasificador').click(function(){

        var datos = $('#fr_delete_clasificador_ajax').serialize();
        var resp = confirm("Seguro desea Eliminar el registro?");

        if(resp){

        $.ajax({
            type:"POST",
            url:"eliminar_clasificador_institucional.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Eliminado Exitosamente!!");
                    console.log("Datos: " + datos);
                    window.opener.location.reload();
                    self.close();


                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar eliminar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Verifique la existencia del ID del registro a Eliminar ")
                }
                else if(r == 13){
                    alert("Error de conexion!!");
                }

            }
        });
        }else{
            alert("Ha decidido NO ELIMINAR el registro...");
            self.close();
        }

        return false;

});
});


 // LLAMADOS A FUNCIONES

 function callNewClasificador(){

    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=500,left=1100,right=200,top=80`;

    open("../lib/clasificador_institucional/form_alta_clasificador.php?", "new_clasificador", params);


}


function callEditClasificador(id){
    console.log(id);
    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=500,left=1100,right=200,top=80`;

    open("../lib/clasificador_institucional/form_editar_clasificador.php?id="+id+"", "edit_clasificador", params);


}


function callDeleteClasificador(id){
    console.log(id);
    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=500,left=1100,right=200,top=80`;

    open("../lib/clasificador_institucional/form_eliminar_clasificador.php?id="+id+"", "eliminar_clasificador", params);


}
