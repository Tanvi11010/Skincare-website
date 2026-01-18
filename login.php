<!-- login.php -->
<?php
include 'header2.php';
?>

<?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];

    if ($msg == "verified") {
        echo "<div class='alert alert-success'>✅ Your account has been successfully verified. You can now login.</div>";
    } elseif ($msg == "invalid") {
        echo "<div class='alert alert-danger'>❌ Invalid or expired verification link.</div>";
    } elseif ($msg == "error") {
        echo "<div class='alert alert-warning'>⚠️ Invalid request.</div>";
    }
}

?>
<style>
    .contact-form-box {
        border: 2px solid rgba(141, 56, 156, 0.3);
        border-radius: 12px;
        padding: 30px;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(141, 56, 156, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: rgb(141, 56, 156);
        box-shadow: 0 0 5px rgba(141, 56, 156, 0.5);
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

    .is-invalid {
        border-color: red;
    }

    .is-valid {
        border-color: green;
    }

    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: red;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .login-card {
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgb(105, 37, 117);
        border: 2px solid rgba(92, 82, 82, 0.33);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 400px;
        width: 100%;
    }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .login-card {
            max-width: 90% !important;
            margin: 1rem auto !important;
        }
    }
</style>

<div class="login-wrapper">

    <div class="login-card">
        <h3 class="text-center mb-4">Login</h3>
        <?php if (isset($_COOKIE['msg'])): ?>
            <div class="alert alert-info text-center">
                <?= $_COOKIE['msg']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger text-center">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']); // clear the message after showing it
                ?>
            </div>
        <?php endif; ?>

        <form action="login_process.php" method="post" id="loginForm">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-outline-custom w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <a href="forgot_password.php" class="text-danger text-decoration-none">Forgot password?</a>
        </div>
        <div class="text-center mt-2">
            <span>Don't have an account? </span>
            <a href="register.php" class="text-danger text-decoration-none">Sign up</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Password must be at least 8 characters long",
                    maxlength: "Password must not exceed 20 characters",
                    pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"
                }
            }

            ,
            errorClass: "text-danger", // Bootstrap error style
            errorPlacement: function(error, element) {
                if (element.attr("type") === "checkbox") {
                    error.insertAfter(element.closest('.form-check'));
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

<?php


include 'footer.php'; ?>