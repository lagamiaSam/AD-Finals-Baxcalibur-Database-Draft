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
        <a href="/pages/adminDashboardPage/index.php" class="active-link <?= $currentPage === 'user-dashboard' ? 'active-link' : '' ?>">Admin Dashboard</a>
      </li>
      <li>
        <form action="/handlers/auth.handler.php" method="POST">
          <input type="hidden" name="action" value="logout">
          <button type="submit" class="logout-button">Log Out</button>
        </form>
      </li>
    </ul>
  </div>
</nav>
