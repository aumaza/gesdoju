// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE SEGMENTACION TEMATICA
*/

$(document).ready(function(){
    $('#add_segmentacion').click(function(){
        
        var datos = $('#fr_add_new_segmentacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/nueva_segmentacion.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#clas_inst').val('');
                    $('#jurisdiccion').val('');
                    $('#saf').val('');
                    $('#cod_sirhu').val('');
                    $('#desc_org').val('');
                    $('#reg_paritario').val('');
                    $('#cod_estatuto').val('');
                    $('#reg_laboral').val('');
                    $('#convenio').val('');
                    $('#ub_fis').val('');
                    $('#clas_inst').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Representante Existente!!");
                    $('#clas_inst').val('');
                    $('#jurisdiccion').val('');
                    $('#saf').val('');
                    $('#cod_sirhu').val('');
                    $('#desc_org').val('');
                    $('#reg_paritario').val('');
                    $('#cod_estatuto').val('');
                    $('#reg_laboral').val('');
                    $('#convenio').val('');
                    $('#ub_fis').val('');
                    $('#clas_inst').focus('');
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
    $('#update_segmentacion').click(function(){
        
        var datos = $('#fr_update_segmentacion_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/update_segmentacion.php",
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