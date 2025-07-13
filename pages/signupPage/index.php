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
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const submitButton = document.querySelector('button[type="submit"]');

    const constraints = {
      firstName: (val) => val.trim().length >= 2,
      lastName: (val) => val.trim().length >= 2,
      username: (val) => val.length >= 8,
      password: (val) => /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(val),
      confirmPassword: (val) => val === password.value
    };

    const errorMessages = {
      firstName: "First name must be at least 2 characters.",
      lastName: "Last name must be at least 2 characters.",
      username: "Username must be at least 8 characters.",
      password: "Password must be at least 8 characters, include 1 uppercase, 1 number, and 1 symbol.",
      confirmPassword: "Passwords do not match."
    };

    const fields = [
      { el: firstName, key: 'firstName' },
      { el: lastName, key: 'lastName' },
      { el: username, key: 'username' },
      { el: password, key: 'password' },
      { el: confirmPassword, key: 'confirmPassword' }
    ];

    function validateAllFields() {
      let allValid = true;

      fields.forEach(({ el, key }) => {
        const value = el.value;
        const isValid = constraints[key](value);
        const errorId = el.id + '-error';
        let errorEl = document.getElementById(errorId);

        if (!isValid) {
          allValid = false;
          el.classList.add('invalid');
          el.classList.remove('valid');
          el.setCustomValidity(errorMessages[key]);

if (!errorEl) {
  errorEl = document.createElement('p');
  errorEl.id = errorId;
  errorEl.classList.add('error-message'); // ✅ Use class instead
  el.insertAdjacentElement('afterend', errorEl);
}

          errorEl.textContent = errorMessages[key];
        } else {
          el.classList.remove('invalid');
          el.classList.add('valid');
          el.setCustomValidity('');

          if (errorEl) errorEl.remove();
        }
      });

      submitButton.disabled = !allValid;
    }

fields.forEach(({ el, key }) => {
  // Realtime border validation
  el.addEventListener('input', () => {
    const isValid = constraints[key](el.value);
    el.classList.toggle('valid', isValid);
    el.classList.toggle('invalid', !isValid);
    validateSubmitButton(); // Keep button disabled until all valid
  });

  // Show error on blur
  el.addEventListener('blur', () => {
    const isValid = constraints[key](el.value);
    const errorId = el.id + '-error';
    let errorEl = document.getElementById(errorId);

    if (!isValid) {
      el.setCustomValidity(errorMessages[key]);
      if (!errorEl) {
        errorEl = document.createElement('p');
        errorEl.id = errorId;
        errorEl.classList.add('error-message');
        el.insertAdjacentElement('afterend', errorEl);
      }
      errorEl.textContent = errorMessages[key];
    } else {
      el.setCustomValidity('');
      if (errorEl) errorEl.remove();
    }
  });
});

function validateSubmitButton() {
  const allValid = fields.every(({ el, key }) => constraints[key](el.value));
  submitButton.disabled = !allValid;
}



    // Initial disable on load
    submitButton.disabled = true;
  });
</script>

</body>

</html>