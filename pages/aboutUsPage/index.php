<?php
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baxcalibur | About Us</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/baxcalibur-logo.png" type="image/png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../aboutUsPage/css/style.css" />
</head>

<body>
    <header>
  <nav>
    <!-- Nav Bar Brand -->
    <div class="navbar-brand">
      <a href="/index.php" title="Brand Logo">
        <img class="brand-logo" src="/assets/img/baxcalibur-logo.png" height="40px" alt="Baxcalibur Logo" />
      </a>
      <a class="brand-name" href="/index.php" title="Brand Name">Baxcalibur</a>
    </div>

    <!-- Toggle Menu Button -->
    <div class="toggle-menu">
      <button id="toggleMenuBtn" class="toggle-menu-btn" onclick="toggleMenu()" title="Show Menu">
        <span id="toggleIcon" class="material-icons">menu</span>
      </button>
    </div>

    <!-- Nav Bar Links -->
    <ul id="navbarLinks" class="navbar-links">
      <li><a class="active-link" href="/index.php" title="View Homepage">Home</a></li>
      <li><a href="/index.php" title="About Us">About Us</a></li>
      <li><a id="loginBtnLink" href="/pages/loginPage/index.php" title="Login">Log In</a></li>
      <li><a id="signUpBtnLink" href="../signupPage/index.php" title="Sign Up">Sign Up</a></li>
    </ul>
  </nav>
</header>


    <main class="team-section">
    <div class="team-grid">
        <div class="team-member">
            <img src="../aboutUsPage/img/about-us-kent.jpg" alt="Kent Valencia">
            <div class="member-info">
                <h2>KENT VALENCIA</h2>
                <p>QA & DATABASE</p>
            </div>
        </div>

        <div class="team-member">
            <img src="../aboutUsPage/img/about-us-jose.jpg" alt="Jose Bonnevie">
            <div class="member-info">
                <h2>JOSE BONNEVIE</h2>
                <p>FRONTEND & DESIGNER</p>
            </div>
        </div>

        <div class="team-member">
            <img src="../aboutUsPage/img/about-us-vince.jpg" alt="Vince Aduru">
            <div class="member-info">
                <h2>VINCE ADDURU</h2>
                <p>BACKEND</p>
            </div>
        </div>

        <div class="team-member">
            <img src="../aboutUsPage/img/about-us-sam.jpg" alt="Samuel Lagamia">
            <div class="member-info">
                <h2>SAMUEL LAGAMIA</h2>
                <p>BACKEND</p>
            </div>
        </div>

        <div class="team-member">
            <img src="../aboutUsPage/img/about-us-owen.jpg" alt="Owen Liangco">
            <div class="member-info">
                <h2>OWEN LIANGCO</h2>
                <p>FRONTEND</p>
            </div>
        </div>
    </div>
</main>


    <!-- Footer Section -->
<footer class="site-footer">
  <div class="footer-container">
    
    <!-- Logo -->
    <div class="footer-logo">
      <img src="/assets/img/baxcalibur-logo.png" alt="Baxcalibur Logo" />
    </div>

    <!-- Trademark -->
    <div class="footer-trademark">
      © 20XZ Baxcalibur. All rights reserved.
    </div>

    <!-- Contact -->
    <div class="footer-contact">
      <div>baxcalibur@support.com</div>
      <div>(+1) 234 X67 YZ7</div>
    </div>

    <!-- Social Media Icons -->
    <div class="footer-socials">
      <a href="#"><img src="/assets/img/fb-logo.png" alt="Facebook" /></a>
      <a href="#"><img src="/assets/img/x-logo.png" alt="X/Twitter" /></a>
      <a href="#"><img src="/assets/img/ig-logo.png" alt="Instagram" /></a>
    </div>

  </div>
</footer>

    <script src="../aboutUsPage/js/script.js"></script>
</body>
</html>
