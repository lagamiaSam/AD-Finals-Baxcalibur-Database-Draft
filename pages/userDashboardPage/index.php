<?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Dashboard | Baxcalibur</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Global CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />

  <!-- Dashboard-Specific CSS -->
  <link rel="stylesheet" href="/pages/userDashboardPage/assets/css/style.css" />

  <!-- Google Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';

$currentPage = 'user-dashboard';
?>

  <!-- Include Navbar -->
  <?php include_once BASE_PATH . '/layouts/navbar.php'; ?>

  <!-- User Dashboard Wrapper with Background -->
  <div class="user-dashboard-wrapper">
    <!-- DASHBOARD SECTION -->
    <section class="dashboard-section">
      <h1 class="dashboard-title">user dashboard</h1>

      <div class="dashboard-container">
        <!-- USER INFO -->
        <div class="user-info">
          <div class="user-profile">
            <!-- Profile Icon or Image -->
            <div class="user-avatar">
              <span class="material-icons" style="font-size: 100px;">account_circle</span>
            </div>

            <!-- User Details -->
            <div class="user-details">
              <h2 class="user-greeting">Hello, <span>Kent.</span></h2>
              <p><span class="label">Email:</span> kentvalencia@gmail.com</p>
              <p><span class="label">Number:</span> 0994567780</p>
              <p><span class="label">Country:</span> Philippines</p>
            </div>
          </div>
        </div>

        <!-- BOOKINGS -->
        <div class="bookings-info">
          <h2>my bookings:</h2>
          <div class="booking-card">
            <p><span class="label">Place:</span> VANTAC-X</p>
            <p><span class="label">Itinerary:</span> "SoloPath Runtime"</p>
            <p><span class="label">Date:</span> 08/16/2X8Z</p>
            <button class="remove-booking">
              <span class="material-icons">close</span>
            </button>
          </div>
          <a href="#" class="add-booking">Add more bookings <span class="highlight">here</span>.</a>
        </div>
      </div>
    </section>
  </div>

  <!-- Include Footer -->
  <?php include_once BASE_PATH . '/layouts/footer.php'; ?>
</body>

</html>
