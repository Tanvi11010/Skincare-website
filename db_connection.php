<?php
try {
    $con = mysqli_connect("localhost", "root", "","db_skincare");
    // echo "Connected successfully";
    // // 1 time process 
    // $db = " CREATE DATABASE db_skincare";
    // try {
    //     if ($con->query($db)) {
    //         echo "Database created successfully with the name db_skincare";
    //     }
    // } catch (Exception $e) {
    //     echo "error in creating database";
    // }

    try {
        $con->select_db("db_skincare");
    } catch (Exception $e) {
        echo "error in selecting database";
    }

    
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mobile VARCHAR(15) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    profile_pic VARCHAR(255) DEFAULT NULL,
    address TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    account_status ENUM('Active', 'Inactive') DEFAULT 'Inactive',
    account_type ENUM('Admin', 'User') DEFAULT 'User',
    token VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($con->query($usersTable)) {
    // echo "✅ Users table created successfully<br>";
} else {
    echo "❌ Error creating users table: " . $con->error . "<br>";
}

} catch (Exception $e) {
    echo "Error:Error in connecting to the database";
}
