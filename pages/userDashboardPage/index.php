<?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';

// Start session and verify user is logged in
Auth::init();
if (!Auth::check()) {
    header('Location: /pages/loginPage/index.php');
    exit;
}

$loggedUser = Auth::user();

// Connect to PostgreSQL
$dsn = "pgsql:host={$databases['pgHost']};port={$databases['pgPort']};dbname={$databases['pgDB']}";
$pdo = new PDO($dsn, $databases['pgUser'], $databases['pgPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Fetch full user data
$user = UserPage::fetchCurrentUser($pdo, $loggedUser['id']);
if (!$user) {
    header('Location: /pages/loginPage/index.php');
    exit;
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Global CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />

  <!-- Dashboard-Specific CSS -->
  <link rel="stylesheet" href="/pages/userDashboardPage/assets/css/style.css" />

  <!-- Google Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <?php $currentPage = 'user-dashboard'; ?>
  <?php include_once BASE_PATH . '/layouts/navbar.php'; ?>

  <div class="user-dashboard-wrapper">
    <section class="dashboard-section">
      <h1 class="dashboard-title">user dashboard</h1>

      <div class="dashboard-container">
        <!-- USER INFO -->
        <div class="user-info">
          <div class="user-profile">
            <div class="user-avatar">
              <span class="material-icons" style="font-size: 100px;">account_circle</span>
            </div>

            <div class="user-details">
              <h2 class="user-greeting">Hello, <span><?= htmlspecialchars($user['name']) ?>.</span></h2>
              <p><span class="label">Username:</span> <?= htmlspecialchars($user['username']) ?></p>
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

  <?php include_once BASE_PATH . '/layouts/footer.php'; ?>
</body>
</html>