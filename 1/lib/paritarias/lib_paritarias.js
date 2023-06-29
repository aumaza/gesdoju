
 $(document).ready(function(){ 
     
      $('#paritariasTable').DataTable({
        "order": [[4, "desc"]],
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
                orientation: 'landscape',
                pageSize: 'LEGAL',
                customize: function(doc) {
                  doc.content[0].text = "Listado Paritarias";
                  doc.pageMargins = [10, 10, 45, 20];
                  doc.defaultStyle.fontSize = 9;
                  doc.styles.tableHeader.fontSize = 10;
                  doc.styles.title.fontSize = 14;
                  doc.footer = function(page, pages) {
                    return {
                      margin: [5, 0, 10, 0],
                      height: 30,
                      columns: [{
                        alignment: "left",
                        text: 'Página',
                      }, {
                         alignment: "right",
                         text: [
                           { text: page.toString(), italics: true },
                             " de ",
                           { text: pages.toString(), italics: true }
                         ]
                      }]
                    }
                  }   
                },
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


 // ESTRUCTURA TABLE

 $(document).ready(function(){
      
      const nro_actuacion = document.querySelector('#nro_actuacion').innerHTML;
      
      $('#avancesParitariaTable').DataTable({
        "order": [[3, "desc"]],
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
                messageTop: 'Listado Avances Paritaria Nro. Actuación: ['+ nro_actuacion + ' ]',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Avances Paritaria Nro. Actuación: ['+ nro_actuacion + ' ]',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                customize: function(doc) {
                  doc.content[0].text = 'Listado Avances Paritaria Nro. Actuación: ['+ nro_actuacion + ' ]';
                  doc.pageMargins = [10, 10, 45, 20];
                  doc.defaultStyle.fontSize = 9;
                  doc.styles.tableHeader.fontSize = 10;
                  doc.styles.title.fontSize = 14;
                  doc.footer = function(page, pages) {
                    return {
                      margin: [5, 0, 10, 0],
                      height: 30,
                      columns: [{
                        alignment: "left",
                        text: 'Página',
                      }, {
                         alignment: "right",
                         text: [
                           { text: page.toString(), italics: true },
                             " de ",
                           { text: pages.toString(), italics: true }
                         ]
                      }]
                    }
                  }   
                },
                messageTop: 'Listado Avances Paritaria Nro. Actuación: ['+ nro_actuacion + ' ]',
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
                messageTop: 'Listado Avances Paritaria Nro. Actuación: ['+ nro_actuacion + ' ]',
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


$(document).ready(function(){      
      $('#tipoRepresentacionTable').DataTable({
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
                messageTop: 'Listado Tipo Representación',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Tipo Representación',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                customize: function(doc) {
                  doc.content[0].text = 'Listado Tipo Representación';
                  doc.pageMargins = [10, 10, 45, 20];
                  doc.defaultStyle.fontSize = 9;
                  doc.styles.tableHeader.fontSize = 10;
                  doc.styles.title.fontSize = 14;
                  doc.footer = function(page, pages) {
                    return {
                      margin: [5, 0, 10, 0],
                      height: 30,
                      columns: [{
                        alignment: "left",
                        text: 'Página',
                      }, {
                         alignment: "right",
                         text: [
                           { text: page.toString(), italics: true },
                             " de ",
                           { text: pages.toString(), italics: true }
                         ]
                      }]
                    }
                  }   
                },
                messageTop: 'Listado Tipo Representación',
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
                messageTop: 'Listado Tipo Representación',
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
** GUARDA NUEVO REGISTRO DE PARITARIA
*/

$(document).ready(function(){
    $('#add_new_paritaria').click(function(){
        
        //var datos = $('#fr_add_new_paritaria_ajax').serialize();

        const form = document.querySelector('#fr_add_new_paritaria_ajax');
        
        const nro_actuacion = document.querySelector('#nro_actuacion');
        const grupo_representante = document.querySelector('#grupo_representante');
        const tipo_representacion = document.querySelector('#tipo_representacion');
        const tipo_pedido = document.querySelector('#tipo_pedido');
        const organismo = document.querySelector('#organismo');
        const fecha_reunion = document.querySelector('#fecha_reunion');
        const resumen_reunion = document.querySelector('#resumen_reunion');
        const myfile = document.querySelector('#myfile');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('nro_actuacion', nro_actuacion.value);
        formData.append('grupo_representante', grupo_representante.value);
        formData.append('tipo_representacion', tipo_representacion.value);
        formData.append('tipo_pedido', tipo_pedido.value);
        formData.append('organismo', organismo.value);
        formData.append('fecha_reunion', fecha_reunion.value);
        formData.append('resumen_reunion', resumen_reunion.value);
        formData.append('myfile', myfile.value[0]);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../lib/paritarias/nueva_paritaria.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    $('#nro_actuacion').val('');
                    $('#grupo_representante').val('');
                    $('#tipo_representacion').val('');
                    $('#tipo_pedido').val('');
                    $('#organismo').val('');
                    $('#fecha_reunion').val('');
                    $('#resumen_reunion').val('');
                    $('#myfile').val('');
                    $('#grupo_representante').focus('');
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el registro</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 7){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion dentro de la funcion principal!!</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 3){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. No se pudo subir el archivo seleccionado!!</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 9){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Sólo se permiten archivos con extensión PDF!!</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 11){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Atención. No ha seleccionado ningún archivo!!</p></div>';
                    document.getElementById('messageNewParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }

                
            }
        });

        return false;
    
});
});


// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE AVANCE PARITARIA
*/

$(document).ready(function(){
    $('#add_new_avance_paritaria').click(function(){
        
        
        const form = document.querySelector('#fr_add_new_avance_paritaria_ajax');
        
        const paritaria_id = document.querySelector('#id');
        const nro_actuacion = document.querySelector('#nro_actuacion');
        const grupo_representante = document.querySelector('#grupo_representantes');
        const tipo_representacion = document.querySelector('#tipo_representacion');
        const organismo = document.querySelector('#organismo');
        const fecha_reunion = document.querySelector('#fecha_reunion');
        const resumen_reunion = document.querySelector('#resumen');
        const participantes_externos = document.querySelector('#participantes_externos');
        const asunto = document.querySelector('#asunto');
        const compromisos_asumidos = document.querySelector('#compromisos_asumidos');
        const fecha_prox_reunion = document.querySelector('#fecha_prox_reunion');
        const comentarios_adicionales = document.querySelector('#comentarios_adicionales');
        const myfiles = document.querySelector('#myfiles');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('paritaria_id', paritaria_id.value);
        formData.append('nro_actuacion', nro_actuacion.value);
        formData.append('grupo_representante', grupo_representante.value);
        formData.append('tipo_representacion', tipo_representacion.value);
        formData.append('organismo', organismo.value);
        formData.append('fecha_reunion', fecha_reunion.value);
        formData.append('resumen_reunion', resumen_reunion.value);
        formData.append('participantes_externos', participantes_externos.value);
        formData.append('asunto', asunto.value);
        formData.append('compromisos_asumidos', compromisos_asumidos.value);
        formData.append('fecha_prox_reunion', fecha_prox_reunion.value);
        formData.append('comentarios_adicionales', comentarios_adicionales.value);

        
        Array.from(myfiles).forEach(file => {
            formData.append('myfiles', file);
        });
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../lib/paritarias/add_advance_paritaria.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = '<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    $('#fecha_reunion').val('');
                    $('#resumen').val('');
                    $('#myfiles').val('');
                    $('#fecha_reunion').focus('');
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    var form = $('<form action="#" method="post">' +
                      '<input type="hidden" name="paritarias" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el registro</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -2){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. No se pudo realizar la consulta a Avances Paritaria</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -3){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el registro en el Calendario</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = '<br><div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 13){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 2){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error no se puede crear el Directorio!!</p></div>';
                    document.getElementById('messageNewAvanceParitaria').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }

                
            }
        });

        return false;
    
});
});


// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA ACTUALIZACION REGISTRO DE AVANCE PARITARIA
*/

$(document).ready(function(){
    $('#update_avance_paritaria').click(function(){
        
        
        const form = document.querySelector('#fr_update_avance_paritaria_ajax');
        
        const advance_paritaria_id = document.querySelector('#id');
        const paritaria_id = document.querySelector('#paritaria_id');
        const fecha_reunion = document.querySelector('#fecha_reunion');
        const participantes_externos = document.querySelector('#participantes_externos');
        const asunto = document.querySelector('#asunto');
        const compromisos_asumidos = document.querySelector('#compromisos_asumidos');
        const fecha_prox_reunion = document.querySelector('#fecha_prox_reunion');
        const comentarios_adicionales = document.querySelector('#comentarios_adicionales');
        const resumen_reunion = document.querySelector('#resumen');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('advance_paritaria_id', advance_paritaria_id.value);
        formData.append('paritaria_id', paritaria_id.value);
        formData.append('fecha_reunion', fecha_reunion.value);
        formData.append('participantes_externos', participantes_externos.value);
        formData.append('asunto', asunto.value);
        formData.append('compromisos_asumidos', compromisos_asumidos.value);
        formData.append('fecha_prox_reunion', fecha_prox_reunion.value);
        formData.append('comentarios_adicionales', comentarios_adicionales.value);
        formData.append('resumen_reunion', resumen_reunion.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../lib/paritarias/update_advance_paritaria.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente</p>
                                    </div>`;
                    document.getElementById('messageUpdateAvanceParitaria').innerHTML = mensaje;
                    $('#fecha_reunion').val('');
                    $('#resumen').val('');
                    $('#fecha_reunion').focus('');
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 6000);
                    var form = $('<form action="#" method="post">' +
                      '<input type="hidden" name="paritarias" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();
                }else if(r == -1){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al actualizar el registro</p></div>';
                    document.getElementById('messageUpdateAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == -2){
                    var mensaje = '<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. Hubo un problema al actualizar el calendario</p></div>';
                    document.getElementById('messageUpdateAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }
                else if(r == 5){
                    var mensaje = '<br><div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>';
                    document.getElementById('messageUpdateAvanceParitaria').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
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
        
        const form = document.querySelector('#fr_update_paritaria_ajax');
        
        const nro_actuacion = document.querySelector('#nro_actuacion');
        const grupo_representante = document.querySelector('#grupo_representante');
        const tipo_representacion = document.querySelector('#tipo_representacion');
        const tipo_pedido = document.querySelector('#tipo_pedido');
        const organismo = document.querySelector('#organismo');
        const fecha_reunion = document.querySelector('#fecha_reunion');
        const resumen_reunion = document.querySelector('#resumen_reunion');
        const myfile = document.querySelector('#myfile');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('nro_actuacion', nro_actuacion.value);
        formData.append('grupo_representante', grupo_representante.value);
        formData.append('tipo_representacion', tipo_representacion.value);
        formData.append('tipo_pedido', tipo_pedido.value);
        formData.append('organismo', organismo.value);
        formData.append('fecha_reunion', fecha_reunion.value);
        formData.append('resumen_reunion', resumen_reunion.value);
        formData.append('myfile', myfile.value[0]);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../lib/paritarias/update_paritaria.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    alert("Registro Actualizado Exitosamente!!");
                    console.log("Datos: " + values);
                    //window.location.href="main.php";
                    //var url = 'main.php'
                    var form = $('<form action="#" method="post">' +
                      '<input type="hidden" name="paritarias" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar actualizar el registro");
                    console.log("Datos: " + values);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + values);
                }else if(r == 7){
                    alert("Error de conexion dentro de la funcion principal!!");                    
                }else if(r == 13){
                    alert("Error de conexion!!");                    
                }else if(r == 3){
                    alert("Error!! No se ha podido subir el Archivo!!");                    
                }else if(r == 9){
                    alert("Error!!...Sólo se permiten archivos PDF");                    
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
    $('#add_new_tipo_representacion').click(function(){
        
        var datos = $('#fr_add_new_tipo_representacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/paritarias/nuevo_tipo_representacion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#descripcion').val('');
                    $('#descripcion').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Registro Existente!!");
                    $('#descripcion').val('');
                    $('#descripcion').focus('');
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
** GUARDA ACTUALIZACION DE  REGISTRO
*/

$(document).ready(function(){
    $('#update_tipo_representacion').click(function(){
        
        var datos = $('#fr_update_tipo_representacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/paritarias/update_tipo_representacion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Actualizado Exitosamente!!");
                    console.log("Datos: " + datos);
                    window.location.href = 'main.php';
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
        alert('Ha seleccionado un casillero sin fecha');
    }else{
        alert('Día Seleccionado: ' + dia);
    }
  
})
});


function callCalendar(){
    
    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=600,height=800,left=1100,right=200,top=80`;
    
    open("../calendar/index.php", "calendar", params);
    
    
}
