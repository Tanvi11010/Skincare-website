<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="design.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="font/js/all.min.js"></script>
</head>
<body>
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
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Site Settings</a>
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
    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            <div class="text-center">
                <img src="admin-images/admin1.jpeg" alt="Admin Profile" class="mb-3" width="120" height="120">
                <h4>Admin Profile</h4>
            </div>
            <form id="adminProfileForm">
                <div class="mb-3">
                    <label for="adminID" class="form-label">Admin ID</label>
                    <input type="text" class="form-control" id="adminID" value="ADM12345" readonly>
                </div>
                <div class="mb-3">
                    <label for="adminName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="adminName" name="adminName" value="John Doe">
                </div>
                <div class="mb-3">
                    <label for="adminEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="admin@example.com">
                </div>
                <div class="mb-3">
                    <label for="adminContact" class="form-label">Contact No</label>
                    <input type="text" class="form-control" id="adminContact" name="adminContact" value="+1234567890">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
    <footer class=" footer text-center py-2 mt-4">
            <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
    </footer>

<script>
$(document).ready(function(){
    $("#adminProfileForm").validate({
        rules: {
            adminName: {
                required: true,
                minlength: 3
            },
            adminEmail: {
                required: true,
                email: true
            },
            adminContact: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            }
        },
        messages: {
            adminName: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters long"
            },
            adminEmail: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            adminContact: {
                required: "Please enter your contact number",
                digits: "Only digits are allowed",
                minlength: "Contact number must be 10 digits",
                maxlength: "Contact number must be 10 digits"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        highlight: function(element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        }
    });
});
</script>
</body>
</html>