<?php
  require_once 'utility.php';

  if ($_POST['type'] === 'LOGIN') {
    $params = util\parse_parameters('POST', ['type', 'email', 'password']);

    if ($params !== false
    && strlen($params['password']) >= 8
    && filter_var($params['email'], FILTER_VALIDATE_EMAIL) !== false
    && $params['type'] === 'LOGIN'
    && util\user_exists($params['email'], $params['password'])) {
      util\login($params['email'], $params['password']);
    }
  } else if ($_POST['type'] === 'ADD_MEMO') {
    // To be implemented
  }

  if (util\user_logged_in($params['email'])) {
?>

<!doctype html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='styles/main_page.css'/>
    <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
	</head>
  <body>
    <div id='nav-bar'>
      <ul>
        <li>
          <a class='current' href='http://c2.etf.unsa.ba'>My memos</a>
        </li>
        <li>
          <a href='http://c2.etf.unsa.ba'>Archive</a>
        </li>
        <li>
          <a href='http://c2.etf.unsa.ba'>Account</a>
        </li>
        <li>
          <a href='http://c2.etf.unsa.ba'>Log out</a>
        </li>
      </ul>
    </div>
    <?php
      if ($params['email'] === 'admin@etf.unsa.ba')
      {
        util\save_emails_csv();
    echo '<a href="data/emails.csv">Download CSV here</a>';
    `enscript -B emails.csv -o emails.ps`;
    `ps2pdf emails.ps emails.pdf`;
    echo '<a href="data/emails.pdf">Download PDF here</a>';
      }
      ?>
      <form>
<input type="text" size="30" onkeyup="showResult(this.value)" placeholder='Search'>
<div id="livesearch"></div>
</form>
    <div id='memo-list'>
      <button id='new-memo-btn'>New memo</button>
      <div class='memo-card active'>
        <p class='memo-card-title'>Memo title</p>
        <p class='memo-card-text'>Memo text</p>
				<img src='http://icons.iconarchive.com/icons/iconsmind/outline/24/Folder-Archive-icon.png' class='archive-icon'/>
	  </div>
	  <div class='memo-card'>
        <p class='memo-card-title'>Memo title</p>
        <p class='memo-card-text'>Memo text</p>
	    	<p class='memo-card-reminder'>Remind me at 14:00 on 2016-12-10</p>
				<img src='http://icons.iconarchive.com/icons/iconsmind/outline/24/Folder-Archive-icon.png' class='archive-icon'/>
	  </div>
    </div>
		<form action='main.php' method='POST' id='someform'>
      <div id='edit-area'>
        <input type='text' id='new-memo-title' placeholder='Memo title' name='title'>
        <textarea id='new-memo-text' placeholder='Memo text' form='someform' name='contents'></textarea>
        <div id='below-text-area'>
          <input type='checkbox' name='remind-me' id='remind-me' name='remind_me'> Remind me   
          <input type='datetime-local' name='datetime' id='datetime' name='remind_me_datetime'>
          <input type='submit' name='submit' id='submit' value='Create new memo'>
          <input type='hidden' name='type' value='ADD_MEMO'>
        </div>
      </div>
    </form>
  </body>
</html>
  <?php }
