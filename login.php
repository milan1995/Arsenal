<?php
$error =false;
	if(isset($_POST['submitLogin'])){
		$username =preg_replace('/[^A-Za-z]/','',$_POST['username']);
		$password = md5($_POST['password1']);
		$passError='';
		$nameError='';
		if (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
				$nameError = "Samo slova i brojevi u username-u"; 
			}		
			
		if(strlen($password)<7)
	{
		$passError='Password mora imati više od 6 karaktera';
	}
	else if(!preg_match("/[0-9]/",$password)) 
	{
		$passError='Password mora imati makar jedan broj';
	}
	
	
	if($passError=='' && $nameError=='')
	{
		$dbh= new PDO("mysql:dbname=sampledb;host=mysql://mysql:3306/", "userGPJ", "c0odgnr25dURIfBh");
		$upit = $dbh->prepare("SELECT password FROM login WHERE username=?");
		$upit->bindValue(1, $username, PDO::PARAM_STR);
		$upit->execute();
		foreach ($upit->fetch() as $row) {
        if($password==$row)
		{
			session_start();
					$_SESSION['username']=$username;
					header('Location:index.php');
					die;
		}
    }
		
			/*
				if(file_exists('users/' . $username . '.xml')){
				$xml=new SimpleXMLElement('users/' . $username . '.xml',0,true);
				if($password==$xml->password){
					session_start();
					$_SESSION['username']=$username;
					header('Location:index.php');
					die;
				}
			}
			*/
	}
	else
	{
		echo '<p>$passError</p>';
		echo '<p>$nameError</p>';
	}
	$error=true;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
	<title>Arsenal FC</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>

  <body>
	<script src="validationLogin.js"></script>
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
    <form class="login_form" action="#" method="post" name="login_form">
  		<ul>
			<li>
		    	<label>Username:</label>
		    	<input type="text" name="username" id="username" onkeyup="validationUsername()" required>
		    </li>
			<li>
		    	<label>Password:</label>
		    	<input type="password" name="password1" id="password1" onkeyup="validationPassword()" required>
		    </li>
			<?php
			if($error){
			echo '<p>Invalid username and password</p>';
			}
			?>
		    <li>
		    	<button   type="submit" name="submitLogin" <!--onmouseenter="smjestiUStorageLogin()-->">Login</button> 
				<!-- type="submit"-->
		    </li>
		</ul>
		</form>
	<SCRIPT src = "hambutton.js" ></SCRIPT>
  </body>
</html>
