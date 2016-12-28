<?php

?>

<!doctype html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='styles/main_page.css'/>
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
		<div id='edit-area'>
	  	<input type='text' id='new-memo-title' placeholder='Memo title'>
			<textarea id='new-memo-text' placeholder='Memo text'></textarea>
			<div id='below-text-area'>
				<form action=''>
					<input type='checkbox' name='remind-me' id='remind-me'> Remind me   
					<input type='datetime-local' name='datetime' id='datetime'>
					<input type='submit' name='submit' id='submit' value='Create new memo'>
				</form>
			</div>
		</div>
  </body>
</html>

