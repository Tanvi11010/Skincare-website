<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "db_skincare");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data from form
$product_id = $_POST['product_id']; // Assume this is passed from the product page
$review_title = $_POST['review_title'];
$review_text = $_POST['review_text'];
$rating = $_POST['rating'];
$reviewer_name = $_POST['reviewer_name'];

// Insert the review into the database
$sql = "INSERT INTO reviews (product_id, review_title, review_text, rating, reviewer_name) 
        VALUES ('$product_id', '$review_title', '$review_text', '$rating', '$reviewer_name')";

if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to the product page
header("Location: product_details.php?id=$product_id");
exit();
