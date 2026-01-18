<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>

    <style>
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
            // Basic form validation for Change Password
            $("#changePasswordForm").validate({
                rules: {
                    oldPassword: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
                    },
                    newPassword: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
                    },
                    confirmNewPassword: {
                        required: true,
                        equalTo: "#newPassword"
                    }
                },
                messages: {
                    oldPassword: {
                        required: "Please enter your old password",
                        minlength: "Old password must be at least 8 characters long",
                        maxlength: "Password cannot exceed 20 characters",
                        pattern: "Password is not valid"
                    },
                    newPassword: {
                        required: "Please enter a new password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password cannot exceed 20 characters",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"
                    },
                    confirmNewPassword: {
                        required: "Please confirm your new password",
                        equalTo: "Passwords do not match"
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
                    alert("Password changed successfully!");
                    form.submit(); // Optionally, submit the form after the alert
                }
            });
        });
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.jpg" alt="Logo" class="rounded-circle" width="40" height="40">
                <span class="ms-2">SkinZone</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="admin-panel.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-users.php">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-product.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-categories.php">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-offer.php">Offers</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-inquiry.php">Inquiries</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-order.php">Orders</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">Site Settings</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="edit-home.php">Home Page</a></li>
                            <li><a class="dropdown-item" href="edit-about.php">About Us Page</a></li>
                            <li><a class="dropdown-item" href="edit-slide.php">Sliders</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link  active dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <img src="admin-images/admin1.jpeg" alt="Admin" class="rounded-circle" width="30" height="30">
                            <span>Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="admin-profile.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="admin-change-password.php">Change Password</a></li>
                            <li><a class="dropdown-item text-danger" href="index.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Change Password Form -->
    <div class="container mt-5">
        <h2>Change Password</h2><br>
        <form action="change_password_process.php" method="POST" id="changePasswordForm">
            <!-- Old Password Field -->
            <div class="mb-3">
                <label for="oldPassword" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter your old password" required>
            </div>

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter a new password" required>
            </div>

            <!-- Confirm New Password Field -->
            <div class="mb-3">
                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm your new password" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="text-center py-2 mt-4">
            <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
        </footer>
</body>

</html>