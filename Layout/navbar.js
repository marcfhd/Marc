document.addEventListener('DOMContentLoaded', function() {
  const navbarContainer = document.getElementById('navbar');
  const currentPath = window.location.pathname;
  const isNested = currentPath.includes('/pages/') || currentPath.includes('\\pages\\');
  const basePrefix = isNested ? '../' : 'pages/';

  const navbarHTML = `
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="../home/index.html">💻 TechHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="${basePrefix}products/index.html">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="${basePrefix}contact/contact.html">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="${basePrefix}auth/signup.html">Sign Up</a>
            </li>
          </ul>
          <div class="d-flex align-items-center ms-3">
            <a href="${basePrefix}auth/login.html" class="nav-icon me-3" title="Login">
              <i class="fa-solid fa-user"></i>
            </a>
            <a href="${basePrefix}favorites/favorites.html" class="nav-icon me-3" title="Favorites">
              <i class="fa-solid fa-heart"></i>
            </a>
            <a href="${basePrefix}cart/cart.html" class="nav-icon" title="Cart">
              <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </div>
        </div>
      </div>
    </nav>
  `;

  navbarContainer.innerHTML = navbarHTML;
});