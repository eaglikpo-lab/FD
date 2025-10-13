
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"><title>Inscription</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="stylesheet" href="../public/css/logstyle.css">


  </head>
  <body class="body">
    <div class="login_container">
      <div class="login-card">

        <div class="login-header">
          <h2>Sign In</h2>
          <p>Enter your credentials to register</p>
        </div>
        <form class="login-form" id="loginForm" novalidate  method="POST">
          <div class="form-group">
            <div class="input-wrapper">
              <input type="text" id="name" name="name" required autocomplete="name" placeholder="Name">
              <!-- <label for="name">Name</label> -->
            </div>
            <span class="error-message" id="nameError"></span>
          </div>

          <div class="form-group">
            <div class="input-wrapper">
              <input type="email" id="email" name="email" required autocomplete="email" placeholder="Email Adress">
              <!-- <label for="email">Email Address</label> -->
            </div>
            
            <span class="error-message" id="emailError"></span>
          </div>

          <div class="form-group">
            <div class="input-wrapper password-wrapper">
                <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                <!-- <label for="password">Password</label> -->
                <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                    <span class="eye-icon"></span>
                </button>
            </div>
            <span class="error-message" id="passwordError"></span>
          </div>

          <!-- <div class="form-options">
            <label class="remember-wrapper">
            <input type="checkbox" id="remember" name="remember">
            <span class="checkbox-label">
              <span class="checkmark"></span>
                Remember me
              </span>
              </label>
                <a href="#" class="forgot-password">Forgot password?</a>
          </div>
          -->
          <button type="submit" class="login-btn">
            <span class="btn-text">Sign In</span>
            <span class="btn-loader"></span>
          </button>
        </form>

        <div class="signup-link">
          <p>Have you an account? <a onclick="window.location.href='loginController.php'">Login</a> </p>
        </div>
      </div>
    </div>
  </body>
</html>
