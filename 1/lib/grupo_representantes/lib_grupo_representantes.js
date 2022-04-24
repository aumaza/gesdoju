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
                    $('#representante').val('');
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
                    $('#representante').val('');
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
