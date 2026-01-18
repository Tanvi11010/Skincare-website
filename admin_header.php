<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$currentPage = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    global $currentPage;
    return $currentPage === $page ? 'active-link' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>

  <!-- Bootstrap & jQuery -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>:root {
  --primary: #a076d6;
  --secondary: #e9d8fd;
  --dark: #4a4063;
  --light: #f8f9fa;
  --hover-dark: #9e7fd6;
  --card-dark: #d1c6e1;
}

body {
  background-color: var(--light);
  font-family: 'Segoe UI', sans-serif;
}

.navbar {
  background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
  font-weight: bold;
  color: var(--dark);
}

.navbar-toggler {
  border: none;
}

#sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 250px;
  height: 100vh;
  background: linear-gradient(to bottom, var(--primary), var(--secondary));
  padding-top: 80px;
  color: white;
  transition: all 0.3s ease;
  z-index: 1000;
}

#sidebar.collapsed {
  width: 70px; /* Reduced width when collapsed */
}

#sidebar .nav-link {
  color: white;
  padding: 12px 20px;
  display: flex;
  align-items: center;
  white-space: nowrap;
  transition: background 0.3s, color 0.3s;
}

#sidebar .nav-link i {
  margin-right: 10px;
  transition: color 0.3s;
}

#sidebar .nav-link:hover,
.navbar-nav .nav-link:hover {
  background-color: rgba(255, 255, 255, 0.15);
  color: #fff;
}

#sidebar .nav-link:hover i,
#sidebar .active-link i,
.navbar-nav .nav-link:hover i,
.navbar-nav .active-link i {
  color: white;
}

.active-link {
  background-color: rgba(255, 255, 255, 0.3);
  font-weight: bold;
  border-left: 4px solid white;
}

.navbar-nav .active-link {
  font-weight: bold;
  border-left: 4px solid var(--primary);
  background-color: #f2e8fd;
  color: var(--dark);
}

.main-content {
  margin-left: 250px; /* Default margin-left for expanded sidebar */
  padding: 100px 20px 20px; /* Padding to avoid navbar overlap */
  transition: margin-left 0.3s ease; /* Smooth transition when changing margin */
}

.main-content.collapsed {
  margin-left: 70px; /* Reduced margin-left when sidebar is collapsed */
}

.sidebar-toggle {
  background: none;
  border: none;
  font-size: 1.2rem;
  color: var(--dark);
  margin-right: 10px;
}

.dashboard-card {
  border-radius: 15px;
  background: linear-gradient(145deg, var(--card-dark), #fff);
  box-shadow: 0 6px 15px rgba(160, 118, 214, 0.15);
  color: var(--dark);
  text-align: center;
  padding: 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.dashboard-card:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 30px rgba(160, 118, 214, 0.3);
}

footer {
  background-color: #f1edf9;
  color: #5a4a7d;
  font-size: 14px;
  padding: 20px 0;
  text-align: center;
  border-top: 1px solid #ddd;
}

footer a {
  color: var(--primary);
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

@media (max-width: 991.98px) {
  #sidebar {
    display: none; /* Sidebar hidden on smaller screens */
  }

  .main-content {
    margin-left: 0; /* Full width for main content on smaller screens */
  }

  .navbar-nav {
    display: flex;
  }
}

@media (min-width: 992px) {
  .navbar-nav {
    display: none !important;
  }
}

#sidebar.collapsed .nav-link span {
  display: none; /* Hide text in collapsed sidebar */
}

#sidebar.collapsed .nav-link {
  justify-content: center; /* Center the icons in collapsed sidebar */
}

#adminDropdown::after,
#adminDropdownMobile::after {
  color: var(--dark);
}

.table thead th {
  font-weight: 600;
}

.table tbody tr:hover {
  background-color: var(--secondary);
}

.badge.bg-success {
  background-color: #28a745;
}

.badge.bg-danger {
  background-color: #dc3545;
}
.theme-search {
  max-width: 350px;
  border: 1.5px solid #ccc;
  transition: box-shadow 0.3s ease, border-color 0.3s ease;
}

.theme-search:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0.3rem var(--card-dark);
  outline: none;
}


</style>
<style>
.modal-content {
  border-radius: 1rem;
}
.modal-header {
  border-top-left-radius: 1rem;
  border-top-right-radius: 1rem;
}
</style>
<script>$(document).ready(function () {
    // Toggle sidebar and content area size
    $('#toggleSidebar').click(function () {
        $('#sidebar').toggleClass('collapsed'); // Toggle collapsed class for sidebar
        $('.main-content').toggleClass('collapsed'); // Toggle collapsed class for content
    });
});
</script>

<body>
<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top px-4">
  <div class="container-fluid">

    <!-- Left: Sidebar toggle + Logo -->
    <div class="d-flex align-items-center">
      <button class="sidebar-toggle d-none d-lg-block me-2" id="toggleSidebar">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="images/logo.jpg" width="40" height="40" class="rounded-circle me-2" />
        <span>SkinZone</span>
      </a>
    </div>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Content -->
    <div class="collapse navbar-collapse justify-content-end" id="topNav">
<!-- 📱 Two-Column Mobile Nav -->
<div class="d-lg-none container mt-3">
  <div class="row">
    <!-- Left Column -->
    <div class="col-6">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link <?= isActive('admin2.php') ?>" href="admin2.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link <?= isActive('manage_user.php') ?>" href="manage_user.php">Users</a></li>
        <li class="nav-item"><a class="nav-link <?= isActive('admin-product.php') ?>" href="admin-product.php">Products</a></li>
        <li class="nav-item"><a class="nav-link <?= isActive('manage_categories.php') ?>" href="manage_categories.php">Categories</a></li>
        <li class="nav-item"><a class="nav-link <?= isActive('admin-offer.php') ?>" href="admin-offer.php">Offers</a></li>
      </ul>
    </div>

    <!-- Right Column -->
    <div class="col-6">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link <?= isActive('admin-inquiry.php') ?>" href="admin-inquiry.php">Inquiries</a></li>
        <li class="nav-item"><a class="nav-link <?= isActive('admin-order.php') ?>" href="admin-order.php">Orders</a></li>
        <li class="nav-item"><a class="nav-link <?= isActive('edit-slide.php') ?>" href="edit-slide.php">Sliders</a></li>
      </ul>
    </div>
  </div>

  <!-- 👤 Mobile Admin Dropdown -->
  <ul class="navbar-nav mt-4 border-top pt-3">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="adminDropdownMobile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="images/profile.jpg" width="35" height="35" class="rounded-circle me-2" alt="Profile" />
        <span><?= htmlspecialchars($adminName) ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdownMobile">
        <li><a class="dropdown-item" href="edit-profile.php"><i class="fa fa-user-edit me-2"></i> Edit Profile</a></li>
        <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa fa-sign-out-alt me-2"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</div>


      <!-- Desktop Only: Admin profile (right corner) -->
      <!-- Desktop Only: Admin profile with dropdown -->
<div class="dropdown d-none d-lg-block ms-auto">
  <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  <img src="images/profile.jpg" width="40" height="40" class="rounded-circle border border-white shadow-sm me-2" alt="Admin" />

    <span class="me-2 text-dark fw-semibold"> <?= htmlspecialchars($adminName) ?></span>
    
  </a>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
    <li><a class="dropdown-item" href="edit-profile.php"><i class="fa fa-user-edit me-2"></i> Edit Profile</a></li>
    <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa fa-sign-out-alt me-2"></i> Logout</a></li>
  </ul>
</div>


    </div>
  </div>
</nav>


<!-- Sidebar -->
<div id="sidebar" class="d-none d-lg-block">
  <a href="admin2.php" class="nav-link <?= isActive('admin2.php') ?>"><i class="fa fa-home"></i><span> Dashboard</span></a>
  <a href="manage_user.php" class="nav-link <?= isActive('manage_user.php') ?>"><i class="fa fa-users"></i><span> Users</span></a>
  <a href="admin-product.php" class="nav-link <?= isActive('admin-product.php') ?>"><i class="fa fa-box"></i><span> Products</span></a>
  <a href="manage_categories.php" class="nav-link <?= isActive('manage_categories.php') ?>"><i class="fa fa-list"></i><span> Categories</span></a>
  <a href="admin-offer.php" class="nav-link <?= isActive('admin-offer.php') ?>"><i class="fa fa-tags"></i><span> Offers</span></a>
  <a href="view_contact.php" class="nav-link <?= isActive('view_contact.php') ?>"><i class="fa fa-envelope"></i><span>Contact Messages</span></a>
  <a href="admin-order.php" class="nav-link <?= isActive('admin-order.php') ?>"><i class="fa fa-shopping-cart"></i><span> Orders</span></a>
  <a href="edit-slide.php" class="nav-link <?= isActive('edit-slide.php') ?>"><i class="fa fa-images"></i><span> Sliders</span></a>
  <a href="logout.php" class="nav-link text-danger"><i class="fa fa-sign-out-alt"></i><span> Logout</span></a>
</div>