<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Edit Home Page</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>
</head>
<body>
<?php
$adminName = $_SESSION['admin_name'] ?? 'Admin';
?>
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
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <img src="admin-images/admin1.jpeg" alt="Admin" class="rounded-circle" width="30" height="30">
                            <span><?= htmlspecialchars($adminName) ?></span>
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
    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            <div class="text-center">
                <h4>Edit Home Page</h4>
            </div>
            <form>
                <div class="mb-3">
                    <label for="homeTitle" class="form-label">Home Page Title</label>
                    <input type="text" class="form-control" name="homeTitle" id="homeTitle" value="Welcome to Skin Zone">
                </div>
                <div class="mb-3">
                    <label for="homeDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="homeDescription"id="homeDescription" rows="4">Your go-to skincare destination with the best products.</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="customerFeedback" class="form-label">What Our Customers Say</label>
                    <textarea class="form-control" name="customerFeedback"id="customerFeedback" rows="4">"Amazing skincare products! My skin feels great."</textarea>
                </div>
                <div class="mb-3">
                    <label for="footerText" class="form-label">Footer Text</label>
                    <textarea class="form-control" name="footerText"id="footerText" rows="2">&copy; 2025 Skin Zone. All rights reserved.</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Home Page</button>
                </div>
            </form>
        </div>
    </div>
    <footer class=" footer text-center py-2 mt-4">
            <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
        </footer>
        <script>$(document).ready(function () {
    $("form").validate({
        rules: {
            homeTitle: {
                required: true,
                maxlength: 100
            },
            homeDescription: {
                required: true,
                maxlength: 300
            },
            customerFeedback: {
                required: true,
                maxlength: 300
            },
            footerText: {
                required: true,
                maxlength: 150
            }
        },
        messages: {
            homeTitle: {
                required: "Please enter Home Page Title",
                maxlength: "Title must be less than 100 characters"
            },
            homeDescription: {
                required: "Please enter Description",
                maxlength: "Description must be less than 300 characters"
            },
            customerFeedback: {
                required: "Please enter Customer Feedback",
                maxlength: "Feedback must be less than 300 characters"
            },
            footerText: {
                required: "Please enter Footer Text",
                maxlength: "Footer text must be less than 150 characters"
            }
        },
        errorClass: "is-invalid text-danger",
        validClass: "is-valid",
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });
});</script>
</body>
</html>
