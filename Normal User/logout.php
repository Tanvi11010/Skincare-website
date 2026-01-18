<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>

    <style>
        /* Ensuring the body and html take up full height */
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
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

        /* Center the logout container */
        .logout-container {
            width: 100%;
            max-width: 550px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(132, 124, 124, 0.1);
            border: 2px solid rgba(92, 82, 82, 0.33);
            margin: auto;
            /* Centers horizontally */
            flex-grow: 1;
            /* Takes up available space to ensure footer stays at the bottom */
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
    </style>

    <script>
        $(document).ready(function() {
            // Basic form validation for Logout form
            $("#logoutForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        maxlength: 20,
                        pattern: /^[A-Za-z ]+$/
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Full name must be at least 2 characters long",
                        maxlength: "Full name must be at most 20 characters long",
                        pattern: "Please enter only letters (A-Z or a-z)"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be at most 20 characters long",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"
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
                    // Display an alert box when the form is successfully submitted
                    alert("You have logged out successfully!");
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
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav><br><br>

    <!-- Logout Form -->
    <div class="logout-container">
        <h2>Logout</h2><br>
        <form action="logout.php" method="POST" id="logoutForm">
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
    <br><br>

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