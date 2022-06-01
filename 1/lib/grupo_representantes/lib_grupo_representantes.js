// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#grupoRepresentantesTable').DataTable({
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
                messageTop: 'Listado Grupo de Representantes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Grupo de Representantes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Grupo de Representantes',
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
                messageTop: 'Listado Grupo de Representantes',
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
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#add_new_grupo').click(function(){
        
        var datos = $('#fr_add_new_grupo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/grupo_representantes/nuevo_grupo.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#nombre_grupo').val('');
                    $('#representante_titular').val('');
                    $('#representante_suplente').val('');
                    $('#primer_asesor').val('');
                    $('#segundo_asesor').val('');
                    $('#nombre_grupo').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Representante Existente!!");
                    $('#nombre_grupo').val('');
                    $('#representante_titular').val('');
                    $('#representante_suplente').val('');
                    $('#primer_asesor').val('');
                    $('#segundo_asesor').val('');
                    $('#nombre_grupo').focus('');
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
    $('#update_grupo').click(function(){
        
        var datos = $('#fr_update_grupo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/grupo_representantes/update_grupo.php",
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
** GUARDA A BASE EL REGISTRO EDITADO
*/

$(document).ready(function(){
    $('#delete_integrante').click(function(){
        
        var datos = $('#fr_update_grupo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/grupo_representantes/delete_integrante.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Actualizado Exitosamente!!");
                    $('#representante').val('');
                    $('#representante').focus('');
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
** compara selectores si hay dos iguales
*/
function compareSelect(string){
    
    var rep_titular = document.getElementById('representante_titular').value;
    var rep_suplente = document.getElementById('representante_suplente').value;
    var asesor_1 = document.getElementById('primer_asesor').value;
    var asesor_2 = document.getElementById('segundo_asesor').value;
    
    console.log(rep_titular);
     console.log(rep_suplente);
      console.log(asesor_1);
       console.log(asesor_2);
    
    if((rep_titular == string) && (asesor_1 == string) || (rep_titular == string) && (rep_suplente == string) || (rep_titular == string) || (rep_suplente == string)){
        
            if(confirm('Un mismo representante no puede ser Titular, Suplente y Asesor. Desea Reseleccionar?') == true){
                
                $('#representante_titular').val('');
                $('#representante_suplente').val('');
                $('#primer_asesor').val('');
                $('#segundo_asesor').val('');
            }else{
                alert('Puede Continuar...');
            }
    }
        
}
