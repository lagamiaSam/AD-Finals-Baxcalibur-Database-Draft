<?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';

// // Start session and verify user is logged in
// Auth::init();
// if (!Auth::check()) {
//     header('Location: /pages/loginPage/index.php');
//     exit;
// }

// $loggedUser = Auth::user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trips | Baxcalibur</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Global CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />

  <!-- Dashboard-Specific CSS -->
  <link rel="stylesheet" href="/pages/tripsPage/assets/css/style.css" />

  <!-- Google Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <?php $currentPage = 'user-dashboard'; ?>
  <?php include_once LAYOUTS_PATH . '/userNavbar.layout.php'; ?>

     <!-- Explore Section -->

<section id="tripsSection" class="trips-section">
  <div class="explore-section-content">
    <div class="explore-zonescapes">
      <span class="explore-zonescape-span1">EXPLORE</span>
      <span class="explore-zonescape-span2">ZONESCAPES</span>
    </div>

    <!-- First Rectangle -->
    <div class="first-rectangle">
      <div class="rectangle-content">
        <div class="rectangle-date">
          <div class="first-date">NOV 2069</div>
          <div class="first-day">30</div>
        </div>
        <div class="rectangle-details">
          <div class="first-liner">Chromehaven - Crystallax</div>
          <div class="first-place">VANTAC-X</div>
          <div class="first-brief">Stealth hovercar, ultra-silent and fast.</div>
        </div>
        <div class="book-button-container">
            <a class="book-button" href="../../pages/bookingPages/vantacXBookingPage/index.php"> View Trip</a>
        </div>
      </div>
    </div>

    <!-- Second Rectangle -->
    <div class="second-rectangle">
      <div class="rectangle-content">
        <div class="rectangle-date">
          <div class="second-date">AUG 3XZ0</div>
          <div class="second-day">02</div>
        </div>
        <div class="rectangle-details">
          <div class="second-liner">Chromehaven - Vanta Vergx</div>
          <div class="second-place">LUMINA EDGE</div>
          <div class="second-brief">Military-modified aerial unit.</div>
        </div>
        <div class="book-button-container">
            <a class="book-button" href="../../pages/bookingPages/luminaEdgeBookingPage/index.php"> View Trip</a>
        </div>
      </div>
    </div>

    <!-- Third Rectangle -->
    <div class="third-rectangle">
      <div class="rectangle-content">
        <div class="rectangle-date">
          <div class="third-date">AEZ 5XH0</div>
          <div class="third-day">69</div>
        </div>
        <div class="rectangle-details">
          <div class="third-liner">Chromehaven - Nethelion</div>
          <div class="third-place">ZEPHYRA</div>
          <div class="third-brief">Sleek luxury cruiser, only for upper-tier skyways.</div>
        </div>
        <div class="book-button-container">
            <a class="book-button" href="../../pages/bookingPages/zephyraBookingPage/index.php"> View Trip</a>
        </div>
      </div>
    </div>
  </div>
</section>