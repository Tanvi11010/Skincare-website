<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management - Admin Panel</title>
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
    <div class="container mt-4">
        <h2 class="text-center mb-4">Manage Users</h2>
        <!-- Add User Button -->
        <div class="mb-3 text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fa fa-user-plus"></i> Add User
            </button>
        </div>

        <!-- Search Bar -->
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Search users by name...">
        </div>

        <!-- User Table -->
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Alice Johnson</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <a href="admin-user-details.php"><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUser1">
                                    <i class="fa fa-edit"></i> Edit/View
                                </button></a>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>John Smith</td>
                        <td>User</td>
                        <td><span class="badge bg-danger">Inactive</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUser2">
                                <i class="fa fa-edit"></i> Edit/View
                            </button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter full name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePic" name="profilePic">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Type</label>
                            <select class="form-select" id="accountType" name="accountType">
                                <option value="">Select Account Type</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Status</label>
                            <select class="form-select" id="accountStatus" name="accountStatus">
                                <option value="">Select Account Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Validation Script -->
    <script>
        $(document).ready(function() {
            $.validator.addMethod("filesize", function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
            }, "File size must be less than 250 KB");

            $('#addUserForm').validate({
                ignore: ":hidden", // Ensure hidden fields are validated
                rules: {
                    fullName: {
                        required: true,
                        minlength: 3,
                        maxlength: 30,
                        pattern: /^[a-zA-Z ]+$/
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    profilePic: {
                        required: true,
                        extension: "jpg|png",
                        filesize: 256000 // 250 KB limit
                    },
                    address: {
                        required: true,
                        minlength: 10,
                        maxlength: 100
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
                    },
                    accountType: {
                        required: true
                    },
                    accountStatus: {
                        required: true
                    }
                },
                messages: {
                    fullName: {
                        required: "Full name is required",
                        minlength: "Full name must be at least 3 characters",
                        maxlength: "Full name cannot exceed 30 characters",
                        pattern: "Full name should contain only alphabets and spaces"
                    },
                    email: {
                        required: "Email is required",
                        email: "Enter a valid email address"
                    },
                    profilePic: {
                        required: "Profile picture is required",
                        extension: "Only JPG and PNG files are allowed",
                        filesize: "File size must be less than 250 KB"
                    },
                    address: {
                        required: "Address is required",
                        minlength: "Address must be at least 10 characters",
                        maxlength: "Address cannot exceed 100 characters"
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 8 characters",
                        maxlength: "Password cannot exceed 20 characters",
                        pattern: "Password must contain uppercase, lowercase, number, and special character"
                    },
                    accountType: {
                        required: "Please select an account type"
                    },
                    accountStatus: {
                        required: "Please select an account status"
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.mb-3').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },
                submitHandler: function(form) {
                    alert("User added successfully!");
                    form.reset();
                    $("#addUserModal").modal("hide");
                }
            });
        });
    </script>
    <footer class=" footer text-center py-2 mt-4">
        <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
    </footer>

</body>

</html>