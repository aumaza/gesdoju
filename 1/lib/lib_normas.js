// INSERTAR NUEVO REGISTRO EN NORMAS
$(document).ready(function(){
    $('#add_normativa').click(function(){
        //var datos=$('#fr_nueva_norma_ajax').serialize();
         var data = new FormData();
         var form_data = $('#fr_nueva_norma_ajax').serializeArray();
            
         $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
         });
        
         //Custom data
        data.append('key', 'value');
         
         
         $.ajax({
            type:"POST",
            url:"../lib/insertar_normas.php",
            processData: false,
            contentType: false,
            data:data,
            success:function(r){
                if(r == 1){
                    alert("Normativa Agregada Exitosamente");
                     $('#nombre_norma').val('');
                     $('#n_norma').val('');
                     $('#t_norma').val('');
                     $('#foro_norma').val('');
                     $('#f_pub').val('');
                     $('#anio').val('');
                     $('#organismo').val('');
                     $('#jurisdiccion').val('');
                     $('#ub_fis').val('');
                     $('#observaciones').val('');
                     $('#nombre_norma').focus();
                    console.log(data);
                    }else if(r == -1){
                        alert("Hubo un problema al intentar Agregar el registro");
                        console.log(data);
                    }
                    else if(r == 3){
                        alert("Hay campos sin completar!!");
                        console.log(data);
                    }
                    else if(r == 2){
                        alert("Verifique los permisos del directorio destino del archivo a subir");
                        console.log(data);
                    }
                    else if(r == 5){
                        alert("Sólo se permiten archivos PDF");
                        console.log(data);
                    }
                    else if(r == 7){
                        alert("Aún no ha seleccionado el archivo a subir");
                        console.log(data);
                    }
                    else if(r == ''){
                        console.log(data);
                    }
            },
            
        });

        return false;
    });
});
