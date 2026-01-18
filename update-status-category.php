<?php
include "config.php"; // Make sure this file connects to your DB

if (isset($_POST['categoryId']) && isset($_POST['status'])) {
    $id = intval($_POST['categoryId']);
    $status = $_POST['status'] === 'Active' ? 'Active' : 'Inactive';

    $query = "UPDATE categories SET status = '$status' WHERE id = $id";

    if (mysqli_query($con, $query)) {
        echo "Status updated successfully";
    } else {
        http_response_code(500);
        echo "Database update failed: " . mysqli_error($con);
    }
} else {
    http_response_code(400);
    echo "Invalid request";
}
?>
