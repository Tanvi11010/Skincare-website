<?php
try {
    $con = mysqli_connect("localhost", "root", "","Mystore");
    // echo "Connected successfully";
    // 1 time process 
    // $db = "create database Mystore";
    // try {
    //     if ($con->query($db)) {
    //         echo "Database created successfully with the name Mystore";
    //     }
    // } catch (Exception $e) {
    //     echo "error in creating database";
    // }

    try {
        $con->select_db("Mystore");
    } catch (Exception $e) {
        echo "error in selecting database";
    }

    //-----------------------------------
    //table creation is one time process
//     $categoryTable = "CREATE TABLE IF NOT EXISTS categories (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(100) NOT NULL,
//         description TEXT NULL,
//         status ENUM('active', 'inactive') DEFAULT 'active',
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     )";
    
//     if ($con->query($categoryTable)) {
//         echo "✅ Category table created successfully";
//     } else {
//         echo "❌ Error creating category table: " . $conn->error;
//     }
//     //Product table
//     $productTable = "CREATE TABLE IF NOT EXISTS products (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(150) NOT NULL,
//         mrp DECIMAL(10,2) NOT NULL,
//         price DECIMAL(10,2) NOT NULL,
//         category_id INT NOT NULL,
//         brand VARCHAR(100) NOT NULL,
//         quantity INT NOT NULL,
//         image VARCHAR(255) NULL,
//         description TEXT NULL,
//         status ENUM('active', 'inactive') DEFAULT 'active',
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//         FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
//     )";
    
//     if ($con->query($productTable)) {
//         echo "✅ Product table created successfully";
//     } else {
//         echo "❌ Error creating product table: " . $con->error;
//     }
//     //Offer table
//     $offerTable = "CREATE TABLE IF NOT EXISTS offers (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         offer_name VARCHAR(100) NOT NULL,
//         description TEXT NULL,
//         discount DECIMAL(5,2) NOT NULL,
//         start_date DATE NOT NULL,
//         end_date DATE NOT NULL,
//         status ENUM('active', 'inactive') DEFAULT 'active',
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     )";
    
//     if ($con->query($offerTable)) {
//         echo "✅ Offer table created successfully";
//     } else {
//         echo "❌ Error creating offer table: " . $con->error;
//     }
//     // Users Table (Authentication)
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    profile_picture VARCHAR(255) DEFAULT NULL,
    address TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    account_status ENUM('active', 'inactive') DEFAULT 'active',
    account_type ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($con->query($usersTable)) {
    echo "✅ Users table created successfully<br>";
} else {
    echo "❌ Error creating users table: " . $con->error . "<br>";
}

// // User Profiles Table
// $userProfilesTable = "CREATE TABLE IF NOT EXISTS user_profiles (
//     id INT PRIMARY KEY AUTO_INCREMENT,
//     user_id INT NOT NULL,
//     name VARCHAR(100) NOT NULL,
//     address VARCHAR(255) NULL,
//     profile_picture VARCHAR(255) NULL,
//     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
// )";

// if ($con->query($userProfilesTable)) {
//     echo "✅ User Profiles table created successfully<br>";
// } else {
//     echo "❌ Error creating user profiles table: " . $con->error . "<br>";
// }


//-----------------------------------------------------------------------------
} catch (Exception $e) {
    echo "Error:Error in connecting to the database";
}
