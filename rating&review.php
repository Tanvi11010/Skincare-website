<?php include('auth.php'); ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating & Reviews</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            // Form Validation
            $('#reviewForm').validate({
                rules: {
                    rating: {
                        required: true
                    },
                    reviewText: {
                        required: true,
                        minlength: 10,
                        maxlength: 500,
                    }
                },
                messages: {
                    rating: {
                        required: "Please select a rating."
                    },
                    reviewText: {
                        required: "Please write a review.",
                        minlength: "Review should be at least 10 characters long.",
                        maxlength: "Review cannot exceed 500 characters.",
                    }
                },
                errorElement: "div", // Error messages will be wrapped in <div>
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback'); // Add Bootstrap error class
                    error.insertAfter(element); // Insert error after the element
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid'); // Add Bootstrap invalid class
                },
                unhighlight: function(element) {
                    $(element).addClass('is-valid').removeClass('is-invalid'); // Add Bootstrap valid class
                },
                submitHandler: function(form) {
                    alert("Your review has been submitted!");
                    form.reset();
                }
            });

            // Star rating system
            $(".star").on("click", function() {
                var ratingValue = $(this).data("value");
                $("#rating").val(ratingValue);
                updateStars(ratingValue);
            });

            function updateStars(rating) {
                $(".star").each(function() {
                    if ($(this).data("value") <= rating) {
                        $(this).addClass("checked");
                    } else {
                        $(this).removeClass("checked");
                    }
                });
            }
        });
    </script>
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

        /* Star rating styles */
        .star {
            font-size: 32px;
            color: #ccc;
            cursor: pointer;
        }

        .star.checked {
            color: gold;
        }

        .star:hover {
            color: #ffb700;
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
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="myorders.php">My Orders</a></li>
                    <li class="nav-item"><a class="nav-link active" href="rating&review.php">Rating & Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2>Rating & Review for Products</h2><br>
        <p>We value your feedback! Please rate and leave a review for the product you purchased.</p><br>

        <!-- Product Information and Rating & Review Form -->
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <img src="images/pro10.jpg" alt="Product Image" class="img-fluid mb-3" style="width: 150px; height: auto;">
                    <h4>Dot & Key Sunscreen</h4>
                    <p>Price: ₹999</p>
                    <p>Description: This is a great product for skincare. It helps with moisturizing and keeping your skin smooth and hydrated.</p>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Rating and Review Form -->
                <form id="reviewForm" action="#" method="post">
                    <div class="mb-3">
                        <label for="rating" class="form-label">
                            <h4><b>Rating</b></h4>
                        </label>
                        <!-- Star Rating System -->
                        <div id="ratingStars">
                            <span class="star" data-value="1">&#9733;</span>
                            <span class="star" data-value="2">&#9733;</span>
                            <span class="star" data-value="3">&#9733;</span>
                            <span class="star" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                        <input type="hidden" id="rating" name="rating">
                    </div>

                    <div class="mb-3">
                        <label for="reviewText" class="form-label">
                            <h4><b>Your Review</b></h4>
                        </label>
                        <textarea class="form-control" id="reviewText" name="reviewText" rows="4" placeholder="Write your review here..." required></textarea>
                    </div>

                    <!-- Submit button aligned to the left -->
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
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