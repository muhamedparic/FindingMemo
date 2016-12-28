<html>
  <head>
    <link rel='stylesheet' type='text/css' href='styles/login_reg.css'/>
    <script src='scripts/validate.js'></script>
  </head>
  <body>
    <div id='input-form'>
      <form action='login.php' method='POST'>
        <h2 id='title'>Finding Memo</h2>
        <div class='row'>
          <input id='email' name='email' type='text' placeholder='Email Address' class='col wide'/>
          <p id='email-error-indicator' class='col narrow'></p>
        </div>
        <div class='row'>
          <input id='password' name='password' type='password' placeholder='Password' class='col wide'/>
        	<p id='password-strength' class='col narrow'></p>
          <p id='password-error-indicator' class='col narrow'></p>
	    </div>
	    <div class='row'>
          <input type='password' name='password-confirm' placeholder='Retype password' class='col wide'/>
        	<img id='password-match' src='http://icons.iconarchive.com/icons/icons8/windows-8/24/Very-Basic-Checkmark-icon.png'/>
	    </div>
        <div class='row'>
          <input type='submit' class='col wide' id='register-btn'>Register</input>
        </div>
        <div class='row'>
          <p class='col wide' id='register-link'>Already have an account? You can <a href='login.html'>login here!</a></p>
        </div>
        <input type='hidden' name='type' value='REGISTER'/>
      </form>
    </div>
  </body>
</html>
