<?php
include "config.php";
if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $query = "SELECT status FROM contact_us_messages WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $newStatus = ($row['status'] === 'read') ? 'unread' : 'read';
        mysqli_query($con, "UPDATE contact_us_messages SET status = '$newStatus' WHERE id = $id");
        echo $newStatus;
    }
}
