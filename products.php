<?php session_start(); ?>
<?php include 'header2.php'; ?><br>
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Responsive height for mobile */
    @media (max-width: 768px) {
        .carousel-item img {
            height: 250px;
        }
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
        /* background: linear-gradient(to right, rgb(191, 130, 201),rgb(220, 197, 236)); */
        /* Default soft background */
        transition: transform 0.4s ease, box-shadow 0.4s ease, background 0.4s ease;
    }

    /* On hover: pop and change background */
    .gallery-item:hover {
        transform: scale(1.04);
        background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
        /* Bold gradient on hover */
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        z-index: 10;
        /* color: white; */
    }

    /* Keep image still, slight dimming on hover */
    .gallery-item img {
        width: 100%;
        height: auto;
        border-radius: 0.75rem;
        transition: filter 0.3s ease;
    }

    .gallery-item:hover img {
        filter: brightness(0.95);
    }

    /* Buttons hidden initially */
    .gallery-item .btn {
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
        margin: 5px;
    }

    /* Buttons fade in on hover */
    .gallery-item:hover .btn {
        opacity: 1;
        transform: translateY(0);
    }

    .gallery-item .btn-primary {
        background: linear-gradient(135deg, rgb(125, 81, 207), rgb(227, 74, 150));
        border: none;
        color: white;
        font-weight: 500;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .gallery-item .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
    }

    .gallery-item .btn-view {
        background: linear-gradient(135deg, rgb(140, 56, 229), rgb(156, 212, 168));
        border: none;
        color: white;
        font-weight: 500;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .gallery-item .btn-view:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(30, 60, 114, 0.4);
    }

    /* Input Group (Search) */
    .input-group input[type="text"] {
        border-radius: 30px 0 0 30px;
        /* border: 2px solid #ff69b4; */
        padding: 10px 20px;
        box-shadow: none;
        transition: all 0.3s ease-in-out;
        font-size: 16px;
    }

    .input-group input[type="text"]:focus {
        border-color: #ff1493;
        box-shadow: 0 0 10px rgba(255, 105, 180, 0.3);
    }

    /* Search Button */
    .input-group .btn {
        border-radius: 0 30px 30px 0;
        /* border: 2px solid #ff69b4; */
        background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
        color: white;
        transition: background 0.3s ease-in-out;
    }

    .input-group .btn:hover {
        background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
    }

    /* Select Dropdowns */
    .form-select {
        border-radius: 30px;
        border: 2px solidrgb(236, 202, 219);
        padding: 10px 15px;
        font-size: 15px;
        background-color: white;
        box-shadow: 0 4px 10px rgba(228, 214, 221, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .form-select:focus {
        border-color: #ff1493;
        box-shadow: 0 0 10px rgba(255, 105, 180, 0.3);
    }

    /* Apply Filter Button */
    .btn-primary {
        border: none;
        background: linear-gradient(to right, rgb(182, 52, 205), rgb(178, 141, 205));
        border-radius: 30px;
        font-weight: bold;
        box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
        transition: background 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: linear-gradient(to right, rgb(182, 52, 205), rgb(178, 141, 205));
    }

    .wishlist-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: white;
        border: none;
        width: 40px;
        /* Equal width and height */
        height: 40px;
        font-size: 20px;
        padding: 8px;
        border-radius: 50%;
        color: #d63384;
        transition: transform 0.3s, background-color 0.3s, color 0.3s;
        z-index: 10;
        box-shadow: 0 2px 6px rgba(255, 255, 255, 0.15);
        display: flex;
        /* Center icon */
        align-items: center;
        justify-content: center;

    }

    .wishlist-btn:hover {
        transform: scale(1.1);
        background-color: rgb(243, 185, 241);
    }

    .wishlist-btn.active {
        background: linear-gradient(135deg, rgb(229, 72, 150), rgb(162, 135, 213));
        color: white;
    }
</style>


<style>
    /* --- Your full aesthetic CSS stays the same --- */
</style>

<!-- 🔍 Search + Filter Form -->
<form method="GET" action="products.php" id="searchForm">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" id="searchInput" name="search" class="form-control" placeholder="Search products..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" oninput="handleSearch()">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <!-- Category Filter -->
                    <div class="col-md-4">
                        <select class="form-select" name="category">
                            <option value="">Choose Category</option>
                            <option value="moisturizer" <?= (isset($_GET['category']) && $_GET['category'] == 'moisturizer') ? 'selected' : '' ?>>moisturizer</option>
                            <option value="Facewash" <?= (isset($_GET['category']) && $_GET['category'] == 'Facewash') ? 'selected' : '' ?>>Facewash</option>
                            <option value="Sunscreen" <?= (isset($_GET['category']) && $_GET['category'] == 'Sunscreen') ? 'selected' : '' ?>>Sunscreen</option>
                            <option value="Eye cream" <?= (isset($_GET['category']) && $_GET['category'] == 'Eye cream') ? 'selected' : '' ?>>Eye cream</option>
                            <option value="Lip balm" <?= (isset($_GET['category']) && $_GET['category'] == 'Lip balm') ? 'selected' : '' ?>>Lip balm</option>
                            <option value="Full-kit" <?= (isset($_GET['category']) && $_GET['category'] == 'Full-kit') ? 'selected' : '' ?>>Full-kit</option>
                        </select>
                    </div>
                    <!-- Price Filter -->
                    <div class="col-md-4">
                        <select class="form-select" name="price">
                            <option value="">Choose Price Range</option>
                            <option value="500-800" <?= (isset($_GET['price']) && $_GET['price'] == '500-800') ? 'selected' : '' ?>>₹500 - ₹800</option>
                            <option value="900-1000" <?= (isset($_GET['price']) && $_GET['price'] == '900-1000') ? 'selected' : '' ?>>₹900 - ₹1000</option>
                            <option value="1000+" <?= (isset($_GET['price']) && $_GET['price'] == '1000+') ? 'selected' : '' ?>>₹1000+</option>
                        </select>
                    </div>
                    <!-- Apply Filters -->
                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary w-100" type="submit">Apply Filters</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- 🔄 Live Search Result Area -->
<div id="productResults" class="container py-4"></div>

<script>
    function handleSearch() {
        const query = document.getElementById("searchInput").value;

        if (query.length >= 3) {
            fetch(`search_products.php?search=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById("productResults");
                    container.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(product => {
                            container.innerHTML += `
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="${product.image}" class="img-fluid rounded-start" alt="${product.name}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">${product.name}</h5>
                                                <p class="card-text">${product.description}</p>
                                                <p class="card-text"><strong>₹${product.price}</strong></p>
                                                <a href="login.php" class="btn btn-primary btn-sm">Buy Now</a>
                                                <a href="products_details.php?id=${product.id}" class="btn btn-view btn-sm">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        });
                    } else {
                        container.innerHTML = `<p class="text-center">No products found 😔</p>`;
                    }
                });
        } else {
            document.getElementById("productResults").innerHTML = '';
        }
    }
</script>

<!-- 🛍️ Product Gallery Section (for non-live search) -->
<?php
$conn = new mysqli("localhost", "root", "", "db_skincare");

$conditions = [];
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$price = $_GET['price'] ?? '';

if (!empty($search)) {
    $conditions[] = "product_name LIKE '%$search%'";
}
if (!empty($category)) {
    $conditions[] = "category = '$category'";
}
if (!empty($price)) {
    if ($price == '500-800') $conditions[] = "price BETWEEN 500 AND 800";
    elseif ($price == '900-1000') $conditions[] = "price BETWEEN 900 AND 1000";
    elseif ($price == '1000+') $conditions[] = "price > 1000";
}

$where = $conditions ? 'WHERE ' . implode(' AND ', $conditions) : '';
$sql = "SELECT * FROM products $where";
$result = $conn->query($sql);
?>
<div id="user-status" data-logged-in="<?= isset($_SESSION['user_id']) ? '1' : '0' ?>"></div>

<?php if ($result->num_rows > 0): ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">Our Skincare Products</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 p-3">
                    <div class="gallery-item border rounded p-3 text-center shadow-sm">
                        <button class="wishlist-btn" onclick="toggleWishlist(this)" title="Add to Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <a href="<?= $row['image_path'] ?>">
                            <img src="<?= $row['image_path'] ?>" alt="<?= $row['product_name'] ?>" class="gallery-img img-fluid rounded">
                        </a>
                        <div class="description fw-bold mt-2"><?= $row['product_name'] ?></div>
                        <?php
                        $original_price = $row['price'];
                        $discount = $row['discount_percent'];
                        $final_price = $discount ? $original_price - ($original_price * $discount / 100) : $original_price;
                        $is_out_of_stock = $row['stock'] <= 0;
                        ?>

                        <?php if ($discount): ?>
                            <div class="cost text-danger fs-5 fw-bold">
                                ₹<?= $final_price ?> <span class="text-muted text-decoration-line-through fs-6">₹<?= $original_price ?></span>
                                <span class="badge bg-success ms-2">-<?= $discount ?>%</span>
                            </div>
                        <?php else: ?>
                            <div class="cost text-success fs-5">₹<?= $original_price ?></div>
                        <?php endif; ?>

                        <?php if ($is_out_of_stock): ?>
                            <div class="badge bg-secondary mt-1">Out of Stock</div>
                        <?php endif; ?>
                        <?php if ($is_out_of_stock): ?>
                            <button class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-primary btn-sm">Buy Now</a>
                        <?php endif; ?>
                        <a href="products_details.php?id=<?= $row['id'] ?>" class="btn btn-view btn-sm">View</a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </div>
<?php else: ?>
    <p class="text-center mt-5">No products found 🥺</p>
<?php endif; ?>
<script>
    // Store PHP session user_id in JavaScript variable
    const isUserLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    function toggleWishlist(btn) {
        const isUserLoggedIn = document.getElementById("user-status").dataset.loggedIn === "1";

        if (!isUserLoggedIn) {
            if (!isUserLoggedIn) {
                Swal.fire({
                    // icon: 'info',
                    title: 'Login Required',
                    // text: 'Please log in to add items to your wishlist 💖',
                    confirmButtonText: 'Login',
                    // confirmButtonColor: '#d63384'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
                return;
            }

            window.location.href = 'login.php';
        };
        return;


        // User is logged in – continue with wishlist toggle
        btn.classList.toggle("active");
        const icon = btn.querySelector("i");

        if (btn.classList.contains("active")) {
            icon.classList.remove("fa-regular");
            icon.classList.add("fa-solid");
            btn.title = "Remove from Wishlist";
        } else {
            icon.classList.remove("fa-solid");
            icon.classList.add("fa-regular");
            btn.title = "Add to Wishlist";
        }
    }
</script>
<!-- Inside products.php -->
<div id="productsContainer"></div>

<script>
    fetch('your-api-or-products-endpoint.php') // or .json
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('productsContainer');
            data.forEach(product => {
                const originalPrice = product.price;
                const discount = product.discount_percent;
                const stock = product.stock;
                const finalPrice = discount ? (originalPrice - (originalPrice * discount / 100)) : originalPrice;

                let priceHTML = discount ?
                    `<span class="text-danger fw-bold">₹${finalPrice}</span> <span class="text-muted text-decoration-line-through fs-6">₹${originalPrice}</span> <span class="badge bg-success ms-2">-${discount}%</span>` :
                    `<span class="text-success fw-bold">₹${originalPrice}</span>`;

                let stockHTML = stock <= 0 ? `<span class="badge bg-secondary ms-2">Out of Stock</span>` : '';

                container.innerHTML += `
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="${product.image}" class="img-fluid rounded-start" alt="${product.name}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text">${priceHTML} ${stockHTML}</p>
                                ${stock <= 0 ? `<button class="btn btn-secondary btn-sm" disabled>Out of Stock</button>` : `<a href="login.php" class="btn btn-primary btn-sm">Buy Now</a>`}
                                <a href="products_details.php?id=${product.id}" class="btn btn-view btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            });
        });
</script>

<?php $conn->close(); ?>
<?php include 'footer.php'; ?>