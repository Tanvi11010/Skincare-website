<?php
include "config.php"; // Include database connection

// Check if the message ID is passed
if (isset($_POST['message_id']) && !empty($_POST['message_id'])) {
    // Sanitize the input
    $messageId = (int) $_POST['message_id'];

    // Check if the message ID is valid
    if ($messageId > 0) {
        // Use prepared statements to prevent SQL injection
        $query = "DELETE FROM contact_us_messages WHERE id = ?";
        
        if ($stmt = mysqli_prepare($con, $query)) {
            // Bind the message ID parameter
            mysqli_stmt_bind_param($stmt, "i", $messageId);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo json_encode(["status" => "success", "message" => "Message deleted successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to delete the message"]);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to prepare the delete query"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid message ID"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Message ID not provided"]);
}
?>
