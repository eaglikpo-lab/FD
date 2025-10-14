
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"><title>Inscription</title>

    <link rel="stylesheet" href="../public/css/logstyle.css">


  </head>
  <body class="body">
    <div class="login_container">
      <div class="login-card">

        <div class="login-header">
          <h2>Sign In</h2>
          <p>Enter your credentials to register</p>
        </div>

        
        <!-- Message de erreur -->
        <?php if (!empty($error)) : ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form class="login-form" id="loginForm"  method="POST" action="">

          <div class="form-group">
            <div class="input-wrapper">
              <input type="text" id="name" name="name" autocomplete="name" placeholder="Name" required>
              <!-- <label for="name">Name</label> -->
            </div>
            <span class="error-message" id="nameError"></span>
          </div>

          <div class="form-group">
            <div class="input-wrapper">
              <input type="email" id="email" name="email" autocomplete="email" placeholder="Email Adress" required>
              <!-- <label for="email">Email Address</label> -->
            </div>
            
            <span class="error-message" id="emailError"></span>
          </div>

          <div class="form-group">
            <div class="input-wrapper password-wrapper">
                <input type="password" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
                <!-- <label for="password">Password</label> -->
                <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                    <span class="eye-icon"></span>
                </button>
            </div>
            <span class="error-message" id="passwordError"></span>
          </div>

          
          <button type="submit" class="login-btn">
            <span class="btn-text">Sign In</span>
            <span class="btn-loader"></span>
          </button>
        </form>

        <div class="signup-link">
          <p>Have you an account? <a id="loginBtn">Login</a> </p>
        </div>
      </div>
    </div>

    <script src="../public/js/user.js"></script>
  </body>
</html>
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