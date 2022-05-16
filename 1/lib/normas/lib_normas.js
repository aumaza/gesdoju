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
        
        const form = document.querySelector('#fr_nueva_norma_ajax');
        
        const nombre_norma = document.querySelector('#nombre_norma');
        const n_norma = document.querySelector('#n_norma');
        const t_norma = document.querySelector('#t_norma');
        const foro_norma = document.querySelector('#foro_norma');
        const f_pub = document.querySelector('#f_pub');
        const anio = document.querySelector('#anio');
        const organismo = document.querySelector('#organismo');
        const jurisdiccion = document.querySelector('#jurisdiccion');
        const observaciones = document.querySelector('#observaciones');
        const file = document.querySelector('#file');
        const files = document.querySelector('#files');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('nombre_norma', nombre_norma.value);
        formData.append('n_norma', n_norma.value);
        formData.append('t_norma', t_norma.value);
        formData.append('foro_norma', foro_norma.value);
        formData.append('f_pub', f_pub.value);
        formData.append('foro_norma', foro_norma.value);
        formData.append('anio', anio.value);
        formData.append('organismo', organismo.value);
        formData.append('jurisdiccion', jurisdiccion.value);
        formData.append('observaciones', observaciones.value);
        formData.append('file', file.value[0]);
        
        Array.from(files).forEach(file => {
            formData.append('files', file);
        });
        
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../main/insertar_normas.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    bootbox.alert("Normativa Agregada Exitosamente");
                     $('#nombre_norma').val('');
                     $('#n_norma').val('');
                     $('#t_norma').val('');
                     $('#foro_norma').val('');
                     $('#f_pub').val('');
                     $('#anio').val('');
                     $('#organismo').val('');
                     $('#jurisdiccion').val('');
                     $('#observaciones').val('');
                     $('#file').val('');
                     $('#files').val('');
                     $('#nombre_norma').focus();
                    console.log(values);
                    }else if(r == -1){
                        bootbox.alert("Hubo un problema al intentar Agregar el registro");
                        //console.log(formData);
                    }
                    else if(r == 2){
                        bootbox.alert("Solo se ha subido el archivo de la norma sin impactar en la base de datos");
                       // console.log(formData);
                    }
                    else if(r == 3){
                        bootbox.alert("Contáctese con el Administrador ya que el directorio de destino no posee permisos de Escritura");
                        console.log(values);
                    }
                    else if(r == 4){
                        bootbox.alert("Sólo se permiten archivos PDF");
                        //console.log(formData);
                    }
                    else if(r == 5){
                        bootbox.alert("Aún no ha seleccionado el archivo a subir");
                        //console.log(formData);
                    }
                    else if(r == 6){
                        bootbox.alert("Ya existe La norma en la base de datos");
                        //console.log(formData);
                    }
                    
                    else if(r == 13){
                        bootbox.alert("Error de Conexion");
                        //console.log(formData);
                    }
                    else if(r == 15){
                        bootbox.alert("Hay campos sin completar!!");
                        console.log(values);
                    }
                    
                    
                    else if(r == ''){
                        //console.log(formData);
                    }
            },
            
        });

        return false;
    });
});


// CONSULTAR NORMA
$(document).ready(function(){
    $('#consultar_norma').click(function(){
        //var datos=$('#fr_nueva_norma_ajax').serialize();
        var datos = $('#fr_consultar_norma_ajax').serialize();
         
         
         $.ajax({
            type:"POST",
            url:"../lib/normas/consultar_norma.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    bootbox.alert("La Norma aún no ha sido cargada a la Base de datos");
                    $('#nro_norma').val('');
                    $('#anio').val('');
                    $('#tipo_norma').val('');
                    $('#nro_norma').focus('');
                     console.log(datos);
                    }else if(r == -1){
                        bootbox.alert("Hubo un problema al intentar realizar la consulta");
                        console.log(datos);
                    }
                    else if(r == 3){
                        bootbox.alert("Hay campos sin completar!!");
                        console.log(datos);
                    }
                    else if(r == 2){
                        bootbox.alert("Norma Existente en la base de datos");
                        $('#nro_norma').val('');
                        $('#anio').val('');
                        $('#tipo_norma').val('');
                        $('#nro_norma').focus('');
                        console.log(datos);
                    }
                    else if(r == 7){
                        bootbox.alert("No hay conexion a la base de datos");
                        console.log(datos);
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


function getID(){
    
    var test = document.querySelectorAll('.form-control');

    for(var i = 0; i < test.length; i++){
        
        test[i].addEventListener("click", function(){
                //console.log(this.id);
                var id = this.id;
                console.log(id);
                return id;
        }); 
    }
        
    }
    
 

// CAPTURA DE CARACTERES NUMERICOS
function NumerosNorma(string){
//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
    
        
    
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i = 0; i < string.length; i++){
       
        if (filtro.indexOf(string.charAt(i)) != -1){ 
             //Se a�aden a la salida los caracteres v�lidos
              out += string.charAt(i);
              
	     }else{
             
             bootbox.confirm({
                title: "ATENCION / Sólo se permiten Números",
                message: "Usted ingresó estos caracteres: "  + "( " + string + " ). Se quitará el caracter que no responde al criterio del campo.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancelar'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirmar'
                    }
                },
                callback: function (result) {
                    //console.log('This was logged in the callback: ' + result);
                    if(result == true){
                       
                        for (var i = 0; i < string.length; i++){
       
                            if (!filtro.indexOf(string.charAt(i)) != -1){ 
                                //Se a�aden a la salida los caracteres v�lidos
                                out = string.replace(string.charAt(i),'');
                                //console.log(out);
                            }
                        }
                        
                                                
                        $('#n_norma').val(out);
                        $('#n_norma').trigger('input');
                        console.log(out);
                       
                    }else{
                        bootbox.alert('El caracter no se será quitado. Volverá a recibir el mensaje de aviso!!');
                    }
                }
                
            });
             
            //bootbox.alert("ATENCION - Sólo se permiten Números. Y usted ingresó este caracter: "  + "( " + string + " ).");
             //$('#n_norma').val('');
             //$('#anio').val('');
             
	     }
	     }
	
    //Retornar valor filtrado
    return out;
}


// CAPTURA DE CARACTERES NUMERICOS
function NumerosAnio(string){
//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
    
        
    
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i = 0; i < string.length; i++){
       
        if (filtro.indexOf(string.charAt(i)) != -1){ 
             //Se a�aden a la salida los caracteres v�lidos
              out += string.charAt(i);
              
	     }else{
             
             bootbox.confirm({
                title: "ATENCION / Sólo se permiten Números",
                message: "Usted ingresó estos caracteres: "  + "( " + string + " ). Se quitará el caracter que no responde al criterio del campo.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancelar'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirmar'
                    }
                },
                callback: function (result) {
                    //console.log('This was logged in the callback: ' + result);
                    if(result == true){
                       
                        for (var i = 0; i < string.length; i++){
       
                            if (!filtro.indexOf(string.charAt(i)) != -1){ 
                                //Se a�aden a la salida los caracteres v�lidos
                                out = string.replace(string.charAt(i),'');
                                //console.log(out);
                            }
                        }
                        
                                                
                        $('#anio').val(out);
                        $('#anio').trigger('input');
                        console.log(out);
                       
                    }else{
                        bootbox.alert('El caracter no se será quitado. Volverá a recibir el mensaje de aviso!!');
                    }
                }
                
            });
             
            //bootbox.alert("ATENCION - Sólo se permiten Números. Y usted ingresó este caracter: "  + "( " + string + " ).");
             //$('#n_norma').val('');
             //$('#anio').val('');
             
	     }
	     }
	
    //Retornar valor filtrado
    return out;
}



// CAPTURA DE CARACTERES ALFABETICOS
function Text(string){//validacion solo letras
    var out = '';
    //Se a?aden las letras validas
    var filtro ="^[abcdefghijklmn?opqrstuvwxyzABCDEFGHIJKLMN?OPQRSTUVWXYZ- ]+$"; // Caracteres V�idos
  
    for (var i = 0; i <string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
	     out += string.charAt(i);
	     }else{
            bootbox.alert("ATENCION - Sólo se permite Texto. Y Usted ingresó este caracter: "  + "( " + string + " )");
                    
        }
            
    }
    return out;
}

// CAPTURA DE CARACTERES ALFA-NUMERICOS
function alfaNum(string){//validacion solo letras
    var out = '';
    //Se añaden los caracteres válidos
    var filtro ="^[1234567890abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-/()¿?_., ]+$"; // Caracteres Validos
    
    
    
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
	     out += string.charAt(i);
	     }else{
            bootbox.alert("ATENCION - Ha tipeado caracteres no Válidos. Este es el caracter ingresado que no se permite: " + "( " + string + " )");
               
        }
	     }
    return out;
}


