<?php
include_once("auth.php"); // Ensures only logged-in users can access this page
include_once("connection.php");

// Fetch user details
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = $con->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Welcome, <?php echo htmlspecialchars($user['email']); ?>!</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Hello, <?php echo htmlspecialchars($user['email']); ?> 👋</h3>
        <p>Your account type: <?php echo htmlspecialchars($user['account_type']); ?></p>
        <p>Status: <?php echo htmlspecialchars($user['account_status']); ?></p>
    </div>
</body>
</html>
