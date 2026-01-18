<?php
include "config.php";

if (isset($_POST['message_id']) && !empty($_POST['message_id'])) {
    $messageId = (int) $_POST['message_id'];

    if ($messageId > 0) {
        // Get current status
        $checkQuery = "SELECT status FROM contact_us_messages WHERE id = ?";
        if ($checkStmt = mysqli_prepare($con, $checkQuery)) {
            mysqli_stmt_bind_param($checkStmt, "i", $messageId);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_bind_result($checkStmt, $currentStatus);
            mysqli_stmt_fetch($checkStmt);
            mysqli_stmt_close($checkStmt);

            $newStatus = ($currentStatus === 'read') ? 'unread' : 'read';

            $updateQuery = "UPDATE contact_us_messages SET status = ? WHERE id = ?";
            if ($updateStmt = mysqli_prepare($con, $updateQuery)) {
                mysqli_stmt_bind_param($updateStmt, "si", $newStatus, $messageId);

                if (mysqli_stmt_execute($updateStmt)) {
                    echo "Message marked as $newStatus";
                } else {
                    echo "Failed to update status";
                }

                mysqli_stmt_close($updateStmt);
            } else {
                echo "Failed to prepare update";
            }
        } else {
            echo "Failed to prepare select query";
        }
    } else {
        echo "Invalid message ID";
    }
} else {
    echo "Message ID not provided";
}
?>
