<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - Admin Panel</title>

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
                    <li class="nav-item"><a class="nav-link active" href="admin-product.php">Products</a></li>
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
    <div class="container mt-4">
        <h2 class="text-center mb-4">Manage Products</h2>

        <input type="text" id="search" class="form-control mb-3" placeholder="Search products...">
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>MRP</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productTable">
                    <tr>
                        <td>1</td>
                        <td>Aloe Vera Gel</td>
                        <td>₹299</td>
                        <td>₹249</td>
                        <td>Moisturizer</td>
                        <td><img src="admin-images/product1.jpeg" alt="Product Image" width="50"></td>
                        <td>Patanjali</td>
                        <td>100</td>
                        <td>Soothing and hydrating aloe vera gel.</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Vitamin C Serum</td>
                        <td>₹599</td>
                        <td>₹499</td>
                        <td>Serum</td>
                        <td><img src="admin-images/product2.jpeg" alt="Product Image" width="50"></td>
                        <td>WOW Skin Science</td>
                        <td>50</td>
                        <td>Brightens skin and reduces dark spots.</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="mb-2">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="addName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">MRP</label>
                            <input type="number" class="form-control" name="addMRP" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="addPrice" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="addCategory" required>
                                <option value="">Select Category</option>
                                <option value="Moisturizer">Moisturizer</option>
                                <option value="Serum">Serum</option>
                                <option value="Sunscreen">Sunscreen</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="addImage" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Brand</label>
                            <input type="text" class="form-control" name="addBrand" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="addQuantity" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="addDescription" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.validator.addMethod("filesize", function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
            }, "File size must be less than 250 KB");

            $('#addProductForm').validate({
                rules: {
                    addName: {
                        required: true,
                        minlength: 3,
                        maxlength: 30
                    },
                    addMRP: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    addPrice: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    addCategory: {
                        required: true
                    },
                    addImage: {
                        required: true,
                        extension: "jpg|png",
                        filesize: 256000
                    },
                    addBrand: {
                        required: true,
                        minlength: 2
                    },
                    addQuantity: {
                        required: true,
                        digits: true,
                        min: 1
                    },
                    addDescription: {
                        required: true,
                        minlength: 10
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.mb-2').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },
                submitHandler: function(form) {
                    alert("Product added successfully!");
                    form.reset();
                    $("#addProductModal").modal("hide");
                }
            });
        });
    </script>
    <footer class=" footer text-center py-2 mt-4">
        <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
    </footer>

</body>

</html>