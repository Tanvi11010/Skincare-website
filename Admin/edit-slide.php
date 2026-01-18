<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Slider Settings</title>
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
    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            <div class="text-center">
                <h4>Slider Settings</h4>
            </div>
            <form id="sliderForm">
                <div id="sliderContainer">
                    <div class="slider-item mb-4">
                        <label for="sliderTitle1" class="form-label mt-2">Title for Image 1</label>
                        <input type="text" class="form-control" name="sliderTitle1" id="sliderTitle1" value="Glowing Skin Starts Here">
                        <label for="sliderDescription1" class="form-label mt-2">Description for Image 1</label>
                        <textarea class="form-control" id="sliderDescription1" name="sliderDescription1" rows="2">Discover skincare products designed for your beauty.</textarea>
                        <label for="sliderImage1" class="form-label mt-2">Upload Image 1</label>
                        <input type="file"  name="sliderImage1" class="form-control" id="sliderImage1">
                    </div>
                    <div class="slider-item mb-4">
                        <label for="sliderTitle2" class="form-label mt-2">Title for Image 2</label>
                        <input type="text" class="form-control" name="sliderTitle2" id="sliderTitle2" value="Nourish Your Skin">
                        <label for="sliderDescription2" class="form-label mt-2">Description for Image 2</label>
                        <textarea class="form-control"name="sliderDescription2" id="sliderDescription2" rows="2">Your journey to flawless skin begins with us.</textarea>
                        <label for="sliderImage2" class="form-label mt-2">Upload Image 2</label>
                        <input type="file"   name="sliderImage2" class="form-control" id="sliderImage2">
                    </div>
                    <div class="slider-item mb-4">
                        <label for="sliderTitle3" class="form-label mt-2">Title for Image 3</label>
                        <input type="text" class="form-control"  name="sliderTitle3"id="sliderTitle3" value="Revitalize Your Beauty">
                        <label for="sliderDescription3" class="form-label mt-2">Description for Image 3</label>
                        <textarea class="form-control" name="sliderDescription3"id="sliderDescription3" rows="2">Explore premium skincare solutions tailored for you.</textarea>
                        <label for="sliderImage3" class="form-label mt-2">Upload Image 3</label>
                        <input type="file" name="sliderImage3" class="form-control" id="sliderImage3">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Slider Settings</button>
                </div>
            </form>
        </div>
    </div>
    <footer class=" footer text-center py-2 mt-4">
            <p>&copy; 2025 Skin Zone Admin Panel. All rights reserved.</p>
        </footer>
        <script>
        $(document).ready(function () {
    $("#sliderForm").validate({
        rules: {
            sliderTitle1: {
                required: true,
                maxlength: 50
            },
            sliderDescription1: {
                required: true,
                maxlength: 150
            },
            sliderImage1: {
                required: true,
                extension: "jpg|jpeg|png|gif"
            },
            sliderTitle2: {
                required: true,
                maxlength: 50
            },
            sliderDescription2: {
                required: true,
                maxlength: 150
            },
            sliderImage2: {
                required: true,
                extension: "jpg|jpeg|png|gif"
            },
            sliderTitle3: {
                required: true,
                maxlength: 50
            },
            sliderDescription3: {
                required: true,
                maxlength: 150
            },
            sliderImage3: {
                required: true,
                extension: "jpg|jpeg|png|gif"
            }
        },
        messages: {
            sliderTitle1: {
                required: "Please enter title for Image 1",
                maxlength: "Title must be less than 50 characters"
            },
            sliderDescription1: {
                required: "Please enter description for Image 1",
                maxlength: "Description must be less than 150 characters"
            },
            sliderImage1: {
                required: "Please upload image for Image 1",
                extension: "Only jpg, jpeg, png, and gif files are allowed"
            },
            sliderTitle2: {
                required: "Please enter title for Image 2",
                maxlength: "Title must be less than 50 characters"
            },
            sliderDescription2: {
                required: "Please enter description for Image 2",
                maxlength: "Description must be less than 150 characters"
            },
            sliderImage2: {
                required: "Please upload image for Image 2",
                extension: "Only jpg, jpeg, png, and gif files are allowed"
            },
            sliderTitle3: {
                required: "Please enter title for Image 3",
                maxlength: "Title must be less than 50 characters"
            },
            sliderDescription3: {
                required: "Please enter description for Image 3",
                maxlength: "Description must be less than 150 characters"
            },
            sliderImage3: {
                required: "Please upload image for Image 3",
                extension: "Only jpg, jpeg, png, and gif files are allowed"
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
});


    </script>
</body>
</html>
