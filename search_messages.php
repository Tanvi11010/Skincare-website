<?php
include "config.php";

$searchQuery = isset($_GET['query']) ? mysqli_real_escape_string($con, $_GET['query']) : '';

$query = "SELECT id, name, email, subject, status, created_at 
          FROM contact_us_messages 
          WHERE name LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%' OR subject LIKE '%$searchQuery%'
          ORDER BY created_at DESC LIMIT 5";

$result = mysqli_query($con, $query);

$serialNo = 1;

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?= $serialNo++; ?></td>
        <td><?= htmlspecialchars($row['name']); ?></td>
        <td><?= htmlspecialchars($row['email']); ?></td>
        <td><?= htmlspecialchars($row['subject']); ?></td>
        <td><?= htmlspecialchars($row['created_at']); ?></td>
        <td>
            <button class="btn btn-sm toggle-status-btn 
                        <?= ($row['status'] == 'read') ? 'btn-success' : 'btn-warning'; ?>" 
                    data-id="<?= $row['id']; ?>">
                <?= ucfirst($row['status']); ?>
            </button>
        </td>
        <td class="text-center">
            <button class="btn btn-sm btn-outline-secondary me-1 view-message-btn" 
                    data-id="<?= $row['id']; ?>" 
                    title="View" 
                    data-bs-toggle="modal" 
                    data-bs-target="#messageDetailModal">
                <i class="fa fa-eye"></i>
            </button>
            <button class="btn btn-sm btn-outline-primary reply-btn"
                    data-id="<?= $row['id']; ?>" 
                    title="Reply" 
                    data-bs-toggle="modal" 
                    data-bs-target="#replyModal">
                <i class="fa fa-reply"></i> Reply
            </button>
            <button class="btn btn-sm btn-outline-danger delete-btn" 
                    data-id="<?= $row['id']; ?>" 
                    title="Delete Message">
                <i class="fa fa-trash"></i> Delete
            </button>
        </td>
    </tr>
    <?php
}
?>
