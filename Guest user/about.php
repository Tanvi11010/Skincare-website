<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>
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
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg">
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About us</a></li> <!-- active link -->
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>




    <!-- About Section -->
    <div class="container py-5">
        <h2 class="text-center mb-4">About Us</h2>
        <p class="lead text-center">
            Welcome to SkinZone – Your Trusted Destination for Premium Skincare!
        </p>
        <p>
            At SkinZone, we believe that skincare is more than just a routine; it's a form of self-care that boosts confidence and enhances natural beauty. Our mission is to provide high-quality, carefully curated skincare products that cater to all skin types and concerns.
        </p>
        <p>
            We offer a wide range of skincare solutions, from hydrating moisturizers and nourishing serums to gentle cleansers and protective sunscreens. Whether you're looking for an everyday skincare routine or luxury products, SkinZone has the perfect choice for you.
        </p>
        <p>
            We are committed to bringing you the best skincare experience with trusted products, expert guidance, and a seamless shopping journey. Our team carefully selects each product to ensure safety, effectiveness, and affordability.
        </p>
        <p>
            Thank you for choosing SkinZone! We are excited to be part of your skincare journey. Feel free to explore our collection, and if you have any questions, we're here to help.
        </p>
    </div>

    <footer class="footer mt-auto">
        <div class="container">
            <p>&copy; 2024 SkinZone. All rights reserved.</p>
            <p>Contact: <a href="mailto:info@skinzoneshop.com">info@skinzoneshop.com</a></p>
            <div>
                <a href="#">Privacy Policy</a> |
                <a href="#">Terms of Service</a> |
                <a href="about.php">About Us</a>
            </div>
            <div class="social-icons mt-2">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>