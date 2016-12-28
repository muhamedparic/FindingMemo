<!doctype html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='styles/account.css'/>
	</head>
  <body>
    <div id='nav-bar'>
      <ul>
        <li>
          <a href='http://c2.etf.unsa.ba'>My memos</a>
        </li>
        <li>
          <a href='http://c2.etf.unsa.ba'>Archive</a>
        </li>
        <li>
          <a class='current' href='http://c2.etf.unsa.ba'>Account</a>
        </li>
        <li>
          <a href='http://c2.etf.unsa.ba'>Log out</a>
        </li>
      </ul>
    </div>
		<div id='container'>
			<div class='row'>
				<form>
					<input type='email' name='email' class='col' placeholder='New email'/>
					<input type='submit' value='Change email' class='col'/>
				</form>
			</div>
			<form>
				<div class='row'>
					<input type='password' name='old-password' class='col' placeholder='Old password'/>
				</div>
				<div class='row'>
					<input type='password' name='new-password' class='col' placeholder='New password'/>
				</div>
				<div class='row'>
					<input type='password' name='new-password-retyped' class='col' placeholder='Retype new password'/>
					<input type='submit' value='Change password' class='col'/>
				</div>
			</form>
		</div>
  </body>
</html>

