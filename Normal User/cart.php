<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
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

        .table {
            border: 1px solid black;
            border-spacing: 10px;
            border-collapse: separate;
        }

        .table thead th {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        .table td,
        .table th {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .cart-summary {
            border-top: 2px white;
            padding-top: 20px;
        }

        .btn {
            margin: 5px;
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
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link active" href="cart.php">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h3>Your Shopping Cart</h3><br>

        <!-- Cart Table -->
        <table class="table cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example of a cart items -->
                <tr>
                    <td><img src="images/pro11.jpg" alt="Product" width="60" height="60"> Plum Face Wash</td>
                    <td>₹675</td>
                    <td><input type="number" value="1" min="1" class="form-control"></td>
                    <td>₹675</td>
                    <td><button class="btn btn-danger">Remove</button></td>
                </tr>
                <!-- Repeat similar structure for other cart items -->
                <tr>
                    <td><img src="images/pro3.jpg" alt="Product" width="60" height="60">Derma Lip Balm</td>
                    <td>₹50</td>
                    <td><input type="number" value="1" min="1" class="form-control"></td>
                    <td>₹50</td>
                    <td><button class="btn btn-danger">Remove</button></td>
                </tr>
            </tbody>
        </table>

        <div class="cart-summary">
            <div class="d-flex justify-content-between">
                <h4>Subtotal : 725</h4>
                <a href="checkout.php" class="btn btn-primary">Continue for Payment</a>
            </div>
        </div>
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