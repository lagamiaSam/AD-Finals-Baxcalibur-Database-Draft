<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="signup-page-style.css" />
 
</head>
<body>
    <img src="./images/baxcalibur-logo.png" alt="Company Logo" class="site-logo">
    <div class="container">
        <form class="signup-form" onsubmit="return validateSignUpForm()">
              <h2>Create Account</h2>
      <div class="input-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" placeholder="Enter first name" required />
      </div>
      <div class="input-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" placeholder="Enter last name" required />
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter email" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter password" required />
      </div>
      <div class="input-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" placeholder="Confirm password" required />
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="terms-privacy" required />
        <label for="terms-privacy">I agree to the terms and privacy policy</label>
      </div>
      <button type="submit">Create Account</button>
      <p class="error-message" id="error-message"></p>
        </form>
    </div>

    <script src="signup-script.js"></script>
</body>
</html>