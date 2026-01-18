<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script src="font/js/all.min.js"></script>
  <style>
    :root {
      --primary-color: #6f42c1;
      --hover-color: #5936a8;
      --light-bg: #f8f9fa;
      --dark-text: #343a40;
      --muted-text: #6c757d;
    }

    .custom-navbar {
      background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
      font-family: 'Roboto', sans-serif;
      padding: 12px 0;
      border-bottom: 1px solid #e5d4ef;
    }


    .navbar-brand span {
      color: #4b306a;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus,
    .navbar-nav .nav-link:active {
      outline: none;
      box-shadow: 0 0 10px 4px rgba(92, 61, 120, 0.3);
      border-radius: 40px;
      background-color: rgba(46, 11, 53, 0.62);
      color: #fff;
      transition: box-shadow 0.2s ease, background-color 0.2s ease, color 0.2s ease;
    }


    .navbar-nav .nav-link {
      font-size: 1rem;
      color: #5c3d78;
      margin-left: 20px;
      transition: all 0.3s ease;
    }

    .navbar-toggler {
      border: none;
    }

    .navbar-toggler:focus {
      box-shadow: none;
    }

    .text-center p {
      font-size: 1.1rem;
      color: var(--dark-text);
    }

    .row.text-center>div {
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
  </style>
</head>

<body>
 -->
<!-- Navbar -->
<!-- Navbar (same as home page) -->
<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-light custom-navbar shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="images/logo.jpg" alt="SkinZone Logo" class="rounded-circle me-2" width="40" height="40">
        <span style="font-family: 'Playfair Display', serif;" class="fw-bold fs-4 text-dark">SkinZone</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'products.php') ? 'active' : '' ?>" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'contact.php') ? 'active' : '' ?>" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'login.php') ? 'active' : '' ?>" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'register.php') ? 'active' : '' ?>" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script src="font/js/all.min.js"></script>
  <style>
    :root {
      --primary-color: #6f42c1;
      --hover-color: #5936a8;
      --light-bg: #f8f9fa;
      --dark-text: #343a40;
      --muted-text: #6c757d;
    }

    .custom-navbar {
      background: linear-gradient(to right, rgb(199, 155, 207), #f7f0fc);
      font-family: 'Roboto', sans-serif;
      padding: 12px 0;
      border-bottom: 1px solid #e5d4ef;
    }

    .navbar-brand span {
      color: #4b306a;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus,
    .navbar-nav .nav-link:active {
      outline: none;
      box-shadow: 0 0 10px 4px rgba(92, 61, 120, 0.3);
      border-radius: 40px;
      background-color: rgba(46, 11, 53, 0.62);
      color: #fff;
      transition: box-shadow 0.2s ease, background-color 0.2s ease, color 0.2s ease;
    }

    .navbar-nav .nav-link {
      font-size: 1rem;
      color: #5c3d78;
      margin-left: 20px;
      transition: all 0.3s ease;
    }

    .navbar-toggler {
      border: none;
    }

    .navbar-toggler:focus {
      box-shadow: none;
    }

    .text-center p {
      font-size: 1.1rem;
      color: var(--dark-text);
    }

    .row.text-center>div {
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* 🌟 Elegant UX Search Bar Styling (Navbar) 🌟 */
    form.d-flex.search-bar-form {
      background-color: #fff;
      border-radius: 50px;
      padding: 4px 12px;
      width: 220px;
      transition: all 0.3s ease-in-out;
      align-items: center;
    }

    form.d-flex.search-bar-form:hover,
    form.d-flex.search-bar-form:focus-within {
      box-shadow: 0 6px 18px rgba(188, 58, 227, 0.75);
      transform: translateY(-1px);
    }

    form.d-flex.search-bar-form input[type="search"] {
      font-size: 0.9rem;
      padding: 4px 8px;
    }

    form.d-flex.search-bar-form button {
      font-size: 1rem;
    }

    /* Dynamic search results container (dropdown-like) */
    #navbarSearchResults {
      position: absolute;
      top: 60px;
      /* Adjust based on your navbar height */
      right: 10px;
      /* Adjust to align with your search form */
      z-index: 9999;
      background: #fff;
      border: 1px solid #ddd;
      width: 300px;
      max-height: 400px;
      overflow-y: auto;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    #navbarSearchResults div {
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    #navbarSearchResults div:last-child {
      border-bottom: none;
    }

    #navbarSearchResults a {
      text-decoration: none;
      color: #333;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light custom-navbar shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="images/logo.jpg" alt="SkinZone Logo" class="rounded-circle me-2" width="40" height="40" />
        <span style="font-family: 'Playfair Display', serif;" class="fw-bold fs-4 text-dark">SkinZone</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
      <!-- 🌸 Elegant Pill-Style Search near SkinZone -->
      <?php if ($currentPage == 'index.php' || $currentPage == 'products.php'): ?>
        <form class="d-flex search-bar-form ms-3" action="products.php" method="GET">
          <input class="form-control border-0 bg-transparent me-2" type="search" name="query" id="navbarSearchInput" placeholder="Search" aria-label="Search" oninput="navbarLiveSearch()" />
          <button class="btn p-0 text-dark" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      <?php endif; ?>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'products.php') ? 'active' : '' ?>" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'contact.php') ? 'active' : '' ?>" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'login.php') ? 'active' : '' ?>" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'register.php') ? 'active' : '' ?>" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Dynamic Navbar Live Search Results Container -->
  <div id="navbarSearchResults"></div>

  <script>
    function navbarLiveSearch() {
      const query = document.getElementById("navbarSearchInput").value;
      const resultContainer = document.getElementById("navbarSearchResults");

      if (query.length >= 3) {
        fetch(`search_products.php?search=${encodeURIComponent(query)}`)
          .then(response => response.json())
          .then(data => {
            resultContainer.innerHTML = "";
            if (data.length > 0) {
              data.forEach(product => {
                resultContainer.innerHTML += `
                  <div>
                    <a href="products_details.php?id=${product.id}">
                      <strong>${product.name}</strong> - ₹${product.price}<br>
                      <small>${product.description.substring(0, 50)}...</small>
                    </a>
                  </div>
                `;
              });
            } else {
              resultContainer.innerHTML = `<div>No products found</div>`;
            }
          });
      } else {
        resultContainer.innerHTML = "";
      }
    }
  </script>
</body>

</html>