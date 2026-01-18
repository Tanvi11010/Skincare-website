<?php include('auth.php'); ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

        .profile-container {
            width: 100%;
            max-width: 550px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(132, 124, 124, 0.1);
            margin-top: 50px;
            margin-bottom: 80px;
            border: 2px solid rgba(92, 82, 82, 0.33);
        }

        /* Footer Styling */
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

        .error {
            color: red;
        }

        .modal-content {
            background-color: #f8f9fa;
        }

        .is-invalid {
            border-color: red;
        }

        .invalid-feedback {
            display: block;
        }

        .is-valid {
            border-color: green;
        }

        /* Profile Picture in Navbar */
        .navbar-nav .nav-item img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            object-fit: cover;
            /* Ensures the image fits within the circle */
        }
    </style>

    <script>
        $(document).ready(function() {
            // Basic form validation for Edit Profile
            $("#editProfileForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        pattern: /^[A-Za-z ]+$/
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#password"
                    },
                    phoneNumber: {
                        required: true,
                        pattern: /^[0-9]{10}$/
                    },
                    gender: {
                        required: true
                    },
                    profilePhoto: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Full name must be at least 2 characters long",
                        pattern: "Please enter only letters (A-Z or a-z)"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be at most 20 characters long",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"
                    },
                    confirmPassword: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    phoneNumber: {
                        required: "Please enter your phone number",
                        pattern: "Please enter a valid 10-digit phone number"
                    },
                    gender: {
                        required: "Please select your gender"
                    },
                    profilePhoto: {
                        required: "Please upload your profile photo",
                        extension: "Only JPG, JPEG or PNG files are allowed"
                    }
                },
                errorElement: "div", // Error messages will be wrapped in <div>
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');

                    // If the element is a gender radio button, place the error message after the radio buttons container
                    if (element.attr('name') == 'gender') {
                        error.insertAfter('.gender-group'); // Use a class to wrap the gender radio buttons
                    } else {
                        error.insertAfter(element);
                    }
                },
                unhighlight: function(element) {
                    $(element).addClass('is-valid').removeClass('is-invalid'); // Add Bootstrap valid class
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid'); // Add Bootstrap invalid class
                },
                submitHandler: function(form) {
                    // Display an alert box when the form is successfully submitted
                    alert("Profile updated successfully!");
                    form.submit(); // Optionally, submit the form after the alert
                }
            });
        });
    </script>
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
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="myorders.php">My Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="rating&review.php">Rating & Review</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

                    <!-- Profile Picture Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/p1.jpg" alt="Profile Picture" class="rounded-circle" width="40" height="40">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Form Container -->
    <div class="container d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="profile-container">
            <h3 class="text-center mb-4">Edit Profile</h3>
            <form action="profile_update.php" method="POST" id="editProfileForm" enctype="multipart/form-data">
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                </div>

                <!-- Phone Number Field -->
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
                </div>

                <!-- Gender Field -->
                <div class="mb-3 gender-group">
                    <label for="gender" class="form-label">Gender</label><br>
                    <input type="radio" id="male" name="gender" value="male" required> Male
                    <input type="radio" id="female" name="gender" value="female" required> Female
                    <input type="radio" id="other" name="gender" value="other" required> Other
                </div>

                <!-- Profile Photo Field -->
                <div class="mb-3">
                    <label for="profilePhoto" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" accept="image/*" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a new password">
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Update Profile</button>
            </form>
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