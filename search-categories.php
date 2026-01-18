<?php
include "config.php";

$searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

// Get matching records
$query = "SELECT * FROM categories 
          WHERE category_name LIKE '%$searchTerm%' 
          ORDER BY id ASC 
          LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $query);

// Display rows
$serialNo = $offset + 1;
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
            <a href="edit-category.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary me-1"><i class="fa fa-edit"></i></a>
            <a href="delete-category.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
<?php
}




