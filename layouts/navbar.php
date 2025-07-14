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
        <a href="/pages/itineraryFirstPage/index.php" class="<?= $currentPage === 'admin-dashboard' ? 'active-link' : '' ?>">Trips</a>
      </li>
      <li>
        <a href="/pages/itinerarySecondPage/index.php" class="<?= $currentPage === 'admin-dashboard' ? 'active-link' : '' ?>">2nd iti</a>
      </li>
       <li>
        <a href="/pages/itineraryThirdPage/index.php" class="<?= $currentPage === 'admin-dashboard' ? 'active-link' : '' ?>">3rd iti</a>
      </li>
      <li>
        <form action="/handlers/auth.handler.php" method="POST">
          <input type="hidden" name="action" value="logout">
          <button type="submit" class="button">Log Out</button>
        </form>
      </li>
    </ul>
  </div>
</nav>
