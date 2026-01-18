<?php include "admin_header.php"; ?>
<div class="main-content">
  <!-- Heading -->
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div class="mb-2 mb-md-0">
      <h4 class="fw-bold text-dark mb-1">User Management</h4>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="mb-3">
    <input type="text" id="searchBar" class="form-control theme-search shadow-sm" placeholder=" Search by name, email, or role..." />
  </div>

  <div class="table-responsive shadow-sm rounded bg-white">
    <table class="table table-hover align-middle mb-0">
        <thead class="text-white" style="background-color: var(--primary);">
            <tr>
                <th scope="col">Sr. No.</th> <!-- New Serial Number Column -->
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <!-- This is where data will be dynamically inserted via AJAX -->
        <tbody id="userTableBody">
            <!-- Data will be dynamically inserted here by the AJAX call -->
            <?php
            include "config.php";

            $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $totalRes = mysqli_query($con, "SELECT COUNT(*) AS total FROM users");
            $totalUsers = mysqli_fetch_assoc($totalRes)['total'];
            $totalPages = ceil($totalUsers / $limit);

            $query = "SELECT id, fullname, email, account_type, account_status FROM users ORDER BY id ASC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($con, $query);

            // Add serial number for each row
            $serialNo = ($page - 1) * $limit + 1;

            while ($row = mysqli_fetch_assoc($result)) {
                $statusClass = strtolower($row['account_status']) === 'active' ? 'active-status btn-success' : 'inactive-status btn-danger';
            ?>
                <tr>
                    <td><?= $serialNo++; ?></td> <!-- Display Serial Number -->
                    <td><?= htmlspecialchars($row['fullname']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= ucfirst($row['account_type']); ?></td>
                    <td>
                        <button data-id="<?= $row['id']; ?>" class="btn btn-sm toggle-status <?= $statusClass; ?>">
                            <?= ucfirst($row['account_status']); ?>
                        </button>
                    </td>
                    <td class="text-center">
                        <!-- Inside your <td> of Actions -->
                        <button class="btn btn-sm btn-outline-secondary me-1 view-user-btn" 
                                data-id="<?= $row['id']; ?>" 
                                title="View" 
                                data-bs-toggle="modal" 
                                data-bs-target="#userDetailModal">
                            <i class="fa fa-eye"></i>
                        </button>

                        <a href="edit-user.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary me-1" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="delete-user.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


  <!-- Pagination -->
<div class="d-flex justify-content-end mt-4">
    <ul class="pagination pagination-sm mb-0">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link text-dark" href="?page=<?= $page - 1 ?>">Prev</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link <?= $i == $page ? 'text-white' : 'text-dark' ?>" 
                   href="?page=<?= $i ?>" 
                   style="<?= $i == $page ? 'background-color: var(--primary); border: none;' : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link text-dark" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</div>

<!-- User Detail Modal -->
<div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow rounded">
      <div class="modal-header text-white" style="background-color: #9e7fd6;;">
        <h5 class="modal-title" id="userDetailModalLabel">User Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4" id="userDetailBody">
        <!-- User details will be loaded here via AJAX -->
        <div class="text-center text-muted">Loading...</div>
      </div>
    </div>
  </div>
</div>


<!-- Toggle Status Script -->
<script>
  $(document).on('click', '.toggle-status', function () {
    let $btn = $(this);
    let id = $btn.data('id');
    let isActive = $btn.hasClass('active-status');
    let newStatus = isActive ? 'inactive' : 'active';

    // Toggle UI immediately
    $btn
      .toggleClass('active-status btn-success inactive-status btn-danger')
      .text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));

    // Update DB via AJAX
    $.post('update-status.php', { userId: id, status: newStatus }, function (response) {
      console.log(response); // Optional: handle response
    });
  });

  // Listen for input event on the search bar
  document.getElementById('searchBar').addEventListener('input', function () {
    let searchTerm = this.value; // Get the value typed in the search bar

    // Send an AJAX request to the server
    $.ajax({
      url: 'search-users.php',  // File to handle search logic
      type: 'GET',
      data: { search: searchTerm }, // Send the search term
      success: function (response) {
        // Update the table body with the filtered data
        $('#userTableBody').html(response);
      }
    });
  });
  
  $(document).on('click', '.view-user-btn', function () {
  const userId = $(this).data('id');

  // Load the user detail content
  $('#userDetailBody').html('<div class="text-center text-muted">Loading...</div>');

  $.ajax({
    url: 'get-user-details.php',
    type: 'GET',
    data: { id: userId },
    success: function (response) {
      $('#userDetailBody').html(response);
    },
    error: function () {
      $('#userDetailBody').html('<div class="text-danger text-center">Failed to load user details.</div>');
    }
  });
});
</script>


<!-- Custom Styles -->
<style>
  /* Search Bar and Table Styling */
  .theme-search {
    width: 100%;
    max-width: 350px;
    margin-bottom: 1rem;
  }

  .toggle-status {
    min-width: 80px;
    font-weight: 500;
    color: white;
    border: none;
    transition: all 0.3s ease;
  }

  .toggle-status.active-status {
    background-color: #28a745 !important; /* Green */
  }

  .toggle-status.inactive-status {
    background-color: #dc3545 !important; /* Red */
  }

  /* Pagination styling if required */
  .pagination .page-item.active .page-link {
    background-color: var(--primary);
    border-color: var(--primary);
    color: white;
  }
</style>

<?php include "admin_footer.php"; ?>
