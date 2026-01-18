<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
    </style>
</head>

<body>

    <!-- Navbar -->
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Welcome to SkinZone</h1>
        <p>You are beautiful...</p>
    </div>

    <!-- Carousel Section -->
    <div id="skincareCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#skincareCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#skincareCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#skincareCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1629380108599-ea06489d66f5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Glowing Skin">
                <div class="carousel-caption">
                    <h2>Glow Naturally ✨</h2>
                    <p>Discover the best natural skincare solutions for a radiant look.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Hydrated Skin">
                <div class="carousel-caption">
                    <h2>Nourish Your Skin 🌸</h2>
                    <p>Gentle care for soft, smooth, and youthful skin.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1629732097571-b042b35aa3ed?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Skincare Routine">
                <div class="carousel-caption">
                    <h2>Your Beauty, Your Glow 🌿</h2>
                    <p>Revamp your skincare routine with our specially curated range.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#skincareCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#skincareCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Skincare Tips Section -->
    <div class="container">
        <h2 class="section-title">--- Skincare Steps ---</h2>
        <p class="text-center">1. ➟ Hydrate well for glowing skin <br> 2. ➟ Use SPF daily for protection ☀ <br> 3. ➟Follow a gentle cleansing routine 🧼</p>
    </div>

    <!-- Featured Products Section -->
    <div class="product-section">
        <h2 class="section-title">Discover Our Bestsellers</h2>
        <p>Explore our hand-picked skincare essentials for healthy and glowing skin.</p>
        <a href="products.php" class="btn-shop">Shop Now</a>
    </div>

    <!-- Testimonials Section -->
    <div class="container">
        <h2 class="section-title">What Our Customers Say</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <p>🌟 "SkinZone transformed my skin! Highly recommended." - <b>Tanvi S.</b></p>
            </div>
            <div class="col-md-4">
                <p>🌟 "My skin feels fresher and healthier every day!" - <b>Ayushi T.</b></p>
            </div>
            <div class="col-md-4">
                <p>🌟 "Best skincare products I've ever used!" - <b>Saniya B.</b></p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
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