// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#paritariasTable').DataTable({
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
                messageTop: 'Listado Paritarias',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Paritarias',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado Paritarias',
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
                messageTop: 'Listado Paritarias',
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
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#add_new_paritaria').click(function(){
        
        var datos = $('#fr_add_new_paritaria_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/paritarias/nueva_paritaria.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#grupo_representante').val('');
                    $('#tipo_representacion').val('');
                    $('#organismo').val('');
                    $('#fecha_reunion').val('');
                    $('#resumen_reunion').val('');
                    $('#grupo_representante').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Representante Existente!!");
                    $('#grupo_representante').val('');
                    $('#tipo_representacion').val('');
                    $('#organismo').val('');
                    $('#fecha_reunion').val('');
                    $('#resumen_reunion').val('');
                    $('#grupo_representante').focus('');
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
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#update_paritaria').click(function(){
        
        var datos = $('#fr_update_paritaria_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/paritarias/update_paritaria.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Actualizado Exitosamente!!");
                    console.log("Datos: " + datos);
                    window.location.href="main.php";
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar actualizar el registro");
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
// 

/*
** restar año
*/

function restarAnio(value){
   
    var anio = parseInt(value);
    var nuevo_anio = anio - 1;
    document.getElementById('nuevo_anio').innerHTML = nuevo_anio;
    console.log(nuevo_anio);
    
}

/*
** sumar año
*/
function sumarAnio(value){
    
    var anio = parseInt(value);
    var nuevo_anio = anio + 1;
    document.getElementById('nuevo_anio').innerHTML = nuevo_anio;
    console.log(nuevo_anio);
    
}
/*
** restar mes
*/
function restarMes(value){
    
    var mes = parseInt(value);
    var nuevo_mes = mes - 1;
    document.getElementById('nuevo_mes').innerHTML = nuevo_mes;
    console.log(nuevo_mes);
    
}

/*
** sumar mes
*/

function sumarMes(value){
    
    var mes = parseInt(value);
    var nuevo_mes = mes + 1;
    document.getElementById('nuevo_mes').innerHTML = nuevo_mes;
    console.log(nuevo_mes);
    
}

function cambiarAnio(value){
    
    //var anio = parseInt(value);
    document.getElementById('nuevo_anio').innerText = value;
    console.log(value);
  
}

function cambiarMes(value){
    
    //var mes = parseInt(value);
    document.getElementById('nuevo_mes').innerText = value;
    console.log(value);
    
}


/*
** BLOQUEA LOS CAMPOS A EDITAR HASTA QUE EL USUARIO SELECCIONE EL QUE DESEA
*/
 var callEnableParitaria = function(x){
            
    if((x == 'grupo_representante') || 
                (x == 'fecha_desde') ||
                    (x == 'fecha_hasta')){
                
        document.getElementById(x).disabled = false;
    
    }
}


/*
** FUNCION QUE CARGA MODAL
*/
function modalCargaFecha(){
    
    var fecha = document.getElementById('fecha').innerHTML;
    fecha = toString(fecha);
    
    alert(fecha);
    
}

$(document).ready(function(){
$('body #calendar-table').on('click', 'td', function(){
    
        var dia = $(this).text();
                        
    if(dia == ''){
        bootbox.alert('Ha seleccionado un casillero sin fecha');
    }else{
        bootbox.alert('Día seleccionado: ' + dia);
    }
      
    
})
});
