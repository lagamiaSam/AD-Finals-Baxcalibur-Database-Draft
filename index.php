<?php
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
Auth::logout(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baxcalibur | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="/assets/img/baxcalibur-logo.png" type="image/png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body>

    <!-- Navbar Fragment -->
    <?php include_once BASE_PATH . '/layouts/navbar.php'; ?>

    <!-- Hero Section -->
    <section id="heroSection" class="hero-section">
        <div class="hero-content">
            <div class="hero-image">
                <img src="/assets/img/baxcalibur-logo-large.png" height="250px" alt="Baxcalibur Logo" />
            </div>
            <div class="hero-text">
                <h1>Travel the <span class="violet-text">World</span>. In <span class="violet-text">Glitch</span> Mode</h1>
                <a id="getStartedBtn" href="#" title="Click Here to Get Started">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Underline -->
    <img class="under-headline" src="/assets/img/under-headline.png">

    <!-- Explore Section -->
    <section id="exploreSection" class="explore-section">
        <div class="explore-section-content">
            <div class="explore-zonescapes">
                <span class="explore-zonescape-span1">EXPLORE</span>
                <span class="explore-zonescape-span2">ZONESCAPES</span>
            </div>

            <!-- Rectangles -->
            <div class="first-rectangle">...</div>
            <div class="second-rectangle">...</div>
            <div class="third-rectangle">...</div>
        </div>
    </section>

    <!-- Footer Fragment -->
    <?php include_once BASE_PATH . '/layouts/footer.php'; ?>

    <!-- JavaScript -->
    <script src="/assets/js/script.js"></script>
</body>
</html>
