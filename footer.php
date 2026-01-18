<!-- footer.php -->
<footer class="footer mt-auto">
    <div class="container">
        <div class="row g-5">
            <!-- Logo & Tagline -->
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="images/logo.jpg" alt="SkinZone Logo" class="rounded-circle me-3" width="50" height="50">
                    <h4 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif;">SkinZone</h4>
                </div>
                <p style="font-size: 0.95rem; color: #4b306a;">Naturally nourishing, beautifully glowing. We craft skincare with soul, for skin that shines from within 🌸</p>
            </div>

            <!-- Navigation -->
            <div class="col-md-2">
                <h5 class="fw-semibold mb-3">Explore</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="footer-link">Home</a></li>
                    <li><a href="products.php" class="footer-link">Products</a></li>
                    <li><a href="about.php" class="footer-link">About us</a></li>
                    <li><a href="contact.php" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="col-md-2">
                <h5 class="fw-semibold mb-3">Support</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Privacy Policy</a></li>
                    <li><a href="#" class="footer-link">Terms & Conditions</a></li>
                    <li><a href="#" class="footer-link">Shipping Info</a></li>
                    <li><a href="#" class="footer-link">Returns</a></li>
                </ul>
            </div>

<!-- Why Choose Us -->
<div class="col-md-4">
    <h5 class="fw-semibold mb-3">Why Choose SkinZone 💖</h5>
    <ul class="list-unstyled text-muted" style="font-size: 0.95rem;">
        <li><i class="fas fa-seedling me-2 text-success"></i> 100% Natural Ingredients</li>
        <li><i class="fas fa-flask me-2 text-primary"></i> Dermatologist-Tested Formulas</li>
        <li><i class="fas fa-smile-beam me-2 text-warning"></i> Glowing Skin Guarantee</li>
        <li><i class="fas fa-globe-asia me-2 text-info"></i> Eco-Friendly & Cruelty-Free</li>
    </ul>
    <small class="d-block text-muted mt-2">We're all about real beauty, real results — naturally 🌿</small>
</div>
        <hr class="my-2">

        <!-- Bottom Footer -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-2 mb-md-0" style="font-size: 0.9rem;">&copy; 2024 <strong>SkinZone</strong>. All rights reserved.</p>
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Styles -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Roboto&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
    }

    .footer {
        background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
        color: #333;
        padding: 60px 0 30px;
    }

    .footer-link {
        display: block;
        margin-bottom: 8px;
        color: #666;
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .footer-link:hover {
        color:rgb(80, 18, 78);
        transform: translateX(5px);
    }

    .btn-subscribe {
        background-color: #b66db3;
        color: white;
        border: none;
        padding: 8px 20px;
        transition: background 0.3s ease;
    }

    .btn-subscribe:hover {
        background-color: #9e5a9e;
    }

    .social-icons a {
        color: #6c757d;
        margin-left: 15px;
        font-size: 1.2rem;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-icons a:hover {
        color:rgb(112, 40, 110);
        transform: scale(1.2);
    }
</style>

</body>
</html>
<?php ob_end_flush(); ?>
