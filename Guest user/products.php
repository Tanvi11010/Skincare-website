<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
<!-- Skincare Filter Section (Search, Category, Price) -->
<div class="container mt-5">
    <div class="row">
        <!-- Search Bar -->
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search products..." aria-label="Search" aria-describedby="search-addon">
                <button class="btn btn-outline-secondary" type="button" id="search-addon">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="col-md-8">
            <div class="row">
                <!-- Category Filter -->
                <div class="col-md-4">
                    <select class="form-select" aria-label="Category select">
                        <option selected>Choose Category</option>
                        <option value="1">Moisturising</option>
                        <option value="2">Facewash</option>
                        <option value="3">Sunscreen</option>
                        <option value="4">Serum</option>
                        <option value="5">Eye cream</option>
                        <option value="6">Toner</option>

                    </select>
                </div>

                <!-- Price Filter (Predefined Ranges) -->
                <div class="col-md-4">
                    <select class="form-select" id="priceRange" aria-label="Select price range">
                        <option selected>Choose Price Range</option>
                        <option value="1">₹0 - ₹50</option>
                        <option value="2">₹50 - ₹100</option>
                        <option value="3">₹100 - ₹200</option>
                        <option value="4">₹200 - ₹500</option>
                        <option value="5">$500+</option>
                    </select>
                </div>

                <!-- Filter Button -->
                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-primary w-100">Apply Filters</button>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button aria-current="true" aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button>
        <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button>
        <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
        <button aria-label="Slide 4" data-bs-slide-to="3" data-bs-target="#carouselExampleIndicators" type="button"></button>
        <button aria-label="Slide 5" data-bs-slide-to="4" data-bs-target="#carouselExampleIndicators" type="button"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="images/product1.jpeg">
                <img src="images/product1.jpeg" class="d-block w-100" alt="Image 1">
            </a>
        </div>
        <div class="carousel-item">
            <a href="images/product2.jpeg">
                <img src="images/product2.jpeg" class="d-block w-100" alt="Image 2">
            </a>
        </div>
        <div class="carousel-item">
            <a href="images/Product3.jpeg">
                <img src="images/Product3.jpeg" class="d-block w-100" alt="Image 3">
            </a>
        </div>
        <div class="carousel-item">
            <a href="images/product4.jpeg">
                <img src="images/product4.jpeg" class="d-block w-100" alt="Image 4">
            </a>
        </div>
        <div class="carousel-item">
            <a href="images/product5.jpeg">
                <img src="images/product5.jpeg" class="d-block w-100" alt="Image 5">
            </a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container">
    <h2 class="text-center my-4">Our Skincare Products</h2>

    <!-- Gallery Section -->
    <div class="container py-5">
        <div class="row">

            <div class="col-md-4 p-3"> <!-- Added padding between products -->
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro1.jpg">
                        <img src="images/pro1.jpg" alt="Cetaphil Cleanser" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Cetaphil Cleanser</div>
                    <div class="cost text-success fs-5 my-2">₹3,829</div>
                    <a href="login.php" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="products_details.php" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro2.jpg">
                        <img src="images/pro2.jpg" alt="Nivea Moisturising Cream" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Nivea Moisturising Cream</div>
                    <div class="cost text-success fs-5 my-2">₹3,328</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro3.jpg">
                        <img src="images/pro3.jpg" alt="Derma Lip Balm" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Derma Lip Balm</div>
                    <div class="cost text-success fs-5 my-2">₹6,040</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro4.jpg">
                        <img src="images/pro4.jpg" alt="Aqualogica Fluid Moisturizer" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Aqualogica Fluid Moisturizer</div>
                    <div class="cost text-success fs-5 my-2">₹4,999</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro5.jpg">
                        <img src="images/pro5.jpg" alt="Pilgrim Face Serum" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Pilgrim Face Serum</div>
                    <div class="cost text-success fs-5 my-2">₹2,499</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro6.jpg">
                        <img src="images/pro6.jpg" alt="Aqualogica Moisturizer" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Aqualogica Moisturizer</div>
                    <div class="cost text-success fs-5 my-2">₹7,083</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro7.jpg">
                        <img src="images/pro7.jpg" alt="Derma Face Serum" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Derma Face Serum</div>
                    <div class="cost text-success fs-5 my-2">₹4,589</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro8.jpg">
                        <img src="images/pro8.jpg" alt="Bellavita Under Eye Cream" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Bellavita Under Eye Cream</div>
                    <div class="cost text-success fs-5 my-2">₹2,919</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro9.jpg">
                        <img src="images/pro9.jpg" alt="Aqualogica Moisturizer" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Aqualogica Moisturizer</div>
                    <div class="cost text-success fs-5 my-2">₹6,299</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro10.jpg">
                        <img src="images/pro10.jpg" alt="Dot & Key Sunscreen" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Dot & Key Sunscreen</div>
                    <div class="cost text-success fs-5 my-2">₹120.00</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro11.jpg">
                        <img src="images/pro11.jpg" alt="Plum Face Wash" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Plum Face Wash</div>
                    <div class="cost text-success fs-5 my-2">₹65.99</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro12.jpg">
                        <img src="images/pro12.jpg" alt="Foxtale Face Kit" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Foxtale Face Kit</div>
                    <div class="cost text-success fs-5 my-2">₹50.00</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro13.jpg">
                        <img src="images/pro13.jpg" alt="Hyphen Water Sunscreen" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Hyphen Water Sunscreen</div>
                    <div class="cost text-success fs-5 my-2">₹40.00</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro14.jpg">
                        <img src="images/pro14.jpg" alt="Within Hydrating Sunscreen" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Within Hydrating Sunscreen</div>
                    <div class="cost text-success fs-5 my-2">₹150.00</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="gallery-item border rounded p-3 text-center shadow-sm">
                    <a href="images/pro15.jpg">
                        <img src="images/pro15.jpg" alt="Moody Water Sunscreen" class="gallery-img img-fluid rounded">
                    </a>
                    <div class="description fw-bold mt-2">Moody Water Sunscreen</div>
                    <div class="cost text-success fs-5 my-2">₹45.00</div>
                    <a href="#" class="btn btn-primary btn-sm">Buy Now</a>
                    <a href="#" class="btn btn-view btn-sm">View</a>

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

</body>

</html>