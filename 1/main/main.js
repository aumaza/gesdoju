// ESTRUCTURA TABLE

 $(document).ready(function(){
      
      $('#myTable').DataTable({
        "order": [[0, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "dom":  "Bfrtip",
        buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' )
                        .prepend(
                            '<img src="../../img/justice.jpg" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'This print was produced using the Print button for DataTables',
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
 

// LIMITAR CARACTERES
function limitText(limitField, limitNum) {
       if (limitField.value.length > limitNum) {
          
           alert("Ha ingresado m�s caracteres de los requeridos, deben ser: \n" + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
       
       if(limitField.value.lenght < limitNum){
	  alert("Ha ingresado menos caracteres de los requeridos, deben ser:  \n"  + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
}



/*
** FUNCION QUE BLOQUEA EL BOTON BACK DEL NAVEGADOR
*/
function nobackbutton(){

    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    
    window.onhashchange = function(){
        window.location.hash = "no-back-button";
    }
    
}


/*
** MUESTRA TOOLTIP
*/
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});


function callAdminExplorer(){
    
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=2000,height=650,left=70,right=80,top=200`;
    
    open("../fmanager/ft2.php", "adminExplorer", params);
 
}


function callExplorer(){
    
    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=1300,height=550,left=200,top=200`;
    
    open("../explorer/index.php", "explorer", params);
 
}

