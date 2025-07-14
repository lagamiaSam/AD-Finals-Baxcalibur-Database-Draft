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
            <a href="./index.php" title="View Homepage" class="active-link <?= $currentPage === 'home' ? 'active-link' : '' ?>">Home</a>
            </li>
            <li><a href="./pages/aboutUsPage/index.php" title="View About Information" class="<?= $currentPage === 'about' ? 'active-link' : '' ?>">About</a></li>
            <li>
                <!-- Log In Button Link-->
                <a id="loginBtnLink" href="../pages/loginPage/index.php" title="Login to Your Account">Log
                    In</a>
            </li>
            <li>
                <!-- Sign Up Button Link -->
                <a id="signUpBtnLink" href="./pages/signupPage/index.php" title="Create New Account">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>

<li>