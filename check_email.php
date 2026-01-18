<?php
$conn = new mysqli("localhost", "root", "", "db_skincare"); // change db name if needed

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}
?>
