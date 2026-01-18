<?php include "admin_header.php"; ?>
<?php include "config.php"; ?>

<?php
// Get user data
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($query);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $phone = mysqli_real_escape_string($con, $_POST['mobile']);  // Now matches the input field name
    $gender = $_POST['gender'];
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $account_status = $_POST['account_status'];

    // Handle profile picture upload
    $profile_pic = $user['profile_pic'];  // Use 'profile_pic' column
    if (!empty($_FILES['profile_picture']['name'])) {
        $file_name = time() . "_" . $_FILES['profile_picture']['name'];
        $target = "uploads/" . $file_name;
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);
        $profile_pic = $target;
    }

    $updateQuery = "UPDATE users SET 
        fullname='$fullname', 
        mobile='$phone',  
        gender='$gender',
        address='$address', 
        account_status='$account_status',
        profile_pic='$profile_pic'  
        WHERE id=$id";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('User updated successfully!'); window.location='manage_user.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Error updating user.</div>";
    }
}
?>
<div class="main-content container py-4" style="padding-top: 100px;"> <!-- Added padding-top to resolve navbar overlap -->
    <h4 class="fw-bold text-dark mb-4">Edit User</h4>

    <!-- Form Section -->
    <div class="form-container bg-white p-4 rounded shadow-sm" style="max-width: 800px; margin: 0 auto;">
        <form method="POST" enctype="multipart/form-data">
        <h4 class="fw-bold text-dark mb-4 text-center">Edit User</h4>
        <hr class="theme-hr">
            <div class="row g-3">
                <!-- Full Name -->
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?= htmlspecialchars($user['fullname']) ?>" required>
                </div>
                <!-- Phone -->
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="mobile" class="form-control" value="<?= htmlspecialchars($user['mobile']) ?>" required>
                </div>
                <!-- Gender -->
                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select" required>
                        <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $user['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>
                <!-- Account Status -->
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="account_status" class="form-select">
                        <option value="active" <?= $user['account_status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $user['account_status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <!-- Address -->
                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3"><?= htmlspecialchars($user['address']) ?></textarea>
                </div>
                <!-- Profile Picture -->
                <div class="col-md-6">
                    <label class="form-label">Profile Picture</label><br>
                    <?php if (!empty($user['profile_pic']) && file_exists($user['profile_pic'])): ?>
                        <!-- Show current profile picture if available and exists -->
                        <img src="<?= 'uploads/' . $user['profile_pic'] ?>" class="img-thumbnail mb-2" style="max-width: 100px;">
                    <?php else: ?>
                        <!-- Show default profile picture if no profile picture is found -->
                        <img src="assets/img/default-user.png" class="img-thumbnail mb-2" style="max-width: 100px;">
                    <?php endif; ?>
                    <input type="file" name="profile_picture" class="form-control">
                </div>
            </div>

            <!-- Form Submit & Cancel -->
            <div class="mt-4 text-center">
                <button type="submit" class="btn custom-btn">Save Changes</button>
                <a href="manage_user.php" class="btn custom-btn">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include "admin_footer.php"; ?>

<!-- Add the following CSS to style the form elements and make them more modern -->

<style>
    /* Theme Colors */
    :root {
        --primary: #a076d6; /* Purple */
        --secondary: #e9d8fd; /* Light Purple */
        --dark: #4a4063; /* Dark Purple */
        --light: #f8f9fa; /* Light Background */
    }
    /* Focus effect for all input fields */
    .form-control:focus, .form-select:focus, .custom-input:focus, .custom-textarea:focus {
        border-color: var(--primary); /* Focus effect, primary color */
        outline: none; /* Remove default outline */
        box-shadow: 0 0 10px rgba(160, 118, 214, 0.6); /* Glow effect */
    }
/* Custom Button Styling */
/* Custom Button Styling */
.custom-btn {
    background-color: transparent; /* No background by default */
    color: var(--primary); /* Primary color text */
    border: 2px solid var(--primary); /* Outline with primary color */
    border-radius: 4px; /* Slightly rounded corners */
    padding: 0.5rem 1rem; /* Smaller padding */
    font-size: 0.9rem; /* Smaller font size */
    transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer; /* Pointer cursor on hover */
}

/* Hover effect for Save Changes button */
.custom-btn:hover {
    background-color: var(--primary); /* Fill with primary color on hover */
    color: white; /* Change text color to white */
    box-shadow: 0 4px 8px rgba(160, 118, 214, 0.3); /* Light glow effect */
}

/* Active state for Save Changes button */
.custom-btn:active {
    transform: translateY(1px); /* Slight shrink effect on click */
    box-shadow: none; /* Remove glow effect on click */
}

/* Cancel Button Styling */
.custom-cancel-btn {
    background-color: transparent; /* No background by default */
    color: var(--primary); /* Primary color text */
    border: 2px solid var(--primary); /* Outline with primary color */
    border-radius: 4px; /* Slightly rounded corners */
    padding: 0.5rem 1rem; /* Smaller padding */
    font-size: 0.9rem; /* Smaller font size */
    transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer; /* Pointer cursor on hover */
}

/* Hover effect for Cancel button */
.custom-cancel-btn:hover {
    background-color: var(--primary); /* Fill with primary color on hover */
    color: white; /* Change text color to white */
    box-shadow: 0 4px 8px rgba(160, 118, 214, 0.3); /* Light glow effect */
}

/* Active state for Cancel button */
.custom-cancel-btn:active {
    transform: translateY(1px); /* Slight shrink effect on click */
    box-shadow: none; /* Remove glow effect on click */
}

    /* Form Container Styling */
    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Default shadow */
        transition: box-shadow 0.3s ease-in-out; /* Smooth transition for shadow */
    }

    /* Hoverable Shadow Effect */
    .form-container:hover {
        box-shadow: 0 10px 20px rgba(160, 118, 214, 0.5) !important; /* Ensure purple shadow on hover */
    }

    .form-label {
        font-weight: 600;
        color: var(--dark); /* Dark text for labels */
    }

    /* Image Styling */
    .img-thumbnail {
        border-radius: 10px;
    }

    /* Input Fields Hover Effect */
    .custom-input:hover, .form-control:hover, .form-select:hover {
        border-color: var(--primary); /* Hover effect on input fields */
    }

    /* Themed Horizontal Rule */
    .theme-hr {
        border: 0;
        height: 2px;
        background-color: #a076d6; /* Website theme color */
        margin: 20px 0; /* Adds spacing before and after the line */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }

        .custom-btn {
            padding: 0.6rem 1.2rem;
        }
    }
</style>


