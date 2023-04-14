<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//Enable SMTP debugging.  
$mail->SMTPDebug = 2; //3
$mail->Debugoutput = function($str, $level) {
    file_put_contents('smtp.log', gmdate('Y-m-d H:i:s'). "\t$level\t$str\n", FILE_APPEND | LOCK_EX);
};                            
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = $username;                 
$mail->Password = $password;                    
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to
$mail->Port = 465;

// $mail->SMTPOptions = array(
//     'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//     )
// );

//From email address and name
$mail->From = $username;
$mail->FromName = "Online Clearance Portal";

//To address and name
$mail->addAddress($recipient, $recipient_name);

//Address to which recipient will reply
$mail->addReplyTo($username, "Reply");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = $alt_body; //This is the plain text version of the email content

$sent = false;

try {
    $mail->send();
    echo "OCP_MAIL_SUCCESS";

    $sent = true;
} catch (Exception $e) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
}
