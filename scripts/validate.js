function valid_email(email) {
  console.log('|' + email + '|');
  var pattern = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
  return pattern.test(email);
}

function valid_username(username) {
  return username.length <= 20 && username.length >= 4 && /^[a-zA-Z0-9_]+$/.test(username);
}

function check_email_error() {
  var email = document.getElementById('email').value;
  if (valid_email(email)) {
    document.getElementById('email-error-indicator').innerHTML = '';
    document.getElementById('login-btn').disabled = false;
    document.getElementById('register-btn').disabled = false;
  } else {
    document.getElementById('email-error-indicator').innerHTML = 'Invalid email';
    document.getElementById('login-btn').disabled = true;
    document.getElementById('register-btn').disabled = true;
  }
}

function check_password_error() {
  var password = document.getElementById('password').value;

  if (password.length < 8) {
    document.getElementById('password-error-indicator').innerHTML = 'Too short';
    document.getElementById('login-btn').disabled = true;
    document.getElementById('register-btn').disabled = true;
  } else if (password.length > 32) {
    document.getElementById('password-error-indicator').innerHTML = 'Too long';
    document.getElementById('login-btn').disabled = false;
    document.getElementById('register-btn').disabled = false;
  } else {
    document.getElementById('password-error-indicator').innerHTML = '';
    document.getElementById('login-btn').disabled = false;
    document.getElementById('register-btn').disabled = false;
  }
}