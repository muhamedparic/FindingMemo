<?php
  require_once 'utility.php';

  $params = util\parse_parameters('POST', ['type', 'email', 'password', 'password-confirm']);

  if ($params !== false 
   && $params['password'] === $params['password-confirm'] 
   && strlen($params['password']) >= 8
   && filter_var($params['email'], FILTER_VALIDATE_EMAIL) !== false
   && $params['type'] === 'REGISTER'
   && !util\user_exists($params['email'])) {
    util\register($params['email'], $params['password']); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='styles/login_reg.css'/>
    <script src='scripts/validate.js'></script>
  </head>
  <body>
    <form action='main.php' method='POST'>
      <div id='input-form'>
        <h2 id='title'>Finding Memo</h2>
        <div class='row'>
          <input type='text' placeholder='Email Address' class='col wide' id='email' name='email'/>
          <p id='email-error-indicator' class='col narrow'></p>
        </div>
        <div class='row'>
          <input type='password' placeholder='Password' class='col wide' id='password' name='password'/>
          <a href='#' class='col narrow' id='forgot-password-link'>I forgot my password</a>
          <p id='password-error-indicator' class='col narrow'></p>
        </div>
        <div class='row'>
          <input type='submit' class='col wide' id='login-btn'>Log in</button>
          <input type='hidden' name='type' value='LOGIN'/>
        </div>
        <div class='row'>
          <p class='col wide' id='register-link'>Don't have an account? You can <a href='register.html'>register here!</a></p>
        </div>
      </div>
    </form>
  </body>
</html>
