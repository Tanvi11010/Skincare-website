<?php include "admin_header.php"; ?>
<div class="main-content">

  <!-- Heading -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark">Category Management</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
      <i class="fa fa-plus me-1"></i> Add Category
    </button>
  </div>

  <!-- Search Bar -->
  <div class="mb-3">
    <input type="text" id="categorySearch" class="form-control shadow-sm theme-search" placeholder="Search categories..." />
  </div>

  <!-- Category Table -->
  <div class="table-responsive bg-white shadow-sm rounded">
    <table class="table table-hover align-middle mb-0">
      <thead class="text-white" style="background-color: var(--primary);">
        <tr>
          <th>Sr. No.</th>
          <th>Category Name</th>
          <th>Description</th>
          <th class="text-center">Actions</th>
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

        $query = "SELECT * FROM categories ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $result = mysqli_query($con, $query);
        $serial = $offset + 1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?= $serial++; ?></td>
          <td><?= htmlspecialchars($row['name']); ?></td>
          <td><?= htmlspecialchars($row['description']); ?></td>
          <td class="text-center">
            <a href="edit-category.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary me-1" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="delete-category.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="fa fa-trash"></i></a>
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
        <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Prev</a></li>
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
        <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
      <?php endif; ?>
    </ul>
  </div>

</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow rounded">
      <div class="modal-header text-white" style="background-color: var(--primary);">
        <h5 class="modal-title">Add New Category</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add-category.php" method="POST">
        <div class="modal-body p-4">
          <div class="mb-3">
            <label for="catName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="catName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="catDesc" class="form-label">Description</label>
            <textarea class="form-control" id="catDesc" name="description" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
  $('#categorySearch').on('input', function () {
    const search = $(this).val();
    $.get('search-categories.php', { search }, function (response) {
      $('#categoryTableBody').html(response);
    });
  });
</script>

<style>
  .theme-search {
    max-width: 350px;
  }
  .pagination .page-item.active .page-link {
    background-color: var(--primary);
    border-color: var(--primary);
    color: white;
  }
</style>

<?php include "admin_footer.php"; ?>
