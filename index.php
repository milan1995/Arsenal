<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['username']))
	$logined=true;
else
	$logined=false;
?>
<html>
  <head>
    <title>Arsenal FC</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
	<div class="header">
			<div class="logo"></div>
			<div class="main_menu">
              <ul class="topmenu" id="menu">
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="first_team.php">First Team</a></li>
  <li><a href="league_table.php">League Table</a></li>
  <li><a href="history.php">History</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="showMenu()">☰</a>
  </li>
</ul>
<a href="registration.php" class="login">login/register</a>
            </div>  
				
	</div>
	<a style="color:white;"href="search.php" >Search</a>
	<h2>Welcome 
	<?php
		var_dump($_SERVER);
	if($logined){
	echo $_SESSION['username'];
if($_SESSION['username']=="admin")
{
	echo'<a href="LoginAdministrator.php">Click here to see Login details of users</a>';
}
	}
	?>
	</h2>
	<div class="main" id="main">
	<div class="photo" id="photo">
	<!-- carousel-->
	<div class="carousel">
  <div class="Slike">
    <img src="img1.jpg" alt="Relevant textual alternative to the image">
  </div>
  <div class="Slike">
    <img src="img2.jpg" alt="Relevant textual alternative to the image">
  </div>
  <div class="Slike">
    <img src="img3.jpg" alt="Relevant textual alternative to the image">
  </div>
    <div class="Slike">
    <img src="img4.jpg" alt="Relevant textual alternative to the image">
  </div>
  <a class="prethodna" onclick="PrikaziManje()">&#10094;</a>
  <a class="sljedeca" onclick="PrikaziVise()">&#10095;</a>
</div>
<br>
<div class="tacke">
  <span class="manual" onclick="OdaberiSliku(1)"></span> 
  <span class="manual" onclick="OdaberiSliku(2)"></span> 
  <span class="manual" onclick="OdaberiSliku(3)"></span> 
  <span class="manual" onclick="OdaberiSliku(4)"></span> 
</div>
	</div>
	<div class="fixture_content">
	<h1>Arsenal v Tottenham</h1>
	<h2>Will Arsenal lead 6 points over Spurs? Let's see what does the boss say...</h2>
	<div class="opacityback">
	<p class="wenger">"Everybody is focused, everybody is ready to contribute and everybody’s contribution will count on Sunday. We have show that recently in the games, the players we have just spoken about, Giroud for example, he came on against Sunderland and made the difference. It just shows that everybody’s contribution will be absolutely vital."
</p>
</div>
	</div>
	</div>
	<a href="logout.php">Logout</a>
	<SCRIPT src = "hambutton.js" ></SCRIPT>
	<script src="carousel.js"></SCRIPT>
	
  </body>
</html>
