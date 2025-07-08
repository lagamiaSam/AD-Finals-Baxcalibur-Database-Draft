<?php
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baxcalibur | Home</title>

    <!-- Favicon Link -->
    <link rel="icon" href="./assets/img/baxcalibur-logo.png" type="image/png" />

    <!-- Orbitron Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- Google Fonts Icon Link -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- CSS Link-->
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>

    <header>
        <nav>
            <!-- Nav Bar Brand -->
            <div class="navbar-brand">
                <a href="index.php" title="Brand Logo">
                    <!-- Brand Logo -->
                    <img class="brand-logo" src="./assets/img/baxcalibur-logo.png" height="40px"
                        alt="Baxcalibur Logo" /></a>
                <a class="brand-name" href="index.php" title="Brand Name">Baxcalibur</a>
            </div>
            <!-- Toggle Menu Button -->
            <div class="toggle-menu">
                <button id="toggleMenuBtn" class="toggle-menu-btn" onclick="toggleMenu()" title="Show Menu">
                    <span id="toggleIcon" class="material-icons"> menu </span>
                </button>
            </div>
            <!-- Nav Bar Links -->
            <div>
                <ul id="navbarLinks" class="navbar-links">
                    <li>
                        <a class="active-link" href="index.php" title="View Homepage">Home</a>
                    </li>
                    <li><a href="" title="View Services">Services</a></li>
                    <li><a href="" title="View About Information">About</a></li>
                    <li>
                        <!-- Log In Button Link-->
                        <a id="loginBtnLink" href="../pages/loginPage/index.php" title="Login to Your Account">Log
                            In</a>
                    </li>
                    <li>
                        <!-- Sign Up Button Link -->
                        <a id="signUpBtnLink" href="" title="Create New Account">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="heroSection" class="hero-section">
        <div class="hero-content">
            <!-- Hero Image -->
            <div class="hero-image">
                <img src="./assets/img/baxcalibur-logo-large.png" height="250px" alt="Baxcalibur Logo" />
            </div>
            <!-- Hero Text -->
            <div class="hero-text">
                <h1>
                    Travel the<span class="violet-text">World</span>. In
                    <span class="violet-text">Glitch</span> Mode
                </h1>
                <a id="getStartedBtn" href="" title="Click Here to Get Started">Get Started</a>
            </div>
        </div>
    </section>
    
    <!-- JavaScript Link -->
    <script src="./assets/js/script.js"></script>
</body>

</html>