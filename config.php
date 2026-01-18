<?php
$con = new mysqli("localhost", "root", "", "db_skincare"); // replace with your DB
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>