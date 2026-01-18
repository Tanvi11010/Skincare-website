<?php
include("config.php");
session_start(); // Make sure session is started at the top

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if ($user['account_status'] != 'Active') {
            setcookie("msg", "❌ Your account is not verified. Please check your email.", time() + 5, "/");
            header("Location: login.php");
            exit();
        }

        if ($password === $user['password']) {  // Not hashed
            // Set session variables based on role
            if ($user['account_type'] === 'Admin') {
                $_SESSION['admin_name']  = $user['fullname'];
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_role']  = $user['account_type'];
                setcookie("msg", "✅ Welcome Admin!", time() + 5, "/");
                header("Location: admin2.php");
            } else {
                $_SESSION['user_id'] = $user['id']; // after successful login
                $_SESSION['user_name']  = $user['fullname'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role']  = $user['account_type'];
                $_SESSION['profile_pic'] = $user['profile_pic'];
                setcookie("msg", "✅ Login successful!", time() + 5, "/");
                header("Location: index.php");
            }
            exit();
        } else {
            setcookie("msg", "❌ Invalid email or password.", time() + 5, "/");
            header("Location: login.php");
            exit();
        }
    } else {
        setcookie("msg", "❌ Invalid email or password.", time() + 5, "/");
        header("Location: login.php");
        exit();
    }
} else {
    setcookie("msg", "⚠️ Invalid request.", time() + 5, "/");
    header("Location: login.php");
    exit();
}
?>
