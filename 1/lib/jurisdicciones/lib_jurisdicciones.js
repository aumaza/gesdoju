// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE ORGANISMO
*/

$(document).ready(function(){
    $('#add_jurisdiccion').click(function(){
        
        var datos = $('#fr_add_new_jurisdiccion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/jurisdicciones/nueva_jurisdiccion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#cod_jur').val('');
                    $('#descripcion').val('');
                    $('#cod_jur').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Jurisdicción Existente Existente!!");
                    $('#cod_jur').val('');
                    $('#descripcion').val('');
                    $('#cod_jur').focus('');
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
    $('#update_jurisdiccion').click(function(){
        
        var datos = $('#fr_update_jurisdiccion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/jurisdicciones/update_jurisdiccion.php",
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
