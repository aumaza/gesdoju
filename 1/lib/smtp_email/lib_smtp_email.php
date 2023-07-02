<?php include "../../3rdparty/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\GoogleOauthClient;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendEmail(){
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->Mailer = 'smtp';
    $mail->SMTPKeepAlive = true;  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gesdo.app@gmail.com';                     //SMTP username
    $mail->Password   = 'proteo*310*311*';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->SMTPAutoTLS = false;
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set 
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
    $mail->AuthType = 'XOAUTH2';

    $google_id_client = '85759119171-9je341pirsnkdr9r78kc54lohlipncag.apps.googleusercontent.com';
    $google_secret_client = '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';

    //Create and pass GoogleOauthClient to PHPMailer
    $oauthTokenProvider = new GoogleOauthClient(
        'gesdo.app@gmail.com',
        'gmail-xoauth2-credentials.json',
        'gmail-xoauth-token.json'
    );
    $mail->setOAuth($oauthTokenProvider);
    

    //Recipients
    $mail->setFrom('gesdo.app@gmail.com', 'Administrador Gesdo');
    $mail->addAddress('debianmaza@gmail.com', 'Augusto Maza');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('gesdo.app@gmail.com', 'Administrador Gesdo');
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
        echo '<div class="alert alert-success">
                Message has been sent
              </div>';
    }
} catch (Exception $e) {
    echo '<div class="container">
            <div class="jumbotron">
              <div class="alert alert-danger">
                <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> 
                    Message could not be sent. Mailer Error: <strong>'.$mail->ErrorInfo.'</strong>
              </div>
            </div>
          </div>';
}

} // fin de la function