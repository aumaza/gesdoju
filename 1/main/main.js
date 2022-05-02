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

// CAPTURA DE CARACTERES NUMERICOS
function Numeros(string){
//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
             //Se a�aden a la salida los caracteres v�lidos
              out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permiten Números");
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
  
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
	     out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permite Texto");
	     }
	     }
    return out;
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
