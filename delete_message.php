<?php
include "config.php";
if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    mysqli_query($con, "DELETE FROM contact_us_messages WHERE id = $id");
    echo "Message deleted.";
}
