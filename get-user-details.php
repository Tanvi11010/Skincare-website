<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE id = $id");

    if ($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="row g-4 align-items-center">
          <!-- Profile Picture -->
          <div class="col-md-4 text-center">
            <img src="<?= !empty($row['profile_picture']) ? $row['profile_picture'] : 'assets/img/default-user.png'; ?>" 
                 alt="Profile Picture" 
                 class="img-fluid rounded-circle border" 
                 style="max-width: 150px;">
          </div>
          <!-- User Info -->
          <div class="col-md-8">
            <h5 class="fw-bold"><?= htmlspecialchars($row['fullname']) ?></h5>
            <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
            <p class="mb-1"><strong>Phone:</strong> <?= htmlspecialchars($row['mobile'] ?? 'N/A') ?></p>
            <p class="mb-1"><strong>Gender:</strong> <?= htmlspecialchars($row['gender']) ?></p>
            <p class="mb-1"><strong>Role:</strong> <?= ucfirst($row['account_type']) ?></p>
            <p class="mb-1"><strong>Status:</strong>
              <span class="badge <?= $row['account_status'] === 'Active' ? 'bg-success' : 'bg-danger' ?>">
                <?= ucfirst($row['account_status']) ?>
              </span>
            </p>
            <p class="mb-1"><strong>Joined:</strong> <?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></p>
          </div>
        </div>
        <hr>
        <!-- Address -->
        <p><strong>Address:</strong><br><?= nl2br(htmlspecialchars($row['address'])) ?></p>
        <div class="d-flex justify-content-end gap-2">
          <a href="edit-user.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
          <a href="delete-user.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-trash"></i> Delete</a>
        </div>
        <?php
    } else {
        echo "<div class='text-danger'>User not found.</div>";
    }
} else {
    echo "<div class='text-warning'>No user ID provided.</div>";
}
?>
