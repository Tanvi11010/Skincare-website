<?php
include("config.php");

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND token = ? AND account_status = 'Inactive'");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Activate account
        $update = $con->prepare("UPDATE users SET account_status = 'Active', token = '' WHERE email = ?");
        $update->bind_param("s", $email);
        $update->execute();

        // Redirect to login with success message
        header("Location: login.php?msg=verified");
        exit();
    } else {
        // Redirect to login with invalid/expired message
        header("Location: login.php?msg=invalid");
        exit();
    }
} else {
    // Redirect to login with general error
    header("Location: login.php?msg=error");
    exit();
}
?>
