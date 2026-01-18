<?php include "admin_header.php"; ?>
<?php include "config.php"; ?>

<?php
$userDetails = null;

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE id = $id");

    if ($row = mysqli_fetch_assoc($query)) {
        $userDetails = $row;
    }
}
?>

<div class="main-content">
  <div class="container py-4">

    <div class="mb-4 d-flex justify-content-between align-items-center">
      <h4 class="fw-bold text-dark mb-0">View User</h4>
      <a href="admin_user_list.php" class="btn btn-sm btn-outline-primary">← Back to User List</a>
    </div>

    <?php if ($userDetails): ?>
      <!-- Trigger Modal Automatically -->
      <script>
        window.onload = function () {
          var modal = new bootstrap.Modal(document.getElementById('userModal'));
          modal.show();
        }
      </script>

      <!-- User Info Modal -->
      <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content shadow rounded">
            <div class="modal-header text-white" style="background-color: #9e7fd6;;">
              <h5 class="modal-title" id="userModalLabel">User Details</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
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
                  <h5 class="fw-bold"><?= htmlspecialchars($userDetails['fullname']) ?></h5>
                  <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($userDetails['email']) ?></p>
                  <p class="mb-1"><strong>Phone:</strong> <?= htmlspecialchars($userDetails['mobile']) ?></p>
                  <p class="mb-1"><strong>Gender:</strong> <?= $userDetails['gender'] ?></p>
                  <p class="mb-1"><strong>Role:</strong> <?= ucfirst($userDetails['account_type']) ?></p>
                  <p class="mb-1"><strong>Status:</strong>
                    <span class="badge <?= $userDetails['account_status'] === 'active' ? 'bg-success' : 'bg-danger' ?>">
                      <?= ucfirst($userDetails['account_status']) ?>
                    </span>
                  </p>
                  <p class="mb-1"><strong>Joined:</strong> <?= date('d M Y, h:i A', strtotime($userDetails['created_at'])) ?></p>
                </div>
              </div>
              <hr>
              <!-- Address -->
              <p><strong>Address:</strong><br><?= nl2br(htmlspecialchars($userDetails['address'])) ?></p>
            </div>
            <div class="modal-footer">
              <a href="edit-user.php?id=<?= $userDetails['id'] ?>" class="btn btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
              <a href="delete-user.php?id=<?= $userDetails['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-trash"></i> Delete</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="alert alert-danger">User not found or ID missing.</div>
    <?php endif; ?>

  </div>
</div>

<?php include "admin_footer.php"; ?>
