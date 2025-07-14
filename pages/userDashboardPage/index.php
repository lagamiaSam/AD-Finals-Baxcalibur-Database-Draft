<?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/userPage.util.php';
require_once HANDLERS_PATH . '/payment.handler.php';

// require_once UTILS_PATH . '/payment.util.php';
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

// Fetch user bookings
$bookings = UserPage::fetchUserBookings($pdo, $user['id']);
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
          <?php if (!empty($bookings)): ?>
            <?php foreach ($bookings as $booking): ?>
              <div class="booking-card">
                <p><span class="label">Place:</span> <?= htmlspecialchars($booking['destination']) ?></p>
                <p><span class="label">Itinerary:</span> <?= htmlspecialchars($booking['description']) ?></p>
                <p><span class="label">Date:</span> <?= htmlspecialchars($booking['booking_date']) ?></p>
                <p><span class="label">Booking Status:</span> <?= htmlspecialchars($booking['booking_status']) ?></p>
                <p><span class="label">Payment Status:</span> <?= htmlspecialchars($booking['payment_status']) ?></p>
                <span class="label">Amount:</span> <?= $booking['price'] ?></p>
                <button class="remove-booking">
                  <span class="material-icons">close</span>
                </button>

                <?php if ($booking['payment_status'] !== "Paid"): ?>
                <form class="payment-form" action="/handlers/payment.handler.php" method="POST">
                  <input type="hidden" name="booking_id" value="<?= htmlspecialchars($booking['id']) ?>" />
                  <input type="hidden" name="amount" value="<?= $booking['price'] ?>" />
                  <button class="pay-now" type="submit">
                  <span class="material-icons">payments</span>Pay Now
                </button>
                </form>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No bookings found.</p>
          <?php endif; ?>
          <a href="../tripsPage/index.php" class="add-booking">Add more bookings <span class="highlight">here</span>.</a>
        </div>
      </div>
    </section>
  </div>

  <!-- ✅ Alert for Login Success -->
  <?php
    $successMessage = trim((string) ($_GET['message'] ?? ''));
    $successMessage = str_replace("%", " ", $successMessage);
    if (!empty($successMessage)):
  ?>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        alert("<?= htmlspecialchars($successMessage, ENT_QUOTES) ?>");
      });
    </script>
  <?php endif; ?>

</body>
</html>
