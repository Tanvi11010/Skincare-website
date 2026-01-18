<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM users WHERE id = $id");

    echo "<script>alert('User deleted successfully'); window.location.href='manage_user.php';</script>";
} else {
    echo "User ID not provided.";
}
?>
