<style>
    /* Main Product Image */
    .product-image {
        max-width: 100%;
        max-height: 350px;
        object-fit: contain;
        border-radius: 12px;
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .custom-other-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: zoom-in;
    }

    .custom-other-image:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .star-rating {
        color: #FFB400;
    }

    .star {
        font-size: 18px;
    }


    /* Customer Reviews Styling */
    .review {
        background-color: rgb(232, 224, 240);
        /* Soft light gray */
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .review:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .review .fw-bold {
        font-size: 18px;
        color: #333;
    }

    .review .star-rating {
        font-size: 16px;
        margin: 5px 0;
    }

    .review p {
        margin: 5px 0;
        color: #555;
    }

    .btn-primary {
        background: linear-gradient(135deg, rgb(161, 138, 207), rgb(225, 145, 185));
        /* border: none; */
        color: white;
        font-weight: 500;
        padding: 10px 20px;
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
    }

    .btn-success {
        background: linear-gradient(135deg, rgb(40, 207, 233), rgb(58, 187, 242));
        /* border: none; */
        color: white;
        font-weight: 500;
        padding: 10px 20px;
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .btn-success:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(27, 204, 66, 0.3);
    }
</style>

<?php
include 'header2.php';

$conn = new mysqli("localhost", "root", "", "db_skincare");
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0):
    $row = $result->fetch_assoc();
    $other_images = explode(',', $row['other_images']);
?>

    <div class="container mt-4">
        <div class="row">
            <!-- Main Product Image -->
            <div class="col-md-6 text-center">
                <a href="<?= $row['image_path'] ?>" target="_blank">
                    <img src="<?= $row['image_path'] ?>" alt="<?= $row['product_name'] ?>" class="product-image img-fluid" id="main-image">
                </a>
            </div>

            <!-- Other Images With Reviews -->
            <div class="col-12 col-md-4">
                <h5>Other Images</h5>
                <br>
                <div class="row g-3">
                    <?php foreach ($other_images as $img): ?>
                        <div class="col-6">
                            <a href="<?= trim($img) ?>" data-bs-toggle="modal" data-bs-target="#lightboxModal" data-img="<?= trim($img) ?>">
                                <img src="<?= trim($img) ?>" alt="Product Image" class="img-fluid custom-other-image">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <br>
                <!-- Customer Reviews Section -->
                <div class="mt-4">
                    <h5>Customer Reviews</h5>
                    <?php
                    $sql_reviews = "SELECT * FROM reviews WHERE product_id = $product_id ORDER BY created_at DESC";
                    $result_reviews = $conn->query($sql_reviews);

                    if ($result_reviews->num_rows > 0):
                        while ($review = $result_reviews->fetch_assoc()):
                    ?>
                            <div class="review mt-3">
                                <div class="fw-bold"><?= $review['review_title'] ?></div>
                                <div class="star-rating">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo ($i <= $review['rating']) ? '★' : '☆';
                                    }
                                    ?>
                                </div>
                                <p><?= $review['review_text'] ?></p>
                                <p class="text">- <?= $review['reviewer_name'] ?></p>
                            </div>
                        <?php endwhile;
                    else: ?>
                        <p>No reviews yet. Be the first to review this product!</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h4><?= $row['product_name'] ?></h4><br>
                <p><strong>Description:</strong> <?= isset($row['description']) && !empty($row['description']) ? $row['description'] : 'No description available' ?></p>
                <p><strong>Price:</strong> ₹<?= $row['price'] ?></p>
                <p><strong>Net Quantity:</strong> <?= isset($row['net_quantity']) && !empty($row['net_quantity']) ? $row['net_quantity'] : 'N/A' ?></p>
                <p><strong>Manufacturer:</strong> <?= isset($row['manufacturer']) && !empty($row['manufacturer']) ? $row['manufacturer'] : 'N/A' ?></p>
                <p><strong>Item Weight:</strong> <?= isset($row['item_weight']) && !empty($row['item_weight']) ? $row['item_weight'] : 'N/A' ?></p>

                <a href="login.php" class="btn btn-primary">Add to Cart</a>
                <a href="login.php" class="btn btn-success">Buy Now</a>
            </div>
        </div>
    </div>
    <br>
    <!-- Lightbox Modal -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body p-0">
                    <img src="" id="lightboxImage" class="img-fluid rounded" alt="Zoomed Image">
                </div>
            </div>
        </div>
    </div>

    <script>
        const lightboxModal = document.getElementById('lightboxModal');
        lightboxModal.addEventListener('show.bs.modal', function(event) {
            const triggerLink = event.relatedTarget;
            const imgSrc = triggerLink.getAttribute('data-img');
            const lightboxImage = document.getElementById('lightboxImage');
            lightboxImage.src = imgSrc;
        });
    </script>

<?php
else:
    echo "<div class='container my-5 text-center'><h4>Product not found!</h4></div>";
endif;

$conn->close();
include 'footer.php';
?>