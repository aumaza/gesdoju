// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE ORGANISMO
*/

$(document).ready(function(){
    $('#add_tipo_organismo').click(function(){
        
        var datos = $('#fr_add_new_tipo_organismo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/tipo_organismo/nuevo_tipo_organismo.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#cod_tipo_org').val('');
                    $('#descripcion').val('');
                    $('#cod_tipo_org').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Tipo Organismo Existente!!");
                    $('#cod_tipo_org').val('');
                    $('#descripcion').val('');
                    $('#cod_tipo_org').focus('');
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
    $('#update_tipo_organismo').click(function(){
        
        var datos = $('#fr_update_tipo_organismo_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/tipo_organismo/update_tipo_organismo.php",
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
