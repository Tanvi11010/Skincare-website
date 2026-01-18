<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - Admin Panel</title>

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
                    <li class="nav-item"><a class="nav-link active" href="admin-users.php">Users</a></li>
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
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
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
        <h2 class="text-center mb-4">User Details</h2>

        <div class="card">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="admin-images/user1.jpeg" class="rounded-circle img-thumbnail" alt="Profile Picture">
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>Alice Johnson</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>alice@example.com</td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>********</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>123, Main Street, New York, USA</td>
                    </tr>
                    <tr>
                        <th>Account Type</th>
                        <td>Admin</td>
                    </tr>
                    <tr>
                        <th>Account Status</th>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                </table>

                <div class="text-center mt-3">
                    <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    <a href="admin-users.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>

                </div>
            </div>
        </div>
    </div>
    <footer class=" footer text-center py-2 mt-4">
        <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
    </footer>

</body>

</html>