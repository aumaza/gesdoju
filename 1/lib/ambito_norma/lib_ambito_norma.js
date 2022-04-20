// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO
*/

$(document).ready(function(){
    $('#add_ambito_norma').click(function(){
        
        var datos = $('#fr_add_new_ambito_norma_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/ambito_norma/nuevo_ambito_norma.php",
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
                    alert("Error. Ambito Norma Existente!!");
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
  
