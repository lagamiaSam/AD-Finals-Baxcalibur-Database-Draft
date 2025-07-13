<?php
require_once BASE_PATH . '/bootstrap.php';
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
  <?php include_once BASE_PATH . '/layouts/navbar.php'; ?>

     <!-- Explore Section -->

<section id="tripsSection" class="trips-section">
    <h1>Welcome to Vantac X</h1>
    <h2>Itenerary</h2>
    <button> Book</button>
</section>