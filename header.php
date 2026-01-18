
<?php

session_start();
ob_start(); 
include('db_connection.php');
include_once("mailer.php");
date_default_timezone_set('Asia/Kolkata');
$current_time = date("Y-m-d H:i:s");
$q = "UPDATE password_token 
SET otp_attempts = 0 
WHERE TIMESTAMPDIFF(HOUR, last_resend, NOW()) >= 24";
$con->query($q);
$remove_otp = "update password_token set otp=NULL WHERE expires_at < '$current_time'";
$con->query($remove_otp);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinZone</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>
     <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
         /* Navbar & Footer Background */
         .navbar,
        .footer {
            background: linear-gradient(135deg, rgb(58, 59, 61), rgb(58, 59, 61));
            color: white;
        }

        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .navbar .nav-link.active {
            color: rgba(255, 255, 255, 1) !important;
            font-weight: bold;
        }

        .navbar .navbar-brand {
            color: rgba(255, 255, 255, 1) !important;
        }

        .navbar-toggler {
            border-color: white;
        }

        .footer {
            padding: 20px 0;
            font-size: 14px;
            text-align: center;
        }

        .footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: rgb(58, 59, 61);
            font-size: 16px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            background-color: white;
            color: rgb(71, 75, 193);
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .login-container {
                max-width: 90%;
            }
        }

        .hero-section {
            background-color: #f8f9fa;
            padding: 60px 0;
            /* Reduced the top and bottom padding */
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }

        .carousel-caption h2,
        .carousel-caption p {
            color: #fff;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 40px 0 20px;
        }

        .product-section {
            text-align: center;
            padding: 40px 0;
            background-color: rgba(0, 0, 0, 0.1);
            /* Light black with opacity */
        }

        .btn-shop {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .btn-shop:hover {
            background-color: #0056b3;
        }
/* contact us  */
        .btn-outline-custom {
        color: rgb(58, 59, 61);
        border: 2px solid rgb(58, 59, 61);
        transition: 0.3s;
    }

    .btn-outline-custom:hover {
        background-color: rgb(58, 59, 61);
        color: white;
    }

    .info-box {
        border: 2px solid rgb(58, 59, 61);
        transition: 0.3s;
    }

    .info-box:hover {
        background-color: rgb(58, 59, 61);
        color: white;
    }

    .info-box i {
        margin-right: 10px;
        color: rgb(58, 59, 61);
    }

    .info-box:hover i {
        color: white;
    }

    
    .form-control:focus {
        border-color: rgb(58, 59, 61);
        box-shadow: 0 0 0 0.2rem rgba(58, 59, 61, 0.25);
    }
</style>
<style>
        /* Navbar & Footer Background */
        .navbar,
        .footer {
            background: linear-gradient(135deg, rgb(58, 59, 61), rgb(58, 59, 61));
            color: white;
        }

        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .navbar .nav-link.active {
            color: rgba(255, 255, 255, 1) !important;
            font-weight: bold;
        }

        .navbar .navbar-brand {
            color: rgba(255, 255, 255, 1) !important;
        }

        .navbar-toggler {
            border-color: white;
        }

        /* Custom style for the View button */
        .btn-view {
            background-color: #28a745;
            /* Green background */
            color: white;
            /* White text */
            border: 1px solid #28a745;
            /* Green border */
        }

        .btn-view:hover {
            background-color: #218838;
            /* Darker green on hover */
            color: white;
            /* Keep text white */
            border-color: #218838;
            /* Darker green border on hover */
        }

        .footer {
            padding: 20px 0;
            font-size: 14px;
            text-align: center;
        }

        .footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: rgb(58, 59, 61);
            font-size: 16px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            background-color: white;
            color: rgb(71, 75, 193);
        }



        /* Responsive Styling */
        @media (max-width: 768px) {
            .login-container {
                max-width: 90%;
            }
        }

        .gallery-img {
            width: 100%;
            height: auto;
        }

        .gallery-item {
            text-align: center;
            margin-bottom: 30px;
        }

        .description {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #555;
        }

        .cost {
            font-weight: bold;
            color: #e74c3c;
        }

        .carousel {
            max-width: 100%;
            /* Adjust the width */
            margin: auto;
            /* Center the carousel */
        }

        .carousel img {
            max-height: 900px;
            /* Reduce the image height */
            object-fit: cover;
            /* Ensure images fit well */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.jpg" alt="Logo" class="rounded-circle" width="40" height="40">
            <span class="ms-2">SkinZone</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
    <li class="nav-item"><a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link <?= ($currentPage == 'products.php') ? 'active' : '' ?>" href="products.php">Products</a></li>
    <li class="nav-item"><a class="nav-link <?= ($currentPage == 'contact.php') ? 'active' : '' ?>" href="contact.php">Contact Us</a></li>
    <li class="nav-item"><a class="nav-link <?= ($currentPage == 'about.php') ? 'active' : '' ?>" href="about.php">About Us</a></li>

    <?php if (isset($_SESSION['user_name'])): ?>
        <!-- Show when user is logged in -->
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'cart.php') ? 'active' : '' ?>" href="cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'wishlist.php') ? 'active' : '' ?>" href="wishlist.php">Wishlist</a></li>
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'profile.php') ? 'active' : '' ?>" href="profile.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'myorders.php') ? 'active' : '' ?>" href="myorders.php">My Orders</a></li>
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'rating&review.php') ? 'active' : '' ?>" href="rating&review.php">Rating & Review</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <li class="nav-item d-flex align-items-center">
    <a class="nav-link d-flex align-items-center text-white" href="edit_pro.php">
        <img src="profile_pictures/<?= htmlspecialchars($_SESSION['profile_pic'] ?? 'default.png') ?>" 
             alt="Profile" 
             class="rounded-circle me-2" 
             width="35" 
             height="35" 
             style="object-fit: cover;">
        <b><?= htmlspecialchars($_SESSION['user_name']) ?></b>
    </a>
</li>

    <?php else: ?>
        <!-- Show when user is not logged in -->
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'login.php') ? 'active' : '' ?>" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link <?= ($currentPage == 'register.php') ? 'active' : '' ?>" href="register.php">Register</a></li>
    <?php endif; ?>
</ul>

        </div>
    </div>
</nav>
