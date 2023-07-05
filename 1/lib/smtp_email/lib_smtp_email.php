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
    //$mail->addAddress('jcarus@mecon.gov.ar', 'Jorge Caruso');     //Add a recipient
    //$mail->addAddress('sboiarov@mecon.gov.ar', 'Sonia Boiarov');
    $mail->addAddress('develslack@gmail.com', 'Slackzone Development');
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, 'Administrador Gesdo');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gesdo - Email automático - Paritarias';
    $mail->Body    = '<h2>Este es un email automático <b>No Responder!</b></h2><hr> <h3>Se ha dado de alta un nuevo registro en Paritarias con los siguientes datos:</h3> <hr><br><strong>Actuación:</strong> '.$nro_actuacion.'<hr><strong>Tipo Representación:</strong> '.$tipo_representacion.'<hr><strong>Tipo de Solicitud:</strong> '.$tipo_pedido.'<hr><strong>Organismo:</strong> '.$organismo.'<hr><br><br><br>
        <p align=center>GESDO - <strong>Dirección Nacional de Seguimiento de la Inversión en Capital Humano del Sector Público Nacional</strong></p>';
    
    if($mail->send()){
        $success = 'Mail se ha enviado correctamente / Fecha: ';
        emailLogs($success);
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
    $mail->addAddress('debianmaza@gmail.com', 'Augusto Maza');     //Add a recipient
    //$mail->addAddress('aumaza@mecon.gov.ar', 'Augusto Maza');
    //$mail->addAddress('develslack@gmail.com', 'Slackzone Development');
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, 'Administrador Gesdo');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    
    $mail->Subject = 'Gesdo - Email automático - Fechas Paritarias';
    $mail->Body    = 'Este es un email automático <b>No Responder!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        $success = 'El Mail se ha enviado correctamente...';
        emailLogs($success);
    }
} catch (Exception $e) {
    $error = 'Hubo un problema al intentar enviar el mail...' .$mail->ErrorInfo;
    emailLogs($error);
    
}

} // fin de la function

?>