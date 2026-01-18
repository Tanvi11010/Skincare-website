<?php
include "config.php";

$messageId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT name, email, subject,mobile_number, message FROM contact_us_messages WHERE id = $messageId";
$result = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div>
        <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
        <p><strong>Mobile:</strong> <?= htmlspecialchars($row['mobile_number']) ?></p>
        <p><strong>Subject:</strong> <?= htmlspecialchars($row['subject']) ?></p>
        <p><strong>Message:</strong><br><?= nl2br(htmlspecialchars($row['message'])) ?></p>
    </div>
    <?php
} else {
    echo "<div class='text-danger'>Message not found.</div>";
}
?>
