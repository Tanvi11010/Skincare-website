<?php
session_start();
include("db_connection.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$message = "";

// Get user info
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    // Handle image upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $targetDir = "profile_pictures/";
        $filename = basename($_FILES["profile_pic"]["name"]);
        $targetFile = $targetDir . time() . "_" . $filename;

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowed)) {
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile);
            $profilePicName = basename($targetFile);

            // Update DB with new image
            $update = $con->prepare("UPDATE users SET fullname=?, email=?, profile_pic=? WHERE id=?");
            $update->bind_param("sssi", $fullname, $email, $profilePicName, $user_id);
        } else {
            $message = "Invalid image format.";
        }
    } else {
        // No image uploaded
        $update = $con->prepare("UPDATE users SET fullname=?, email=? WHERE id=?");
        $update->bind_param("ssi", $fullname, $email, $user_id);
    }

    if (isset($update) && $update->execute()) {
        $_SESSION['user_name'] = $fullname;
        if (isset($profilePicName)) {
            $_SESSION['profile_pic'] = $profilePicName;
        }
        $message = "Profile updated successfully!";
    } else {
        $message = "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .container { max-width: 600px; margin-top: 50px; }
        .profile-img { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; }
    </style>
</head>
<body>
<?php include 'header.php'; ?> <!-- include your navbar here -->

<div class="container">
    <h2>Edit Profile</h2>
    <?php if ($message): ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3 text-center">
            <img src="profile_pictures/<?= htmlspecialchars($user['profile_pic'] ?? 'default.png') ?>"
                 class="profile-img" alt="Profile">
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" value="<?= htmlspecialchars($user['fullname']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" name="profile_pic" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

</body>
</html>
