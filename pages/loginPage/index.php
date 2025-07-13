<?php
declare(strict_types=1);
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/postgreChecker.handler.php';
require_once LAYOUTS_PATH . "/main.layout.php";
Auth::init();
// Auth::logout(); comment lng uli saglit
if (Auth::check()) {
    header('Location: /index.php');
    exit;
}
// call the layout you want to use from layout folder

// cinomment lng saglit
$error = trim((string) ($_GET['error'] ?? ''));
$error = str_replace("%", " ", $error);

$message = trim((string) ($_GET['message'] ?? ''));
$message = str_replace("%", " ", $message);



// functions that will render the layout of your choosing
renderMainLayout(
    function () use ($error, $message) {
         ?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>

  <!-- Orbitron Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <!-- Google Fonts Icon Link -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    
  <link rel="stylesheet" href="./assets/css/style.css" />
</head> 
<body>
    <header>
    <nav>
      <!-- Nav Bar Brand -->
      <div class="navbar-brand">
        <a href="../../../../index.php"><span class="material-icons"> arrow_back_ios </span></a>
        <a href="../../../../index.php" title="Baxcalibur Logo">
          <!-- Brand Logo -->
          <img class="brand-logo" src="../../../../assets/img/baxcalibur-logo.png" height="40px"
            alt="Baxcalibur Logo" /></a>
        <a class="brand-name" href="index.php" title="Brand Name">Baxcalibur</a>
      </div>
    </nav>
  </header>
<section class="login-section">
  <div class="left-panel">
    <!-- Optional: You may add an image or keep it blank for alignment -->
  </div>
  <div class="container">
    <form class="login-form" action="/handlers/auth.handler.php" method="POST">
      <h2>Welcome Back!</h2>

      <!-- <?php if (!empty($message)): ?>
        <div class="mb-4 text-green-600"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?> -->

      <div class="input-group">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required />
      </div>

      <?php if (!empty($error)): ?>
        <div class="mb-4 text-red-600"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <input type="hidden" name="action" value="login" />
      <button type="submit">Log In</button>
      <p class="error-message" id="error-message"></p>
    </form>
  </div>
</section>


  <script src="script.js"></script>
  <?php if (!empty($error)): ?>
  <script>
    alert("<?= htmlspecialchars($error) ?>");
  </script>
<?php endif; ?>

</body>
</html>
<?php
                      });