<?php
declare(strict_types=1);
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/postgreChecker.handler.php';
require_once LAYOUTS_PATH . "/main.layout.php";
Auth::init();

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
    <link
      href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    
  <link rel="stylesheet" href="./assets/css/style.css" />
</head> 
<body>
        <div class="form-container">
        <div class="login-container">
 <form action="/handlers/auth.handler.php" method="POST">
      <h2>Welcome Back!</h2>
      <?php if (!empty($message)): ?>
                    <div class="mb-4 text-green-600">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>
      <div class="input-group">
       <label for="username" class="label">Username</label>
                <input id="username" name="username" type="text" required class="input">
      </div>
      <div class="input-group">
        <label for="password" class="label">Password</label>
                    <input id="password" name="password" type="password" required class="input">
      </div>
                      <?php if (!empty($error)): ?>
                    <div class="mb-4 text-red-600">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
                <input type="hidden" name="action" value="login">
                <button type="submit" class="button">Log In</button>
      <p class="error-message" id="error-message"></p>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>
<?php
                      });