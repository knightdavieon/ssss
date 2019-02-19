<?php 
   require("PHPMailer-5.2.25/class.phpmailer.php");
   require("PHPMailer-5.2.25/class.smtp.php");
 
   require("PHPMailer-5.2.25/class.phpmaileroauth.php");
   require("PHPMailer-5.2.25/PHPMailerAutoload.php");
    
    

    $mail = new PHPMailer(); 
    $mail->isSMTP(); 
    $mail->SMTPDebug = 2; 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; 
    $mail->isHTML(true);
    $mail->Username = "gamboajohnalfonso@gmail.com";
    $mail->Password = "Alexandria1234";
    $mail->SetFrom("gamboajohnalfonso@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("gamboajohnalfonso@gmail.com");
    
     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }

?>