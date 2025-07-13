<?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/adminPage.util.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();
if (!Auth::check() || Auth::user()['role'] !== 'admin') {
    header('Location: /pages/loginPage/index.php');
    exit;
}

// Handle search input
$search = $_GET['search'] ?? '';
$sortOrder = 'asc'; // Always sort A-Z internally

// Connect to PostgreSQL
$dsn = "pgsql:host={$databases['pgHost']};port={$databases['pgPort']};dbname={$databases['pgDB']}";
$pdo = new PDO($dsn, $databases['pgUser'], $databases['pgPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

$users = AdminPage::displayUsers($pdo, $search, $sortOrder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="/assets/img/baxcalibur-logo.png" type="image/png" />
  <title>Admin Dashboard | Baxcalibur</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Global CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />

  <!-- Admin Dashboard CSS -->
  <link rel="stylesheet" href="/pages/adminDashboardPage/assets/css/style.css" />

  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <div class="page-wrapper">
    <?php include_once BASE_PATH . '/layouts/navbar.php'; ?>

    <div class="admin-dashboard-wrapper">
      <section class="admin-section">
        <h1 class="dashboard-title">admin dashboard</h1>

        <div class="admin-accounts-card">
          <div class="card-header">
            <h2>Accounts:</h2>
            <!-- Search Only -->
            <form method="GET" class="admin-filter-form" style="display: flex; gap: 10px; align-items: center;">
              <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search user..." class="admin-search" />
              <button type="submit" class="btn">Search</button>
            </form>
          </div>

          <div class="admin-table-wrapper">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Booked</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($users)): ?>
                  <?php foreach ($users as $user): ?>
                    <tr>
                      <td><?= htmlspecialchars($user['id']) ?></td>
                      <td><?= htmlspecialchars($user['username']) ?></td>
                      <td><?= htmlspecialchars($user['name']) ?></td>
                      <td><?= htmlspecialchars($user['booked']) ?></td>
                      <td><?= htmlspecialchars($user['payment']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="5">No users found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>

    <?php include_once BASE_PATH . '/layouts/footer.php'; ?>
  </div>
</body>
</html>