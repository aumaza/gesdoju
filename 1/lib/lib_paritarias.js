// ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE GRUPO
*/

$(document).ready(function(){
    $('#add_new_paritaria').click(function(){
        
        var datos = $('#fr_add_new_paritaria_ajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"../lib/nueva_paritaria.php",
            data:datos,
            success:function(r){
                if(r == 1){
                    alert("Registro Guardado Exitosamente!!");
                    $('#grupo_representante').val('');
                    $('#tipo_representacion').val('');
                    $('#fecha_reunion').val('');
                    $('#resumen_reunion').val('');
                    $('#grupo_representante').focus('');
                    console.log("Datos: " + datos);
                }else if(r == -1){
                    alert("Error. Hubo un problema al intentar guardar el registro");
                    console.log("Datos: " + datos);
                }else if(r == 5){
                    alert("Error, Hay campos sin completar!!");
                    console.log("Datos: " + datos);
                }else if(r == 4){
                    alert("Error. Representante Existente!!");
                    $('#grupo_representante').val('');
                    $('#tipo_representacion').val('');
                    $('#fecha_reunion').val('');
                    $('#resumen_reunion').val('');
                    $('#grupo_representante').focus('');
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
** BLOQUEA LOS CAMPOS A EDITAR HASTA QUE EL USUARIO SELECCIONE EL QUE DESEA
*/
 var callEnableParitaria = function(x){
            
    if((x == 'grupo_representante') || 
                (x == 'fecha_desde') ||
                    (x == 'fecha_hasta')){
                
        document.getElementById(x).disabled = false;
    
    }
}
