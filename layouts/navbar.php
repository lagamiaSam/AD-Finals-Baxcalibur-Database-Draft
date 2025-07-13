<?php
  $currentPage = $currentPage ?? '';
?>

<nav>
  <!-- Nav Bar Brand -->
  <div class="navbar-brand">
    <a href="/index.php" title="Brand Logo">
      <img class="brand-logo" src="/assets/img/baxcalibur-logo.png" height="40px" alt="Baxcalibur Logo" />
    </a>
    <a class="brand-name" href="/index.php" title="Brand Name">Baxcalibur</a>
  </div>

  <div class="toggle-menu">
    <button id="toggleMenuBtn" class="toggle-menu-btn" onclick="toggleMenu()" title="Show Menu">
      <span id="toggleIcon" class="material-icons">menu</span>
    </button>
  </div>

  <!-- Nav Bar Links -->
  <div>
    <ul id="navbarLinks" class="navbar-links">
      <li>
        <a href="/pages/userDashboardPage/index.php" class="<?= $currentPage === 'user-dashboard' ? 'active-link' : '' ?>">User Dashboard</a>
      </li>
      <li>
        <a href="/pages/tripsPage/index.php" class="<?= $currentPage === 'admin-dashboard' ? 'active-link' : '' ?>">Trips</a>
      </li>
      <li>
        <a href="/pages/adminDashboardPage/index.php" class="<?= $currentPage === 'admin-dashboard' ? 'active-link' : '' ?>">Admin Dashboard</a>
      </li>
      <li>
        <a id="loginBtnLink" href="/index.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
