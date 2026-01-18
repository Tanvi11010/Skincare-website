<?php include "admin_header.php";?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
  <h2 class="mb-4 fw-bold">Welcome, <?= htmlspecialchars($adminName) ?></h2>
  <div class="row g-4">
    <div class="col-md-3">
      <div class="dashboard-card">
        <i class="fa fa-users fa-2x mb-2"></i>
        <h5>Active Users</h5>
        <h3>120</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="dashboard-card">
        <i class="fa fa-clock fa-2x mb-2"></i>
        <h5>Pending Orders</h5>
        <h3>45</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="dashboard-card">
        <i class="fa fa-box fa-2x mb-2"></i>
        <h5>Total Products</h5>
        <h3>320</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="dashboard-card">
        <i class="fa fa-indian-rupee-sign fa-2x mb-2"></i>
        <h5>Revenue</h5>
        <h3>Rs. 2,50,000</h3>
      </div>
    </div>
  </div>
</div>
<?php include "admin_footer.php";?>
