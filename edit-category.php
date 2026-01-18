<?php include "admin_header.php"; ?>
<?php include "config.php"; ?>

<?php

$category = []; // Initialize to prevent undefined variable

// Fetch category data by ID
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM categories WHERE id = $id");

    if ($query && mysqli_num_rows($query) > 0) {
        $category = mysqli_fetch_assoc($query);
    } else {
        echo "<script>alert('Category not found.'); window.location='manage_categories.php';</script>";
        exit;
    }
}


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = $_POST['status'];

    $updateQuery = "UPDATE categories SET 
        category_name = '$category_name', 
        description = '$description', 
        status = '$status' 
        WHERE id = $id";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Category updated successfully!'); window.location='manage_categories.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Error updating category.</div>";
    }
}
?>

<div class="main-content container py-4" style="padding-top: 100px;">
    <h4 class="fw-bold text-dark mb-4">Edit Category</h4>

    <div class="form-container bg-white p-4 rounded shadow-sm" style="max-width: 700px; margin: 0 auto;">
        <form method="POST">
            <h4 class="fw-bold text-dark mb-4 text-center">Update Category</h4>
            <hr class="theme-hr">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="category_name" class="form-control" value="<?= htmlspecialchars($category['category_name']) ?>" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($category['description']) ?></textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="active" <?= $category['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $category['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn custom-btn">Save Changes</button>
                <a href="category.php" class="btn custom-btn">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include "admin_footer.php"; ?>

<!-- Same styling reused from your reference -->
<style>
    :root {
        --primary: #a076d6;
        --secondary: #e9d8fd;
        --dark: #4a4063;
        --light: #f8f9fa;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 10px rgba(160, 118, 214, 0.6);
    }

    .custom-btn {
        background-color: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: 4px;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .custom-btn:hover {
        background-color: var(--primary);
        color: white;
        box-shadow: 0 4px 8px rgba(160, 118, 214, 0.3);
    }

    .custom-btn:active {
        transform: translateY(1px);
        box-shadow: none;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .form-container:hover {
        box-shadow: 0 10px 20px rgba(160, 118, 214, 0.5) !important;
    }

    .form-label {
        font-weight: 600;
        color: var(--dark);
    }

    .theme-hr {
        border: 0;
        height: 2px;
        background-color: var(--primary);
        margin: 20px 0;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }

        .custom-btn {
            padding: 0.6rem 1.2rem;
        }
    }
</style>
