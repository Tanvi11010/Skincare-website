<?php
include 'config.php'; // Make sure the database connection is included

// Get message ID from the request
$messageId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($messageId > 0) {
    // Fetch message details from the database
    $query = "SELECT * FROM contact_us_messages WHERE id = $messageId";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Return the message details in HTML format (you can customize this part)
            echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Subject:</strong> " . htmlspecialchars($row['subject']) . "</p>";
            echo "<p><strong>Message:</strong> " . nl2br(htmlspecialchars($row['message'])) . "</p>"; // Assuming 'message' is the column name
            echo "<p><strong>Date:</strong> " . htmlspecialchars($row['created_at']) . "</p>";
        } else {
            echo "<div class='text-danger text-center'>Message not found.</div>";
        }
    } else {
        echo "<div class='text-danger text-center'>Failed to fetch message details.</div>";
    }
} else {
    echo "<div class='text-danger text-center'>Invalid message ID.</div>";
}
?>
