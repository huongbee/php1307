<?php
header('Content-Type: text/html; charset=utf-8');
function Mailer($tenNguoinhan,$emailNhan,$tieudeMail,$noidungMail){

    require "PHPMailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    $mail->CharSet = 'UTF-8';    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();    
                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'huonghuong08.php@gmail.com';                 // SMTP username
        $mail->Password = '0123456789999';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 
        $mail->Port = 587;
        //`ssl` also accepted
        //$mail->SMTPSecure = 'ssl'; 
        //$mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('huonghuong08.php@gmail.com', 'Người gửi');
        $mail->addAddress($emailNhan, $tenNguoinhan);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $tieudeMail;
        $mail->Body    = $noidungMail;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}

?> 