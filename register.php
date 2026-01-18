    <?php include('header2.php'); ?>

    <script>
        $(document).ready(function() {
            $("#email").on("blur", function() {
                var email = $(this).val();

                if (email.length > 0) {
                    $.ajax({
                        url: "check_email.php",
                        method: "POST",
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response.trim() === "exists") {
                                $("#email_status").html("<span style='color: red;'>Email already registered!</span>");
                                $("#reg_btn").prop("disabled", true);
                            } else {
                                $("#email_status").html("<span style='color: green;'>Email available</span>");
                                $("#reg_btn").prop("disabled", false);
                            }
                        }
                    });
                } else {
                    $("#email_status").html("");
                }
            });
            $("#registerForm").validate({
                rules: {
                    fullname: {
                        required: true,
                        minlength: 3,
                        pattern: /^[A-Za-z ]+$/
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
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
                    confirmPassword: {
                        required: true,
                        equalTo: "#password"
                    },
                    phone: {
                        required: true,
                        pattern: /^[0-9]{10}$/
                    },
                    gender: {
                        required: true
                    },
                    profilePic: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    },
                    terms: {
                        required: true
                    }
                },
                messages: {
                    fullname: {
                        required: "Please enter your full name",
                        minlength: "Full name must be at least 2 characters long",
                        pattern: "Please enter only letters (A-Z or a-z)"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%#?&]{8,20}$/
                    },

                    confirmPassword: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
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
                    phone: {
                        required: "Please enter your phone number",
                        pattern: "Please enter a valid 10-digit phone number"
                    },
                    gender: {
                        required: "Please select your gender"
                    },
                    profilePic: {
                        required: "Please upload your profile photo",
                        extension: "Only JPG, JPEG or PNG files are allowed"
                    },
                    terms: {
                        required: "You must agree to the Terms & Conditions."
                    }

                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    if (element.attr('name') == 'gender') {
                        error.insertAfter('#gen-error');
                    } else if (element.attr("type") === "checkbox") {
                        error.insertAfter(element.closest(".form-check"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }

            });
        });
    </script>
    <style>
        .error {
            color: red;
        }

        .modal-content {
            background-color: #f8f9fa;
        }

        .form-text {
            font-size: 0.9rem;
            color: #6c757d;
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

        .btn-outline-custom {
            background: white;
            border: 2px solid rgb(141, 56, 156);
            color: rgb(43, 6, 49);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-outline-custom:hover {
            background: rgb(113, 49, 124);
            color: white;
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 8px 20px rgba(75, 55, 78, 0.4);
            border-color: rgb(105, 37, 117);
        }

        body {
            background-image: url('your-image.jpg');
            /* Replace with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .form-control:focus {
            border-color: rgb(141, 56, 156);
            box-shadow: 0 0 5px rgba(141, 56, 156, 0.5);
        }

        /* Signup Card Container */
        .signup-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgb(105, 37, 117);
            border: 2px solid rgba(92, 82, 82, 0.33);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .signup-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .signup-card {
                max-width: 90% !important;
                margin: 1rem auto !important;
            }
        }
    </style>
    </head>
    <?php
    if (isset($_COOKIE['success'])) { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>
        </div>
    <?php
    }
    if (isset($_COOKIE['error'])) {
    ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> <?php echo $_COOKIE['error']; ?>
        </div>
    <?php
    }
    ?>

    <body class="d-flex flex-column min-vh-100">

        <div class="container py-5">
            <div class="card signup-card mx-auto" style="max-width: 600px;">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4" style="color:rgb(112, 44, 139);">Create Account</h2>
                    <p class="text-muted text-center mb-4">Begin your journey to healthier, glowing skin.</p>

                    <form action="register.php" method="post" id="registerForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="fullname"
                                placeholder="Enter your full name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email">
                            <span id="email_status"></span>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="phone"
                                placeholder="Enter your mobile number">
                        </div>
                        <div class="mb-3">
                            <fieldset class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
                                        <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                                        <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other">
                                        <label class="form-check-label" for="genderOther">Other</label>
                                    </div>
                                </div>
                                <div id="gen-error"></div>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profilePic">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address"
                                placeholder="Enter your address" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Create password">
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                placeholder="Confirm password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms">
                            <label class="form-check-label" for="terms">I agree to the Terms & Conditions</label>
                            <div id="termsError"></div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-custom w-100 mb-3" name="reg_btn">Register</button>

                        <div class="text-center">
                            <p class="mb-0">Already have an account?
                                <a href="login.php" class="text-danger text-decoration-none">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </body>
    <?php
    if (isset($_POST['reg_btn'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['phone'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $token = uniqid() . time();
        $profile_pic = uniqid() . $_FILES['profilePic']['name'];

        include('db_connection.php'); // or whatever your DB connection file is

        $stmt = $con->prepare("INSERT INTO `users` (`fullname`, `email`, `mobile`, `gender`, `profile_pic`, `address`, `password`, `token`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fullname, $email, $mobile, $gender, $profile_pic, $address, $password, $token);
        if ($stmt->execute()) {
            if (!is_dir("profile_pictures")) {
                mkdir("profile_pictures");
            }
            move_uploaded_file($_FILES['profilePic']['tmp_name'], "profile_pictures/" . $profile_pic);

            $link = 'http://localhost/skincare2/verify.php?email=' . urlencode($email) . '&token=' . urlencode($token);

            $body = "<div style='background-color: #f8f9fa; padding: 20px; border-radius: 5px;'>
                        <h2 style='color: rgb(58, 59, 61); text-align: center;'>Account Verification</h2>
                        <p style='text-align: center; color: #333;'>Click on the button below to verify your account</p>
                        <a href='" . $link . "' style='display: block; width: 200px; margin: 0 auto; text-align: center; background-color: rgb(58, 59, 61); color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Verify Account</a>
                    </div>";
            $subject = "Account Verification Mail";


            if (sendEmail($email, $subject, $body, "")) {
                setcookie('success', 'Registration Successfull. Account verification link has been sent to your email. Verify your email to login.', time() + 5);
            } else {
                setcookie('error', 'Failed to send the registration link', time() + 5);
            }
        } else {
            setcookie('error', 'Registration Failed', time() + 5);
        }
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $file_ext = strtolower(pathinfo($_FILES['profilePic']['name'], PATHINFO_EXTENSION));
        $file_size = $_FILES['profilePic']['size'];

        if (!in_array($file_ext, $allowed_ext) || $file_size > 256000) {
            setcookie('error', 'Invalid file type or size.', time() + 5);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        // ✅ Redirect after setting cookie
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    ?>

    <?php include('footer.php'); ?>