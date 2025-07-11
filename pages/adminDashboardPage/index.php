<?php
require_once '../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <input type="text" placeholder="Search user..." class="admin-search" />
          </div>

          <div class="admin-table-wrapper">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Password</th>
                  <th>Booked</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Kent Valencia</td>
                  <td>••••••••</td>
                  <td>VANTAC-X</td>
                  <td>Card</td>
                </tr>
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
