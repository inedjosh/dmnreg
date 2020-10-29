<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

function sendMail($from, $to, $subject, $body){

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'inedujoshua@gmail.com';                     // SMTP username
        $mail->Password   = 'Inedujoshua10';                               // SMTP password
        $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom($from, 'DMN');
        $mail->addAddress($to);     // Add a recipient
        // $mail->addAddress('inedujoshuatech@gmail.com');               // Name is optional
        $mail->addReplyTo('inedujoshua@gmail.com', 'Help Desk');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->headers = 'From: inedujoshua@gmail.com';
        // $mail->headers .= 'MIME-Version: 1.0' . '\r\n';
        // $mail->headers .= 'Content-type:text/html;charset=UTF-8'. '\r\n';
    
        if($mail->send()){
        return true;
        } else{}
    } catch (Exception $e) {
        return false;
        return $mail->ErrorInfo;
    }
}