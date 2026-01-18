<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "db_skincare"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL query
    $sql = "INSERT INTO contact_us_messages (name, email, mobile_number, subject, message)
            VALUES ('$name', '$email', '$mobile_number', '$subject', '$message')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        echo "Your message has been submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
