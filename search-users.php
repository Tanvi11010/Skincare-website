<?php
include "config.php"; // Database connection

// Get the search term and handle pagination
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$limit = 5; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query to fetch total number of users for pagination
$totalRes = mysqli_query($con, "SELECT COUNT(*) AS total FROM users WHERE fullname LIKE '%$search%' OR email LIKE '%$search%' OR account_type LIKE '%$search%'");
$totalUsers = mysqli_fetch_assoc($totalRes)['total'];
$totalPages = ceil($totalUsers / $limit);

// Query to fetch users based on search term and pagination
$query = "SELECT id, fullname, email, account_type, account_status FROM users
          WHERE fullname LIKE '%$search%' OR email LIKE '%$search%' OR account_type LIKE '%$search%'
          ORDER BY id ASC LIMIT $limit OFFSET $offset";

$result = mysqli_query($con, $query);

$output = '';
$serialNo = ($page - 1) * $limit + 1; // Initialize serial number

// Fetch results and build the table rows
while ($row = mysqli_fetch_assoc($result)) {
    $statusClass = strtolower($row['account_status']) === 'active' ? 'active-status btn-success' : 'inactive-status btn-danger';
    $output .= "
    <tr>
        <td>{$serialNo}</td>
        <td>" . htmlspecialchars($row['fullname']) . "</td>
        <td>" . htmlspecialchars($row['email']) . "</td>
        <td>" . ucfirst($row['account_type']) . "</td>
        <td>
            <button data-id='{$row['id']}' class='btn btn-sm toggle-status $statusClass'>
                " . ucfirst($row['account_status']) . "
            </button>
        </td>
        <td class='text-center'>
            <button class='btn btn-sm btn-outline-secondary me-1 view-user-btn' data-id='{$row['id']}' title='View' data-bs-toggle='modal' data-bs-target='#userDetailModal'>
                <i class='fa fa-eye'></i>
            </button>
            <a href='edit-user.php?id={$row['id']}' class='btn btn-sm btn-outline-primary me-1' title='Edit'><i class='fa fa-edit'></i></a>
            <a href='delete-user.php?id={$row['id']}' class='btn btn-sm btn-outline-danger' title='Delete' onclick='return confirm(\"Are you sure?\");'><i class='fa fa-trash'></i></a>
        </td>
    </tr>";
    $serialNo++;
}

echo $output;
?>
