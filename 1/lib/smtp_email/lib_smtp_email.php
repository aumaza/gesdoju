<?php include "../../3rdparty/vendor/autoload.php";
      include "../system/lib_system.php";
      
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\GoogleOauthClient;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\OAuth;


function sendEmailParitaria($conn,$dbase){

// se consultan los datos de la cuenta de email
$sql = "select * from mail_properties where id = 1";

// se realiza la consulta
mysqli_select_db($conn,$dbase);
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
    $provider = $row['provider'];
    $email = $row['email'];
    $google_id_client = $row['client_id'];
    $google_secret_client = $row['secret_client'];
    $refreshToken = $row['refresh_token'];
    $host = $row['host'];
    $port = $row['host_port'];
}

// SE CONSULTAN LOS DATOS DE PARITARIA CARGADA
$sql_1 = "select nro_actuacion, tipo_representacion, tipo_pedido, organismo from representacion_paritarias order by id desc limit 1";
// SE REALIZA EL QUERY
$query_1 = mysqli_query($conn,$sql_1);
while($row_1 = mysqli_fetch_array($query_1)){
    $nro_actuacion = $row_1['nro_actuacion'];
    $tipo_representacion = $row_1['tipo_representacion'];
    $tipo_pedido = $row_1['tipo_pedido'];
    $organismo = $row_1['organismo'];
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {
    
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->Mailer = 'smtp';
    $mail->SMTPKeepAlive = true;  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    //$mail->SMTPAutoTLS = false;
    $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set 
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
    
    // Set AuthType to use XOAUTH2
    $mail->AuthType = 'XOAUTH2';

      // Create a new OAuth2 provider instance
      $provider = new Google(
        [
            "clientId" => $google_id_client,
            "clientSecret" => $google_secret_client,
        ]
      );

      // Pass the OAuth provider instance to PHPMailer
      $mail->setOAuth(
        new OAuth(
            [
                "provider" => $provider,
                "clientId" => $google_id_client,
                "clientSecret" => $google_secret_client,
                "refreshToken" => $refreshToken,
                "userName" => $email,
            ]
        )
      );

    //Recipients
    $mail->setFrom($email, 'Administrador Gesdo');
    $mail->addAddress('jcarus@mecon.gov.ar', 'Jorge Caruso');     //Add a recipient
    $mail->addAddress('sboiarov@mecon.gov.ar', 'Sonia Boiarov');
    $mail->addBCC('develslack@gmail.com', 'Slackzone Development');
    $mail->addReplyTo($email, 'Administrador Gesdo');
    
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gesdo - Email automático - Paritarias';
    $mail->Body    = '<h2>Este es un email automático <b>No Responder!</b></h2><hr> <h3>Se ha dado de alta un nuevo registro en Paritarias con los siguientes datos:</h3> <hr><br><strong>Actuación:</strong> '.$nro_actuacion.'<hr><strong>Tipo Representación:</strong> '.$tipo_representacion.'<hr><strong>Tipo de Solicitud:</strong> '.$tipo_pedido.'<hr><strong>Organismo:</strong> '.$organismo.'<hr><br><br><br>
        <p align=center>GESDO - <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></p>';

    $script = '<script type="text/javascript">
                alert("Paritaria guardada Existosamente. Continuar.");
                var form = $(`<form action="#" method="post"><input type="hidden" name="paritarias" /></form>`);
                    $("body").append(form);
                    form.submit();
                </script>';
    
    if($mail->send()){
        $success = 'Mail se ha enviado correctamente / Fecha: ';
        emailLogs($success);
        echo $script;
    }
} catch (Exception $e) {
    $error = 'Hubo un problema al intentar enviar el mail: ' .$mail->ErrorInfo;
    emailLogs($error);
    
}

}// fin de la function


function sendEmailParitariaFutura($conn,$dbase){


// se consultan los datos de la cuenta de email
$sql = "select * from mail_properties where id = 1";

// se realiza la consulta
mysqli_select_db($conn,$dbase);
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
    $provider = $row['provider'];
    $email = $row['email'];
    $google_id_client = $row['client_id'];
    $google_secret_client = $row['secret_client'];
    $refreshToken = $row['refresh_token'];
    $host = $row['host'];
    $port = $row['host_port'];
}

// SE CONSULTA EL ULTIMO AVANCE PARITARIA
$sql_1 = "select ap.asunto,
       ap.organismo,
       ap.tipo_representacion,
       ap.grupo,
       ap.fecha_prox_reunion,
       SUBSTR(gr.representante_titular,12) as representante_1,
       (select email_representante from representantes where nombre_representante = SUBSTR(gr.representante_titular,12)) as email_1,
       SUBSTR(gr.representante_suplente,12) as representante_2,
       (select email_representante from representantes where nombre_representante = SUBSTR(gr.representante_suplente,12)) as email_2,
       SUBSTR(gr.primer_asesor,12) as representante_3,
       (select email_representante from representantes where nombre_representante = SUBSTR(gr.primer_asesor,12)) as email_3,
       SUBSTR(gr.segundo_asesor,12) as representante_4,
       (select email_representante from representantes where nombre_representante = SUBSTR(gr.segundo_asesor,12)) as email_4
       from avances_paritaria as ap
       left join grupo_representantes as gr on gr.nombre_grupo = ap.grupo
       order by ap.id DESC limit 1";

// SE REALIZA EL QUERY
$query_1 = mysqli_query($conn,$sql_1);
while($row_1 = mysqli_fetch_array($query_1)){
    $asunto = $row_1['asunto'];
    $organismo = $row_1['organismo'];
    $tipo_representacion = $row_1['tipo_representacion'];
    $grupo = $row_1['grupo'];
    $fecha_prox_reunion = $row_1['fecha_prox_reunion'];
    $titular = $row_1['representante_1'];
    $email_1 = $row_1['email_1'];
    $suplente = $row_1['representante_2'];
    $email_2 = $row_1['email_2'];
    $asesor_1 = $row_1['representante_3'];
    $email_3 = $row_1['email_3'];
    $asesor_2 = $row_1['representante_4'];
    $email_4 = $row_1['email_4'];
}


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {
    
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->Mailer = 'smtp';
    $mail->SMTPKeepAlive = true;  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    //$mail->SMTPAutoTLS = false;
    $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set 
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
    
    // Set AuthType to use XOAUTH2
    $mail->AuthType = 'XOAUTH2';

      // Create a new OAuth2 provider instance
      $provider = new Google(
        [
            "clientId" => $google_id_client,
            "clientSecret" => $google_secret_client,
        ]
      );

      // Pass the OAuth provider instance to PHPMailer
      $mail->setOAuth(
        new OAuth(
            [
                "provider" => $provider,
                "clientId" => $google_id_client,
                "clientSecret" => $google_secret_client,
                "refreshToken" => $refreshToken,
                "userName" => $email,
            ]
        )
      );

    //Recipients
    $mail->setFrom($email, 'Administrador Gesdo');
    //$mail->addAddress('debianmaza@gmail.com', 'Augusto Maza');
    $mail->addAddress($email_1, $titular);     //Add a recipient
    $mail->addAddress($email_2, $suplente);
    $mail->addAddress($email_3, $asesor_1);
    $mail->addAddress($email_4, $asesor_2);
    
    $mail->addReplyTo($email, 'Administrador Gesdo');
    
    //$mail->addBCC('jcarus@mecon.gov.ar', 'Jorge Caruso');
    //$mail->addBCC('sboiarov@mecon.gov.ar', 'Sonia Boiarov');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    
    $mail->Subject = 'Gesdo - Email automático - Avances Paritaria';
    $mail->Body    = '<h2>Este es un email automático <b>No Responder!</b></h2><hr> <h3>Se ha dado de alta un nuevo registro en Avances Paritaria con los siguientes datos:</h3> <hr><br>
       <strong>Asunto:</strong> '.$asunto.'<hr>
       <strong>Tipo Representación:</strong> '.$tipo_representacion.'<hr>
        <strong>Grupo Representante:</strong> '.$grupo.'<hr><strong>Organismo:</strong> '.$organismo.'<hr>
        <strong>Fecha Próxima Reunión:</strong> '.$fecha_prox_reunion.'<hr>
        <strong>Representante Titular:</strong> '.$titular.'<hr>
        <strong>Representante Suplente:</strong> '.$suplente.'<hr>
        <strong>Primer Asesor:</strong> '.$asesor_1.'<hr>
        <strong>Segundo Asesor:</strong> '.$asesor_2.'<hr><br><br>
        <p align=center>GESDO - <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></p>';

    
    $script = '<script type="text/javascript">
                alert("Avance Paritaria guardado Existosamente. Continuar.");
                var form = $(`<form action="#" method="post"><input type="hidden" name="paritarias" /></form>`);
                    $("body").append(form);
                    form.submit();
                </script>';
    

    if($mail->send()){
        $success = 'El Mail se ha enviado correctamente...';
        emailLogs($success);
        echo $script;
        
    }
} catch (Exception $e) {
    $error = 'Hubo un problema al intentar enviar el mail...' .$mail->ErrorInfo;
    emailLogs($error);
    
}

} // fin de la function

?>