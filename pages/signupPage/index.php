<!-- Signup Page -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup | Baxcalibur</title>

  <!-- Favicon Link -->
  <link rel="icon" href="../../../../assets/img/baxcalibur-logo.png" type="image/png" />

  <!-- Orbitron Google Fonts Link -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />

  <!-- Google Fonts Icon Link -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- CSS Link-->
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
  <section class="signup-section">
    <div class="left-panel">
    </div>
    <div class="container">
      <form class="signup-form" action="/handlers/signup.handler.php" method="POST">
        <h1>Create Account</h1>
        <div class="name-form-input">
          <div class="input-group">
          <label for="firstName">First Name</label>
          <input id="firstName" name="first_name" placeholder="Enter first name" required />
        </div>
        <div class="input-group">
          <label for="lastName">Last Name</label>
          <input id="lastName" name="last_name" placeholder="Enter last name" required />
        </div>
        </div>

        
        <div class="input-group">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" placeholder="Enter username" required />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input id="password" name="password" placeholder="Enter password" required />
        </div>
        <div class="input-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="confirmPassword" id="confirm_password" name="confirm_password" placeholder="Confirm password"
            required />
        </div>

        <div class="checkbox-group">
          <input type="checkbox" id="termsPrivacy" required />
          <label for="termsPrivacy">I agree to the terms and privacy policy</label>
        </div>
        <input type="hidden" name="action" value="signup" />
        <button type="submit">Create Account</button>
        <p class="error-message" id="error-message"></p>
      </form>
    </div>
  </section>


  <!-- Success Modal -->
  <div id="success-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="modal-content">
      <h3 id="modal-title">Success!</h3>
      <p>Account created successfully.</p>
      <button class="close-btn" aria-label="Close modal">Close</button>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Password confirmation validation
      const passwordInput = document.getElementById('password');
      const confirmInput = document.getElementById('confirm-password');
      const errorMessage = document.createElement('p');
      errorMessage.style.color = 'red';
      errorMessage.style.marginTop = '5px';
      confirmInput.parentNode.appendChild(errorMessage);

      function validatePasswordMatch() {
        if (confirmInput.value === '') {
          errorMessage.textContent = '';
          confirmInput.setCustomValidity('');
          return;
        }

        if (passwordInput.value !== confirmInput.value) {
          errorMessage.textContent = 'Passwords do not match.';
          confirmInput.setCustomValidity('Passwords do not match.');
        } else {
          errorMessage.textContent = '';
          confirmInput.setCustomValidity('');
        }
      }

      passwordInput.addEventListener('input', validatePasswordMatch);
      confirmInput.addEventListener('input', validatePasswordMatch);

      // Modal logic
      const modal = document.getElementById('success-modal');
      const closeBtn = modal.querySelector('.close-btn');

      // Fix: get URL params object
      const params = new URLSearchParams(window.location.search);
      const message = params.get('message');

      if (message && decodeURIComponent(message).toLowerCase().includes('account created')) {
        modal.classList.add('active');
        // Remove query param from URL for cleanliness
        const url = new URL(window.location);
        url.searchParams.delete('message');
        window.history.replaceState({}, document.title, url.pathname + url.search);
      }

      closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
      });

      // Close modal if click outside modal content
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
    });
  </script>
</body>

</html>