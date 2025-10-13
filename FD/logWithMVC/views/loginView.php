<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"><title>Connexion</title>
    <link rel="stylesheet" href="../public/css/logstyle.css">
  </head>

  <body class="body">
   <div class="login_container">
      <div class="login-card">

        <div class="login-header">
            <h2>Login</h2>
            <p>Enter your credentials to access your account</p>
        </div>
        <form class="login-form" id="loginForm" novalidate  method="POST">

            <div class="form-group">
              <div class="input-wrapper">
                <input type="email" id="email" name="email" required autocomplete="email">
                <label for="email">Email Address</label>
              </div>
              
              <span class="error-message" id="emailError"></span>
            </div>

            <div class="form-group">
              <div class="input-wrapper password-wrapper">
                  <input type="password" id="password" name="password" required autocomplete="current-password">
                  <label for="password">Password</label>
                  <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                      <span class="eye-icon"></span>
                  </button>
              </div>
              <span class="error-message" id="passwordError"></span>
            </div>

            <button type="submit" class="login-btn">
              <span class="btn-text">Login</span>
              <span class="btn-loader"></span>
            </button>
        </form>

        <div class="signup-link">
          <p>Don't have an account? <a onclick="window.location.href='../controllers/signupController.php'">Sign in</a> </p>
        </div>
      </div>
   </div>
  </body>
</html>
