<?php
include "config.php";

$id = $_GET['id'];
$query = "DELETE FROM categories WHERE id = $id";

if (mysqli_query($con, $query)) {
    header("Location: manage_categories.php");
} else {
    echo "Error deleting category: " . mysqli_error($con);
}
?>
