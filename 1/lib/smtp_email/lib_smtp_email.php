<?php include "../../3rdparty/vendor/autoload.php";
      
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\GoogleOauthClient;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\OAuth;


function sendEmail($conn,$dbase){

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