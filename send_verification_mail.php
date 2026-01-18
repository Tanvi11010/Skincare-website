<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

function sendVerificationEmail($email, $name, $token) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sbloch234@rku.ac.in'; // Your Gmail
        $mail->Password   = 'srvu mkce okva fnhp';   // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender & Receiver
        $mail->setFrom('sbloch234@rku.ac.in', 'Skin Zone');
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Account Verification - Skin Zone';

        $link = "http://localhost/yourfolder/verify.php?email=$email&token=$token";

        $mail->Body = "
            Hi $name,<br><br>
            Please click the link below to verify your email and activate your account:<br>
            <a href='$link'>$link</a><br><br>
            Thanks,<br>
            Skin Zone Team
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
