<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign up</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body>
  <img src="../../assets/img/baxcalibur-logo.png" alt="Company Logo" class="site-logo" />
  <div class="container">
    <form class="signup-form" action="/handlers/signup.handler.php" method="POST">
      <h2>Create Account</h2>
      <div class="input-group">
        <label for="first-name">First Name</label>
        <input id="first-name" name="first_name" placeholder="Enter first name" required />
      </div>
      <div class="input-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" name="last_name" placeholder="Enter last name" required />
      </div>
      <div class="input-group">
        <label for="user">Username</label>
        <input type="text" name="username" placeholder="Enter username" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" name="password" placeholder="Enter password" required />
      </div>
      <div class="input-group">
        <label for="confirm-password">Confirm Password</label>
        <input
          type="password"
          id="confirm-password"
          name="confirm_password"
          placeholder="Confirm password"
          required
        />
      </div>

      <div class="checkbox-group">
        <input type="checkbox" id="terms-privacy" required />
        <label for="terms-privacy">I agree to the terms and privacy policy</label>
      </div>
      <input type="hidden" name="action" value="signup" />
      <button type="submit">Create Account</button>
      <p class="error-message" id="error-message"></p>
    </form>
  </div>

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
