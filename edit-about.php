<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Edit About Us Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="design.css">
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
                <h4>Edit About Us Page</h4>
            </div>
            <form>
                <div class="mb-3">
                    <label for="aboutTitle" class="form-label">About Us Title</label>
                    <input type="text" class="form-control" name="aboutTitle"id="aboutTitle" value="About Skin Zone">
                </div>
                <div class="mb-3">
                    <label for="aboutDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="aboutDescription" id="aboutDescription" rows="4">Learn more about our mission to provide the best skincare solutions.</textarea>
                </div>
                <div class="mb-3">
                    <label for="missionStatement" class="form-label">Mission Statement</label>
                    <textarea class="form-control" name="missionStatement"id="missionStatement" rows="4">We are dedicated to enhancing skin health through high-quality products.</textarea>
                </div>
                <div class="mb-3">
                    <label for="visionStatement" class="form-label">Vision Statement</label>
                    <textarea class="form-control" name="visionStatement"id="visionStatement" rows="4">To be the most trusted skincare brand worldwide.</textarea>
                </div>
                <div class="mb-3">
                    <label for="aboutFooterText" class="form-label">Footer Text</label>
                    <textarea class="form-control" name="aboutFooterText"id="aboutFooterText" rows="2">&copy; 2025 Skin Zone. All rights reserved.</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update About Us Page</button>
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
            aboutTitle: {
                required: true,
                maxlength: 100
            },
            aboutDescription: {
                required: true,
                maxlength: 300
            },
            missionStatement: {
                required: true,
                maxlength: 300
            },
            visionStatement: {
                required: true,
                maxlength: 300
            },
            aboutFooterText: {
                required: true,
                maxlength: 150
            }
        },
        messages: {
            aboutTitle: {
                required: "Please enter About Us Title",
                maxlength: "Title must be less than 100 characters"
            },
            aboutDescription: {
                required: "Please enter Description",
                maxlength: "Description must be less than 300 characters"
            },
            missionStatement: {
                required: "Please enter Mission Statement",
                maxlength: "Mission Statement must be less than 300 characters"
            },
            visionStatement: {
                required: "Please enter Vision Statement",
                maxlength: "Vision Statement must be less than 300 characters"
            },
            aboutFooterText: {
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
