<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['category_name']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "INSERT INTO categories (category_name, description, status) VALUES ('$name', '$desc', '$status')";

    if (mysqli_query($con, $query)) {
        header("Location: manage_categories.php?success=1"); // change as needed
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
