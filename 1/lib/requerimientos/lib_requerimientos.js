// ESTRUCTURA TABLA REQUERIMIENTOS

$(document).ready(function(){ 

      $('#requerimientosTable').DataTable({
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
                messageTop: 'Listado Requerimientos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado Requerimientos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                customize: function(doc) {
                  doc.content[0].text = "Listado Requerimientos";
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
                messageTop: 'Listado Requerimientos',
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
                messageTop: 'Listado Requerimientos',
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
** GUARDA NUEVO REGISTRO DE REQUERIMIENTO
*/
$(document).ready(function(){
    $('#add_new_requerimiento').click(function(){
        
        
        const form = document.querySelector('#fr_add_new_requerimiento_ajax');
        
        const usuario_solicitante = document.querySelector('#usuario_solicitante');
        const tipo_solicitud = document.querySelector('#tipo_solicitud');
        const descripcion_modulo = document.querySelector('#descripcion_modulo');
        const descripcion_requerimiento = document.querySelector('#requerimiento');
        
                
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('usuario_solicitante', usuario_solicitante.value);
        formData.append('tipo_solicitud', tipo_solicitud.value);
        formData.append('descripcion_modulo', descripcion_modulo.value);
        formData.append('descripcion_requerimiento', descripcion_requerimiento.value);
        
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../lib/requerimientos/add_requerimiento.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Su Solicitud ha sido Enviada!</p></div>`;
                    document.getElementById('messageNewRequerimiento').innerHTML = mensaje;
                    $('#tipo_solicitud').val('');
                    $('#descripcion_modulo').val('');
                    $('#requerimiento').val('');
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    setTimeout(function() { $("#btn_cancelar").click(); }, 6000);

                }else if(r == -1){
                    var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. No se pudo enviar su Solicitud!</p></div>`;
                    document.getElementById('messageNewRequerimiento').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>`;
                    document.getElementById('messageNewRequerimiento').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 13){
                    var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>`;
                    document.getElementById('messageNewRequerimiento').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }

                
            }
        });

        return false;
    
});
});


/*
** GUARDA AVANCE REGISTRO DE REQUERIMIENTO
*/
$(document).ready(function(){
    $('#add_advance_requerimiento').click(function(){
        
        
        const form = document.querySelector('#fr_add_advance_requerimiento_ajax');
        
        const req_id = document.querySelector('#reqId');
        const desarrollador = document.querySelector('#desarrollador');
        const descripcion_avance = document.querySelector('#descripcion_avance');
        const estado_requerimiento = document.querySelector('#estado_requerimiento');
                
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('req_id', req_id.value);
        formData.append('desarrollador', desarrollador.value);
        formData.append('descripcion_avancees', descripcion_avance.value);
        formData.append('estado_requerimiento', estado_requerimiento.value);
        
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../lib/requerimientos/advance_requerimiento.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> El avance ha sido Enviado!</p></div>`;
                    document.getElementById('messageAddAdvanceRequerimiento').innerHTML = mensaje;
                    $('#descripcion_avance').val('');
                    $('#esatdo_requerimiento').val('');
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    setTimeout(function() { $("#btn_cancelar").click(); }, 6000);

                    var form = $('<form action="#" method="post">' +
                      '<input type="hidden" name="requerimientos" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();

                }else if(r == -1){
                    var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error. No se pudo enviar su avance!</p></div>`;
                    document.getElementById('messageAddAdvanceRequerimiento').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 5){
                    var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>`;
                    document.getElementById('messageAddAdvanceRequerimiento').innerHTML = mensaje;
                    console.log("Datos: " + values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                }else if(r == 13){
                    var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p align=center><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Error de conexion!!</p></div>`;
                    document.getElementById('messageAddAdvanceRequerimiento').innerHTML = mensaje;
                    setTimeout(function() { $(".close").click(); }, 4000);
                }

                
            }
        });

        return false;
    
});
});


$(document).ready(function(e) {
  $('#modalAddAvanceReq').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#reqId').val(id);
  });
});