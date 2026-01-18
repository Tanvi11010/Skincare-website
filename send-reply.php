<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
require 'config.php';

if (isset($_POST['message_id']) && isset($_POST['reply_message'])) {
    $messageId = (int) $_POST['message_id'];
    $replyMessage = trim($_POST['reply_message']);

    // Fetch user email from DB
    $query = "SELECT name, email FROM contact_us_messages WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $messageId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $to = $row['email'];
        $name = $row['name'];

        $mail = new PHPMailer(true);

        try {
            // SMTP setup
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // e.g., smtp.gmail.com
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sbloch234@rku.ac.in'; // your SMTP username
            $mail->Password   = 'srvu mkce okva fnhp';              // your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // or ENCRYPTION_SMTPS
            $mail->Port       = 587; // use 465 for SSL

            // Email headers
            $mail->setFrom('sbloch234@rku.ac.in', 'SkinZone');
            $mail->addAddress($to, $name);
            $mail->addReplyTo('sbloch234@rku.ac.in');

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Re: Your Contact Message';
            $mail->Body    = "
                <p>Dear " . htmlspecialchars($name) . ",</p>
                <p>" . nl2br(htmlspecialchars($replyMessage)) . "</p>
                <p><br>Best regards,<br>Your Support Team</p>
            ";
            $mail->AltBody = strip_tags($replyMessage);

            $mail->send();
            echo "Reply sent successfully.";
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Message not found.";
    }
} else {
    echo "Invalid request.";
}
?>
