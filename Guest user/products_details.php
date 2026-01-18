<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CSS (Local) -->
    <link href="font/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .product-image {
            max-width: 60%;
            height: auto;
            cursor: pointer;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .product-image:hover {
            transform: none;
            transition: none;
        }

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

        .additional-images img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .review {
            background-color: #f8f9fa;
            color: black;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .review-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .star-rating {
            color: #ffc107;
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

        footer {
            background-color: #f1f1f1;
            color: #6c757d;
            margin-top: 50px;
            padding: 20px;
        }

        footer a {
            text-decoration: none;
            color: #6c757d;
        }

        footer a:hover {
            color: #007bff;
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 text-center">
                <a href="https://m.media-amazon.com/images/I/51O+J5jnXcL.SL1000.jpg" target="_blank">
                    <img src="https://m.media-amazon.com/images/I/51O+J5jnXcL.SL1000.jpg" alt="Stylish Headphones" class="product-image img-fluid">
                </a>
            </div>

            <!-- Sidebar Column (with Carousel) -->
            <div class="col-12 col-md-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/c2.jpg" class="d-block w-100" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="images/c1.jpg" class="d-block w-100" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="images/c3.jpg" class="d-block w-100" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h4 class="text-left">Cetaphil Gentle Skin Cleanser </h4><br>
                <p><strong>Description:</strong>
                    Cetaphil Paraben, Sulphate-Free Gentle Skin Hydrating Face Wash Cleanser with Niacinamide, Vitamin B5 for Dry to Normal, Sensitive Skin - 125 ml</p>
                <p><strong>Price:</strong> ₹429</p>
                <p><strong>Net Quantity :</strong> 125.0 millilitre</p>
                <p><strong>Manufacturer :</strong> Encube Ethicals Pvt. Ltd.Plot No C 1, Madkaim Industrial Estate, Post Mardol, Ponda, Goa 403408</p>
                <p><strong>Best Sellers Rank:</strong> #1 in Face Wash</p>
                <p><strong>Stock:</strong> 10 left in stock</p>
                <p><strong>Item Weight :</strong> 125 g</p>
                <p><strong>Generic Name:</strong> Cleanser for sensitive skin</p>

                <a href="login.php" class="btn btn-primary">Add to Cart</a>
                <a href="#" class="btn btn-success">Buy Now</a>
            </div>

            <!-- Reviews Section (Right Side) -->
            <div class="col-md-6"><br>
                <div class="review-section">
                    <h4 class="text-left">Customer Reviews</h4>
                    <br>
                    <div class="review">
                        <div class="review-title">Excellent Product</div>
                        <div class="star-rating">★★★★★</div>
                        <p>Love the Cetaphil Gentle Skin Cleanser! Gentle, non-irritating, and effective at removing dirt and impurities. Perfect for sensitive skin, fragrance-free, and reduces redness and breakouts. Highly recommend!"</p>
                        <p class="text-end"><strong>- Tanvi Sojitra</strong></p>
                    </div>

                    <div class="review">
                        <div class="review-title">Suitable For Every Skin Type </div>
                        <div class="star-rating">★★★★☆</div>
                        <p>It is My Very First Purchase From Cetaphil , It Works Best For My Dry To Normal Skin Type, Remeber It Is A Non-Foaming Cleanser, It Didn't Make Form While Rubbing , My Skin Feels Super Soft And Hydrated After Using This !!.</p>
                        <p class="text-end"><strong>- Kalp S.</strong></p>
                    </div>
                </div>
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

</html>