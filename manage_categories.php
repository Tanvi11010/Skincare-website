<?php include "admin_header.php"; ?>

<div class="main-content">
  <!-- Heading -->
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div class="mb-2 mb-md-0">
      <h4 class="fw-bold text-dark mb-1">Category Management</h4>
    </div>
  </div>

  <!-- Search Bar -->
  <!-- Search + Add Button Row -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
  <input type="text" id="searchBar" class="form-control theme-search shadow-sm me-2" placeholder="Search by category name..." />

  <button class="btn custom-btn mt-2 mt-md-0" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    <i class="fa fa-plus me-1"></i> Add Category
  </button>
</div>
<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <form action="add-category.php" method="POST">
        <div class="modal-header" style="background-color: var(--primary); color: white;">
          <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="category_name" required>
          </div>
          <div class="mb-3">
            <label for="categoryDesc" class="form-label">Description</label>
            <textarea class="form-control" id="categoryDesc" name="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
              <option value="active" selected>Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn custom-btn">Add Category</button>
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- Table to Display Categories -->
  <div class="table-responsive shadow-sm rounded bg-white">
    <table class="table table-hover align-middle mb-0">
      <thead class="text-white" style="background-color: var(--primary);">
        <tr>
          <th scope="col">Sr. No.</th>
          <th scope="col">Category Name</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody id="categoryTableBody">
        <?php
        include "config.php";

        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $totalRes = mysqli_query($con, "SELECT COUNT(*) AS total FROM categories");
        $totalCategories = mysqli_fetch_assoc($totalRes)['total'];
        $totalPages = ceil($totalCategories / $limit);

        $query = "SELECT id, category_name, description, status FROM categories ORDER BY id ASC LIMIT $limit OFFSET $offset";
        $result = mysqli_query($con, $query);

        // Add serial number for each row
        $serialNo = ($page - 1) * $limit + 1;

        while ($row = mysqli_fetch_assoc($result)) {
            $statusClass = strtolower($row['status']) === 'active' ? 'active-status btn-success' : 'inactive-status btn-danger';
        ?>
            <tr>
                <td><?= $serialNo++; ?></td>
                <td><?= htmlspecialchars($row['category_name']); ?></td>
                <td><?= htmlspecialchars($row['description']); ?></td>
                <td>
                    <button data-id="<?= $row['id']; ?>" class="btn btn-sm toggle-status <?= $statusClass; ?>">
                        <?= ucfirst($row['status']); ?>
                    </button>
                </td>
                <td class="text-center">
                    <a href="edit-category.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary me-1" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="delete-category.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
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
</div>

<!-- Toggle Status Script -->
<script>
function fetchCategories(searchTerm = '', page = 1) {
  $.ajax({
    url: 'search-categories.php',
    type: 'GET',
    data: { search: searchTerm, page: page },
    success: function (response) {
      $('#categoryTableBody').html(response);
    }
  });
}

// Search input listener
document.getElementById('searchBar').addEventListener('input', function () {
  fetchCategories(this.value.trim(), 1); // Go to page 1 on new search
});

// Pagination clicks (delegated)
$(document).on('click', '.pagination-link', function (e) {
  e.preventDefault();
  const page = $(this).data('page');
  const searchTerm = $('#searchBar').val().trim();
  fetchCategories(searchTerm, page);
});

// Toggle category status
$(document).on('click', '.toggle-status', function () {
  const $btn = $(this);
  const id = $btn.data('id');
  const isActive = $btn.hasClass('active-status');
  const newStatus = isActive ? 'Inactive' : 'Active';

  // Optimistically update UI
  $btn
    .toggleClass('active-status btn-success inactive-status btn-danger')
    .text(newStatus);

  // AJAX call to backend
  $.post('update-status-category.php', { categoryId: id, status: newStatus })
    .fail(function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
      alert("Failed to update status. Please try again.");
    });
});
</script>


<!-- Custom Styles -->
<style>
  .theme-search {
    width: 100%;
    max-width: 350px;
    margin-bottom: 1rem;
  }

  .toggle-status {
  min-width: 90px;
  font-weight: 600;
  color: #fff;
  border: none;
  border-radius: 20px;
  padding: 6px 12px;
  font-size: 0.85rem;
  text-transform: capitalize;
  transition: background-color 0.3s ease;
}

.toggle-status.active-status {
  background-color: #28a745; /* Green for active */
}

.toggle-status.inactive-status {
  background-color: #dc3545; /* Red for inactive */
}


  /* Pagination styling if required */
  .pagination .page-item.active .page-link {
    background-color: var(--primary);
    border-color: var(--primary);
    color: white;
  }
  .theme-search {
  max-width: 350px;
  width: 100%;
}

.custom-btn {
  background-color: transparent;
  color: var(--primary);
  border: 2px solid var(--primary);
  padding: 0.5rem 1rem;
  font-size: 0.9rem;
  border-radius: 4px;
  transition: 0.3s ease;
  font-weight: 500;
}

.custom-btn:hover {
  background-color: var(--primary);
  color: white;
  box-shadow: 0 4px 10px rgba(160, 118, 214, 0.3);
}
.custom-btn {
  background-color: transparent; /* Transparent background by default */
  color: var(--primary); /* Use the primary color for the text */
  border: 2px solid var(--primary); /* Border with the primary color */
  padding: 0.5rem 1rem; /* Padding */
  font-size: 0.9rem; /* Font size */
  border-radius: 4px; /* Rounded corners */
  transition: 0.3s ease; /* Smooth transition */
  font-weight: 500; /* Bold font */
}

.custom-btn:hover {
  background-color: var(--primary); /* Change background color on hover */
  color: white; /* Change text color to white */
  box-shadow: 0 4px 10px rgba(160, 118, 214, 0.3); /* Glow effect */
}


</style>

<?php include "admin_footer.php"; ?>
