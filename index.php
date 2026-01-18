<?php include "header2.php"?>
<style>    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #fff;
        color: var(--dark-text);
    }

    .hero-section {
        background: linear-gradient(to right,rgb(255, 255, 255),rgb(255, 255, 255));
        padding: 100px 0;
        text-align: center;
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        color: var(--dark-text);
    }

    .hero-section p {
        font-size: 1.3rem;
        color: var(--muted-text);
        margin-top: 10px;
    }

    .carousel-item img {
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }

    .carousel-caption {
        background: rgba(0, 0, 0, 0.6);
        padding: 20px;
        border-radius: 15px;
        backdrop-filter: blur(4px);
    }

    .carousel-caption h2,
    .carousel-caption p {
        color: #fff;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    .section-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 700;
        margin: 60px 0 30px;
        color: var(--dark-text);
        position: relative;
    }

    .section-title::after {
        content: '';
        width: 80px;
        height: 3px;
        background: var(--primary-color);
        display: block;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .product-section {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
    border-top: 1px solid #e9ecef;
}

.btn-shop {
        background-color: var(--primary-color);
        color: white;
        padding: 12px 30px;
        font-size: 1.2rem;
        border-radius: 50px;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(111, 66, 193, 0.3);
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .btn-shop:hover {
        background-color: var(--hover-color);
        box-shadow: 0 6px 16px rgba(111, 66, 193, 0.4);
    }
    .testimonials-section .testimonial-card {
    background-color: #fff;
    padding: 25px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease-in-out;
    height: 100%;
}

.testimonials-section .testimonial-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 20px rgba(122, 85, 163, 0.2);
    background: linear-gradient(to right, rgb(243, 228, 250), rgb(255, 255, 255));
}

.testimonials-section p {
    font-size: 1.05rem;
    color: #4b306a;
    font-style: italic;
    margin: 0;
}

</style>
   <!-- Hero Section -->
    <div class="hero-section">
        <h1>Welcome to SkinZone</h1>
        <p>You are beautiful...</p>
    </div>
    <hr>
    <?php
$conn = new mysqli("localhost", "root", "", "db_skincare");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM skincare_carousel";
$result = $conn->query($sql);

$indicators = "";
$items = "";
$index = 0;

while ($row = $result->fetch_assoc()) {
    $active = ($index === 0) ? 'active' : '';
    $indicators .= "<button type='button' data-bs-target='#skincareCarousel' data-bs-slide-to='{$index}' class='{$active}'></button>";

    $items .= "
    <div class='carousel-item {$active}'>
        <img src='{$row['image_path']}' class='d-block w-100' alt='{$row['alt_text']}'>
        <div class='carousel-caption'>
            <h2>{$row['heading']}</h2>
            <p>{$row['caption']}</p>
        </div>
    </div>";
    $index++;
}

$conn->close();
?>

<!-- Dynamic Carousel Section -->
<div id="skincareCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?= $indicators ?>
    </div>
    <div class="carousel-inner">
        <?= $items ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#skincareCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#skincareCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

    <!-- Skincare Tips Section -->
     <hr>
    <div class="container">
        <h2 class="section-title">--- Skincare Steps ---</h2>
        <p class="text-center">1. ➟ Hydrate well for glowing skin <br> 2. ➟ Use SPF daily for protection ☀ <br> 3. ➟Follow a gentle cleansing routine 🧼</p>
    </div>
<hr>
    <!-- Featured Products Section -->
    <div class="product-section">
        <h2 class="section-title">Discover Our Bestsellers</h2>
        <p>Explore our hand-picked skincare essentials for healthy and glowing skin.</p>
        <a href="products.php" class="btn-shop">Shop Now</a>
    </div>
<hr>
    <!-- Testimonials Section -->
<!-- Testimonials Section -->
<div class="container testimonials-section">
  <h2 class="section-title">What Dermatologists Recommend</h2>
  <div class="row text-center">
    <div class="col-md-4">
      <div class="testimonial-card">
        <p>🌿 "Formulated to hydrate, protect, and nourish all skin types—backed by science."</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-card">
        <p>🧴 "Gentle yet effective—supports skin's natural barrier and radiance."</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-card">
        <p>💧 "Clinically approved ingredients for visibly healthier skin."</p>
      </div>
    </div>
  </div>
</div>

<br>
<hr>
  <?php 
  include "footer.php"
  ?>